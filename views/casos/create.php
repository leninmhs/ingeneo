<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casos */

$this->title = 'Nuevo Caso';
$this->params['breadcrumbs'][] = ['label' => 'Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casos-create">

    <h1><i class="bi bi-filter-square"></i> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
