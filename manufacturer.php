<?php

include_once('controllers/Manufacturer.controller.php');

$controller = new ManufacturerController();
$keyword = '';
$order = 'asc';
if(isset($_GET['keyword'])){
    $keyword = trim(htmlspecialchars($_GET['keyword']));
}
if(isset($_GET['order'])){
    $order = $_GET['order'];
}
$controller->index($keyword, $order);