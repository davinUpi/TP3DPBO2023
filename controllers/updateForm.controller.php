<?php

include_once('config/Config.php');
include_once('model/modelFigures.php');
include_once('model/modelFigureType.php');
include_once('model/modelManufacturers.php');
include_once('views/updateForm.view.php');

use Models\modelFigures;
use Models\modelFigureType;
use Models\modelManufacturer;
use Views\updateFormView;

class UpdateForm{
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
    public function updateForm($id){
        /**
         * Data terdiri dari data2 figure, manufakturer, dan tipe
         * Semua disiapkan dulu tempatnya di satu var ini
         */
        $data = [
            'figure' => null,
            'type' => null,
            'man' => null
        ];

        //  pengambilan data
        $this->mFigures->open();
        $this->mFigureType->open();
        $this->mMan->open();

        $data['figure'] = $this->mFigures->getById($id);
        $data['type'] = $this->mFigureType->getAll();
        $data['man'] = $this->mMan->getAll();

        $this->mFigures->close();
        $this->mFigureType->close();
        $this->mMan->close();

        // menampilkan form yang sudah terisi dengan data2 sebelumnya
        $view = new updateFormView();
        $view->render($data);
    }

    public function updateFigure($input) : int{  //entah dimana wwww

        // memisahkan data dengan file
        $data = $input['data'];
        $file = $input['file'];

        if(isset($data['name'], $data['type'], $data['manufacturer'])){
            $id = intval($data['id']);
            $name = trim(htmlspecialchars($data['name']));
            $type = intval($data['type']);
            $man = intval($data['manufacturer']);

            // bila user tidak mengubah gambar
            if(isset($data['hidden_img'])){
                $img = $data['hidden_img'];

                if(!empty($img)){
                    $this->mFigures->open();
                    $this->mFigures->update($id, [
                        'name' => $name,
                        'img' => $img,
                        'type' => $type,
                        'man' => $man
                    ]);
                        $this->mFigures->close();
                        return 0;
                }
                else{
                    echo $data['hiddenImg'];
                    echo 'failed image';
                    return 1;
                }
            }
            // bila user mengubah gambar
            else if(isset($file['image']) && !empty($file['image'])){
                $image = $file['image'];
                $image_name = $image['name'];
                $image_tmp = $image['tmp_name'];
                $destination = "assets/img/figures/".$image_name;

                if(!file_exists($destination)){
                    move_uploaded_file($image_tmp, $destination);
                    printf("uploaded");
                }

                if(!empty($image_name)){
                    $this->mFigures->open();
                    if($this->mFigures->update($id, [
                        'name' => $name,
                        'img' => $image_name,
                        'type' => $type,
                        'man' => $man
                    ]) > 0){
                        $this->mFigures->close();
                        return 0;
                    }
                    else{
                        $this->mFigures->close();
                        echo 'fail sql';
                        return 1;
                    }
                }
                else{
                    echo $data['hiddenImg'];
                    echo 'failed image';
                    return 1;
                }
            }
        }
        else{
            echo 'fail form';
            return 1;
        }
    }

    

}