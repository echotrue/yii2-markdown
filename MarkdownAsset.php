<?php

namespace echotrue\markdown;

use Yii;

/**
 * Class MarkdownAsset
 *
 * @author  axlrose
 * @package app\components
 * @since   1.0
 */
class MarkdownAsset extends \yii\web\AssetBundle
{
    public $js  = [
        'assets/js/editormd.js',
    ];
    public $css = [
        'assets/css/style.css',
        'assets/css/editormd.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        /**
         * the assets url
         */
        $this->sourcePath = __DIR__;
    }
}