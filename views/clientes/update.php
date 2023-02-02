<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Actualizar Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="clientes-update">

    <h1><i class="bi bi-person-lines-fill"></i> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
