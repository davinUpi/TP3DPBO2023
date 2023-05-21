<?php
namespace Models;
include_once('Models.php');
class modelManufacturer extends Database implements SQLTable{

    private $id;
    private $name;
    private $logo;
    private $num_figure;

    /**
     * Mengembalikan hasil dalam bentuk arr
     */
    public function getAll($keyword = '', $sort = ''){
        $arr = [];

        $query = "SELECT * from manufacturers";
        if(!empty($keyword)){
            $query .= " WHERE man_name LIKE '%".$keyword."%'";
        }

        if(isset($sort)){
            $query .= " ORDER BY man_figure";
            (strcasecmp('dsc', $sort) == 0) ? ($query .= ' DESC') : ($query .= ' ASC');
        }

        $this->execute($query);
        while($result = $this->getResult()){
            $map = [
                "id" => $result['man_id'],
                "name" => $result['man_name'],
                "logo" => $result['man_logo'],
                "num_figure" => $result['man_figure']
            ];
            array_push($arr, $map);
        }

        return $arr;
    }

    /**
     * Ngambil satu berdasarkan id
     */
    public function getById($id){
        $query = "SELECT * FROM manufacturers WHERE man_id = ".$id;
        $this->execute($query);
        $result = $this->getResult()[0];
        return [
            'id' => $this->$result['man_id'],
            'name' => $this->$result['man_name'],
            'logo' => $this->$result['man_logo'],
            'num_figure' => $this->$result['man_figure']
        ];
    }

    public function insert($data){
        $name = $data['name'];
        $logo = $data['logo'];
        $query = "INSERT INTO manufacturers(man_name, man_logo) VALUES('".$name."', '".$logo."')";
        return $this->executeAffected($query);
    }

    public function update($id, $data){
        $name = $data['name'];
        $logo = $data['logo'];

        $query .= "UPDATE manufacturers SET man_name = '".$name. "', man_logo = '".$logo;
        $query .= "WHERE man_id = ".$id;
        return $this->executeAffected($query);
    }

    public function delete($id){
        $query = "DELETE FROM manufacturers WHERE man_id = ".$id;
        return $this->executeAffected($query);
    }

};