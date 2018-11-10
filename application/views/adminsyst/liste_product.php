<?php //var_dump($list) ?>
<table class="table table-striped">
    <thead>
        <tr class="bg-info">
        <th>Produits </th>
        <th>Prix unit </th>
        <th>quantit&eacute</th>
        <th>Seuil </th>
        <th>Cat&eacutegorie</th>
        <th>Action </th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $key => $row) : ?>
            <tr>
                <td> <?php echo $row->nom_prod; ?> </td>
                <td> <?php echo $row->prix_unit.' CFA'; ?> </td>
                <td> <?php echo $row->quantite; ?> </td>
                <td> <?php echo $row->qte_alert; ?> </td>
                <td> <?php echo $row->categorie; ?> </td>
                <td> <?php echo anchor('admin/delete_product/'.$row->id_prod, 'Supprimer', array('class' =>'btn btn-danger btn-sm')); ?> | <?php  echo anchor('admin/set_product/'.$row->id_prod, 'Modifier', array('class' =>'btn btn-success btn-sm','id'=>'set_prod')); ?> </td>  
            </tr>
        <?php endforeach; ?>   
        <?php //echo $this->pagination->create_links(); ?>
        <?php //echo//$base_url; ?>
    </tbody>
</table>