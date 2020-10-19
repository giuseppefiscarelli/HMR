
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
$pageShowUrl = 'contrattoPage.php';

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
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.nav-tabs-danger .nav-link.active, .nav-tabs-danger .nav-item.show>.nav-link {
   
    background-color: white;
   
}
.nav-tabs .nav-link {

	background-color: #e9ecef;
}
.tab-content>.tab-pane {
  max-width:100%;
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
    
    $id = getParam('id',0);
    if($id){


      $contr = getContratto($id);
     
      $cli = getClientecf($contr['id_cliente']);
      $acc = getAccessori($id);
      $idVei = getParam('id_veicolo');
      $all =getAllegati($id); 
      $permuta = getPermuta($id);
      $fin = getFinanziamento($id);
      //  var_dump($fin);
    }
 
    require_once 'view/contratto_page.php';

    ?>
         
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
        //require_once 'view/wacomlogo.php';
        require_once 'view/wacomsign.php';
      }
?>
<style>


</style>

<!-- Apex Chart JS -->
<script src="plugins/apexcharts/apexcharts.js"></script>
<script>
function prtPdf(id) {
   
	  var url = 'report/contratto/contratto.php?id='+id;
	  window.open(url,"Stampa");
   //setTimeout(function(){ location.reload(); }, 2000);
   };
    function delAll(id){
      swal({
                    title: "Vuoi eliminare l'allegato?",
                    text: "Una volta eliminato, non potrai più recuperarlo!",
                    icon: "warning",
                    buttons: "true",
                   // dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $.ajax({
                        url: "controller/updateContratto.php?action=delAllegato",
                        type: 'post',
                        dataType: 'json',
                        data: {id:id},
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

    }
    function incImporto(id,type){
             swal({
                    title: "Vuoi Incassare l'importo?",
                    text: type,
                    icon: "warning",
                    buttons: true,
                   // dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $.ajax({
                        url: "controller/updateContratto.php?action=incImporto",
                        type: 'post',
                        dataType: 'json',
                        data: {id:id},
                            success: function(json) {
                                $.each(json, function(k,v) {
                                    //  $("."+id).remove();
                                    if (v.result > 0){
                                      importo = (parseFloat(v.importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'}));
                                      markup = '<tr><td>'+(v.data)+'<br>'+v.user+'</td><td>'+v.tipod+'</td><td>'+v.descrizione+'</td><td style="text-align: right;">'+v.tipo+'</td><td style="text-align: right;"><b>'+importo+'</b></td><td> <span class="badge badge-pill badge-success m-1">Incassato</span></td></tr>';
                                      $("#cron_table tbody").append(markup);
                                      stato_id = ".stato_"+id;
                                      $(stato_id).empty();
                                      $(stato_id).append('<span class="badge badge-pill badge-success m-1">Incassato</span>');



                                      swal("L'importo è stato incassato correttamente!", {
                                      icon: "success",
                                      });
                                    }else {
                                      swal("L'importo non è stato incassato!",{
                                        icon: "warning",
                                      });
                                    }
                                });
                            }   
                      });     
                     
                    } else {
                      swal("L'importo non è stato incassato!",{
                        icon: "warning",
                      });
                    }
                  });

    }
  $(document).ready( function() {
    $("b.importi").each(function() { 
      $(this).html(parseFloat($(this).text()).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'}));
     })
  })
  $(function() {
  
    $('#addAll').click(function(){
     $('#tipo_alle,#file_alle,#imp_alle,#data_alle,#descrizione_alle,#tipo_file').val("");
     $("#i_alle,#d_alle,#f_alle,#t_alle,#des_alle").hide();
     $('#add_alle').prop('disabled', true);
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
      if(tipo == "BS") {
        $('#imp_alle').val(<?=$contr['imp_residuo']?>);
        $('#imp_alle').prop('max',<?=$contr['imp_residuo']?>);
      }
      if(tipo == "BC") {
        $('#imp_alle').val(<?=$contr['imp_caparra']?>);
        $('#imp_alle').prop('max',<?=$contr['imp_caparra']?>);
      }
    });

    $('#file_alle').change(
        function(){
            if ($(this).val()) {
              $('#add_alle').prop('disabled', false);
              $("#add_alle").removeAttr("title");
            } 
        }
        );



    $('#add_alle').click(function() {
      id_contratto=$('#id_contratto').val();
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
      filename = id_contratto+"_"+tipo+"_"+tipof;
      fd.append('file',files); 
      fd.append('id',filename); 

      $.ajax({
                    url: "controller/updateContratto.php?action=addAllegato",
                    type: 'post',
                    dataType: 'json',
                    data: {
                    id_cliente:id_cliente, id_contratto:id_contratto, tipo:tipo, descrizione:descrizione, importo:importo, scadenza:scadenza,tipof:tipof,ext:ext
                    },
                        success: function(json) {
                          $.each(json, function(k,v) {
                            $("#message2").show();
                            $('#tex_msg2').html(v.message);
                            $('#message2').fadeOut(4000);
                            $("#allemodal").modal('hide');
                            markup = '<tr class="'+(v.id)+'"><td>'+(v.data)+'<br>'+v.user+'</td><td>'+v.tipod+'</td><td>'+v.descrizione+'</td><td><button type="button" class="btn btn-success m-1"onclick="window.open(\''+v.percorso+v.nome+'\');" title="Visualizza Allegato"> <i class="fa fa-file"></i> </button> <button type="button" onclick="delAll('+v.id+')" class="btn btn-danger m-1" title="Elimina Allegato"> <i class="fa fa-trash-o"></i> </button></td></tr>';
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
                    url: "controller/updateContratto.php?action=upload",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                   
                });  
              
    });
    



    "use strict";

    // chart 9 

    var options = {
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -225,
                    endAngle: 135,
					hollow: {
                      margin: 0,
                      size: '70%',
                      background: 'transparent',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.24
                      }
                    },
                    track: {
                      background: 'rgba(255, 255, 255, 0.12)',
                      strokeWidth: '0%',
                      margin: 0, // margin is in pixels
                      dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#000',
                            offsetY: -10
                        },
                        value: {
                            offsetY: 0,
                            fontSize: '22px',
                            color: '#000',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    },
                    track: {
                      background: '#fff',
                      strokeWidth: '0%',
                      margin: 0, // margin is in pixels
                      dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                },
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4
            },
            fill: {
              type: 'gradient',
              gradient: {
              shade: 'dark',
              type: 'horizontal',
              shadeIntensity: 0.5,
              gradientToColors: ['#0575e6'],
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 1,
              stops: [0, 100]
            }
         }, colors: ["#00f260"],
            series: [90],
            labels: ['Stato Completamento'],
            
    }

       var chart = new ApexCharts(
            document.querySelector("#chart9"),
            options
        );
      chart.render();	
  });	
</script>
</body>
</html>    
