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
            <th> Project name </th>
            <th> Project description </th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($model as $proj) { ?>
         <tr>
            <td> <?=$proj->key?> </td>
            <td> <?=$proj->name?> </td>
            <td> <?=$proj->description?> </td>
        </tr>
    <?php } ?> 
    </tbody>
</table>
