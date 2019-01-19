<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {
    
    private $id_user;
    private $login_user;
    private $password_user;
    private $loginAt;
    private $loginEnd;
    private $statut;
    private $niveau;
    private $mail_user;
    private $nom_user;
    private $prenom_user;
    private $phone1_user;
    private $phone2_user;
    private $add_user;

    function __construct(array $donnees){

        $this->hydrate($donnees);
    }

    /**
     * Cette fonction initialise les données ou propriétés ou attributs 
     */
    public function hydrate($donnees){

        foreach($donnees as $key =>$value){

            $method = 'set'.ucfirst($key);

            if(method_exists($this,$method)){

               $this->method($value);
            }
        }
    }

    /**
     * Definition des setters
     *  
     * */ 

    public function setId_user($id){

        $this->id_user = (int) $id;
    }

    public function setLogin_user($login){

        if(is_string($login)){

            $this->login_user = $login;
        }

    }

    public function setPassword_user($password){

        if(is_string($password)){

            $this->password_user = $password;
        }
    }
    
    public function set_statut($statut){

        $this->statut = (int) $statut;
    }

    public function setNiveau($niveau){

        $niveau = (int) $niveau;

        if($niveau>0 && $niveau <=3) {
            $this->niveau = $niveau;
        }
    }

    public function setMail_user($mail){

        if(is_string($mail)){

            $this->mail_user = $mail;
        }

    }

    public function setNom_user($nom){

        if(is_string($nom)){

            $this->nom_user = $nom;
        }
    }

    public function setPrenom_user($prenom){

        if(is_string($prenom)){

            $this->prenom_user = $prenom;
        }
    }

    public function setPhone1_user($phone1){

        if(is_string($phone1)){

            $this->phone1_user = $phone1;
        }
    }

    public function setPhone2_user($phone2){

        if(is_string($phone2)){

            $this->phone2_user = $phone2;
        }
    }

    public function setAdd_user($add){

        if(is_string($add)){

            $this->add_user = $add;
        }
    }

    public function setLoginAt($log_time){

       $this->loginAt = $log_time;
    }

    public function setLoginEnd($log_time){

        $this->loginEnd = $log_time;
     }

    /**
     * Definition des getters
     */
    
     public function getId_user(){

         return $this->id_user;
     }
    
    public function getLogin_user(){

         return  $this->login_user;
    }

    public function getPassword_user(){

       $this->password_user;
       
    }
    
    public function get_statut(){

        return $this->statut;
    }

    public function getNiveau(){
        return $this->niveau = $niveau;    
    }

    public function getMail_user(){

        return $this->mail_user;

    }

    public function getNom_user(){
        return $this->nom_user;
    }

    public function getPrenom_user(){

        return $this->prenom_user;
    }

    public function getPhone1_user(){

            return $this->phone1_user;
    }

    public function getPhone2_user(){

        return $this->phone2_user;  
    }

    public function getAdd_user($add){

        return $this->add_user; 
    }

    public function getLoginAt(){

       return $this->loginAt;
    }

    public function getLoginEnd(){

        return $this->loginEnd;
    }
     

    

    





}

?>