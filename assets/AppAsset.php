<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/nice-select.css',
        'css/owl.carousel.min.css',
        'css/animate.css',
        'css/baron.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/jquery.nice-select.min.js',
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/owl.carousel2.thumbs.js',
        'js/baron.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
