<?php
namespace echotrue\markdown;

use Yii;
use echotrue\markdown\Upload;

class UploadAction extends \yii\base\Action
{

    public $savePath;
    public $saveUrl;
    public $formats = ['gif', 'jpg', 'jpeg', 'png', 'bmp'];
    public $name    = 'editormd-image-file';

    public function init()
    {
        Yii::$app->request->enableCsrfValidation = false;
        $this->savePath                          = Yii::getAlias('@webroot') . '/markdown_upload/';
        $this->saveUrl                           = './markdown_upload/';
        parent::init();
    }

    public function run()
    {
        if (isset($_FILES[$this->name])) {
            $imageUploader = new Upload($this->savePath, $this->saveUrl, $this->formats, 2);
            $imageUploader->config([
                'maxSize' => 2048,
                'cover'   => true
            ]);

            if ($imageUploader->upload($this->name)) {
                $imageUploader->message('上传成功', 1);
            } else {
                $imageUploader->message('上传成功', 0);
            }
        }
    }
}