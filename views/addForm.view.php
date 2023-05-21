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