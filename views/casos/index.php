<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
//use kartik\grid\GridView;
//use kartik\widgets\DatePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Casos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casos-index">

    <h1><i class="bi bi-filter-square"></i> <?= Html::encode($this->title) ?></h1>

    <div class="row text-right">
        <div class="col-md-12">
           <p> <?= Html::a('<i class="bi bi-plus-square"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?></p>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id', 
                'options' => ['style' => 'width: 5%;']
            ],
            [
                'attribute' => 'numero_caso', 
                'options' => ['style' => 'width: 5%;']
            ],
            'descripcion',
            [
                'attribute' => 'fecha_creacion',
                //'value' => 'fecha_creacion',
                //'visible' => $device,
                'value' => function ($model) {
                              return  date('d-m-Y', strtotime(@$model->fecha_creacion));
                          },    
                //'format' => ['DateTime', 'php:d/m/Y h:i a'],
                'filter' => DatePicker::widget([
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'options' => ['placeholder' => 'Fecha Creación'],
                    'model' => $searchModel,
                    'attribute' => 'fecha_creacion',
                    'pluginOptions' => [
                    'id' => 'fecha_creacion',
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy']
                  ]), 
                'options' => ['style' => 'width: 15%;']
            ],
            [
                'attribute' => 'cliente_id',    
                'format' => 'raw',
                'value'  =>  function ($data) { return $data->cliente->nombre; },
                'filter' =>null,
            ],
            ['attribute' => 'asesor_id',    
            'format' => 'raw',
            'value'  =>  function ($data) {  
                   if (!empty($data->asesor_id))
                      return $data->asesor->nombre; 
            },
            'filter' =>null,
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Casos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
