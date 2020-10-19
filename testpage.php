<?php
session_start();
require_once '../functions.php';
require_once dirname(__FILE__).'/vendor/autoload.php';
if(!isUserLoggedin()){

  header('Location:../login.php');
  exit;
}
//require_once 'model/contratto.php';
//$updateUrl = 'contrattoUpdate.php';
$deleteUrl = 'controller/updateTestpage.php';
//$pageShowUrl = 'contrattoPage.php';

require_once 'headerInclude.php';
?>
<link href="plugins/select2/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css">
<style>
      .map {
        height: 600px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    <?php
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
   
		       // require_once 'controller/displayContratto.php';
	
	?>
     <form id="personal-info" action="controller/updateTestpage.php" method="post">
               
                <input type="hidden" name="action" value ="test">
                    <div class="form-group">
                      <label>Multiple select boxes</label>
                      <select name="test[]"class="form-control multiple-select select2-hidden-accessible" multiple="" data-select2-id="sel_4" tabindex="-1" aria-hidden="true">
                          <option value="a" data-select2-id="sel_9">India</option>
                          <option value="b"  data-select2-id="sel_10">England</option>
                          <option value="c"  data-select2-id="sel_11">America</option>
                          <option value="d"  data-select2-id="sel_12">China</option>
                          <option value="e"  data-select2-id="sel_13">Australiya</option>
                          <option value="f"  data-select2-id="sel_14">Newzeland</option>
                          <option value="g"  data-select2-id="sel_15">Dubai</option>
                          <option value="h"  data-select2-id="sel_16">United Kingdom</option>
                      </select>
                        
                    </div>

                    <p>Click the button to get your coordinates.</p>

                        <button type="button" onclick="getLocation()">Try It</button>
                        <input type="hidden" name="coordinate1" id="coordinate1"value ="">
                        <input type="hidden" name="coordinate2"id="coordinate2" value ="">
                        <p name="coordinate" id="demo"></p>
                    <button type="submit" class="btn btn-secondary px-5"><i class="icon-lock"></i> Register</button>
    </form>

    <div class="row">
        <div class="col-lg-12">
          
          <div class="card">
             <div class="card-header text-uppercase">Map With Marker</div>
              <div class="card-body">
              <div id="map" class="map" tabindex="0">
              
              </div>
              </div>
          </div>
          
        </div>
      </div><!--End Row-->
<?php
    require_once 'view/footer.php';

?>
<script src="plugins/select2/js/select2.min.js"></script>
<script src="plugins/jquery-multi-select/jquery.multi-select.js"></script>
<script type="text/javascript">
const setec = new ol.Feature({
  //geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
  //geometry: new ol.geom.MultiPoint([[12.667445, 419424.82],[12.657789, 41.941525]]),
  geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
  name: '22',
});

setec.setStyle(
  new ol.style.Style({
    image: new ol.style.Icon({
      anchor: [80,80],
          anchorXUnits: 'pixels',
          anchorYUnits: 'pixels',
      crossOrigin: 'anonymous',
      src: 'images/logo_setec_250.png',
      scale: 0.6,
    }),
  })
);
setec.on("click", () => {
      alert()
    })

const iconFeature = new ol.Feature({
  geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
  //geometry: new ol.geom.MultiPoint([[12.667445, 419424.82],[12.657789, 41.941525]]),
  //geometry: new ol.geom.MultiPoint([[12.667445, 41.942482],[12.657789, 41.941525]]).transform('EPSG:4326','EPSG:3857'),
  name: 'Setec',
});
iconFeature.setStyle(
  new ol.style.Style({
    image: new ol.style.Icon({
      anchor: [0.4, 20],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
      crossOrigin: 'anonymous',
      src: 'images/marker/10_free.png',
      scale: 4,
    }),
  })
);
const testicon = new ol.Feature({
  //geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
  //geometry: new ol.geom.MultiPoint([[12.667445, 419424.82],[12.657789, 41.941525]]),
  geometry: new ol.geom.Point(ol.proj.fromLonLat([12.658565, 41.941623])),
  name: '22',
});

testicon.setStyle(
  new ol.style.Style({
    image: new ol.style.Icon({
      anchor: [0.4, 20],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
      crossOrigin: 'anonymous',
      src: 'images/marker/10_alert.png',
      scale: 4,
    }),
  })
);



const map = new ol.Map({
  target: 'map',
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
    }),
    new ol.layer.Vector({
      source: new ol.source.Vector({
        features: [setec,iconFeature, testicon ]
      })

    })
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([12.657789, 41.941525]),
    zoom: 15
  })
});

      
    </script>
<script>
        $(document).ready(function() {
           

      
            $('.multiple-select').select2();
            navigator.geolocation.getCurrentPosition(showPosition);

          });

    </script>
    <script>
        
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  $('#coordinate1').val(position.coords.latitude);
  $('#coordinate2').val(position.coords.longitude);
  

}
</script>
</body>
</html>  