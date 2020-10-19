<?php
//var_dump($p);
?>

<div class="row">
    <div class="col-12">

        <div class="card" style=" background-color: #dee2e68c;"> <!-- main card-->
            <div class="card-header" style="background-color: lightgray;box-shadow:inset 0px 0px 12px 0px black">
                <div class="row">
                    <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">Permuta #<?=$p['id']?></h3>
                    </div>
                    <div class="col-md-8"> 
                        <div> 
                            <button style="float: right;margin-left:10px;" type="reset" class="btn btn-warning" onclick="history.back();return false;" value="Annulla">
                            <i class="fa fa-undo fa-2x"></i> <span style="vertical-align: super;">Indietro</span>
                            </button>
                        </div>
                        
                            <div>   
                                <button style="float: right;margin-left:10px;" class="btn btn-danger" onclick="if(confirm('Cancellare questo record?')) document.location.href='<?=$deleteUrl?>?id=&action=delete'">
                                <i class="fa fa-trash fa-2x"></i> <span style="vertical-align: super;">Elimina  </span>
                                
                                </button>
                            </div>
                    </div>
                </div>
            </div>
            
  
            <div class="card-body">
              
                <div class="row"> 
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-user"></i> Dati Cliente
                            </div>
                            <div class="card-body">
                                <div class=" col-12" id="datcli" > <!-- scheda cliente-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" style="display:inline;">Id Cliente</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                        <b><?=$cli['id']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Nominativo</h6>
                                                    </div>
                                                    <div class="date">
                                                        <b><?=$cli['cognome']?> <?=$cli['nome']?></b><br>
                                                        CF <?=$cli['codfiscale']?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" style="display:inline;">Dati Anagrafici </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                         nato a <?=getComune($cli['luogonasc'])?>(<?=$cli['provnasc']?>)<br>il <?=date("d/m/Y", strtotime($cli['datanasc']))?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Dati Residenza </h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                        <?=$cli['indirizzores']?><br>
                                                        <?=$cli['capres']?> - <?=getComune($cli['luogores'])?>(<?=$cli['provres']?>)
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Contatti</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                        Email <?=$cli['mail1']?><br>
                                                        Cellulare <?=$cli['mobile1']?>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        
                                        </ul>
                                                          
                                </div>

                            </div>
                        </div>
                        

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-motorcycle"></i> Dati Veicolo
                            </div>
                            <div class="card-body">
                                <div class=" col-12" id="datcli" > <!-- scheda cliente-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" style="display:inline;">Targa</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                        <b><?=$p['targa']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Marca</h6>
                                                    </div>
                                                    <div class="date">
                                                        <b ><?=$p['marca']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" >Modello </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                         <b ><?=$p['modello']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Telaio</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b ><?=$p['telaio']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Immatricolazione</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b><?=$p['anno']?></b>
                                                    
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Cilindrata</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                     <b><?=$p['cilindrata']?> cc</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">KM</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                     <b><?=$p['km']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Colore</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                     <b><?=$p['cod_colore']?><br><?=$p['des_colore']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        
                                        </ul>
                                                          
                                </div>

                            </div>
                        </div>
                        

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-book"></i> Stato Permuta
                            </div>
                            <div class="card-body">
                                <div class=" col-12" id="datcli" > <!-- scheda cliente-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Stato</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                    <?php
                                                            if($p['stato_permuta']=="P"){?>
                                                            <span class="badge badge-pill badge-warning m-1">Presa in Carico</span>
                                                            <?    }
                                                            if($p['stato_permuta']=="A"){?>
                                                            <span class="badge badge-pill badge-success m-1">Permuta Accettata</span>
                                                            <?}
                                                            if($p['stato_permuta']=="V"){?>
                                                            <span class="badge badge-pill badge-success m-1">Permuta Valutata</span>
                                                            <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Libretto</h6>
                                                    </div>
                                                    <div class="date">
                                                    <?php
                                                         if($p['libretto']=="S"){?>
                                                          <span class="badge badge-pill badge-success m-1">Presente</span>
                                                        <?    }
                                                            if($p['libretto']=="N"||$p['libretto']==NULL){?>
                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                        <?}?>
                                                     
                                                    </div>
                                                </div>
                                            </li>
                                      
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>CDP</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <?php
                                                         if($p['cdp']=="P"){?>
                                                          <span class="badge badge-pill badge-success m-1">Presente</span>
                                                        <?    }
                                                            if($p['cdp']=="N"||$p['libretto']==NULL){?>
                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                        <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            
                                        
                                        </ul>
                                                          
                                </div>

                            </div>
                        </div>
                        

                    </div>
                    
                    
                   
                </div> <!-- end row card body-->
                <div class="row">
                    
                        <div class="card" style="width:100%;">
                            <div class="card-body"> 
                                <ul class="nav nav-tabs nav-tabs-danger top-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabe-7"><i class="fa fa-bar-chart"></i> <span class="hidden-xs"> Valutazione</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-9"><i class="fa fa-list"></i> <span class="hidden-xs">Dettaglio</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-8"><i class="fa fa-paperclip"></i> <span class="hidden-xs">Allegati</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-6"><i class="fa fa-cog"></i> <span class="hidden-xs">Procedura Ritiro</span></a>
                                </li>
                                
                                
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                <div id="tabe-7" class="container tab-pane active" style="max-width: 100%;">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body col-12">
                                                <div class="row">
                                                    <button class="btn btn-outline-info  m-1" data-toggle="modal" data-target="#valoremodal">Aggiorna Valore</button>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-lg-4">   
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Valore Ritiro Usato</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b class="importi"><?=$p['stima']?></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Costi Ripristino/Commesse</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b class="importi"><?=$p['costi_ripristino']?></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Valore Finale</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b class="importi"><?=$p['valore_finale']?></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Prezzo di Vendita</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b class="importi"></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>     
                                                    <div class="col-lg-6">   
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Consulente Presa Carico</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b><?=$p['user_ins']?></b><br>il <b><?=date("d/m/Y H:i",strtotime($p['data_ins']))?></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Consulente Valutazione</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <b><?=$p['user_value']?></b><br>il <b><?=date("d/m/Y H:i",strtotime($p['data_value']))?></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Consulente Vendita</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                        <b></b>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div> 
                                                      
                                                </div>
                                                <div class="modal fade" id="valoremodal" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered" >
                                                        <div class="modal-content border-info">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title text-white">Aggiornamento Valore</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form id="addform2" action="controller/updatePermute.php" method="post">   
                                                            <input type="hidden" name="id" value="<?=$p['id']?>">
                                                            
                                                            <input type="hidden" name="action" value="upValore"> 
                                                        <div class="modal-body">
                                                            

                                                                <div class="form-group row">
                                                                    <label for="default-input" class="col-sm-6 col-form-label">Valore ritiro</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" class="form-control" id="stima" name="stima" value="<?=$p['stima']?$p['stima']:''?>">
                                                                    </div>
                                                                </div> 

                                                                <div class="form-group row">
                                                                    <label for="default-input" class="col-sm-6 col-form-label">Costi Ripristino</label>
                                                                    <div class="col-sm-4">
                                                                        <input readonly type="number" class="form-control" id="costi_rispristino" name="costi_rispristino" value="<?=$p['costi_ripristino']?>">
                                                                    </div>
                                                                </div>   
                                                                <div class="form-group row">
                                                                    <label for="default-input" class="col-sm-6 col-form-label">Valore Finale</label>
                                                                    <div class="col-sm-4">
                                                                        <input readonly type="number" class="form-control" id="valore_finale" name="valore_finale" value="<?=$p['valore_finale']?>">
                                                                    </div>
                                                                </div>   
                                                                  
                                                                        
                                                              
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aggiorna Valore</button>
                                                        </div>
                                                        </form>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                               
                                                <div class="row">
                                                    <button class="btn btn-outline-info  m-1" data-toggle="modal" data-target="#valutazionemodal">Aggiorna Valutazione</button>
                                                </div>
                                                <div class="row">
                                                    <div class="table-responsive col-6">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tipo</th>
                                                                <th>Valutazione</th>
                                                                <th>Note</th>
                                                                <th>Costo</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Motore</td>
                                                            <td><?=$p['stato_motore']?tabCodifica('veicoli','stato_organi',$p['stato_motore']):''?></td>
                                                            <td><?=$p['note_motore']?></td>
                                                            <td class="importi"><?=$p['costo_motore']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cambio</td>
                                                            <td><?=$p['stato_cambio']?tabCodifica('veicoli','stato_organi',$p['stato_cambio']):''?></td>
                                                            <td><?=$p['note_cambio']?></td>
                                                            <td class="importi"><?=$p['costo_cambio']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Retrotreno</td>
                                                            <td><?=$p['stato_retrotreno']?tabCodifica('veicoli','stato_organi',$p['stato_retrotreno']):''?></td>
                                                            <td><?=$p['note_retrotreno']?></td>
                                                            <td class="importi"><?=$p['costo_retrotreno']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Freni</td>
                                                            <td><?=$p['stato_freni']?tabCodifica('veicoli','stato_organi',$p['stato_freni']):''?></td>
                                                            <td><?=$p['note_freni']?></td>
                                                            <td class="importi"><?=$p['costo_freni']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Batteria</td>
                                                            <td><?=$p['stato_batteria']?tabCodifica('veicoli','stato_organi',$p['stato_batteria']):''?></td>
                                                            <td><?=$p['note_batteria']?></td>
                                                            <td class="importi"><?=$p['costo_batteria']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Strumentazione</td>
                                                            <td><?=$p['stato_strumenti']?tabCodifica('veicoli','stato_organi',$p['stato_strumenti']):''?></td>
                                                            <td><?=$p['note_strumenti']?></td>
                                                            <td class="importi"><?=$p['costo_strumenti']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Interno</td>
                                                            <td><?=$p['stato_interno']?tabCodifica('veicoli','stato_organi',$p['stato_interno']):''?></td>
                                                            <td><?=$p['note_interno']?></td>
                                                            <td class="importi"><?=$p['costo_interno']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Usura<br>Pneumatici</td>
                                                            <td><?=$p['stato_pneumatici']?tabCodifica('veicoli','stato_pneumatici',$p['stato_pneumatici']):''?></td>
                                                            <td><?=$p['note_pneumatici']?></td>
                                                            <td class="importi"><?=$p['costo_pneumatici']?></td>
                                                        </tr>
                                                        

                                                        </tbody>
                                                       
                                                        </table>
                                                    </div>
                                                    <div class="table-responsive col-6">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tipo</th>
                                                                <th>Valutazione</th>
                                                                <th>Note</th>
                                                                <th>Costo</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Frizione</td>
                                                            <td><?=$p['stato_frizione']?tabCodifica('veicoli','stato_organi',$p['stato_frizione']):''?></td>
                                                            <td><?=$p['note_frizione']?></td>
                                                            <td class="importi"><?=$p['costo_frizione']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sterzo<br>Avantreno</td>
                                                            <td><?=$p['stato_avantreno']?tabCodifica('veicoli','stato_organi',$p['stato_avantreno']):''?></td>
                                                            <td><?=$p['note_avantreno']?></td>
                                                            <td class="importi"><?=$p['costo_avantreno']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sospensioni</td>
                                                            <td><?=$p['stato_sosp']?tabCodifica('veicoli','stato_organi',$p['stato_sosp']):''?></td>
                                                            <td><?=$p['note_sosp']?></td>
                                                            <td class="importi"><?=$p['costo_sosp']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Scarico</td>
                                                            <td><?=$p['stato_scarico']?tabCodifica('veicoli','stato_organi',$p['stato_scarico']):''?></td>
                                                            <td><?=$p['note_scarico']?></td>
                                                            <td class="importi"><?=$p['costo_scarico']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gruppi Ottici</td>
                                                            <td><?=$p['stato_fari']?tabCodifica('veicoli','stato_organi',$p['stato_fari']):''?></td>
                                                            <td><?=$p['note_fari']?></td>
                                                            <td class="importi"><?=$p['costo_fari']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cerchi<br>Conv-Eq.</td>
                                                            <td><?=$p['stato_ruote']?tabCodifica('veicoli','stato_organi',$p['stato_ruote']):''?></td>
                                                            <td><?=$p['note_ruote']?></td>
                                                            <td class="importi"><?=$p['costo_ruote']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Esterno</td>
                                                            <td><?=$p['stato_esterno']?tabCodifica('veicoli','stato_organi',$p['stato_esterno']):''?></td>
                                                            <td><?=$p['note_esterno']?></td>
                                                            <td class="importi"><?=$p['costo_esterno']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Prestazione<br>di servizio</td>
                                                           
                                                            <td colspan="2"><?=$p['note_prestazione']?></td>
                                                            <td class="importi"><?=$p['costo_prestazione']?></td>
                                                        </tr>
                                                        

                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="valutazionemodal" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" style="min-width: 90%;">
                                            <div class="modal-content border-info">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title text-white">Aggiornamento Valutazione</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form id="addform" action="controller/updatePermute.php" method="post">   
                                                <input type="hidden" name="id" id="id" value="<?=$p['id']?>">
                                                <input type="hidden" name="costi_ripristino" id="costi_ripristino" value="0.00">
                                                <input type="hidden" name="action" value="upVal"> 
                                            <div class="modal-body">
                                                <div class="row">
                                                            <?php
                                                            $dsta =  tabDecodifica('veicoli','stato_organi');
                                                            $dstb =  tabDecodifica('veicoli','stato_pneumatici');
                                                           
                                                            ?>
                                                        <div class="table-responsive col-6">
                                                            <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tipo</th>
                                                                    <th>Valutazione</th>
                                                                    <th>Note</th>
                                                                    <th style="width:20%">Costo</th>
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Motore</td>
                                                                <td><select class="form-control form-control-sm" id="stato_motore" name="stato_motore"style="background-color: white;">
                                                                        <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_motore']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                        
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" maxlenght="50" style="background-color: white;"id="note_motore" name="note_motore" value="<?=$p['note_motore']?>"></td>
                                                                <td ><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_motore"name="costo_motore" value="<?=$p['costo_motore']?$p['costo_motore']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cambio</td>
                                                                <td><select class="form-control form-control-sm" id="stato_cambio" name="stato_cambio"style="background-color: white;">
                                                                        
                                                                        <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_cambio']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_cambio" value="<?=$p['note_cambio']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_cambio" name="costo_cambio"value="<?=$p['costo_cambio']?$p['costo_cambio']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Retrotreno</td>
                                                                <td><select class="form-control form-control-sm" id="stato_retrotreno" name="stato_retrotreno"style="background-color: white;">
                                                                         <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_retrotreno']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_retrotreno" name="note_retrotreno" value="<?=$p['note_retrotreno']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_retrotreno" name="costo_retrotreno"value="<?=$p['costo_retrotreno']?$p['costo_retrotreno']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Freni</td>
                                                                <td><select class="form-control form-control-sm" id="stato_freni" name="stato_freni"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_freni']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_freni"name="note_freni" value="<?=$p['note_freni']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_freni"name="costo_freni" value="<?=$p['costo_freni']?$p['costo_freni']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Batteria</td>
                                                                <td><select class="form-control form-control-sm" id="stato_batteria" name="stato_batteria"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_batteria']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_batteria"name="note_batteria" value="<?=$p['note_batteria']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_batteria" name="costo_batteria"value="<?=$p['costo_batteria']?$p['costo_batteria']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Strumentazione</td>
                                                                <td><select class="form-control form-control-sm" id="stato_strumenti" name="stato_strumenti"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_strumenti']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_strumenti" name="note_strumenti"value="<?=$p['note_strumenti']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_strumenti" name="costo_strumenti" value="<?=$p['costo_strumenti']?$p['costo_strumenti']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Interno</td>
                                                                <td><select class="form-control form-control-sm" id="stato_interno" name="stato_interno" style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_interno']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_interno" name="note_interno" value="<?=$p['note_interno']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_interno" name="costo_interno"value="<?=$p['costo_interno']?$p['costo_interno']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usura<br>Pneumatici</td>
                                                                <td><select class="form-control form-control-sm" id="stato_pneumatici" name="stato_pneumatici"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dstb as $cob){?>
                                                                        <option value="<?=$cob['codifica']?>" <?=$p['stato_pneumatici']==$cob['codifica']?'selected':''?>><?=$cob['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_pneumatici" name="note_pneumatici"value="<?=$p['note_pneumatici']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_pneumatici" name="costo_pneumatici"value="<?=$p['costo_pneumatici']?$p['costo_pneumatici']:0.00?>"></td>
                                                            </tr>
                                                            

                                                            </tbody>
                                                        
                                                            </table>
                                                        </div>
                                                        <div class="table-responsive col-6">
                                                            <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tipo</th>
                                                                    <th>Valutazione</th>
                                                                    <th>Note</th>
                                                                    <th style="width:20%">Costo</th>
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Frizione</td>
                                                                <td><select class="form-control form-control-sm" id="stato_frizione" name="stato_frizione"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_frizione']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_frizione" name="note_frizione"value="<?=$p['note_frizione']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_frizione" name="costo_frizione"value="<?=$p['costo_frizione']?$p['costo_frizione']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sterzo<br>Avantreno</td>
                                                                <td><select class="form-control form-control-sm" id="stato_avantreno" name="stato_avantreno"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_avantreno']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_avantreno" name="note_avantreno"value="<?=$p['note_avantreno']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_avantreno" name="costo_avantreno"value="<?=$p['costo_avantreno']?$p['costo_avantreno']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sospensioni</td>
                                                                <td><select class="form-control form-control-sm" id="stato_sosp" name="stato_sosp"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_sosp']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_sosp"name="note_sosp"value="<?=$p['note_sosp']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_sosp"name="costo_sosp" value="<?=$p['costo_sosp']?$p['costo_sosp']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scarico</td>
                                                                <td><select class="form-control form-control-sm" id="stato_scarico" name="stato_scarico"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_scarico']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_scarico"name="note_scarico"value="<?=$p['note_scarico']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_scarico" name="costo_scarico" value="<?=$p['costo_scarico']?$p['costo_scarico']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gruppi Ottici</td>
                                                                <td><select class="form-control form-control-sm" id="stato_fari"name="stato_fari" style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_fari']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_fari"name="note_fari"value="<?=$p['note_fari']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_fari" name="costo_fari"value="<?=$p['costo_fari']?$p['costo_fari']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cerchi<br>Conv-Eq.</td>
                                                                <td><select class="form-control form-control-sm" id="stato_ruote" name="stato_ruote"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_ruote']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_ruote"name="note_ruote"value="<?=$p['note_ruote']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_ruote" name="costo_ruote"value="<?=$p['costo_ruote']?$p['costo_ruote']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Esterno</td>
                                                                <td><select class="form-control form-control-sm" id="stato_esterno" name="stato_esterno"style="background-color: white;">
                                                                <option value="">Seleziona Stato</option>
                                                                        <?php
                                                                            foreach($dsta as $cod){?>
                                                                        <option value="<?=$cod['codifica']?>" <?=$p['stato_esterno']==$cod['codifica']?'selected':''?>><?=$cod['descrizione']?></option>

                                                                        <? }?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_esterno"name="note_esterno"value="<?=$p['note_esterno']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_esterno" name="costo_esterno"value="<?=$p['costo_esterno']?$p['costo_esterno']:0.00?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Prestazione<br>di Servizio</td>
                                                                
                                                                <td colspan="2"><input type="text" class="form-control form-control-sm" lenght="50" style="background-color: white;"id="note_prestazione" name="note_prestazione"value="<?=$p['note_prestazione']?>"></td>

                                                                <td><input type="number" class="form-control form-control-sm"  max="99999" style="background-color: white;"id="costo_prestazione" name="costo_prestazione"value="<?=$p['costo_prestazione']?$p['costo_prestazione']:0.00?>"></td>
                                                            </tr>
                                                            

                                                            </tbody>
                                                            </table>
                                                        </div>
                                                            
                                                </div>  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aggiorna Valutazione</button>
                                            </div>
                                            </form>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabe-9" class="container tab-pane fade" style="max-width: 100%;">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body col-12">
                                                <div class="row">
                                                    <button class="btn btn-outline-info  m-1" data-toggle="modal" data-target="#dettaglimodal">Aggiorna Dettagli</button>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-lg-4">   
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Documenti</h6>
                                                                    
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Libretto di circolazione</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['libretto']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['libretto']=="N"||$p['libretto']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">N. Intestatari</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <b><?=$p['num_inte']?></b>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">C.d.P.</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['cdp']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['cdp']=="N"||$p['cdp']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <br>
                                                                    <?php
                                                                        if($p['firma_cdp']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Firmato</span>
                                                                        <?    }
                                                                            if($p['firma_cdp']=="N"||$p['firma_cdp']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente/Firmato</span>
                                                                        <?}?><br>
                                                                        <?php
                                                                        if($p['doc_cdp']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Documento Presente</span>
                                                                        <?    }
                                                                            if($p['doc_cdp']=="N"||$p['doc_cdp']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Fermo Amministrativo</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['stato_fermo']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['stato_fermo']=="N"||$p['stato_fermo']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>    
                                                    <div class="col-lg-4">   
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Scadenze</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Tassa di Circolazione</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['stato_tassa']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['stato_tassa']=="N"||$p['stato_tassa']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                    <?=date("d/m/Y",strtotime($p['data_tassa']))?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Data Ultima Revisione</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?=date("d/m/Y", strtotime($p['data_revisione']))?>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>  
                                                    <div class="col-lg-4">   
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Accessori</h6>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Doppie Chiavi</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['stato_chiavi']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['stato_chiavi']=="N"||$p['stato_chiavi']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Borsa Attrezzi</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['stato_borsa']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['stato_borsa']=="N"||$p['stato_borsa']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Ruota di Scorta</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['stato_scorta']=="S"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Presente</span>
                                                                        <?    }
                                                                            if($p['stato_scorta']=="N"||$p['stato_scorta']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?}?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>  
                                                   
                                                      
                                                </div>
                                                <div class="modal fade" id="dettaglimodal" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" style="min-width:80%">
                                                        <div class="modal-content border-info">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title text-white">Aggiornamento Dettagli</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form id="addform3" action="controller/updatePermute.php" method="post">   
                                                            <input type="hidden" name="id" value="<?=$p['id']?>">
                                                            
                                                            <input type="hidden" name="action" value="upDettagli"> 
                                                        <div class="modal-body">
                                                            <div class="row">
                                                            <?php
                                                            $ddoc =  tabDecodifica('veicoli','stato_doc');
                                                            $dbool = tabDecodifica('generica','bool');
                                                            //var_dump($dbool);
                                                            ?>
                                                                <div class="col-lg-4">                       
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Libretto di Circolazione</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control" id="libretto" name="libretto">
                                                                                <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($ddoc as $dd){?>
                                                                                            <option value="<?=$dd['codifica']?>" <?=$p['libretto']==$dd['codifica']?'selected':''?>><?=$dd['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                    
                                                                                </select>  
                                                                            </div>
                                                                        </div> 

                                                                        <div class="form-group row">
                                                                            <label for="num_inte" class="col-sm-6 col-form-label">N. Intestatari</label>
                                                                            <div class="col-sm-2">
                                                                                <input  type="number" class="form-control" id="num_inte" name="num_inte" value="<?=$p['num_inte']?>">
                                                                            </div>
                                                                        </div>   
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Certificato di<br>Proprietà</label>
                                                                            <div class="col-sm-4">
                                                                            <select class="form-control" id="cdp" name="cdp">
                                                                                <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($ddoc as $dd){?>
                                                                                            <option value="<?=$dd['codifica']?>" <?=$p['cdp']==$dd['codifica']?'selected':''?>><?=$dd['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                    
                                                                                </select>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Firma C.d.P.</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="firma_cdp" name="firma_cdp">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['firma_cdp']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Ritiro Copia Documenti</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="doc_copia" name="doc_copia">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['doc_copia']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                    
                                                                                </select>  
                                                                                        </select>
                                                                            </div>
                                                                        </div>         
                                                                </div> 
                                                                <div class="col-lg-4"> 
                                                                        <div class="form-group row">
                                                                            <label for="stato_tassa" class="col-sm-6 col-form-label">Stato<br>Tassa di Circolazione</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="stato_tassa" name="stato_tassa">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['stato_tassa']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div>                      
                                                                        <div class="form-group row">
                                                                            <label for="data_tassa" class="col-sm-6 col-form-label">Data scadenza<br>Tassa di Circolazione</label>
                                                                            <div class="col-sm-6">
                                                                                    <input  type="date" class="form-control" id="data_tassa" name="data_tassa" value="<?=$p['data_tassa']?>">

                                                                            </div>
                                                                        </div> 
                                                                        <div class="form-group row">
                                                                            <label for="stato_fermo" class="col-sm-6 col-form-label">Stato<br>Fermo Amministrativo</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="stato_fermo" name="stato_fermo">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['stato_fermo']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div>                      
                                                                        <div class="form-group row">
                                                                            <label for="data_revisione" class="col-sm-6 col-form-label">Data ultima<br>Revisione</label>
                                                                            <div class="col-sm-6">
                                                                                    <input  type="date" class="form-control" id="data_revisione" name="data_revisione" value="<?=$p['data_revisione']?>">

                                                                            </div>
                                                                        </div> 

                                                                        
                                                                </div>  
                                                                <div class="col-lg-4"> 
                                                                        <div class="form-group row">
                                                                            <label for="stato_chiavi" class="col-sm-6 col-form-label">Doppie chiavi</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="stato_chiavi" name="stato_chiavi">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['stato_chiavi']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div>                      
                                                                        <div class="form-group row">
                                                                            <label for="stato_borsa" class="col-sm-6 col-form-label">Borsa Attrezzi</label>
                                                                            <div class="col-sm-4">
                                                                            <select class="form-control" id="stato_borsa" name="stato_borsa">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['stato_borsa']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="form-group row">
                                                                            <label for="stato_scorta" class="col-sm-6 col-form-label">Ruota di Scorta</label>
                                                                            <div class="col-sm-4">
                                                                                        <select class="form-control" id="stato_scorta" name="stato_scorta">
                                                                                        <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dbool as $db){?>
                                                                                            <option value="<?=$db['codifica']?>" <?=$p['stato_scorta']==$db['codifica']?'selected':''?>><?=$db['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div>                      
                                                                        <div class="form-group row">
                                                                            <label for="note" class="col-sm-6 col-form-label">note</label>
                                                                            
                                                                        </div> 
                                                                        <div class="form-group row">
                                                                            
                                                                            <div class="col-sm-12">
                                                                                    <textarea rows="2" maxlenght="50"class="form-control" id="note" name="note" value="<?=$p['note']?>"></textarea>

                                                                            </div>
                                                                        </div> 

                                                                        
                                                                </div>        
                                                            </div>           
                                                              
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aggiorna Valore</button>
                                                        </div>
                                                        </form>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div id="tabe-8" class="container tab-pane fade" style="max-width: 100%;">
                                        <div class="row"> <!--row tab-->
                                            <div class="card-body"> <!--card-body-tab-->
                                                <div id="message2"class="col-lg-6 alert alert-success alert-dismissible" style="display:none;"role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <div class="alert-icon">
                                                    <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span id="tex_msg2"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-xl-2">
                                                
                                                    <!--Info Modal -->
                                                    <button class="btn btn-outline-info btn-block m-1" id="addAll" data-toggle="modal" data-target="#allemodal" ><i class="fa fa-plus"></i> Aggiungi Allegato</button>
                                                        <div class="modal fade" id="allemodal" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content border-info">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title text-white">Nuovo Allegato Permuta #</h5>
                                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="id_pratica" value="<?=$fin['id_pratica']?>">
                                                                        <input type="hidden" id="id_cliente" value="<?=$fin['id_cliente']?>">
                                                                        <div class="form-group row">
                                                                            <label for="tipo_alle" class="col-sm-4 col-form-label">Tipologia Allegato</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control form-control-sm" id="tipo_alle" required>
                                                                                    <option value="">Seleziona tipo Documento</option>
                                                                                    <option value="CI">Documento di Riconoscimento</option>
                                                                                    <option value="CF">Tessera Sanitaria/Codice Fiscale</option>
                                                                                    <option value="DR">Documentazione di Reddito</option>
                                                                                    <

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                  
                                                                        <div class="form-group row" id="f_alle"style="display:none;">
                                                                            <label for="file_alle" class="col-sm-4 col-form-label">Allegato</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="file" class="form-control-file" name="file_alle"id="file_alle" required>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="form-group row" id="t_alle"style="display:none;">
                                                                            <label for="tipo_file" class="col-sm-4 col-form-label">Tipologia File</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control form-control-sm" id="tipo_file" required>
                                                                                    <option value="">Seleziona tipo File</option>
                                                                                    <option value="DF">Scansione Fronte</option>
                                                                                    <option value="DR">Scansione Retro</option>
                                                                                    <option value="DFR">Scansione Fronte/Retro</option>
                                                                                    <option value="">PDF</option>
                                                                                    

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" id="i_alle"style="display:none;">
                                                                            <label for="imp_alle" class="col-sm-4 col-form-label">Importo</label>
                                                                            <div class="col-sm-4">
                                                                                <input  type="number" id="imp_alle"  maxlength="8" class="form-control " value="0.00" aria-invalid="false">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" id="d_alle"style="display:none;">
                                                                            <label for="data_alle" class="col-sm-4 col-form-label">Data Contabile</label>
                                                                            <div class="col-sm-6">
                                                                                <input  type="date" id="data_alle" class="form-control ">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" id="des_alle" style="display:none;">
                                                                            <label for="data_alle" class="col-sm-4 col-form-label">Descrizione</label>
                                                                            <div class="col-sm-8">
                                                                                <input  type="text" id="descrizione_alle" class="form-control ">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                                        <button type="button" id="add_alle" class="btn btn-success" title="Selezionare File da caricare" disabled><i class="fa fa-check-square-o"></i> Salva</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--End Modal -->
                                                </div>
                                            </div>  
                                        </div> 
                                        <div class="row">
                                            <div class="card-body">
                                                <div class="table-responsive col-8">
                                                    <table class="table table-sm" id="alle_table" >
                                                            <thead>
                                                                <tr>								              
                                                                    								             
                                                                    <th>Data Caricamento</th>
                                                                    <th>Tipo</th>
                                                                    <th>Descrizione</th>
                                                                    <th >Azioni</th>	
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                           
                                                        </tbody>
                                                       
                                                    </table>
                                                </div>      
                                            </div>
                                        
                                        </div> 
                                    
                               
                                </div>
                                <div id="tabe-6" class="container tab-pane fade" style="max-width: 100%;">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body col-12">
                                                <div class="row">
                                                    <button class="btn btn-outline-info  m-1" data-toggle="modal" data-target="#ritiromodal">Aggiorna Procedura Ritiro</button>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-lg-6">   
                                                        <ul class="list-group">
                                                            
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Procedura Ritiro Usato</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['procedura_ritiro']=="M"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Mini Passaggio</span>
                                                                        <?    }
                                                                            if($p['procedura_ritiro']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?} if($p['procedura_ritiro']=="C"){?>
                                                                            <span class="badge badge-pill badge-success m-1">Conto Vendita</span>

                                                                            <?}?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Tipo Fattura</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?php
                                                                        if($p['tipo_fattura']=="A"){?>
                                                                        <span class="badge badge-pill badge-success m-1">Autofattura</span>
                                                                        <?    }
                                                                            if($p['tipo_fattura']==NULL){?>
                                                                            <span class="badge badge-pill badge-danger m-1">Non Presente</span>
                                                                        <?} if($p['tipo_fattura']=="F"){?>
                                                                            <span class="badge badge-pill badge-success m-1">Fattura</span>

                                                                            <?}?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    
                                                                    <h6 class="mb-0" style="display:inline;">Note consulente</h6>
                                                                    
                                                                    </div>
                                                                    <div class="date" style="text-align: right;">
                                                                    <?=$p['note_vendita']?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>    
                                                     
                                                   
                                                      
                                                </div>
                                                <div class="modal fade" id="ritiromodal" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" >
                                                        <div class="modal-content border-info">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title text-white">Aggiornamento Procedura Ritiro Usato</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form id="addform3" action="controller/updatePermute.php" method="post">   
                                                            <input type="hidden" name="id" value="<?=$p['id']?>">
                                                            
                                                            <input type="hidden" name="action" value="upRitiro"> 
                                                        <div class="modal-body">
                                                            <div class="row">
                                                            <?php
                                                            $drit =  tabDecodifica('veicoli','procedura_ritiro');
                                                            $dfat = tabDecodifica('veicoli','tipo_fattura');
                                                            //var_dump($dbool);
                                                            ?>
                                                                    <div class="col-12">                  
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Procedura ritiro usato</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control" id="procedura_ritiro" name="procedura_ritiro">
                                                                                <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($drit as $dr){?>
                                                                                            <option value="<?=$dr['codifica']?>" <?=$p['procedura_ritiro']==$dr['codifica']?'selected':''?>><?=$dr['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                    
                                                                                </select>  
                                                                            </div>
                                                                        </div> 

                                                                          
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-6 col-form-label">Tipo Fattura</label>
                                                                            <div class="col-sm-6">
                                                                            <select class="form-control" id="tipo_fattura" name="tipo_fattura">
                                                                                <option value="">Seleziona</option>
                                                                                <?php
                                                                                    foreach($dfat as $df){?>
                                                                                            <option value="<?=$df['codifica']?>" <?=$p['tipo_fattura']==$df['codifica']?'selected':''?>><?=$df['descrizione']?></option>

                                                                                <?    }
                                                                                ?>
                                                                                    
                                                                                </select>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="default-input" class="col-sm-4 col-form-label">Note Consulente</label>
                                                                            <div class="col-sm-8">
                                                                            <textarea rows="4" class="form-control" id="note_vendita" name="note_vendita" value="<?=$p['note_vendita']?>"></textarea>
                                                                               
                                                                            </div>
                                                                        </div> 
                                                                        
                                                                                    </div>           
                                                                
                                                                       
                                                            </div>           
                                                              
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aggiorna Valore</button>
                                                        </div>
                                                        </form>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>                            </div>
                        </div>

                    
                </div>     
			</div>
        </div> 
    </div>
</div>