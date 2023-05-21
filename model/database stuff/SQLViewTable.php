<?php
namespace Models;
interface SQLViewTable{
    public function getAll($keyword = '');

    public function getById($id);
}