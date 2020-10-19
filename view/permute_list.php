<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>

<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <form id="searchForm" method="get" action="<?=$pageUrl?>">
              <input type="hidden" name="page" id="page" value="<?=$page?>" >
                <h4 class="form-header text-uppercase"  style="font-size: 12px;margin-bottom: 10px;">
                  <i class="fa fa-search"></i>
                   Ricerca
                </h4>
                <div class="form-group row">
                  <label for="search1" class="col-sm-6 col-form-label">TARGA</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Ricerca per Targa ">
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="search2" class="col-sm-6 col-form-label">MODELLO</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search2" name="search2" value="<?=$search2?>" placeholder="Ricerca per Modello">
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="search2" class="col-sm-6 col-form-label">Marca</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search5" name="search5" value="<?=$search5?>" placeholder="Ricerca per Marca">
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="search2" class="col-sm-6 col-form-label">Cliente</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search4" name="search4" value="<?=$search4?>" placeholder="Ricerca per Cliente">
                  </div>
                </div>  


                
                
                <div class="form-group row">
                  <label for="search3" class="col-sm-8 col-form-label">tipo Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search3" 
                  id="search3" 
                  onchange="document.forms.searchForm.submit()">
                        <?php
                         
                        
                        ?>
                        <option value="">Tutti</option>
                        <option  value="N" <?=$search3 =='N'?'selected':''?>>Non Abilitati</option>
                        <option  value="S" <?=$search3 =='S'?'selected':''?>>Abilitati</option>
                        
                        
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="recordsPerPage" class="col-sm-8 col-form-label">Record per Pagina</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="recordsPerPage" 
                  id="recordsPerPage" 
                  onchange="document.forms.searchForm.page.value=1;document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php foreach ($recordsPerPageOptions as $val){ ?>
                        
                        <option value="<?=$val?>" <?=$recordsPerPage ==$val?'selected':''?>><?=$val?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-footer" style="margin-top: 0px;">
                    <button type="button" onclick="location.href='<?=$pageUrl?>'" id="resetBtn" class="btn btn-danger"><i class="fa fa-trash"></i> Reset</button>
                    
                    <button type="submit" onclick="document.forms.searchForm.page.value=1" class="btn btn-success"><i class="fa fa-search"></i> Ricerca</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli in Permuta</h5>
                    <div class="card-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#largesizemodal">Aggiungi Veicolo</button>
                        </div>       
                
                    <small style="float: right;">Totale Modelli <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="tab_vei">
                        <thead>
                           
                            <tr>
                                <th>ID</th>
                                <th>
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=listip&orderDir=<?=$orderDir?>&page=1">Tipologia<br>Veicolo</a></th>
                                
                                <th class="<?=$orderBy === 'lisdve'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdve&orderDir=<?=$orderDir?>&page=1">Marca</a></th>
                                <th>
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=liskw&orderDir=<?=$orderDir?>&page=1">Modello</a></th>
                                <th>
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdat&orderDir=<?=$orderDir?>&page=1">Targa <br>Telaio</a></th>
                                <th>
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisppi&orderDir=<?=$orderDir?>&page=1">Stato </a></th>
                                <th>Action</th>
                                
                            </tr> 
                        </thead>
                        
                        <tbody>
                            <?php
                            if($permute){
                                //$modalView = 0;
                                foreach ($permute as $p){ 
                                    $imma = explode("-",$p['anno']);
                                    //var_dump($imma);
                                    //$modalView++;
                                    
                                    ?>
                                <tr>
                                    <td><?=$p['id']?></td>
                                    <td><?php
                                        echo tabCodifica('veicoli','tipo_veicoli',$p['tipo_veicolo']);
                                    ?></td>
                                    
                                    <td><?=$p['marca']?></td>
                                    <td><?=$p['modello']?><br>Anno <?=$p['anno']?$imma[1]."/".$imma[0]:''?> </td>
                                    <td><?=$p['targa']?><br><?=$p['telaio']?></td>
                                    <td>
                                    <?php
                                        if($p['stato_permuta']=="P"){?>
                                        <span class="badge badge-pill badge-warning m-1">Presa in Carico</span>
                                    <?    }
                                        if($p['stato_permuta']=="A"){?>
                                        <span class="badge badge-pill badge-success m-1">Permuta Accettata</span>
                                        <?}?>
                                    </td>
                                    
                                    <td><button onclick="location.href='<?=$pageShowUrl?>?id=<?=$p['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Visualizza Permuta"> <i class="fa fa-book"></i> </button>
                                      <button style="padding: .375rem .75rem;"type="button" class="btn btn-warning " title="Aggiorna Permuta"> <i class="fa fa-edit"></i> </button>
                                      <a type="button" onclick="return confirm('Vuoi Eliminare il Record?')"  href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$p['id']?>&action=delete" style="padding: .375rem .75rem;"type="button" class="btn btn-danger " title="Elimina"> <i class="fa fa-trash-o"></i> </a></td>

                                </tr>
                                
                                <?php
                                    
                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=7 style="text-align:center;">No Records Found</td></tr>';
                                }?>

                        </tbody>    

                        </table>
                    </div>
                            
                </div>
            </div>
        </div>  
    </div>    

<?php
    require_once 'view/navigation.php';
?>
                <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Aggiungi Nuovo Veicolo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="addform" action="controller/updatePermute.php" method="post">
                                <input type="hidden" name="action" value="saveVeicolo">
                                <div class="modal-body">
                                <div class="form-group row">
                                    <label for="id_cliente" class="col-sm-4 col-form-label">Cliente</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control form-control-sm" id="id_cliente" name="id_cliente" value=""class="form-control ui-autocomplete-input" autocomplete="off">
                                    </div>
                                </div> 
                                <div class="row">
                                <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                       
                                        <button type="button" class="btn btn-success" id="btnAddCli" data-toggle="modal" data-target="#climodal" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Nuovo Cliente</button>
                                        <button type="button" class="btn btn-primary" id="btnModCli" onclick="newcli();" style="display:none;margin-bottom: 10px;float:right;"><i class="fa fa-plus"></i> Nuova Ricerca Cliente</button>
                                        
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Tipo Veicolo</label>
                                <div class="col-sm-6">
                                <select id="tipo_veicolo" class="form-control" name="tipo_veicolo">
                                    <option value="">Seleziona Tipo Veicolo</option>
                                    <?php
                                    $tipVei = tabDecodifica('veicoli','tipo_veicoli');
                                   // var_dump($tipVei);
                                    foreach($tipVei as $tv){?>
                                        <option value="<?=$tv['codifica']?>"><?=$tv['descrizione']?></option>

                                   <? }
                                    ?>
                                    
                                   
                                
                                </select>
                                </div>
                            </div>

                       
                               
                            <div class="form-group row">
                                <label for="targa" class="col-sm-4 col-form-label">Targa</label>
                                <div class="col-sm-2">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();"maxlength="7" class="form-control" name="targa" id="targa">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="targa" class="col-sm-4 col-form-label">Telaio</label>
                                <div class="col-sm-6">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();"maxlength="17" class="form-control" name="telaio" id="telaio">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="targa" class="col-sm-4 col-form-label">Immatricolazione</label>
                                <div class="col-sm-6">
                                <input type="month" class="form-control col-6"id="anno" name="anno" max="<?=date("Y-m")?>"value="<?=date("Y-m")?>"/>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="marca" class="col-sm-4 col-form-label">Marca</label>
                                <div class="col-sm-4">
                                <select type="text"id="marca" name="marca" class="form-control" >
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
                                <label for="modello" class="col-sm-4 col-form-label">Modello</label>
                                <div class="col-sm-8">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" maxlength="50" class="form-control" name="modello" id="modello">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modello" class="col-sm-4 col-form-label">cilindrata</label>
                                <div class="col-sm-2">
                                    <input type="number"  max="9999" class="form-control" name="cilindrata" id="cilindrata">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">KM</label>
                                <div class="col-sm-2">
                                    <input type="number" name="km" id="km"value="1" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Carburante <br>al ritiro</label>
                                <div class="col-sm-4">
                                    <select type="number" name="fuel" id="fuel"value="1" class="form-control">
                                    <option>Seleziona Quantità</option>
                                    <option value="0">0%</option>
                                    <option value="25">25%</option>
                                    <option value="50">50%</option>
                                    <option value="75">75%</option>
                                    <option value="100">100%</option>


                                    
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Cod colore</label>
                                <div class="col-sm-3">
                                    <input type="text" name="cod_colore" id="cod_colore" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Descrizione <br>colore</label>
                                <div class="col-sm-8">
                                    <input type="text" name="des_colore" id="des_colore" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Data prevista <br>riconsegna</label>
                                <div class="col-sm-4">
                                    <input type="date" name="data_ritiro" id="data_ritiro" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Fascia oraria <br>riconsegna</label>
                                <div class="col-sm-4">
                                <select type="number" name="fascia_ritiro" id="fascia_ritiro" class="form-control">
                                    <option>Seleziona Fascia</option>
                                    <option value="M">Tarda Mattinata</option>
                                    <option value="S">Serata</option>
                                   


                                    
                                    </select>
                                    
                                </div>
                            </div>
                            


                        
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="climodal" aria-hidden="true" style="display: none;">
                 <div class="modal-dialog modal-lg modal-dialog-centered">
                            
                            <form enctype="multipart/form-data" id="addformcli" action="controller/updateAnagr_cli.php" method="post">
                            <input type="hidden" name="action" id="cliaction" value="saveClientePer">
                            <input type="hidden" name="id" id="id_cli" value="">
                                   
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="climodaltitle">Inserimento Nuovo Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div> 
                                        <div class="modal-body">
                                            <div id="datianagr_modal" >
                                                <div class="col-12 "> 
                                                    <div class="row form-group">
                                                        <div class="col col-md-12">
                                                        <h5><i class="fa fa-user"></i> Dati Anagrafici</h5>                                                   </h5></div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="row col-12 ">
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Ragione sociale</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" oninput="this.value = this.value.toUpperCase()"id="ragsociale" name="ragsociale" value="" placeholder="Inserire Ragione Sociale" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row col-12">    
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                                <label class="col-sm-4 col-form-label">Cognome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" oninput="this.value = this.value.toUpperCase()"id="cognome" name="cognome" value="" placeholder="Inserire Cognome" class="form-control"required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label">Nome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" oninput="this.value = this.value.toUpperCase()"id="nome" name="nome" value="" placeholder="Inserire Nome" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row col-12"> 
                                                    <div class="col-6 col-md-12"> 
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Prov di Nascita</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="provnasc" name="provnasc"  required>
                                                                    <optgroup>
                                                                    
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label">Luogo di Nascita</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="luogonasc" id="luogonasc">
                                                                <optgroup></optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row col-12"> 
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Data di Nascita</label>
                                                            <div class="col-sm-8">
                                                                <input type="date" id="datanasc" name="datanasc" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Nazionalita</label>
                                                            <div class="col-sm-8">
                                                        <input type="text" id="nazionalita" name="nazionalita" value="I" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>            
                                                <div class="row col-12"> 
                        
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Sesso</label>
                                                            <div class="col-sm-8">
                                                            
                                                                <select class="form-control" id="sesso" name="sesso" required>
                                                                    <option value="">Seleziona</option>
                                                                    <option value="M">Maschio</option>
                                                                    <option value="F">Femmina</option>  
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-12"> 

                                                    <div class="col-12 ">
                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Codice Fiscale</label>
                                                            <div class="col-sm-4">
                                                        <input type="text" id="codfiscale" readonly="readonly" name="codfiscale" maxlength="16" class="form-control" value="" required>
                                                            </div>
                                                            <div class="col-sm-4"><button class="btn btn-primary" id="cf"><i class="fa fa-id-card"></i> Calcolo codice</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row col-12"> 
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Partita Iva</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" id="partitaiva" name="partitaiva" value="" placeholder="Inserire Partita Iva" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                                <div class="col-12 ">
                                                    <div class="row form-group">
                                                        <div class="col col-md-12">
                                                            <h5><i class="fa fa-home"></i> Dati Residenza</h5>
                                                        </div>
                                                    </div>
                                                </div>


                                            <div class="row col-12">     
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Indirizzo</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="indirizzores" oninput="this.value = this.value.toUpperCase()"name="indirizzores" value="" placeholder="Inserire Indirizzo" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-12">    
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Provincia</label>
                                                        <div class="col-sm-8">
                                                            <select id="provres" name="provres" class="form-control">
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Comune</label>
                                                        <div class="col-sm-8">
                                                                <select id="luogores" name="luogores" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">CAP</label>
                                                        <div class="col-sm-4">
                                                    <input type="text" id="capres" name="capres" maxlength="5" value="" placeholder="Inserire CAP" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                                <div class="col-12 ">
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                    <h5><i class="fa fa-tty"></i> Contatti</h5><h5>
                                                    </h5></div>
                                                </div>
                                                </div>
                                                                            
                                            <div class="row col-12 ">
                                                    <div class="col-6 col-md-12 ">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">eMail 1</label>
                                                            <div class="col-sm-8">
                                                                    <input type="email" id="mail1" name="mail1" value=""placeholder="Inserire eMail 1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                
                                               
                                                    <div class="col-6 col-md-12 ">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">eMail 2</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" id="mail2" name="mail2" value="" placeholder="Inserire eMail 2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row col-12"> 
                                                <div class="col-6 col-md-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel1" name="tel1" maxlength="15" value="" placeholder="Inserire Telefono 1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel2" name="tel2" maxlength="15" value="" placeholder="Inserire Telefono 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile1" name="mobile1" maxlength="15" value="<" placeholder="Inserire Mobile 1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile2" name="mobile2" maxlength="15" value="" placeholder="Inserire Mobile 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                                
                                                

                                                
                                           


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                            <button type="submit" id="btncli"class="btn btn-success"><i class="fa fa-check-square-o"></i> Inserimento Nuovo Cliente</button>

                                        </div>

                                    </div>
                            </form>
                        </div>
                </div>