<div class="row">
    <div class="col-12">

        <div class="card" style=" background-color: #dee2e68c;"> <!-- main card-->
            <div class="card-header" style="background-color: lightgray;box-shadow:inset 0px 0px 12px 0px black">
                <div class="row">
                    <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">TestRide #<?=$tr['id']?></h3>
                    </div>
                    <div class="col-md-8"> 
                        <div> 
                            <button style="float: right;margin-left:10px;" type="reset" class="btn btn-warning" onclick="history.back();return false;" value="Annulla">
                            <i class="fa fa-undo fa-2x"></i> <span style="vertical-align: super;">Indietro</span>
                            </button>
                        </div>  
                        <div> 
                            <button style="float: right;margin-left:10px;display:<?=$tr['data_cons']?'':'none'?>;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">
                            <i class="fa fa-print fa-2x"></i> <span style="vertical-align: super;">Stampa Report</span>
                            </button>
                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <button type="button" tabindex="0" class="dropdown-item" onclick="prtPdf()">Stampa Modulo Consegna Veicolo</button>
                                <button style="<?=$tr['data_ricons']?'':'display:none'?>;" type="button" tabindex="0" class="dropdown-item" onclick="prtPdf2()">Stampa Modulo Riconsegna</button>
                               
                                <div tabindex="-1" class="dropdown-divider"></div>
                                    <button style="<?=$tr['data_ricons']?'':'display:none'?>;" type="button" tabindex="0" class="dropdown-item" onclick="prtPdf3()">Stampa Report TestRide Integrale</button>
                                
                                </div>
                                
                            </div>
                            <div> 
                                <button style="float: right;margin-left:10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-success">
                                    <i class="fa fa-cog fa-2x"></i> <span style="vertical-align: super;">Gestione </span>
                                </button>
                                <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a href="<?=$updateUrl?>?action=update&id=<?=$tr['id']?>" class="dropdown-item waves-effect waves-light"><i class="fa fa-edit"></i> Modifica Prenotazione</a>
                                    <a  tabindex="0" class="dropdown-item waves-effect waves-light" style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-sign-out" aria-hidden="true"></i> Gestione Consegna</a>
                                    <a style="<?=$tr['data_cons']?'':'display:none'?>;" tabindex="1" class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-4"><i class="fa fa-sign-in" aria-hidden="true"></i> Gestione Riconsegna</a>
                                </div>
                            </div>  
                            <div>   
                                <button style="float: right;margin-left:10px;" class="btn btn-danger" onclick="if(confirm('Cancellare questo record?')) document.location.href='<?=$deleteUrl?>?id=<?=$tr['id']?>&action=delete'">
                                <i class="fa fa-trash fa-2x"></i> <span style="vertical-align: super;">Elimina  </span>
                                
                                </button>
                            </div>
                    </div>
                </div>
            </div><!-- end card header-->
            <div class="card-body">
                <div class="row">
                            <div class="card col-12">
                                <div class="card-header" style="font-size:large;"><i class="fa fa-bar-chart"></i> Stato Attività
                                </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-12">
                                            <div class="media align-items-center">
                                                <div id="chart9"></div>
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-3 col-12">
                                            <div class="progress-wrapper mb-4">
                                                                <p>Procedura Consegna<span class="float-right"><?=$stcons?>%</span></p>
                                                                    <div class="progress" style="height:7px;">
                                                                        <div class="progress-bar gradient-ibiza" style="width:<?=$stcons?>%"></div>
                                                                    </div>
                                                            </div>

                                            <ul class="list-group list-group-flush shadow-none">
                                                
                                                <li class="list-group-item">         
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                <h6 class="mb-0"> 
                                                                <?php if($allCliente){?>

                                                                <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                            <?  }?>
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
                                                                    <?php if($tr['data_cons']){?>
                                                                    <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>
                                                                    <?}?>
                                                                    Consegna veicolo</h6>
                                                                </div>
                                                                <div class="date">
                                                                <?php if(!$tr['data_cons']){?>
                                                                    <button type="button" class="btn btn-outline-primary" style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-sign-out" aria-hidden="true"></i>Gestione Consegna </button>

                                                                    <?}?>
                                                                </div>

                                                            </div>
                                                </li>
                                                <li class="list-group-item">
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                
                                                                    <h6 class="mb-0">
                                                                    <?php if($consPrivacy){?>
                                                                    <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>
                                                                    <?}?>
                                                                    Consensi Privacy</h6>
                                                                </div>
                                                                <div class="date">
                                                            
                                                                <?php if(!$consPrivacy){?>
                                                                        
                                                                    <button type="button" class="btn btn-outline-primary" style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-sign-out" aria-hidden="true"></i>Gestione Consegna </button>

                                                                    <?}?>
                                                                </div>

                                                            </div>
                                                </li>
                                               <!-- <li class="list-group-item">         
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0">
                                                                    <?php if($questTr){?>
                                                                        <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                                    <?}?>
                                                                    Questionario TestRide</h6>
                                                                </div>
                                                                <div class="date">
                                                                <?php if(!$questTr){?>
                                                                        
                                                                    <button type="button" class="btn btn-outline-primary" style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-sign-out" aria-hidden="true"></i>Gestione Consegna </button>
        
                                                                        <?}?>
                                                                </div>

                                                            </div>
                                                            
                                                        
                                                </li>-->
                                                <li class="list-group-item" style="<?=$stcons == 100?'':"display:none;"?>">
                                                                                                    
                                                            
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0">Report Consegna</h6>
                                                                </div>
                                                                <div class="date">
                                                                <?php
                                                                if( file_exists("docs/testride/report/".$tr['id']."_cons.pdf")){

                                                                
                                                                ?>
                                                                <button type="button"  id="btnPdf1" class="btn btn-danger m-1" onClick="btnPdf1();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                                                
                                                                <? }else{?>

                                                                    <button type="button" class="btn btn-outline-primary" onclick="prtPdf()"><i class="fa fa-print"> Stampa Modulo</i> </button>
                                                            <? } ?>
                                                                </div>

                                                            </div>
                                                </li>

                                                
                                            </ul>        
                                        </div> 
                                        <div class="col-lg-3 col-12">
                                            <div class="progress-wrapper mb-4">
                                                                <p>Procedura Riconsegna<span class="float-right"><?=$stricons?>%</span></p>
                                                                    <div class="progress" style="height:7px;">
                                                                        <div class="progress-bar gradient-ibiza" style="width:<?=$stricons?>%"></div>
                                                                    </div>
                                            </div>

                                            <ul class="list-group list-group-flush shadow-none" style="<?=$stcons==100?'':"display:none;"?>">
                                                <li class="list-group-item">
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                
                                                                    <h6 class="mb-0">
                                                                    <?php if($tr['data_ricons']){?>
                                                                    <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>
                                                                    <?}?>
                                                                    Riconsegna veicolo</h6>
                                                                </div>
                                                                <div class="date">
                                                                <?php if(!$tr['data_ricons']){?>
                                                                <a style="<?=$tr['data_cons']?'':'display:none'?>;"  class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-animation-4"><i class="fa fa-sign-in" aria-hidden="true"></i> Gestione </a>
                                                                <?}?>
                                                                </div>

                                                            </div>
                                                </li> 

                                                <li class="list-group-item">
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                
                                                                    <h6 class="mb-0">
                                                                    <?php
                                                              //  if( file_exists("docs/testride/sign/sign_quest_tr_".$tr['id'].".png")){
                                                                  if($question){
                                                                  ?>
                                                                    <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>
                                                                    Questionario HONDA</h6>
                                                                </div>
                                                                <div class="date">
                                                                <button type="button"class="btn btn-outline-primary " data-toggle="modal" data-target="#questmodal">Visualizza Risposte</button>

                                                                <?}else{
                                                                ?>
                                                                    Questionario HONDA</h6>
                                                                </div>
                                                                <div class="date">
                                                            
                                                                <a type="button" class="btn btn-outline-success" href="questionario.php?id=<?=$tr['id']?>" > <i aria-hidden="true" class="fa fa-pencil-square-o">Compila</i> </a>
                                                                <?}?>
                                                              
                                                                </div>

                                                            </div>
                                                </li> 
                                                <li class="list-group-item" style="<?=$stricons == 100?'':"display:none;"?>">
                                                                                                    
                                                            
                                                                                                    <div class="media align-items-center">
                                                                                                        <div class="media-body ml-3">
                                                                                                            <h6 class="mb-0">Report Completo</h6>
                                                                                                        </div>
                                                                                                        <div class="date">
                                                                                                        <?php
                                                                                                        if( file_exists("docs/testride/report/".$tr['id']."_full.pdf")){
                                            
                                                                                                        
                                                                                                        ?>
                                                                                                        <button type="button"  id="btnPdf3" class="btn btn-danger m-1" onClick="btnPdf3();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                                                                                        
                                                                                                        <? }else{?>
                                            
                                                                                                            <button type="button" class="btn btn-outline-primary" onclick="prtPdf3()"><i class="fa fa-print"> Stampa Modulo</i> </button>
                                                                                                    <? } ?>
                                                                                                        </div>
                                            
                                                                                                    </div>
                                                </li>  
                                            
                                            </ul> 
                                            <h6 style="<?=$stcons!==100?'':"display:none;"?>"> Completare Procedura Consegna</h6>       
                                        </div> 
                                    </div>

                            </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-5 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-user"></i> Dati Cliente
                            </div>
                            <div class="card-body">
                                <div class="input-group-prepend col-lg-12 col-md-12" style="display:<?=$tr['id_cliente']?'none':''?>">
                                    <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                    <input type="text" id="autocomplete" name="autocomplete"  value="" maxlength="16" placeholder="Inserisci / Scansione Codice Fiscale - Ricerca per Nome/Cognome - Ricerca per Email-cellulare" class="form-control ui-autocomplete-input"  autocomplete="off">       
                                </div>
                            <button type="button" class="btn btn-primary btn-block m-1" data-keyboard="false" data-backdrop="static" style="display:<?=$idCli?'none':''?>" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-user-plus"></i> Inserimento Nuovo Cliente </button>
                                    
                            

                                <div class=" col-12" id="datcli" <?=$idCli?'':'style="display:none;"'?>> <!-- scheda cliente-->
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
                                                    <?php if ($checkanagrcli){?>
                                                    <div class="alert alert-success alert-dismissible" role="alert" style="width:280px;">
                                                    
                                                            <div class="alert-icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="alert-message">
                                                            <span>Dati Anagrafici Completi</span>
                                                            </div>
                                                    </div>
                                                        <?}else{?> 
                                                    <div class="alert alert-warning alert-dismissible mb-0" style="width:280px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                            <div class="alert-icon">
                                                            <i class="fa fa-exclamation-triangle"></i>
                                                            </div>
                                                            <div class="alert-message">
                                                            <span><strong>Attenzione!</strong> Dati Anagrafici Incompleti!</span>

                                                            </div>
                                                    </div>  
                                                        <?}?> 
                                                
                                                </div>
                                                    <div class="date"  style="text-align: right;">
                                                    nato a <?=$cli['user_mod']?getComune($cli['luogonasc']):$cli['luogonasc']?>(<?=$cli['provnasc']?>)<br>il <?=date("d/m/Y", strtotime($cli['datanasc']))?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                    <div class="media align-items-center">
                                    <div class="media-body ml-3">
                                    <?php if ($checkrescli){?>
                                    <div class="alert alert-success alert-dismissible" role="alert"  style="width:190px;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Residenza Completi</span>
                                        </div>
                                    </div>
                                    <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#indirizzores').focus();},300);"style="width:px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Residenza Incompleti!</span>

                                            </div>
                                    </div>  
                                    <?}?> 
                                    </div>
                                    <div class="date"  style="text-align: right;">
                                    <?=$cli['indirizzores']?><br>
                                    <?=$cli['capres']?> - <?=$cli['user_mod']?getComune($cli['luogores']):$cli['luogores']?>(<?=$cli['provres']?>)
                                    </div>
                                    </div>
                                </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <?php if ($checkrescli){?>
                                                        <div class="alert alert-success alert-dismissible" role="alert"  style="width:190px;">
                                                        
                                                                <div class="alert-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                                <div class="alert-message">
                                                                <span>Dati Contatti Completi</span>
                                                                </div>
                                                        </div>
                                                    <?}else{?> 
                                                        <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#indirizzores').focus();},300);"style="width:280px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                                <div class="alert-icon">
                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                </div>
                                                                <div class="alert-message">
                                                                <span><strong>Attenzione!</strong> Dati Residenza Incompleti!</span>

                                                                </div>
                                                        </div>  
                                                    <?}?> 
                                                    </div>
                                                       <div class="date"  style="text-align: right;">
                                                        Email <?=$cli['mail1']?><br>
                                                        Cellulare <?=$cli['mobile1']?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                         <?php if($checkpat&&date("Y-m-d") < $patente['data_scadenza']){?>
                                                        <div class="alert alert-success alert-dismissible" role="alert" style="width:190px;">
                                       
                                                            <div class="alert-icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="alert-message">
                                                                <span>Dati Patente Completi</span>
                                                            </div>
                                                        </div>
                                                         <?}else{?> 
                                                        <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#data_rilascio_mod').focus();},300);" style="width:280px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                            <div class="alert-icon">
                                                                <i class="fa fa-exclamation-triangle"></i>
                                                            </div>
                                                            <div class="alert-message">
                                                                <span><strong>Attenzione!</strong> Dati Patente Incompleti!</span>

                                                            </div>
                                                        </div>  
                                                            <?}?>     
                                                    </div>
                                                    <div class="date" style="<?=$checkpat?'':'display:none;'?>text-align: right;">
                                                        numero <b><?=$patente['numero_patente']?></b> tipo <b><?=$patente['tipo_patente']?></b>
                                                        <br>    validità dal <b><?=date("d/m/Y", strtotime($patente['data_rilascio']))?></b><br> al <b><?=date("d/m/Y", strtotime($patente['data_scadenza']))?></b>
                                                        <br>rilasciata da <b><?=$patente['ente_rilascio']?></b>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                        <?php if($checkpatdoc){?>
                                    <div class="alert alert-success alert-dismissible" role="alert" style="width:280px;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Scansione Patente Presente</span>
                                        </div>
                                    </div>
                                 <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#patfront').focus();},300);"style="width:280px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Scansione Patente Non Presente!</span>

                                            </div>
                                    </div>  
                                    <?}?>    
                                    </div>
                                    <div class="date"  style="text-align: right;">
                                     
                                    </div>

                                    </div>
                                </li>
                                        
                                        </ul>
                                    <form id="addform" action="controller/updateTestride.php" method="post">   
                                        <input type="hidden" name="id_clientenew" id="id_cliente_new" value="<?=$cli['codfiscale']?>">
                                        <input type="hidden" name="idTr" value="<?=$tr['id']?>">
                                        <input type="hidden" name="action" value="storeTestridePage">
                                        <button type="button" class="btn btn-primary btn-block m-1" data-keyboard="false" data-backdrop="static" style="display:<?=$tr['id_cliente']?'none':''?>" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-edit"></i> Modifica dati Cliente </button>
                                        <button type="submit" id="saveMod"class="btn btn-success btn-block m-1" style="display:<?=$tr['id_cliente']?'none':''?>;" ><i class="fa fa-<?=$cli?'edit':'user-plus'?>"></i> Salva Modifiche Prenotazione</button>
                   
                                    </form>                        
                                </div>

                            </div>
                        </div>
                        

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-motorcycle"></i> Dati TestRide
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Motoveicolo</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$veicolo['marca']?> <?=$veicolo['modello']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Targa</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$veicolo['targa']?></b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <div class="card-header" style="font-size:large;"><i class="fa fa-calendar-check-o"></i> Dati Prenotazione
                            </div>	
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Consulente</h6>
                                            </div>
                                            <div class="date">
                                                <b> <?=$tr['user_pren']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Data/Ora</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$tr['data_pren']?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if($tr['data_pren']){ ?>    
                                    <li class="list-group-item" style="display:<?=$tr['data_cons']?'':'none'?>">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Consegna Moto</h6>
                                            </div>
                                            <div class="date">
                                                <i class="fa fa-calendar"></i> Data/Ora <b><?=$tr['data_cons']?></b><br>
                                                <i class="fa fa-user"></i> Consulente <b><?=$tr['user_cons']?></b><br>
                                                <i class="fa fa-sort-numeric-asc"></i> KM Consegna <b><?=$tr['km_cons']?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                    <?php if($tr['data_ricons']){ ?>         
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Riconsegna Moto</h6>
                                            </div>
                                            <div class="date">
                                                <i class="fa fa-calendar"></i> Data/Ora <b><?=$tr['data_ricons']?></b><br>
                                                <i class="fa fa-user"></i> Consulente <b><?=$tr['user_ricons']?></b><br>
                                                <i class="fa fa-sort-numeric-asc"></i> KM Consegna <b><?=$tr['km_ricons']?></b>
                                                <i class="fa fa-hourglass"></i> Durata <b><?=$tr['durata_test']?> minuti</b><br>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>            
                                </ul>
                            <div class="card-header" style="font-size:large;"><i class="fa fa-calendar-check-o"></i> Note Prenotazione
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            
                                            <div class="date">
                                                <b> <?=$tr['note_pren']?></b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>                        
                            </div>    
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                       

                       
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-motorcycle"></i> Archivio Report
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Consegna</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_cons.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf1" class="btn btn-danger m-1" onClick="btnPdf1();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Riconsegna</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_ricons.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf2" class="btn btn-danger m-1" onClick="btnPdf2();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>
                                            </div>
                                        </div>
                                    </li>
                               
                            	
                                
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Integrale</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_full.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf3" class="btn btn-danger m-1" onClick="btnPdf3();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>  
                                            </div>
                                        </div>
                                    </li>
                                   <?php
                                   if(!$question){?>
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Questionario</h6>
                                            </div>
                                            <div class="date">
                                            
                                            <a type="button" class="btn btn-success" href="questionario.php?id=<?=$tr['id']?>" style="float: right;"> <i aria-hidden="true" class="fa fa-pencil-square-o">Compila</i> </a>
                                            <br>
                                            <button type="button" onclick="sendeMail()" class="btn btn-primary" style="margin-top:5px;"> <i aria-hidden="true" class="fa fa-mail-forward"> Invia via mail</i> </button>

                                           
                                            </div>
                                        </div>
                                    </li>
                                   <?}?> 
                                </ul>           
                                    
                        </div>         
                    </div>
                </div> <!-- end row card body-->

            </div><!-- end card row-->
                <div class="modal fade" id="modal-animation-3" style="display: none;" aria-hidden="true">
                    <form enctype="multipart/form-data"  id="upform" action="controller/updateTestride.php" method="post"> 
                    <input type="hidden" id="id" name="id" value="<?=$tr['id']?>">
                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$checkanagrcli?$cli['id']:$idCli?>">
                    <input type="hidden" name="action" value ="storeTestrideCons">
                    <input type="hidden" name="signCode2" id="signCode2" value="">  
                        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 100%;padding:30px;">
                            <div class="modal-content animated slideInUp">
                                <div class="modal-header">
                                    <h5 class="modal-title">Consegna moto TestRide</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="display:<?=$checkpat&&$cfCli&&$tr['id_cliente']?'':'none'?>">
                                    <div class="row"            >
                                        <div class="col-12 col-lg-4"                >
                                            <div class="col-12  ">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-12 col-form-label">KM</label>
                                                    <div class="col-sm-2 col-12">
                                                    <input type="text" id="km" name="km_cons" class="form-control" value="<?=$tr['km_cons']?$tr['km_cons']:0.0?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="col-12  ">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">FotoReport</label>
                                                    <div class="col-sm-8">
                                                    <input type="file" id="report" name="freport"  class="" >
                                                    <textarea rows="3" class="form-control" id="basic-textarea" id="report1" name="report1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">FotoReport2</label>
                                                    <div class="col-sm-8">
                                                    <input type="file" id="report2" name="freport2"  class=""> 
                                                    <textarea rows="3" class="form-control" id="basic-textarea" id="report2" name="report2"></textarea>                                   </div>
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="col-lg-4 col-12">
                                            <div class="col-lg-4 col-12">
                                                                <!-- Small Size Modal -->
                                                                <a href="#termcondmodal" data-toggle="modal" data-target="#termcondmodal">Termini e Condizioni</a>
                                                                <!-- Modal -->
                                                                    
                                            </div> 
                                            <div class=col-12>

                                                <div class="row">
                                                    <table>	
                                                        <tbody>
                                                            <tr>
                                                                <td >
                                                                Il sottoscritto, in relazione all'informativa ricevuta ai sensi del Regolamento Europeo N. 679/2016 a quanto segue:</TD>
                                                            </TR>
                                                        </TBODY>
                                                    </TABLE>
                                                    <table>	
                                                        <tbody>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                                <b>1. Trattamento dei dati personali, riproduzione e pubblicazione immagini personali </b></TD>
                                                                                                                        
                                                                    

                                                            </TR>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                                da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda
                                                                Italia Industriale S.p.A. e dei soggetti ad essa legati per finalita' legate alla effettuazione e promozione 
                                                                dell'evento a cui si e' inteso partecipare, e per le altre finalita' citate nell'informativa contenuta nel sito ufficiale
                                                                (hondaitalia.com/privacy), in conformita' al Regolamento Europeo N. 679/2016 e s.m..i.</TD>
                                                            </TR>
                                                            <tr>
                                                                <td>
                                                                    
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv1" type="radio" id="priv1a" value="A" <?=$tr['priv1']=="A"?'checked=""':''?>>
                                                                        <label for="priv1a">Presto il Consenso</label>
                                                                    </div>
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv1" type="radio" id="priv1b" value="B" <?=$tr['priv1']=="B"?'checked=""':''?>>
                                                                        <label for="priv1b">Nego il Consenso</label>
                                                                    </div>
                                                                </td>
                                                            <tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                   
                                                    <table>	
                                                        <tbody>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                            <b>2. Comunicazione di promozioni, offerte, eventi ed inviti tramite e-mail</b></TD>
                                                                                                                        
                                                                    

                                                            </TR>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                            da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o
		                                                    Honda Italia Industriale S.p.A. e dei soggetti ad essa legati,incluse le comunicazioni su programmi
                                                            e concorsi, ricerche e analisi di mercato, inviate tramite posta elettronica in conformita' al Regolamento
                                                            Europeo N. 679/2016 e s.m.i.</TD>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv2" type="radio" id="priv2a" value="A" <?=$tr['priv2']=="A"?'checked=""':''?>>
                                                                        <label for="priv2a">Presto il Consenso</label>
                                                                    </div>
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv2" type="radio" id="priv2b" value="B" <?=$tr['priv2']=="B"?'checked=""':''?>>
                                                                        <label for="priv2b">Nego il Consenso</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                   
                                                    <table>	
                                                        <tbody>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                            <b>3. Comunicazione di promozioni, offerte, eventi ed inviti tramite sms, contatto telefonico e/o posta</b></TD>
                                                                                                                        
                                                                    

                                                            </TR>
                                                            <tr>
                                                            <td style="text-align:justify;font-size:10px;">
                                                            da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia
		                                                     Industriale S.p.A. e dei soggetti ad essa legati,incluse le comunicazioni su programmi e concorsi, ricerche e 
		                                                    analisi di mercato, effettuate via sms, telefono e/o posta in conformita' al Regolamento Europeo N.679/2016 e s.m.i.</TD>

                                                            </TR>
                                                            <tr>
                                                                <td>
                                                                    
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv3" type="radio" id="priv3a" value="A" <?=$tr['priv3']=="A"?'checked=""':''?>>
                                                                        <label for="priv3a">Presto il Consenso</label>
                                                                    </div>
                                                                    <div class="icheck-material-success icheck-inline">
                                                                        <input name="priv3" type="radio" id="priv3b" value="B" <?=$tr['priv3']=="B"?'checked=""':''?>>
                                                                        <label for="priv3b">Nego il Consenso</label>
                                                                    </div>
                                                                </td>
                                                             </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                               

                                            </div>  
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="col-12">
                                                <div class="row">
                                                    
                                                        <table>	
                                                            <tbody>
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>			1. Come e' venuto a conoscenza del programma eventi Honda?
                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                </TR>
                                                                
                                                                <tr>
                                                                    <td>
                                                                        
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1a" value="A" <?=!$tr['quest_tr1']=="A"?'checked=""':''?>>
                                                                            <label for="quest_tr1a">Pubblicità</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1b" value="B" <?=!$tr['quest_tr1']=="B"?'checked=""':''?>>
                                                                            <label for="quest_tr1b">Internet</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1c" value="C"<?=!$tr['quest_tr1']=="C"?'checked=""':''?>>
                                                                            <label for="quest_tr1c">Amici</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1d" value="D"<?=!$tr['quest_tr1']=="D"?'checked=""':''?>>
                                                                            <label for="quest_tr1d">Redazionali</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline" style="margin-left:0px;">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1e" value="E" <?=!$tr['quest_tr1']=="E"?'checked=""':''?>>
                                                                            <label for="quest_tr1e">Concessionario Honda</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr1" type="radio" id="quest_tr1f" value="F" <?=$tr['quest_tr1']=="F"?'checked=""':''?>>
                                                                            <label for="quest_tr1f">Altro</label>
                                                                            <input type="text" name="quest_tr1_text" id="quest_tr1_text"clsss="form-control form-control-sm" value="<?=$tr['quest_tr1']=="F"?$tr['quest_tr1_text']:''?>">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    
                                                        <table>	
                                                            <tbody>
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>			2.Quale modello honda prevede di acquistare?

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                    <td>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="quest_tr2_text" id="quest_tr2_text" value="<?=$tr['quest_tr2']?$tr['quest_tr2']:$veicolo['marca']." ".$veicolo['modello']?>"class="form-control form-control-sm">
                                                                            </div>
				                                                        </div>
                                                                    </td>
                                                                </tr>
                                                      
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>			3.Entro quando??

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                <td>
                                                                        
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr3" type="radio" id="quest_tr3a" value="A" <?=$tr['quest_tr3']=="A"?'checked=""':''?>>
                                                                            <label for="quest_tr3a">3 mesi</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr3" type="radio" id="quest_tr3b" value="B" <?=$tr['quest_tr3']=="B"?'checked=""':''?>>
                                                                            <label for="quest_tr3b">6 mesi</label>
                                                                        </div>
                                                                        <div class="icheck-material-success icheck-inline">
                                                                            <input name="quest_tr3" type="radio" id="quest_tr3c" value="C" <?=$tr['quest_tr3']=="C"?'checked=""':''?>>
                                                                            <label for="quest_tr3c">oltre 6 mesi</label>
                                                                        </div>
                                                                        
                                                                    </td>
                                                                </tr>
                                                          
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>			4. Quali quotidiani legge?

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                
                                                                    <td>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="quest_tr4" id="quest_tr4" class="form-control form-control-sm" value="<?=$tr['quest_tr4']?$tr['quest_tr4']:''?>">
                                                                            </div>
				                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>5. Quali riviste legge?

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                
                                                                    <td>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="quest_tr5" id="quest_tr5" class="form-control form-control-sm" value="<?=$tr['quest_tr5']?$tr['quest_tr5']:''?>">
                                                                            </div>
				                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>	6. Quali radio ascolta?

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                    <td>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="quest_tr6" id="quest_tr6" class="form-control form-control-sm" value="<?=$tr['quest_tr6']?$tr['quest_tr6']:''?>">
                                                                            </div>
				                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            
                                                                <tr>
                                                                <td style="text-align:justify;font-size:10px;">
                                                                <b>	7. Quale sito visita più difrequente?

                                                                </b></TD>
                                                                                                                            
                                                                        

                                                                
                                                                    <td>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="quest_tr7" id="quest_tr7" class="form-control form-control-sm" value="<?=$tr['quest_tr7']?$tr['quest_tr7']:''?>">
                                                                            </div>
				                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    
                                                </div>         
                                                  

                                            <?php
                                                    
                                                    if(file_exists("docs/testride/sign/".$cli['id']."_sig_cons_tr_".$tr['id'].".png")){

                                                    
                                                    ?>
                                                <img src="docs/testride/sign/<?=$cli['id']?>_sig_cons_tr_<?=$tr['id']?>.png" >
                                                    <?php
                                                }else{ ?>
                                            
                                            <div class="col-12">
                                                <div class="form-group row"  style="height: 300px;">
                                                            
                                                                <div id="signature-pad2" class="m-signature-pad" style="width: 450px;height: 200px;">
                                                                    <div class="m-signature-pad--body">
                                                                        <canvas width="450" height="200"></canvas>
                                                                    </div>
                                                                    
                                                                    <div class="m-signature-pad--footer">
                                                                        <div class="description" style="padding-top: 20px;">
                                                                        </div>
                                                                        <button type="button" class="button btn btn-primary clear" data-action="clear">Pulisci Campo Firma</button>
                                                                    </div>
                                                                </div> 
                                                    </div>             
                                            </div> 
                                                <?php } 
                                                ?>       
                                        </div> 
                                    </div> 
                                 
                                </div>
                                <div class="modal-body" style="display:<?=$cfCli?'none':''?>">
                                            <div class="col-12">
                                                Dati clienti Mancanti!
                                            </div>
                                            
                                </div>
                                
                                <div class="modal-body" style="display:<?=$checkpat?'none':''?>">
                                            <div class="col-12">
                                            Dati patente mancanti
                                            </div>
                                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                    <button type="submit" class="btn btn-success"onclick="confCons();" <?php 
                                                                                                            if(!$cfCli){
                                                                                                                echo 'disabled title="Inserire/Scegliere Cliente"' ;
                                                                                                            }
                                                                                                            elseif(!$checkpat){
                                                                                                                echo 'disabled title="Inserire Dati Patente"' ;

                                                                                                            }elseif(!$tr['id_cliente']){
                                                                                                                echo 'disabled title="Salvare modifiche prenotazione"' ;
                                                                                                            }    
                                                                                                        ?>
                                    >
                                    <i class="fa fa-check-square-o"></i> Conferma Consegna</button>
                                </div>
                            </div>
                        </div>
                    </form>                         
                </div>
                <div class="modal fade" id="modal-animation-4" style="display: none;" aria-hidden="true">
                    <form id="upform" action="controller/updateTestride.php" method="post"> 
                    <input type="hidden" id="id" name="id" value="<?=$tr['id']?>">
                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$cli['id']?>">
                    <input type="hidden" name="action" value ="storeTestrideRicons">
                    <input type="hidden" name="signCode" id="signCode" value="">
                    <input type="hidden" name="data_cons" id="data_cons" value="<?=$tr['data_cons']?>" >
                    <input type="hidden" id="id_veicolo" name="id_veicolo" value="<?=$tr['id_veicolo']?>">
                    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 100%;padding:30px;">
                            <div class="modal-content animated slideInUp">
                                <div class="modal-header">
                                    <h5 class="modal-title">Riconsegna moto TestRide</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="padding-right: 139px;padding-bottom: 48px;">
                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">KM</label>
                                                <div class="col-sm-8">
                                                <input type="number" min="<?=$tr['km_cons']?>" id="km" name="km_ricons" class="form-control" value="<?=$tr['km_cons']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">FotoReport</label>
                                                <div class="col-sm-8">
                                                <input type="file" id="freport" name="freport"  class="" >
                                                <textarea rows="3" class="form-control" id="basic-textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">FotoReport2</label>
                                                <div class="col-sm-8">
                                                <input type="file" id="freport2" name="freport2"  class=""> 
                                                <textarea rows="3" class="form-control" id="basic-textarea"></textarea>                                   </div>
                                            </div>
                                        </div>    
                                        
                                        <?php
                                            if( file_exists("docs/testride/sign/".$cli['id']."_sig_ricons_tr_".$tr['id'].".png")){

                                            
                                            ?>
                                        <img src="docs/testride/sign/<?=$cli['id']?>_sig_ricons_tr_<?=$tr['id']?>.png" >
                                            <?php }else{ 
                                                if(isMobile()){?>
                                        
                                        <div class="col-12">
                                            <div class="form-group row"  style="height: 300px;">
                                            			
                                                             <div id="signature-pad" class="m-signature-pad" style="width: 450px;height: 200px;">
                                                                <div class="m-signature-pad--body">
                                                                    <canvas width="450" height="200"></canvas>
                                                                </div>
                                                                
                                                                <div class="m-signature-pad--footer">
                                                                    <div class="description" style="padding-top: 20px;">
                                                                    </div>
                                                                    <button type="button" class="button btn btn-primary clear" data-action="clear">Pulisci Campo Firma</button>
                                                                </div>
                                                            </div> 
                                                </div>             
                                        </div> 
                                        <?php }else{ ?>  
                                            <div class="card-body">
                                                                    <div class="row">
                                                                        <h4 class="card-title">Acquisizione Firma</h4>
                                                                        </div>
                                                                        <div class="row">
                                                                        <div id="signatureDiv">
                                                                        
                                                                        <img id="signatureImage" src="images/sign.png" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                <input class="btn btn-success"type="button" id="signButton" value="Acquisisci" onClick="tabletDemo()" />

                                                                </div>
                                                                <? }
                                                                    }
                                                                    ?>     

                                               
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                    <button type="submit" class="btn btn-success"onclick="conferma();"><i class="fa fa-check-square-o"></i> Conferma Riconsegna</button>
                                </div>
                            </div>
                        </div>
                    </form>                        
                </div>
                <div class="modal fade" id="modal-animation-5" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <form id="addform" action="controller/updateAnagr_cli.php" method="post">
                            <input type="hidden" name="action" value ="newPatenteTr">
                            <input type="hidden" name="id_cliente" value ="<?=$cli['codfiscale']?>">
                            <input type="hidden" name="id" value ="<?=$cli['id']?>">
                            <input type="hidden" name="idTr" value ="<?=$tr['id']?>">

                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h5 class="modal-title">Aggiornamento Dati Patente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                                
                                <div class="modal-body">
                
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Data Rilascio</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="data_rilascio" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Data scadenza</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="data_scadenza" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ente Rilascio</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="ente_rilascio" class="form-control" placeholder="Inserire Ente" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Numero</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="numero_patente" placeholder="Inserire Numero" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tipo Patente</label>
                                            <div class="col-sm-8">
                                            <select class="form-control" name="tipo_patente" id="default-select">
                                            <?php if($patente['tipo_patente']){ ?>
                                                    <option value="<?=$patente['tipo_patente']?>" selected> <?=$patente['tipo_patente']?></option>
                                            <?php } ?>
                                                <option value="">Seleziona Tipo patente</option>
                                                <option value="CIGC">CIGC</option>
                                                <option value="AM">AM</option>
                                                <option value="AM-B">AM-B</option>
                                                <option value="A1">A1</option>
                                                <option value="A1-B">A1-B</option>
                                                <option value="A2">A2</option>
                                                <option value="A2-B">A2-B</option>
                                                <option value="A">A</option>
                                                <option value="A-B">A-B</option>
                                                <option value="B">B</option>
                                            </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aggiorna</button>
                                </div>
                            
                            </div>
                        </form>								
                    </div>
                </div>
                <div class="modal fade" id="modalcliente" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            
                            <form enctype="multipart/form-data" id="addformcli" action="controller/updateAnagr_cli.php" method="post">
                            <?php if($idCli){?>
                                <input type="hidden" name="id" value ="<?=$cli['id']?>">
                                <input type="hidden" name="action" value ="storeClientePageTr">
                            <?}else{?>

                                <input type="hidden" name="action" value ="saveClientePageTr">     
                            <?}?>
                             
                                <input type="hidden" name="idTr" value="<?=$tr['id']?>">
                                
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?=$cli?'Aggiornamento Dati':'Inserimento Nuovo'?> Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="datianagr_modal" style="<?=$idCli?'display:none;':''?>">
                                                <div class="col-12 "> 
                                                    <div class="row form-group">
                                                        <div class="col col-md-12">
                                                        <h5><i class="fa fa-user"></i> Dati Anagrafici</h5>                                                   </h5></div>
                                                    </div>
                                                </div>
                                                <div class="row col-12">      
                                                    <div class="col-12 ">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Ragione sociale</label>
                                                            <div class="col-sm-8">
                                                        <input type="text" id="ragsociale" name="ragsociale" value="<?=$idCli?$cli['ragsociale']:''?>" placeholder="Inserire Ragione Sociale" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row col-12">    
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                                <label class="col-sm-4 col-form-label">Cognome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="cognome" name="cognome" value="<?=$idCli?$cli['cognome']:''?>" placeholder="Inserire Cognome" class="form-control"required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label">Nome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="nome" name="nome" value="<?=$idCli?$cli['nome']:''?>" placeholder="Inserire Nome" class="form-control" required>
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
                                                                <input type="date" id="datanasc" name="datanasc" class="form-control" value="<?=$cli['datanasc']?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Nazionalita</label>
                                                            <div class="col-sm-8">
                                                        <input type="text" id="nazionalita" name="nazionalita" value="<?=$idCli?$cli['nazionalita']:'I'?>" class="form-control">
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
                                                            <?php

                                                                if($idCli){?>
                                                                <option value="<?=$cli['sesso']?>" <?=$cli['sesso']?'selected':''?>> <?=$cli['sesso'] === 'M'?'Maschio':'Femmina'?> </option>


                                                            <?php   }else{ ?>

                                                                    <option value="M">Maschio</option>
                                                                    <option value="F">Femmina</option>

                                                            <?php       
                                                            }
                                                            
                                                            ?>



                                                            
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
                                                        <input type="text" id="codfiscale" name="codfiscale" maxlength="16" class="form-control" value="<?=$idCli?$cli['codfiscale']:''?>" required>
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
                                                                <input type="text" id="partitaiva" name="partitaiva" value="<?=$idCli?$cli['partitaiva']:''?>" placeholder="Inserire Partita Iva" class="form-control">
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
                                                    <input type="text" id="indirizzores" name="indirizzores" value="<?=$idCli?$cli['indirizzores']:''?>" placeholder="Inserire Indirizzo" class="form-control">
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
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">CAP</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" id="capres" name="capres" maxlength="5" value="<?=$idCli?$cli['capres']:''?>" placeholder="Inserire CAP" class="form-control">
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
                                            <div class="row col-12">                                     
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">eMail 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="email" id="mail1" name="mail1" value="<?=$idCli?$cli['mail1']:''?>"placeholder="Inserire eMail 1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">eMail 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="email" id="mail2" name="mail2" value="<?=$idCli?$cli['mail2']:''?>" placeholder="Inserire eMail 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row col-12"> 
                                                <div class="col-6 col-md-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel1" name="tel1" maxlength="15" value="<?=$idCli?$cli['tel1']:''?>" placeholder="Inserire Telefono 1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel2" name="tel2" maxlength="15" value="<?=$idCli?$cli['tel2']:''?>" placeholder="Inserire Telefono 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile1" name="mobile1" maxlength="15" value="<?=$idCli?$cli['mobile1']:''?>" placeholder="Inserire Mobile 1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile2" name="mobile2" maxlength="15" value="<?=$idCli?$cli['mobile2']:''?>" placeholder="Inserire Mobile 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12"> 
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                        <h5><i class="fa fa-id-card"></i> Dati Patente di Guida</h5>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row col-12"> 

                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Data Rilascio</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="data_rilascio" id="data_rilascio_mod" class="form-control" value="<?=$idCli?$patente['data_rilascio']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Data scadenza</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="data_scadenza" id="data_scadenza_mod"class="form-control" value="<?=$idCli?$patente['data_scadenza']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-12">
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">ente Rilascio</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="ente_rilascio" id="ente_rilascio_mod"class="form-control" placeholder="Inserire Ente" value="<?=$idCli?$patente['ente_rilascio']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Numero</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="numero_patente" id="numero_patente_mod" placeholder="Inserire Numero" class="form-control" value="<?=$idCli?$patente['numero_patente']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Tipo Patente</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="tipo_patente" id="tipo_patente_mod" required>
                                                            <?php if($idCli){ ?>
                                                                    <option value="<?=$patente['tipo_patente']?>" selected> <?=$patente['tipo_patente']?></option>
                                                            <?php } ?>
                                                                <option value="">Seleziona Tipo patente</option>
                                                                <option value="CIGC">CIGC</option>
                                                                <option value="AM">AM</option>
                                                                <option value="AM-B">AM-B</option>
                                                                <option value="A1">A1</option>
                                                                <option value="A1-B">A1-B</option>
                                                                <option value="A2">A2</option>
                                                                <option value="A2-B">A2-B</option>
                                                                <option value="A">A</option>
                                                                <option value="A-B">A-B</option>
                                                                <option value="B">B</option>
                                                            </select>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div> 
                                            <div class="col-12"> 
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                    <h5><i aria-hidden="true" class="fa fa-cloud-download"></i> Acquisizione Patente</h5>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Fronte</label>
                                                        <div class="col-sm-8">
                                                        <?php if($idCli){
                                                                if(file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")){?>
                                                                <button type="button" class="btn btn-success m-1"> <i class="fa fa-check"></i> </button> 
                                                                <img alt="Image placeholder" src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patfront.jpg" class="product-img" data-toggle="modal" data-target="#imagemodal">

                                                       <? }else{?>
                                                            <input type="file" id="patfront" name="patfront" class="" required>
                                                            <?}
                                                        }else{?>
                                                        <input type="file" id="patfront" name="patfront" class="" required>
                                                        <?}?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">retro</label>
                                                        <div class="col-sm-8">
                                                        <?php
                                                        if($idCli){
                                                            if(file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patrear.jpg")){?>
                                                            <button type="button" class="btn btn-success m-1"> <i class="fa fa-check"></i> </button>
                                                            <img alt="Image placeholder" src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patrear.jpg" class="product-img" data-toggle="modal" data-target="#imagemodal">
                                                            <div class="col-lg-4 col-md-12 mb-4">

                                                           
                                                                      

                                                               

                                                            </div>
                                                               
                                                       <? }else{?>
                                                            <input type="file" id="patrear" name="patrear" class="" required>
                                                            <?}?>
                                                            <? }else{?>
                                                            <input type="file" id="patrear" name="patrear" class="" required>
                                                            <?}?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12" <?php if($idCli){
                                                                                if(file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")){?>
                                                                               
                                                                               <? }else{?>
                                                                                        style="display:none;"
                                                                                 <?}
                                                                            }else{?>
                                                                                            style="display:none;"
                                                                            <?}?>
                                                        >
                                                                    
                                                </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?=$cli?'Aggiornamento Dati':'Inserimento Nuovo'?> Cliente</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                </div>
                <div class="modal fade" id="imagemodal1" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Patente di <?=$cli['cognome'].' '.$cli['nome']?></h5>
                                                                        <button type="button" class="close" data-dismiss-modal="modal2" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <img src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patfront.jpg" style="height: 399px;padding: 25px;" alt="Card image cap">

                                                                        <img src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patrear.jpg"  style="height: 399px;padding: 25px;" alt="Card image cap">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss-modal="modal2"><i class="fa fa-times"></i> chiudi</button>
                                                                        
                                                                    </div>
                                                                    </div>
                                                                </div>
                </div>
                
                <div class="modal fade" id="termcondmodal" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Termini e Condizioni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table style="color:black;">
                                <tbody>
                                
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                chiedo di poter usare in comodato di prova gratuito la moto/scooter HONDA, modello:
                                   <STRONG><?=$veicolo['marca']?> <?=$veicolo['modello']?></STRONG> TARGA: <strong><?=$veicolo['targa']?></STRONG>
                                                </td> 
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                di proprieta' della Honda Moto Roma S.p.A. obbligandosi alla riconsegna del suddetto motoveicolo a semplice 
                                                                        richiesta della Honda Moto Roma S.p.A.,	a tal fine dichiaro:</td>

                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                1. di aver gia' compiuto la maggiore eta' alla data della firma del presente esonero e di essere in possesso
                                    di patente di guida specifica per la guida del mezzo che andro' ad utilizzare;</td>

                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    2. di aver preso perfetta conoscenza del Codice della strada e di impegnarmi ad uniformarvisi;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    3. di aver personalmente constatato lo stato attuale del suddetto motoveicolo (piena efficienza e affidabilita' del mezzo)
                                    e di uniformarmi prontamente a tutte le disposizioni e segnalazioni del personale della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, 
                                    Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. preposto e, considerato quanto precede, il suddetto motoveicolo e' perfettamente idoneo alla 
                                    prova che intendo effettuare;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    4. di assumermi a tale riguardo ogni responsabilita' per la custodia di detto motoveicolo fino alla riconsegna del medesimo, 
                                    per gli incidenti e per i conseguenti danni che ne derivassero sia a se stessi ed alle cose di loro proprieta', sia a terzi ed alle cose di terzi, compresi 
                                    tra i terzi il pilota e le persone eventualmente trasportate dal suddetto motoveicolo;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    5. di impegnarmi a manlevare e tenere indenne la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe
                                    Ltd o Honda Italia Industriale S.p.A. nonch� qualsiasi loro rappresentante, incaricato, funzionario, dipendente o collaboratore, da qualsiasi responsabilita' 
                                    comunque connessa o dipendente o conseguente alla prova che il sottoscritto intende effettuare;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    6. di impegnarmi tassativamente a non cedere il suddetto motoveicolo a persona non autorizzata dalla Honda Moto Roma S.p.A., 
                                    Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. e che comunque non abbia sottoscritto la presente dichiarazione 
                                    assumendomi fin d'ora tutte le responsabilita' per qualsiasi sanzione civile, amministrativa, penale, conseguente alla inosservanza di questa norma;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    7. di impegnarmi a risarcire la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o 
                                    Honda Italia Industriale S.p.A. di tutti i danni da me causati agli impianti e alle persone nonche' ad indennizzare per tutte le spese ed oneri che abbia a 
                                    sostenere per qualsiasi motivo di mio interesse;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    8. di impegnarmi a risarcire, per un valore minimo pari a euro 500,00 la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, 
                                    Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. di eventuali danni subiti nell'utilizzo del suddetto motoveicolo concesso in comodato gratuito;</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    9.di trovarmi in perfetto stato di salute fisica e psichica.</td>
                                </tr>
                                <tr>
                                <td style="text-align:justify;font-size:10px;">
                                    Io sottoscritto confermo espressamente tutto quanto sopra precede ad ogni e qualsiasi effetto di legge.</td>
                                </tr>
                                </tbody>
                            </table>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                         
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="questmodal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Risposte Questionario </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Domanda</th>
                                                <th scope="col">Risposta</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?=$question['quest1a']?> <?=$question['quest1b']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td><?=$question['quest2a']?> <?=$question['quest2b']?></td>
                                                <td><?=$question['quest2c']?> <?=$question['quest2d']?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td><?=$question['quest3a']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td><?=$question['quest4a']?> <?=$question['quest4b']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td><?=$question['quest5']?> <?=$question['quest5c']?><?=$question['quest5d']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td><?=$question['quest6']?> <?=$question['quest6b']?><?=$question['quest6c']?><?=$question['quest6d']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td><?=$question['quest7']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td><?=$question['quest8']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td><?=$question['quest9']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td><?=$question['quest10']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td><?=$question['quest11']?></td>
                                                <td><?=$question['quest11aa']?><?=$question['quest11bb']?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td><?=$question['quest12']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                 </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div>
                                                                            

        </div> <!--end main card -->
    </div>
</div>
