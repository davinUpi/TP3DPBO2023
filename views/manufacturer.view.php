<?php
namespace Views;

include_once('ViewHandler.php');

class ManufacturerView extends ViewHandler{

    public function __construct(string $filename = 'views/skins/table.skin.html'){
        parent::__construct($filename);
    }
    public function render($data){
        $table_name = "Manufacturers";

        $tablehead = '
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Number of Figures</th>
        </tr>
        ';

        $tablebody = null;
        $no = 0;
        foreach($data as $val){
            $no++;
            $tablebody .= '
            <tr>
                <td>'.$no.'</td>
                <td>'.$val["name"].'</td>
                <td><img src="assets/img/logo/'.$val["logo"].'" class=" img-thumbnail"></td>
                <td>'.$val["num_figure"].'</td>
            </tr>
            ';
        }
        /**
         * search action untuk aksi form
         * search label untuk label searchbar
         * table_name untuk nama tabel
         * tablehead untuk nama2 kolom tabel
         * tablebody untuk baris2 isi tabel
         */
        $replace = [
            'search_action' => "manufacturer.php",
            'search_label' => "Search Manufacturers",
            'table_name' => $table_name,
            'table_head' => $tablehead,
            'table_body' => $tablebody,
        ];
        $this->replace($replace);
        $this->write();
    }
}