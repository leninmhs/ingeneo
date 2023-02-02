<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asesores */

$this->title = 'Actualizar Asesores';
$this->params['breadcrumbs'][] = ['label' => 'Asesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="asesores-update">

    <h1><i class="bi bi-person-lines-fill"></i> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
