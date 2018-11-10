<?php //var_dump($list) ?>
<table class="table table-striped">
    <thead>
        <tr class="bg-info">
        <th>Plats </th>
        <th>Quantité Restante </th>
        <th>Quantité  de Seuil </th>
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($list->result() as $key => $row) : ?>
            <tr>
                <td> <?php echo $row->nom_plat; ?> </td>
                <td class="table-danger"> <input  type="number" value="<?php echo $row->quantite;?>">  </td>
                <td> <?php echo $row->quantite_seuil; ?>  </td>
                <td> <?php echo anchor('admin/appro_stock/'.$row->id_plat, 'Approvisionner', array('class' =>'btn btn-success btn-sm')); ?> </td>  
            </tr>
        <?php endforeach; ?>   
    </tbody>
</table>