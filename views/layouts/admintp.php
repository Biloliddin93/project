<?php

if(!Yii::$app->session->isActive) {
    Yii::$app->session->open();
}

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?=$_SESSION["site_title"]?></title>
    <link rel="icon"
          type="image/png"
          href="<?=Yii::$app->homeUrl."images/".$_SESSION["favicon"] ?>">
    <script src="<?= Yii::$app->homeUrl; ?>js/vue.min.js"></script>
    <script src="<?= Yii::$app->homeUrl; ?>js/axios.min.js"></script>
    <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <?php $this->head() ?>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%;
        }
    </style>


</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <div class="sidebar">
        <div class="logo logo_top">
            <a href="/admin/">
                <img src="<?= Yii::$app->homeUrl; ?>admin/images/icons/logo.svg" alt="logo">
            </a>
        </div>
        <ul class="menu_sidebar menu_sidebar_top">
            <li class="home_icon active">
                <a href="#">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Dashboard",
                        "ru"=>"Панель приборов",
                        "en"=>"Dashboard",
                    ]) ?>

                </a>
            </li>
            <li class="single_icon">
                <a href="<?= Yii::$app->homeUrl; ?>admin/company?id=8">

                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Məqalə",
                        "ru"=>"Cтатья",
                        "en"=>"Article",
                    ]) ?>

                </a>
            </li>
            <li class="signature_icon">
                <a href="#">

                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Blog",
                        "ru"=>"Блог",
                        "en"=>"Blog",
                    ]) ?>

                </a>
            </li>
            <li class="notification_icon">
                <a href="<?= Yii::$app->homeUrl; ?>admin/news">

                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Xəbərlər",
                        "ru"=>"Новости",
                        "en"=>"News",
                    ]) ?>

                </a>
            </li>
            <li class="image_icon">
                <a href="<?= Yii::$app->homeUrl; ?>admin/banner">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Bannerlər",
                        "ru"=>"Баннеры",
                        "en"=>"Banners",
                    ]) ?>

                </a>
            </li>
            <li class="folder_icon">
                <a href="#">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Fayl idarəedici",
                        "ru"=>"Файловый менеджер",
                        "en"=>"File Manager",
                    ]) ?>

                </a>
            </li>
            <li class="send_icon">
                <a href="#">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Newsletter",
                        "ru"=>"Новостная рассылка",
                        "en"=>"Newsletter",
                    ]) ?>

                </a>
            </li>
            <li class="divider">

            </li>
        </ul>
        <ul class="menu_sidebar menu_sidebar_bottom">
            <li class="settings_gear_icon">
                <a href="<?= Yii::$app->homeUrl; ?>admin/settings">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Ayarlar",
                        "ru"=>"Настройки",
                        "en"=>"Settings",
                    ]) ?>

                </a>
            </li>
            <li class="world_icon">
                <a href="<?= Yii::$app->homeUrl; ?>admin/translation">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Translations",
                        "ru"=>"Переводы",
                        "en"=>"Translations",
                    ]) ?>

                </a>
            </li>
            <li class="paper_icon">
                <a href="#">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Fəaliyyət Giriş",
                        "ru"=>"Журнал активности",
                        "en"=>"Activity Log",
                    ]) ?>

                </a>
            </li>
            <li class="settings_tool_icon">
                <a href="#">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Bakım",
                        "ru"=>"Обслуживание",
                        "en"=>"Maintenance",
                    ]) ?>

                </a>
            </li>
        </ul>
        <a href="#" class="btn_common_styles btn_light_green btn_sidebar">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Site Öncesi",
                "ru"=>"Предварительный просмотр сайта",
                "en"=>"Site Preview",
            ]) ?>

        </a>
        <div class="bottom_sidebar">
            <a href="#" class="url_site__sidebar">
                www.yaradan.az
            </a>
            <div class="magnum">
                Powered by <a href="#">Magnum</a>
            </div>
        </div>
    </div>



    <div class="content right_content">
        <div class="top_block">
            <div class="row">
                <div class="col-md-6 tal col-middle">
                    <div class="title__top_block">
                        <div class="wrap_burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Ayarlar",
                            "ru"=>"Настройки",
                            "en"=>"Settings",
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-6 tar col-middle">
                    <?php require_once('include/user.php'); ?>
                </div>
            </div>
        </div>
        <div class="wrapper_content_and_sidebar">
        <?php require_once('include/sidebar-2.php'); ?>
        <div class="content_wrap  content_wrap__content_management">
            <?= $content ?>
        </div>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
