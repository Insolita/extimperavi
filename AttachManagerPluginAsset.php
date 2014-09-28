<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 30.07.14
 * Time: 14:14
 */

namespace insolita\extimperavi;


use yii\web\AssetBundle;

class AttachManagerPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/insolita/imperavi-plugins/js';
    public $js
        = [
            'attachmanager.js'
        ];
    public $depends
        = [
            'vova07\imperavi\Asset',
            'yii\bootstrap\BootstrapAsset',
        ];
} 