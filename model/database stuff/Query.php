<?php
/**
 * BELUM JALAN DAN MALES
 */
namespace Models;
class Query
{
    private $queryString;

    function __construct($string =""){
        $this->queryString = $string;
    }

    function get_as_string(){
        return $this->queryString;
    }

    function clear(){
        $this->queryString = "";
    }

    function select($table, $var_names = []){
        $this->queryString = "SELECT";
        if(empty($var_names)){
            $this->queryString .= "*";
        }
        else{
            foreach($var_names as $var){
                $this->queryString .= $var;
                if($var != end($var_names)){
                    $this->queryString .=",";
                }
            }
        }
        $this->queryString .= "FROM ".$table;
    }

    function insert($table, $collumns = []){
        $this->queryString = "INSERT INTO ".$table;
        if(!empty($collumns)){
            $this->queryString .= "(";
            foreach($collumns as $col){
                $this->queryString .= $col;
                if(end($collumns) != $col){
                    $this->queryString .= ",";
                }
            }
            $this->queryString .= ")";
        }
    }

    function update($table){
        $this->queryString = "UPDATE ".$table;
    }

    function delete($table){
        $this->queryString = "DELETE FROM ".$table;
    }

    function values($values){
        $this->queryString .= "(";
        foreach($values as $val){
            if(is_string($val)){
                $this->queryString .= "'".$val."'";
            }
            else{
                $this->queryString .= $val;
            }

            if(end($values) != $val){
                $this->queryString .= ",";
            }
        }
        $this->queryString .= ")";
    }
    
    function set($col_and_val = []){
        if(!empty($col_and_val)){
            $last = end($col_and_val);
            reset($col_and_val);
            foreach($col_and_val as $col => $val){
                $this->queryString .= $col ." = ". $val;
                if(!strcasecmp($last, $val)){
                    $this->queryString .= ", ";
                }
            }
        }
    }

    function sets($collumns = [], $values = []){
        if((!empty($collumns) && !empty($values)) && (count($collumns) == count($values))){
            
        }
    }
}