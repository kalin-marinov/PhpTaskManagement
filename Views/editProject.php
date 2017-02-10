<?php
$model = new CreateProjectViewModel();
if (isset($_MODEL)) $model = $_MODEL;
?>

  <form id="taskForm" action="/Pages/editProject.php/" method="POST" class="centered top-spaced">
    <h1> Edit project </h1>

    <label class="required" for="projectKey">Project Key</label>
    <input type="text" name="projectKey" value="<?=$model->projectKey?>" readonly />

    <label class="required" for="projectname">Project Name</label>
    <input type="text" name="projectName" value="<?=$model->projectName?>" readonly/>

    <label class="required" for="description">Project Description</label>
    <textarea rows="4" cols="50" name="projectDescription" required>
    <?=$model->projectDescription?>
    </textarea>

    <input type="submit" value="Update" />
    <p>
      <?= $model->errors ?>
    </p>
  </form>