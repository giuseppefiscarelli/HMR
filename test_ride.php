
<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$deleteUrl = 'controller/updateTestride.php';
$pageShowUrl = 'test_ridePage.php';
require_once 'headerInclude.php';
?>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

  
	   
      

    <?php
    
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	  if(!checkAuthPage($authPage,$authThisPage)){
		
		require_once 'view/403.php' ;
		
	  }else{	  
	  
		require_once 'controller/displayTestride.php' ;
	   
	  }	

	?>


    
      
    
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  function prtPdf() {
   
    $from = $('#from1').val();
    $to = $('#to1').val();
    $type = 'P';
	  var url = 'report/testride/reportlist.php?from='+$from+'&to='+$to+'&type='+$type;
	  window.open(url,"Stampa");
    
   };
   function prtPdf2() {
    
   $from = $('#from2').val();
   $to = $('#to2').val();
   $type = 'E';
   var url = 'report/testride/reportlist.php?from='+$from+'&to='+$to+'&type='+$type;
   window.open(url,"Stampa");
   
  };
  function prtPdf3() {
    
    $from = $('#from2').val();
    $to = $('#to2').val();
    
    $search2 =$('#search2').val();
    $search3 =$('#search3').val();
    $search4 =$('#search4').val();
    $search5 =$('#search5').val();
    $search6 =$('#search6').val();

    $type = 'A';
    var url = 'report/testride/reportlist.php?type=&search2='+$search2+'&search3='+$search3+'&search4='+$search4+'&search5='+$search5+'&search6='+$search6;
    window.open(url,"Stampa");
    
   };
</script>


    </body>
</html>    