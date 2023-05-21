<?php

namespace Views;
include_once('ViewHandler.php');
class IndexView extends ViewHandler{

    public function __construct(string $filename = 'views/skins/index.skin.html'){
        parent::__construct($filename);
    }
    
    public function render($data){

        $figure_cards = null;
        foreach($data as $val){
            $figure_cards .= '
            <div class=" card w-25 h-auto m-5">
                <div class=" card-header">
                    <img src="assets/img/figures/'.$val["img"].'" class=" card-img img-thumbnail ">
                </div>
                <div class=" card-body">
                    <h5 class=" card-title">'.$val["name"].'</h5>
                    <p class=" card-subtitle">'.$val["type"].'</p>
                    <div class="row">
                        <p class=" col card-text">'.$val["manufacturer"].'</p>
                        <img src="assets/img/logo/'.$val["man_logo"].'" class=" col img-fluid">
                    </div>
                </div>
                <div class=" card-footer">
                    <div class=" d-flex justify-content-around">
                        <a href="update.php?id='.$val['id'].'"><button class=" btn btn-warning m-2"><i class="fa-solid fa-wrench"></i></button></a>
                        <a href="delete.php?id='.$val['id'].'"><button class=" btn btn-danger m-2"><i class="fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>
            </div>
            ';
        }
        $this->replace([
            'figures_card' => $figure_cards,
            'search_action' => "index.php",
            'search_label' => "Search_figures"
    ]);
        $this->write();
    }

}