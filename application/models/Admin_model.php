<?php 

class Admin_model extends MY_model{

    public $id_user;
    public $id_pays; 
    public $denom_ag;
    public $adresse_ag;
    public $localite_ag;
    public $email_ag;
    public $telephone_ag;
    public $date_debut;
    public $date_fin;
    private $statut_ag = 1;

    /**
     * Fonction de création d'une nouvelle agence de voyage 
     */
    public  function create_agence($id_pays = 1){

       
        $this->id_user = $this->session->userdata('id_user');
        $this->id_pays = $id_pays;
        $this->denom_ag = $this->input->post('denom');
        $this->adresse_ag = $this->input->post('adresse');
        $this->localite_ag = $this->input->post('localite');
        $this->telephone_ag = $this->input->post('phone');
        $this->email_ag = $this->input->post('mail_ag');

        $aujourdhui = date('Y-m-d H:i:s');
        $this->date_debut = $aujourdhui;
        $duree = date("Y-m-d H:i:s", strtotime("+2 month", strtotime($aujourdhui)));
        $this->date_fin = $duree;
     
        return $this->db->insert('agence',$this); 
    } 
    /**
     * Fonction qui retourne l'agence en question
     */
    public function get_agence(){

        $query = $this->db->get('agence');
        return $query->result();
    }

    /**
     * Fonction de désactivation du statut de l'agence 
     */
    public function delete_status($id){ 

        if(!empty($id)){
           return $this->db->update("agence",array('statut_ag' => 0), array('id_ag' => $id));
        }
         return  FALSE;                 
    }
    /**
     * Fonction d'activation du statut de l'agence 
     */
    public function set_status($id){

        if(!empty($id)){
            return $this->db->update("agence",array('statut_ag' => 1), array('id_ag' => $id));
         }
          return  FALSE;         
    }    


    /**
     * Obtenir le pays dans lequel se trouve notre agence 
     * par defaut c'est le Burkina Faso
     */
     public function get_pays(){

        $query = $this->db->get('pays');
        return $query->row(1);
     }


}

?>