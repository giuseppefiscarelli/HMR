
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
$updatePatente = 'controller/updateAnagr_cli.php';
require_once 'headerInclude.php';
?>

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
        $id = getParam('id',0);
        $action = getParam('action',0);
        $moto = getMoto($action);
        
       
            if($id){
              
                $tr = getTest($id);
                
                $cliente = $tr['id_cliente'];
                //$cli= getClientecf($tr['id_cliente']);
                //var_dump($cli);
                if (!$cliente&&$action!=='update'){
                  $cli =[
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
                    'datanasc' => '',
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
                    'fax' => ''
                  ]; 

                  $tr = [
                    'data_pren' => $_COOKIE['data_pren']." ".$_COOKIE['ora_pren'],
                    'km_cons'=>$_COOKIE['km'],
                    'id_veicolo'=>$_COOKIE['id_veicolo'],
                    'durata_test'=>$_COOKIE['durata_test']
                  ];
                 
                  $patente = [
                    'id' => ''
                  ];
               
      
                }if (!$cliente&&$action==='update'){
                  $cli =[
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
                    'datanasc' => '',
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
                    'fax' => ''
                  ];  
                  $patente = [
                    'id' => '',
                    'data_rilascio' => '',
                    'data_scadenza' => '',
                    'ente_rilascio' => '',
                    'numero_patente' => '',
                    'tipo_patente' => ''
  
                  ];  
                }else{   
                  $cli = getClientecf($cliente);
                 // var_dump($cli['codfiscale']);
                  if($cli){
                  $patente = getPatente($cli['codfiscale'],0);
                  if(!$patente){
                      $patente = [
                        'id' => '',
                        'id_cliente' => '',
                        'data_rilascio' => '',
                        'data_scadenza' => '',
                        'ente_rilascio' => '',
                        'numero_patente' => '',
                        'tipo_patente' => ''
                      ];
                     
                    }
                  }
                }

                unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['id_veicolo'],$_COOKIE['durata_test'],$_COOKIE['ora_pren']);
                $checkveicolo= $tr['id_veicolo']?$tr['id_veicolo']:'';
            }else{
             // var_dump($id);
                $cli =[
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
                    'datanasc' => '',
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
                    'fax' => ''

    
                    
    
                ];
                if(isset($_COOKIE['id_veicolo'])){
                  
                  $tr['data_pren'] =$_COOKIE['data_pren']." ".$_COOKIE['ora_pren'];
                  $tr['km_cons']=$_COOKIE['km'];
                  $tr['id_veicolo']=$_COOKIE['id_veicolo'];
                  $tr['durata_test']=$_COOKIE['durata_test'];
                  $tr['id'] ='';
                 
                  //unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['id_veicolo'],$_COOKIE['durata_test'],$_COOKIE['ora_pren']);
                }else{
                  $tr =[
                    'id' =>'',
                    'id_veicolo' => '',  
                    'km_cons' => 0.0,
                    'durata_test' => 20,
                    'data_pren' => date("Y-m-d H:i"),
                    'ora_pren' => date("H:i"),
                    'priv1' => 0,
                    'priv2' => 0,
                    'priv3' => 0,
                    'quest_tr1' => '' 
                  ];
                } 
                //$tr =[
                //  'id' =>'',
                //  'id_veicolo' => '',  
                //  'km_cons' => 0.0,
                //  'priv1' => 0,
                //  'priv2' => 0,
                //  'priv3' => 0,
                //  'quest_tr1' => ''
                //];
                
                $patente = [
                  'id' => '',
                  'id_cliente' => '',
                  'data_rilascio' => '',
                  'data_scadenza' => '',
                  'ente_rilascio' => '',
                  'numero_patente' => '',
                  'tipo_patente' => ''

                ];
                $cliente = getParam('cliId');
                
                  if ($cliente){
                   
                    $cli = getCliente($cliente);
                    $patente = getPatente($cli['codfiscale']);
                    $tr =[
                      'id' =>'',
                      'id_veicolo' => '',  
                      'km_cons' => 0.0,
                      'durata_test' => 20,
                      'data_pren' => date("Y-m-d H:i"),
                      'ora_pren' => date("H:i"),
                      'priv1' => 0,
                      'priv2' => 0,
                      'priv3' => 0,
                      'quest_tr1' => '' 
                    ];
                    if(!$patente){
                      $patente = [
                        'id' => '',
                        'data_rilascio' => '',
                        'data_scadenza' => '',
                        'ente_rilascio' => '',
                        'numero_patente' => '',
                        'tipo_patente' => ''
                      ];
                    }
                    if(isset($_COOKIE['id_veicolo'])){
                      $tr['data_pren'] =$_COOKIE['data_pren']." ".$_COOKIE['ora_pren'];
                      $tr['km_cons']=$_COOKIE['km'];
                      $tr['id_veicolo']=$_COOKIE['id_veicolo'];
                      $tr['durata_test']=$_COOKIE['durata_test'];
                      //unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['id_veicolo'],$_COOKIE['durata_test'],$_COOKIE['ora_pren']);
                    }else{
                      $tr =[
                        'id' =>'',
                        'id_veicolo' => '',  
                        'km_cons' => 0.0,
                        'durata_test' => 20,
                        'data_pren' => date("Y-m-d H:i"),
                        'ora_pren' => date("H:i") 
                      ];
                    } 
                    //var_dump($cli);
                    //var_dump($patente);


                  }
                  $checkanagrcli = $cli['cognome']&&$cli['nome']&&$cli['codfiscale']&&$cli['datanasc']&&$cli['sesso']&&$cli['nazionalita']&&$cli['luogonasc']&&$cli['provnasc'];
                  $checkpat = $patente['id']&&$patente['id_cliente']&&$patente['data_rilascio']&&$patente['data_scadenza']&&$patente['ente_rilascio']&&$patente['tipo_patente'];
                  $checkrescli = $cli['indirizzores']&&$cli['luogores']&&$cli['provres']&&$cli['capres'];
                  $checkpatdoc =  file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")&&file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patrear.jpg");
                  if(!$tr['id_veicolo']){
                    $checkveicolo= false;
                    //var_dump($checkveicolo);
                  }else{
                    $checkveicolo=$tr['id_veicolo']?$tr['id_veicolo']:$_COOKIE['id_veicolo'];
                  }
                  unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['id_veicolo'],$_COOKIE['durata_test'],$_COOKIE['ora_pren']);

            }
            $stcons = 0;
            $stricons = 0;
            //$consPrivacy =$tr['priv1']&&$tr['priv2']&&$tr['priv3']; 
            $checkanagrcli = $cli['cognome']&&$cli['nome']&&$cli['codfiscale']&&$cli['datanasc']&&$cli['sesso']&&$cli['nazionalita']&&$cli['luogonasc']&&$cli['provnasc'];
            $checkpat = $patente['id']&&$patente['id_cliente']&&$patente['data_rilascio']&&$patente['data_scadenza']&&$patente['ente_rilascio']&&$patente['tipo_patente'];
            $checkrescli = $cli['indirizzores']&&$cli['luogores']&&$cli['provres']&&$cli['capres'];
            $checkpatdoc =  file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")&&file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patrear.jpg");
            unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['id_veicolo'],$_COOKIE['durata_test'],$_COOKIE['ora_pren']);
            $allCliente = $checkanagrcli&&$checkrescli&&$checkpat&&$checkpatdoc;

            //$checkveicolo= false;
            //var_dump($checkpat);                              
             $checksubmit = $checkanagrcli&&$checkpat&&$checkrescli&&$checkpatdoc&&date("Y-m-d") < $patente['data_scadenza'];
             //var_dump($checkveicolo);
            //var_dump($checksubmit);
       
    require_once 'view/formTest_rideUpdate.php';
	   
	 // }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
      //require_once 'view/wacomlogo.php';
      require_once 'view/wacomsign.php';
    }
?>
<!-- Apex Chart JS -->
<script src="plugins/apexcharts/apexcharts.js"></script>

<script>
  $(function () {
    "use strict";
    window.prettyPrint && prettyPrint();
    $('#addbtnformcli').click(function(e){
     
      //e.preventDefault();
      $("#addformcli").validate();
      
      
      $('#addformcli').submit();





      });






  


    $( "#modalcliente" ).on('shown.bs.modal', function (e) {
      $("#addformcli").validate();  
    });
    $('#colorselector_1').colorselector();


		var test = 50;
     
    // chart 9 

    var options = {
            chart: {
              id:'mychart',
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
         },
      colors: ["#00f260"],
      series: [test],
      labels: ['Stato Completamento'],
            
    }

       var chart = new ApexCharts(
            document.querySelector("#chart9"),
            options
        );
        
        chart.render();	


        
    






     });	
     
</script>
<script src="plugins/switchery/js/switchery.min.js"></script>
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

<script type="text/javascript">
  
  $(function () {
     
    $('#newbike').click(function() {
        
        targa = $('#new_targa').val();
        marca = $('#new_marca').val();
        modello = $('#new_modello').val();
        ab_testride = $('#ab_testride').is(":checked")?'on':'';
        colore_tr = $('#colorselector_1 option:selected').val();
        km = $('#new_km').val();

        $.ajax({
            url: "controller/updateVeicoli_usati.php?action=saveVeicoloTr",
        //  url :'controller/updateTestride.php?action=getKm',
            type:"POST",
            data: {targa:targa, marca:marca, modello:modello, ab_testride:ab_testride, colore_tr:colore_tr, km:km},
            dataType: 'json',
            success:function(results){
                $('#largesizemodal').modal('hide');
                $('#id_veicolo').append('<option style="color:black;background-color:'+colore_tr+'" selected>'+targa+' '+marca+' '+modello+'</option>');
                $('#km_cons').val(km);
               // $("#message2").show();
             //   $('#tex_msg2').html('Nuovo Veicolo Inserito!')
              //  $('#message2').fadeOut(4000);
             }
        });  
    });
      $('input[name*="priv"]').change(function() {
        $("#signbtn").prop('disabled');
        var check1 = $('input[name="priv1"]:checked').val();
        var check2 = $('input[name="priv2"]:checked').val();
        var check3 = $('input[name="priv3"]:checked').val();
        var check4 = $('#priv1a').val();
       
        
        if(check1 == 'A'){
          $('#privrow').removeAttr("style");
        }
        

       
        if (check1 =='A' && check2.length > 0  && check3.length > 0 ){
          
          
          $("#signbtn").removeAttr('disabled');
           
           
        }
        if(check1 == 'B'){
          $('#privrow').css({'background-color': 'rgba(255, 0, 0, 0.15)'});
          $("#signbtn").prop('disabled',true);
        }
        
       

      });

      
     
      $('#data_pren,#ora_pren,#id_veicolo,#km_cons,#durata_test').change(function() {
          var m_moto = $('#id_veicolo').val();
          var k_moto = $('#km_cons').val();
          var d_pren = $('#data_pren').val();
          var o_pren = $('#ora_pren').val();
          var d_test = $('#durata_test').val(); 
          $('#calendar').fullCalendar('gotoDate',d_pren);
          $('#calendar').fullCalendar('changeView', 'agendaDay');

             if (k_moto > 0){ 

                      $('#submitbutton').removeAttr('disabled');
                    };

          var date = new Date();
          date.setTime(date.getTime()+(250*1000));
          var expires = "; expires="+date.toGMTString();
          dpren = "data_pren";
          opren = "ora_pren";
          mmoto = "id_veicolo";
          kmoto = "km";
          dtest = "durata_test";
          document.cookie=dpren + "="+d_pren+expires+ ";path=/";
          document.cookie=opren +"="+o_pren+expires+ ";path=/";
          document.cookie=mmoto+"="+m_moto+expires+ ";path=/";
          document.cookie=kmoto+"="+k_moto+expires+ ";path=/";
          document.cookie=dtest+"="+d_test+expires+ ";path=/";
      });
      
      $( "#autocomplete" ).autocomplete({
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
            
            location.href = location.href.split("&",1) + "&cliId=" + ui.item.id;
            var targa = $('#km_cons').val();
             if (targa > 0){ 

                      $('#submitbutton').removeAttr('disabled');
                    };
          return false;
          }

        });
        







      });
      function split(val) {
      return val.split( /,\s*/ );
      };
      function extractLast( term ) {
        return split( term ).pop();
      }; 

      
      
    
</script>

<script type="text/javascript">
$(document).ready(function() {
  <?php if($action=='fastinsert'){?>
  var checkveicolo = $('#targa').val();
  if (checkveicolo.length == 7){
    var pro3 = $('#pro3').val(34);       
    var pro1 = $('#pro1').val();
    var pro4 = (parseInt(pro1)+34);
    $("#att1_4").toggleClass('fa-ban fa-check');
          $("#att1_4").css({'color':'green'});
          $("#att1_4b").hide();
    $('#pro4').val(pro4); 
    document.getElementById("pb_1a").innerHTML = pro4+'%';
            $('#pb_1b').css({'width': pro4+'%' }); 
            $("#submitbutton").attr('disabled','disabled'); 
  };
 
  $('#id_veicolo').on("change",function(event) {
    var pro3 = $('#pro3').val();
    var pro1 = $('#pro1').val();
    var pro2 = $('#pro2').val();
    
       

    var targa = $(this).val();
        $('#targa').val(targa);
        var y = document.getElementById("pb_1a").innerHTML;  
        if (targa.length > 0){
          $("#att1_4").toggleClass('fa-ban fa-check');
          $("#att1_4").css({'color':'green'});
          $("#att1_4b").hide();
          if (pro3 == 0){
            pro3=34;
            var pro4 = (parseInt(pro1)+parseInt(pro2)+parseInt(pro3));
            $('#pro4').val(pro4);
            $('#pro3').val(pro3);
            document.getElementById("pb_1a").innerHTML = pro4+'%';
            $('#pb_1b').css({'width': pro4+'%' }); 
           
          }
        


        }
        var t = $('#targa').val();
        if (t == 0){
          $("#submitbutton").attr('disabled','disabled');
          $("#submitbutton").prop('title', 'Selezionare Veicolo');
          $("#att1_4").toggleClass('fa-check fa-ban');
          $("#att1_4").css({'color':'red'});
          $("#att1_4b").show();
          pro3 = 0;
          var pro4 = (parseInt(pro1)+parseInt(pro2)+parseInt(pro3));
          $('#pro4').val(pro4);
          $('#pro3').val(pro3);
          document.getElementById("pb_1a").innerHTML = pro4+'%';
          $('#pb_1b').css({'width': pro4+'%' }); 

        }
        sub =  $('#pro4').val();
            if (sub == 100){
              $('#submitbutton').removeAttr('disabled');
                $('#submitbutton').removeAttr('title');

            }else{
              $("#submitbutton").attr('disabled','disabled');
              $("#submitbutton").prop('title', 'Selezionare Veicolo');

            }
  });
<?}?>
<?php if($action=='insert'){?>
  var checkveicolo = $('#targa').val();
  if (checkveicolo.length == 7){
    

    $('#submitbutton').removeAttr('disabled');
  };

<?}?>
  $('#id_veicolo').on('change select',function(event) {
        var targa = $(this).val();
        $('#targa').val(targa);
        
        $.ajax({
		      url:'script/testride_km.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:"POST",
		      data: {targa:targa},
          dataType: 'json',
          success:function(results){
            var t = $('#targa').val();
            //for (var motoinfo in results){
              <?php if($action==='insert'){?>

            $('#submitbutton').removeAttr('disabled');
            $('#submitbutton').removeAttr('title');
            <?}
          ?>
              $('#km_cons').val(results['km']).trigger('change');
              
		      	//}     
          }  
		    });
      });
  
    $('#calendar').fullCalendar({
    	monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
    	monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'],
    	dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
    	dayNamesShort: ['Dom','Lun','Mar','Mer','gio','Ven','Sab'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      
      //defaultDate: '2020-03-12',
      
      navLinks: true, // can click day/week names to navigate views
      selectable: false,
      selectHelper: true,
      
      select: function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end,
            alert: alert,
            id :id
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },
      
      businessHours: false,
      businessHours: [{
        // days of week. an array of zero-based day of week integers (0=Sunday)
         
			    dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
          start: '9:00', // a start time (10am in this example)
            end: '13:00' // an end time (6pm in this example)
        },
        {
          // days of week. an array of zero-based day of week integers (0=Sunday)
          
            dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
            start: '14:00', // a start time (10am in this example)
            end: '18:00' // an end time (6pm in this example)
        }
      
      ],
      
      minTime: '08:00:00',
      maxTime: '19:00:00',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        <?php
                  if($testevent){

                    foreach($testevent as $event){
                      $clievent = getClientecf($event['id_cliente']);
                      $motoin = getMotoinfo($event['id_veicolo']);
                      //var_dump($colore['colore_tr']);
                      if($clievent){
                      ?>
                                  {
                                      title:"<?= $event['id_veicolo']?> <?=$motoin['marca']?> <?=$motoin['modello']?>  <?=$clievent['cognome'].' '.$clievent['nome']?> ",
                                      start:'<?=$event['data_pren']?>',
                                      color: '<?=$motoin['colore_tr']?>',
                                      alert :"Prenotazione: <?=date("d/m/Y H:i", strtotime($event['data_pren']))?>" + '\n' + 
                                            "Cliente: <?=$clievent['id'].' '.$clievent['cognome'].' '.$clievent['nome']?> "+ '\n' + 
                                            'Contatti: <?=$clievent['mail1'].' '.$clievent['mobile1']?> '+ '\n' + 

                                            'Veicolo: <?= $event['id_veicolo'].' '.$motoin['marca'].' '.$motoin['modello']?> ',
                          
                                      id:  '<?= $event['id']?>'  
                                      
                                    

                                  }, 
                  <?  }else{?>
                                  {
                                      title:"<?= $event['id_veicolo']?> <?=$motoin['marca']?> <?=$motoin['modello']?> Prenotazione Online ",
                                      start :'<?=$event['data_pren']?>',
                                      color: '<?=$motoin['colore_tr']?>',
                                      alert :"Prenotazione: <?=date("d/m/Y H:i", strtotime($event['data_pren']))?>" + '\n' + 
                                            "Cliente: Prenotazione Online / Telefonica - Cliente non Registrato  "+ '\n' + 
                                            'Contatti: <?=$event['note_pren']?$event['note_pren']:'Dati non comunicati'?> '+ '\n' + 

                                            'Veicolo: <?= $event['id_veicolo'].' '.$motoin['marca'].' '.$motoin['modello']?> ',
                                      id:  '<?= $event['id']?>'    

                                  },


                  <?}
                    }
                  }?>
      ],
      timeFormat: 'H(:mm)', // uppercase H for 24-hour clock
      eventClick: function(info) {
        
        const el = document.createElement('div');
        el.innerHTML = '<a type="button" class="btn btn-success btn-block btn-round m-1" href="test_ridePage.php?id='+info.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione Test</a>'
        swal({
              title:"Info Evento",
              text: info.alert,
              content: el,
              icon:"info"
            });
        
        
        $(".swal-modal").css('background-color', '#88040bd1');//Optional changes the color of the sweetalert 
        
        }
    });
   
  });

  $(function(){
    var cliente = $('#id_cliente').val();
    if (cliente){
      $('#divveicolo').show();
    };
  });
</script>
<script type="text/javascript">
       function checkcli(id){ 
        codfisc = id;
        $("#modbutton").prop('disabled', false); 
        $.ajax({
		      url:'script/checkuser.php',
              type:"POST",
		      data: {id:codfisc},
          dataType: 'json',
          success:function(data){
          
            el = document.createElement('div');
            el.innerHTML = '<a type="button" class="btn btn-success  btn-round " href="test_rideUpdate.php?action=fastinsert&cliId='+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Seleziona</a>'
      
                swal({
                    title:"Cliente Già Presente",
                    text: "Id "+data.id+ '\n' + "Nominativo "+data.cognome+" "+data.nome,
                    content: el,
                    icon:"info"
                    });
                $(".swal-modal").css('background-color', '#88040bd1');//Optional changes the color of the sweetalert 
                $("#modbutton").prop('disabled', true);
            }
              
            
            

          })  
	};
 	$(function(){
            CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
            $("#provres").val("<?=$cli['provres']?$cli['provres']:'RM'?>").change();
            setTimeout(()=>$("#luogores").val("<?=$cli['luogores']?$cli['luogores']:'H501'?>"), 200);
 
            CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
            $("#provnasc").val("<?=$cli['provnasc']?$cli['provnasc']:'RM'?>").change();
            setTimeout(()=>$("#luogonasc").val("<?=$cli['luogonasc']?$cli['luogonasc']:'H501'?>"), 200);
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
                    checkcli(cf.toString());

            });

	});
   
      
   
            
        
</script>

<script type="text/javascript">
    <?php if(isMobile()){?>
  var signaturePad;
	
	var canvas; 
  $(document).ready(function() {
    var wrapper = document.getElementById("signature-pad"),
		clearButton = wrapper.querySelector("[data-action=clear]");
    canvas = wrapper.querySelector("canvas");
    signaturePad = new SignaturePad(canvas);
		clearButton.addEventListener("click", function (event) {
			    signaturePad.clear();
			});
      //signature pad 2:
	//	var wrapperb = document.getElementById("signature-pad2"),
	//	clearButton2 = wrapperb.querySelector("[data-action=clear]");
	//	canvas2 = wrapper2.querySelector("canvas");
	//	signaturePad2 = new SignaturePad(canvas2);
	//	clearButton2.addEventListener("click", function (event) {
	//		    signaturePad2.clear();
		//	});

    });
    <?}?>
    function conferma(){

        var check1 = $('input[name="priv1"]:checked').val();
        var check2 = $('input[name="priv2"]:checked').val();
        var check3 = $('input[name="priv3"]:checked').val();
        var check4 = $('#priv1a').val();
        var pro1 = $('#pro4').val();
        var pro2 = 0;
        
        if (check1 =='A' && check2.length > 0  && check3.length > 0 ){
          
          $("#att1_2").toggleClass('fa-ban fa-check');
          $("#att1_2").css({'color':'green'});
          $("#att1_2b").hide();
         
          //var x = '25%';
          //var y = document.getElementById("pb_1a").innerHTML;
          //var z = parseInt(x)+parseInt(y);
          
          var pro2 = 33;
          
         
          //document.getElementById("pb_1a").innerHTML = z+'%';
          //$('#pb_1b').css({'width': z+'%' });   
           
        }
        var pro4 = (parseInt(pro1)+pro2);
        $('#pro4').val(pro4);
        $('#pro2').val(pro2);
        document.getElementById("pb_1a").innerHTML = pro4+'%';
        $('#pb_1b').css({'width': pro4+'%' });   
       // $("#signbtn").prop('title', 'Compilare Questionario');
        
       var sub =  $('#pro4').val();
            if (sub == 100){
              $('#submitbutton').removeAttr('disabled');
                $('#submitbutton').removeAttr('title');

            }





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
      //$id = $('#id').val();
      //setTimeout(function(){ var url = 'report/testride/ricons.php?id='+$id;
	                       // window.open(url,"Stampa"); }, 3000);
	  
  };
</script>
    </body>
</html>    
