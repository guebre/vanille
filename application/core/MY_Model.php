<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
 /** 
  *
  */
class MY_Model extends CI_Model {
        
    /*
    * Prend en paramèttre le mail de l'utilisateur
    * et retourne l'enregistrement correspondant
    */
    public function does_user_exist($pseudo){
        
        return $this->db->get_where('users',array('login_user'=>$pseudo));               
    }

    public function logout(){
      $date = date("Y-m-d H:i:s");
      $data = array( 'loginEnd' =>$date,'loginAt' =>$this->session->userdata('logAt'));
      $this->db->update('users',$data,array('id_user' => $this->session->userdata('id_user')));
    }
   /**************************************************************** */
    /**
    * Ajouter un plat  
    */
    public function add_plat(){

      $data = array(
         'nom_plat' => strtoupper($this->input->post('nom_plat')),
         //'photo_prod'  => $this->input->post('photo_prod'),
         'prix'  => $this->input->post('prix'),
         'id_cat'  => $this->input->post('categorie')
      );
      if($this->input->post('qte') > 0 && $this->input->post('qte_seuil') > 0 ){
        $data['quantite'] = $this->input->post('qte');
        $data['quantite_seuil'] = $this->input->post('qte_seuil');
      }
      return $this->db->insert("plats",$data);
    }
    /**
     * Modification des données d'un plat
     */
    public function update_plat(){

      $data = array(

        'nom_plat' => strtoupper($this->input->post('nom_plat')),
        //'photo_prod'  => $this->input->post('photo_prod'),
        'prix'  => $this->input->post('prix'),
        //'id_prod' => $this->input->post('produit'),
        'id_cat'  => $this->input->post('categorie')
        );
        
        if($this->input->post('qte') > 0 && $this->input->post('qte_seuil') > 0 ){
          $data['quantite'] = $this->input->post('qte');
          $data['quantite_seuil'] = $this->input->post('qte_seuil');
  
        }else{
          //Si la quantite=quantite_seuil ==0
          /*$this->db->set('nom_plat',strtoupper($this->input->post('nom_plat')));
           $this->db->set('prix',$this->input->post('prix'));
          $this->db->set('id_cat', $this->input->post('categorie'));
          */
         $data['quantite'] = 0;
         $data['quantite_seuil'] = 0; 
        }

        $this->db->where('id_plat',$this->input->post('identifiant')); 
          return $this->db->update("plats",$data);
    }

    /**
     * Lister les plats ou produits dont la quantite de seuil est dépasser 
     * 
     */
     public function get_alet_seuil($qte){
       
        $this->db->where('quantite_seuil < ',$qte);
        return $this->db->get('plats');
     }
     /**
      * Les plats dont la quantité_seuil>quantite
      */
     public function get_alert_seuil1(){

         return $this->db->query('SELECT * FROM plats WHERE quantite_seuil > quantite');
     }



    /**
    * Ajouter un utilisateur  
    */
    public function add_user($password='code@pass'){
     
      $data = array(
         'login_user' =>$this->input->post('login'),
         'password_user'  => $password,
         'niveau'  => $this->input->post('role')
      );
      return $this->db->insert("users",$data);
    }

    /**
     * Liste des tables du glacier 
     */
    public function get_vanille_tab(){

       return $this->db->get('van_table');
    }
    /** 
     * Enregister une nouvelle table dans le restaurant
     */
    public function add_table(){
       $data = array(
          'code_table' => $this->input->post('code')
          //'nb_place' =>$this->input->post('nbr_place')
       );
       return $this->db->insert('van_table',$data);   
    }

    /**
     * Supprimer une table 
     */
    public function delete_table($id){ 
      return $this->db->delete('van_table',array('id' => $id)); 
    }

    /**
    * Liste des produits
    */
    public function liste_plats(){
         return $this->db->get_where("plats",array('statut'=>1)); 
        //SELECT * FROM plats INNER JOIN categorie ON plats.id_cat = categorie.id_cat
    }

    public function liste_plats2($limit,$start){
       
       $this->db->select('*');
       $this->db->where('statut',1);
       $this->db->from('plats');
       $this->db->join('categorie', 'plats.id_cat = categorie.id_cat','left');
       $this->db->limit($limit,$start);
       $query = $this->db->get();
       return $query;
      //SELECT * FROM plats INNER JOIN categorie ON plats.id_cat = categorie.id_cat
    }
    /*public function liste_users2($limit,$start){
       
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('roles', 'users.id_role = rolee.id_role','inner');
      $this->db->limit($limit,$start);
      $query = $this->db->get();
      return $query;
    }*/


   /**
    * Liste des utilisateurs
    */
    public function liste_users(){
      return $this->db->get("users"); 
      //SELECT * FROM plats INNER JOIN categorie ON plats.id_cat = categorie.id_cat
    }

    public function get_users_role(){
        return $this->db->get('roles');
    }
     /**
    * Get plat by id
    */
    public function get_users_except(){
      return $this->db->get_where("users",array("id_user !=" =>$this->session->userdata('id_user'),"login_user !="=>'izanami411'));
   }
    /**
    * Get plat by id
    */
    public function get_plat_byId($id){
      
       return $this->db->get_where("plats",array("id_plat" => $id));
    }

    /**
    * delete a plat
    */
    public function delete_recette($id){ 

      $data = array('statut'=>0);
      $this->db->where('id_plat',$id); 
      return $this->db->update("plats",$data);
      //return $this->db->delete("plats",array("id_plat" => $id));
    }

   
    public function activer_user($id){
        $data = array(
          'statut' => 1,
        );
        return $this->db->where('id_user',$id)
                        ->update('users',$data);
    }

    public function desactiver_user($id){
      $data = array(
        'statut' => 0,
      );
      return $this->db->where('id_user',$id)
                      ->update('users',$data);
    }
  
    public function add_vente($vente = array()){

      if(!empty($vente)){
  
         return $this->db->insert_batch('vente',$vente);
      }
      return FALSE;
      
    }
   
    public function augmenter_caisse($somme = 0){
        return $this->db->update('caisse',$montant) ;
    }

    public function count_all_vente(){
      return $this->db->query('SELECT COUNT(DISTINCT (date_vente)) AS nb from vente');            
       //return $this->db->count_all_results($table);
    }

  /* SELECT COUNT(DISTINCT (date_vente)) FROM vente
  SELECT date_vente, sum(prix) AS total 
    FROM vente GROUP BY date_vente;

    SELECT date_vente, id_plat, SUM(prix) as total
    from vente GROUP BY (id_plat,date_vente);
    SELECT * FROM `vente` WHERE date_vente = '2018-10-23 21:59:18'
    SELECT DISTINCT DATE(date_vente) FROM vente

    SELECT plats.* ,categorie.*,vente.* from categorie,vente,plats
    WHERE plats.id_plat = vente.id_plat AND plats.id_cat = categorie.id_cat 
     SELECT categorie.id_cat, DATE(vente.date_vente),SUM(vente.prix) from categorie,vente,plats
WHERE plats.id_plat = vente.id_plat AND plats.id_cat = categorie.id_cat 
GROUP BY categorie.id_cat,DATE(vente.date_vente)

    SELECT categorie.nom_cat,SUM(vente.prix) from categorie,vente,plats
WHERE plats.id_plat = vente.id_plat AND plats.id_cat = categorie.id_cat AND DATE(vente.date_vente) = CURRENT_DATE()
GROUP BY categorie.nom_cat;

    */

  public function get_etat_per_date($date){

        $string = "SELECT categorie.nom_cat,SUM(vente.prix) AS montant
        FROM categorie,vente,plats
        WHERE plats.id_plat = vente.id_plat AND plats.id_cat = categorie.id_cat AND DATE(vente.date_vente)=?
        GROUP BY categorie.nom_cat";
        $query=$this->db->query($string,array($date));
        return $query->result();

  }


    //********************************************************* */
    /**
    * Ajouter un produit  
    */
    public function add_product(){
    
      $data = array(
         'nom_prod' => strtoupper($this->input->post('nom_p')),
         //'photo_prod'  => $this->input->post('photo_prod'),
         'prix_unit'  => $this->input->post('p_unit'),
         'quantite'  => $this->input->post('qte'),
         'qte_alert'  => $this->input->post('qte_seuil'),
         'categorie'  => $this->input->post('p_categorie'),
         'date_appro'  => date("Y-m-d")

      );
        return $this->db->insert("produit",$data);
    }

    /**
    * Liste des produits
    */
    public function liste_product(){

       return $this->db->get("produit"); 
    }

    /**
    * Get a product by id
    */
    public function get_prod_byId($id){
      
       return $this->db->get_where("produit",array("id_prod" => $id));
    }

    /**
    * delete a product
    */
    public function delete_prod($id){

      return $this->db->delete("produit",array("id_prod" => $id));
    }

    /**
    *  Get seuil of product 
    */
    public function get_prod_bySeuil($qte){

        $where = array('qte_alert<' => $qte);
        return $this->db->where($where);
    }

    /**
    * 
    */
    /*public function logAt(){
     
     $date = date("Y-m-d H:i:s");
     $data = array( 'loginAt' =>$date);
     $this->db->update('users',$data,array('id_user' => $this->session->userdata('id_user')));
    }*/


  /**
    * Ajouter une categorie 
    */
    public function add_categorie(){
      $data = array(
         'nom_cat' => strtoupper($this->input->post('nomCat')),
         //'photo' => $this->input->post('photoCat')
      );
      return $this->db->insert("categorie",$data);
    }

    public function list_menu(){

      return $this->db->get("categorie"); 
   }

   /**
    * delete a menu
    */
    public function delete_menu($id){

      return $this->db->delete("categorie",array("id_cat" => $id));
    }

   

}
  
?> 