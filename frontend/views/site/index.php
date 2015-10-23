<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$connection = Yii::$app->getDb();

//Get Latest record from thread table
$command = $connection->createCommand('
    SELECT *
    FROM user, thread
    WHERE picture is not null
    AND thread.thread_starter = user.id
    order by thread_id desc
    limit 0,1
    ');

$model = $command->queryAll();


//var_dump($model); exit;

$this->title = Yii::$app->name;
?>

<div class="site-index">
    <kbd>Special Events</kbd> <kbd>Moderator</kbd> <kbd>12 October 2015</kbd>
    <div class="special_events">
        <img style="float: left; margin: 0px 15px 15px 0px;" src="images/BlizzCon.jpg">
        <img style="float: left; margin: 0px 15px 0px 0px;" src="images/blizzcon2015_header_ENUS.png">
        You’ve been summoned to Southern California for BlizzCon 2015! Blizzard’s ninth epic gaming convention and community celebration is returning to the Anaheim Convention Center on Friday, November 6 and Saturday, November 7, 2015. Form a party with your fellow members of the Blizzard community and get ready for two days of in-depth discussion panels with our developers, hands-on play time with the latest Blizzard games, and intense eSports tournaments featuring top pro gamers from around the world.
        BlizzCon 2015 tickets will go on sale in two batches on Wednesday, April 15 at 7 p.m. PT and Saturday, April 18 at 10 a.m. PT through the online event ticketing service Eventbrite, priced at $199 each (plus applicable taxes and fees). Check out the BlizzCon Ticket webpage for all the details.
    </div>
    <br>
    <kbd>Announcements</kbd> 
    <kbd>Administrator</kbd> 
    <kbd>10 October 2015</kbd> <pre class="news">You can now use image from anywhere for your game cover.</pre>
    <kbd>Announcements</kbd> 
    <kbd>Administrator</kbd> 
    <kbd>7 October 2015</kbd> <pre class="news">Hello world. Website officially launches today.</pre>

    <?php if(!empty($model))
    { 
        $model = $model[0]; ?>
    <kbd>Latest Thread</kbd> 
    <kbd><?=  date('d F Y',strtotime($model['created_at'])); ?></kbd> 
    <kbd><span class="role_<?= $model['role']; ?>"><?=  $model['username']; ?></span></kbd> 
    <table class="thread_table">
      <tr valign="top">
        <td class="thread_td">
            <?= Html::a($model['title'], ['/thread/view','thread_id' => $model['thread_id']], ['class'=>'thread_title']) ?>
            <img class="thread_cover" src="images/cover/<?= $model['picture']; ?>">
            <br/>
            <div class="thread_info">
            Initial Release Date <br><kbd><?= date('d F Y',strtotime($model['release_date'])); ?></kbd><br><br>
            Genres               <br><kbd><?= $model['genre']; ?></kbd><br><br>
            Producers            <br><kbd><?= $model['producers']; ?></kbd><br><br>
            Developers           <br><kbd><?= $model['developers']; ?></kbd><br><br>
            Composers            <br><kbd><?= $model['composers']; ?></kbd><br><br>
            Designers            <br><kbd><?= $model['designers']; ?></kbd>
            </div><br/>
            <div class="thread_description"><?= $model['description']; ?></div>
            <br><br>
        </td>
      </tr>
    </table>
    <?php } ?>
</div>
