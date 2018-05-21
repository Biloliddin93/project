<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


<?php
$form = ActiveForm::begin([ 'id' => 'login-form','options' => [
    'enctype' => 'multipart/form-data',
]]); ?>

<input name="img_grp_id" type="hidden" value="">
<div class="form-group">

    <label><?=language(Yii::$app->language,[
            "az"=>"Başlıq",
            "ru"=>"Название",
            "en"=>"Title",
        ]) ?></label>
    <input class="form-control" type="text" name="image_title[]" id="image_title">
</div>
<div class="form-group">

    <label><?=language(Yii::$app->language,[
            "az"=>"Alt",
            "ru"=>"Алт",
            "en"=>"Alt",
        ]) ?></label>
    <input class="form-control" type="text" name="alt[]" id="image_title">
</div>
<div class="form-group">

    <label><?=language(Yii::$app->language,[
            "az"=>"Summary",
            "ru"=>"Суммарй",
            "en"=>"Summary",
        ]) ?></label>
    <input class="form-control"  type="text" name="summary[]" id="image_title">
</div>
<div class="form-group">

    <label><?=language(Yii::$app->language,[
            "az"=>"Photo",
            "ru"=>"Фото",
            "en"=>"Photo",
        ]) ?></label>
    <input class="form-control" type="file" name="img_url" id="img_url">
</div>



<select id="language_id]" class="form-control" name="language_id[]">
    <label><?=language(Yii::$app->language,[
            "az"=>"Language",
            "ru"=>"Язык",
            "en"=>"Language",
        ]) ?></label>
    <?php

    foreach ($lang as $vl)
    {
        echo ('<option value="'.$vl["id"].'" selected>'.$vl["language_name"].'</option>');
    }


    ?>


</select>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>



<?php ActiveForm::end(); ?>

