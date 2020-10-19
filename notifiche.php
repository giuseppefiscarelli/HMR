<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/notifiche.php';
$updateUrl = 'notoficheUpdate.php';
$deleteUrl = 'controller/updateNotifiche.php';

require_once 'headerInclude.php';
?>
<style>
    .list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #e30613;
    border-color: #e30613;
    
}
a:hover {
  color: #e30613;
}
</style>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

    <?php
    
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	//  if(!checkAuthPage($authPage,$authThisPage)){
		
	//	require_once 'view/403.php' ;
		
	  //}else{	  
	  
		require_once 'controller/displayNotifiche.php' ;
	   
	  //}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
        require_once 'view/wacomlogo.php';
        //require_once 'view/wacomsign.php';
      }
?>
<script type="text/javascript">
$("#checkAll").change(function(){
    $('input:checkbox').not(this).prop('checked', this.checked); 
});
$('#btnElimina').on('click', function () {
    
    $(".notifiche input[type='checkbox']:checked").each(function(){
        id = $(this).attr('id'); 
        id= id.slice(3);
        stato = "E";
        $.ajax({
            url: "controller/updateNotifiche.php?action=update",
            type: 'post',
            dataType: 'json',
            data: {id:id,stato:stato},
            success: function() {
                $(".notifiche input[type='checkbox']:checked").closest("tr").remove();
            }   
    });



    })

    
    
    location.reload();

});

function read(){


    $(".notifiche input[type='checkbox']:checked").each(function(){
        id = $(this).attr('id'); 
        id= id.slice(3);
        stato = "L";
        $.ajax({
            url: "controller/updateNotifiche.php?action=update",
            type: 'post',
            dataType: 'json',
            data: {id:id,stato:stato},
            success: function() {
                $(".notifiche input[type='checkbox']:checked").closest("tr").removeAttr("style");
            }   
    });



    })

    location.reload();

}
function unread(){


    $(".notifiche input[type='checkbox']:checked").each(function(){
        id = $(this).attr('id'); 
        id= id.slice(3);
        stato = "N";
        $.ajax({
            url: "controller/updateNotifiche.php?action=update",
            type: 'post',
            dataType: 'json',
            data: {id:id,stato:stato},
            success: function() {
                $(".notifiche input[type='checkbox']:checked").closest("tr").css("font-weight","bold");

            }   
    });



    })

    location.reload();
} 
function openNot(id){



    //id = $(this).attr('id'); 
    //id= id.slice(3);
    stato = "L";
    $.ajax({
        url: "controller/updateNotifiche.php?action=update",
        type: 'post',
        dataType: 'json',
        data: {id:id,stato:stato},
        success: function() {
            tdid= "#ck_"+id;
            $(tdid).closest("tr").removeAttr("style");
        }   
});






}
</script>


    </body>
</html>    