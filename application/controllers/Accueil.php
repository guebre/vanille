<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_controller{
    
    public function __construct(){

        parent::__construct();
        $this->load->library('encryption');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
    }

    public function  index(){ 
        $error_data = [];// array('login_fail'=>null);
        $error_data['login_fail']=null;
        //$error_data['innactif'] = 'rien';
        //$error_data['password']= $this->encryption->encrypt('chaine');
        /*$error_data['decode']=  $this->encryption->decript('chaine-encode');*/
        
        /* 
          On verifie si l'utilisateur est déja connecté 
          si oui on le redirige sur son interface
        */
        if($this->session->userdata('logged_in') == TRUE){
                //Vérification de son niveau d'accès
                if($this->session->userdata('niveau') == 1):
                    redirect('admin');
                else :
                    redirect('admin');
                endif;
        }else{

             /* Si le user n'est pas connecté
             * on verifie les données du formulaire 
             */
            $this->form_validation->set_rules('usrname','Pseudo','trim|required|min_length[5]|max_length[30]');
            $this->form_validation->set_rules('usrpass','Password','required|min_length[5]|max_length[30]');
            
            //Données du formulaire incorrectes 
            if($this->form_validation->run() == FALSE):
                $this->load->view('template/header');
                $this->load->view('template/signin',$error_data);
                $this->load->view('template/footer');
            else:
                /*Les données du formulaire  correctes
                * Vérification de l'existance de l'utilisateur dans la base 
                */
                $pseudo=$this->input->post('usrname');
                $password=$this->input->post('usrpass');
                $query = $this->accueil_model->does_user_exist($pseudo);
                //print_r($query->num_rows());
                //echo  '<br>Password:'.$password.' sont type est:'.gettype($password).'<br>';
                if($query->num_rows() == 1): // si on a un seul enregistrement

                    foreach($query->result() as $key=> $row){
                        // Cripter le password et le comparer à celui de la base
                           $hash_pass = $this->encryption->decrypt($row->password_user);
                            
                           if( $row->statut != 0){ // Si l'utilisateur est actif 
                              if( $hash_pass != $password){ //Le mot de passe cripter ne correspond pas à celui de la base
                                  //L'utilisateur ne peut se connecter
                                  $error_data['login_fail'] = true;
                                  $error_data['innactif'] = 'Password incorrect';
                                  $this->load->view('template/header');
                                  $this->load->view('template/signin',$error_data);
                                  $this->load->view('template/footer');
                              } else {
                                  // initialisation des données de sessions
                                $data = array(
                                    
                                   'id_user' => $row->id_user,
                                   'login_user'=>$row->login_user,
                                   'loginAt'=>$row->loginAt,
                                   'loginEnd'=>$row->loginEnd,
                                   //'role_id'=>$row->role_id,
                                   'statut'=>$row->statut,
                                   'niveau'=>$row->niveau,
                                   'logged_in'=>TRUE,
                                   'logAt'=> date("Y-m-d H:i:s")
                                );
                                // Initialisation des variables de sessions
                                $this->session->set_userdata($data);
                                // Redirection du user sur le bon interface selon son niveau 
                                 switch($data['niveau']):
                                     case 1 : 
                                         redirect('admin');
                                         break;
                                     
                                     case 2 : 
                                        redirect('admin');
                                        break;
                                    endswitch;
                              }

                           }else {
                             //L'utilisateur est innactif
                             $error_data['login_fail'] = true;
                             $error_data['innactif'] = 'innactif user';
                             $this->load->view('template/header');
                             $this->load->view('template/signin',$error_data);
                             $this->load->view('template/footer');
                           }

                        }

                 else:  // si on plus d'un entregistrement
                       $error_data['login_fail'] = true;
                       $error_data['innactif'] = 'Deux  pseudo identiques';
                       $this->load->view('template/header');
                       $this->load->view('template/signin',$error_data);
                       $this->load->view('template/footer');
                endif;
                
            
            endif;
        }

    } /*-- fin index--*/
     
      // Affichage de l'interface d'administrateur
      public function adminPane(){

        //Vérification des variables de session
        if($this->session->has_userdata('pseudo')){

            $this->load->view('template/header');
            $this->load->view('adminsyst/admin_menu');
            $this->load->view('adminsyst/admin_pane');
            $this->load->view('template/copyright');
            $this->load->view('template/footer');

        }else { 

            redirect('romanobanderas/login');
        }
        

      }
 
      /** 
      * Déconnecter l'utilisateur 
      * en détruisant ses donnees 
      * de session et la session elle meme
      **/
      public function logout(){

       $this->admin_model->logout($_SESSION['pseudo']);
       $this->session->unset_userdata('pseudo');
       $this->session->sess_destroy(); 
       redirect('romanobanderas');

      }

      public function new_agence(){
        //Si la session existe
        if($this->session->has_userdata('pseudo')){
            //Validation des données du formulaire
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header');
                $this->load->view('adminsyst/admin_menu');
                $this->load->view('adminsyst/new_agence');
                $this->load->view('template/copyright');
                $this->load->view('template/footer');   
            }    

        }else{
            redirect('romanobanderas/login');
        }
     }
}   

 ?>

