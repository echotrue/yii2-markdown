<?php
/**
 * PHP upload demo for yii-markdown editor
 *
 * @author axlrose
 */

header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");

require("upload.class.php");

error_reporting(E_ALL & ~E_NOTICE);

/**
 * 文件保存地址
 */
$path     = __DIR__ . DIRECTORY_SEPARATOR . '../../';
$savePath = realpath($path) . '/markdown_upload/';

/**
 * 图片url
 */
$saveUrl = './markdown_upload/';

$formats = [
    'image' => ['gif', 'jpg', 'jpeg', 'png', 'bmp']
];

$name = 'editormd-image-file';

if (isset($_FILES[$name])) {
    $imageUploader = new Upload($savePath, $saveUrl, $formats['image'], 2);

    $imageUploader->config([
        'maxSize' => 2048,
        'cover'   => true
    ]);

    if ($imageUploader->upload($name)) {
        $imageUploader->message('上传成功！', 1);
    } else {
        $imageUploader->message('上传失败！', 0);
    }
}

?>