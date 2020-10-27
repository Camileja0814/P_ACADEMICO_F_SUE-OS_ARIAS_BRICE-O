<?php
include_once './models/AcercaModel.php';
class AcercaController{

   
    public $mode;

    public function __construct(){
        $this->mode = new AcercaModel();
    }

    public function index(){
        include_once './views/Acerca.php';
    }

}