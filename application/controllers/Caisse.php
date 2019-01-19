<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Caisse 
 */
class Caisse extends CI_Controller{

    public function index(){

        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/admin_space');
        $this->load->view('template/copyright');
        $this->load->view('template/footer');
        
    }
}
?>