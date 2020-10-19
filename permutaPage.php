
<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/permute.php';
$updateUrl = 'permuteUpdate.php';

$deleteUrl = 'controller/updatePermute.php';

require_once 'headerInclude.php';
?>
<style>

    .swal-title {
        color: #000000;
    }
    .swal-text {
        text-align: center;
        color: rgb(0 0 0);
        font-size: 18px;
        font-weight: 400;
        line-height: 1.6;
    }
    .swal-button--confirm, .swal-button:focus {
        background-color: #04b962;
        box-shadow: none;
    }
    .swal-button--cancel {
        color: #fff;
        background-color: #f43643;
    }

    .swal-modal {
        border-radius: 1.25rem;
        background-color: #b1aeae;
        box-shadow: 0px 0px 12px 1px black inset;
    }
</style>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     

    <?php
    if(!empty($_SESSION['message'])){
      $message = $_SESSION['message'];
      $alertType = $_SESSION['success'] ? 'success':'danger';
      $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
      require 'view/messageDelete.php';
      unset($_SESSION['message'],$_SESSION['success']);
  
    }
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	  //if(!checkAuthPage($authPage,$authThisPage)){
		
	//	require_once 'view/403.php' ;
	
	 // }else{	  
        
        $id = getParam('id',0);
        if($id){
    
    
          $p = getPermuta($id);
         
          $cli = getClientecf($p['id_cliente']);
          //$acc = getAccessori($id);
         // $idVei = getParam('id_veicolo');
         // $all =getAllegati($id); 
         // $permuta = getPermuta($id);
         // $fin = getFinanziamento($id);
          //  var_dump($fin);
        }
     
        require_once 'view/permuta_page.php';       
             
            

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
      //require_once 'view/wacomlogo.php';
      require_once 'view/wacomsign2.php';
    }
?>

<script>
 $('#upValutazione').click(function(){
    $( "#upVal" ).submit(function( event ) {
         console.log( $( this ).serializeArray() );
        event.preventDefault();
    });
    var dati = $("#upVal").serializeArray();
    console.log(dati);
    $.ajax({
        type: "POST",
        url: "controller/updatePermute.php?action=upVal",
        data: dati,
        dataType: "html",
        success: function(msg)
            {
            $("#risultato").html(msg);

            },
            error: function()
            {
            alert("Chiamata fallita, si prega di riprovare...");
            }

    });//ajax

});
$( "input[name^='costo_']" ).on('change', function(event){

                sum = 0;
               
                $("input[name^='costo_']").each(function() {
                   
                    value= $(this).val();
                    value= parseFloat(value);
                    if(!isNaN(value) && value.length != 0) {
                        sum += value;
                    }
                   
                });
                $('#costi_ripristino').val(sum);

});
$( "#stima" ).on('keyup',function(event){

valore = parseFloat($(this).val());
costi = parseFloat($('#costi_rispristino').val());
finale= valore+costi;
console.log(finale);
$('#valore_finale').val(finale.toFixed(2));



});

$(document).ready(function(){
      
    Array.from(document.getElementsByClassName("importi")).forEach(
                function(element, index, array) {
                importo=array[index].innerHTML;
                euro = parseFloat(importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                array[index].innerHTML= euro;
                }
            );
    
   
    });


</script>
    </body>
</html>    
