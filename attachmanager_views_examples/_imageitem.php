<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 31.07.14
 * Time: 18:22
 *
 *
 * @var \yii\web\View $this
 * @var AttachModelExample $img
 */

$popover_content
    = '
<div id="redactor_image_popover_' . $img->id . '">
        <div>'
    .
        \yii\helpers\Html::a(
            "Удалить",
            '#',
            [
                'data-redactor_imgdeleter' => $img->id,
                'class' => 'btn btn-danger btn-sm',
                'data-confirm' => 'Вы уверены что хотите это сделать?'
            ]
        )

    . \yii\helpers\Html::label("Подпись", "redactor_img_alt" . $img->id)
    . \yii\helpers\Html::textInput("img_alt", $img->filetitle, ["id" => "redactor_img_alt" . $img->id])
    . '</div> <div>'
    .
        \yii\helpers\Html::label("Css класс", "redactor_img_css" . $img->id)
        . \yii\helpers\Html::dropDownList(
            "img_css",
            '',
            ['img-thumbnail'=>'img-thumbnail','img-rounded'=>'img-rounded','any_css_classes'=>'preset what you want'],
            ["id" => "redactor_img_css" . $img->id]
        )
        . '</div><div>'
    . \yii\helpers\Html::label("Размер", "redactor_imgsize" . $img->id)
    . \yii\helpers\Html::dropDownList(
        "img_size",
        "thumb",
        ['thumb' => "Превью", 'mid' => "Средний размер", 'big' => "Большой размер", 'orig' => 'Оригинальный размер','othersize'=>'preset what you want'],
        ["id" => "redactor_imgsize" . $img->id]
    )
    . '</div><div>'
    . \yii\helpers\Html::label("Выравнивание", "redactor_imgalign" . $img->id)
    . \yii\helpers\Html::dropDownList(
        "img_align",
        "",
        ['no' => 'Нет', 'left' => "Слева", 'right' => "Справа"],
        ["id" => "redactor_imgalign" . $img->id]
    )
    . '</div><div>'
    . \yii\helpers\Html::label("Увеличение по клику", "redactor_ispreview" . $img->id)
    . \yii\helpers\Html::checkbox("is_preview", false, ["id" => "redactor_ispreview" . $img->id])
    . '</div><div>'

    . \yii\helpers\Html::button(
        "Вставить html",
        ['data-redactor_inshtml_img' => $img->id, 'class' => 'btn btn-info btn-sm']
    )
    .  \yii\helpers\Html::button(
        "Вставить bb-code",
        ['data-redactor_insbb_img' => $img->id, 'class' => 'btn btn-info btn-sm']
    )
    . '
        </div>
    </div>';
?>
<td>
    <?=
    \yii\helpers\Html::a(
        \yii\helpers\Html::img(
            $img->getImageUrl('thumb'),
            ['class' => 'img-thumbnail', 'id' => 'rimg_' . $img->id]
        ),
        'javascript:void(0)',
        [
            'data-redactor_listedimg' => $img->id,
            'data-pjax' => 0,
            'id' => 'aimg_' . $img->id,
            'title' => $img->filetitle,
            'data-content' => $popover_content
        ]
    );?>


    <div id="redactor_images_data_<?= $img->id ?>" style="display: none"
         data-url_thumb="<?= $img->getImageUrl('thumb')?>"
         data-url_orig="<?=  $img->getImageUrl('orig')?>"
         data-url_mid="<?=  $img->getImageUrl('mid')?>"
         data-url_big="<?=  $img->getImageUrl('big')?>"
        >
    </div>
</td>