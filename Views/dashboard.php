<?php
$model = array();
if (isset($_MODEL))  $model = $_MODEL;
?>

  <div class="white-board">
    <div class="content centered">
      <img src="http://www.freeiconspng.com/uploads/dashboard-icon-3.png" class="fix-left"  width="200" height="200" />
      <h1> Your own issues!</h1>
      <p> You can find all takss assigned to you here </p>
      <p> Tasks can be re-assigned later </p>
      <p> Total count: <?=count($model)?></p>
    </div>
  </div>
  <div class="centered view-container">
    <h1> My tasks </h1>
      <table>
      <thead>
        <tr>
          <th> Project key </th>
          <th> Task key </th>
          <th> Task name </th>
          <th> Task description </th>
          <th colspan="2"> Options </th>
        </tr>
      </thead>
      <tbody>
        <?php
foreach ($model as $task) { ?>
          <tr>
            <td>
              <?=$task->projectKey?>
            </td>
            <td>
              <a href="task.php?key=<?=$task->key?>">
                <?=$task->key?>
              </a>
            </td>
            <td>
              <?=$task->name?>
            </td>
            <td>
              <?=$task->description?>
            </td>
            <td>
              <a href="editTask.php?key=<?=$task->key?>"> Edit </a>
            </td>
            <td>
              <a href="deleteTask.php?key=<?=$task->key?>"> Delete </a>
            </td>
          </tr>
          <?php } ?>
      </tbody>
    </table>

  </div>