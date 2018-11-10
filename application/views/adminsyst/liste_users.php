<?php //var_dump($list) ?>
<table class="table table-striped">
    <thead>
        <tr class="bg-info">
        <th>Pseudo</th>
        <th>Date Connexion</th>
        <th>Date Déconnexion</th>
        <th>Role</th>
        <th>Statut</th>
        <th>Action </th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $key => $row) : ?>
            <tr>
                <td> <?php echo $row->login_user; ?> </td>
                <td> <?php echo $row->loginAt; ?> </td>
                <td> <?php echo $row->loginEnd; ?> </td>
                <td> <?php echo  ($row->niveau == 1)  ? 'Administrateur' : 'Caissier'; ?> </td>
                <td> <?php echo ($row->statut == 1) ? 'Actif' : 'Innactif'; ?> </td>
                <td> <?php /*echo anchor('admin/delete_user/'.$row->id_user, 'Supprimer', array('class' =>'btn btn-danger btn-sm'));*/ ?> <?php  echo ( $row->statut == 1) ?  anchor('admin/desactiver_user/'.$row->id_user, 'D&eacute;activer', array('class' =>'btn btn-success btn-sm','id'=>'desactiver_user')) : anchor('admin/activer_user/'.$row->id_user, 'Activer', array('class' =>'btn btn-danger btn-sm','id'=>'activer_user')) ; ?> </td>  
            </tr>
        <?php endforeach; ?>   
    </tbody>
</table>