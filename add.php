<?php

include_once('controllers/addForm.controller.php');

$figureForm = new addForm();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = [
        'data' => $_POST,
        'file' => $_FILES
    ];
    ($figureForm->add($data) == 0)?(header('location: index.php')) : "";
}
else{
    $figureForm->form();
}