<?php
namespace Models;
/**
 * Interface untuk (pseudo)tabel2 view
 */

interface SQLViewTable{
    public function getAll($keyword = '');

    public function getById($id);
}