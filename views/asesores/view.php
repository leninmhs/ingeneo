<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Asesores */

$this->title = 'Asesores';
$this->params['breadcrumbs'][] = ['label' => 'Asesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="asesores-view">

    <h1><i class="bi bi-person-lines-fill"></i> Información del asesor</h1>
    <div class="row text-right">
      <div class="col-md-12">
        <p>
            <?= Html::a('<i class="bi bi-pencil-square"></i> Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a('<i class="bi bi-trash3"></i> Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Desea eliminar el asesor?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
      </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'cedula',
            'nombre',
            'usuario',
            //'clave:ntext',
        ],
    ]) ?>
<br>

    <h4><i class="bi bi-journal-text"></i> Casos asociados</h4>
    <?= GridView::widget([
        'dataProvider' => $casos,
        //'filterModel' => $searchModel,
        'columns' => [
            'descripcion',
            [
                'attribute' => 'cliente_id',    
                'format' => 'raw',
                'value'  =>  function ($data) { return $data->cliente->nombre; },
                'filter' =>null,
            ],
            [
                'attribute' => 'fecha_creacion',
                'format' => ['DateTime', 'php:d/m/Y h:i a']
            ],
        ],
    ]); ?>

<?= Html::a('<i class="bi bi-plus-square"></i> Agregar un caso', ['casos/create'], ['class' => 'btn btn-primary']) ?>
</div>
