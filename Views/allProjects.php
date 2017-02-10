<?php
$model = array();
if (isset($_MODEL))  $model = $_MODEL;
?>

  <div class="white-board">
    <div class="content centered">
      <img src="http://www.freeiconspng.com/uploads/project-icon-2.jpg" class="fix-left"  width="200" height="200" />
      <h1> A collection of all Projects </h1>
      <p> Your task are currently split into projects</p>
      <p> You may create new tasks and exists </p>
      <p> Place a summary here - How many projects</p>

    </div>
  </div>
  <div class="centered view-container">
    <table id="projectsTable">
      <thead>
        <tr>
          <th> Project key </th>
          <th> Project name </th>
          <th> Project description </th>
          <th> Options </th>
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
            <td> <a href="#"> Delete </a> </td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>