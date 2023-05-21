<?php
namespace Views;
include_once('ViewHandler.php');

class updateFormView extends ViewHandler{

    public function __construct(string $filename = 'views/skins/figureForm.skin.html'){
        parent::__construct($filename);
    }

    public function render($data){
        $figure = $data['figure'];
        $type = $data['type'];
        $man = $data['man'];

        $fig_id = $figure['id'];
        $fig_name = $figure['name'];
        $fig_img = $figure['img'];
        $fig_type = $figure['type'];
        $fig_man = $figure['man'];

        $type_dropdown = null;
        foreach($type as $val){
            if($val['id'] == $fig_type){
                $type_dropdown .= '
                <option value="'.$val["id"].'" selected>'.$val["name"].'</option>';
            }
            else{
                $type_dropdown .= '
                <option value="'.$val["id"].'">'.$val["name"].'</option>';
            }
        }

        $man_dropdown = null;
        foreach($man as $val){
            if($val['id'] == $fig_man){
                $man_dropdown .= '
                <option value="'.$val["id"].'" selected>'.$val["name"].'</option>';
            }
            else{
                $man_dropdown .= '
                <option value="'.$val["id"].'">'.$val["name"].'</option>';
            }
        }

        /**
         * modip skin
         * type_values untuk pilihan2 dropdown tipe
         * man_values untuk pilihan2 dropdown manufakturer
         * form_action untuk action="" dari <form>
         * show_preview untuk apakah <img id='preview'> ditampilkan di awal
         * btn_val untuk isi dari tombol form
         * req_img untuk img uploader, apakah harus upload atau nggak
         * fig_id untuk id figure yang disimpan di hidden
         * name_val untuk nama figur saat ini
         * img_val untuk menampilkan img figure saat ini
         * hidden-img-val untuk img-figure saat ini
         */
        $replace = [
            'type_values' => $type_dropdown,
            'man_values' => $man_dropdown,
            'fig_id' => '<input type="hidden" value="'.$fig_id.'" name="id">',
            'name_val' => $fig_name,
            'img_val' => 'assets/img/figures/'.$fig_img,
            'show_preview' => "block",
            'form_action' => "update.php",
            'btn_val' => "update",
            'hidden-img-val' => $fig_img
        ];

        $this->replace($replace);
        $this->write();
        
    }
}