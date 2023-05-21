<?php
namespace Views;

include_once('ViewHandler.php');

class addFormView extends ViewHandler{

    public function __construct(string $filename = 'views/skins/figureForm.skin.html'){
        parent::__construct($filename);
    }

    public function render($data){

        $type = $data['type'];
        $man = $data['man'];

        // set value2 dropdown / html.select
        $type_dropdown = null;
        foreach($type as $val){
            $type_dropdown .= '
                <option value="'.$val["id"].'">'.$val["name"].'</option>
            ';
        }

        $man_dropdown = null;
        foreach($man as $val){
            $man_dropdown .='
            <option value="'.$val["id"].'" >'.$val["name"].'</option>
            ';
        }

        /**
         * modip skin
         * type_values untuk pilihan2 dropdown tipe
         * man_values untuk pilihan2 dropdown manufakturer
         * form_action untuk action="" dari <form>
         * show_preview untuk apakah <img id='preview'> ditampilkan di awal
         * btn_val untuk isi dari tombol form
         * req_img untuk img uploader, apakah harus upload atau nggak
         */
        $this->replace([
            'type_values' => $type_dropdown,
            'man_values' => $man_dropdown,
            'form_action' => "add.php",
            'show_preview' => "none",
            'btn_val' => "add",
            'req_img' => "required"
        ]);

        $this->write();
    }
}