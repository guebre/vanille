<div class="container marge-top"> 
   <h4  class="text-center"> <u>MENU DE LA VANILLE </u>  </h4>
    <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active " id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><?php echo img("Actions-view-list-text-icon.png","image","bf") ?> <span class="font-weight-bold">Liste</span> </a>
          <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"> <?php echo img("New-file-icon.png","image","bf") ?> <span class="font-weight-bold"> Nouveau </span></a>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade " id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <?php require_once 'fraction1.php' ;  ?>
           </div>      
        
          <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
              <div>
              <?php //var_dump($list) ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-info">
                            <th>MENU </th>
                            <th>ACTION </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list->result() as $row): ?>
                                <tr>
                                    <td> <?php echo $row->nom_cat; ?> </td>
                                    <td><?php  echo anchor('admin/delete_menu/'.$row->id_cat, 'Supprimer', array('class' =>'btn btn-danger btn-sm')); ?> </td>  
                                </tr>
                            <?php endforeach;?>         
                        </tbody>
                    </table>
                    <?php echo $this->pagination->create_links();  ?>
              </div>
            
          </div>
        
        </div>
      </div>
    </div>
</div>