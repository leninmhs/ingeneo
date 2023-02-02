<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Casos */

$this->title = 'Casos';
$this->params['breadcrumbs'][] = ['label' => 'Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->numero_caso;
\yii\web\YiiAsset::register($this);
?>
<div class="casos-view">

    <h1><i class="bi bi-filter-square"></i> <?= Html::encode($this->title) ?></h1>

    <div class="row text-right">
      <div class="col-md-12">
        <p>
            <?= Html::a('<i class="bi bi-pencil-square"></i> Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a('<i class="bi bi-trash3"></i> Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Desea eliminar el caso?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
      </div>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'numero_caso',
            'descripcion',
            'fecha_creacion',
            [
                'label' => 'Cliente',    
                'value'  =>  function ($data) { return @$data->cliente->nombre; },
            ],
            [
                'label' => 'Asesor asignado',    
                'value'  =>  function ($data) { return @$data->asesor->nombre; },
            ],
        ],
    ]) ?>

</div>
