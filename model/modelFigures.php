<?php

namespace Models;
include_once('Models.php');
class modelFigures extends Database implements SQLTable{

    private $id;
    private $name;
    private $img;
    private $type;
    private $man;

    public function getAll($keyword='', $sort = ''){
        $arr = [];
        $query = "SELECT * FROM figures";
        if(!empty($keyword)){
            $query .= " WHERE fig_name like '%".$keyword."%'";
        }
        $this->execute($query);
        while($result = $this->getResult()){
            $map = [
                'id' => $result['fig_id'],
                'name' => $result['fig_name'],
                'img' => $result['fig_img'],
                'type' => $result['fig_type'],
                'man' => $result['fig_man']
            ];
            array_push($arr, $map);
        }

        return $arr;
    }

    public function getById($id){
        $query = "SELECT * FROM figures ";
        $query .= "WHERE fig_id = ".intval($id);
        $this->execute($query);
        $result = $this->getResult();
        return [
            'id' => $result['fig_id'],
            'name' => $result['fig_name'],
            'img' => $result['fig_img'],
            'type' => $result['fig_type'],
            'man' => $result['fig_man']
        ];
    }

    public function insert($data){
        $name = $data['name'];
        $img = $data['img'];
        $type = $data['type'];
        $man = $data['man'];
        $query = "INSERT INTO figures(fig_name, fig_img, fig_type, fig_man)";
        $query .= "VALUES('".$name."', '".$img."', ".$type.", ".$man.")";
        return $this->executeAffected($query);
    }

    public function update($id, $data){
        $name = $data['name'];
        $img = $data['img'];
        $type = $data['type'];
        $man = $data['man'];

        $query = "UPDATE figures SET ";
        $query .= "fig_name = '".$name."', fig_img = '".$img."', ";
        $query .= "fig_type = ".$type.", fig_man = ".$man;
        $query .= " WHERE fig_id = ".$id;
        return $this->executeAffected($query);
    }

    public function delete($id){
        $query = "DELETE FROM figures WHERE fig_id = ".$id;
        return $this->executeAffected($query);
    }

}