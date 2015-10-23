<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ThreadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thread-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'thread_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'thread_starter') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'replies') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'locked') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
