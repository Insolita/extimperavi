<?php
/**
 * Отображение загруженного файла
 * @var \yii\web\View $this
 * @var AttachModelExample $file
 */

$popover_content
    = '
<div id="redactor_image_popover_' . $file->id . '">
        <div>'
    .
        \yii\helpers\Html::a(
            "Удалить",
            '#',
            [
                'data-redactor_filedeleter' => $file->id,
                'class' => 'btn btn-danger btn-sm',
                'data-confirm' => 'Вы уверены что хотите это сделать?'
            ]
        )
    . '</div> <div>'

    .  \yii\helpers\Html::button(
        "Вставить html",
        ['data-redactor_inshtml_file' => $file->id, 'class' => 'btn btn-info btn-sm']
    )
    . \yii\helpers\Html::button(
        "Вставить bb-code",
        ['data-redactor_insbb_file' => $file->id, 'class' => 'btn btn-info btn-sm']
    )
    . '
        </div>
    </div>';
?>
<tr id="filerow<?= $file->id ?>" data-redactor_file_row="<?= $file->id ?>" data-content='<?= $popover_content ?>'>

    <td id="redactor_file_title_<?= $file->id ?>"><?= $file->filetitle ?>
        </div></td>
    <td id="redactor_file_size_<?= $file->id ?>"><?= $file->filesize ?></td>
    <td><?= $file->updated; ?>
        <div id="redactor_file_data_<?= $file->id ?>" style="display: none"
             data-url_file="<?= $file->getFileUrl() ?>"
            >
    </td>
</tr>
