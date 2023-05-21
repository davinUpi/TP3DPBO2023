<?php

namespace Models;
include_once('Models.php');
class modelFigureInfo extends Database implements SQLViewTable{
    private $id;
    private $name;
    private $img;
    private $type;
    private $manufacturer;
    private $man_logo;

    public function getAll($keyword = '', $sort = ''){
        $arr = [];
        $query = "SELECT * FROM figure_info";
        if(!empty($keyword)){
            $query .= " WHERE name like '%".$keyword."%'";
            $query .= " OR type like '%".$keyword."%'";
            $query .= " OR manufacturer like '%".$keyword."%'";
        }
        $this->execute($query);
        while($result = $this->getResult()){
            $map = [
                'id' => $result['id'],
                'name' => $result['name'],
                'img' => $result['img'],
                'type' => $result['type'],
                'manufacturer' => $result['manufacturer'],
                'man_logo' => $result['man_logo']
            ];
            array_push($arr, $map);
            
        }

        return $arr;
    }

    public function getById($id){
        $query = "SELECT * FROM figure_info WHERE id = ".$id;
        $this->execute($query);
        $result = $this->getResult()[0];
        return [
            'id' => $result['id'],
            'name' => $result['name'],
            'img' => $result['img'],
            'type' => $result['type'],
            'manufacturer' => $result['manufacturer'],
            'man_logo' => $result['man_logo']
        ];
    }

}