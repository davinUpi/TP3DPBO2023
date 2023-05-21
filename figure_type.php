<?php
/**
 * Intinya router
 */
include_once("controllers/figure_type.controller.php");

$controller = new FigureTypeController();
$keyword = '';
if(isset($_GET['keyword'])){
    $keyword = trim(htmlspecialchars($_GET['keyword']));
}
$order = 'asc';
if(isset($_GET['order'])){
    $order = $_GET['order'];
}
$controller->index($keyword, $order);