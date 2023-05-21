<?php
namespace Models;
interface SQLTable{
    public function getAll($keyword = '', $sort = '');
    public function getById($id);
    public function insert($data);
    public function delete($id);
    public function update($id, $data);
}