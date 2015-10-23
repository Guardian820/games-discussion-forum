<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThreadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Threads';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="thread-index">

   
    <h1><?= Html::encode($this->title)." / List of Games" ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Post New Game', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'thread_table'],
        'rowOptions' => function ($model, $key, $index, $grid) {
                return [
                            'id'            => $model['thread_id'], 
                            'onclick'       => 'location.href="index.php?r=thread/view&thread_id="+this.id;',
                            'style'         => "cursor: pointer",
                            
                ];
        },
        'columns' => [
           
        //['class' => 'yii\grid\SerialColumn'],
            //'created_at',
            //'updated_at',
            'title',
            'genre',
            'developers',
            //'replies',
            //'views',
            /*[
             'label'=>'Image',
             'format'=>'raw',
             'value' => function ($data) {
                return Html::img($data['picture'],
                    ['width' => '250px']);
            },


             
            ],*/

            
            //'thread_starter',
            //['label'=>'Poster', 'value'=> 'user.username'
            //],


            /*[
             'label'=>'Description',
             'value' => function ($data) {
                return preg_replace('/\s+?(\S+)?$/', '', substr($data['description'], 0, 701));
            },


            ],*/

            /*[
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    $url ='index.php?r='.$this->context->id.'/'.$action.'&thread_id='.$model->thread_id;
                    return $url;
                }

            ],*/
        ],
    ]); ?>

</div>
