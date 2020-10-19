<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/veicoli_usati.php';
//$updateUrl = 'menuUpdate.php';
//$deleteUrl = 'controller/updateMenu.php';

require_once 'headerInclude.php';
?>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

    <?php
    //var_dump($_SESSION['userData']['username']);
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	  if(!checkAuthPage($authPage,$authThisPage)){
		
		require_once 'view/403.php' ;
		
	  }else{	  
	  
		require_once 'controller/displayVeicoli_usati.php' ;
	   
	  }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">

 function ab_teride(a,id){
     username="<?=$_SESSION['userData']['username']?>";
    
    
    if (a.checked) {
    //   if(a = checked){
        check = "S";
        
    //blah blah
}else{
   check = "N";
}

            $.ajax({
		      url:'script/ab_testride.php',
		      type:"POST",
		      data: {ab_testride:check,id:id,username:username},
              dataType: 'json',
              success:function(results){
            
          }  
		    });


 };
</script>

 <!--Switchery Js-->
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
      <script>
      $(function() {

        window.prettyPrint && prettyPrint();

        $('#colorselector_1').colorselector();
        

      });
    </script>
    </body>
</html>    