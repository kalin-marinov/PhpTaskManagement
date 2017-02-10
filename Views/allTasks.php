<?php
$model = array();
if (isset($_MODEL))  $model = $_MODEL;
?>

  <div class="white-board">
    <div class="content centered">
      <img src="https://freeiconshop.com/wp-content/uploads/edd/task-done-flat.png" class="fix-left" />
      <h1> A collection of all tasks </h1>
      <p> Your task are currently split into projects</p>
      <p> You may create new tasks and exists </p>
      <p> Total amaunt of available tasks: <?=count($model) ?></p>

    </div>
  </div>


  <div class="centered view-container">
    <h1> Tasks </h1>
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

    <a class="btn-white" href="/pages/CreateTask.php"> Create New </a>

    <p> Unable to find the task you are looking for? </p>
    <p> <a href="/pages/allprojects.php"> Try searching by project instead </a>
  </div>