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
                    //Activation du select des tables
                    $('#table_list').show();
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
    /*var str = $('#cart_details').html();
    console.log('la valeur est:'+str);
    if(str ==''){
        $('#table_list').hide();
    }*/

   /* $('#table_list').on('change',function(){
        //alert(this.value);
        //alert($('#cart_details').text())
     });*/
     

    $('vente_status').html('');

    $(document).on('click', '#save_vente', function(){

      var numbTab = $('#table_list').val();
      if(numbTab == ''){

        alert('Veuillez choisir la table du client');

      }else{

        if(confirm("Voulez vous vraiment enregister la vente?"))
        {
            $.ajax({
                url:base_url+"admin/insert_vente1",
                method:"POST",
                data:{id_table: numbTab},
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
    
    //Rechecher une commande
    $(document).on('click','#find_tab',function(event){

        event.preventDefault();
        //obtenir l'id de la table
        var id_tab = $('#table-cli').val();
        var code_tab = $('#table-cli option:selected').text();
        //alert(code_tab);
        //alert(id_tab);
        if(id_tab ==''){
            alert('Veuillez choisir un numero de table');
        }else{

            $.ajax({
                url:base_url+"admin/get_a_commande",
                method:"POST",
                data:{id_tab : id_tab,code_tab: code_tab},
                success:function(data){
                     $('#row_commande').html(data);
                },
                error:function(){
                 
                }
            });
        }

    });

   
  /**
   * Ajout de ligne commande
   **/ 
    $('.modal-body').load(base_url+'admin/commande1');
    $('#exampleModalLong').on('show.bs.modal', function (event) {

        let id_tab = $('#table-cli').val();
        let code_tab = $('#table-cli option:selected').text();
        //var button = $(event.relatedTarget); // Button that triggered the modal
        //alert('#add_cart').val();
        //var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);

        //modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)
        //modal.find('.modal-body').load(base_url+'admin/commande1');
        modal.find('.modal-title').text('Ajout de produit à la table numero'+ code_tab);
      

      });


    // Si le modal est visible sur l'ecran 
    $('#exampleModalLong').on('shown.bs.modal', function (e) {
        
        $('body').on('click','ul#search_page_pagination>li>a',function(ev){
            ev.preventDefault();  // prevent default behaviour for anchor tag
            let Pagination_url = $(this).attr('href'); // getting href of <a> tag
            //$('.modal-body').load(Pagination_url);
            $.ajax({
                url:Pagination_url,
                type:'POST',
                success:function(data){
                //var $page_data = $(data);
                //$('#exampleModalLong').modal('show');
                $('.modal-body').html(data);
                // $('table').addClass('table');
                }
            });

        });

        $('body').on('click','.add_cart1',function(){
      
               //alert('add_cart1');
               let product_id = $(this).data("productid1");
               let product_name = $(this).data("productname1");
               let product_price = $(this).data("price1");
               let quantity = $('#i_'+product_id).val();
               let id_tab = $('#table-cli').val();
               let code_tab = $('#table-cli option:selected').text();

               //alert(quantity+'   '+product_id);
        
               if(quantity != '' && quantity > 0)
               {
                   $.ajax({
                       url:base_url+"admin/add_lign_commande",
                       method:"POST",
                       data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity,code_tab:code_tab,id_tab:id_tab}, 
                       success:function(data)
                       {
                           alert("Produit a été ajouté à la commande");
                           $('#row_commande').html(data);
                           $('#i_'+product_id).val('');
                           //Activation du select des tables
                           //$('#table_list').show();
                       }    
                   });
                    $('#exampleModalLong').modal('hide'); 
                   //$('#exampleModalLong').modal('dispose'); 
               }
               else
               {
                 alert("Please entrer la quantité111");
                 $('#i_'+product_id).val('');
               }
         });

       
      
    });
   
  
});
