<?php
  $model = new TaskViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>

<form action="" method="POST">
    <label name="taskname">Task Name</label>
    <input type="text" name="taskName" value="<?=$model->taskName?>"/>
    <label name="description">Task Description</label>
    <textarea rows="4" cols="50" name="taskDescription" value="<?=$model->taskDescription?>">
    </textarea>
    <input type="submit" value="Create" />
</form>