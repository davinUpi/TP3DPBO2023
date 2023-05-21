<?php

include_once('config/Config.php');
include_once('model/modelFigures.php');

use Models\modelFigures;

class deleteController{
    private $mFigures;
    function __construct(){
        $hostname = Config::$hostname;
        $username = Config::$username;
        $dbpass = Config::$dbpass;
        $dbname = Config::$dbname;
        $this->mFigures = new modelFigures($hostname, $username, $dbpass, $dbname);
    }

    public function delete($id){
        $this->mFigures->open();
        $err = $this->mFigures->delete($id);
        $this->mFigures->close();
    }

}