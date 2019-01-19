<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
 /** 
  * MY_Controller est le controller de base 
  * Par consequent tous les controllers de l'application lui 
  * feront appel.
  * Elle permettra de charger les ressources communes au projet telles que  :
  * 1. Les helpers
  * 2. Les librairies 
  * 3. Autres  fichiers 
  */
  class MY_Controller extends CI_Controller {
      
      function __construct(){

         parent::__construct();
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
      } 

  }
  
?> 
