# An Online Editor Extension For Yii Framework Version 2

Thank you for choosing this extension , enjoy it!!!

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2/v/stable.png)](https://packagist.org/packages/echotrue/yii2-markdown)


### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist echotrue/yii2-markdown "*"
```

or add

```
"echotrue/yii2-markdown": "*"
```

to the require section of your `composer.json` file . and run this command:

```
composer update
```


### Usage

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'username')->widget(\echtrue\markdown\MarkDown::className(), [
        'options'    => ['id' => 'yii-markdown','width'=>'1000px'],
        'model'      => $model,
        'attribute' => 'username',
    ]) ?>

```

or

```
<?= \echotrue\markdown\MarkDown::widget([
        'options' => [
            'id' => 'yii-markdown',
            //'height'=>"100px",
        ],
        'name'    => 'username',
    ]); ?>
    
```