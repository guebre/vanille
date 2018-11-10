<?php
      defined('BASEPATH') OR exit('No direct script access allowed');

     if( !function_exists('css_url')){

     	 function css_url($nom){
              
           return base_url().'assets/css/'.$nom.'.css';
     	 }
     }
     if(!function_exists('js_url')){

     	function js_url($nom){

     		return base_url().'assets/js/'.$nom.'.js';
     	}
     }
     if(!function_exists('img_url')){

          function img_url($nom){

          	 return base_url().'assets/images/'.$nom;
          }
     }
     if(!function_exists('img')){

     	function img_h($nom,$alt='imag',$class){

     		return '<img src="'.img_url($nom).'" alt="'.$alt.'" class="'.$class.'"/>';
              
     	}
     }


     if(!function_exists('popper_url')){

            function popper_url($name){

                  return base_url().'assets/js/node_modules/popper.js/dist/umd/'.$name.'.js';
            }
     }




?>