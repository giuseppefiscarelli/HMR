<?php

session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/finanziamenti.php';

$updateUrl = 'finanziamentiUpdate.php';
$deleteUrl = 'controller/updateFinanziamenti.php';
$pageUrl = 'finanziamentoPage.php';

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
    
  //  if(!checkAuthPage($authPage,$authThisPage)){
        
  //  require_once 'view/403.php' ;
        
     
    //}else{
    $id = getParam('id',0);
   // var_dump($id);
    if($id){


        $fin = getFinanziamento($id);
       // var_dump($fin);
        $cli = getClientecf($fin['id_cliente']);
        $all = getAllegati($fin['id_cliente']);
        $allcli = getAllegaticli($fin['id_cliente']);
        //var_dump ($allcli);
        $tabfin = getFintab($fin['id_finanziaria']);
        

       
        //$cli = getClientecf($contr['id_cliente']);
        //$acc = getAccessori($id);
        //$idVei = getParam('id_veicolo');
        //$all =getAllegati($id); 
        //$permuta = getPermuta($id);
      }
    
   // var_dump($testride);
	require_once 'view/finanziamento_page.php' ;
	   
	//}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  
    $(document).ready(function(){
            Array.from(document.getElementsByClassName("importi")).forEach(
                function(element, index, array) {
                importo=array[index].innerHTML;
                euro = parseFloat(importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                array[index].innerHTML= euro;
                }
            );
        
    });
    $("#tipo_alle").on('change select',function(event) {
      $("#f_alle,#des_alle,#t_alle").show();

      tipo = $(this).val();
      if ((tipo !== "CI")&&(tipo !== "CF")&&(tipo !== "DR")){
        $("#i_alle,#d_alle").show();
      }else{
        $("#i_alle,#d_alle").hide();
        $("#imp_alle").val("0.00");
        $('#data_alle').val("");

      }
      /*
      if(tipo !== ""){
        $('#add_alle').prop('disabled', false);
      }
      */
      if(tipo == "") {
        $('#add_alle').prop('disabled', true);
        $("#i_alle,#d_alle,#f_alle,#des_alle,#t_alle").hide();
      }
    });     
    $('#file_alle').change(
        function(){
            if ($(this).val()) {
              $('#add_alle').prop('disabled', false);
              $("#add_alle").removeAttr("title");
            } 
    });
    $('#add_alle').click(function() {
      id_pratica=$('#id_pratica').val();
      id_cliente=$('#id_cliente').val();
      tipo=$("#tipo_alle").val();
      tipof = $('#tipo_file').val();
      descrizione = $('#descrizione_alle').val();
      importo = $('#imp_alle').val();
      scadenza = $('#data_alle').val();
      fd = new FormData();
      file= $('#file_alle').val();
      ext = file.split(".");
      ext = ext[ext.length-1].toLowerCase();   
      files = $('#file_alle')[0].files[0];
      filename = id_pratica+"_"+tipo+"_"+tipof;
      fd.append('file',files); 
      fd.append('id',filename); 
      fd.append('tipo',tipo);
      fd.append('id_cliente',id_cliente+"_"+tipo);

      $.ajax({
                    url: "controller/updateFinanziamenti.php?action=addAllegato",
                    type: 'post',
                    dataType: 'json',
                    data: {
                    id_cliente:id_cliente, id_pratica:id_pratica, tipo:tipo, descrizione:descrizione, importo:importo, scadenza:scadenza,tipof:tipof,ext:ext
                    },
                        success: function(json) {
                          $.each(json, function(k,v) {
                            $("#message2").show();
                            $('#tex_msg2').html(v.message);
                            $('#message2').fadeOut(4000);
                            $("#allemodal").modal('hide');
                            markup = '<tr class="'+(v.id)+'"><td>'+(v.data)+'<br>'+v.user+'</td><td>'+v.tipod+'</td><td>'+v.descrizione+'</td><td><button type="button" class="btn btn-success m-1"onclick="window.open(\''+v.percorso+v.nome+'\');" title="Visualizza Allegato"> <i class="fa fa-file"></i> </button> <button type="button" onclick="delAll('+v.id+','+v.nome_file+')" class="btn btn-danger m-1" title="Elimina Allegato"> <i class="fa fa-trash-o"></i> </button></td></tr>';
                            $("#alle_table tbody").append(markup);
                            if ((v.tipo !== "CI")&&(v.tipo !== "CF")&&(v.tipo !== "DR")){
                              importo = (parseFloat(v.importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'}));
                              markup2 = '<tr class="'+(v.id)+'"><td>'+v.tipod+'</td><td>'+v.descrizione+'</td><td>'+(v.scadenza)+'<br><b class="importi">'+(importo)+'</b></td><td  class="stato_'+(v.id)+'"><span class="badge badge-pill badge-warning m-1">Non Incassato</span> <button type="button" onclick="incImporto(\''+v.id+'\',\''+v.tipod+'\');" class="btn btn-success btn-sm m-1"><i aria-hidden="true" class="fa fa-money"> Incassa</i></button></td></tr>';
                              $("#alle_table2 tbody").append(markup2);

                            }
                          });

                        }   
                }); 
               

                $.ajax({
                    url: "controller/updateFinanziamenti.php?action=upload",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                   
                });  
              
    });
    function delAll(id,type,nomefile){


      swal({
                    title: "Vuoi eliminare l'allegato?",
                    text: "Una volta eliminato, non potrai più recuperarlo!",
                    icon: "warning",
                    buttons: "OK",
                   // dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $.ajax({
                        url: "controller/updateFinanziamenti.php?action="+type,
                        type: 'post',
                        dataType: 'json',
                        data: {id:id,nome_file:nomefile},
                            success: function(id) {
                              $("."+id).remove();
                              swal("L'allegato è stato eliminato correttamente!", {
                              icon: "success",
                              });
                            }   
                      });     
                     
                    } else {
                      swal("L'allegato non è stato eliminato!");
                    }
                  });

    };
</script>


    </body>
</html>    