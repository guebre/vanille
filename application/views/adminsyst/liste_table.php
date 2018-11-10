<?php //var_dump($list) ?>
<table class="table table-striped">
    <thead>
        <tr class="bg-info">
        <th>Code Table</th>
        <!--<th>Place(s)</th>-->
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $key => $row) : ?>
            <tr>
                <td> <?php echo $row->code_table; ?> </td>
               <!-- <td> <?php//echo $row->nb_place; ?> </td>-->
                <td> <?php echo anchor('admin/delete_table/'.$row->id, 'Supprimer', array('class' =>'btn btn-danger btn-sm')); ?> </td>  
            </tr>
        <?php endforeach; ?>   
    </tbody>
</table>