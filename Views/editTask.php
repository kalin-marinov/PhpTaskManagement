<?php
$model = new CreateTaskViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>


  <div class="content centered">

    <form id="task-form" action="/Pages/editTask.php/" method="POST" class="centered">
      <h1> Edit Task </h1>
      <label class="required" for="taskKey">Taks Key</label>
      <input type="text" name="taskKey" value="<?=$model->taskKey?>" readonly/>



      <label class="required" for="taskname">Task Name</label>
      <input type="text" name="taskName" value="<?=$model->taskName?>" />


      <label class="required" for="selectedKey">Project Key</label>
      <select name="selectedKey" readonly>
        <option value="<?=$model->selectedKey?>">
          <?=$model->selectedKey?>
        </option>
      </select>
      

       <label class="required" for="selectedKey">User</label>
      <select name="selectedUser" readonly>       
          <option value="<?=$model->selectedUser?>">
            <?=$model->selectedUser?>
          </option>
      </select>

      <input type="submit" value="Update" />
      <p>
        <?= $model->errors ?>
      </p>
    </form>
  </div>