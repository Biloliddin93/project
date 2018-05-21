<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);


?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Teens</title>
    <?php $this->head() ?>
    <link rel="icon"
          type="image/png"
          href="<?=Yii::$app->homeUrl."images/".$_SESSION["favicon"] ?>">
    <script src="<?= Yii::$app->homeUrl; ?>js/vue.min.js"></script>
    <script src="<?= Yii::$app->homeUrl; ?>js/axios.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <?php require_once('include_front/header.php'); ?>
    <div class="content">
        <?=$content?>
    </div>
    <?php require_once('include_front/footer.php'); ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>