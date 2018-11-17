$( document ).ready(function() {
    

    $('#etatData').load(base_url+'admin/today_sel');
    
    // initialisation de datepicker
    var date = new Date(); 

    var year = date.getFullYear();
    var month = date.getMonth()+1;
    var day = date.getDate();

    var date1 = year+'-'+month+'-'+day;
    //console.log(date1);
    
    $('#datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat : 'yy-mm-dd', 
        onSelect: function(date){
            $('#btnEtat').prop('disabled',false);
        }  
    });

    $('#btnEtat').click(function(){
        event.preventDefault();
        var date = $(datepicker).val();
        //alert(date);
        $('#etatData').html('Chargement...');
       // alert(date);
        $.ajax({
            url:base_url+"admin/to_day_sel",
            method:"POST",
            data:{date:date},
            success:function(data)
            {
            //alert("Produit  a été ajouté au panier");
            $('#etatData').html(data);
            }
        });            
    });

    

    $('.add_cart').click(function(){

        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var product_price = $(this).data("price");
        var quantity = $('#'+product_id).val();
        //alert(quantity+'   '+product_id);
        if(quantity != '' && quantity > 0)
        {
            $.ajax({
                url:base_url+"admin/add_shopping",
                method:"POST",
                data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
                success:function(data)
                {
                    alert("Produit  a été ajouté au panier");
                    $('#cart_details').html(data);
                    $('#'+product_id).val('');
                }
            });
        }
        else
        {
          alert("Please entrer la quantité");
        }
       });


    $('#cart_details').load(base_url+'admin/load');
    //Chargement de la vente du jour

    

    $('vente_status').html('');

    $(document).on('click', '#save_vente', function(){

        if(confirm("Voulez vous vraiment enregister la vente?"))
        {
         $.ajax({
          url:base_url+"admin/insert_vente",
          success:function(data)
          {
           //alert("Votre effectué");
           $('#vente_status').html(data);
           $('#cart_details').load(base_url+'admin/load');
          }
         });
        }
        else
        {
         return false;
        }
    });



    $(document).on('click', '.remove_inventory', function(){
        var row_id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this?"))
        {
         $.ajax({
          url:base_url+"admin/remove",
          method:"POST",
          data:{row_id:row_id},
          success:function(data)
          {
           alert("Produit supprimé du panier");
           $('#cart_details').html(data);
          }
         });
        }
        else
        {
         return false;
        }
       });
   
   
   
   
   
   
    /* function get_list_menu(){

        // Assign handlers immediately after making the request,
          // and remember the jqxhr object for this request
          $.get(base_url+'admin/listeMenu', function(data) {
              //alert( "success" );
              //console.log(data);
              $("#liste_menu").html(data);
          });
    } 
    get_list_menu();
    */
    //console.log(base_url+'menu_liste');
    $("#form_cat").submit(function(){
        event.preventDefault();
        //alert($("#form_cat").attr("action"));
        //Obtenir les données
        var nomCat = $("#nom_cat").val();
        //var photoCat = $("#photo_cat").val();
        var url = $("#form_cat").attr("action");
        //console.log(`le nom de la categorie est ${nomCat} et celui de l'image est ${photoCat}`);
        //var email= $("#email").val();
        
            $.ajax(
                {
                    type:"post",
                    url:url,
                    data:{nomCat: nomCat},
                    success:function(response)
                    {
                        //console.log(response);
                        $("#message").html(response);
                        $("#nom_cat").val('');
                        //$('#cartmessage').show();
                    },
                    error: function() 
                    {
                        alert("Invalide!");
                    }
                });

    });

    $(document).on('click', '#clear_cart', function(){
        if(confirm("Voulez vous vraiment annuler la vente ?"))
        {
         $.ajax({
          url:base_url+"admin/clear",
          success:function(data)
          {
           alert("Votre panier a été vider");
           $('#cart_details').html(data);
          }
         });
        }
        else
        {
         return false;
        }
    });
      

  /* $("#list-profile-list").on("click",function(){
        get_list_menu();   
    });
*/
    $( "#dataTable" ).on( "click", "td", function() {
        console.log( $( this ).text() );
      });

    $("#table_list").change(function(){
        alert("ok");
    });

   
      

});
