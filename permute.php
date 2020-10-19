<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/permute.php';
$updateUrl = 'permutaUpdate.php';
$deleteUrl = 'controller/updatePermute.php';
$pageShowUrl = 'permutaPage.php';

require_once 'headerInclude.php';
?>
<style>
.ui-front {
    z-index: 9999999 !important;
}
.dropdown-menu {
    z-index: 9999999 !important;
}
.card .table td, .card .table th {
     padding-right:0px; 
     padding-left: 15px; 
}
</style>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

    <?php
    //var_dump($_SESSION['userData']['username']);
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	 // if(!checkAuthPage($authPage,$authThisPage)){
		
	//	require_once 'view/403.php' ;
		
	//  }else{	  
	  
		require_once 'controller/displayPermute.php' ;
	   
	//  }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>


 <!--Switchery Js-->
 <script src="plugins/switchery/js/switchery.min.js"></script>
<script>
        $( "#id_cliente" ).autocomplete({
            minLength: 3,
            source: function( request, response ) {
            
            // Fetch data
            $.ajax({
                url: "script/autoUser.php",
                type: 'post',
                dataType: 'json',
                data: {
                search: request.term
                },
                //success: function(data) {
                //response(data);
                //},
                success: function (data) {
                            if (data) {
                            //var data = [{ label: 'No results found.', val: -1}];
                                    response(data);
                                
                                
                            } else {
                            var d = [{ label: 'No results found.', val: -1}];
                            response(d);
                            }
                        
                }
                
            });
            },
            select: function (event, ui) {
                $('#btnAddCli').html('<i class="fa fa-refresh"></i> modifica dati Cliente').button("refresh");
                $("#id_cliente" ).val(ui.item.codfiscale);
                $('#id_cliente').prop('readonly', true);
                $('#btnModCli').show();
                $('#id_cli').val(ui.item.id);
                $('#cliaction').val("storeClienteFin");
                $("#climodaltitle").html( "Modifica Dati Cliente" );
                $("#btncli").html('<i class="fa fa-refresh"></i> Aggiorna dati Cliente').button("refresh");
                $("#ragsociale").val(ui.item.ragsociale);
                $("#cognome").val(ui.item.cognome);
                $("#nome").val(ui.item.nome);
                CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
                $("#provnasc").val(ui.item.provnasc).change();
                setTimeout(()=>$("#luogonasc").val(ui.item.luogonasc), 200);
                $("#datanasc").val(ui.item.datanasc);
                $("#sesso").val(ui.item.sesso);
                $("#codfiscale").val(ui.item.codfiscale);
                $("#partitaiva").val(ui.item.partitaiva);
                $("#indirizzores").val(ui.item.indirizzores);
                CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
                $("#provres").val(ui.item.provres).change();
                setTimeout(()=>$("#luogores").val(ui.item.luogores), 200);
                $("#capres").val(ui.item.capres);
                $("#mail1").val(ui.item.mail1);
                $("#mail2").val(ui.item.mail2);
                $("#tel1").val(ui.item.tel1);
                $("#tel2").val(ui.item.tel2);
                $("#mobile1").val(ui.item.mobile1);
                $("#mobile2").val(ui.item.mobile2);
                //getcontr(ui.item.codfiscale);    
               
                
            return false;
            }

        });
        function newcli(){
            $('#btnAddCli').html('<i class="fa fa-plus"></i> Nuovo Cliente').button("refresh");
            $("#id_cliente" ).val("");
            $('#id_cliente').prop('readonly', false);
            $('#btnModCli').hide();
            $('#id_cli').val("");
            $('#cliaction').val("saveClienteFin");
            $("#climodaltitle").html( "Inserimento Nuovo Cliente" );
            $("#btncli").html('<i class="fa fa-plus"></i> Inserimento nuovo Cliente').button("refresh");
            document.getElementById("addformcli").reset();


        }
 
</script>
    <script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });
    </script>

    <!--Bootstrap Switch Buttons-->
    <script src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>
      <script>
      $(function() {

        window.prettyPrint && prettyPrint();

        $('#colorselector_1').colorselector();
        

      });
    </script>
    </body>
</html>    