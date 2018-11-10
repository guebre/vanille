<div class="container-fluid">
   <p class="bg-info"> <strong>Nouvelle agence de voyage </strong></p>

  <?php echo form_open('adminsysteme/new_agence'); ?>
        <nav>
            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">AGENCE</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">GERANT</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ABONNEMENT</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="denomi"><strong>Dénomination</strong> </label>
                          <input type="text"  name="denom" class="form-control" id="denomi" placeholder="Rafiq voyage">
                      </div>
                      <div class="form-group">
                          <label for="loc"><strong>Localité</strong> </label>
                          <input type="text"  name="localite" class="form-control" id="loc" placeholder="Ouagadougou">
                      </div>
                      <div class="form-group">
                         <label for="adr"><strong>Adresse</strong> </label>
                         <input type="text"  name="adresse" class="form-control" id="adr" placeholder="Ouagadougou 09 bp 237">
                      </div>
                        
                  </div><!--col1-->

                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone"><strong>Téléphone</strong> </label>
                            <input type="text"  name="phone1" class="form-control" id="telephone" >
                        </div>
                       <div class="form-group">
                            <label for="log"><strong>Logo</strong> </label>
                            <input type="file"  name="logo" class="form-control" id="log" >
                        </div>
                        
                  </div><!--col2-->
                </div>
               
            </div> <!-- Fin info agence -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                
                <div class="row">
                    <div class="col-md-6">
                         col1
                        <div class="form-group">
                            <label for="pseudo"><strong>Pseudo</strong> </label>
                            <input type="text"  name="pseudo" class="form-control" id="pseudo" placeholder="rango">
                        </div>
                        <div class="form-group">
                          <label for="password"><strong>Password</strong> </label>
                          <input type="password"  name="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                          <label for="mail"><strong>Email</strong> </label>
                          <input type="email"  name="mail" class="form-control" id="mail" placeholder="rango@yahoo.fr">
                        </div>
                    </div> <!-- col1 -->
                    <div class="col-md-6">
                      col2
                      <div class="form-group">
                          <label for="phone1"><strong>Phone 1</strong> </label>
                          <input type="text"  name="phone1" class="form-control" id="phone1" placeholder="0022678936114">
                      </div>
                      <div class="form-group">
                        <label for="phone2"><strong>Phone 1</strong> </label>
                        <input type="text"  name="phone2" class="form-control" id="phone2" placeholder="0022678936115">
                      </div>
                      <div class="form-group">
                        <label for="phone3"><strong>Phone 3</strong> </label>
                        <input type="text"  name="phone3" class="form-control" id="phone3" placeholder="0022678936116">
                      </div>
              
                    </div> <!--- col2-->
                </div> 

            </div> <!-- Fin info Gerant -->

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="form-group">
                       <label for="date1"><strong>Date Debut</strong> </label>
                      <input type="date"  name="date1" class="form-control" id="date1">
                  </div>
                  <div class="form-group">
                       <label for="date2"><strong>Date Fin</strong> </label>
                      <input type="date"  name="date2" class="form-control" id="date2">
                  </div>

            </div><!--  Fin info abonnement-->
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-block">
        </div>
        <form>
    <?php// echo form_close(); ?>
</div>






