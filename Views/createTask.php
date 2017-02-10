<?php
$model = new CreateTaskViewModel();
if (isset($_MODEL)) $model = $_MODEL;
?>

  <form action="/Pages/CreateTask.php/" method="POST">
    <label name="taskKey">Taks Key</label>
    <input type="text" name="taskKey" value="<?=$model->taskKey?>" />

    <label name="taskname">Task Name</label>
    <input type="text" name="taskName" value="<?=$model->taskName?>" />

    <label name="taskDescription">Task Description</label>
    <textarea rows="4" cols="50" name="taskDescription" value="<?=$model->taskDescription?>">
    </textarea>

    <label name="projectKey">Project Key</label>
    <input type="text" name="projectKey" value="<?=$model->projectKey?>" />

    <input type="submit" value="Create" />
    <p>
      <?= $model->errors ?>
    </p>
  </form>