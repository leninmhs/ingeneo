<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="clientes-view">

    <h1><i class="bi bi-person-lines-fill"></i> Información del cliente</h1>

    <div class="row text-right">
      <div class="col-md-12">
        <p>
            <?= Html::a('<i class="bi bi-pencil-square"></i> Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a('<i class="bi bi-trash3"></i> Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Desea eliminar el cliente?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
      </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cedula',
            'nombre',
            'telefono',
            'direccion',
            
        ],
    ]) ?>

</div>
