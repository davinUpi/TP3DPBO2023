<?php

include_once('controllers/figure.controller.php');

$index = new FigureController();
$keyword = '';
if(isset($_GET['keyword'])){
    $keyword=$keyword = trim(htmlspecialchars($_GET['keyword']));
}
$index->index($keyword);