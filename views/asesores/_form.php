<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

//use kartik\widgets\PasswordInput

/* @var $this yii\web\View */
/* @var $model app\models\Asesores */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="asesores-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-6"><?= $form->field($model, 'cedula')->textInput(['maxlength' => 15]) ?></div>
            <div class="col-6"><?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?></div>
        </div>

        <div class="row">
            <div class="col-6"><?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?></div>
            <div class="col-6"><?= $form->field($model, 'clave')->textInput(['maxlength' => true, 'type' => 'password']) ?></div>
        </div>
        <br>
        <div class="form-group text-center">
            <?= Html::a('<i class="bi bi-arrow-left-square"></i> Regresar', ['/asesores/index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('<i class="bi bi-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
         </div>
    
     </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
