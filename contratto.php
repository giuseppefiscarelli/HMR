<?php
session_start();
require_once '../functions.php';
require_once dirname(__FILE__).'/vendor/autoload.php';
if(!isUserLoggedin()){

  header('Location:../login.php');
  exit;
}
require_once 'model/contratto.php';
$updateUrl = 'contrattoUpdate.php';
$deleteUrl = 'controller/updateContratto.php';
$pageShowUrl = 'contrattoPage.php';

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
		        require_once 'controller/displayContratto.php';
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

?>
<script type="text/javascript">
var form = $("#basic-form");

form.children("div").steps({
  labels: {
        
        
        finish: "Concludi Questionario",
        next: "Avanti",
        previous: "Indietro"
       
    },
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
      $("#basic-form").submit();
    }
});
</script>
<script type="text/javascript">
 var canvas;
 var signaturePad;
 var canvas2;
 var signaturePad2;
$(document).ready(function(){
     

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
	 
			  
	</script>
  

</body>
</html>  