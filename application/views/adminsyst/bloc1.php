<?php  

    $attribute2 = array(
    'class' => 'list-group-item list-group-item-action',
    'role' => 'button'
    );
    $image_attribute_liste = array(
        'src' => 'assets/images/Food-List-Ingredients-icon.png',
        'alt' => 'image_cat',
        'class' =>''
    );
    echo anchor('admin/product',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste </span>',$attribute2) ;         
?>