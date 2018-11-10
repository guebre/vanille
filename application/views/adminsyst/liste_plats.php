<?php //var_dump($list) ?>
<table class="table table-striped">
    <thead>
        <tr class="bg-info">
        <th>Plats </th>
        <th>Prix</th>
        <th>Cat&eacutegorie</th>
        <th>Action </th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $key => $row) : ?>
            <tr>
                <td> <?php echo $row->nom_plat; ?> </td>
                <td> <?php echo $row->prix.' CFA'; ?> </td>
                <td> <?php echo $row->nom_cat; ?> </td>
                <td> <?php echo anchor('admin/delete_plat/'.$row->id_plat, 'Supprimer', array('class' =>'btn btn-danger btn-sm')); ?> | <?php  echo anchor('admin/set_plat/'.$row->id_plat, 'Modifier', array('class' =>'btn btn-success btn-sm','id'=>'set_prod')); ?> </td>  
            </tr>
        <?php endforeach; ?>   
    </tbody>
</table>