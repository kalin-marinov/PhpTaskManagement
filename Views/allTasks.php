<?php
  $model = array();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>  

<table>
    <thead>
        <tr>
            <th> Project key </th>
            <th> Task key </th>
            <th> Task name </th>
            <th> Task description </th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($model as $task) { ?>
         <tr>
            <td> <?=$task->projectKey?> </td>
            <td> <a href="task.php?key=<?=$task->key?>"> <?=$task->key?></a> </td>
            <td> <?=$task->name?> </td>
            <td> <?=$task->description?> </td>
        </tr>
    <?php } ?> 
    </tbody>
</table>
