<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 29.09.14
 * Time: 5:34
 */

class ExampleUploaderController extends \yii\web\Controller {

    public function actionIndex()
    {
        $model = new AttachModelExample();
        $imagesDataProvider =  new \yii\data\ActiveDataProvider([
                'query' => AttachModelExample::find()->where(['type' => 'image']),
                'pagination' => [
                    'pageSize' => 9,
                ],
                'sort' => [
                    'defaultOrder' => ['updated' => SORT_DESC]
                ]
            ]);
        $filesDataProvider = new \yii\data\ActiveDataProvider([
                'query' => AttachModelExample::find()->where(['type' => 'file']),
                'pagination' => [
                    'pageSize' => 9,
                ],
                'sort' => [
                    'defaultOrder' => ['updated' => SORT_DESC]
                ]
            ]);
        return $this->renderAjax('attach_index', ['model' => $model, 'imagesDataProvider' => $imagesDataProvider, 'filesDataProvider' => $filesDataProvider]);
    }
    public function actionImageUpload()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new AttachModelExample();
        $model->load(\Yii::$app->request->post());
        $model->uploadImage();
        if ($model->save()) {
            return [  //Именно такие данные должны быть в ответе
                'state' => true,
                'id' => $model->id,
                'filename' => $model->filename,
                'thumburl' => $model->getImageUrl('thumb')
            ];
        } else {
            return ['state' => false, 'error' => $model->formattedErrors()];  //Именно такие данные должны быть в ответе
        }
    }

    public function actionFileUpload()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new AttachModelExample();
        $model->load(\Yii::$app->request->post());
        $model->uploadFile();
        if ($model->save()) {
            return ['state' => true, 'id' => $model->id];   //Именно такие данные должны быть в ответе
        } else {
            return ['state' => false, 'error' => $model->formattedErrors()];   //Именно такие данные должны быть в ответе
        }
    }
    public function actionImagelist()
    {
        $model = new AttachModelExample();
        $provider = new \yii\data\ActiveDataProvider([
                'query' => AttachModelExample::find()->where(['type' => 'image']),
                'pagination' => [
                    'pageSize' => 9,
                ],
                'sort' => [
                    'defaultOrder' => ['updated' => SORT_DESC]
                ]
            ]);
        return $this->renderAjax('_imagelist', ['model' => $model, 'dataProvider' => $provider]);
    }

    public function actionFilelist()
    {
        $model = new AttachModelExample();
        $provider = new \yii\data\ActiveDataProvider([
                'query' => AttachModelExample::find()->where(['type' => 'file']),
                'pagination' => [
                    'pageSize' => 9,
                ],
                'sort' => [
                    'defaultOrder' => ['updated' => SORT_DESC]
                ]
            ]);
        return $this->renderAjax('_filelist', ['model' => $model, 'dataProvider' => $provider]);
    }

    public function actionDelete()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = \Yii::$app->request->post('id');
        if (!$id) {
            return ['state' => false];
        }
        $model = AttachModelExample::findOne($id);
        if ($model) {
            $model->delete();
            return ['state' => true];
        } else {
            return ['state' => false];
        }
    }

    public function actionPreview()
    {
        $text = \Yii::$app->request->post('text', '');
        $parsedtext = $this->parseBBcodes($text);
        return $this->renderAjax('preview', ['text' => $parsedtext]);
    }

    public function parseBBcodes($text)
    {
        $fileHtmlTemplate='<a href="{fileurl}">Скачать файл {filetitle} ({filesize})</a>';
        $imageHtmlTemplate='<img src="{imgurl}" alt="{alt}" title="{alt}" class="myimg {cssclass} img-{align}">';
        $imageHtmlPreviewTemplate='<a href="{fullurl}" rel="imgpreview"><img src="{imgurl}" alt="{alt}" title="{alt}" class="myimg {cssclass} img-{align}"></a>';

        if (!$text) return '';
        preg_match_all('#\"ATTACH_IMAGE\":\"(.+?)\"#', $text, $imgids);
        preg_match_all('#{\"ATTACH_FILE\":\"(.+?)\"}#', $text, $fileids);

        $images = !count($imgids)
            ? []
            : AttachModelExample::find()->where(['type' => 'image', 'id' => $imgids[1]])->indexBy('id')->asArray()->all(
            );
        $files = !count($fileids)
            ? []
            : AttachModelExample::find()->where(['type' => 'file', 'id' => $fileids[1]])->indexBy('id')->asArray()->all(
            );
        if (empty($images) && empty($files)) return $text;
        $textparsed = preg_replace_callback(
            '#\[\[(.+?)\]\]#siu',
            function ($m) use ($images, $files,$fileHtmlTemplate,$imageHtmlTemplate) {
                $bb = \yii\helpers\Json::decode($m[1]);
                if (isset($bb['ATTACH_FILE'])) {
                    $fileid = (int)$bb['ATTACH_FILE'];
                    if (!isset($files[$fileid])) {
                        return '';
                    } else {
                        return strtr(
                            $fileHtmlTemplate,
                            [
                                '{attach_id}' => $fileid,
                                '{filetitle}' => $files[$fileid]['filetitle'],
                                '{fileurl}' => $fileUrl,
                                '{filesize}' => Yii::$app->formatter->asShortSize($files[$fileid]['filesize'])
                            ]
                        );
                    }
                } else{
                    $imgid = (int)$bb['ATTACH_IMAGE'];
                    if (!isset($images[$imgid])) {
                        return '';
                    } else {
                        return
                            $bb['PREVIEW']
                                ? strtr(
                                $imageHtmlPreviewTemplate,
                                [
                                    '{attach_id}' => $imgid,
                                    '{cssclass}' => $bb['CSS'],
                                    '{align}' => "function getAlignStyle({$bb['ALIGN']})",
                                    '{alt}' => $bb['ALT'],
                                    '{size}' => $bb['SIZE'],
                                    '{imgurl}' =>"function getImageUrlBySize({$bb['SIZE']}, {$images[$imgid]['filename']})",
                                    '{fullurl}' =>"function getImageUrlBySize('orig', {$images[$imgid]['filename']})",

                                ]
                            )
                                : strtr(
                                $imageHtmlTemplate,
                                [
                                    '{attach_id}' => $imgid,
                                    '{cssclass}' => $bb['CSS'],
                                    '{align}' => "function getAlignStyle({$bb['ALIGN']})",
                                    '{alt}' => $bb['ALT'],
                                    '{size}' => $bb['SIZE'],
                                    '{imgurl}' =>"function getImageUrlBySize({$bb['SIZE']}, {$images[$imgid]['filename']})",
                                    '{fullurl}' =>"function getImageUrlBySize('orig', {$images[$imgid]['filename']})",
                                ]
                            );
                    }
                }
            },
            $text
        );
        return $textparsed;
    }
} 