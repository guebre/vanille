<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{   

    /**
     * Liste de tous les utilisateurs
     */
    public function get_all_user(){

        return $this->db->get('users');
    }
    
    /**
     * Ajoute d'un utilisateur dans la base
     */
    public function process_create_user($data){

        if($this->db->insert('users',$data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    /**
     * update user
     */




    /**
     * Création d'une utilisateurs
     */
    

    /**
     * vérification du login de l'utilisateur
    **/

    public function get($param = array() ){
       
       if($param){

        $array=array('user_login'=>$param['usrname'],'password_user'=>$param['usrpass']);
        $query= $this->db->where($array) 
                     ->get('users');
         return $query->num_rows();
       }

    }
    
    /**
     * Enregistrer l'heure a laquelle on se connecter
     */
    public function loginAt($param=null){

        $now = date("Y-m-d H:i:s");
        if(!empty($param)){

            $where=array(
            'loginSyst'=>$param
            );
        
            $data = array(
                'loginAt'=>$now
            );  
           $this->db->where($where);
           $this->db->update('adminsyst',$data);                  
        }
       
    }
    
    /**
     * Enregistrer l'heure à laquelle on se déconnecte
     */
    public function logout($param=null){

        $now = date("Y-m-d H:i:s");
        if(!empty($param)){

            $where=array(
            'loginSyst'=>$param
            );
        
            $data = array(
                'loginEnd'=>$now
            );  
           $this->db->where($where);
           $this->db->update('adminsyst',$data);   

        }
    }

   }


?>