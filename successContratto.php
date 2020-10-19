
<?php
session_start();
require_once 'functions.php';


if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/contratto.php';
$updateUrl = 'contrattoUpdate.php';
$updateCliUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateContatto.php';

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
    width: 700px;
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
      unset($_SESSION['message']);
    }
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
    
    $id = getParam('id',0);
    if($id){
      $contr = getContratto($id);
      $cli = getClientecf($contr['id_cliente']);
      $acc = getAccessori($id);
      $idVei = getParam('id_veicolo');
      $all =getAllegati($id); 
      $permuta = getPermuta($id);

    }
    
    //require_once 'view/successContratto.php';

    ?>
    <?php
    require_once 'view/footer.php';
    if(!isMobile()){
        require_once 'view/wacomlogo.php';
        //require_once 'view/wacomsign.php';
      }

      if(!empty($_SESSION['success'])){?>
<!--
        <script type="text/javascript">
            window.onload = function () { 
                swal({
                        title: "REDIRECT to?",
                        text: "<button type=\"button\" class=\"btn btn-success m-1\">SUCCESS</button>",
                        icon: "success",
                        buttons: false,
                       
                       
                        // dangerMode: true,
                    });
            }
        </script>
-->
    <?php
    }
    unset($_SESSION['success']);
?>

<script type="text/javascript">
            window.onload = function () { 
                el = document.createElement('div');
                id = <?=$id?>;
                cli = <?=$cli['id']?>;
                
                opt1 ="<button type=\"button\"  onclick=\"prtPdf("+id+")\" class=\"btn btn-primary m-1\"><i aria-hidden=\"true\" class=\"fa fa-2x fa-print\"> Stampa Contratto</i></button>";
                opt2 ="<br><button type=\"button\" class=\"btn btn-warning m-1\"><i aria-hidden=\"true\" class=\"fa fa-2x fa-envelope\"> Invia Contratto via Mail</i></button>";
                opt3 ="<br><button type=\"button\" onclick=\"window.location.href='contrattoPage.php?id="+id+"'\" class=\"btn btn-success m-1\"><i aria-hidden=\"true\" class=\"fa fa-2x fa-handshake-o\"> Vai alla Gestione del Contratto</i></button>";
                opt4 ="<br><button type=\"button\"  onclick=\"window.location.href='contratti.php'\" class=\"btn btn-success m-1\"><i class=\"fa fa-2x fa-list\"> Vai alla Gestione dei Contratti</i></button>";
                opt4 ="<br><button type=\"button\"  onclick=\"window.location.href='anagr_cliPage.php?id="+cli+"'\" class=\"btn btn-info m-1\"><i class=\"fa fa-2x fa-user\"> Vai alla Scheda Cliente</i></button>";
                opt5 ="<br><button type=\"button\" onclick=\"window.location.href='indexhmr.php'\" class=\"btn btn-danger m-1\"><i aria-hidden=\"true\" class=\"fa fa-2x fa-home\"> Vai alla Home Page</i></button>";
                el.innerHTML = opt1+opt2+opt3+opt4+opt5;
                swal({
                        title: "Inserimento Effettuato!",
                        text:"Come vuoi Procedere?",
                        content:el,
                        icon: "success",
                        buttons: false,
                        closeOnClickOutside: false,
                        // dangerMode: true,
                    });
            }

    function prtPdf(id) {
    
    var url = 'report/contratto/contratto.php?id='+id;
    window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=1000,height=980");
    //setTimeout(function(){ location.reload(); }, 2000);
    };            
</script>
