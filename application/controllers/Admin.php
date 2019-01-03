<?php  
  defined('BASEPATH') OR exit('No direct script access allow');
  /**
   * Administrateur du système
   */
  class Admin extends CI_Controller {
      
      public function __construct(){

        parent::__construct();
        $this->load->model('admin_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>'); 
        // On verifie si l'utilisateur est déja connecté
        // Et si c'est un administrateur
        if($this->session->userdata('logged_in') == TRUE){
            // Si celui-ci n'est pas un admin 
            if($this->session->userdata('niveau') != 1){
                redirect('accueil');
            }
        }else{
              redirect('accueil');
        }
        // Chargement des preferences 
        $this->config->load('vanille_setting');
        
         
      }

      public function index(){
        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/admin_space');
        $this->load->view('template/copyright');
        $this->load->view('template/footer');
      }
      
      public function appro_seuil(){

        $this->load->view('template/header');
        $this->load_admin_menu();
        $data['list'] = $this->admin_model->get_alert_seuil1();
        $this->load->view('adminsyst/appro_seuil',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');
        
      }

      private function load_admin_menu(){

          //Obtenir la quantite  de seuil à ne pas dépasser 
         //$qte_seuil = $this->config->item('qte_seuil');
         // Générer des alerts en fonction de la quantite de seuil
         //$data['list'] = $this->admin_model->get_alet_seuil($qte_seuil);
          $data['list'] = $this->admin_model->get_alert_seuil1();
          $this->load->view('adminsyst/admin_menu',$data);
      }
      // Page de déconnection de l'administrateur
      public function logout(){

              $this->admin_model->logout();
              $this->session->sess_destroy();
              redirect('accueil');
      }

      // Mette le statut à 1  
      public function set_status(){

        $id = $this->uri->segment(3);
          $this->admin_model->set_status($id);
          redirect("admin"); 
      }

      // Mette le statut à 0  
      public function delete_status(){
        //Get agency
        $id = $this->uri->segment(3);
        $this->admin_model->delete_status($id);
        redirect("admin");
      }
      // Page qui affichera l'agence crée 
      public function liste_agence(){
         redirect("admin");
      }
      
      //Page des categories
      public function category(){

        $data['success'] = FALSE;
        $query = $this->admin_model->get_category('5',$this->uri->segment(3));
        //$query = $this->db->get('categorie','5',$this->uri->segment(3));
        $config['base_url'] = base_url().'admin/category/';
        $query2 = $this->admin_model->list_menu();
        $config['total_rows'] = $query2->num_rows();
        $data['list'] = $query;
       
        $this->pagination->initialize($config);

        $this->load->view('template/header');
        $this->load_admin_menu();

        $this->load->view('adminsyst/category',$data);

        $this->load->view('template/copyright');
        $this->load->view('template/footer');

      }


      public function  add_category(){
        // Obtenir les données
              
          $nomCat = $this->input->post('nomCat'); # add this

          $this->form_validation->set_rules('nomCat','Categorie','trim|required|is_unique[categorie.nom_cat]');

          if($this->form_validation->run() == FALSE)
          {
              echo validation_errors();
          }
          else
          {               
              if(!$this->admin_model->add_categorie())
              {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong> 
                    Error  </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button></div>';
              }               
              else
              {
                  
                /*echo '<div class="alert alert-success" role="alert"><strong> 
                   Inscription success </strong>
                  </div>';*/

                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                  Inscription success </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button></div>';
              }

          }


      }

      /**
       * liste du menu
       * 
       */
      public function listeMenu(){
        //$liste_menu['list'] = $this->admin_model->list_menu();
        //$this->load->view('adminsyst/liste_menu',$data);
       //echo $liste;

      }

      /**
       * supprimer un menu
       */
      public function delete_menu(){
        
        $id = $this->uri->segment(3);

        if($this->admin_model->delete_menu($id)){

          $query = $this->db->get('categorie','5',$this->uri->segment(3));
          $config['base_url'] = base_url().'admin/category/';
          $query2 = $this->admin_model->list_menu();
          $config['total_rows'] = $query2->num_rows();
          $data['success'] = 'success';
          $data['message'] = "SUPPRESSION SUCCESS";
          $this->pagination->initialize($config);
          $this->load->view('template/header');
          $this->load_admin_menu();
          $this->load->view('adminsyst/category',$data);
          $this->load->view('template/copyright');
          $this->load->view('template/footer');
        }else{

          $data['success'] = 'fail';
          $data['message'] = " ERREUR DE SUPPRESSION";
          $query = $this->db->get('categorie','5',$this->uri->segment(3));
          $config['base_url'] = base_url().'admin/category/';
          $query2 = $this->admin_model->list_menu();
          $config['total_rows'] = $query2->num_rows();
          $data['success'] = 'success';
          $data['message'] = "SUPPRESSION SUCCESS";
          $this->pagination->initialize($config);
          $this->load->view('template/header');
          $this->load_admin_menu();
          $this->load->view('adminsyst/category',$data);
          $this->load->view('template/copyright');
          $this->load->view('template/footer');
        }

      }


      public function product(){

        //Chargement de la bibliotheque pagination
        //$this->load->library('pagination');
       // $data['list'] = $this->admin_model->liste_product();
        $data['delete_success'] = FALSE;
        $data['set_prod_status'] = FALSE;
        //Get three row stating by $this->uri->segment(3) record
        $query = $this->db->get('produit','5',$this->uri->segment(3));
        $data['list'] = $query->result();

        //Get full row of product
        $query2 = $this->admin_model->liste_product();

        $config['base_url'] = base_url().'admin/product/';
        $config['total_rows'] = $query2->num_rows();
    
        $this->pagination->initialize($config);

        //$data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
          $this->load_admin_menu();

        $this->load->view('adminsyst/product',$data);

        $this->load->view('template/copyright');
        $this->load->view('template/footer');

      }

      public function new_product(){
        // Regles de validation 
          $config = array(
            array(
              'field' => 'nom_p',
              'label' => 'Nom Produit',
              'rules' => 'required|min_length[3]|is_unique[produit.nom_prod]'
            ),  
            array(
              'field' => 'p_unit',
              'label' => 'Prix Unitaire',
              'rules' => 'required|numeric'
            ),
            array(
              'field' => 'qte',
              'label' => 'Quantit&eacute',
              'rules' => 'required|numeric'
            ),
            array(
              'field' => 'qte_seuil',
              'label' => 'Niveau de Seuil',
              'rules' => 'required|numeric'
            ),
            array(
              'field' => 'p_categorie',
              'label' => 'cat&eacutegorie',
              'rules' => 'required'
            )
          );
          $this->form_validation->set_rules($config);
       
        if($this->form_validation->run() == FALSE){

            // Liste de categorie de produits
            $data['list'] = $this->admin_model->list_menu();
            $data['success'] = FALSE; 
            $this->load->view('template/header');
              $this->load_admin_menu();

            $this->load->view('adminsyst/product_new',$data);

            $this->load->view('template/copyright');
            $this->load->view('template/footer');

        } 
        else{  
               // insertion ok
             if($this->admin_model->add_product()){
                  // Liste de categorie de produits
                  $data['list'] = $this->admin_model->list_menu();
                  $data['success'] = TRUE; 
                  $data['message'] =  " Insertion success";

                  $this->load->view('template/header');
                    $this->load_admin_menu();

                  $this->load->view('adminsyst/product_new',$data);

                  $this->load->view('template/copyright');
                  $this->load->view('template/footer');
              }
            }
        
      }

    
      public function delete_product(){

        $id = $this->uri->segment(3);

        if($this->admin_model->delete_prod($id)){ 
        
          $data['delete_success'] = TRUE; 
          $data['message']= ' Delete success';
          redirect("admin/product",$data); 

        }else{
          redirect("admin/product",$data); 
        }
      }
    /***
     * 
     * Modifier un produit 
     * 
     */
     public function set_product(){
      
      //code d'erreur sur l'id de produit 
      $data['set_prod_status'] = FALSE;
      $id_prod = $this->uri->segment(3);

      if( is_numeric($id_prod) ){
      
        //var_dump(gettype($id_prod));
        $query = $this->admin_model->get_prod_byId($id_prod);
        $data['produit']= $query;
        $data['list'] = $this->admin_model->list_menu();
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/set_product',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');

      }
      else{

        // l'id n'est pas un entier alors une erreur existe 
        $data['set_prod_status'] = TRUE;
        $data['set_prod_message'] = "<strong>Une erreur existe sur l'identifiant du produit</strong>";
        $data['list'] = $this->admin_model->list_menu();
        $data['delete_success'] = FALSE; 

        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/product',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');
      }
         
        
     }
    /**
     * Pour eviter la repetion
     */
    private function plats_data(){
        
        //Get three row stating by $this->uri->segment(3) record
        //$query = $this->db->get('plats','3',$this->uri->segment(3));
        $query = $this->admin_model->liste_plats2(5,$this->uri->segment(3));
        $data['list'] = $query->result();
        //Get full row of product
        $query2 = $this->admin_model->liste_plats();
        $config['base_url'] = base_url('admin/plats/');
        $config['total_rows'] = $query2->num_rows();
        $this->pagination->initialize($config);

        /*$this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/plats',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');   */      
    }
    /**
     * gesttion de plats ou recette de cuisine
     */
     public function plats(){
       
        //$this->plats_data(); 
        $data['success'] = FALSE;
        $query = $this->admin_model->liste_plats2(5,$this->uri->segment(3));
        $data['list'] = $query->result();
        //Get full row of product
        $query2 = $this->admin_model->liste_plats();
        $config['base_url'] = base_url('admin/plats/');
        $config['total_rows'] = $query2->num_rows();
        $this->pagination->initialize($config);
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/plats',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');        
     }  

     public function new_plat(){
      // Regles de validation 
        $config = array(
          array(
            'field' => 'nom_plat',
            'label' => 'Plat',
            'rules' => 'required|min_length[3]|is_unique[plats.nom_plat]'
          ),  
          array(
            'field' => 'prix',
            'label' => 'Le Prix',
            'rules' => 'required|is_natural'
          ),
          array(
            'field' => 'categorie',
            'label' => 'cat&eacutegorie',
            'rules' => 'required'
          ),
          array(
            'field' => 'qte_seuil',
            'label' => 'Quantite de Seuil',
            'rules' => 'required|is_natural'
          ),
          array(
            'field' => 'qte',
            'label' => 'Quantit&eacute',
            'rules' => 'required|is_natural'
          )

        );
        $this->form_validation->set_rules($config);
     
      if($this->form_validation->run() == FALSE){

          // Liste de categorie de plats 
          $data['list'] = $this->admin_model->list_menu();
          $data['success'] = FALSE; 
          $this->load->view('template/header');
          $this->load_admin_menu();

          $this->load->view('adminsyst/plat_new',$data);

          $this->load->view('template/copyright');
          $this->load->view('template/footer');

      } 
      else{  
             // insertion ok
           if($this->admin_model->add_plat()){
                // Liste de categorie de produits
                $data['list'] = $this->admin_model->list_menu();
                $data['success'] = TRUE; 
                $data['message'] =  "INSERTION SUCCESS ->  <span class='text-info'>". $this->input->post('nom_plat')."</span> ";

                $this->load->view('template/header');
                $this->load_admin_menu();

                $this->load->view('adminsyst/plat_new',$data);

                $this->load->view('template/copyright');
                $this->load->view('template/footer');
            }
          }
      
     }
     /**
     * Modifier une recette
     */
     public function set_plat(){
    
      //Regles de validation 
      $config = array(
        array(
          'field' => 'nom_plat',
          'label' => 'Plat',
          'rules' => 'required|min_length[3]'
        ),  
        array(
          'field' => 'prix',
          'label' => 'Le Prix',
          'rules' => 'required|is_natural'
        ),
        array(
          'field' => 'categorie',
          'label' => 'cat&eacutegorie',
          'rules' => 'required'
        ),
        array(
          'field' => 'qte_seuil',
          'label' => 'Quantite de Seuil',
          'rules' => 'required|is_natural'
        ),
        array(
          'field' => 'qte',
          'label' => 'Quantit&eacute',
          'rules' => 'required|is_natural'
        )
      );

      $this->form_validation->set_rules($config);

      if( $this->form_validation->run() == FALSE){
        //Code d'erreur sur l'id de produit 
        $id_plat = $this->uri->segment(3);
        if( is_numeric($id_plat) ){
              //var_dump(gettype($id_plat));
              $query = $this->admin_model->get_plat_byId($id_plat);

              if($query->num_rows() > 0){
                //$data['modif_status'] = FALSE;
                $data['plat']= $query;
                $data['list'] = $this->admin_model->list_menu();
                $this->load->view('template/header');
                  $this->load_admin_menu();
                $this->load->view('adminsyst/set_plat',$data);
                $this->load->view('template/copyright');
                $this->load->view('template/footer');
              }else{

                $data['success'] = 'fail';
                $data['message'] = 'Numero incorrect';
                $this->load->view('template/header');
                  $this->load_admin_menu();
                $this->load->view('adminsyst/set_status_page',$data);
                $this->load->view('template/copyright');
                $this->load->view('template/footer');
                //redirect('admin/plats');  
              }     
        }
        else{ 
          $data['success'] = 'fail';
          $data['message'] = 'Num&eacute;ro incorrect';
          $this->load->view('template/header');
            $this->load_admin_menu();
          $this->load->view('adminsyst/set_status_page',$data);
          $this->load->view('template/copyright');
          $this->load->view('template/footer');
          //redirect('admin/plats');  
        }

      } 
      else{
       
        if($this->admin_model->update_plat()){

          $data['success'] = 'success';
          $data['message'] = "L'article a &eacute;t&eacute; modifi&eacute; avec success";
          $this->load->view('template/header');
            $this->load_admin_menu();
          $this->load->view('adminsyst/set_status_page',$data);
          $this->load->view('template/copyright');
          $this->load->view('template/footer');

        }else {

          $data['success'] = 'fail';
          $data['message'] = 'Erreur Lors de la  modification';
          $this->load->view('template/header');
            $this->load_admin_menu();

          $this->load->view('adminsyst/set_status_page',$data);

          $this->load->view('template/copyright');
          $this->load->view('template/footer');
        }

      }
      

        

     }
     /**
      * Supprimer une recette
      */
     public function delete_plat(){

      $id_plat = $this->uri->segment(3);
      if($this->admin_model->delete_recette($id_plat)){
        $data['success'] = 'success';
        $data['message'] = "SUPPRESSION SUCCESS";
        $query = $this->admin_model->liste_plats2(5,$this->uri->segment(3));
        $data['list'] = $query->result();
        //Get full row of product
        $query2 = $this->admin_model->liste_plats();
        $config['base_url'] = base_url('admin/plats/');
        $config['total_rows'] = $query2->num_rows();
        $this->pagination->initialize($config);
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/plats',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');   
        $this->plats_data();   
      }else{

        $data['success'] = 'fail';
        $data['message'] = " ERREUR DE SUPPRESSION";

        $query = $this->admin_model->liste_plats2(5,$this->uri->segment(3));
        $data['list'] = $query->result();
        //Get full row of product
        $query2 = $this->admin_model->liste_plats();
        $config['base_url'] = base_url('admin/plats/');
        $config['total_rows'] = $query2->num_rows();
        $this->pagination->initialize($config);
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/plats',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');   
        //$this->plats_data();   
      }
    
     }

     /** Page de vente de recette ou mets */
     public function shopping(){

        //$this->plats_data(); 
        $data['success'] = FALSE;
        $query = $this->admin_model->liste_plats2(6,$this->uri->segment(3));
        $data['list'] = $query->result();

        //Get full row of product
        $query2 = $this->admin_model->liste_plats();
        $config['per_page'] =6;
        $config['base_url'] = base_url('admin/shopping/');
        $config['total_rows'] = $query2->num_rows();
        $this->pagination->initialize($config);
        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/shopping_cart',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer'); 
      
     }

    public function add_shopping(){

      $data = array(
        "id" => $this->input->post('product_id'),
        "name" => $this->input->post('product_name'),
        "qty" => $this->input->post('quantity'),
        "price" => $this->input->post('product_price')
      ); 
      
      //Si quantite_stock>=quantite_demande
      if($this->admin_model->check_quantite($data)){
        $this->cart->insert($data);

        echo '<div class="alert alert-success" role="alert">
         Le produit "'. $data['name'].'" a été ajouté à la commande
         </div>';
         echo $this->view();
        //echo 'success';

      }else{ // soit qty est null ou qty<qte_ask
          //$this->cart->insert($data);
          //echo '<div class="bg-danger"><h6 class="text-uppercase text-white">Stock du produit "'. $data['name'].'" est insuffisant </h6></p>';
          echo '<div class="alert alert-danger" role="alert">
                Stock du produit "'. $data['name'].'" est insuffisant
              </div>';
          echo $this->view();

      }
     
    
    }

    public function load(){
         echo $this->view();

    }
    
    
     public function view(){

        $output = '';
        $output .= '
        <div class="row">
          <div class="col-md-12"> <h3 class="text-center">Panier d\'Achat </h3><br /> </div>
        </div>
        <div class="row">
            <div class="col text-right"> <button type="button" id="clear_cart" class="btn btn-warning" style="cursor:pointer">Annuler Commande </button> </div> 
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
            <th width="40%">Nom</th>
            <th width="15%">Quantit&eacute;</th>
            <th width="15%">Prix</th>
            <th width="15%">Total</th>
            <th width="15%">Action</th>
            </tr>';
            $count = 0;
            foreach($this->cart->contents() as $items)
            {
              $count++;
              $output .= '
              <tr> 
                <td>'.$items["name"].'</td>
                <td>'.$items["qty"].'</td>
                <td>'.$items["price"].'</td>
                <td>'.$items["subtotal"].'</td>
                <td><button type="button" name="remove" style="cursor:pointer" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Supprimer</button></td>
              </tr>
              ';
            }
            $output .= '
            <tr>
              <td colspan="4" align="right">Total</td>
              <td>'.$this->cart->total().'</td>
            </tr>
            </table>
        </div>'; 
        if($count != 0)
        {
          $output .='
          <div class="row">
          <div class="col text-right"> 
            <select class="form-control" name="cmd_table" id="table_list"> 
                <option value=""> CHOISIR LA TABLE DU CLIENT </option>';
                $data = $this->admin_model->get_table();
                foreach($data as $item ){ 
                    $output.='<option value='.$item->id.'>'.$item->code_table.'</option>';
                  }
            $output.='</select> <br>
          </div>
        </div>
          <div class="row">
             <div class="col text-right">
                 <button style="cursor:pointer" id="save_vente" type="button"  class="btn btn-primary">Enregister Commande </button>
              </div>
          </div>';    
        }
        if($count == 0)
        {
           $output = '<h3 align="center">Panier vide </h3>';
        }
        return $output;
     }

    
     public function default_view(){
      $output = '';
      $output .= '
      <h3>Panier d\'Achat </h3><br />
      <div class="table-responsive">
      <div align="right">
        <button  style="cursor:pointer" type="button" id="clear_cart" class="btn btn-warning">Annuler Vente </button>
      </div>
      <br />
      <table class="table table-bordered">
        <tr>
        <th width="40%">Nom</th>
        <th width="15%">Quantit&eacute;</th>
        <th width="15%">Prix</th>
        <th width="15%">Total</th>
        <th width="15%">Action</th>
        </tr>';

       $count = 0;
      foreach($this->cart->contents() as $items)
      {
        $count++;
        $output .= '
        <tr> 
          <td>'.$items["name"].'</td>
          <td>'.$items["qty"].'</td>
          <td>'.$items["price"].'</td>
          <td>'.$items["subtotal"].'</td>
          <td><button style="cursor:pointer" type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Supprimer</button></td>
        </tr>
        ';
      }
      $output .= '
      <tr>
        <td colspan="4" align="right">Total</td>
        <td>'.$this->cart->total().'</td>
      </tr>
      </table>
      </div>';
      
      if($count != 0)
      {
        $output .='
        <div align="right">
           <button style="cursor:pointer" id="save_vente" type="button"  class="btn btn-primary">Valider Vente </button>
        </div>';
      }
     

      if($count == 0)
      {
         $output = '<h3 align="center">Panier vide </h3>';
      }
      return $output;
    }
 
     
    public function view1(){
 
         $output = '';
         $output .= '
         <div class="row">
           <div class="col-md-12"> <h3 class="text-center">Panier d\'Achat </h3><br /> </div>
         </div>
         <div class="row">
             <div class="col text-right"> <button type="button" id="clear_cart" class="btn btn-warning" style="cursor:pointer">Annuler Commande </button> </div> 
         </div>
         <br>
         <div class="table-responsive">
           <table class="table table-bordered">
             <tr>
             <th width="40%">Nom</th>
             <th width="15%">Quantit&eacute;</th>
             <th width="15%">Prix</th>
             <th width="15%">Total</th>
             <th width="15%">Action</th>
             </tr>';
             $count = 0;
             foreach($this->cart->contents() as $items)
             {
               $count++;
               $output .= '
               <tr> 
                 <td>'.$items["name"].'</td>
                 <td>'.$items["qty"].'</td>
                 <td>'.$items["price"].'</td>
                 <td>'.$items["subtotal"].'</td>
                 <td><button type="button" name="remove" style="cursor:pointer" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Supprimer</button></td>
               </tr>
               ';
             }
             $output .= '
             <tr>
               <td colspan="4" align="right">Total</td>
               <td>'.$this->cart->total().'</td>
             </tr>
             </table>
         </div>'; 
         if($count != 0)
         {
           $output .='
           <div class="row">
           <div class="col text-right"> 
             <select class="form-control" name="cmd_table" id="table_list"> 
                 <option value=""> CHOISIR LA TABLE DU CLIENT </option>';
                 $data = $this->admin_model->get_table();
                 foreach($data as $item ){ 
                     $output.='<option value='.$item->id.'>'.$item->code_table.'</option>';
                   }
             $output.='</select> <br>
           </div>
         </div>
           <div class="row">
              <div class="col text-right">
                  <button style="cursor:pointer" id="save_vente" type="button"  class="btn btn-primary">Enregister Commande </button>
               </div>
           </div>';    
         }
         if($count == 0)
         {
            $output = '<h3 align="center">Panier vide </h3>';
         }
         return $output;
      }
 
     
   

    
      public function remove(){

        $row_id = $_POST["row_id"];
        $data = array(
        'rowid'  => $row_id,
        'qty'  => 0
        );
        $this->cart->update($data);
        echo $this->view();
    }

    public function clear(){
      $this->cart->destroy();
      echo $this->view();
    }   
    /**
      * Fonction de Test
    */
    public function debog(){
      
      $data = array(

        'id' => $this->uri->segment(3),
        'qty' =>1
      );
      echo  $this->admin_model->check_quantite1($data);
    
    }

   

    
    private function vente_status($status = 0){
      $output = '';

      if($status == 0){
        $output .= '';
      }elseif($status == 1){
          $output .= '<!--<div class="alert alert-success" role="alert">
        La vente  a été éffectué   <a href="'.base_url('admin/set_commande').'" class="alert-link">Vente </a>. 
          </div>-->';

          $output .= '<div class="alert alert alert-success alert-dismissible fade show" role="alert">
          La vente  a été éffectué   <a href="'.base_url('admin/set_commande').'" class="alert-link"> Vente  </a>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }elseif($status == 2) {
        $output .='<!--<div class="alert alert-danger" role="alert">
          Nous ne pouvons pas prendre en compte votre vente suite à  erreur.  
        </div>-->';

        $output .='<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Nous ne pouvons pas prendre en compte votre vente suite à  erreur.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

      } 
      return  $output;     
    }
    public function nb_vente(){
      $row = $this->admin_model->count_all_vente()->row(); 
      if(isset($row)){
        $nb = $row->nb;
      }
      return $nb+1;
    }
    public function insert_vente2(){

      //$nb = $this->nb_vente();
      $list_plats = array(); //Liste des plats 
      $update_plats = array(); 
      $id_table = $this->input->post('id_table');
      foreach($this->cart->contents() as $items ){

        $row = array (
          'id_plat' => $items["id"],
          'id_user' => $this->session->userdata('id_user'),
          'prix'    => $items["subtotal"],
          'quantite'    => $items["qty"],
          'id_table' =>$id_table
      );
      // retoune les plats qui ont une quantité definie
      $update_data = $this->admin_model->get_quantite_plat($row['id_plat'],$row['quantite']);
      if(!empty($update_data)){
         $update_plats [] = $update_data;
      }
         $list_plats [] = $row;
       
      }
      //var_dump($data);
      // insertion dans la base 
      if($this->admin_model->add_commande1($list_plats,$update_plats,$id_table) > 0 ){ //insertion ok 
        
        //Diminuer la quantité de chaque produit ici 
          $this->cart->destroy();
          echo $this->view();
          echo $this->vente_status(1);

      }else{
          echo  $this->vente_status(2);
      }

    }
    public function insert_vente1(){
      
      //$nb = $this->nb_vente();
      $data = array(); //data contiendra d'une vente
      $data1 = array(); //data contiendra d'une vente
      foreach( $this->cart->contents() as $items ){
        /*$row = array (
            'id_plat' => $items["id"],
            'id_user' => $this->session->userdata('id_user'),
            'prix'    => $items["subtotal"],
            'quantite'    => $items["qty"],
            'code_facture' => $nb
        );*/
        $row = array (
          'id_plat' => $items["id"],
          'id_user' => $this->session->userdata('id_user'),
          'prix'    => $items["subtotal"],
          'quantite'    => $items["qty"],
          'id_table' =>$this->input->post('id_table')
      );
        $data [] = $row;
       
      }
      //var_dump($data);
      // insertion dans la base 
      if($this->admin_model->add_commande($data) > 0 ){ //insertion ok 
        
        //Diminuer la quantité de chaque produit ici 
          $this->cart->destroy();
          echo $this->view();
          echo $this->vente_status(1);

      }else{
          echo  $this->vente_status(2);
      }

    }
    public function insert_vente(){
      
      $nb = $this->nb_vente();
      $data = array(); //data contiendra d'une vente
      $data1 = array(); //data contiendra d'une vente
      foreach( $this->cart->contents() as $items ){
        $row = array (
            'id_plat' => $items["id"],
            'id_user' => $this->session->userdata('id_user'),
            'prix'    => $items["subtotal"],
            'quantite'    => $items["qty"],
            'code_facture' => $nb
        );

        $data [] = $row;
      
      }
      //var_dump($data);
      // insertion dans la base 
      if($this->admin_model->add_vente($data) > 0 ){ //insertion ok 
        
        //Diminuer la quantité de chaque produit ici 
          $this->cart->destroy();
          echo $this->view();
          echo $this->vente_status(1);

      }else{
          echo  $this->vente_status(2);
      }

    }
    public function etats(){
      $data = array(
        'year' =>$this->uri->segment(3),
        'month' =>$this->uri->segment(4)
      );
      $prefs['template'] = '
      {table_open}<table class="table" id="dataTable">{/table_open}

      {heading_row_start}<tr>{/heading_row_start}

      {heading_previous_cell}<th><a href="{previous_url}" class="btn btn-info btn-sm">Prev</a></th>{/heading_previous_cell}
      {heading_title_cell}<th colspan="{colspan}"><span class="text-success">{heading}</span></th>{/heading_title_cell}
      {heading_next_cell}<th><a href="{next_url}" class="btn btn-info btn-sm">Next</a></th>{/heading_next_cell}

      {heading_row_end}</tr>{/heading_row_end}

      {week_row_start}<tr>{/week_row_start}
      {week_day_cell}<td>{week_day}</td>{/week_day_cell}
      {week_row_end}</tr>{/week_row_end}
      
      {cal_row_start}<tr>{/cal_row_start}
      {cal_cell_start}<td><span class="btn btn-light btn-sm">{/cal_cell_start} 
      {cal_cell_start_today}<td class="today"><span class="btn btn-dark btn-sm">{/cal_cell_start_today}
      {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

      {cal_cell_content}<a href="{content}">{day}</a> {/cal_cell_content}
      {cal_cell_content_today}<div class="highlight"><a href="{content}" >{day}</a></div>{/cal_cell_content_today}

      {cal_cell_no_content}{day}{/cal_cell_no_content}
      {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

      {cal_cell_blank}&nbsp;{/cal_cell_blank}

      {cal_cell_other}{day} {/cal_cel_other}

      {cal_cell_end}</span></td>{/cal_cell_end}
      {cal_cell_end_today}</span></td>{/cal_cell_end_today}
      {cal_cell_end_other}</td>{/cal_cell_end_other}
      {cal_row_end}</tr>{/cal_row_end}

      {table_close}</table>{/table_close}';
      $prefs['show_next_prev'] = TRUE;

      $this->load->library('calendar', $prefs);

      $this->load->view('template/header');
        $this->load_admin_menu();
      
      $this->load->view('adminsyst/etats',$data);
      //echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
      
      $this->load->view('template/copyright');
      $this->load->view('template/footer');

    }
    public function show_vente(){

      $vente_date= $this->admin_model->get_etat_per_date('2018-10-28');
      $output ='';
      $output.='Etats de la vente de 2018-10-28';
      $output .='<table class="table table-responsive"> 
                <thead class="thead-dark">
                  <tr>
                    <th>Menu</th>
                    <th>Montant</th>
                  </tr>
                </thead>
              <tbody>';
      $somme = 0;   
      foreach($vente_date as $row){

        $somme+= $row->montant;
        $output .= '<tr> 
          <td>'.$row->nom_cat.'</td>
          <td>'.$row->montant.' Cfa </td>
          </tr>';   
      }
      $output .= '<tr> 
      <td>Total</td>
      <td>'.$somme.'Cfa </td>
      </tr>'; 
      $output.='</tbody></table>';

      $this->load->view('template/header');
        $this->load_admin_menu();
        echo $output;
      $this->load->view('template/copyright');
      $this->load->view('template/footer');      

    }

    public function  today_sel($date =''){

      //$date = date('yyyy-mm-dd');
      if(empty($date)){
        $moment = date('Y-m-d');
      }else{
        $moment = $date;
      }

      $vente_date= $this->admin_model->get_etat_per_date($moment);
      $output ='';
      $output.='<h4 class="text-danger text-center font-italic"> <u>Etats de vente de '.$moment.' </u></h4>';
      $output .='<table class="table table-responsive table-bordered"> 
                <thead class="bg-secondary text-white">
                  <tr>
                    <th scope="col">Menu</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
              <tbody>';
      $somme = 0;   
      foreach($vente_date as $row){

        $somme+= $row->montant;
        $output .= '<tr> 
          <td>'.$row->nom_cat.'</td>
          <td>'.$row->montant.' Cfa </td>
          </tr>';   
      }
      $output .= '<tr class="bg-danger text-white font-weight-bold "> 
      <td >Total</td>
      <td>'.$somme.' Cfa </td>
      </tr>'; 
      $output.='</tbody></table>';

      if($somme == 0){
        $output = '<h4 class="text-danger text-center font-italic"> Pas de vente à ce jour du '.$moment.' </h4>';
      }
      echo $output;

    }
    public function to_day_sel(){

      $date = $_POST['date'];
      $this->today_sel($date);

    }
    // Page des utilisateurs
    public function  users (){
      
      $data['success'] = FALSE;
      // $query = $this->admin_model->liste_users2(5,$this->uri->segment(3));
      // $data['list'] = $query->result();
      //Get full row of users
      /*$query2 = $this->admin_model->liste_users();
      $config['base_url'] = base_url('admin/plats/');
      $config['total_rows'] = $query2->num_rows();
      $this->pagination->initialize($config);*/
      $query=$this->admin_model->get_users_except();
      $data['list'] = $query->result();
      $this->load->view('template/header');
        $this->load_admin_menu();
      $this->load->view('adminsyst/users',$data);
      $this->load->view('template/copyright');
      $this->load->view('template/footer');        

    }

  // Activer un utilisateur innactif
    public function activer_user(){

      $id_user = $this->uri->segment(3);   
      if($this->admin_model->activer_user($id_user)){
        $data['success'] = 'success';
        $data['message'] = "UTILISATEUR ACTIVER AVEC SUCCESS";
        $query=$this->admin_model->get_users_except();
        $data['list'] = $query->result();

        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/users',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');        
      }else{

        $data['success'] = 'fail';
        $data['message'] = "ERREUR D'ACTIVATION";
        $query=$this->admin_model->get_users_except();
        $data['list'] = $query->result();
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/users',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');       

      }
    }

    //Désactiver un utilisateur actif
    public function desactiver_user(){

      $id_user = $this->uri->segment(3);   
      if($this->admin_model->desactiver_user($id_user)){
        $data['success'] = 'success';
        $data['message'] = "UTILISATEUR DEASACTIVER AVEC SUCCESS";
        $query=$this->admin_model->get_users_except();
        $data['list'] = $query->result();
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/users',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');        
      }else{
        $data['success'] = 'fail';
        $data['message'] = "ERREUR DE DESACTIVATION";
        $query=$this->admin_model->get_users_except();
        $data['list'] = $query->result();
        $this->load->view('template/header');
          $this->load_admin_menu();
        $this->load->view('adminsyst/users',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');          
      }    
    }  

    public function new_user(){

      $this->load->library('encryption');
      // Regles de validation 
        $config = array(
          array(
            'field' => 'login',
            'label' => 'Login',
            'rules' => 'required|min_length[3]|is_unique[users.login_user]'
          ),  
          array(
            'field' => 'password',
            'label' => 'Le mot de passe',
            'rules' => 'required|min_length[5]'
          ),
          array(
            'field' => 'password1',
            'label' => 'Le mot de passe',
            'rules' => 'required|min_length[5]|matches[password]'
          ),
          array(
            'field' => 'role',
            'label' => 'La fonction',
            'rules' => 'required'
          )
        );
      $this->form_validation->set_rules($config);
    
      if($this->form_validation->run() == FALSE){
          // Liste de categorie de produits
          $data['list'] = $this->admin_model->get_users_role();
          $data['success'] = FALSE; 
          $this->load->view('template/header');
            $this->load_admin_menu();

          $this->load->view('adminsyst/new_user',$data);

          $this->load->view('template/copyright');
          $this->load->view('template/footer');

      } 
      else{  
          // Cripter le mot de passe
            $password_cripter = $this->encryption->encrypt($this->input->post('password'));
            // insertion ok

          if($this->admin_model->add_user($password_cripter)){
                // Liste des utilisateurs
                $data['list'] = $this->admin_model->get_users_role();
                $data['success'] = TRUE; 
                $data['message'] =  "INSERTION SUCCESS ->  <span class='text-info'>". $this->input->post('login')."</span> ";
                $this->load->view('template/header');
                  $this->load_admin_menu();

                $this->load->view('adminsyst/new_user',$data);
                $this->load->view('template/copyright');
                $this->load->view('template/footer');
            }

          }
      
    }

    /**
     * Page de parametrage 
     */
    public function setting(){

        $data['success'] = FALSE;
        $query=$this->admin_model->get_vanille_tab();
        $data['list'] = $query->result();
        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/setting',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');         
    }
    /**
     * Enregister une nouvelle table 
     */
    public function new_table(){
      // Regles de validation 
      $config = array(
        array(
          'field' => 'code',
          'label' => 'Code de table',
          'rules' => 'required|is_unique[van_table.code_table]'
        )
      );
      $this->form_validation->set_rules($config);
  
      if($this->form_validation->run() == FALSE){

          $data['success'] = FALSE; 
          $this->load->view('template/header');
          $this->load_admin_menu();
          $this->load->view('adminsyst/table_new',$data);
          $this->load->view('template/copyright');
          $this->load->view('template/footer');

      } 
      else{  
            // insertion ok
          if($this->admin_model->add_table()){
                $data['success'] = TRUE; 
                $data['message'] =  "INSERTION SUCCESS ->  <span class='text-info'>". $this->input->post('code')."</span> ";
                $this->load->view('template/header');
                $this->load_admin_menu();
                $this->load->view('adminsyst/table_new',$data);
                $this->load->view('template/copyright');
                $this->load->view('template/footer');
            }
          }

      

    }
    /**
     * Suppression de table
     */
    public function delete_table(){
        
      $id_table = $this->uri->segment(3);

      if($this->admin_model->delete_table($id_table)){
        $data['success'] = 'success';
        $data['message'] = "SUPPRESSION SUCCESS";
        $query=$this->admin_model->get_vanille_tab();
        $data['list'] = $query->result();
        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/setting',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');   
        
      }else{

        $data['success'] = 'fail';
        $data['message'] = " ERREUR DE SUPPRESSION";
        $query=$this->admin_model->get_vanille_tab();
        $data['list'] = $query->result();
        $this->load->view('template/header');
        $this->load_admin_menu();
        $this->load->view('adminsyst/setting',$data);
        $this->load->view('template/copyright');
        $this->load->view('template/footer');   
          
      }

    }
   /**
   * Page de gestion des nouvelles commandes
   */
 
    public function commande(){ 
      //$this->plats_data(); 
      $data['success'] = FALSE;
      $query = $this->admin_model->liste_plats2(6,$this->uri->segment(3));
      $data['list'] = $query->result();
      //Get full row of product
      $query2 = $this->admin_model->liste_plats();
      $config['per_page'] =6;
      $config['base_url'] = base_url('admin/commande/');
      $config['total_rows'] = $query2->num_rows();
      $this->pagination->initialize($config);
      
      $this->load->view('template/header');
      $this->load_admin_menu();
      $this->load->view('adminsyst/commande',$data);
      $this->load->view('template/copyright');
      $this->load->view('template/footer');

    }
    

   // Cette page servira de squelette de page
   public function template(){ 

    $this->load->view('template/header');
    $this->load_admin_menu();
    $this->load->view('adminsyst/template');
    $this->load->view('template/copyright');
    $this->load->view('template/footer');

   }
   /**
    * Ajout de ligne commande
    */
   public function commande1(){ 
    //$this->plats_data(); 
    $data['success'] = FALSE;
    $query = $this->admin_model->liste_plats2(6,$this->uri->segment(3));
    $data['list'] = $query->result();
    //Get full row of product
    $query2 = $this->admin_model->liste_plats();
    $config['per_page'] =6;
    $config['full_tag_open'] = '<ul class="pagination" id="search_page_pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['base_url'] = base_url('admin/commande1/');
    $config['total_rows'] = $query2->num_rows();
    $this->pagination->initialize($config);
    //$this->load->view('template/header');
    //$this->load_admin_menu();
    $this->load->view('adminsyst/commande1',$data);
    //echo $string;
    //$this->load->view('template/copyright');
    //$this->load->view('template/footer');

  }
   //Validation de la commande du client 
   public function set_commande(){

    $data = array();
    $data['list'] = $this->admin_model->get_commande_table();
    $this->load->view('template/header');
    $this->load_admin_menu();
    $this->load->view('adminsyst/set_commande',$data);
    $this->load->view('template/copyright');
    $this->load->view('template/footer');

   }

  // Lister les commandes en cours
  public function get_a_commande(){

   $id_tab = $this->input->post('id_tab');
   $code_tab = $this->input->post('code_tab');
   echo $this->a_table_data($id_tab,$code_tab);
   
  }
  
  private function a_table_data($id_tab,$code_tab){

    $data = $this->admin_model->get_commande_by_id($id_tab);
    //var_dump( $data->result());
    $output ='';
    $nb = 0;
    $nb = $data->num_rows();
    if($nb>0){
 
     $output.='<table class="table table-bordered">
       <thead>
         <tr>
             <th class="font-weight-bold"> Table Numero :<span class="text-danger">'.$code_tab.'</span>  </th>
             <th colspan="4" class="text-right">    <button style="cursor:pointer" class="btn btn-danger" id="add_cmd" data-toggle="modal" data-target="#exampleModalLong"> Ajouter <i class="fas fa-plus"></i> </button>  </th>
         </tr>
         <tr> 
             <th>Nom</th>
             <th>Quantité</th>  
             <th>Prix</th>
             <th>Total</th>
             <th>Action</th> 
         </tr>
       </thead>
       <tbody>';
       $total=0;
       foreach($data->result() as $row){
          $montant = $row->prix * $row->quantite;
          $output.='<tr>
              <td>'.$row->nom_plat.'</td>
              <td>'.$row->quantite.'</td>
              <td>'.$row->prix.'</td>
              <td>'.$montant.'</td>
              <td> <button style="cursor:pointer" class="btn btn-danger row_cmd"  data-row-plat="'.$row->id_plat.'"> Supprimer  </button>   </td>
            </tr>';
          $total+=$montant;
          }

          $output.='<tr>
              <td colspan="4" class="text-center font-weight-bold"> Total Gén </td>
              <td>'.$total.'</td>
           </tr>
            
           <tr>
             <td colspan="5" class="text-right"> <button style="cursor:pointer" class="btn btn-danger"  id="all_data" data-savev="'.$id_tab.'"> Enregister Vente <i class="fa fa-plus"></i> </button>  </td>
           </tr> 
         </tbody></table>';
         
     }else{
       $output='';
     }
     return $output; 
  }

  /**
   * Fonction permettant d'ajouter une nouvelle ligne de produit ou udapte 
   */
  public function add_lign_commande(){
     //var_dump($_POST);
     $colums =  array(
               'id_plat' => (int) $this->input->post('product_id'),
               'id_table' =>(int)$this->input->post('id_tab')
              );
      $product =  array(
        'id_plat' => (int) $this->input->post('product_id'),
        'id_table' => (int) $this->input->post('id_tab'),
        'quantite'=>  $this->input->post('quantity'),
        'prix'=>  $this->input->post('product_price'),
        'id_user' => $this->session->userdata('id_user')
        );
        $data =  array(
          'id' => (int) $this->input->post('product_id'),
          'qty'=>  $this->input->post('quantity'),
          );
        //Si quantite_stock>=quantite_demande
      if($this->admin_model->check_quantite($data)){

            $response = $this->admin_model->add_commande_row($product,$colums);
            
            if($response['result']){

                  $id_tab = (int) $this->input->post('id_tab');
                  $code_tab = $this->input->post('code_tab');
                  
                  echo $this->a_table_data($id_tab,$code_tab);
            }else{
                echo 'error';       
            }
       
      }else{
          
        echo 'error_qty';     
      }
        

  }

  public function delete_lign_commande(){

    // Recuperation dde l'id du plat par ajax 
      $code_plat =  (int)$this->input->post('code_plat'); 
      $id_tab = (int) $this->input->post('id_tab');
      $code_tab = $this->input->post('code_tab');

      if($this->admin_model->delete_lign_commande($code_plat,$id_tab)){
        echo $this->a_table_data($id_tab,$code_tab);
      }else{
          echo 'error';
      }

  }


  public function  venteTotal(){

   //récuperation de l'i de la table 
   $id_table = (int)$this->input->post('row_tab');
   //Enregisterement de la vente 
    if($this->admin_model->saveVente($id_table)){
        echo 'success';   
    }else{
        echo 'error'; 
    }

  }




}
?>