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
    public function process_update_user($id,$data){
       $this->db->where('id_user',$id);
       if($this->db->update('users',$data)){
           return true;
       } else {
           return false;
       }
    }

    /**
     * user details
     */
    public function get_user_details($id){
         $this->db->where('id_user',$id);
         $result = $this->db->get('users');
         
         if($result){
             return $result;
         } else {
             return false;
         }
    }

    /** 
     * User details by email
     */
    public function get_user_details_by_email($email){
         $this->db->where('mail_user',$email);
         $result = $this->db->get('users');
         if($result){
            return $result;
         } else {
            return false;
         }
    }

    /**
     * Delete a user
     */
    public function delte_user($id){
        if($this->db->delete('users',array('id_user',$id))){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Création d'une utilisateurs
     */
    

    /**
     * vérification du login de l'utilisateur
    **/

    public function get(array $params ){
       
       if($param){

        $array=array('user_login'=>$param['usrname'],'password_user'=>$param['usrpass']);
        $query= $this->db->where($array) 
                     ->get('users');
         return $query->num_rows();
       }

    }
    
    /**
     * Enregistrer l'heure à laquelle l'utilisateur se connecte au système
     */
    public function loginAt($id){

        $now = date("Y-m-d H:i:s");
        $this->db->where('id_user',$id);
        if($this->db->update('loginAt',$now)){
           return true;
        } else {
            return false;
        }     
    }

    /**
     * Suivre l'activité d'un utilisateur 
     */
    public function last_activity(){

        $now = date("Y-m-d H:i:s");
        $this->db->where('id_user',$id);
        if($this->db->update('loginEnd',$now)){
           return true;
        } else {
            return false;
        } 

    }
    

   }


?>