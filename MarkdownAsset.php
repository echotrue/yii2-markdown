<?php

/**
 * Created by PhpStorm.
 * User: axlrose
 * Date: 16/7/21
 * Time: 上午9:51
 */
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
        'js/editormd.js',
    ];
    public $css = [
        'css/style.css',
        'css/editormd.css',
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
        $this->sourcePath = __DIR__ . '/assets/';
    }
}