
<?php
session_start();
require_once 'functions.php';
/*
if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}*/
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$updateCliUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateTestride.php';

require_once 'view/top.php';




$id = getParam('id',0);
if($id){
  $tr = getTest($id);
  $idCli = $tr['id_cliente'];
  $cliente = getClientecf($idCli);
  $idVei = $tr['id_veicolo'];
  $veicolo = getMotoinfo($idVei);

}
?>
<div id="wrapper">
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
 
  <div class="content-wrapper">
    <div class="container-fluid">
   <style>

  .wizard > .content
{
    background: white;
    display: block;
    margin: 0.5em;
    min-height: 585px;
    overflow: auto;
    position: relative;
    width: auto;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
.footer{
left:0px;
}
.content-wrapper{
    margin-left:0px;
    padding-top:10px;
}
   </style>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">
              Valutazione Prova su Strada <br>
              TestRide # <?=$tr['id']?> <br>
              Veicolo Testato <b><?=$veicolo['marca']?> <?=$veicolo['modello']?></b>
            </div>
            <div class="card-body">
            <form id="basic-form" action="controller/updateTestride.php" method="post">
                
                  <div>
                      
                      <input type="hidden" name="action" value="questcli">
                      <input type="hidden" name="signCode" id="signCode" value="">
                      <input type="hidden" name="id_cliente" value="<?=$tr['id_cliente']?>">
                      <input type="hidden" name="id_testride" value="<?=$tr['id']?>">
                      <h3>Questionario 1/3</h3>
                      <section>
                        <div class="row">
                          <div class="col-lg-5 col-12">

                            <div> <!-- #1-->
                              <div class="form-group">
                                <label> 1. Modello Attualmente Posseduto</label>
                              </div>
                              <div class="form-group row">
                              
                                      <label for="quest1a" class="col-sm-4 col-form-label">Marca</label>
                                          <div class="col-sm-8">
                                              <select class="form-control" name="quest1a"id="quest1a">
                          
                      
                                              
                                                  <option>Seleziona Marca</option>                                                
                                                  <option value="Aprilia">Aprilia</option>
                                                  <option value="AJP">AJP</option>
                                                  <option value="Benelli">Benelli</option>
                                                  <option value="Betamotor">Betamotor</option>
                                                  <option value="Bimota">Bimota</option>
                                                  <option value="Brixton Motorcycles">Brixton Motorcycles</option>
                                                  <option value="Bmw">Bmw</option>
                                                  <option value="Borile">Borile</option>
                                                  <option value="Brammo">Brammo</option>
                                                  <option value="Cr&S">Cr&amp;S</option>
                                                  <option value="Castiello Moto">Castiello Moto</option>
                                                  <option value="Daelim">Daelim</option>
                                                  <option value="Derbi">Derbi</option>
                                                  <option value="Ducati">Ducati</option>
                                                  <option value="Energica">Energica</option>
                                                  <option value="Fantic Motor">Fantic Motor</option>
                                                  <option value="Gas Gas">Gas Gas</option>
                                                  <option value="Gilera">Gilera</option>
                                                  <option value="Hanway">Hanway</option>
                                                  <option value="Harley Davidson">Harley Davidson</option>
                                                  <option value="Honda">Honda</option>
                                                  <option value="Husqvarna">Husqvarna</option>
                                                  <option value="Hyosung">Hyosung</option>
                                                  <option value="Horex">Horex</option>                                                
                                                  <option value="Indian">Indian</option>
                                                  <option value="Italian Volt">Italian Volt</option>
                                                  <option value="Kawasaki">Kawasaki</option>
                                                  <option value="KSR">KSR</option>
                                                  <option value="KTM">KTM</option>
                                                  <option value="Leonart">Leonart</option>
                                                  <option value="Moto Guzzi">Moto Guzzi</option>
                                                  <option value="Moto Morini">Moto Morini</option>
                                                  <option value="MV Agusta">MV Agusta</option>
                                                  <option value="Mash">Mash</option>
                                                  <option value="Norton">Norton</option>
                                                  <option value="Montesa">Montesa</option>
                                                  <option value="Ohvale">Ohvale</option>
                                                  <option value="Over">Over</option>
                                                  <option value="Paton">Paton</option>
                                                  <option value="FB Modial">FB Modial</option>
                                                  <option value="Rieju">Rieju</option>
                                                  <option value="Royal Enfield">Royal Enfield</option>
                                                  <option value="Scorpa">Scorpa</option>
                                                  <option value="Senke">Senke</option>
                                                  <option value="Sherco">Sherco</option>
                                                  <option value="Suzuki">Suzuki</option>
                                                  <option value="Triumph">Triumph</option>
                                                  <option value="Swm">Swm</option>
                                                  <option value="TM Moto">TM Moto</option>
                                                  <option value="Ural">Ural</option>                            
                                                  <option value="The Black Duglas Motorcycles Co.">The Black Duglas Motorcycles Co.</option>                                               
                                                  <option value="Yamaha">Yamaha</option>                                               
                                                  <option value="Valenti Racing">Valenti Racing</option>
                                                  <option value="Torrot">Torrot</option>
                                                  <option value="TRS Motorcycles">TRS Motorcycles</option>
                                                  <option value="Victory">Victory</option>
                                                  <option value="Vertigo">Vertigo</option>
                                                  <option value="Vervemoto">Vervemoto</option>
                                                  <option value="Vyrus">Vyrus</option>
                                              
                                                  <option value="Zero">Zero</option>
                                                  <option value="Zontes">Zontes</option>
                                                  <option value="Zaeta">Zaeta</option>
                                              </select>
                                          </div>
                                      
                              </div>
                              <div class="form-group row">
                                  <label for="quest1b" class="col-sm-4 col-form-label">Modello</label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" name="quest1b"id="quest1b">
                                      </div>
                              </div>
                            </div>

                            <div> <!-- #2-->
                              <div class="form-group">
                                <label> 2. Se attualmente non possiede alcun modello, potebbe indicarci quali sono stati i modelli da Lei posseduti in passato?</label>
                              </div>
                              <div class="form-group row">
                                  <label for="quest2a" class="col-sm-4 col-form-label">Marca (opzione 1)</label>
                                          <div class="col-sm-8">
                                              <select class="form-control" name="quest2a"id="quest2a">
                          
                      
                                              
                                                  <option>Seleziona Marca</option>                                                
                                                  <option value="Aprilia">Aprilia</option>
                                                  <option value="AJP">AJP</option>
                                                  <option value="Benelli">Benelli</option>
                                                  <option value="Betamotor">Betamotor</option>
                                                  <option value="Bimota">Bimota</option>
                                                  <option value="Brixton Motorcycles">Brixton Motorcycles</option>
                                                  <option value="Bmw">Bmw</option>
                                                  <option value="Borile">Borile</option>
                                                  <option value="Brammo">Brammo</option>
                                                  <option value="Cr&S">Cr&amp;S</option>
                                                  <option value="Castiello Moto">Castiello Moto</option>
                                                  <option value="Daelim">Daelim</option>
                                                  <option value="Derbi">Derbi</option>
                                                  <option value="Ducati">Ducati</option>
                                                  <option value="Energica">Energica</option>
                                                  <option value="Fantic Motor">Fantic Motor</option>
                                                  <option value="Gas Gas">Gas Gas</option>
                                                  <option value="Gilera">Gilera</option>
                                                  <option value="Hanway">Hanway</option>
                                                  <option value="Harley Davidson">Harley Davidson</option>
                                                  <option value="Honda">Honda</option>
                                                  <option value="Husqvarna">Husqvarna</option>
                                                  <option value="Hyosung">Hyosung</option>
                                                  <option value="Horex">Horex</option>                                                
                                                  <option value="Indian">Indian</option>
                                                  <option value="Italian Volt">Italian Volt</option>
                                                  <option value="Kawasaki">Kawasaki</option>
                                                  <option value="KSR">KSR</option>
                                                  <option value="KTM">KTM</option>
                                                  <option value="Leonart">Leonart</option>
                                                  <option value="Moto Guzzi">Moto Guzzi</option>
                                                  <option value="Moto Morini">Moto Morini</option>
                                                  <option value="MV Agusta">MV Agusta</option>
                                                  <option value="Mash">Mash</option>
                                                  <option value="Norton">Norton</option>
                                                  <option value="Montesa">Montesa</option>
                                                  <option value="Ohvale">Ohvale</option>
                                                  <option value="Over">Over</option>
                                                  <option value="Paton">Paton</option>
                                                  <option value="FB Modial">FB Modial</option>
                                                  <option value="Rieju">Rieju</option>
                                                  <option value="Royal Enfield">Royal Enfield</option>
                                                  <option value="Scorpa">Scorpa</option>
                                                  <option value="Senke">Senke</option>
                                                  <option value="Sherco">Sherco</option>
                                                  <option value="Suzuki">Suzuki</option>
                                                  <option value="Triumph">Triumph</option>
                                                  <option value="Swm">Swm</option>
                                                  <option value="TM Moto">TM Moto</option>
                                                  <option value="Ural">Ural</option>                            
                                                  <option value="The Black Duglas Motorcycles Co.">The Black Duglas Motorcycles Co.</option>                                               
                                                  <option value="Yamaha">Yamaha</option>                                               
                                                  <option value="Valenti Racing">Valenti Racing</option>
                                                  <option value="Torrot">Torrot</option>
                                                  <option value="TRS Motorcycles">TRS Motorcycles</option>
                                                  <option value="Victory">Victory</option>
                                                  <option value="Vertigo">Vertigo</option>
                                                  <option value="Vervemoto">Vervemoto</option>
                                                  <option value="Vyrus">Vyrus</option>
                                              
                                                  <option value="Zero">Zero</option>
                                                  <option value="Zontes">Zontes</option>
                                                  <option value="Zaeta">Zaeta</option>
                                              </select>
                                          </div>
                                      
                              </div>
                              <div class="form-group row">
                                  <label for="ques2b" class="col-sm-4 col-form-label">Modello (opzione 1)</label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" name="quest2b"id="ques2b">
                                      </div>
                              </div>
                              <div class="form-group row">
                                  <label for="quest2c" class="col-sm-4 col-form-label">Marca (opzione 2)</label>
                                          <div class="col-sm-8">
                                              <select class="form-control" name="quest2c"id="quest2c">
                          
                      
                                              
                                                  <option>Seleziona Marca</option>                                                
                                                  <option value="Aprilia">Aprilia</option>
                                                  <option value="AJP">AJP</option>
                                                  <option value="Benelli">Benelli</option>
                                                  <option value="Betamotor">Betamotor</option>
                                                  <option value="Bimota">Bimota</option>
                                                  <option value="Brixton Motorcycles">Brixton Motorcycles</option>
                                                  <option value="Bmw">Bmw</option>
                                                  <option value="Borile">Borile</option>
                                                  <option value="Brammo">Brammo</option>
                                                  <option value="Cr&S">Cr&amp;S</option>
                                                  <option value="Castiello Moto">Castiello Moto</option>
                                                  <option value="Daelim">Daelim</option>
                                                  <option value="Derbi">Derbi</option>
                                                  <option value="Ducati">Ducati</option>
                                                  <option value="Energica">Energica</option>
                                                  <option value="Fantic Motor">Fantic Motor</option>
                                                  <option value="Gas Gas">Gas Gas</option>
                                                  <option value="Gilera">Gilera</option>
                                                  <option value="Hanway">Hanway</option>
                                                  <option value="Harley Davidson">Harley Davidson</option>
                                                  <option value="Honda">Honda</option>
                                                  <option value="Husqvarna">Husqvarna</option>
                                                  <option value="Hyosung">Hyosung</option>
                                                  <option value="Horex">Horex</option>                                                
                                                  <option value="Indian">Indian</option>
                                                  <option value="Italian Volt">Italian Volt</option>
                                                  <option value="Kawasaki">Kawasaki</option>
                                                  <option value="KSR">KSR</option>
                                                  <option value="KTM">KTM</option>
                                                  <option value="Leonart">Leonart</option>
                                                  <option value="Moto Guzzi">Moto Guzzi</option>
                                                  <option value="Moto Morini">Moto Morini</option>
                                                  <option value="MV Agusta">MV Agusta</option>
                                                  <option value="Mash">Mash</option>
                                                  <option value="Norton">Norton</option>
                                                  <option value="Montesa">Montesa</option>
                                                  <option value="Ohvale">Ohvale</option>
                                                  <option value="Over">Over</option>
                                                  <option value="Paton">Paton</option>
                                                  <option value="FB Modial">FB Modial</option>
                                                  <option value="Rieju">Rieju</option>
                                                  <option value="Royal Enfield">Royal Enfield</option>
                                                  <option value="Scorpa">Scorpa</option>
                                                  <option value="Senke">Senke</option>
                                                  <option value="Sherco">Sherco</option>
                                                  <option value="Suzuki">Suzuki</option>
                                                  <option value="Triumph">Triumph</option>
                                                  <option value="Swm">Swm</option>
                                                  <option value="TM Moto">TM Moto</option>
                                                  <option value="Ural">Ural</option>                            
                                                  <option value="The Black Duglas Motorcycles Co.">The Black Duglas Motorcycles Co.</option>                                               
                                                  <option value="Yamaha">Yamaha</option>                                               
                                                  <option value="Valenti Racing">Valenti Racing</option>
                                                  <option value="Torrot">Torrot</option>
                                                  <option value="TRS Motorcycles">TRS Motorcycles</option>
                                                  <option value="Victory">Victory</option>
                                                  <option value="Vertigo">Vertigo</option>
                                                  <option value="Vervemoto">Vervemoto</option>
                                                  <option value="Vyrus">Vyrus</option>
                                              
                                                  <option value="Zero">Zero</option>
                                                  <option value="Zontes">Zontes</option>
                                                  <option value="Zaeta">Zaeta</option>
                                              </select>
                                          </div>
                                      
                              </div>
                              <div class="form-group row">
                                  <label for="quest2d" class="col-sm-4 col-form-label">Modello (opzione 2)</label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" name="quest2d"id="quest2d">
                                      </div>
                              </div>
                            </div>  
                          
                          </div>

                          <div class="col-lg-2 col-12">

                          </div>

                          <div class="col-lg-5 col-12">
                            <div><!-- #3-->
                              <div class="form-group">
                                <label> 3. Qual è la sua marca preferita di moto?</label>
                              </div>

                              <div class="form-group row">
                                                                        
                                    <label for="quest3a" class="col-sm-3 col-form-label">Marca</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="quest3a"id="quest3a">
                        
                    
                                            
                                                <option>Seleziona Marca</option>                                                
                                                <option value="Aprilia">Aprilia</option>
                                                <option value="AJP">AJP</option>
                                                <option value="Benelli">Benelli</option>
                                                <option value="Betamotor">Betamotor</option>
                                                <option value="Bimota">Bimota</option>
                                                <option value="Brixton Motorcycles">Brixton Motorcycles</option>
                                                <option value="Bmw">Bmw</option>
                                                <option value="Borile">Borile</option>
                                                <option value="Brammo">Brammo</option>
                                                <option value="Cr&S">Cr&amp;S</option>
                                                <option value="Castiello Moto">Castiello Moto</option>
                                                <option value="Daelim">Daelim</option>
                                                <option value="Derbi">Derbi</option>
                                                <option value="Ducati">Ducati</option>
                                                <option value="Energica">Energica</option>
                                                <option value="Fantic Motor">Fantic Motor</option>
                                                <option value="Gas Gas">Gas Gas</option>
                                                <option value="Gilera">Gilera</option>
                                                <option value="Hanway">Hanway</option>
                                                <option value="Harley Davidson">Harley Davidson</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Husqvarna">Husqvarna</option>
                                                <option value="Hyosung">Hyosung</option>
                                                <option value="Horex">Horex</option>                                                
                                                <option value="Indian">Indian</option>
                                                <option value="Italian Volt">Italian Volt</option>
                                                <option value="Kawasaki">Kawasaki</option>
                                                <option value="KSR">KSR</option>
                                                <option value="KTM">KTM</option>
                                                <option value="Leonart">Leonart</option>
                                                <option value="Moto Guzzi">Moto Guzzi</option>
                                                <option value="Moto Morini">Moto Morini</option>
                                                <option value="MV Agusta">MV Agusta</option>
                                                <option value="Mash">Mash</option>
                                                <option value="Norton">Norton</option>
                                                <option value="Montesa">Montesa</option>
                                                <option value="Ohvale">Ohvale</option>
                                                <option value="Over">Over</option>
                                                <option value="Paton">Paton</option>
                                                <option value="FB Modial">FB Modial</option>
                                                <option value="Rieju">Rieju</option>
                                                <option value="Royal Enfield">Royal Enfield</option>
                                                <option value="Scorpa">Scorpa</option>
                                                <option value="Senke">Senke</option>
                                                <option value="Sherco">Sherco</option>
                                                <option value="Suzuki">Suzuki</option>
                                                <option value="Triumph">Triumph</option>
                                                <option value="Swm">Swm</option>
                                                <option value="TM Moto">TM Moto</option>
                                                <option value="Ural">Ural</option>                            
                                                <option value="The Black Duglas Motorcycles Co.">The Black Duglas Motorcycles Co.</option>                                               
                                                <option value="Yamaha">Yamaha</option>                                               
                                                <option value="Valenti Racing">Valenti Racing</option>
                                                <option value="Torrot">Torrot</option>
                                                <option value="TRS Motorcycles">TRS Motorcycles</option>
                                                <option value="Victory">Victory</option>
                                                <option value="Vertigo">Vertigo</option>
                                                <option value="Vervemoto">Vervemoto</option>
                                                <option value="Vyrus">Vyrus</option>
                                            
                                                <option value="Zero">Zero</option>
                                                <option value="Zontes">Zontes</option>
                                                <option value="Zaeta">Zaeta</option>
                                            </select>
                                        </div>
                                    
                              </div>
                            </div>

                            <div><!-- #4-->
                              <div class="form-group">
                                <label> 4. Qual è la sua marca preferita di scooter?</label>
                              </div>

                              <div class="form-group row">
                                                                        
                                    <label for="quest4a" class="col-sm-3 col-form-label">Marca</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="quest4a"id="quest4a">
                        
                    
                                            
                                                <option>Seleziona Marca</option>                                                
                                                <option value="Aprilia">Aprilia</option>
                                                <option value="AJP">AJP</option>
                                                <option value="Benelli">Benelli</option>
                                                <option value="Betamotor">Betamotor</option>
                                                <option value="Bimota">Bimota</option>
                                                <option value="Brixton Motorcycles">Brixton Motorcycles</option>
                                                <option value="Bmw">Bmw</option>
                                                <option value="Borile">Borile</option>
                                                <option value="Brammo">Brammo</option>
                                                <option value="Cr&S">Cr&amp;S</option>
                                                <option value="Castiello Moto">Castiello Moto</option>
                                                <option value="Daelim">Daelim</option>
                                                <option value="Derbi">Derbi</option>
                                                <option value="Ducati">Ducati</option>
                                                <option value="Energica">Energica</option>
                                                <option value="Fantic Motor">Fantic Motor</option>
                                                <option value="Gas Gas">Gas Gas</option>
                                                <option value="Gilera">Gilera</option>
                                                <option value="Hanway">Hanway</option>
                                                <option value="Harley Davidson">Harley Davidson</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Husqvarna">Husqvarna</option>
                                                <option value="Hyosung">Hyosung</option>
                                                <option value="Horex">Horex</option>                                                
                                                <option value="Indian">Indian</option>
                                                <option value="Italian Volt">Italian Volt</option>
                                                <option value="Kawasaki">Kawasaki</option>
                                                <option value="KSR">KSR</option>
                                                <option value="KTM">KTM</option>
                                                <option value="Leonart">Leonart</option>
                                                <option value="Moto Guzzi">Moto Guzzi</option>
                                                <option value="Moto Morini">Moto Morini</option>
                                                <option value="MV Agusta">MV Agusta</option>
                                                <option value="Mash">Mash</option>
                                                <option value="Norton">Norton</option>
                                                <option value="Montesa">Montesa</option>
                                                <option value="Ohvale">Ohvale</option>
                                                <option value="Over">Over</option>
                                                <option value="Paton">Paton</option>
                                                <option value="FB Modial">FB Modial</option>
                                                <option value="Rieju">Rieju</option>
                                                <option value="Royal Enfield">Royal Enfield</option>
                                                <option value="Scorpa">Scorpa</option>
                                                <option value="Senke">Senke</option>
                                                <option value="Sherco">Sherco</option>
                                                <option value="Suzuki">Suzuki</option>
                                                <option value="Triumph">Triumph</option>
                                                <option value="Swm">Swm</option>
                                                <option value="TM Moto">TM Moto</option>
                                                <option value="Ural">Ural</option>                            
                                                <option value="The Black Duglas Motorcycles Co.">The Black Duglas Motorcycles Co.</option>                                               
                                                <option value="Yamaha">Yamaha</option>                                               
                                                <option value="Valenti Racing">Valenti Racing</option>
                                                <option value="Torrot">Torrot</option>
                                                <option value="TRS Motorcycles">TRS Motorcycles</option>
                                                <option value="Victory">Victory</option>
                                                <option value="Vertigo">Vertigo</option>
                                                <option value="Vervemoto">Vervemoto</option>
                                                <option value="Vyrus">Vyrus</option>
                                            
                                                <option value="Zero">Zero</option>
                                                <option value="Zontes">Zontes</option>
                                                <option value="Zaeta">Zaeta</option>
                                            </select>
                                        </div>
                                    
                              </div>


                              <div class="form-group row">
                                <label for="quest4b" class="col-sm-3 col-form-label">Perché?</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="quest4b"id="quest4b">
                                    </div>
                              </div>
                            </div>

                          </div>
                        

                          
                        </div>
                      </section>
                      <h3>Questionario 2/3</h3>
                      <section>
                          <div class="row">

                            <div class="col-lg-5 col-12">
                              <div><!--#5-->
                                <div class="form-group">
                                  <label> 5. Può dirci perché è interessato alla prova di guida?</label>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest5" type="radio" id="quest5ca" value="A"checked="">
                                    <label for="quest5ca">Interesse all'acquisto</label>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest5" type="radio" id="quest5cb" value="B">
                                    <label for="quest5cb">Curiosità</label>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest5" type="radio" id="quest5cc" value="C" >
                                    <label for="quest5cc" >Comparazione con altro modello (specificare quale):</label>
                                    <input id="quest5c" name="quest5c"class="form-control"/>
                                </div>
                                <div class="icheck-material-success" tyle="padding-top:13px;padding-bottom:13px;">
                                    <input name="quest5" type="radio" id="quest5cd" value="D"  >
                                    <label for="quest5cd" >Altro (specificare):</label>
                                    <input id="quest5d" name="quest5d"class="form-control"/>
                                </div>   
                              </div> 

                             
                            </div>

                            <div class="col-lg-2 col-12">
                          
                            </div>

                            <div class="col-lg-5 col-12">
                              <div><!--#6-->
                                <div class="form-group">
                                  <label> 6. Come è venuto a conoscenza della possibilià di provare questo modello?</label>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest6" type="radio" value="A" id="quest6ca" checked="">
                                    <label for="quest6ca">Amici</label>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest6" type="radio" value="B"id="quest6cb" >
                                    <label for="quest6cb">Quotidiani (specificare):</label>
                                    <input id="quest6b" name="quest6b" class="form-control"/>

                                </div>
                            
                                <div class="icheck-material-success">
                                    <input name="quest6" type="radio" value="C"id="quest6cc"  >
                                    <label for="quest6cc" class="disabled">Siti Internet (specificare):</label>
                                    <input id="quest6c" name="quest6c" class="form-control"/>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest6" type="radio"  value="D"id="quest6cd"  >
                                    <label for="quest6cd" class="disabled">Riviste di settore (specificare):</label>
                                    <input id="quest6d" name="quest6d" class="form-control"/>
                                </div>
                                <div class="icheck-material-success">
                                    <input name="quest6" type="radio" value="E" id="quest6ce"  >
                                    <label for="quest6ce" class="disabled">Altro (specificare):</label>
                                    <input id="quest6e" id="quest6e" class="form-control"/>
                                </div>    
                              </div>
                            </div>

                          </div>
                      </section>
                      <h3>Questionario 3/3</h3>
                      <section>
                        <div class="row">

                          <div class="col-lg-5 col-12">

                                <div><!-- #7-->
                                  <div class="form-group">
                                    <label> 7. Qual è il suo giudizio complessivo sul modello?</label>
                                  </div> 
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest7" name="quest7">                                         
                                  </div>  
                                  
                                </div> 

                                <div><!--#8-->
                                  <div class="form-group">
                                    <label> 8. Cosa le è piaciuto di più?</label>
                                  </div>
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest8" name="quest8">                                         
                                  </div> 
                                </div> 

                                <div><!--#9-->
                                  <div class="form-group">
                                    <label> 9. Cosa le è piaciuto di meno?</label>
                                  </div>
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest9" name="quest9">                                         
                                  </div> 
                                </div>

                                <div><!-- #10-->
                                  <div class="form-group">
                                    <label> 10. che cosa avrebbe desiderato ci fosse?</label>
                                  </div>
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest10" name="quest10">                                         
                                  </div>  
                                  
                                </div>
                          </div>  

                          <div class="col-lg-2">
                          </div>   

                          <div class="col-lg-5 col-12">
                                <div><!-- #11-->
                                  <div class="form-group">
                                    <label> 11. Pensa di acquistare questo modello?</label>
                                    <div class="icheck-material-success">
                                          <input name="quest11" type="radio" id="quest11ca" value="Si" checked="">
                                          <label for="quest11ca">Si</label>
                                      </div>
                                      <div class="icheck-material-success">
                                          <input name="quest11" type="radio" id="quest11cb" value="No">
                                          <label for="quest11cb">No</label>
                                      </div>   
                                  </div>
                                </div>

                                <div><!-- #11a-->
                                  <div class="form-group">
                                    <label> 11a. Se "Si", può dirci orientativamente quando?</label>
                                    <div class="icheck-material-success">
                                          <input name="quest11aa" type="radio" id="quest11aca" value="A">
                                          <label for="quest11aca">Entro 3 mesi</label>
                                      </div>
                                      <div class="icheck-material-success">
                                          <input name="quest11aa" type="radio" id="quest11acb" value="B">
                                          <label for="quest11acb">Tra 3 e 6 mesi</label>
                                      </div> 
                                      <div class="icheck-material-success">
                                          <input name="quest11aa" type="radio" id="quest11acc" value="C">
                                          <label for="quest11acc">Oltre 6 mesi</label>
                                      </div>   
                                  </div>
                                </div>

                                <div><!-- #11b-->
                                  <div class="form-group">
                                    <label> 11b. Se "No", può dirci il motivo?</label>
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest11bb" name="quest11bb">                                         
                                  </div>  
                                  </div>
                                </div>

                                <div><!-- #12-->
                                  <div class="form-group">
                                    <label> 12. Altre osservazioni</label>
                                  <div class="form-group">  
                                    <input type="text" class="form-control" id="quest12" name="quest12">                                         
                                  </div>  
                                  </div>
                                </div>


                          </div>

                        </div>
                      </section>
                      <h3>Privacy</h3>
                      <section>
                        <div class="row">
                          <div class="col-lg-6 col-12">
                          
                            <!-- Large Size Modal -->
                            <a href="#privacymodal" data-toggle="modal" data-target="#privacymodal" >INFORMATIVA PER IL TRATTAMENTO DI DATI PERSONALI AI SENSI DELL'ART. 13 E 14 DEL REGOLAMENTO EUROPEO N. 679/2016 E NORMATIVA VIGENTE</a>   <br>
                        
                            Il/La Sottoscritto/a <STRONG> &nbsp;<?=$cliente['nome'].' '.$cliente['cognome']?></strong> &nbsp;dichiara di avere letto l'informativa qui riportata.<br>
                            <strong>Con riferimento all'attivita' di marketing (punto 2 lettera b), si prega di voler compilare correttamente i campi della Scheda di
                            seguito riportata relativa al "consenso", con la che lo stesso potra' in ogni caso ed in qualsiasi momento essere modificato e/o revocato nelle modalita' di seguito previste.</strong>
                         
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-lg-6 col-12">
                            <div class="card-header">Desidero ricevere informazioni/newletters/aggiornamenti su prodotti ed iniziative di Marketing diretto ed indiretto correlate, da parte di:</div>
                              <div class="card-body"> 
                              <div class="icheck-material-success">

                                      <input name="priv1" type="checkbox" id="priv1ca"  value="A" >
                                      <label for="priv1ca">HONDA ITALIA</label>
                                  </div>
                                  <div class="icheck-material-success">

                                      <input name="priv1" type="checkbox" id="priv1cb" value="B">
                                      <label for="priv1cb">Concessionari Autorizzati <br>(indicati negli elenchi accessibili dal sito www.honda.it)</label>
                                  </div> 
                                 
                              </div>

                            <div class="card-header">Desidero ricevere le suddette informazioni sui seguenti prodotti:</div>
                              <div class="card-body"> 
                                  <div class="icheck-material-success">
                                      <input name="priv2" type="checkbox" id="priv2ca" value="A">
                                      <label for="priv2ca">Tutti</label>
                                  </div>
                                  <div class="icheck-material-success">
                                      <input name="priv2" type="checkbox" id="priv2cb"value="B" >
                                      <label for="priv2cb">Auto</label>
                                  </div> 
                                  <div class="icheck-material-success">
                                      <input name="priv2" type="checkbox" id="priv2cc" value="C">
                                      <label for="priv2cc">Moto</label>
                                      
                                  </div>
                                  <div class="icheck-material-success">
                                      <input name="priv2" type="checkbox" id="priv2cd" value="D">
                                      <label for="priv2cd">Prodotti Green e Marine</label>
                                  </div>
                              </div>  

                            

                          </div> 
                          <div class="col-lg-6 col-12">
                            <div class="card-header">Desidero ricevere le informazioni attraverso i seguenti canali:</div>
                              <div class="card-body"> 
                              <div class="icheck-material-success">
                                      <input name="priv3" type="checkbox" value="A" id="priv3ca" name="priv3">
                                      <label for="priv3ca">Tutti</label>
                                  </div>
                                  <div class="icheck-material-success">
                                      <input name="priv3" type="checkbox" value="B" id="priv3cb" name="priv3" >
                                      <label for="priv3cb">e-mail</label>
                                  </div> 
                                  <div class="icheck-material-success">
                                      <input name="priv3" type="checkbox" value="C" id="priv3cc" name="priv3" >
                                      <label for="priv3cc">Posta</label>
                                      
                                  </div>
                                  <div class="icheck-material-success">
                                      <input name="priv3" type="checkbox" value="D" id="priv3cd" name="priv3" >
                                      <label for="priv3cd">Telefono</label>
                                  </div>
                                  <div class="icheck-material-success">
                                      <input name="priv3" type="checkbox" value="E" id="priv3ce" name="priv3" >
                                      <label for="priv3ce">SMS</label>
                                  </div>
                              </div> 
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                              Si fa presente che qualora intendesse revocare e/o modificare il consenso al trattamento dei dati per le finalita' indicate oppure non ricevere piu' informazioni su prodotti, inviare indirizzo di posta elettronica Privacy.Italia@honda.it oppure contattare direttamente il call-center Honda la n. 800.889977
                                                  <div class="form-group row"  style="height: 300px;padding:40px;">
                                                
                                                    
                                                  </div> 
                            </div>      
                          </div>
                        </div>  
                      </section>
                     
                  </div>
                  
                  </form> 
            </div>
          </div>
        </div>
      </div><!-- End Row-->
                                <div class="modal fade" id="privacymodal" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title"><strong>INFORMATIVA PER IL TRATTAMENTO DI DATI PERSONALI AI SENSI DELL'ART. 13 E 14 DEL REGOLAMENTO EUROPEO N. 679/2016 E NORMATIVA VIGENTE</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <table style="color:black;">
                                          <tbody>
                                            
                                            <tr>
                                            <td style="text-align:justify;">
                                            TITOLARE DEL TRATTAMENTO<br>
                                            Honda Motor Europe LTD Italia - "HONDA ITALIA" - Sede Secondaria della Honda Motor Europe LTD, con sede in Roma, via della Cecchignola, 13.</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            FINALITA' DEL TRATTAMENTO<br>
                                            a) Gestione di eventi dimostrativi organizzati dal Titolare sui prodotti specifici ivi compresa la possibilit&agrave; di prova/test del prodotto.<br>
                                            b) Gestione del rapporto con l'interessato (Cliente e/o potenziale Cliente) in riferimento all'acquisto di prodotti Honda e relative operazioni di trattamento connesse (con garanzia, etc)<br>
                                            c) Attivit&agrave; di marketing diretto ed indiretto, attraverso inoltro all'interessato di comunicazioni promozionali tramite diverse modalit&agrave; di comunicazione di seguito indicate.<br>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            TEMPI DI CONSERVAZIONE DEI DATI<br>
                                            dati saranno conservati per il tempo necessario all'esecuzione/gestione del rapporto con il Cliente, ivi comprese esigenze di esecuzione della garanzia e/o eventuali campagne del prodotto, secondo quanto previsto dalle disposizioni vigenti, nonche', limitatamente alle finalit&agrave; di marketing diretto ed indiretto, per un periodo coerente con le finalit&agrave; connesse alla natura stessa del prodotto.</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            NATURA DEL CONFERIMENTO<br>
                                            Il conferimento dei dati è libero, ma il rifiuto di conferire alcuni dati potrebbe non rendere possibile l'espletamento delle prestazioni afferenti il rapporto con il Cliente. Il consenso in ogni caso potra' essere negato senza che cio' comporti alcun onere o danno all'interessato in relazione alla sua posizione nei confronti del Titolare.</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            TIPOLOGIA DI DATI TRATTATI<br>
                                            Dati anagrafici, dati di fatturazione nonche' dati inerenti le scelte commerciali effettuate limitatamente alle finalita' di marketing.</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            MODALITA' DI TRATTAMENTO<br>
                                            Il trattamento dei dati potr¹ essere effettuato sia con mezzi manuali che con mezzi informatici. Sara' inoltre possibile che il trattamento venga effettuato tramite strumenti auto 
                                            specifica modalita' di trattamento, l'interessato potra' richiedere di non essere sottoposto a decisioni che derivino dalla stessa con le medesime indicate per l'esercizio delle gene</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            AMBITO DI DIFFUZIONE DEI DATI<br>
                                            I dati potranno circolare all'interno della societa' Titolare nei limiti di quanto necessario per il perseguimento delle finalita' sopra indicate e comunque nel rispetto delle mis evitare fenomeni di perdita o fuoriuscita del dato.<br>
                                            I dati o alcuni di essi potranno essere comunicati ad altre entita' Honda nonche' all'interno del circuito dei "Concessionari Honda" e dei fornitori di servizi che trattano i dati p saranno diffusi in alcun modo.</td>
                                            </tr>
                                            <tr>
                                            <td style="text-align:justify;">
                                            DIRITTI DELL'INTERESSATO<br>
                                            In qualunque momento l'interessato potra' esercitare i diritti di cui agli articoli 15 e seguenti del Regolamente Europeo n, 678/2016 e precisamente: il diritto di sapere se i prop
                                            trattamento e quindi di conoscerne il contenuto e l'origine, di verificarne l'esattezza o chiederne l'integrazione, la cancellazione, la limitazione, l'aggiornamento, la rettifica
                                            anonima o il blocco, nonche' il diritto di opporsi in ogni caso, per motivi legittimi, al loro trattamento e di proporre reclamo al Garante per la Protezione die dati Personali.<br>
                                            Il consenso prestato al trattamento potra' essere revocato in qualsiasi momento determinando l'interruzione del trattamento.<br>
                                            Tali diritti potranno essere esercitati nei confronti del Titolare come sopra individuato inviando un'e-mail al Responsabile pro-tempore scrivendo all'indirizzo e-mail Privacy.It</td>
                                            </tr>

                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
<!--End Dashboard Content-->

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


    </body>
</html>    
