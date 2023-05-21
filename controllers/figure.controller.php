<?php

include_once 'config/Config.php';           // < -- konfig db
include_once('model/modelFigureInfo.php');  // < -- model table view figure_info
include_once('views/index.view.php');       // < -- view untuk index
use Models\modelFigureInfo;
use Views\IndexView;

class FigureController{

    private $modelViewFigInfo;

    function __construct(){
        $hostname = Config::$hostname;
        $username = Config::$username;
        $dbpass = Config::$dbpass;
        $dbname = Config::$dbname;
        $this->modelViewFigInfo = new modelFigureInfo($hostname, $username, $dbpass, $dbname);
    }

    public function index($keyword = ''){
        $this->modelViewFigInfo->open();
        $data = $this->modelViewFigInfo->getAll($keyword);
        $this->modelViewFigInfo->close();
        $view = new IndexView();
        $view->render($data);
    }

}