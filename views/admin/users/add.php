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


?>
<div class="form-group">
    <label></label>
    <input class="form-control" type="file" name="avatar">
</div>
<select id="Users[user_stats]" class="form-control" name="Users[user_stats]">

    <?php
    if($model->user_stats == 1)
    {
        echo ('<option value="1" selected>Administrator</option>
               <option value="2">User</option>');
    }
    else
    {
        echo ('<option value="1" >Administrator</option>
               <option value="2" selected>User</option>');
    }

    ?>


</select>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>



<?php ActiveForm::end(); ?>

