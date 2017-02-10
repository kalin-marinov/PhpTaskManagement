<?php
  $model = new TaskViewModel();
    if (isset($_MODEL)) {
        $model = $_MODEL;
    }
?>  

<div class="content">

<h1> This task is part of the project with key: <?=$model->projectKey?>
<h2> Task name: <?=$model->taskName ?> </h2>
<h3> Task key: <?=$model->taskKey?> </h3>
<h3> Description: </h3>
<p>
<?=$model->taskDescription ?>
</p>
<h3> Comments: </h3>
<?php 
if(count($model->comments) > 0)
{
    foreach($model->comments as $comm){ ?>
        <p> 
            Comment from user: <?=$comm->userId?> at <?=$comm->time?> <br/>
            <?=$comm->description ?>
        </p>
    <?php }
}
    else {?>
    <p> No comments on this task at the moment. </p>
   <?php }?>
</div>