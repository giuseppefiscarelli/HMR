<?php
//var_dump($contr);
//var_dump($cli);
$motosel = getMotosel($contr['id_veicolo']);
?>
<div class="row">
    <div class="col-12">

        <div class="card" style=" background-color: #dee2e68c;"> <!-- main card-->
            <div class="card-header" style="background-color: lightgray;box-shadow:inset 0px 0px 12px 0px black">
                <div class="row">
                    <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;"><?php
                                                                                              if($contr['tipo']==="B"){echo "Bozza #".$contr['id'];}
                                                                                              if($contr['tipo']==="P"){echo "Preventivo #".$contr['num_cont']."_".date("Y");}
                                                                                              if($contr['tipo']==="C"){echo "Contratto #".$contr['num_cont']."_".date("Y");}      
                                                                                        ?></h3>
                    </div>
                    <div class="col-md-8"> 
                        <div> 
                            <button style="float: right;margin-left:10px;" type="reset" class="btn btn-warning" onclick="history.back();return false;" value="Annulla">
                            <i class="fa fa-undo fa-2x"></i> <span style="vertical-align: super;">Indietro</span>
                            </button>
                        </div>  
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
                            
                            <div>   
                                <button style="float: right;margin-left:10px;" class="btn btn-danger" onclick="if(confirm('Cancellare questo record?')) document.location.href='<?=$deleteUrl?>?id=&action=delete'">
                                <i class="fa fa-trash fa-2x"></i> <span style="vertical-align: super;">Elimina  </span>
                                
                                </button>
                            </div>
                    </div>
                </div>
            </div>
            
  
            <div class="card-body">
                <div class="row" style="margin:0px;">
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
                </div>

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
                            

                                <div class=" col-12"  > <!-- scheda veicolo-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" style="display:inline;">Modello</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                    <b><?=$motosel['descrizione']?></b>   
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Colore</h6>
                                                    </div>
                                                    <div class="date">
                                                    <b><?=$motosel['des_col']?></b>   
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" style="display:inline;">Prezzo IVA Escl </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$contr['imp_veicolo_siva']?></b> 
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Immatricolazione </h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$contr['imp_imma']?></b>   
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Iva</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                        <b><?= str_replace(".",",",$contr['iva'])?> %</b> 
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Prezzo su Strada IVA Incl</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$contr['imp_veicolo_iva']?></b>   
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
                            <div class="card-header" style="font-size:large;"><i class="fa fa-eur"></i> Riepilogo ImporTi
                            </div>
                            <div class="card-body">
                            

                                <div class=" col-12"  > <!-- scheda veicolo-->
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" style="display:inline;">Prezzo su Strada IVA inclusa</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                    <b class="importi" style="color:green;"><?=$contr['imp_veicolo_iva']?></b>  
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Importo Sconto Veicolo</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi" style="color:red;"><?=$contr['imp_sconto']?></b> <br> <b style="color:red;"><?=$contr['per_sconto']>0?str_replace(".",",",$contr['per_sconto']).' %':''?></b>   
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Totale Veicolo Scontato</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi" style="color:green;"><?=$contr['tot_scontato']?></b> 
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" style="display:inline;">Importo Accessori </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi" style="color:green;"><?=$contr['imp_accessori']?></b>  
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item " style="display:<?=$contr['permuta']?'':'none'?>">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                     <h6 class="mb-0" style="display:inline;">Importo Permuta </h6>
                                                    </div>
                                                   
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi" style="color:green;"><?=$contr['imp_permuta']?></b>  
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Prezzo Finale</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"  style="color:green;"><?=$contr['imp_finale']?></b>  
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            
                                            
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Caparra Confirmatoria</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"><?=$contr['imp_caparra']?></b>  
                                                       
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <h6>Importo Residuo</h6>
                                                    </div>
                                                    <div class="date"  style="text-align: right;">
                                                    <b class="importi"  style="color:red;"><?=$contr['imp_residuo']?></b>  
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        
                                        </ul>
                                                          
                                </div>

                            </div>
                        </div>
                        

                    </div>
                   
                </div> <!-- end row card body-->
                        <div class="row"> <!--row tab-->
							<div class="card-body"> <!--card-body-tab-->
								<ul class="nav nav-tabs nav-tabs-danger top-icon" id="myTab">
									<li class="nav-item"><a class="nav-link active" id="pagamento-tab" data-toggle="tab" href="#pagamento" aria-controls="pagamento" aria-selected="true"><i class="fa fa-bank"></i> Pagamento</a></li>
									<li class="nav-item"><a class="nav-link"  id="accessori-tab" data-toggle="tab" href="#accessori" aria-controls="accessori" aria-selected="false"><i class="fa fa-plus"></i> Accessori</a></li>
									<li class="nav-item"><a class="nav-link"  id="allegati-tab" data-toggle="tab" href="#allegati" aria-controls="allegati" aria-selected="false"><i class="fa fa-paperclip"></i> Allegati</a></li>
                                    <li class="nav-item"><a class="nav-link"  id="permuta-tab" data-toggle="tab" href="#permuta" aria-controls="permuta" aria-selected="false"><i class="fa fa-motorcycle"></i> Permuta</a></li>
                                    <?php
                                    if($fin){?>
                                    <li class="nav-item"><a class="nav-link"  id="finanziamento-tab" data-toggle="tab" href="#finanziamento" aria-controls="finanziamento" aria-selected="false"><i class="fa fa-bank"></i> Finanziamento</a></li>
                                    <?}?> 
                                </ul>
								<div class="tab-content " id="myTabContent" style="background-color:white;">
								
									<div class="container tab-pane fade active show" id="pagamento" style="margin-left:0px;">
										<div class="row">
											
											<div class="col-lg-4">
												<div class="card">
													<div class="card-header text-uppercase">Dettagli</div>

													<div class="card-body">
                                                        <ul class="list-group ">
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Tipologia Pagamento Saldo</h6>
                                                                    </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b><?php
                                                                            if($contr['tip_saldo']=="B"){
                                                                                echo "Bonifico";
                                                                            }
                                                                            if($contr['tip_saldo']=="F"){
                                                                                echo "Finanziamento";
                                                                            }
                                                                            if($contr['tip_saldo']=="A"){
                                                                                echo "Assegno";
                                                                            }
                                                                        ?></b>
                                                                        <?php
                                                                        if($contr['tip_saldo']=="F"){
                                                                            if($fin){
                                                                            foreach($fin as$f){
                                                                                $tabfin = getFintab($f['id_finanziaria']);
                                                                             if($f['stato_pratica']=="I"){?>
                                                                                <br>
                                                                                <span class="badge badge-warning m-1"> Pratica In Lavorazione</span>
                                                                            <?}elseif($f['stato_pratica']=="A"){?>
                                                                            <br>
                                                                                <span class="badge badge-success m-1"> Pratica Accettata</span>
                                                                            <?}elseif($f['stato_pratica']=="R"){?>
                                                                            <br>
                                                                                <span class="badge badge-danger m-1">  Pratica Respinta</span>
                                                                            
                                                                           <?}
                                                                            }
                                                                            }else{?>
                                                                            <br>
                                                                                <span class="badge badge-danger m-1">  Pratica non presente</span>
                                                                                <button type="button" class="btn btn-success m-1" title="inserisci pratica"> <i class="fa fa-plus"></i> </button>


                                                                   <? }
                                                                        }
                                                                        
                                                                        ?>
                                                                        </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Tipologia Pagamento Caparra</h6>
                                                                    </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b>
                                                                        <?php
                                                                            if($contr['tip_caparra']=="B"){
                                                                                echo "Bonifico";
                                                                            }
                                                                            if($contr['tip_caparra']=="C"){
                                                                                echo "Contanti";
                                                                            }
                                                                            if($contr['tip_caparra']=="A"){
                                                                                echo "Assegno";
                                                                            }
                                                                        ?> 
                                                                        </b>
                                                                        </div>
                                                                </div>
                                                            </li>																											
                                                        </ul>					
													</div>

												</div>
											</div>
                                            <div class="col-lg-8">
												<div class="card">
													<div class="card-header text-uppercase">Documenti / Ricevute</div>

													<div class="card-body">
                                                        <div class="table-responsive col-12">
                                                            <table class="table table-sm"  id="alle_table2">
                                                                    <thead>
                                                                        <tr>								              
                                                                                                                        
                                                                           
                                                                            <th>Tipo</th>
                                                                            <th>Descrizione</th>
                                                                            <th>Data/Valuta</th>
                                                                            <th>Stato</th>
                                                                           
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            if($all){
                                                                                foreach ($all as $alle) {
                                                                                    if($alle['tipo']!=="CI"&&$alle['tipo']!=="CF"&&$alle['tipo']!=="DR"){
                                                                                    ?>
                                                                                    <tr class="<?=$alle['id']?>">
                                                                                        
                                                                                        <td><?php
                                                                                                if($alle['tipo'] =="CI"){echo "Documento di Riconoscimento";};
                                                                                                if($alle['tipo'] =="CF"){ echo "Tessera Sanitaria/Codice Fiscale";};
                                                                                                if($alle['tipo'] =="DR"){ echo "Documentazione di Reddito";};
                                                                                                if($alle['tipo'] =="BS"){ echo "Copia/Ricevuta Bonifico Saldo";};
                                                                                                if($alle['tipo'] =="AS"){ echo "Copia/Ricevuta Assegno Saldo";};
                                                                                                if($alle['tipo'] =="BC"){ echo "Copia/Ricevuta Bonifico Caparra";};
                                                                                                if($alle['tipo'] =="AC"){ echo "Copia/Ricevuta Assegno Caparra";};
                                                                                            


                                                                                            ?></td>
                                                                                        <td><?=$alle['descrizione']?></td>
                                                                                        <td><?=date("d/m/Y", strtotime($alle['scadenza']))?><br><b class="importi"><?=$alle['importo']?></b></td>
                                                                                        <td class="stato_<?=$alle['id']?>"><?php
                                                                                              
                                                                                                if($alle['tipo'] =="BS"){ $tipo_allegato="Bonifico Saldo";};
                                                                                                if($alle['tipo'] =="AS"){ $tipo_allegato= "Assegno Saldo";};
                                                                                                if($alle['tipo'] =="BC"){ $tipo_allegato= "Bonifico Caparra";};
                                                                                                if($alle['tipo'] =="AC"){ $tipo_allegato= "Assegno Caparra";};
                                                                                                if($alle['stato_importo']=='N'){?>
                                                                                                 <span class="badge badge-pill badge-warning m-1">Non Incassato</span> <button type="button" onclick="incImporto('<?=$alle['id']?>','<?=$tipo_allegato?>');" class="btn btn-success btn-sm m-1"><i aria-hidden="true" class="fa fa-money"> Incassa</i></button>
                                                                                            <?
                                                                                                } if($alle['stato_importo']=='I'){?>
                                                                                                  <span class="badge badge-pill badge-success m-1">Incassato</span>
                                                                                                <? } ?>
                                                                                            </td>
                                                                                    </tr>
                                                                                
                                                                        <?      
                                                                                    }
                                                                                }
                                                                            }
                                                                        ?>
                                                                </tbody>
                                                            
                                                            </table>
                                                        </div>   								
													</div>

												</div>
											</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
												<div class="card">
													<div class="card-header text-uppercase">Cronologia Operazioni</div>
                                                        <div class="row">
                                                            <div class="card-body">
                                                                <div class="table-responsive col-9">
                                                                    <table class="table table-sm" id="cron_table" >
                                                                        <thead>
                                                                            <tr>								              
                                                                                                                            
                                                                                <th>Data Operazione</th>
                                                                                <th>Tipo</th>
                                                                                <th>Descrizione</th>
                                                                                <th>Tipo Importo</th>
                                                                                <th>Importo</th>
                                                                                <th>Stato</th>	
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                <tr>
                                                                                    <td><?=date("d/m/Y H:i", strtotime($contr['data_ins']))?><br><?=$contr['user_ins']?></td>
                                                                                    <td>Inserimento </td>
                                                                                    <td><?php if($contr['tipo']==="C"){echo "Contratto ";} ?></td>
                                                                                    <td  style="text-align: right;">Caparra<br>Saldo<br>Residuo  </td>
                                                                                    <td style="text-align: right;"><b class="importi"><?=$contr['imp_caparra']?></b><br><b class="importi"><?=$contr['imp_saldo']?></b><br><b class="importi"><?=$contr['imp_residuo']?></b></td>
                                                                                    <td><?php if ($contr['stato_caparra']=='N'){?>
                                                                                        <span class="badge badge-pill badge-danger m-1">Non Incassato</span>
                                                                                        <?}if($contr['stato_caparra']=='I'){?>
                                                                                        <span class="badge badge-pill badge-success m-1">Incassato</span>
                                                                                        <?}?>
                                                                                        <br><?php if ($contr['stato_saldo']=='N'){?>
                                                                                            <span class="badge badge-pill badge-danger m-1">Non Incassato</span>
                                                                                        <?}if($contr['stato_saldo']=='I'){?>
                                                                                            <span class="badge badge-pill badge-success m-1">Incassato</span>
                                                                                        <?}if($contr['stato_saldo']=='P'){?>
                                                                                            <span class="badge badge-pill badge-warning m-1">Incassato Parziale</span>
                                                                                        <?}?>
                                                                                        
                                                                                        </td>    
                                                                                    

                                                                                </tr>


                                                                                <?php
                                                                                 
                                                                                $cron = getCron($contr['id']);
                                                                               // var_dump($cron);
                                                                                    if ($cron){
                                                                                        foreach ($cron as $c) {?>
                                                                                <tr>
                                                                                            <td><?=date("d/m/Y H:i", strtotime($c['data_ins']))?><br><?=$c['user_ins']?></td>
                                                                                            <td><?php
                                                                                            if($c['tipo_a'] =="BS"){ echo "Bonifico Saldo";};
                                                                                            if($c['tipo_a'] =="AS"){ echo "Assegno Saldo";};
                                                                                            if($c['tipo_a'] =="BC"){ echo"Bonifico Caparra";};
                                                                                            if($c['tipo_a'] =="AC"){ echo "Assegno Caparra";};
                                                                                            ?></td>
                                                                                            <td><?=$c['descrizione']?></td>
                                                                                            <td  style="text-align: right;"><?php
                                                                                            if($c['tipo_a'] =="BS"||$c['tipo_a'] =="AS"){ echo "Saldo";};
                                                                                            if($c['tipo_a'] =="BC" ||$c['tipo_a'] == "AC"){ echo "Caparra";};
                                                                                          
                                                                                            ?></td>
                                                                                            <td style="text-align: right;"><b class="importi"><?=$c['importo_a']?></td>
                                                                                            <td><?php if ($c['stato_a']=='N'){?>
                                                                                                <span class="badge badge-pill badge-warning m-1">Non Incassato</span>
                                                                                                <?}if($c['stato_a']=='I'){?>
                                                                                                <span class="badge badge-pill badge-success m-1">Incassato</span>
                                                                                                <?}?></td>
                                                                                
                                                                                
                                                                                </tr>             

                                                                                <?        } 
                                                                                    }
                                                                                ?>
                                                                                



                                                                        </tbody>
                                                                    </table>        
                                                                </div>
                                                            </div>
                                                        </div>
													
                                                </div>
											</div>
                                        </div>
									</div>
									
									<div class="container tab-pane fade" id="accessori" style="margin-left:0px;">
										
																										
													
														
													
												
                                        <?php if($acc){
                                              $idacc = intval($contr['id']);
                                              $sumAcc = sumAccessori($idacc);
                                            
                                            ?>                                            
                                            <div class="row">				
                                                <div class="col-8">
                                                    <div class="card">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm" id="acc_table" style="">
                                                                <thead>
                                                                    <tr>								              
                                                                        <th></th>								             
                                                                        <th style="font-size: 10px;">Codice</th>
                                                                        <th style="font-size: 10px;width:400px;">Descrizione</th>
                                                                        <th style="font-size: 10px;width:80px;">Quantita'</th>
                                                                        <th style="font-size: 10px;width:35px;">UdM</th>
                                                                        <th style="font-size: 10px;">Prezzo</th>
                                                                        
                                                                        <th style="font-size: 10px;">Totale</th>
                                                                        <th></th>	
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    foreach ($acc as $ac ){?>
                                                                    <tr>
                                                                        <td><?=$ac['id_row']?></td>
                                                                        <td><?=$ac['codice']?></td>
                                                                        <td><?=$ac['descrizione']?></td>
                                                                        <td><?=$ac['qnt']?></td>
                                                                        <td>PZ   </td>
                                                                        <td><b class="importi"><?=$ac['prezzo_siva']?></b> iva escl<br><b class="importi"><?=$ac['prezzo_iva']?></b> iva incl</td>
                                                                        <td><b class="importi"><?=$ac['tot_siva']?></b> iva escl<br><b class="importi"><?=$ac['tot_iva']?></b> iva incl</td>
                                                                    </tr>  
                                                                <? }
                                                                    ?>
                                                                    
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="6" style="text-align: right;">Totale Accessori (iva inclusa) </td>
                                                                        <td><b class="importi"><?=$sumAcc["SUM(tot_iva)"]?></b></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                            
                                                </div>
                                            </div>              
                                        <?}else{?> 
                                            <div class="row">
                                                <div class="card-body col-6">
                                                    <div class="alert alert-icon-info col-6 " role="alert">
                                                            
                                                            <div class="alert-icon icon-part-info">
                                                            <i class="fa fa-bell"></i>
                                                            </div>
                                                            <div class="alert-message">
                                                            <span> Non sono presenti Accessori</span>
                                                            </div>
                                                    </div> 
                                                </div>        
                                                           
                                                        
                                                
                                            </div>
                                        <?}?>                               
									</div>
									                            
                                    <div class="container tab-pane fade" id="allegati" style="margin-left:0px;">
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
                                                    <button class="btn btn-outline-success btn-block m-1" id="addAll" data-toggle="modal" data-target="#allemodal" ><i class="fa fa-plus"></i> Aggiungi Allegato</button>
                                                        <div class="modal fade" id="allemodal" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content border-info">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title text-white">Nuovo Allegato Contratto #<?=$contr['id']?></h5>
                                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="id_contratto" value="<?=$contr['id']?>">
                                                                        <input type="hidden" id="id_cliente" value="<?=$contr['id_cliente']?>">
                                                                        <div class="form-group row">
                                                                            <label for="tipo_alle" class="col-sm-4 col-form-label">Tipologia Allegato</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control form-control-sm" id="tipo_alle" required>
                                                                                    <option value="">Seleziona tipo Documento</option>
                                                                                    <option value="CI">Documento di Riconoscimento</option>
                                                                                    <option value="CF">Tessera Sanitaria/Codice Fiscale</option>
                                                                                    <option value="DR">Documentazione di Reddito</option>
                                                                                    <option value="BS">Copia/Ricevuta Bonifico Saldo</option>
                                                                                    <option value="AS">Copia/Ricevuta Assegno Saldo</option>
                                                                                    <option value="BC">Copia/Ricevuta Bonifico Caparra</option>
                                                                                    <option value="AC">Copia/Ricevuta Assegno Caparra</option>

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
                                                                    if($all){
                                                                        foreach ($all as $alle) {?>
                                                                            <tr class="<?=$alle['id']?>">
                                                                                <td><?=date("d/m/Y H:i", strtotime($alle['data_ins']))?><br><?=$alle['user_ins']?></td>
                                                                                <td><?php
                                                                                        if($alle['tipo'] =="CI"){echo "Documento di Riconoscimento";};
                                                                                        if($alle['tipo'] =="CF"){ echo "Tessera Sanitaria/Codice Fiscale";};
                                                                                        if($alle['tipo'] =="DR"){ echo "Documentazione di Reddito";};
                                                                                        if($alle['tipo'] =="BS"){ echo "Copia/Ricevuta Bonifico Saldo";};
                                                                                        if($alle['tipo'] =="AS"){ echo "Copia/Ricevuta Assegno Saldo";};
                                                                                        if($alle['tipo'] =="BC"){ echo "Copia/Ricevuta Bonifico Caparra";};
                                                                                        if($alle['tipo'] =="AC"){ echo "Copia/Ricevuta Assegno Caparra";};
                                                                                    


                                                                                    ?></td>
                                                                                <td><?=$alle['descrizione']?></td>
                                                                                <td><button type="button" onclick="window.open('<?=$alle['percorso'].$alle['nome_file']?>');"class="btn btn-success m-1" title="Visualizza Allegato"> <i class="fa fa-file"></i> </button>
                                                                                    <button type="button" onclick="delAll(<?=$alle['id']?>)" class="btn btn-danger m-1" title="Elimina Allegato"> <i class="fa fa-trash-o"></i> </button>
                                                                                </td>
                                                                            </tr>
                                                                           
                                                                 <?       }
                                                                    }
                                                                ?>
                                                        </tbody>
                                                       
                                                    </table>
                                                </div>      
                                            </div>
                                        
                                        </div>       

                                    </div> 
                                    <div class="container tab-pane fade" id="permuta" style="margin-left:0px;">
                                        <div class="row">
                                            <div class="card-body col-6">
                                             <?php 
                                             if($permuta){
                                             ?>                       
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Intestatario</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b><?=$permuta['intestatario']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Targa</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b ><?=$permuta['targa']?></b>  
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Marca</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b><?=$permuta['marca']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Modello</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b ><?=$permuta['modello']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Anno</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b ><?=$permuta['anno']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">KM</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b><?=$permuta['km']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Stima</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b class="importi"><?=$permuta['stima']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        <h6 class="mb-0" style="display:inline;">Note</h6>
                                                        
                                                        </div>
                                                        <div class="date" style="text-align: right;">
                                                            <b><?=$permuta['note']?></b>  
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> 
                                             <?}else{?> 
                                                <div class="alert alert-icon-info col-6 " role="alert">
                                                    
                                                        <div class="alert-icon icon-part-info">
                                                        <i class="fa fa-bell"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                        <span>Non è presente alcuna Permuta.</span>
                                                        </div>
                                                </div>
                                            <div class="row ">
                                                
                                                        
                                                            
                                                            <div class="col-6">
                                                            
                                                                <button class="btn btn-outline-success btn-block m-1" id="addPer" data-toggle="modal" data-target="#allepermuta" ><i class="fa fa-plus"></i> Aggiungi Permuta</button>
                                                            </div>    
                                            </div>
                                        <?}?>   
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <?php
                                    if($fin){?>
                                    <div class="container tab-pane fade" id="finanziamento" style="margin-left:0px;">
                                        <div class="row">
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
                                                                            Data  <b><?=$f['data_ins']?></b><br>
                                                                            Utente <b><?=$f['user_ins']?></b>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="media align-items-center">
                                                                            <div class="media-body ml-3">
                                                                            <h6 class="mb-0">Pratica Agos</h6>
                                                                            </div>
                                                                            <div class="date">
                                                                            Numero <b><?=$f['id_pratica']?></b><br>
                                                                            Data <b><?=$f['data_richiesta']?></b><br>
                                                                            Stato  <?php if($f['stato_pratica']=="I"){?>
                                                                                <span class="badge badge-warning m-1">In Lavorazione</span>
                                                                            <?}elseif($f['stato_pratica']=="A"){?>  
                                                                                <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                                            <?}elseif($f['stato_pratica']=="R"){?>
                                                                                <span class="badge badge-danger m-1">Richiesta Respinta</span>
                                                                            <?}?>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                   
                                                                    
                                                                
                                                                </ul>
                                                                                
                                                        </div>

                                                    </div>
                                                </div>
                                                

                                            </div>
                                        </div> 
                                        <div class="row">
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
                                                                
                                                                <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?=$f['data_ins']?><br><?=$f['user_ins']?> </td>
                                                                    <td>Inserimento Pratica</td>
                                                                    <td><span class="badge badge-warning m-1">In Lavorazione</span></td>
                                                                    
                                                                    <td><button onclick="location.href='finanziamentoPage.php?id=<?=$f['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Vai alla Pratica"> <i class="fa fa-book"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?=$f['data_richiesta']?><br><?=$f['user_ins']?></td>
                                                                    <td>Richiesta Finanziamento</td>
                                                                    <td><span class="badge badge-success m-1">Richiesta Inviata</span></td>
                                                                    
                                                                    <td><button onclick="location.href='finanziamentoPage.php?id=<?=$f['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Vai alla Pratica"> <i class="fa fa-book"></i></button>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            
                                                            

                                                                    
                                                                    <tr>
                                                                        <td><?=$f['data_responso']?><br><?=$f['user_responso']?></td>
                                                                        <td>Responso Agos</td>
                                                                        <td><?php
                                                                        if(!$f['data_responso']){?>
                                                                        <span class="badge badge-warning m-1">In Lavorazione</span>
                                                                            <?}else{
                                                                                    if($f['stato_pratica']=="A"){?>  
                                                                                <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                                                    <?}elseif($f['stato_pratica']=="R"){?>
                                                                                    <span class="badge badge-danger m-1">Richiesta Respinta</span>
                                                                                    <?}
                                                                                    }?>
                                                                            
                                                                        </td><td>
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
                                    </div>
                                    <?}?>                                                     
                                </div> 	
							</div>	<!--end card-body-tab-->					
                        </div><!--end row tab-->
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
                            <input type="hidden" name="id" value="<?=$f['id']?>"  > 
                            <input type="hidden" name="redirect" value="<?=$pageShowUrl?>?id=<?=$id?>">                                           

                      <div class="modal-body">
                      
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Pratica</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                      Data  <b><?=$f['data_richiesta']?></b><br>
                                                      Numero Pratica <b><?=$f['id_pratica']?></b><br>
                                                      Utente <b><?=$f['user_ins']?></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Stato Precedente</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                    <?php if($f['stato_pratica']=="I"){?>
                                                        <span class="badge badge-warning m-1">In Lavorazione</span>
                                                    <?}elseif($f['stato_pratica']=="A"){?>  
                                                        <span class="badge badge-success m-1">Richiesta Accettata</span>
                                                    <?}elseif($f['stato_pratica']=="R"){?>
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
                                                            <option value="A" <?=$f['stato_pratica']=="A"?'selected':''?>>Accettata</option>
                                                            <option value="R" <?=$f['stato_pratica']=="R"?'selected':''?>>Respinta</option>
                                                            
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
                                                            <input required value="<?=$f['data_responso']?>" id="data_responso" name="data_responso"type="date" class="form-control" max="<?=date("Y-m-d")?>">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    
                                                    <h6 class="mb-0" >Importo Finanziato</h6>
                                                    
                                                    </div>
                                                    <div class="date" style="text-align: right;">
                                                            <input required value="<?=$f['imp_finanziato']?>" id="imp_finanziato" name="imp_finanziato"type="number" class="form-control">
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

