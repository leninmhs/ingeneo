<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Nuevo cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-create">

    <h1> <i class="bi bi-person-square"></i> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
