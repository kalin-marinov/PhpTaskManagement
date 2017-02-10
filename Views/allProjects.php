<?php
$model = array();
if (isset($_MODEL))  $model = $_MODEL;
?>

<h1> Projects </h1>
  <div class="white-board">
    <div class="content centered">
      <img src="http://www.freeiconspng.com/uploads/project-icon-2.jpg" class="fix-left"  width="200" height="200" />
      <h1> A collection of all Projects </h1>
      <p> Your task are currently split into projects</p>
      <p> You may create new tasks and exists </p>
      <p> Total ammount of projects <?=count($model)?></p>

    </div>
  </div>
  <div class="centered view-container">
    <table id="projectsTable">
      <thead>
        <tr>
          <th> Project key </th>
          <th> Project name </th>
          <th> Project description </th>
          <th colspan=2> Options </th>
        </tr>
      </thead>
      <tbody>
        <?php
foreach ($model as $proj) { ?>
          <tr>
            <td>
              <a href="project.php?key=<?=$proj->key?>">
                <?=$proj->key?>
              </a>
            </td>
            <td>
              <?=$proj->name?>
            </td>
            <td>
              <?=$proj->description?>
            </td>
            <td> <a href="editProject.php?key=<?=$proj->key?>"> Edit </a> </td>
            <td> <a href="deleteProject.php?key=<?=$proj->key?>"> Delete </a> </td>
          </tr>
          <?php } ?>
      </tbody>
    </table>

      <a class="btn-white" href="/pages/CreateProject.php"> Create New </a>
  </div>