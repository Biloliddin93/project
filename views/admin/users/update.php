<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


<?php
$form = ActiveForm::begin([ 'id' => 'login-form','options' => [
    'enctype' => 'multipart/form-data',
]]);

echo $form->field($model,"fullname")->textInput(['autofocus' => true]);
echo $form->field($model,"login")->textInput();
echo $form->field($model,"password")->passwordInput();
echo $form->field($model,"email")->textInput();

echo $form->field($model,"user_stats")->textInput();
?>
<div class="form-group">
    <label></label>
    <input class="form-control" type="file" name="avatar">
</div>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>

<?php

foreach ($models as $key=>$val)
{
    echo $val." ".$key;
}
?>

<?php echo get_client_ip();?>

<?php ActiveForm::end(); ?>

