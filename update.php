<?php
/**
 * Intinya router
 */
include_once('controllers/updateForm.controller.php');

$updateForm = new UpdateForm();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = [
        'data' => $_POST,
        'file' => $_FILES
    ];

    ($updateForm->updateFigure($data) == 0)?(header('location: index.php')):('');

}
else{
    $updateForm->updateForm($_GET['id']);
}