<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Thread */

$this->title = 'Update Thread: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'thread_id' => $model->thread_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thread_table forcepad">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
