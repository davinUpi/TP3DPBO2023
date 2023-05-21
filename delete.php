<?php
/**
 * Intinya router
 */
include_once('controllers/delete.controller.php');

$delete = new deleteController();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $delete->delete($_GET['id']);
}
header('location: index.php');