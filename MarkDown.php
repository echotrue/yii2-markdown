<?php

/**
 * Created by PhpStorm.
 * User: axlrose
 * Date: 16/7/21
 * Time: 上午9:51
 */
namespace echotrue\markdown;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\HttpException;


class MarkDown extends \yii\widgets\InputWidget
{

    private static $baseUrl;
    /**
     * Enable attribute
     *
     * @var array
     */
    private static $attr = [
        'width',
        'height',
        'syncScrolling',
        'path',
        'pluginPath',
        'theme',
        'previewTheme',
        'editorTheme',
        'markdown',
        'placeholder',
        'codeFold',
        'saveHTMLToTextarea',
        'searchReplace',
        'watch',
        'htmlDecode',
        'toolbar',
        'previewCodeHighlight',
        'emoji',
        'taskList',
        'tocm',
        'tex',
        'flowChart',
        'sequenceDiagram',
        'imageUpload',
        'imageFormats',
        'dialogLockScreen',
        'dialogShowMask',
        'dialogDraggable',
        'dialogMaskOpacity',
        'dialogMaskBgColor',
    ];


    /**
     * Initializes the widget.
     *
     * - 1、Check if the attribute enable
     * - 2、Set the default settings
     *
     * @author axlrose
     * @throws \yii\base\InvalidConfigException
     * @since  1.0
     */
    public function init()
    {

        
        self::$baseUrl = 'assets/';//Yii::getAlias('@web') . '/markDownAssets/';

        foreach ($this->options as $k => $v) {
            if ($k != 'id' && !in_array($k, self::$attr)) {
                throw new HttpException(422, 'Unknown attribute :' . $k);
            }
        }

        $this->options['path']                 = self::$baseUrl;
        $this->options['pluginPath']           = self::$baseUrl . 'plugins/';
        $this->options['height']               = isset($this->options['height']) ?: "640px";
        $this->options['imageUpload']          = isset($this->options['imageUpload']) ?: true;
        $this->options['imageUploadURL']       = 'upload';
        $this->options['theme']                = isset($this->options['theme']) ?: 'dark';
        $this->options['previewTheme']         = isset($this->options['previewTheme']) ?: 'dark';
        $this->options['editorTheme']          = isset($this->options['editorTheme']) ?: 'pastel-on-dark';
        $this->options['watch']                = isset($this->options['watch']) ?: true;
        $this->options['previewCodeHighlight'] = isset($this->options['previewCodeHighlight']) ?: false;

        parent::init();
    }


    /**
     * render the widget
     */
    public function run()
    {
//        $options    = $this->options;
//        $model      = $this->model;
//        $attributes = $this->attributes;

        $view = $this->getView();

        if ($this->hasModel()) {
            $input = '<div id="yii-markdown">' . Html::activeTextarea($this->model,
                    $this->attribute, ['display' => 'none']) . '</div>';
        } else {
            if (empty($this->name)) {
                throw new HttpException(422, 'The name of textarea is not allow to be null');
            }
            $input = '<div id="yii-markdown">' . Html::textarea($this->name, '',
                    ['style' => "display:none;"]) . '</div>';

        }
        echo $input;

        //output the assets file to view
        MarkdownAsset::register($view);

        //output settings to view
        $js = 'var testEditor;
                $(function() {
                    testEditor = editormd("' . $this->options['id'] . '", ' . $this->getOptions() . ');
                })';
        $view->registerJs($js, $view::POS_END);

    }

    /**
     * get all the attrbutes
     *
     * @return string
     */
    public function getOptions()
    {
        /**
         * `id` is not in editor.md's attribute , so remove it
         */
        unset($this->options['id']);

        return Json::encode($this->options);
    }
}