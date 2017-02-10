<?php
$model = new TaskViewModel();
if (isset($_MODEL))  $model = $_MODEL;
?>

  <div class="content centered">
    <h1> Task: <?=$model->taskName ?> </h1>
    <hr />

    <table>
      <tr>
        <td> Project: </td>
        <td>
          <?=$model->projectKey?>
        </td>
      </tr>
      <tr>
        <td>Task key: </td>
        <td>
          <?=$model->taskKey?>
        </td>
      </tr>

    </table>

    <hr>
    <h2> Description: </h2>
    <p class="text-box">
      <?=$model->taskDescription ?>
    </p>



    <div class="white-board">

      <h3> Comments: </h3>
      <?php
if(count($model->comments) > 0)
{
    foreach($model->comments as $comm){ ?>
        <p>
          Comment from user:
          <?=$comm->userId?> at
            <?=$comm->time?>
              <br/>
              <?=$comm->description ?>
        </p>
        <?php }
}
else {?>
          <p> No comments on this task at the moment. </p>
          <?php }?>
    </div>
  </div>