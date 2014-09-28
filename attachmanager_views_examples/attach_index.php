<?php
/**
 * Пример главного окна менеджера вложений
 * Важно сохранение ID элементов

 *  @var \yii\data\ActiveDataProvider $imagesDataProvider
 *  @var \yii\data\ActiveDataProvider $filesDataProvider
 */
?>
<section id="redactor-modal-image-manager">
    <div class="modal-body">
        <?php echo \yii\bootstrap\Tabs::widget(
            [
                'items' => [
                    [
                        'label' => 'Загрузить изображение',
                        'active' => true,
                        'content' => $this->render(
                            '_attachform',
                            [
                                'model' => $model,
                                'dataProvider' => $imagesDataProvider,   //уже загруженные изображения
                                'type' => 'image'
                            ]
                        )
                    ],
                    [
                        'label' => 'Загрузить файл',
                        'content' => $this->render(
                            '_attachform',
                            [
                                'model' => $model,
                                'dataProvider' => $filesDataProvider, //уже загруженные файлы
                                'type' => 'file'
                            ]
                        )
                    ]
                ]
            ]
        )?>

    </div>


</section>

