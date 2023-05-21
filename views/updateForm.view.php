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