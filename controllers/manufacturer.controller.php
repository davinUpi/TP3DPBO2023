<?php
include_once 'config/Config.php';              // db konfig
include_once('model/modelManufacturers.php');  // < -- model tabel manufakturer
include_once('views/manufacturer.view.php');   // < -- view tabel manufakturer

use Models\modelManufacturer;
use Views\ManufacturerView;
class ManufacturerController{

    private $mMan;
    function __construct(){
        $hostname = Config::$hostname;
        $username = Config::$username;
        $dbpass = Config::$dbpass;
        $dbname = Config::$dbname;
        $this->mMan = new modelManufacturer($hostname, $username, $dbpass, $dbname);
    }

    public function index($keyword = '', $order = 'asc'){
        $this->mMan->open();
        $data = $this->mMan->getAll($keyword, $order);
        $this->mMan->close();

        $view = new ManufacturerView();
        $view->render($data);
    }
}