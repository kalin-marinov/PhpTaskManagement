<?php
$model = new CreateTaskViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>

  <form id="task-form" action="/Pages/CreateTask.php/" method="POST" class="centered">
    <h1> Create new Task </h1>
    <label class="required" for="taskKey">Taks Key</label>
    <input type="text" name="taskKey" value="<?=$model->taskKey?>" />

    <label class="required" for="taskname">Task Name</label>
    <input type="text" name="taskName" value="<?=$model->taskName?>" />

    <label name="taskDescription">Task Description</label>
    <textarea rows="4" cols="50" name="taskDescription" value="<?=$model->taskDescription?>">
    </textarea>

    <label class="required" for="projectKey">Project Key</label>
    <select name="projectKey[]" >
    <?php foreach($model->projectKeys as $key) { ?>
      <option value="<?=$key->key?>"><?=$key->key?></option>
    <?php } ?>
   </select> 

    <input type="submit" value="Create" />
    <p>
        <?= $model->errors ?>
    </p>
  </form>
