# An Online Editor Extension For Yii Framework Version 2

Thank you for choosing this extension , enjoy it!!!

[![Latest Stable Version](https://poser.pugx.org/echotrue/yii2-markdown/v/stable)](https://packagist.org/packages/echotrue/yii2-markdown)
[![Total Downloads](https://poser.pugx.org/echotrue/yii2-markdown/downloads)](https://packagist.org/packages/echotrue/yii2-markdown)
[![Latest Unstable Version](https://poser.pugx.org/echotrue/yii2-markdown/v/unstable)](https://packagist.org/packages/echotrue/yii2-markdown)
[![License](https://poser.pugx.org/echotrue/yii2-markdown/license)](https://packagist.org/packages/echotrue/yii2-markdown)
[![Monthly Downloads](https://poser.pugx.org/echotrue/yii2-markdown/d/monthly)](https://packagist.org/packages/echotrue/yii2-markdown)
[![Daily Downloads](https://poser.pugx.org/echotrue/yii2-markdown/d/daily)](https://packagist.org/packages/echotrue/yii2-markdown)
[![composer.lock](https://poser.pugx.org/echotrue/yii2-markdown/composerlock)](https://packagist.org/packages/echotrue/yii2-markdown)

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