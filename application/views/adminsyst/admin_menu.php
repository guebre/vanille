<header>   

    <nav class="navbar fixed-top navbar-dark  navbar-expand-sm bd-navbar" role="navigation"><!--header-menu-->
        
        <a class="navbar-brand" href="<?php  echo base_url('admin'); ?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
            <!--<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php //echo img('Office-icon','ok','ok'); ?>  AGENCES <span class="sr-only">(current)</span></a>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php //echo img('Office-icon.png','ok','ok'); ?> La vanille
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php //echo base_url('admin/nouvel_agence'); ?>"><?php echo img('Button-Add-icon.png','ok','ok'); ?> Nouvelle agence </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php //echo base_url('admin/gerant'); ?>"><?php echo img('Global-Manager-icon.png','ok','ok'); ?> Nouveau gérant </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php //echo base_url('admin/liste_agence'); ?>"><?php echo img('Food-List-Ingredients-icon.png','ok','ok'); ?> Liste agences</a>
                    </div>
                </li>
               <div class="nav-item">
                    <a class="nav-link" href="#"><?php// echo img('Groups-Meeting-Dark-icon.png','ok','ok'); ?>ABONNES</a>
                </div>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php //echo img('Groups-Meeting-Light-icon.png','ok','ok'); ?>  GROUPE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php //echo base_url('romanobanderas/logout'); ?>"><?php echo img('Global-Manager-icon.png','ok','ok'); ?> Gerant </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><?php //echo img('Townspeople-Retirement-home-director-icon.png','ok','ok'); ?> DG</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><?php //echo img('girl-beauty-consultant-products-icon.png','ok','ok'); ?> Consultant</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><?php// echo img('Teacher-female-icon.png','ok','ok'); ?> Secretaire</a>
                    </div>
                </li>

            </ul> -->
            <div class="navbar-text ml-4   border-info text-white"> <marquee> GLACIER | RESTAURANT | PATISSERIE LA VANILLE </marquee>  </div>
            
            <button type="button" class="btn btn-light ml-auto">
              alerts <a href="<?php  echo base_url('admin/appro_seuil'); ?>" class="badge badge-danger"><?php echo $list->num_rows() ;?> </a>
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
    </nav>
</header>

