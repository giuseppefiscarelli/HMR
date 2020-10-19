<?php
session_start();
require_once 'functions.php';

require_once dirname(__FILE__).'/vendor/autoload.php';
if(!isUserLoggedin()){

  header('Location:../login.php');
  exit;
}


require_once 'headerInclude.php';
?>
<style>
.card .table td, .card .table th {
    padding-right: 5px;
    padding-left: 5px;
}
.fc-event-container {
	cursor: pointer;
	
}
</style>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    <?php
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
    //var_dump($_SERVER);
	  //if(!isUserSuadmin()){
     // if(!checkAuthPage($authPage,$authThisPage)){
       // require_once 'view/403.php' ;
     //   }
     // }
    //  else{
		        require_once 'controller/displayHome.php';
	   // }
	?>
  <!--
<button class="btn btn-primary" onclick="prtPdf(2)">Stampa Modulo Privacy</button>
<script type="text/javascript">
function prtPdf($id) {
	var url = 'report/privacy/privacy2.php?id='+$id;
	window.open(url,"Stampa");
}
</script>
-->


<?php
    require_once 'view/footer.php';
    if(!isMobile()){
      require_once 'view/wacomlogo.php';
      //require_once 'view/wacomsign.php';
    }
?>
<script type="text/javascript">
 var canvas;
 var signaturePad;
 var canvas2;
 var signaturePad2;
$(document).ready(function(){
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
          //$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        //$('#calendar').fullCalendar('unselect');
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
     
      
      events: [ <?php
                  if($testevent){

                    foreach($testevent as $event){
                      $clievent = getClientecf($event['id_cliente']);
                      $colore = getMotoCol($event['id_veicolo']);
                      $moto = getMotoinfo($event['id_veicolo']);
                      //var_dump($colore['colore_tr']);
                      if($clievent){?>
                                  {
                                      title:"<?= $event['id_veicolo']." ".$moto['marca']." ".$moto['modello']?> <?=$clievent['cognome']." ".$clievent['nome']?> ",
                                      start:'<?=$event['data_pren']?>',
                                      color: '<?=$colore['colore_tr']?>',
                                      alert :"Prenotazione: <?=date("d/m/Y H:i", strtotime($event['data_pren']))?>" + '\n' + 
                                            "Cliente: <?=$clievent['id'].' '.$clievent['cognome'].' '.$clievent['nome']?> "+ '\n' + 
                                            'Contatti: <?=$clievent['mail1'].' '.$clievent['mobile1']?> '+ '\n' + 

                                            'Veicolo: <?= $event['id_veicolo'].' '.$moto['marca'].' '.$moto['modello']?> ',
                          
                                      id:  '<?= $event['id']?>'    
                                            
                                      
                                      
                                    

                                  },
                  <?  }else{?>
                                  {
                                      title:'<?= $event['id_veicolo']?> Prenotazione Online ',
                                      start :'<?=$event['data_pren']?>',
                                      color: '<?=$colore['colore_tr']?>',
                                      alert :"Prenotazione: <?=date("d/m/Y H:i", strtotime($event['data_pren']))?>" + '\n' + 
                                            "Cliente: Prenotazione Online / Telefonica - Cliente non Registrato  "+ '\n' + 
                                            'Contatti: <?=$event['note_pren']?$event['note_pren']:'Dati non comunicati'?> '+ '\n' + 

                                            'Veicolo: <?= $event['id_veicolo'].' '.$moto['marca'].' '.$moto['modello']?> ',
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
	function conferma(){
      //$id = $('#id').val();
			var jsignCode = signaturePad.toDataURL();
 		
 			$("#signCode").val(jsignCode); 
      //var url = 'report/testride/cons.php?id='+$id;
	    //window.open(url,"Stampa");
      $id = $('#id').val();
      setTimeout(function(){ var url = 'report/testride/ricons.php?id='+$id;
	                        window.open(url,"Stampa"); }, 3000);
	  
  };
  function confCons(){
      //$id = $('#id').val();
			  var jsignCode = signaturePad.toDataURL();
 		
 			  $("#signCode").val(jsignCode); 
      //var url = 'report/testride/cons.php?id='+$id;
	    //window.open(url,"Stampa");
     // $id = $('#id').val();
     // setTimeout(function(){ var url = 'report/testride/cons.php?id='+$id;
	    //                    window.open(url,"Stampa"); }, 3000);
        };
   function getModal(id,km){
     kms = km.toString();
      $('#km_cons').val(km);
      $('#id_tr').val(id);

   }
   function prtPdf() {
    $id = $('#id').val();
	  var url = 'report/testride/cons.php?id='+$id;
	  window.open(url,"Stampa");
    location.reload();
  }
  function prtPdf2() {
    $id = $('#id').val();
	  var url = 'report/testride/ricons.php?id='+$id;
	  window.open(url,"Stampa");
    location.reload();
  }
  function prtPdf3() {
    $id = $('#id').val();
	  var url = 'report/testride/full.php?id='+$id;
	  window.open(url,"Stampa");
    location.reload();
  }
  function btnPdf1() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_cons.pdf';
	  window.open(url,"Stampa");
  }
  function btnPdf2() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_ricons.pdf';
	  window.open(url,"Stampa");
  }
  function btnPdf3() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_full.pdf';
	  window.open(url,"Stampa");
  }
	
				 
			  
	</script>
  

</body>
</html>  