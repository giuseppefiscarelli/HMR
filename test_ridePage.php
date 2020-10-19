
<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$updateCliUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateTestride.php';

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
        $testevent = getEvent();
       // var_dump($testevent);
        $id = getParam('id',0);
      
        
        $action = getParam('action',0);
        //var_dump($action);
            if($id){
                $tr = getTest($id);
                  
                $idCli = getParam('cliId',0)? $cli = getCliente(getParam('cliId',0)):$cli = getClientecf($tr['id_cliente']);
                
                //$cli = getClientecf($idCli);
                
                if ($cli){
                $cfCli = $tr['id_cliente']?$tr['id_cliente']:$cli['codfiscale'];
                $patente = getPatente($cfCli);
                $checkpatdoc =  file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")&&file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patrear.jpg");
                //var_dump($cfCli);
                $checkanagrcli = $cli['cognome']&&$cli['nome']&&$cli['codfiscale']&&$cli['datanasc']&&$cli['sesso']&&$cli['nazionalita']&&$cli['luogonasc']&&$cli['provnasc'];
                $checkrescli = $cli['indirizzores']&&$cli['luogores']&&$cli['provres']&&$cli['capres'];
                
               if ($patente){
                                 $checkpat = $patente['id']&&$patente['id_cliente']&&$patente['data_rilascio']&&$patente['data_scadenza']&&$patente['ente_rilascio']&&$patente['tipo_patente'];

               }else{
                 $checkpat = false;
                $patente = [
                  'id' => '',
                  'data_rilascio' => '',
                  'data_scadenza' => '',
                  'ente_rilascio' => '',
                  'numero_patente' => '',
                  'tipo_patente' => ''
                ];



               }
                 $checkveicolo= $tr['id_veicolo']?$tr['id_veicolo']:'';
                 $allCliente = $checkanagrcli&&$checkrescli&&$checkpat&&$checkpatdoc;
              }else{

              $allCliente =0;
            }
                $idVei = $tr['id_veicolo'];
                $veicolo = getMotoinfo($idVei);
                //var_dump($checkpat);
            }else{
              $allCliente =0;
                $tr =[
                    'id' =>'',
                    'cod_ambiente'=>'',
                    'cod_azienda'=>'',
                    'cod_filiale'=>'',
                    'user_ins' =>'',
                    'data_ins'=>'',
                    'user_mod' =>'',
                    'tipo_anagr'=>'',
                    'ragsociale'=>'',
                    'cognome' =>'',
                    'nome' => '',
                    'luogonasc' => '',
                    'provnasc' => '',
                    'nazionalita' => '',
                    'sesso' => '',
                    'codfiscale' => '',
                    'partitaiva' => '',
                    'indirizzores' => '',
                    'luogores' => '',
                    'provres' => '',
                    'capres' => '',
                    'mail1' => '',
                    'mail2' => '',
                    'tel1' => '',
                    'tel2' => '',
                    'mobile1' => '',
                    'mobile2' => '',
                    'fax' => '',
                    'quest_tr1' => ''
    
                    
    
                ];
    }
    $stcons = 0;
    $stricons = 0;
    $consPrivacy =  $tr['priv1']&&$tr['priv2']&&$tr['priv3']; 
    //$questTr = $tr['quest_tr1']&&$tr['quest_tr2']&&$tr['quest_tr3']&&$tr['quest_tr4']&&$tr['quest_tr5']&&$tr['quest_tr6']&&$tr['quest_tr7'];
    if($tr['data_cons']){
        $stcons = $stcons + 34;
      }

        if($allCliente){
          $stcons =$stcons + 33;  
        }
        if($consPrivacy){
          $stcons =$stcons + 33;  

        }
        //*if($questTr){
          //$stcons =$stcons + 25;  

        //}
     
        if($tr['data_ricons']){
          $stricons = $stricons + 50;
        }    
        $question = getValutazione($tr['id']);
        if( $question){
          $stricons = $stricons + 50;

        }
        
    //var_dump($question);
    if($action==='questionario'){
      require_once 'view/questionario.php';
    }else{
    require_once 'view/testride_Page.php';
  }
	 // }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
      //require_once 'view/wacomlogo.php';
      require_once 'view/wacomsign2.php';
    }
?>

<!-- Apex Chart JS -->
<script src="plugins/apexcharts/apexcharts.js"></script>
  <script>
  $(function() {
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
            series: [<?php
            $a=($stcons/2);
            $b=($stricons/2);
            echo $a +$b;
            ?>],
            labels: ['Stato Completamento'],
            
    }

       var chart = new ApexCharts(
            document.querySelector("#chart9"),
            options
        );
        
        chart.render();	



    






     });	
  </script>

<script type="text/javascript">
	var signaturePad;
	
	var canvas;
	
	$(document).ready(function(){
    $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
    
    $( "#autocomplete" ).autocomplete({
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
            
            location.href = location.href.split("&",1) + "&cliId=" + ui.item.id;
            var targa = $('#km_cons').val();
             if (targa > 0){ 

                      $('#submitbutton').removeAttr('disabled');
                    };
          return false;
          }

    });
    $( "#autocomplete2" ).autocomplete({
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
            
            location.href = location.href.split("&",1) + "&cliId=" + ui.item.id;
            var targa = $('#km_cons').val();
             if (targa > 0){ 

                      $('#submitbutton').removeAttr('disabled');
                    };
          return false;
          }

    });
        
        
		
			
		//signature pad 1:
			var wrapper = document.getElementById("signature-pad"),
			clearButton = wrapper.querySelector("[data-action=clear]");
			canvas = wrapper.querySelector("canvas");
			signaturePad = new SignaturePad(canvas);
			clearButton.addEventListener("click", function (event) {
			    signaturePad.clear();
			});
      //signature pad 2:
			var wrapper2 = document.getElementById("signature-pad2"),
			clearButton2 = wrapper2.querySelector("[data-action=clear]");
			canvas2 = wrapper2.querySelector("canvas");
			signaturePad2 = new SignaturePad(canvas2);
			clearButton2.addEventListener("click", function (event) {
			    signaturePad2.clear();
			});
		
	});
	function conferma()	{
      //$id = $('#id').val();
			<?php if(isMobile()){?>
			var jsignCode = signaturePad.toDataURL();
 		
 			$("#signCode").val(jsignCode); 
      <?}else{?>
        jsignCode =  document.getElementById("signatureImage").src;
        $("#signCode").val(jsignCode); 

      <? } ?>
      //var url = 'report/testride/cons.php?id='+$id;
	    //window.open(url,"Stampa");
      $id = $('#id').val();
      setTimeout(function(){ var url = 'report/testride/ricons.php?id='+$id;
	                        window.open(url,"Stampa"); }, 3000);
	  
   };
   function confCons(){
      //$id = $('#id').val();
			var jsignCode = signaturePad2.toDataURL();
 		
 			$("#signCode2").val(jsignCode); 
      //var url = 'report/testride/cons.php?id='+$id;
	    //window.open(url,"Stampa");
      $id = $('#id').val();
      setTimeout(function(){ var url = 'report/testride/cons.php?id='+$id;
	                        window.open(url,"Stampa"); }, 3000);
   };
   function prtPdf() {
    $id = $('#id').val();
	  var url = 'report/testride/cons.php?id='+$id;
	  window.open(url,"Stampa");
    setTimeout(function(){ location.reload(); }, 2000);
   };
  function prtPdf2() {
    $id = $('#id').val();
	  var url = 'report/testride/ricons.php?id='+$id;
	  window.open(url,"Stampa");
    setTimeout(function(){ location.reload(); }, 2000);
  };
  function prtPdf3() {
    $id = $('#id').val();
	  var url = 'report/testride/full.php?id='+$id;
	  window.open(url,"Stampa");
    setTimeout(function(){ location.reload(); }, 2000);
  };
  function btnPdf1() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_cons.pdf';
	  window.open(url,"Stampa");
  };
  function btnPdf2() {
    $id = $('#id').val(); 
	  var url = 'docs/testride/report/'+$id+'_ricons.pdf';
	  window.open(url,"Stampa");
  };
  function btnPdf3() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_full.pdf';
	  window.open(url,"Stampa");
  };

  function sendeMail(){
    id = <?=$tr['id']?>;
    email = "<?=$cli['mail1']?>";
    $.ajax({
            url: "controller/updateTestride.php?action=sendmail",
            type: 'post',
            dataType: 'json',
            data: {
             id:id,email:email
            },
            //success: function(data) {
            //response(data);
            //},
            success: function (data) {
              swal({
                    title: "Questionario Inviato a",
                    text: email,
                    
                    icon: "success",
                    buttons: "OK",
                   // dangerMode: true,
                  })    
                    
            }
            
          });



  };
  $("button[data-dismiss-modal=modal2]").click(function(){
    $('#imagemodal1').modal('hide');
    $('#modalcliente').show();
    setTimeout(function() {
    
      $('body').addClass('modal-open');
      }, 400);
    });
 </script>
   <script>
                    
                </script>
<script type="text/javascript">
    $(function () {
      $('#TRMOPR').on('change',function(event) {
        var targa = $(this).val();
        $('#targa').val(targa);
        $.ajax({
		      url:'script/testride_km.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:"POST",
		      data: {targa:targa},
          dataType: 'json',
          success:function(results){
            //for (var motoinfo in results){
              
				      $('#km').val(results['km']);
				 
		      	//}     
          }  
		    });
      });
     
      $('#data_pren').change(function() {
          var ts = $(this).val();
          $('#calendar').fullCalendar('gotoDate',ts);
          $('#calendar').fullCalendar('changeView', 'agendaDay');
         

      });

    });  
    
</script>

<script type="text/javascript">
      
 	$(function(){
            CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
            $("#provres").val("<?=$idCli?$cli['provres']:'RM'?>").change();
            setTimeout(()=>$("#luogores").val("<?=$idCli?$cli['luogores']:'H501'?>"), 200);
 
            CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
            $("#provnasc").val("<?=$idCli?$cli['provnasc']:'RM'?>").change();
            setTimeout(()=>$("#luogonasc").val("<?=$idCli?$cli['luogonasc']:'H501'?>"), 200);
            $('#cf').click(function(ev){
                    ev.preventDefault();
                    let cf = new CodiceFiscale({
                        name : $("#nome").val(),
                        surname : $("#cognome").val(),
                        gender : $("#sesso").val(),
                        birthday : $("#datanasc").val(),
                        birthplace : $("#luogonasc").val()
                    });
                    $("#codfiscale").val(cf.toString());

            });

	});
   
        
   
            
        
</script>

    </body>
</html>    
