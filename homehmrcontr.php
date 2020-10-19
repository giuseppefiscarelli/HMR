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
		        require_once 'controller/displayHome2.php';
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
	 
		  var ctx = document.getElementById('chart1').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
					datasets: [{
						label: 'New Visitor',
						data: [3, 3, 8, 5, 7, 4, 6, 4, 6, 3],
						backgroundColor: '#14abef',
						borderColor: "transparent",
						pointRadius :"0",
						borderWidth: 3
					}, {
						label: 'Old Visitor',
						data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
						backgroundColor: "rgba(20, 171, 239, 0.35)",
						borderColor: "transparent",
						pointRadius :"0",
						borderWidth: 1
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
 // chart 2

 var ctx = document.getElementById("chart2").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Direct", "Affiliate", "E-mail", "Other"],
					datasets: [{
						backgroundColor: [
							"#14abef",
							"#02ba5a",
							"#d13adf",
							"#fba540"
						],
						data: [5856, 2602, 1802, 1105],
						borderWidth: [0, 0, 0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: false,
				    labels: {
					  fontColor: '#ddd',  
					  boxWidth:15
				   }
				}
				,
				tooltips: {
				  displayColors:false
				}
			   }
			});
		
		
	// easy pie chart 
	
	 $('.easy-dash-chart1').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#3b5998',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });	


	 $('.easy-dash-chart2').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#55acee',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });


	 $('.easy-dash-chart3').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#e52d27',
		lineWidth: 10,
		trackColor : 'rgba(0, 0, 0, 0.08)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.w_percent').text(Math.round(percent));
		}
	 });
		




        }); 
				 
			  
	</script>
  

</body>
</html>  