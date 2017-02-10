<?php
$model = new CreateProjectViewModel();
if (isset($_MODEL)) $model = $_MODEL;
?>

  <form action="/Pages/CreateProject.php/" method="POST">

    <label name="projectKey">Project Key</label>
    <input type="text" name="projectKey" value="<?=$model->projectKey?>" required />

    <label name="projectname">Project Name</label>
    <input type="text" name="projectName" value="<?=$model->projectName?>" required/>

    <label name="description">Project Description</label>
    <textarea rows="4" cols="50" name="projectDescription" value="<?=$model->projectDescription?>" required>
    </textarea>

    <input type="submit" value="Create" />
    <p>
      <?= $model->errors ?>
    </p>
  </form>