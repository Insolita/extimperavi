<?php
/**
 * Пример генерации списка загруженных файлов
 * @var \yii\web\View                $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 **/
$files = $dataProvider->getModels();
$fcnt = $dataProvider->getCount();
$pages = $dataProvider->getPagination();
$pages->route = '/route/to/filelist/action';
?>
<p class="text-info">
    <b>Кликните  по нужному файлу для
    выбора опций вставки!</b>
</p>

<div id="redactor_imagepjax">
    <?php if ($fcnt == 0): ?>
        Нет ни одного загруженного файла
    <?php else: ?>
        <table class="table table-bordered table-condensed table-striped table-hover">
            <tr>
                <td>Название</td>
                <td>Размер</td>
                <td>Дата</td>
            </tr>
            <?php
            foreach ($files as $file) {
                echo $this->render('_fileitem', ['file' => $file]);
            }
            ?>

        </table>
        <?php echo \yii\widgets\LinkPager::widget(
            [
                'pagination' => $pages,
                'linkOptions' => ['data-pjaxtarget_file' => 1]
            ]
        )?>
    <?php endif; ?>
</div>
