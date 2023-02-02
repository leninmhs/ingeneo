<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
//use yii\bootstrap5\Html;
use kartik\form\ActiveForm;
//use kartik\form\ActiveField;
use kartik\select2\Select2;

//use kartik\form\ActiveForm;
//use kartik\form\ActiveField;
use kartik\date\DatePicker;
//use kartik\widgets\DatePicker;
//use kartik\icons\FontAwesomeAsset;
//FontAwesomeAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Casos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="casos-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="card">
        <div class="card-body">
            <div class="row alert alert-secondary" >
				<div class="col-3"> <?= $form->field($model, 'numero_caso')->textInput(['maxlength' => true]) ?></div>
			</div>

			<div class="row">
				<div class="col-4">
				<?= $form->field($model, 'cliente_id')->widget(Select2::classname(), [
					'name' => 'Cliente',
					'data' => ArrayHelper::map(app\models\Clientes::find()->orderBy(['nombre'=> SORT_DESC])->all(), 'id', 'nombre'),
					'options' => ['placeholder' => 'Seleccione el cliente', 'class' => 'form-control'],
					'pluginOptions' => [ 'allowClear' => true ],
				]); ?>
				</div>

				<div class="col-4">
				<?= $form->field($model, 'asesor_id')->widget(Select2::classname(), [
					'name' => 'Cliente',
					'data' => ArrayHelper::map(app\models\Asesores::find()->orderBy(['nombre'=> SORT_DESC])->all(), 'id', 'nombre'),
					'options' => ['placeholder' => 'Seleccione el asesor', 'class' => 'form-control'],
					'pluginOptions' => [ 'allowClear' => true ],
				]); ?>
				</div>

				<div class="col-4">
				<?= $form->field($model, 'fecha_creacion')->widget(DatePicker::classname(), [
					'options' => ['placeholder' => 'Fecha creación del caso'],
					//'readonly' => true,
                    'bsVersion' => '5.1',
					'pluginOptions' => [
						'autoclose' => true,
						'todayHighlight' => true,
						'todayBtn' => "linked",
						'format' => 'yyyy-mm-dd',
						//'startDate' => 'now()',
						'setDate' => 'now'
					] ]);
				?>
				</div>
			</div>

			<div class="row">
				<div class="col-12"> <?= $form->field($model, 'descripcion')->textarea(['rows' => 4]) ?></div>
			</div>

			<div class="form-group text-center">
                <?= Html::a('<i class="bi bi-arrow-left-square"></i> Regresar', ['/casos/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton('<i class="bi bi-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
            </div>

		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
