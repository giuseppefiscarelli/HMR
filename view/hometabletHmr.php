    <?php
    require_once 'model/test_ride.php';
    $testRideDay = getTestDay();
    $testevent = getEvent();
    //var_dump($testevent);
    if(isMobile()){
    ?>
    
    <div class="col-xl-6 col-12">
        <div class="card-body">
            <a style="padding: 40px;font-size: 45px;" type="button" href="test_rideUpdate.php?action=fastinsert" class="btn btn-info btn-lg btn-round btn-block m-1">Nuovo Test</a>
            </div>
    </div>
    <div class="col-xl-6 col-12">
        <div class="card-body">      
            <a style="padding: 40px;font-size: 45px;" type="button" href="test_rideUpdate.php?action=insert" class="btn btn-warning btn-lg btn-round btn-block m-1">Nuova Prenotazione</a>
            
        </div>
    </div>
    <?}else{?>
        <div class="col-xl-6 col-12">
        <div class="card-body">
            <a style="min-width:50%;" type="button" href="test_rideUpdate.php?action=fastinsert" class="btn btn-info btn-lg btn-round ">Nuovo Test</a>
            <a style="min-width:50%;" type="button" href="test_rideUpdate.php?action=insert" class="btn btn-warning btn-lg btn-round ">Nuova Prenotazione</a>

            </div>

    </div>


    <?}?>

    <div class="row">
        <div class="col-xl-6 col-12">
            <div class="row align-items-center">
            
                <div class="col-12 ">         
                    <div class="card rounded-0">
                        <div class="card-header text-uppercase">Prenotazioni Test Ride Giornalieri</div> 
                            
                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                        <?php if($testRideDay){?>
                                        <thead>
                                            <tr>
                                                <th>n° test<br>Consulente</th>
                                                <th>Veicolo<br>Cliente</th>
                                                <th>Ora consegna<br>Stato</th>
                                                <th style="width: 150px;text-align:center;">Operazioni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                foreach($testRideDay as $tr){
                                                    $m = getMotoinfo($tr['id_veicolo']);
                                                    
                                                    if($tr['id_cliente']){
                                                        $cli = getclientecf($tr['id_cliente']);
                                                        }else{
                                                        $cli =[
                                                            'cognome' =>'Prenotazione ',
                                                            'nome' => 'telefonica/email',
                                                            'codfiscale' => 'Dati cliente non presenti'
                                                            
                                                        ];

                                                        }
                                                    if($tr['stato_test']=='P'){
                                                    ?>
                                                        

                                            
                                                <tr >
                                                    <td>id #<?=$tr['id']?><br><?=$tr['user_pren']?></td>
                                                    <td ><a title="Gestione Test Ride" href="test_ridePage.php?id=<?=$tr['id']?>"><?=$m['marca']?> <?=$m['modello']?><br>Targa <?=$m['targa']?><br>

                                                        <?=$cli['cognome']?> <?=$cli['nome']?></a></td>

                                                        <td><?=$tr['data_cons']?date("H:i", strtotime($tr['data_cons'])): date("H:i", strtotime($tr['data_pren']))?><br>
                                                        <?php if($tr['data_ricons']){?>
                                                        <span class="badge badge-pill badge-success shadow-success m-1"> Riconsegnato</span>
                                                        <? }elseif($tr['data_cons']){?>
                                                        <span class="badge badge-pill badge-warning shadow-warning m-1"> In Test</span>
                                                        <?}elseif(!$tr['data_cons']){?>
                                                            <span class="badge badge-pill badge-info shadow-info m-1"> Da consegnare</span>
                                                        <?}if(!$tr['id_cliente']){?>
                                                            <br><span class="badge badge-pill badge-danger shadow-info m-1"> Dati incompleti</span>         
                                                        <?}
                                                        ?>
                                                        </td>
                                                        <td><!--
                                                        <a type="button" class="btn btn-warning btn-block btn-round m-1" data-toggle="modal" onclick="getModal(<?=$tr['id']?>,<?=$m['km']?>);"data-target="#modal-cons" <?=$tr['id_cliente']?'':'style="display:none;"'?>><i class="fa fa-sign-out" aria-hidden="true" ></i> Consegna</a>-->
                                                        <br><a type="button" class="btn btn-success btn-block btn-round m-1" href="test_ridePage.php?id=<?=$tr['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione</a>
                                                        </td>
                                                </tr>
                                                        
                                                        
                                            <?          }
                                                    }  

                                                }else{?>
                                                        <tr colspan="4"><td style="text-align: center;">Siamo spiacenti! Oggi non ci sono Test Ride in programma!  </td></tr>
                                                <?}?>  
                                        </tbody>            
                                    </table>
                                </div>            
                            
                      
                    </div>  
                </div>    
              
       
                <div class="col-12 " style="<?=$testRideDay?'display:show;':'display:none;'?>">         

                    <div class="card rounded-0">
                        <div class="card-header text-uppercase">Test Ride in Corso</div>
                            
                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                    <?php if($testRideDay){?>
                                        <thead>
                                            <tr>
                                                <th>n° test<br>Consulente</th>
                                                <th>Veicolo<br>Cliente</th>
                                                <th>Ora consegna<br>Stato</th>
                                                <th style="width: 150px;text-align:center;">Operazioni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                foreach($testRideDay as $tr){
                                                    $m = getMotoinfo($tr['id_veicolo']);
                                                    $cli = getClientecf($tr['id_cliente']);
                                                    if($tr['data_cons']&&!$tr['data_ricons']){
                                                    ?>
                                                        

                                            
                                                <tr >
                                                    <td>id #<?=$tr['id']?><br><?=$tr['user_pren']?></td>
                                                    <td ><a title="Gestione Test Ride" href="test_ridePage.php?id=<?=$tr['id']?>"><?=$m['marca']?> <?=$m['modello']?><br>Targa <?=$m['targa']?><br>
                                                        <?=$cli['cognome']?> <?=$cli['nome']?></a></td>
                                                        <td><?=$tr['data_cons']?date("H:i", strtotime($tr['data_cons'])): date("H:i", strtotime($tr['data_pren']))?><br>
                                                        <?php if($tr['data_ricons']){?>
                                                        <span class="badge badge-pill badge-success shadow-success m-1"> Riconsegnato</span>
                                                        <? }elseif($tr['data_cons']){?>
                                                        <span class="badge badge-pill badge-warning shadow-warning m-1"> In Test</span>
                                                        <?}elseif(!$tr['data_cons']){?>
                                                            <span class="badge badge-pill badge-info shadow-info m-1"> Da consegnare</span>
                                                        <?}
                                                        ?>
                                                        </td>
                                                        <td><!--
                                                        <a type="button" class="btn btn-info  btn-block btn-round m-1" data-toggle="modal" data-target="#modal-ricons"><i class="fa fa-sign-in" aria-hidden="true"></i> riconsegna</a>-->
                                                        <br><a type="button" class="btn btn-success btn-block btn-round m-1" href="test_ridePage.php?id=<?=$tr['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione</a>
                                                        </td>
                                                </tr>
                                                        
                                            <?          }

                                            
                                                    }  

                                                }else{?>
                                                        <tr colspan="4"><td style="text-align: center;">Siamo spiacenti! Non ci sono Test Ride On the Road !</td></tr>
                                                <?}?>  
                                        </tbody>            
                                    </table>
                                </div>            
                           
                       
                    </div>
                </div>                                    
                <div class="col-12 ">         
                    <div class="card rounded-0">
                        <div class="card-header text-uppercase">Test Ride Giornalieri Effettuati</div> 
                        
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                 <?php if($testRideDay){?>
                                    <thead>
                                        <tr>
                                            <th>n° test<br>Consulente</th>
                                            <th>Veicolo<br>Cliente</th>
                                            <th>Ora consegna<br>Stato</th>
                                            <th style="width: 150px;text-align:center;">Operazioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                            foreach($testRideDay as $tr){
                                                $m = getMotoinfo($tr['id_veicolo']);
                                                
                                                if($tr['id_cliente']){
                                                    $cli = getclientecf($tr['id_cliente']);
                                                    }else{
                                                    $cli =[
                                                        'cognome' =>'Prenotazione ',
                                                        'nome' => 'telefonica/email',
                                                        'codfiscale' => 'Dati cliente non presenti'
                                                        
                                                    ];

                                                    }
                                                if($tr['stato_test']=='E'){
                                                ?>
                                                    

                                        
                                            <tr>
                                                <td>id #<?=$tr['id']?><br><?=$tr['user_pren']?></td>
                                                <td><?=$m['marca']?> <?=$m['modello']?><br>Targa <?=$m['targa']?><br>

                                                    <?=$cli['cognome']?> <?=$cli['nome']?></td>

                                                    <td><?=$tr['data_cons']?date("H:i", strtotime($tr['data_cons'])): date("H:i", strtotime($tr['data_pren']))?><br>
                                                    <?php if($tr['data_ricons']){?>
                                                    <span class="badge badge-pill badge-success shadow-success m-1"> Riconsegnato</span>
                                                    <? }elseif($tr['data_cons']){?>
                                                    <span class="badge badge-pill badge-warning shadow-warning m-1"> In Test</span>
                                                    <?}elseif(!$tr['data_cons']){?>
                                                        <span class="badge badge-pill badge-info shadow-info m-1"> Da consegnare</span>
                                                    <?}if(!$tr['id_cliente']){?>
                                                        <br><span class="badge badge-pill badge-danger shadow-info m-1"> Dati incompleti</span>         
                                                    <?}
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <a type="button" class="btn btn-info btn-block  btn-round m-1" href="questionario.php?id=<?=$tr['id']?>" <?=$tr['id_cliente']?'':'style="display:none;"'?>><i class="fa fa-sign-out" aria-hidden="true" ></i> Questionario</a>
                                                    <br><a type="button" class="btn btn-success  btn-block btn-round m-1" href="test_ridePage.php?id=<?=$tr['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione</a>
                                                    </td>
                                            </tr>
                                                    
                                                    
                                        <?          }
                                                }  

                                            }else{?>
                                                    <tr colspan="4"><td style="text-align: center;">Siamo spiacenti! Oggi non ci sono Test Ride in programma!  </td></tr>
                                            <?}?>  
                                    </tbody>            
                                </table>
                            </div>            
                        
                    </div>
                </div>
            </div>
        </div>                                           
        
        <div class="col-xl-6 col-md-12">
            <div id="calendar"></div>
        </div>
       
    </div>                                        
                                           



                                       
                                            <div class="modal fade" id="modal-cons" style="display: none;" aria-hidden="true">
                                                <form id="upform" action="controller/updateTestride.php" method="post"> 
                                                    <input type="hidden" id="id_tr" name="id" value="">
                                                    <input type="hidden" id="id_veicolo" value="">
                                                    <input type="hidden" id="id_cliente" name="id_cliente" value="">
                                                    <input type="hidden" name="action" value ="storeTestrideConsHome">
                                                    <input type="hidden" name="signCode" id="signCode"value="">  
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 100%;padding:30px;">
                                                        <div class="modal-content animated slideInUp">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Consegna moto TestRide</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                                
                                                            <div class="modal-body" style="display:<?=$tr['id_cliente']&&$patente?'':'none'?>">
                                                                <div class="row">
                                                                        <div class="col-12 col-lg-4">
                                                                            <div class="col-12  ">
                                                                            
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-12 col-form-label">KM</label>
                                                                                    <div class="col-sm-2 col-12">
                                                                                    
                                                                                        <input type="number" id="km_cons" name="km_cons" class="form-control" value="">
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
                                                                                    <textarea rows="3" class="form-control" id="basic-textarea" id="report2" name="report2"></textarea>                                   
                                                                                    </div>
                                                                              
                                                                                </div>
                                                                            </div> 
                                                                        </div> 

                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="row">
                                                                                <a href="#termcondmodal" data-toggle="modal" data-target="#termcondmodal">Termini e Condizioni</a>
                                                                            </div> 
                                                                            <div class="col-12">

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
                                                                                                        <input name="priv1" type="radio" id="priv1a" value="A"checked="">
                                                                                                        <label for="priv1a">Presto il Consenso</label>
                                                                                                    </div>
                                                                                                    <div class="icheck-material-success icheck-inline">
                                                                                                        <input name="priv1" type="radio" id="priv1b" value="B">
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
                                                                                                        <input name="priv2" type="radio" id="priv2a" value="A"checked="">
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
                                                                                                        <input name="priv3" type="radio" id="priv3a" value="A"checked="">
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
                                                                                                            <input name="quest_tr1" type="radio" id="quest_tr1a" value="A">
                                                                                                            <label for="quest_tr1a">Pubblicità</label>
                                                                                                        </div>
                                                                                                        <div class="icheck-material-success icheck-inline">
                                                                                                            <input name="quest_tr1" type="radio" id="quest_tr1b" value="B">
                                                                                                            <label for="quest_tr1b">Internet</label>
                                                                                                        </div>
                                                                                                        <div class="icheck-material-success icheck-inline">
                                                                                                            <input name="quest_tr1" type="radio" id="quest_tr1c" value="C">
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
                                                                                                            <input name="quest_tr1" type="radio" id="quest_tr1f" value="F">
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
                                                                                                <b>	7. Quale sito visita pi� difrequente?

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
                                                                                

                                                                            <?php
                                                                                    
                                                                                    if(file_exists("docs/testride/sign/".$cli['id']."_sig_cons_tr_".$tr['id'].".png")){

                                                                                    
                                                                                    ?>
                                                                                <img src="docs/testride/sign/<?=$cli['id']?>_sig_cons_tr_<?=$tr['id']?>.png" >
                                                                                    <?php
                                                                                }else{ ?>
                                                                            
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
                                                                                <?php } 
                                                                                ?>   
                                                                            </div>         
                                                                        </div> 
                                                                </div> 
                                                                
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                                                <button type="submit" class="btn btn-success"onclick="confCons();"><i class="fa fa-check-square-o"></i> Conferma Consegna</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>                        
                                            </div>
                                            <div class="modal fade" id="modal-ricons" style="display: none;" aria-hidden="true">
                                                <form id="upform" action="controller/updateTestride.php" method="post"> 
                                                <input type="hidden" id="id" name="id" value="<?=$tr['id']?>">
                                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$cli['id']?>">
                                                <input type="hidden" id="id_veicolo" name="id_veicolo" value="<?=$tr['id_veicolo']?>">
                                                <input type="hidden" name="action" value ="storeTestrideRiconsHome">
                                                <input type="hidden" name="signCode2" id="signCode2" value="">
                                                <input type="hidden" name="data_cons" id="data_cons" value="<?=$tr['data_cons']?>" >
                                                    <div class="modal-dialog modal-lg " style="position: fixed;right: 0;bottom: 0;">
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
                                                                            <input type="text" id="km" name="km_ricons" class="form-control" value="<?=$tr['km_cons']?>">
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
                                                                                <textarea rows="3" class="form-control" id="basic-textarea"></textarea>  
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <?php
                                                                        if( file_exists("docs/testride/sign/".$cli['id']."_sig_ricons_tr_".$tr['id'].".png")){

                                                                        
                                                                        ?>
                                                                    <img src="docs/testride/sign/<?=$cli['id']?>_sig_ricons_tr_<?=$tr['id']?>.png" >
                                                                        <?php }else{ ?>
                                                                    
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
                                                                    <?php } ?>               
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                                                <button type="submit" class="btn btn-success"onclick="conferma();"><i class="fa fa-check-square-o"></i> Conferma Riconsegna</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>                        
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