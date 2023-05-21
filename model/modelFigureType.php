<?php
namespace Models;
include_once('Models.php');
class modelFigureType extends Database implements SQLTable{

    private $id;
    private $name;
    private $num_figure;

    /**
     * Mengembalikan hasil dalam bentuk arr
     */
    public function getAll($keyword = "", $sort = ''){
        $arr = [];

        $query = "SELECT * FROM figure_type";

        if(isset($sort)){
            $query .= " ORDER BY ftype_figure";
            (strcasecmp('dsc', $sort) == 0) ? ($query .= ' DESC') : ($query .= ' ASC');
        }

        $this->execute($query);
        while($result = $this->getResult()){
            $map = [
                'id' => $result['ftype_id'],
                'name' => $result['ftype_name'],
                'num_figure' => $result['ftype_figure']
            ];
            array_push($arr, $map);
        }

        return $arr;
    }

    /**
     * Ngambil satu berdasarkan id
     */
    public function getById($id){
        $query = "SELECT * FROM figure_type WHERE ftype_id = ".$id;
        $this->execute($query);
        $result = $this->getResult()[0];
        return [
            'id' => $result['ftype_id'],
            'name' => $result['ftype_name'],
            'num_figure' => $result['ftype_figure']
        ];
    }

    public function insert($data){
        $name = $data['name'];
        $query = "INSERT INTO figure_type(ftype_name) values('".$name."')";
        return $this->executeAffected($query);
    }

    public function update($id, $data){
        $name = $data['name'];
        $query = "UPDATE figure_type SET ftype_name = '".$name."' WHERE ftype_id = ".$id;
        return $this->executeAffected($query);
    }

    public function delete($id){
        $query = "DELETE FROM figure_type WHERE ftype_id =".$id;
        return $this->executeAffected($query);
    }

}