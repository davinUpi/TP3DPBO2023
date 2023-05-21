<?php

include_once 'config/Config.php';            // < -- konfig db
include_once('model/modelFigureType.php');   // < -- model untuk tabel tipe figure
include_once('views/figure_type.view.php');  // < -- view untuk tabel tipe figur

use Models\modelFigureType;
use Views\FigureTypeView;
class FigureTypeController{
    private $mFigureType;
    function __construct(){
        $hostname = Config::$hostname;
        $username = Config::$username;
        $dbpass = Config::$dbpass;
        $dbname = Config::$dbname;
        $this->mFigureType = new modelFigureType($hostname, $username, $dbpass, $dbname);
    }

    public function index($keyword = '', $order = 'asc'){  // < -- defaultnya asc
        $this->mFigureType->open();
        $data = $this->mFigureType->getAll($keyword, $order);
        $this->mFigureType->close();

        $view = new FigureTypeView();
        $view->render($data);
    }
}