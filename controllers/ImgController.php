<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Language;
use app\models\Settings;

class ImgController extends Controller{

    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => Yii::$app->homeUrl."web/images/", // Directory URL address, where files are stored.
                'path' => Yii::$app->basePath."/web/images/", // Or absolute path to directory where files are stored.
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' =>  Yii::$app->homeUrl."web/images/", // Directory URL address, where files are stored.
                'path' => Yii::$app->basePath."/web/images/", // Or absolute path to directory where files are stored.
            ],
        ];
    }








}

