<?php
/**
 * @property integer $id
 * @property integer $type
 * @property integer $filename
 * @property integer $filetitle
 * @property string  $filesize
 * *@property string  $updated
 **/

class AttachModelExample extends \yii\db\ActiveRecord{

    /**
     * @var \yii\web\UploadedFile $imgfile
     */
    public $imgfile;
    /**
     * @var \yii\web\UploadedFile $file
     */
    public $file;

    public function uploadImage(){

    }

    public function uploadFile(){

    }

    public function formattedErrors()
    {
        $errs = [];
        foreach ($this->getFirstErrors() as $error) {
            $errs[] = \yii\helpers\Html::encode($error);
        }
        return implode("\n", $errs);
    }

    public function  getFileUrl(){
        return 'generated file url';
    }

    public function  getImageUrl($size='orig'){
        return 'generated image url (by custom '.$size.' if you want use its)';
    }
} 