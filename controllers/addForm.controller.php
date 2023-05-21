<?php

include_once('config/Config.php');             // < -- konfigurasi db
include_once('model/modelFigures.php');        // < -- model tabel figure 
include_once('model/modelFigureType.php');     // < -- model table tipe figure
include_once('model/modelManufacturers.php');  // < -- model tabel manufakturer
include_once('views/addForm.view.php');        // < -- view untuk form add

/**
 * pake namespace, jadi harus gini
 */
use Models\modelFigures;
use Models\modelFigureType;
use Models\modelManufacturer;
use Views\addFormView;
class addForm{
    private $mFigures;
    private $mFigureType;
    private $mMan;
    function __construct(){
        $hostname = Config::$hostname;
        $username = Config::$username;
        $dbpass = Config::$dbpass;
        $dbname = Config::$dbname;
        $this->mFigures = new modelFigures($hostname, $username, $dbpass, $dbname);
        $this->mFigureType = new modelFigureType($hostname, $username, $dbpass, $dbname);
        $this->mMan = new modelManufacturer($hostname, $username, $dbpass, $dbname);
    }
    public function form(){
        // Inisialisasi var data untuk nampung semua data
        $data = [
            'type' => null,
            'man' => null
        ];

        // pengambilan data tipe dan manufakturer via model masing2
        $this->mFigureType->open();
        $this->mMan->open();

        $data['type'] = $this->mFigureType->getAll();
        $data['man'] = $this->mMan->getAll();

        $this->mFigureType->close();
        $this->mMan->close();

        // render form-nya
        $view = new addFormView();
        $view->render($data);
    }

    public function add($input) : int{
        // pisah input: data untuk figure baru dan img yg diupload
        $data = $input['data'];
        $file = $input['file'];

        // memastikan semua field not null terpenuhi
        if(isset($data['name'], $data['type'], $data['manufacturer'], $file['image'])){
            $name = trim(htmlspecialchars($data['name']));
            $type = intval($data['type']);
            $man = intval($data['manufacturer']);
            $image = $file['image'];

            // memastikan nama tidak duplicate
            $this->mFigures->open();
            $figure = $this->mFigures->getAll($name);
            if(empty($figure)){

                // image handler
                $image_name = $image['name'];
                $image_tmp = $image['tmp_name'];
                $destination = "assets/img/figures/".$image_name;

                if(!file_exists($destination)){
                    move_uploaded_file($image_tmp, $destination);
                    printf("uploaded");
                }

                // memasukkan ke db
                if($this->mFigures->insert(
                    [
                        'name' => $name,
                        'img' => $image_name,
                        'type' => $type,
                        'man' => $man
                    ]
                ) > 0){
                    $this->mFigures->close();
                    return 0;
                }
                else{
                    $this->mFigures->close();
                    echo 'sql fail';
                    return 1;
                }
            }
            else{
                $this->mFigures->close();
                echo 'duplicate';
                return 1;
            }
        }
        else{
            echo 'form fail';
            return 1;
        }

    }
}