<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Update Post in thread: ' . ' ' . $model->thread->title;
$this->params['breadcrumbs'][] = ['label' => $model->thread->title, 'url' => ['thread/view', 'thread_id' => $model->thread->thread_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
