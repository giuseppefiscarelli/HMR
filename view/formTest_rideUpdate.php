<div class="row"> 
    <div class="col-12">
        <div class="card" style=" background-color: #dee2e68c;">
              <div class="card-header" style="background-color: lightgray;box-shadow:inset 0px 0px 12px 0px black">
                <div class="row">
                  <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">Test Ride </h3> Inserimento <?=$action === 'fastinsert'?'Test':'Prenotazione'?></div>
                  
                </div> 
              </div>
            <form enctype="multipart/form-data" id="addform" action="controller/updateTestride.php" method="post">                
                <input type="hidden" name="targa" id="targa" value ="<?=$tr['id_veicolo']?$tr['id_veicolo']:$_COOKIE['id_veicolo']?>"> 
                <?php if($action === 'fastinsert'){?>
                    <input type="hidden" name="action" value ="<?=$tr['id']?'storeTestridefast':'saveTestridefast'?>">
                <?}else{?>
                    <input type="hidden" name="action" value ="<?=$tr['id']?'storeTestride':'saveTestride'?>">
                <?}        
                ?>                
                <input type="hidden" name="signCode" id="signCode" value=""> 
                <input type="hidden" name="id" id="id" value="<?=$tr['id']?$tr['id']:''?>" > 
                <input type="hidden" name="codfiscale" value="<?=$cli['codfiscale']?>">
                <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$cli['id']?>">
                
			    <div class="card-body ">
            
                    <div class="row" >
                                <div class="card col-12" style="display:<?=$action === 'insert'?'none':''?>;">
                                    <div class="card-header" style="font-size:large;"><i class="fa fa-bar-chart"></i> Stato Attività
                                    </div>
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-12">
                                                <div class="progress-wrapper mb-4">
                                                <input type="hidden" id="pro1" value="<?=$allCliente?33:'0'?>">
                                                <input type="hidden" id="pro2" value="0">
                                                <input type="hidden" id="pro3" value="0">
                                                <input type="hidden" id="pro4" value="<?=$allCliente?33:'0'?>">
                                                                    <p >Procedura Consegna<span class="float-right"><b id="pb_1a"><?=$allCliente?33:'0'?>%</b></span></p>
                                                                        <div class="progress" style="height:7px;">
                                                                            <div class="progress-bar gradient-ibiza" id="pb_1b"style="width:<?=$allCliente?33:''?>%"></div>
                                                                        </div>
                                                                </div>

                                                <ul class="list-group list-group-flush shadow-none">
                                                    
                                                    <li class="list-group-item">         
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                    <h6 class="mb-0"> 
                                                                    <?php if($allCliente){?>

                                                                    <i aria-hidden="true" class="fa fa-check" style="color:green;"></i>

                                                                <?  }else{?>
                                                                    <i aria-hidden="true" id="att1_2" class="fa fa-ban" style="color:red;"></i>

                                                               <? }?>
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
                                                                      
                                                                        <i aria-hidden="true" id="att1_2" class="fa fa-ban" style="color:red;"></i>
                                                                      
                                                                        Consensi Privacy</h6>
                                                                    </div>
                                                                    <div class="date">
                                                                
                                                                   
                                                                            
                                                                        <button type="button" class="btn btn-outline-primary" id="att1_2b"style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#defaultsizemodal"><i class="fa fa-sign-out" aria-hidden="true"></i>Gestione Consegna </button>

                                                                      
                                                                    </div>

                                                                </div>
                                                    </li>
                                                    <li class="list-group-item" style="display:none">         
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">
                                                                       
                                                                            <i aria-hidden="true" id="att1_3"class="fa fa-ban" style="color:red;"></i>

                                                                    
                                                                        Questionario TestRide</h6>
                                                                    </div>
                                                                    <div class="date">
                                                                    
                                                                            
                                                                        <button type="button" class="btn btn-outline-primary" id="att1_3b"style="<?=$tr['id_cliente']?'':'display:none;'?>" data-toggle="modal" data-target="#defaultsizemodal"><i class="fa fa-sign-out" aria-hidden="true"></i>Gestione Consegna </button>
            
                                                                        
                                                                    </div>

                                                                </div>
                                                                
                                                            
                                                    </li>
                                                    <li class="list-group-item">         
                                                                <div class="media align-items-center">
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">
                                                                       
                                                                            <i aria-hidden="true" class="fa fa-ban" id="att1_4"style="color:red;"></i>

                                                                    
                                                                        Scelta Veicolo</h6>
                                                                    </div>
                                                                    <div class="date">
                                                                    
                                                                            
                                                                    <button type="button" class="btn btn-outline-primary" id="att1_4b" style="<?=$tr['id_cliente']?'':'display:none;'?>" onclick="$('#id_veicolo').focus();"><i class="fa fa-sign-out" aria-hidden="true"></i>Seleziona Veicolo</button>

                                                                        
                                                                    </div>

                                                                </div>
                                                                
                                                            
                                                    </li>
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

                                            <div class="col-lg-4">
                                            <?php 
                                                if($cliente){
                                                if($allCliente){?>
                                               
                                            <?}else{?>
                                                <img src="images/Blinking_warning.gif" style="padding: 5px">
                                                <h2>Verificare dati Cliente!</h2>
                                            <?}}?>
                                            </div>
                                           
                                        </div>

                                </div>
                    </div>


                    <div class="input-group-prepend col-lg-6 col-md-12 card-body" style="background-color: white;">
                        <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                        <input type="text" id="autocomplete" name="autocomplete"  value="" maxlength="16" placeholder="Inserisci / Scansione Codice Fiscale - Ricerca per Nome/Cognome - Ricerca per Email-cellulare" class="form-control ui-autocomplete-input"  autocomplete="off">       
                    </div>
                    <div class="input-group-prepend col-lg-6 col-md-12 card-body" style="background-color: white;">
                        <button type="button" onclick="$('#addformcli').validate();"class="btn btn-primary btn-block m-1" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>
                    </div>
                    <br>
                    
                   

                    
                    <div class="row col-12">
                        <div class="col-xl-6 col-12" style="<?=$cliente?'':'display:none;'?>">
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
                                                <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 350px;">
                                                
                                                        <div class="alert-icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                        <span>Dati Anagrafici Completi</span>
                                                        </div>
                                                </div>
                                                    <?}else{?> 
                                                <div class="alert alert-warning alert-dismissible mb-0" style="margin-right: 10px;max-width: 350px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
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
                                    <div class="alert alert-success alert-dismissible" role="alert"  style="margin-right: 10px;max-width: 350px;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Residenza Completi</span>
                                        </div>
                                    </div>
                                    <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#indirizzores').focus();},300);"style="margin-right: 10px;max-width: 350px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Residenza Incompleti!</span><br>
                                            <?=$checkcap?'':'Verifica Cap'?>

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
                                    <?php if ($cli['mail1']&&$cli['mobile1']){?>
                                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 350px;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Contatti Completi</span>
                                        </div>
                                    </div>
                                    <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#mail1').focus();},300);"style="margin-right: 10px;max-width: 350px;cursor:pointer;"  title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Contatti Incompleti!</span>

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
                                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 350px;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Patente Completi</span>
                                        </div>
                                    </div>
                                 <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#data_rilascio_mod').focus();},300);" style="margin-right: 10px;max-width: 350px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
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
                                    <br>    validità dal <b><?=date("d/m/Y", strtotime($patente['data_rilascio']))?></b> al <b><?=date("d/m/Y", strtotime($patente['data_scadenza']))?></b>
                                    <br>rilasciata da <b><?=$patente['ente_rilascio']?></b>
                                    </div>

                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                    <div class="media-body ml-3">
                                   
                                    

                                        <?php if($checkpatdoc){?>
                                    <div class="alert alert-success alert-dismissible " data-toggle="modal" data-target="#imagemodal1" title="Visualizza Documento" role="alert" style="margin-right: 10px;max-width: 350px;cursor:pointer;">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check" ></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Scansione Patente Presente</span>
                                        </div>
                                    </div>
                                 <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" onclick="setTimeout(function() {$('#patfront').focus();},300);"style="margin-right: 10px;max-width: 350px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
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
                                 
                        </div>
                        <!--
                        <div class="col-xl-6 col-12" style="<?=$cliente?'':'display:none;'?>">
                            <div class="card">
                                <div class="card-header text-uppercase">Check Inserimento Dati</div>
                                <div class="card-body">
                                <?php if ($checkanagrcli){?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Anagrafici Completi</span>
                                        </div>
                                    </div>
                                <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" role="alert">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Anagrafici Incompleti!</span>
                                            <button type="button" class="btn btn-outline-danger" style="color:white;" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>

                                            </div>
                                    </div>  
                                <?}?> 
                                <?php if ($checkrescli){?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Residenza Completi</span>
                                        </div>
                                    </div>
                                <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" role="alert">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Residenza Incompleti!</span>
                                            <button type="button" class="btn btn-outline-danger" style="color:white;" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>

                                            </div>
                                    </div>  
                                <?}?> 
                                <?php if ($cli['mail1']&&$cli['mobile1']){?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Contatti Completi</span>
                                        </div>
                                    </div>
                                <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" role="alert">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Contatti Incompleti!</span>
                                            <button type="button" class="btn btn-outline-danger" style="color:white;" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>

                                            </div>
                                    </div>  
                                <?}?> 
                                <?php if ($checkpat){?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                       
                                            <div class="alert-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span>Dati Patente Completi</span>
                                        </div>
                                    </div>
                                <?}else{?> 
                                    <div class="alert alert-warning alert-dismissible mb-0" role="alert">
                                            <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                            <span><strong>Attenzione!</strong> Dati Patente Incompleti!</span>
                                            <button type="button" class="btn btn-outline-danger" style="color:white;" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente"><i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>

                                            </div>
                                    </div>  
                                <?}?> 

                                </div>
                            </div>
                        </div>
                                -->                     
                        <div class="col-xl-6 col-12 card-body" style="background-color: white;">
                            <div class="row" style="display:<?=$action === 'fastinsert'?'none':''?>;"> <!--note prenotazione-->
                                <div class="col-12">
                                    <div class="col-12  "> 
                                        <div class="row form-group">
                                            <div class="col-12 col-md-6">
                                                <h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Note Prenotazione</h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12  " >
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <textarea maxlength="100"rows="2" class="form-control" id="note_pren" name="note_pren" placeholder="Inserire Note (max 100 caratteri)..."></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  <!--scelta veicolo-->   
                                <div class="col-12">

                                    <div class="col-12  "> 
                                        <div class="row form-group">
                                            <div class="col-12 col-md-6">
                                            <h5><i class="fa fa-motorcycle"></i> Scelta Veicolo TestRide</h5><h5>
                                            </h5>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#largesizemodal">Aggiungi Veicolo</button>
                                            </div>

                                        </div>
                                    </div>
                                   
                                    <div class="col-12  ">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Motoveicolo</label>
                                            <div class="col-sm-8">
                                                <select id="id_veicolo" name="id_veicolo" class="form-control" required="">
                                                <?php
                                                if($tr['id_veicolo']){ 
                                                    $motoSel = getMotoinfo($tr['id_veicolo']);

                                                ?>
                                                <option value="<?=$tr['id_veicolo']?> " selected><?=$motoSel['marca']?> <?=$motoSel['modello']?> <?=$motoSel['targa']?> </option>
                                                <? } ?>
                                                <option value="">Seleziona un modello</option> 
                                                <?php
                                                    if($moto){
                                                    foreach ($moto as $m){                              
                                                        if($m['targa']!==$motoSel['targa'] ){
                                                ?>
                                            
                                                <option style="color:black;background-color:<?=$m['colore_tr']?>"value="<?=$m['targa']?>"><?=$m['marca']?> <?=$m['modello']?> <?=$m['targa']?> </option>
                                                <?php }
                                                    }
                                                } ?>
                                                </select>  
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="col-12  " style="display:<?=$action === 'fastinsert'?'':'none'?>;">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">KM</label>
                                            <div class="col-sm-8">
                                            <input type="text" id="km_cons" name="km_cons" class="form-control" value="<?=$tr['km_cons']?$tr['km_cons']:0.0?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  " style="display:<?=$action === 'fastinsert'?'none':''?>;">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Data Test</label>
                                            <div class="col-sm-8">
                                            <input type="date" id="data_pren"  min="<?=date("Y-m-d")?>" name="data_pren" class="form-control" required="" value="<?=$tr['data_pren']?date("Y-m-d", strtotime($tr['data_pren'])):date("Y-m-d")?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  " style="display:<?=$action === 'fastinsert'?'none':''?>;">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Ora Test</label>
                                            <div class="col-sm-8">
                                            <input type="time"  id="ora_pren" name="ora_pren" required="" class="form-control" value="<?=$tr['data_pren']?date("H:i", strtotime($tr['data_pren'])):"16:00"?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  ">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Durata</label>
                                            <div class="col-sm-8">
                                                <input type="number" min="20" step="20" id="durata_test" name="durata_test" class="form-control" value="<?=$tr['durata_test']?$tr['durata_test']:'20'?>"> Minuti
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>	
                                	
                                
                                    <div class="col-12" style="<?=$action === 'fastinsert'?'display:none':''?>;" >
                                        <div id="calendar"></div>
                                    </div>
                            </div>
                            <div class="row" style="display:<?=$action === 'fastinsert'?'':'none'?>;"> <!-- firma -->
                                <div class="col-12">
                                
                                    <button type="button " onClick="return false;"class="btn btn-info  btn-block m-1" data-toggle="modal" data-target="#defaultsizemodal"><i class="fa fa-pencil-square-o"></i> Acquisizione Firma Digitale / Privacy</button>
                            
                                    <div class="modal fade" id="defaultsizemodal" style="display: none;" data-backdrop="static" aria-hidden="true">
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
                                                                        <label class="col-sm-4 col-form-label">FotoReport</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="file" id="report" name="freport" form="addform" class="" >
                                                                        <textarea rows="3" class="form-control" id="basic-textarea" form="addform"id="report1" name="report1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">FotoReport2</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="file" id="report2" name="freport2"  form="addform"class=""> 
                                                                        <textarea rows="3" class="form-control" id="basic-textarea" form="addform"id="report2" name="report2"></textarea>                                   </div>
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
                                                                        <table style="margin-bottom: 15px;">	
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td >
                                                                                    Il sottoscritto, in relazione all'informativa ricevuta ai sensi del Regolamento Europeo N. 679/2016 a quanto segue:</TD>
                                                                                </TR>
                                                                            </TBODY>
                                                                        </TABLE>
                                                                        <table style="margin-bottom: 15px;">
                                                                            <tbody id="privrow" style="background-color: rgba(255, 0, 0, 0.15);">
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
                                                                                            <input name="priv1" type="radio" id="priv1a" value="A">
                                                                                            <label for="priv1a">Presto il Consenso</label>
                                                                                        </div>
                                                                                        <div class="icheck-material-success icheck-inline">
                                                                                            <input name="priv1" type="radio" id="priv1b" value="B">
                                                                                            <label for="priv1b">Nego il Consenso</label>
                                                                                        </div>
                                                                                    </td>
                                                                                <tr>
                                                                                <tr>
                                                                                    <td style="color:black;text-align:center;">Consenso Obbligatorio</td>
                                                                                </tr>    
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    <div class="row">
                                                                    
                                                                        <table style="margin-bottom: 15px;">
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
                                                                                            <input name="priv2" type="radio" id="priv2a" value="A">
                                                                                            <label for="priv2a">Presto il Consenso</label>
                                                                                        </div>
                                                                                        <div class="icheck-material-success icheck-inline">
                                                                                            <input name="priv2" type="radio" id="priv2b" value="B">
                                                                                            <label for="priv2b">Nego il Consenso</label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tody>
                                                                        </table>
                                                                    </div>

                                                                    <div class="row">
                                                                    
                                                                        <table style="margin-bottom: 15px;">	
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
                                                                                            <input name="priv3" type="radio" id="priv3a" value="A">
                                                                                            <label for="priv3a">Presto il Consenso</label>
                                                                                        </div>
                                                                                        <div class="icheck-material-success icheck-inline">
                                                                                            <input name="priv3" type="radio" id="priv3b" value="B">
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
                                                                    <div id="accordion1">
                                                                        <div class="card mb-2">
                                                                            <div class="card-header">
                                                                                <button type="button"class="btn btn-link shadow-none collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                                                                    Questionario Consegna
                                                                                </button>
                                                                            </div>

                                                                            <div id="collapse-1" class="collapse" data-parent="#accordion1" style="">
                                                                                <div class="card-body">
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
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1a" value="A" >
                                                                                                                <label for="quest_tr1a">Pubblicità</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1b" value="B" >
                                                                                                                <label for="quest_tr1b">Internet</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1c" value="C" >
                                                                                                                <label for="quest_tr1c">Amici</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1d" value="D">
                                                                                                                <label for="quest_tr1d">Redazionali</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline" style="margin-left:0px;">
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1e" value="E">
                                                                                                                <label for="quest_tr1e">Concessionario Honda</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr1" type="radio" id="quest_tr1f" value="F" >
                                                                                                                <label for="quest_tr1f">Altro</label>
                                                                                                                <input type="text" name="quest_tr1_text" id="quest_tr1_text"clsss="form-control form-control-sm">
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        
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
                                                                                                                    <input type="text" name="quest_tr2_text" id="quest_tr2_text" class="form-control form-control-sm">
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
                                                                                                                <input name="quest_tr3" type="radio" id="quest_tr3a" value="A">
                                                                                                                <label for="quest_tr3a">3 mesi</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr3" type="radio" id="quest_tr3b" value="B">
                                                                                                                <label for="quest_tr3b">6 mesi</label>
                                                                                                            </div>
                                                                                                            <div class="icheck-material-success icheck-inline">
                                                                                                                <input name="quest_tr3" type="radio" id="quest_tr3c" value="C">
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
                                                                                                                    <input type="text" name="quest_tr4" id="quest_tr4" class="form-control form-control-sm">
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
                                                                                                                    <input type="text" name="quest_tr5" id="quest_tr5" class="form-control form-control-sm">
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
                                                                                                                    <input type="text" name="quest_tr6" id="quest_tr6" class="form-control form-control-sm">
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
                                                                                                                    <input type="text" name="quest_tr7" id="quest_tr7" class="form-control form-control-sm">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        
                                                                                    </div>         
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                            
                                                                       
                                                                    </div>
                                                                       
                                                                    

                                                                <?php
                                                                
                                                                        if(file_exists("docs/testride/sign/".$cli['id']."_sig_cons_tr_".$tr['id'].".png")){

                                                                        
                                                                        ?>
                                                                    <img src="docs/testride/sign/<?=$cli['id']?>_sig_cons_tr_<?=$tr['id']?>.png" >
                                                                        <?php
                                                                    }else{ 
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
                                                                    <?php  
                                                                 }else{?>
                                                                 
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
                                                    </div> 
                                                    
                                                </div>
                                                
                                                <div class="modal-footer" style="margin-top:30px;">
                                                    <button type="button" class="btn btn-success" id="signbtn" data-dismiss="modal" onclick="conferma()" disabled="disabled"><i class="fa fa-times"></i> Conferma</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    




                                    
                </div>
                <div class="card-footer text-center" >
                    <button type="submit" class="btn btn-success " id="submitbutton" name="mode" value="Add" <?php  if($action==='fastinsert'){
                                                                                                                       
                                                                                                                        if(!$checkanagrcli){
                                                                                                                            echo 'disabled title="Inserire Dati Cliente"';
                                                                                                                        }
                                                                                                                        if(!$checkpat||!$checkpatdoc){
                                                                                                                            echo 'disabled title="Inserire/aggiornare dati Patente"';
                                                                                                                        }
                                                                                                                        if(date("Y-m-d") > $patente['data_scadenza']){
                                                                                                                            echo 'disabled title="Patente Non Valida"';

                                                                                                                        }
                                                                                                                        if(!$checkveicolo){
                                                                                                                            echo 'disabled title="Scegliere Veicolo"';
                                                                                                                        }
                                                                                                                        if(!$checksubmit){
                                                                                                                            echo 'disabled title="verificare dati"';
                             
                                                                                                                        }
                                                                                                                    }if($action==='insert'){
                                                                                                                        if(!$checkveicolo){
                                                                                                                            echo 'disabled title="Selezionare veicolo"';
                                                                                                                        }
                                                                                                                        }
                                                                                                                    
                                                                                                                    ?>  >
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i> <?=$tr['id']?'Aggiorna':'Inserisci'?> <?=$action==='fastinsert'?'TestRide':'Prenotazione'?>
                    </button>
                    <a class="btn btn-danger" onclick="history.back();return false;" style="color:white;"><i class="fa fa-ban"></i> Annulla</a>
                </div>	            
            </form> 

            
             <!-- Modal -->
            <div class="modal fade" id="modalcliente" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            
                            <form enctype="multipart/form-data" id="addformcli" action="controller/updateAnagr_cli.php" method="post" >
                            
                               <?php if($action === 'upCliente'){?>
                                <input type="hidden" name="action" value ="upCliente">
                               <? }elseif($action === 'insert'){
                                    if($tr['id']){?> 
                                <input type="hidden" name="actionTr" value="<?=$action?>">
                                <input type="hidden" name="idTr" value="<?=$idTr?>">
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeClienteTestPren':'saveClienteTestPren'?>">
                               <?   }else{?>
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeClienteTest':'saveClienteTest'?>">
                                <input type="hidden" name="actionTr" value="<?=$action?>">
                                <input type="hidden" name="id_patente" id="id_patente" value=<?=$patente['id']?>>

                               <?   }
                                 }elseif($action === 'fastinsert'){
                                    if($tr['id']){?>
                                <input type="hidden" name="actionTr" value="<?=$action?>">
                                <input type="hidden" name="idTr" value="<?=$tr['id']?>">
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeClienteTestFast':'saveClienteTestFast'?>">
                              <?    }else{?>
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeClienteTest':'saveClienteTest'?>">
                                <input type="hidden" name="actionTr" value="<?=$action?>">
                                <input type="hidden" name="id_patente" value="<?=$checkpat?$patente['id_cliente']:''?>">
                              <?    }
                                }else{?>
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeCliente':'saveCliente'?>">
                              <?} ?>
                                <input type="hidden" name="id" value ="<?=$cli['id']?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?=$cliente?'Aggiornamento Dati':'Inserimento Nuovo'?> Cliente</h5>
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
                                                    
                                                    <div class="col-12 ">
                                                        <div class="col-6 col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Ragione sociale</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" oninput="this.value = this.value.toUpperCase()"id="ragsociale" name="ragsociale" value="<?=$cli['ragsociale']?>" placeholder="Inserire Ragione Sociale" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                <div class="row col-12">    
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                                <label class="col-sm-4 col-form-label">Cognome</label>
                                                            <div class="col-sm-8">
                                                                <input required type="text" oninput="this.value = this.value.toUpperCase()"id="cognome" name="cognome" value="<?=$cli['cognome']?>" placeholder="Inserire Cognome" class="form-control"required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label">Nome</label>
                                                            <div class="col-sm-8">
                                                                <input required type="text" oninput="this.value = this.value.toUpperCase()"id="nome" name="nome" value="<?=$cli['nome']?>" placeholder="Inserire Nome" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row col-12"> 
                                                    <div class="col-6 col-md-12"> 
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Prov di Nascita</label>
                                                            <div class="col-sm-8">
                                                                <select required class="form-control" id="provnasc" name="provnasc"  required>
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
                                                                <select required class="form-control" name="luogonasc" id="luogonasc">
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
                                                                <input required type="date" id="datanasc" name="datanasc" class="form-control" value="<?=$cli['datanasc']?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Nazionalita</label>
                                                            <div class="col-sm-8">
                                                        <input required type="text" id="nazionalita" name="nazionalita" value="<?=$cli['nazionalita']?$cli['nazionalita']:'I'?>" class="form-control">
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

                                                                if($cli['sesso']){?>
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
                                                        <input type="text" id="codfiscale" readonly="readonly" name="codfiscale" maxlength="16" class="form-control" value="<?=$cli['codfiscale']?>" required>
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
                                                                <input rtype="text" id="partitaiva" name="partitaiva" value="<?=$cli['partitaiva']?$cli['partitaiva']:''?>" placeholder="Inserire Partita Iva" class="form-control">
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
                                                    <input required type="text" id="indirizzores" oninput="this.value = this.value.toUpperCase()"name="indirizzores" value="<?=$cli['indirizzores']?>" placeholder="Inserire Indirizzo" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-12">    
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Provincia</label>
                                                        <div class="col-sm-8">
                                                            <select id="provres" name="provres" class="form-control"required>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Comune</label>
                                                        <div class="col-sm-8">
                                                                <select id="luogores" name="luogores" class="form-control" required></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">CAP</label>
                                                        <div class="col-sm-4">
                                                    <input type="text" id="capres" name="capres" maxlength="5" value="<?=$cli['capres']?>" placeholder="Inserire CAP" class="form-control" required>
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
                                                                    <input type="email" id="mail1" name="mail1" value="<?=$cli['mail1']?>"placeholder="Inserire eMail 1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                
                                               
                                                    <div class="col-6 col-md-12 ">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">eMail 2</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" id="mail2" name="mail2" value="<?=$cli['mail2']?>" placeholder="Inserire eMail 2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row col-12"> 
                                                <div class="col-6 col-md-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel1" name="tel1" maxlength="15" value="<?=$cli['tel1']?$cli['tel1']:''?>" placeholder="Inserire Telefono 1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Telefono 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="tel2" name="tel2" maxlength="15" value="<?=$cli['tel2']?$cli['tel2']:''?>" placeholder="Inserire Telefono 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">     
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 1</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile1" name="mobile1" maxlength="15" value="<?=$cli['mobile1']?$cli['mobile1']:''?>" placeholder="Inserire Mobile 1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile 2</label>
                                                        <div class="col-sm-8">
                                                    <input type="text" id="mobile2" name="mobile2" maxlength="15" value="<?=$cli['mobile2']?$cli['mobile2']:''?>" placeholder="Inserire Mobile 2" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12"> 
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                    <h5><i class="fa fa-id-card"></i> Dati Patente di Guida</h5>                                                   </h5></div>
                                                </div>
                                            </div> 
                                            <div class="row col-12"> 

                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Data Rilascio</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="data_rilascio" id="data_rilascio_mod" class="form-control" value="<?=$patente['data_rilascio']?$patente['data_rilascio']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Data scadenza</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="data_scadenza" id="data_scadenza_mod"class="form-control" value="<?=$patente['data_scadenza']?$patente['data_scadenza']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-12">
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">ente Rilascio</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" oninput="this.value = this.value.toUpperCase()"name="ente_rilascio" id="ente_rilascio_mod"class="form-control" placeholder="Inserire Ente" value="<?=$patente['ente_rilascio']?$patente['ente_rilascio']:''?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Numero</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"oninput="this.value = this.value.toUpperCase()" name="numero_patente" id="numero_patente_mod" placeholder="Inserire Numero" class="form-control" value="<?=$patente['numero_patente']?$patente['numero_patente']:''?>" required>
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
                                                        <?php if($cliente){
                                                                if(file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patfront.jpg")){?>
                                                                <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#imagemodal1"> <i class="fa fa-check"></i> </button> 
                                                                <img alt="Image placeholder" src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patfront.jpg?<?=strtotime(date("Y-m-d H:i:s"));?>" class="product-img" href="#imagemodal1"data-toggle="modal" data-target="#imagemodal1">
                                                                
                                                                <br>Aggiorna Fronte Patente <input type="file"  accept="image/*" capture id="patfront" name="patfront" class="" >        
                                                       <? }else{?>
                                                            <input type="file" id="patfront" name="patfront"  accept="image/*" capture class="btn btn-success" required>
                                                            <?}
                                                        }else{?>
                                                        <input type="file" id="patfront"  name="patfront"  accept="image/*" capture class="btn btn-success" required>
                                                        <?}?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 ">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">retro</label>
                                                        <div class="col-sm-8">
                                                        <?php
                                                        if($cliente){
                                                            if(file_exists("docs/CRM/Allegati/patente/".$cli['id']."_patrear.jpg")){?>
                                                            <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#imagemodal1"> <i class="fa fa-check"></i> </button>
                                                            <img alt="Image placeholder" src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patrear.jpg?<?=strtotime(date("Y-m-d H:i:s"));?>" class="product-img" data-toggle="modal" data-target="#imagemodal1">
                                                            <br>Aggiorna Retro Patente <input type="file"  accept="image/*" capture id="patrear" name="patrear" class="" >        

                                                               
                                                       <? }else{?>
                                                            <input type="file" id="patrear" name="patrear" accept="image/*" capture  class="btn btn-success" required>
                                                            <?}?>
                                                            <? }else{?>
                                                            <input type="file" id="patrear"  name="patrear" accept="image/*" capture class="btn btn-success" required>
                                                            <?}?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                

                                                
                                           


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                            <button type="button" id="addbtnformcli" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?=$cliente?'Aggiornamento Dati':'Inserimento Nuovo'?> Cliente</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <img src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patfront.jpg?<?=strtotime(date("Y-m-d H:i:s"));?>" style="width:100%;padding: 25px;" alt="Card image cap">

                        <img src="docs/CRM/Allegati/patente/<?=$cli['id']?>_patrear.jpg?<?=strtotime(date("Y-m-d H:i:s"));?>"  style="width:100%;padding: 25px;" alt="Card image cap">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> chiudi</button>
                        
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
                            chiedo di poter usare in comodato di prova gratuito la moto/scooter HONDA
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
            <div class="col-lg-4">
		     <!-- Large Size Modal -->
              <!-- Modal -->
                <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Aggiungi Nuovo Veicolo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="addform" action="controller/updateVeicoli_usati.php" method="post">

                        <div class="modal-body">
                                <input type="hidden" name="action" value="saveVeicoloTr">
                            <div class="form-group row">
                                <label for="targa" class="col-sm-4 col-form-label">Targa</label>
                                <div class="col-sm-2">
                                    <input type="text" oninput="this.value = this.value.toUpperCase();"maxlength="7" class="form-control"  id="new_targa">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="marca" class="col-sm-4 col-form-label">Marca</label>
                                <div class="col-sm-4">
                                    <input type="text" oninput="this.value = this.value.toUpperCase();" maxlength="20"class="form-control"  id="new_marca">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="modello" class="col-sm-4 col-form-label">Modello</label>
                                <div class="col-sm-8">
                                    <input type="text" oninput="this.value = this.value.toUpperCase();" maxlength="50" class="form-control"  id="new_modello">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Abilitazione<br>TestRide</label>
                                <div class="col-sm-2">
                                <input type="checkbox" checked="checked" id="ab_testride" class="js-switch" data-color="#04b962" data-size="small" data-secondary-color="#f43643"/>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colore" class="col-sm-4 col-form-label">Colore<br>TestRide</label>
                                <div class="col-sm-2">
                                <select id="colorselector_1" name="new_colore_tr">
                                <option value="#A0522D" data-color="#A0522D">sienna</option>
                                <option value="#CD5C5C" data-color="#CD5C5C" selected="selected">indianred</option>
                                <option value="#FF4500" data-color="#FF4500">orangered</option>
                                <option value="#008B8B" data-color="#008B8B">darkcyan</option>
                                <option value="#B8860B" data-color="#B8860B">darkgoldenrod</option>
                                <option value="#32CD32" data-color="#32CD32">limegreen</option>
                                <option value="#FFD700" data-color="#FFD700">gold</option>
                                <option value="#48D1CC" data-color="#48D1CC">mediumturquoise</option>
                                <option value="#87CEEB" data-color="#87CEEB">skyblue</option>
                                <option value="#FF69B4" data-color="#FF69B4">hotpink</option>
                                <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                <option value="#87CEFA" data-color="#87CEFA">lightskyblue</option>
                                <option value="#6495ED" data-color="#6495ED">cornflowerblue</option>
                                <option value="#DC143C" data-color="#DC143C">crimson</option>
                                <option value="#FF8C00" data-color="#FF8C00">darkorange</option>
                                <option value="#C71585" data-color="#C71585">mediumvioletred</option>
                                
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_km" class="col-sm-4 col-form-label">KM</label>
                                <div class="col-sm-2">
                                    <input type="number" value="1" class="form-control" id="new_km">
                                    
                                </div>
                            </div>
                            


                        
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                        <button type="button" id="newbike" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
		   </div>
        </div>
    </div>
</div>    