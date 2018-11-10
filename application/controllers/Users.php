<?php  
  defined('BASEPATH') OR exit('No direct script access allow');


  class Admin extends CI_controller(){
      
      function __construct(){
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
    }
  }
?>