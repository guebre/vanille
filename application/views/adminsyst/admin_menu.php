
    <nav class="navbar navbar-dark  navbar-expand-md bd-navbar mb-4" role="navigation"><!--header-menu-->
      <!--<div class="container">-->
     
        <a class="navbar-brand" href="<?php  echo base_url('admin'); ?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
            <div class="navbar-text ml-4   border-info text-white"> <marquee> GLACIER | RESTAURANT | PATISSERIE LA VANILLE </marquee>  </div>

            <button type="button" class="btn btn-light ml-auto">
               alerts <a href="<?php echo base_url('admin/appro_seuil'); ?>" class="badge badge-danger"><?php echo $list->num_rows() ;?> </a>
            </button>
            <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php  echo $this->session->userdata('login_user'); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>"><?php echo img('Apps-session-logout-icon.png','ok','ok'); ?>Se D&eacuteconnecter</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><?php echo img('my-profile-icon.png','ok','ok'); ?> Mon profil</a>
                    </div>
                </li>
            </ul>   
        </div> 
      <!--</div>  -->
    </nav>


