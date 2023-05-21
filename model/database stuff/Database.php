<?php
namespace Models;
class Database
{

    private $hostname;
    private $username;
    private $dbpass;
    private $dbname;
    private $mysqli;
    private $result;
    private $query;

    function __construct($hostname = '', $username = '', $dbpass = '', $dbname = ''){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname; 
    }

    public function open(){
        $this->mysqli = mysqli_connect($this->hostname, $this->username, $this->dbpass, $this->dbname);
    }

    protected function execute($query){
        $this->result = mysqli_query($this->mysqli, $query);
    }

    protected function getResult(){
        return mysqli_fetch_array($this->result);
    }

    protected function executeAffected($query = ""){
        mysqli_query($this->mysqli, $query);
        return mysqli_affected_rows($this->mysqli);
    }

    public function close()
    {
        mysqli_close($this->mysqli);
    }

}