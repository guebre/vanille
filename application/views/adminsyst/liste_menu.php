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