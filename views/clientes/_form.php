<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4"><?= $form->field($model, 'cedula')->textInput() ?></div>
                <div class="col-4"><?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?></div>
                <div class="col-4"><?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?></div>
            </div>

            <div class="row">
                <div class="col-12"> <?= $form->field($model, 'direccion')->textarea(['rows' => 3]) ?></div>
            </div>

            <div class="form-group text-center">
                <?= Html::a('<i class="bi bi-arrow-left-square"></i> Regresar', ['/clientes/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton('<i class="bi bi-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
