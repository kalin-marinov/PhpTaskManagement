<?php
require_once(__DIR__.'/../helpers/common.php');
Page::Authorize();

require_once(__DIR__.'/../factories/DataFactory.php');
require_once(__DIR__.'/../data/models/comment.php');

$commentManager = DataFactory::createCommentManager();
$userManager = DataFactory::createUserManager();

$model = new Comment();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->fromArray(Page::modifyAllInputs($_POST));
    $userName= $userManager->getCurrentUser()->username;
    $model->userId = $userManager->getUserId($userName);

    $result = $commentManager->addComment($model);
    return Page::Json(array("result" => $result));
} else{
    header('status_code', 405);
    exit();
}

?>