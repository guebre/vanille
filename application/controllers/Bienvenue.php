<?php  defined('BASEPATH') OR exit('No direct script access allow');

class Adminsysteme extends MY_Controller{

    function __construct(){

        parent::__construct();
        //Chargement du model
        $this->load->model('user_model');
       
    }

}