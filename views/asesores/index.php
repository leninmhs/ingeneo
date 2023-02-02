<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsesoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asesores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesores-index">

    <h1><i class="bi bi-person-lines-fill"></i> <?= Html::encode($this->title) ?></h1>
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
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id', 
                'options' => ['style' => 'width: 5%;']
            ],
            'cedula',
            'nombre',
            'usuario',
            //'clave:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Asesores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
