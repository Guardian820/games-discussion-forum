<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* In the end, i didn't use these widgets because it's too hard to customize
use yii\grid\GridView;
use yii\widgets\ListView;
*/
if(strlen($model->picture)<5) //Default Cover if not set
{
    $model->picture = "no_cover.png";
}
//$user_role = \Yii::$app->user->identity->role;

//if (\Yii::$app->user->can('editThread', ['post' => $model])) {
 //   echo "<br><br><br><br><br>I can edit all post!"; 
//} 

/* @var $this yii\web\View */
/* @var $model app\models\Thread */


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thread-view">

    
    &nbsp;<kbd>Discussion started by <span class="role_<?= $model->user->role; ?>"><?= $model->user->username; ?></span> on <i><?= date('d F Y',strtotime($model->created_at)); ?></i>. </kbd>


<table class="thread_table">
  <tr valign="top">
    <td width="170">
        <img class="forum_avatar" src="images/avatar/<?php if($model->user->avatar==null){ echo "no_avatar.gif"; } else { echo $model->user->avatar; }; ?>">
        <div class="forum_username role_<?= $model->user->role; ?>"><?= $model->user->username; ?></div>
        <div class="forum_user_details">Join Date: <?= date('M Y',$model->user->created_at); ?><br>
        Posts: -<br>
        Reputation: -<br>
        </div>

    </td>

    <td class="thread_td">
        

        <div class="thread_title"><?= $model->title; ?></div>
        <img class="thread_cover" src="images/cover/<?= $model->picture; ?>">
        <div class="thread_description"><?= $model->description; ?></div>
        <br>
        <div class="thread_info">
        Initial Release Date <br><kbd><?= date('d F Y',strtotime($model->release_date)); ?></kbd><br><br>
        Genres               <br><kbd><?= $model->genre; ?></kbd><br><br>
        Producers            <br><kbd><?= $model->producers; ?></kbd><br><br>
        Developers           <br><kbd><?= $model->developers; ?></kbd><br><br>
        Composers            <br><kbd><?= $model->composers; ?></kbd><br><br>
        Designers            <br><kbd><?= $model->designers; ?></kbd>
        </div><br><br>

    </td>
  </tr>
</table>


    <p>
        <?= Html::a('New Comment', ['post/create', 'thread_id' => $model->thread_id], ['class' => 'btn btn-success forceright']) ?>
        <?= Html::a('Edit Thread', ['update', 'thread_id' => $model->thread_id], ['class' => 'btn btn-primary forceright']) ?>

        <?= Html::a('Delete Thread', ['delete', 'thread_id' => $model->thread_id], [
            'class' => 'btn btn-danger forceright',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <br><br>
    <?php foreach ($model->post as $model2) { 
    //echo $model2->content;
        ?>
    
        <div>&nbsp;<kbd>Posted on <?= date('d F Y, h:i:s A',strtotime($model2->created_at)); ?></kbd></div>
    <table class="thread_table">
  <tr valign="top">
    <td width="170">
        <img class="forum_avatar" src="images/avatar/<?php if($model2->user->avatar==null){ echo "no_avatar.gif"; } else { echo $model2->user->avatar; }; ?>">
        <div class="forum_username role_<?= $model2->user->role; ?>"><?= $model2->user->username; ?></div>
        <div class="forum_user_details">Join Date: <?= date('M Y',$model2->user->created_at); ?><br>
        Posts: -<br>
        Reputation: -<br>
        </div>

    </td>

    <td class="thread_td">
        <?= nl2br($model2->content); ?>
    </td>
  </tr>
</table>
        
        
        <?= Html::a('Edit Comment', ['post/update', 'post_id' => $model2->post_id], ['class' => 'btn btn-primary forceright']) ?>

        <?= Html::a('Delete Comment', ['post/delete', 'post_id' => $model2->post_id], [
            'class' => 'btn btn-danger forceright',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <br><br>
<?php } ?>
</div>

