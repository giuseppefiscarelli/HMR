<?php
//var_dump($contr);
//var_dump($cli);
//$motosel = getMotosel($contr['id_veicolo']);
?>
<div class="row">
    <div class="col-12">

        <div class="card" style=" background-color: #dee2e68c;"> <!-- main card-->
            <div class="card-header" style="background-color: lightgray;box-shadow:inset 0px 0px 12px 0px black">
                <div class="row">
                    <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">Pratica #<?=$fin['id']?></h3>
                    </div>
                    <div class="col-md-8"> 
                        <div> 
                            <button style="float: right;margin-left:10px;" type="reset" class="btn btn-warning" onclick="history.back();return false;" value="Annulla">
                            <i class="fa fa-undo fa-2x"></i> <span style="vertical-align: super;">Indietro</span>
                            </button>
                        </div>
                        <!--  
                        <div> 
                            <button style="float: right;margin-left:10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">
                            <i class="fa fa-print fa-2x"></i> <span style="vertical-align: super;">Stampa Report</span>
                            </button>
                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <button type="button" tabindex="0" class="dropdown-item" onclick="prtPdf('<?=$contr['id']?>')">Stampa 1 </button>
                                <button  type="button" tabindex="0" class="dropdown-item" onclick="prtPdf2()">Stampa 2</button>
                               
                                <div tabindex="-1" class="dropdown-divider"></div>
                                    <button  type="button" tabindex="0" class="dropdown-item" onclick="prtPdf3()">Stampa 3</button>
                                
                                </div>
                                
                            </div>
                        -->    
                            <div>   
                                <button style="float: right;margin-left:10px;" class="btn btn-danger" onclick="if(confirm('Cancellare questo record?')) document.location.href='<?=$deleteUrl?>?id=&action=delete'">
                                <i class="fa fa-trash fa-2x"></i> <span style="vertical-align: super;">Elimina  </span>
                                
                                </button>
                            </div>
                    </div>
                </div>
            </div>
            
  
            <div class="card-body">
                <!--<div class="row" style="margin:0px;">
                    <div class="card col-12">
                        <div class="card-header" style="font-size:large;"><i class="fa fa-bar-chart"></i> Stato Attività</div>
                            <div class="row">
                                        <div class="col-lg-2 col-12">
                                            <div class="media align-items-center">
                                                <div id="chart9"></div>
                                            </div>
                                        </div>
                            
                                <div class="col-lg-3 col-12">
                                    <div class="progress-wrapper mb-4">
                                        <p>Fase 1<span class="float-right">50%</span></p>
                                            <div class="progress" style="height:7px;">
                                                <div class="progress-bar gradient-ibiza" style="width:50%"></div>
                                            </div>
                                    </div>

                                    <ul class="list-group list-group-flush shadow-none">
                                        
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Dati Cliente</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Documenti Cliente</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Versamento Caparra</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                     
                                    
                                        
                                    </ul>        
                                </div>
                                <div class="col-lg-3 col-12">
                                    <div class="progress-wrapper mb-4">
                                        <p>Fase 2<span class="float-right">50%</span></p>
                                            <div class="progress" style="height:7px;">
                                                <div class="progress-bar gradient-ibiza" style="width:50%"></div>
                                            </div>
                                    </div>

                                    <ul class="list-group list-group-flush shadow-none">
                                        
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Stato Saldo</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Stato Documenti</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                        <li class="list-group-item">         
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0"> 
                                                    

                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                
                                                            Stato Veicolo</h6>
                                                        </div>
                                                        <div class="date">
                                                        </div>

                                                    </div>
                                                    
                                                
                                        </li>
                                     
                                    
                                        
                                    </ul>        
                                </div>
                            </div>
                    </div>
                </div>-->

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
                            <div class="card-header" style="font-size:large;"><i class="fa fa-bank"></i> Dettaglio Finanziamento
                            </div>
                            <div class="card-body">
                                <div class=" col-12" id="datcli" > <!-- scheda cliente-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" style="display:inline;">Tabella</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                        <b><?=$tabfin['codtab']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Finanziato</h6>
                                                    </div>
                                                    <div class="date">
                                                        <b class="importi"><?=$tabfin['finimp']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" >Contributo Cliente </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                         <b class="importi"><?=$tabfin['fincon']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Totale Finanziamento</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$tabfin['fintot']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Rata</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    Numero <b><?=$tabfin['finnra']?></b><br>
                                                    Importo <b class="importi"><?=$tabfin['finira']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">Dettagli</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    TAN <b><?=$tabfin['fintan']?> %</b><br>
                                                    TAEG <b><?=$tabfin['fintae']?> %</b><br>
                                                    Importo Credito <b class="importi"><?=$tabfin['finimc']?></b><br>
                                                    SMPT <b class="importi"><?=$tabfin['finsmp']?></b><br>
                                                    Totale Dovuto <b class="importi"><?=$tabfin['findvt']?></b>
                                                    <?=$tabfin['finmx1']>0?'<br>Maxi Rata <b class="importi">'.$tabfin['finmx1'].'</b>':''?>
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
                            <div class="card-header" style="font-size:large;"><i class="fa fa-book"></i> Dettaglio Pratica
                            </div>
                            <div class="card-body">
                                <div class=" col-12" id="datcli" > <!-- scheda cliente-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Inserimento</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                      Data  <b><?=$fin['data_ins']?></b><br>
                                                      Utente <b><?=$fin['user_ins']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Pratica Agos</h6>
                                                    </div>
                                                    <div class="date">
                                                     Numero <b><?=$fin['id_pratica']?></b><br>
                                                     Data <b><?=$fin['data_richiesta']?></b><br>
                                                     Stato  <?php if($fin['stato_pratica']=="I"){?>
                                                        <span class="badge badge-warning m-1">In Lavorazione</span>
                                                    <?}elseif($fin['stato_pratica']=="A"){?>  
                                                        <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                    <?}elseif($fin['stato_pratica']=="R"){?>
                                                        <span class="badge badge-danger m-1">Richiesta Respinta</span>
                                                    <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            <?php 
                                                if($fin['stato_pratica']=="A"){?>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Importo Finanziato</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$fin['imp_finanziato']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <?}?>
                                            
                                        
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
                                    <a class="nav-link active" data-toggle="tab" href="#tabe-7"><i class="fa fa-list"></i> <span class="hidden-xs"> Stato Pratica</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-8"><i class="fa fa-paperclip"></i> <span class="hidden-xs">Allegati</span></a>
                                </li>
                                
                                
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                <div id="tabe-7" class="container tab-pane active" style="max-width: 100%;">
                                    <div class="col-lg-10">
                                        <div class="card">
                                            <div class="card-body">
                                            <h5 class="card-title">Operazioni</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th>Data/User</th>
                                                        <th>Tipo</th>
                                                        <th>stato pratica</th>
                                                        <th>Contratto</th>
                                                        <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?=$fin['data_ins']?><br><?=$fin['user_ins']?> </td>
                                                            <td>Inserimento Pratica</td>
                                                            <td><span class="badge badge-warning m-1">In Lavorazione</span></td>
                                                            <td><?php if($fin['id_contratto']){?>
                                                                  rif # <?=$fin['id_contratto']?>
                                                            <?}else{?>
                                                                non presente
                                                            <?}?></td>
                                                            <td><?php if($fin['id_contratto']){?>
                                                                 
                                                            <button onclick="location.href='contrattoPage.php?id=<?=$fin['id_contratto']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Vai al contratto"> <i class="fa fa-book"></i> </button>
                                                            <?}else{?>
                                                                <button onclick="location.href='contrattoUpdate.php?action=insert&cliId=<?=$cli['id']?>&idFin=<?=$fin['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Stupila contratto"> <i class="fa fa-plus"></i></button>
                                                            <?}?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?=$fin['data_richiesta']?><br><?=$fin['user_ins']?></td>
                                                            <td>Richiesta Finanziamento</td>
                                                            <td><span class="badge badge-success m-1">Richiesta Inviata</span></td>
                                                            <td><?php if($fin['id_contratto']){?>
                                                                  rif # <?=$fin['id_contratto']?>
                                                            <?}?></td>
                                                            <td><?php if($fin['id_contratto']){?>
                                                                 
                                                            <button onclick="location.href='contrattoPage.php?id=<?=$fin['id_contratto']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Vai al contratto"> <i class="fa fa-book"></i> </button>
                                                            <?}else{?>
                                                                <button onclick="location.href='contrattoUpdate.php?action=insert&cliId=<?=$cli['id']?>&idFin=<?=$fin['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Stupila contratto"> <i class="fa fa-plus"></i></button>
                                                            <?}?></td>
                                                            
                                                        </tr>
                                                       
                                                       

                                                               
                                                            <tr>
                                                                <td><?=$fin['data_responso']?><br><?=$fin['user_responso']?></td>
                                                                <td>Responso Agos</td>
                                                                <td><?php
                                                                  if(!$fin['data_responso']){?>
                                                                   <span class="badge badge-warning m-1">In Lavorazione</span>
                                                                    <?}else{
                                                                            if($fin['stato_pratica']=="A"){?>  
                                                                        <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                                             <?}elseif($fin['stato_pratica']=="R"){?>
                                                                            <span class="badge badge-danger m-1">Richiesta Respinta</span>
                                                                            <?}
                                                                            }?>
                                                                      
                                                                </td>
                                                                <td><?php if($fin['id_contratto']){?>
                                                                    rif # <?=$fin['id_contratto']?>
                                                                <?}?></td>
                                                                <td>
                                                                    <button data-toggle="modal" data-target="#successmodal"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Aggiorna Pratica"> <i class="fa fa-refresh"></i></button>
                                                                </td>
                                                            
                                                            </tr>
                                                      

                                                    </tbody>
                                                    </table>
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
                                                                        <h5 class="modal-title text-white">Nuovo Allegato Pratica #<?=$fin['id_pratica']?></h5>
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
                                                                                    <option value="IP">Copia Invio Pratica</option>
                                                                                    <option value="RP">Responso Pratica</option>
                                                                                    <option value="IS">Copia/Ricevuta Bonifico Importo Saldo</option>
                                                                                    <option value="IE">Copia/Ricevuta Importo Estinzione</option>

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
                                                            <?php
                                                                    if($allcli){
                                                                        foreach ($allcli as $allecli) {?>
                                                                            <tr class="<?=$allecli['id']?>">
                                                                                <td><?=date("d/m/Y H:i", strtotime($allecli['data_ins']))?><br><?=$allecli['user_ins']?></td>
                                                                                <td><?php
                                                                                        if($allecli['tipo'] =="CI"){echo "Documento di Riconoscimento";};
                                                                                        if($allecli['tipo'] =="CF"){ echo "Tessera Sanitaria/Codice Fiscale";};
                                                                                        if($allecli['tipo'] =="DR"){ echo "Documentazione di Reddito";};
                                                                                       
                                                                                       
                                                                                    


                                                                                    ?></td>
                                                                                <td><?=$allecli['descrizione']?></td>
                                                                                <td><button type="button" onclick="window.open('<?=$allecli['percorso'].$allecli['nome_file']?>', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,left=500,width=800,height=800')" class="btn btn-success m-1" title="Visualizza Allegato"> <i class="fa fa-file"></i> </button>
                                                                                    <button type="button" onclick="delAll(<?=$allecli['id']?>,'delAllegatocli','<?=$allecli['nome_file']?>')" class="btn btn-danger m-1" title="Elimina Allegato"> <i class="fa fa-trash-o"></i> </button>
                                                                                </td>
                                                                            </tr>
                                                                           
                                                                 <?       }
                                                                    }
                                                                ?>
                                                                <?php
                                                                    if($all){
                                                                        foreach ($all as $alle) {?>
                                                                            <tr class="<?=$alle['id']?>">
                                                                                <td><?=date("d/m/Y H:i", strtotime($alle['data_ins']))?><br><?=$alle['user_ins']?></td>
                                                                                <td><?php
                                                                                        
                                                                                        if($alle['tipo'] =="IP"){ echo  "Copia Invio Pratica";};
                                                                                        if($alle['tipo'] =="RP"){ echo  "Responso Pratica";};
                                                                                        if($alle['tipo'] =="IS"){ echo  "Copia/Ricevuta Bonifico Importo Saldo";};
                                                                                        if($alle['tipo'] =="IE"){ echo  "Copia/Ricevuta Importo Estinzione";};
                                                                                       
                                                                                    


                                                                                    ?></td>
                                                                                <td><?=$alle['descrizione']?></td>
                                                                                <td><button type="button" onclick="window.open('<?=$alle['percorso'].$alle['nome_file']?>', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,left=500,width=800,height=800')" class="btn btn-success m-1" title="Visualizza Allegato"> <i class="fa fa-file"></i> </button>
                                                                                    <button type="button" onclick="delAll(<?=$alle['id']?>,'delAllegato','<?=$alle['nome_file']?>')" class="btn btn-danger m-1" title="Elimina Allegato"> <i class="fa fa-trash-o"></i> </button>
                                                                                </td>
                                                                            </tr>
                                                                           
                                                                 <?       }
                                                                    }
                                                                ?>
                                                        </tbody>
                                                       
                                                    </table>
                                                </div>      
                                            </div>
                                        
                                        </div>                                </div>
                                <div id="tabe-9" class="container tab-pane fade" style="max-width: 100%;">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                                </div>
                            </div>
                        </div>

                    
                </div>     
			</div>
        </div> 
    </div>
</div>  
                <div class="modal fade" id="successmodal" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-success">
                      <div class="modal-header bg-success">
                        <h5 class="modal-title text-white">Aggiorna Pratica</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form action="controller/updateFinanziamenti.php" method="post">
                            <input type="hidden" name="action" value="upStato"> 
                            <input type="hidden" name="id" value="<?=$fin['id']?>"  > 
                            <input type="hidden" name="id_contratto" value="<?=$fin['id_contratto']?>"  >  
                            <input type="hidden" name="id_pratica" value="<?=$fin['id_pratica']?>">   
                            <input type="hidden" name="id_fin" value="<?=$fin['id_finanziaria']?>">                                          

                      <div class="modal-body">
                      
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Pratica</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                      Data  <b><?=$fin['data_richiesta']?></b><br>
                                                      Numero Pratica <b><?=$fin['id_pratica']?></b><br>
                                                      Utente <b><?=$fin['user_ins']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Stato Precedente</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                    <?php if($fin['stato_pratica']=="I"){?>
                                                        <span class="badge badge-warning m-1">In Lavorazione</span>
                                                    <?}elseif($fin['stato_pratica']=="A"){?>  
                                                        <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                    <?}elseif($fin['stato_pratica']=="R"){?>
                                                        <span class="badge badge-danger m-1">Richiesta Respinta</span>
                                                    <?}?>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Cambia Stato</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                        <select required class="form-control form-control-sm" id="stato_pratica" name="stato_pratica">
                                                            <option value="">Seleziona stato Pratica</option>
                                                            <option value="A" <?=$fin['stato_pratica']=="A"?'selected':''?>>Accettata</option>
                                                            <option value="R" <?=$fin['stato_pratica']=="R"?'selected':''?>>Respinta</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Data Responso</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                            <input required value="<?=$fin['data_responso']?>" id="data_responso" name="data_responso"type="date" class="form-control" max="<?=date("Y-m-d")?>">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Importo Finanziato</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                            <input required value="<?=$fin['imp_finanziato']?>" id="imp_finanziato" name="imp_finanziato"type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Aggiorna</button>
                      </div>
                    </form>

                    </div>
                  </div>
                </div>          
