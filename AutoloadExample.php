<?php

namespace echotrue\foobar;

use yii\helpers\Html;

/**
 * This is just an example.
 */
class AutoloadExample extends \yii\widgets\InputWidget
{

    public $attributes;

    public function init()
    {
        $this->options['id'] = 'yii-markdown';
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $view = $this->getView();

        if ($this->hasModel()) {
            $html = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $html = Html::textarea($this->name, $this->value, $this->options);
        }

        echo $html;

        Assets::register($view);
        $js = 'var testEditor;
                $(function() {
                testEditor = editormd("yii-markdown", {
                    width   : "90%",
                    height  : 640,
                    syncScrolling : "single",
                    path    : "../lib/"
                });
            });
            alert("dd")';
        $view->registerJs($js, $view::POS_END);

    }

}
