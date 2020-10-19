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
		        require_once 'controller/displayHome3.php';
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
$(function() {
    "use strict";
	  
	  // chart 1
	 
		  var ctx = document.getElementById('dash2-chart1').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: 'Orders',
						data: [25, 23, 27, 15, 27, 23, 31, 41, 31, 25, 35, 25, 30],
						backgroundColor: 'rgba(0, 0, 0, 0.07)',
						borderColor: "transparent",
						borderWidth: 3
					}, {
						label: 'Payments',
						type: 'line',
						data: [10, 8, 12, 5, 12, 8, 16, 25, 15, 10, 20, 10, 15],
						backgroundColor: "rgba(3, 208, 234, 0.23)",
						borderColor: "#03d0ea",
						pointBackgroundColor:'transparent',
                        pointHoverBackgroundColor:'#03d0ea',
						pointBorderWidth :2,
						pointRadius :3,
						pointHoverRadius :3,
						borderWidth: 3
						
					}]
				},
			options: {
				maintainAspectRatio: false,
				legend: {
				  display: false,
				  labels: {
					fontColor: '#585757',  
					boxWidth:40
				  }
				},
				tooltips: {
				  displayColors:false
				},	
			  scales: {
				  xAxes: [{
					barPercentage: .3,
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(0, 0, 0, 0.05)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(0, 0, 0, 0.05)"
					},
				  }]
				 }

			 }
			}); 
			
			
	
	  });	
				 
			  
	</script>
  

</body>
</html>  