<?php
$model = new CreateTaskViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>

  <form id="task-form" action="/Pages/editTask.php/" method="POST" class="centered">
    <h1> Edit Task </h1>
    <label class="required" for="taskKey">Taks Key</label>
    <input type="text" name="taskKey" value="<?=$model->taskKey?>" readonly/>

    <label class="required" for="taskname">Task Name</label>
    <input type="text" name="taskName" value="<?=$model->taskName?>" />

    <label name="taskDescription">Task Description</label>
    <textarea rows="4" cols="50" name="taskDescription" >
      <?=$model->taskDescription?>
    </textarea>

    <label class="required" for="selectedKey">Project Key</label>
    <select name="selectedKey" readonly>
      <option value="<?=$model->selectedKey?>"><?=$model->selectedKey?></option>
   </select> 

    <input type="submit" value="Update" />
    <p>
        <?= $model->errors ?>
    </p>
  </form>
