<?php
$model = new CreateProjectViewModel();
if (isset($_MODEL)) $model = $_MODEL;
?>

  <form id="taskForm" action="/Pages/CreateProject.php/" method="POST" class="centered top-spaced">
    <h1> Create new project </h1>

    <label class="required" for="projectKey">Project Key</label>
    <input type="text" name="projectKey" value="<?=$model->projectKey?>" required />

    <label class="required" for="projectname">Project Name</label>
    <input type="text" name="projectName" value="<?=$model->projectName?>" required/>

    <label class="required" for="description">Project Description</label>
    <textarea rows="4" cols="50" name="projectDescription" value="<?=$model->projectDescription?>" required>
    </textarea>

    <input type="submit" value="Create" />
    <p>
      <?= $model->errors ?>
    </p>
  </form>