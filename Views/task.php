<?php
$model = new TaskViewModel();
if (isset($_MODEL))  $model = $_MODEL;
?>

  <div class="content centered">
    <h1> Task: <?=$model->taskName ?> </h1>

    <table class="details-table">
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
      <tr>
        <td>Assigned User: </td>
        <td>
          <?=$model->user?>
        </td>
      </tr>
    </table>

    <h2 class="description-header"> Description: </h2>
    <p class="item-description">
      <?=$model->taskDescription ?>
    </p>


    <h2> Comments: </h2>
    <hr>
    <section id="comments">
            <?php
              if(count($model->comments) > 0)
              {
                  foreach($model->comments as $comm){ ?>
                      <div class="comment">
                        <img src="https://t4.ftcdn.net/jpg/01/07/85/89/240_F_107858989_SJogeLthvc6WZ6lP6EsuLlxIRNtsz4JH.jpg" width="64" height="64" class="fix-left" />
                        <div class="comment-body">

                        <h3> <?= $comm->username ?> </h3>
                        <i> <?= $comm->time?> </i>
                        <p> <?= $comm->description ?> </p>      
                        </div>             
                      </div>
                      <?php }
              }
              else {?>
                        <p> No comments on this task at the moment. </p>
                <?php }?>
    </section>

    <div class="post-comment" data-task-key=" <?=$model->taskKey?>">
      <h3> Post a comment </h3>
      <textarea rows="5" cols="40" placeholder="your comment"></textarea>
      <button class="btn-white"> Add Comment </button>
    </div>



  </div>