<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casos */

$this->title = 'Actualizar Casos';
$this->params['breadcrumbs'][] = ['label' => 'Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="casos-update">

    <h1><i class="bi bi-filter-square"></i> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
