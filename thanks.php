
<?php
session_start();
require_once 'functions.php';
/*
if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}*/
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$updateCliUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateTestride.php';

require_once 'view/top.php';




$id = getParam('id',0);
if($id){
  $tr = getTest($id);
  $idCli = $tr['id_cliente'];
  $cliente = getClientecf($idCli);
  $idVei = $tr['id_veicolo'];
  $veicolo = getMotoinfo($idVei);

}
?>
<style>
.footer {
  left: 0px;
}
#over img {
  margin-left: auto;
  margin-right: auto;
  display: block;
}
</style>
<div id="wrapper">
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
 
  <div class="content-wrapper" style="margin-left: 0px;">
    <div class="container-fluid">
   
    <div class="row">
        <div id="over" style=" width:100%; height:100%">
            <img  src="images/HONDA.png">
        </div>
    </div>
    <div class="row">
        <h1 style="    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;">Grazie per aver compilato il questionario!</h1>
    <h3 style="    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;">A breve verrai indirizzato alla pagina web di Honda Moto Roma</h3>
    </div>   
                               

<?php
    require_once 'view/footer.php';
?>


    </body>
    <script>
         setTimeout(function(){
            window.location.href = 'http://www.hondapalaceroma.it/';
         }, 5000);
      </script>
</html>    
