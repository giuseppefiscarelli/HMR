<div class="row" id="wizardbody" style="display:none;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-uppercase">
                Nuovo Preventivo / Contratto
            </div>
            <div class="card-body"> 
                <form id="wizard-validation-form" action="controller/updateContratto.php" method="post">
                <input type="hidden" name="action" value="saveContratto">
                <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$cli['codfiscale']?>">
                <input type="hidden" name="id_contratto" id="id_contratto"value="">
                <input type="hidden" name="id_veicolo" id="id_veicolo" value="">
                <input type="hidden" name="id_permuta" id="id_permuta" value="0">
                <input type="hidden" name="stato_stima" id="stato_stima" value="N">
                <input type="hidden" name="imp_permuta" id="imp_permuta" value="0">
                <input type="hidden" name="id_pratica" id="id_pratica" value="<?=$idFin?>">
                <input type="hidden" name="imp_pratica" id="imp_pratica" value="<?=$idFin?$pratica['imp_richiesto']:0?>">
                <input type="hidden" name="user_ins" id="user_ins" value="<?=$_SESSION['userData']['username']?>">
                <input type="hidden" name="imp_accessori" id="imp_accessori"  value="0">
                <input type="hidden" name="imp_sco_accessori" id="imp_sco_accessori"  value="0">
                <input type="hidden" name="imp_veicolo_siva" id="imp_veicolo_siva"  value="">
                <input type="hidden" name="imp_veicolo_iva" id="imp_veicolo_iva"  value="">
                <input type="hidden" name="imp_imma" id="imp_imma"  value="">
                <input type="hidden" name="iva" id="iva"  value="">
                <input type="hidden" id="tot_scontato" name="tot_scontato" value="">
                <input type="hidden" id="imp_finale" name="imp_finale" value="0">
                <input type="hidden" id="id_fin" name="id_fin" value="<?=$idFin?$pratica['id_finanziaria']:''?>">
                <input type="hidden" name="imp_saldo" id="imp_saldo"  value="0">
                
                <input type="hidden" name="signCode" id="signCode" value=""> 




                    <div>
                           
                        <h3><i class="fa fa-user-plus" aria-hidden="true"></i> Dati Cliente</h3>
                        <section> <!-- cliente -->
                        
                            <div class="row">
                                <div class=" col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ricerca Cliente</h5>
                                            <div class="input-group-prepend  col 12" >
                                                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                                <input type="text" id="autocomplete" name="autocomplete"  
                                                value="" maxlength="16" placeholder="Inserisci / Scansione Codice Fiscale - Ricerca per Nome/Cognome - Ricerca per Email-cellulare" 
                                                class="form-control ui-autocomplete-input <?=$cliente?'':'required'?>"  autocomplete="off">       
                                            </div>
                                            <div class="input-group-prepend col-lg-4 col-12">
                                                <button type="button" class="btn btn-primary btn-block m-1" 
                                                data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                <i class="fa fa-<?=$cliente?'edit':'user-plus'?>"></i> <?=$cliente?'Modifica dati Cliente':'Inserimento Nuovo Cliente'?> </button>
                                            </div>
                                              

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="<?=$cliente?'':'display:none;'?>">
                                <div class="col-12">
                                    <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Dati Cliente</h5>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>ID</td>
                                                                    <td style="text-align: right;"><b><?=$cli['id']?></b></td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td><?php if ($checkclinom){?>
                                                                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 400px;">
                                                                            <div class="alert-icon">
                                                                                    <i class="fa fa-check"></i>
                                                                            </div>
                                                                            <div class="alert-message">
                                                                                <span>Nominativo Completo</span>
                                                                            </div>
                                                                        </div>
                                                                        <?}else{?> 
                                                                        <div class="alert alert-warning alert-dismissible mb-0" style="margin-right: 10px;max-width: 400px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                                                <div class="alert-icon">
                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                </div>
                                                                                <div class="alert-message">
                                                                                <span><strong>Attenzione!</strong> Nominativo Incompleto!</span>
                                                                                <?=$checkcap?'':'<br>Verifica CAP'?>
                                                                                </div>
                                                                        </div>  
                                                                        <?}?>     </td>
                                                                    <td style="text-align: right;"><b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                                                    <br>CF <b><?=$cli['codfiscale']?></b></td>
                                                                    
                                                                <tr>
                                                                    <td>
                                                                        <?php if ($checkcliana){?>
                                                                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 400px;">
                                                                            <div class="alert-icon">
                                                                                    <i class="fa fa-check"></i>
                                                                            </div>
                                                                            <div class="alert-message">
                                                                                <span>Dati Anagrafici Completi</span>
                                                                            </div>
                                                                        </div>
                                                                        <?}else{?> 
                                                                        <div class="alert alert-warning alert-dismissible mb-0" style="margin-right: 10px;max-width: 400px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                                                <div class="alert-icon">
                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                </div>
                                                                                <div class="alert-message">
                                                                                <span><strong>Attenzione!</strong> Dati Anagrafici Incompleti!</span>

                                                                                </div>
                                                                        </div>  
                                                                        <?}?>     
                                                                    </td>
                                                                    <td style="text-align: right;">nato/a a <b><?=$cli['user_mod']?getComune($cli['luogonasc']):$cli['luogonasc']?>(<?=$cli['provnasc']?>)</b>
                                                                        <br>il <b><?=date("d/m/Y", strtotime($cli['datanasc']))?><b>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <?php if ($checkclires){?>
                                                                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 400px;">
                                                                            <div class="alert-icon">
                                                                                    <i class="fa fa-check"></i>
                                                                            </div>
                                                                            <div class="alert-message">
                                                                                <span>Dati Anagrafici Completi</span>
                                                                            </div>
                                                                        </div>
                                                                        <?}else{?> 
                                                                        <div class="alert alert-warning alert-dismissible mb-0" style="margin-right: 10px;max-width: 400px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                                                <div class="alert-icon">
                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                </div>
                                                                                <div class="alert-message">
                                                                                <span><strong>Attenzione!</strong> Dati Residenza Incompleti!</span>
                                                                                <?=$checkcap?'':'<br>Verifica CAP'?>
                                                                                </div>
                                                                        </div>  
                                                                        <?}?>     
                                                                    </td>
                                                                    <td style="text-align: right;"><b><?=$cli['indirizzores']?>
                                                                    <br><?=$cli['capres']?> - <?=$cli['user_mod']?getComune($cli['luogores']):$cli['luogores']?>(<?=$cli['provres']?>)
                                                                        </b></td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <?php if ($checkclicon){?>
                                                                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-right: 10px;max-width: 400px;">
                                                                            <div class="alert-icon">
                                                                                    <i class="fa fa-check"></i>
                                                                            </div>
                                                                            <div class="alert-message">
                                                                                <span>Contatti Completi</span>
                                                                            </div>
                                                                        </div>
                                                                        <?}else{?> 
                                                                        <div class="alert alert-warning alert-dismissible mb-0" style="margin-right: 10px;max-width: 400px;cursor:pointer;" title="Aggiorna dati"role="alert" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalcliente">
                                                                                <div class="alert-icon">
                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                </div>
                                                                                <div class="alert-message">
                                                                                <span><strong>Attenzione!</strong> Contatti Incompleti!</span>
                                                                                
                                                                                </div>
                                                                        </div>  
                                                                        <?}?>     
                                                                    </td>
                                                                    <td style="text-align: right;"><?=$cli['mail1']?> 
                                                                    <br><?=$cli['tel1']?> 
                                                                    <br><?=$cli['mobile1']?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>

                                           



                                           
                                    </div>
                                </div>
                                            
                                <div class="col-lg-6 col-12">
                                     
                                </div>    
                                    
                            </div>
                        </section>
                        <h3><i class="fa fa-motorcycle" aria-hidden="true"></i> Scelta Veicolo</h3>
                        <section> <!-- veicolo -->
                             <div class="row info-list">
                                <div class="col-lg-6 info-cli sel2">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-user"></i> Dati Cliente</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Cod Cliente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['id']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Nominativo Clente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Codice Fiscale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['codfiscale']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                            </ul>
                                           
                                    </div>
                                </div>
                                <div class="col-lg-6 info-contr" style="display:none;">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Dati Veicolo</div>
                                        <ul class="list-group list-group-flush shadow-none">

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Mod Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="mod_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Colore Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="col_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Prezzo su Strada IVA incl</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="pvei_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            

                                        </ul>
                                    </div>
                                </div>        
                            </div>
                            
                            <div class="card">
                                <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Modello Moto</div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="mod_veicolo" class="col-sm-3 col-form-label">Modello</label>
                                        <div class="col-sm-9">
                                            <select class="selectpicker form-control" id="mod_veicolo">
                                            <option >Seleziona Modello</option>
                                                <?php
                                                $moto=getMotolist();
                                                
                                                if($moto){
                                                foreach($moto as $m){
                                                    $des =$m['lisdes'];
                                                    $mag = getMotomag($des);
                                                    
                                                    ?>
                                                 
                                                        <option <?php if($id){ 
                                                            if($des == $selVei['descrizione']){
                                                                echo "selected";
                                                            }
                                                        }?> data-content="<?=$m['lisdes']?>  <?=$mag >0?'<span class=\'badge badge-success\'> Disponibili '.$mag.' unità</span>':''?>" value="<?=$m['lisdve']?>"><?=$m['lisdes']?></option>

                                                <?      
                                                    }
                                                }
                                                ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="sel_colore">
                                        <label for="col_veicolo" class="col-sm-3 col-form-label">Colore</label>
                                        <div class="col-sm-9">
                                            <select class="selectpicker form-control required " id="col_veicolo" >
                                                    <?php
                                                        if($id){
                                                            
                                                            foreach($modVei as $mVei){?>
                                                        <option <?=$mVei['id']==$idVei?'selected':''?> data-content="<?=$mVei['cod_col']." - ".$mVei['des_col']?>" value="<?=$mVei['id']?>">
                                                       <?     }
                                                        }else{
                                                    ?>


                                                <option selected disabled>Selezionare prima il modello</option>
                                                <?}?>
                                            </select>
                                        </div>
                                    </div>
                                     
                                                            
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prezzo IVA Escl</label>
                                        <div class="col-sm-2">
                                            <a  id="piesc" name="piesc" class="<?=$id?'importi':''?>"><?=$id?$lisVei['lisppe']:''?></a>	                
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Immatricolazione IVA Escl</label>
                                        <div class="col-sm-2">
                                            <a   id="pimma" name="pimma" class="<?=$id?'importi':''?>"><?=$id?250.00:''?></a>		                
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Aliquota Iva</label>
                                        <div class="col-sm-2">
                                            <a id="aliva" name="aliva" class="<?=$id?'importi':''?>" ><?=$id?$lisVei['lisiva']:''?></a>		                
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Prezzo veicolo IVA inclusa</label>
                                        <div class="col-sm-2">
                                            <a   id="piinc" name="piinc" class="<?=$id?'importi':''?>" ><?=$id?$lisVei['lisppi']:''?></a>		                
                                        </div>
                                    </div> 
                                    
                                      

                                </div>                    
                            </div>  
                            <div class="card" id="dispvei" style="display:none">
                                <div class="card-header text-uppercase"><i class="fa fa-industry"></i> Veicoli Disponibili</div>
                                <div class="card-body">
                                    <div class="row col-md-6">
                                    <b>Il telaio selezionato verrà riservato per questo contratto</b>
                                    </div>                
                                    <div class="row col-md-6" id="telai">
                                
                                        <div class="icheck-material-danger telaio">
                                            <input type="radio" id="danger1" name="telaio" >
                                            <label for="danger1">Danger 1</label>
                                        </div>
                                        <div class="icheck-material-danger telaio">
                                            <input type="radio" id="danger2" name="telaio">
                                            <label for="danger2">Danger 2</label>
                                        </div>

                                    </div>
                                    
                                </div>
                            
                            </div>                  
                        </section> 
                        <h3><i class="fa fa-plus-circle" aria-hidden="true"></i> Accessori</h3>
                        <section> <!-- accessori -->
                        <div class="row info-list">
                                <div class="col-lg-6 info-cli sel2">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-user"></i> Dati Cliente</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Cod Cliente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['id']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Nominativo Clente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Codice Fiscale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['codfiscale']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                            </ul>
                                           
                                    </div>
                                </div>
                                <div class="col-lg-6 info-contr" style="display:none;">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Dati Veicolo</div>
                                        <ul class="list-group list-group-flush shadow-none list_veicolo">

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Mod Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;text-align:right;">
                                                    <b class="mod_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Colore Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="col_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo su Strada IVA incl</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="pvei_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Veicolo</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scovei_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="acc_info" style="color:green;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scoacc_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Permuta</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="per_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Subtotale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="sub_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            

                                        </ul>
                                    </div>
                                </div>        
                            </div>
                           
                            <hr>						            
                            <div class="row">     
                                <div class="col-12 col-md-6">
                                    <div class="input-group mb-3" style="margin-left:4px;margin-top:16px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                            <input type="text" id="accessori" name="accessori" value="" placeholder="Cerca cod/descrizione Articolo" class="form-control ui-autocomplete-input" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="display:none" id="acc_info">
                                    <div class="card">
                                        <div class="card-header text-uppercase">Dettaglio Accessorio</div>
                                        
                                            <ul class="list-group list-group-flush shadow-none">

                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Codice Articolo</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <b id="acc_cod" name="acc_cod"></b>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Descrizione</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <b id="acc_des" name="acc_des"></b>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">unità di misura</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <b id="acc_udm" name="acc_udm"></b>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Prezzo IVA escl.</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <a id="acc_pre" name="acc_pre"></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Prezzo IVA incl</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <a  id="acc_pri" name="acc_pri"></a>
                                                        <a  id="acc_pri2" name="acc_pri2" value=""></a>

                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        
                                                        </div>
                                                        <div class="date" style="margin:7px;">
                                                            <input type="button" id="acc_add" class="btn btn-sm btn-success" value="Seleziona">
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                            
                                        
                                    </div>
                                </div>
                            </div>   
                            <div class="row">				
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="acc_table" style="display:none;">
                                                    <thead>
                                                        <tr>								              
                                                            <th ></th>								             
                                                            <th style="font-size: 10px;">Codice</th>
                                                            <th style="font-size: 10px;width:400px;">Descrizione</th>
                                                            <th style="font-size: 10px;width:80px;">Quantita'</th>
                                                            <th style="font-size: 10px;width:35px;">UdM</th>
                                                            <th style="font-size: 10px;">Prezzo</th>
                                                            <th style="font-size: 10px;min-width: 220px;">Sconto</th>
                                                            <th style="font-size: 10px;">Totale</th>
                                                           
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="7" style="text-align: right;">Totale Accessori (iva inclusa) </td>
                                                        <td><b id="totale_acc"> </b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>    
                                    </div>
                                </div>
            
                            </div>           
                        </section>
                        <h3><i class="fa fa-motorcycle" aria-hidden="true"></i> Permuta</h3>
                        <section> <!-- permuta -->
                        <div class="row info-list">
                                <div class="col-lg-6 info-cli sel2">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-user"></i> Dati Cliente</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Cod Cliente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['id']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Nominativo Clente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Codice Fiscale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['codfiscale']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                            </ul>
                                           
                                    </div>
                                </div>
                                <div class="col-lg-6 info-contr" style="display:none;">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Dati Veicolo</div>
                                        <ul class="list-group list-group-flush shadow-none list_veicolo">

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Mod Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;text-align:right;">
                                                    <b class="mod_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Colore Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="col_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo su Strada IVA incl</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="pvei_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Veicolo</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scovei_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="acc_info" style="color:green;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scoacc_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Permuta</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="per_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Subtotale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="sub_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            

                                        </ul>
                                    </div>
                                </div>        
                            </div>
                            <hr>
                            <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="permuta" class="col-sm-2 col-form-label">Permuta Veicolo Usato</label>
                                            <div class="col-sm-4">
                                                <select id="permuta" name="permuta" class="form-control" >
                                                    <option value="N">Non Presente</option> 
                                                    <option value="S">Presente - Aggiungi Nuova</option> 
                                                    <?php
                                                    $permuta = getPermute($cli['codfiscale']);
                                                    //var_dump($permuta);
                                                    if($permuta){
                                                    ?>
                                                    <option value="P">Presente - Veicoli già Valutati</option> 
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="card_permuta_val" style="display:none;">
                                        <div class="form-group row">
                                            <label for="permuta_val" class="col-sm-2 col-form-label">Veicolo Valutato</label>
                                            <div class="col-sm-4">
                                                <select id="permuta_val" name="permuta_val" class="form-control" >
                                                    <option value="">Seleziona Veicolo</option> 
                                                    <?php 
                                                    foreach($permuta as $per){?>
                                                    <option value="<?=$per['id']?>"><?=$per['targa']?> - <?=$per['modello']?> - <?=$per['stima']?></option>

                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="card_permuta"style="display:none;">
                                     <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Permuta Veicolo Usato</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                                <label for="per_int" class="col-sm-2 col-form-label">Intestatario</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"id="per_int" name="per_int"maxlength="50" class="form-control" value="<?=$cli['cognome']." ".$cli['nome']?>" >
                                                    </div>
                                                
                                                <label for="per_targa" class="col-sm-2 col-form-label">Targa</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"id="per_targa" name="per_targa"maxlength="7" class="form-control" >
                                                    </div>                                   
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_marca" class="col-sm-2 col-form-label">Marca</label>
                                                    <div class="col-sm-4">
                                                        <select type="text"id="per_marca" name="per_marca" class="form-control" >
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
                                                
                                                <label for="per_modello" class="col-sm-2 col-form-label">Modello</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"id="per_modello" name="per_modello"maxlength="50" class="form-control" >
                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_anno" class="col-sm-1 col-form-label">Anno</label>
                                                    <div class="col-sm-2">
                                                        <input type="text"id="per_anno" name="per_anno" class="form-control yearpicker" >
                                                    </div>
                                                
                                                <label for="per_km" class="col-sm-1 col-form-label">KM</label>
                                                    <div class="col-sm-2">
                                                        <input type="number"id="per_km" name="per_km"maxlength="50" class="form-control" value="0.0" >
                                                    </div>
                                                <label for="per_stima" class="col-sm-2 col-form-label">Stima</label>
                                                    <div class="col-sm-4">
                                                        <input onkeypress="allowNumbersOnly(event)"type="number"id="per_stima" name="per_stima"maxlength="8" class="form-control sconto" value="0.00" >
                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_note" class="col-sm-2 col-form-label">Note</label>
                                                    <div class="col-sm-10">
                                                        <input type="text"id="per_note" name="per_note"maxlength="50" class="form-control" >
                                                    </div>
                                                
                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="card_dettaglio_val"style="display:none;">
                                     <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Permuta Veicolo Usato</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                                <label for="per_int_val" class="col-sm-2 col-form-label">Intestatario</label>
                                                    <div class="col-sm-4">
                                                        <input readonly type="text"id="per_int_val" name="per_int_val"maxlength="50" class="form-control" value="" >
                                                    </div>
                                                
                                                <label for="per_targa" class="col-sm-2 col-form-label">Targa</label>
                                                    <div class="col-sm-2">
                                                        <input readonly type="text"id="per_targa_val" name="per_targa_val"maxlength="7" class="form-control" >
                                                    </div>                                   
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_marca" class="col-sm-2 col-form-label">Marca</label>
                                                    <div class="col-sm-4">
                                                        <select readonly type="text"id="per_marca_val" name="per_marca_val" class="form-control" >
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
                                                
                                                <label for="per_modello" class="col-sm-2 col-form-label">Modello</label>
                                                    <div class="col-sm-4">
                                                        <input readonly type="text"id="per_modello_val" name="per_modello_val"maxlength="50" class="form-control" >
                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_anno" class="col-sm-1 col-form-label">Anno</label>
                                                    <div class="col-sm-2">
                                                        <input readonly type="text"id="per_anno_val" name="per_anno_val" class="form-control yearpicker" >
                                                    </div>
                                                
                                                <label for="per_km" class="col-sm-1 col-form-label">KM</label>
                                                    <div class="col-sm-2">
                                                        <input readonly type="number"id="per_km_val" name="per_km_val"maxlength="50" class="form-control" value="0.0" >
                                                    </div>
                                                <label for="per_stima" class="col-sm-2 col-form-label">Stima</label>
                                                    <div class="col-sm-2">
                                                        <input readonly onkeypress="allowNumbersOnly(event)"type="number"id="per_stima_val" name="per_stima_val"maxlength="8" class="form-control sconto" value="0.00" >
                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="per_note" class="col-sm-2 col-form-label">Note</label>
                                                    <div class="col-sm-10">
                                                        <input type="text"id="per_note_val" name="per_note_val"maxlength="50" class="form-control" >
                                                    </div>
                                                
                                                
                                        </div>
                                        <hr>
                                        <button type="button" id="modstima"  class="btn btn-warning m-1">Modifica Stima Veicolo</button>
                                        <button type="button" id="addpermuta" class="btn btn-success m-1">Conferma Stima Veicolo e associa al contratto</button>
                                    </div>
                                </div>						            
                                       
                        </section>
                         
                        <h3><i class="fa fa-money" aria-hidden="true"></i> Modalità di Pagamento</h3>
                        <section>  <!-- pagamento -->
                            <div class="row info-list">
                                <div class="col-lg-6 info-cli sel2">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-user"></i> Dati Cliente</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Cod Cliente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['id']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Nominativo Clente</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Codice Fiscale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b><?=$cli['codfiscale']?></b>
                                                    </div>
                                                </div>
                                                </li>
                                            </ul>
                                           
                                    </div>
                                </div>
                                <div class="col-lg-6 info-contr" style="display:none;">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-motorcycle"></i> Dati Veicolo</div>
                                        <ul class="list-group list-group-flush shadow-none list_veicolo">

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Mod Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;text-align:right;">
                                                    <b class="mod_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Colore Selezionato</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="col_info"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo su Strada IVA incl</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="pvei_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Veicolo</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scovei_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="acc_info" style="color:green;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scoacc_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Importo Permuta</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="per_info" style="color:red;">0,00 €</b>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Subtotale</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="sub_info" style="color:green;"></b>
                                                    </div>
                                                </div>
                                            </li>

                                            

                                        </ul>
                                    </div>
                                </div>        
                            </div>  
                            
                                
                                <?php
                                if($idFin){?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="permuta" class="col-sm-2 col-form-label">Pratica Finanziamento</label>
                                                        <div class="col-sm-8">
                                                           
                                                                <ul class="list-group list-group-flush shadow-none"> 
                                                                    <li class="list-group-item">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Pratica</h6>
                                                                        </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b><?=$pratica['id_pratica']?></b>
                                                                        </div>
                                                                    </div>
                                                                    </li> 
                                                                    <li class="list-group-item">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Data Pratica</h6>
                                                                        </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b><?=date("d/m/Y",strtotime($pratica['data_richiesta']))?></b>
                                                                        </div>
                                                                    </div>
                                                                    </li> 
                                                                    <li class="list-group-item">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Importo Finanziato</h6>
                                                                        </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b class="importi"><?=$pratica['imp_finanziato']?></b>
                                                                        </div>
                                                                    </div>
                                                                    </li> 
                                                                    <li class="list-group-item">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Stato Pratica</h6>
                                                                        </div>
                                                                        <div class="date" style="margin-right:10px;">
                                                                        <b ><?php if($pratica['stato_pratica']=="I"){?>
                                                                                <span class="badge badge-warning m-1">In Lavorazione</span>
                                                                            <?}elseif($pratica['stato_pratica']=="A"){?>
                                                                                <span class="badge badge-success m-1">Accettata</span>
                                                                            <?}elseif($pratica['stato_pratica']=="R"){?>
                                                                                <span class="badge badge-danger m-1">Respinta</span>
                                                                        <?}?></b>
                                                                        </div>
                                                                    </div>
                                                                    </li> 
                                                                                                                                                                                          
                                                            
                                                                
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <? } ?>
                   
                            
                            <div class="card">
                                <div class="card-header text-uppercase"><i class="fa fa-money"></i> Dati Pagamento</div>
                                <div class="row">    
                                    <div class="col-lg-6">
                                        <div class="card-header text-uppercase "><i class="fa fa-sort-amount-asc"></i> Scontistica</div>    
                                    
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="imp_sconto" class="col-sm-5 col-form-label">Importo Veicolo</label>
                                                <div class="col-sm-4">
                                                    <b class="pvei_info" ></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="imp_sconto" class="col-sm-5 col-form-label">Importo Sconto</label>
                                                <div class="col-sm-4">
                                                    <input onkeypress="allowNumbersOnly(event)"type="number"id="imp_sconto" name="imp_sconto"maxlength="8" class="form-control sconto" value="0.00" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" >
                                                <label for="per_sconto" class="col-sm-5 col-form-label">% Sconto</label>
                                                <div class="col-sm-4">
                                                    <input onkeypress="allowNumbersOnly(event)" type="number" id="per_sconto" name="per_sconto" maxlength="8" class="form-control sconto" value="0.00" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-5 col-form-label">Totale Scontato</label>
                                                <div class="col-sm-4">
                                                    <input onkeypress="allowNumbersOnly(event)" type="number"  id="tot_scon" name="tot_scon" maxlength="9" class="form-control sconto " value="" style="border-color: #ff8800;box-shadow: 0px 0px 15px 5px #ff8800;font-weight: bold;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card-header text-uppercase "><i class="fa fa-sort-amount-asc"></i> Modalità pagamento</div>    
                                    
                                        <div class="card-body">

                                            <div class="form-group row" >
                                                <label for="caparra" class="col-sm-4 col-form-label">Caparra Confirmatoria</label>
                                                <div class="col-sm-4">
                                                    <input id="imp_caparra" name="imp_caparra" type="number" maxlength="9" class="form-control" value="0.00" style="border-color: #ff8800;box-shadow: 0px 0px 15px 5px #ff8800;font-weight: bold;">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tip_caparra" class="col-sm-4 col-form-label">Tipologia Caparra</label>
                                                <div class="col-sm-8">
                                                    <select id="tip_caparra" name="tip_caparra" class="form-control" >
                                                        <option>Seleziona metodo di pagamento Caparra</option>
                                                        <option value="B">Bonifico</option>
                                                        <option value="C">Contanti</option> 
                                                        <option value="A">Assegno</option> 
                                                        <option value="D">Carte di Pagamento</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tip_saldo" class="col-sm-4 col-form-label">Tipologia Saldo</label>
                                                <div class="col-sm-8">
                                                    <select id="tip_saldo" name="tip_saldo" class="form-control" >
                                                        <option >Seleziona metodo di pagamento</option>
                                                        <option value="B">Bonifico</option>
                                                        <option value="F" <?=$idFin?'selected':''?>>Finanziamento</option> 
                                                        <option value="A">Assegno</option> 
                                                        <option value="D">Carte di Pagamento</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tot_residuo" class="col-sm-4 col-form-label">Totale Residuo</label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="tot_residuo" style="border-color: green;box-shadow: 0px 0px 15px 5px green;font-weight: bold;" name="tot_residuo" maxlength="9" class="form-control" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>   
                            </div>  
                            <div class="card" id="tab_finanziamento" style="display:<?=$idFin?'':'none'?>;">
                                <div class="card-header text-uppercase "><i class="fa fa-bank"></i> Finanziamento</div>
                                <div class="row"  >	
                                    <div class="col-12 col-md-6">		
                                        <div class="card-body ">
                                                                                
                                        
                    
                                            <div class="form-group row" id="tabfinanz" style="">
                                              <label for="tab_fin" class="col-sm-5 col-form-label">Tabella Finanziamento</label>
                                                <div class="col-sm-7">
                                                    <select name="tab_fin" id="tab_fin" class="form-control ">
                                                        
                                                        <?php if($idFin){?>
                                                            <option value="<?= $fintab['codtab']?>" selected><?= $fintab['codtab']?></option>
                                                        <?}else{?>
                                                            <option value="">Seleziona tabella</option>
                                                            <?foreach($tabfin as $tab){?>
                                                                        <option value="<?=$tab['codtab']?>"><?=$tab['codtab']?></option>
                                                                    <?}
                                                        }
                                                                ?>
                                                    </select>    
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                            <label for="finimp" class="col-sm-5 col-form-label">Importo da finanziare</label>
                                                <div class="col-sm-7">
                                                    <select id="finimp" name="finimp" class="form-control " >
                                                    <option value="">Seleziona Importo</option>
                                                    <?php if($idFin){
                                                        
                                                        $euro = number_format($fintab['finimp'],2,',','.')?>
                                                        <option selected value="<?=$fintab['finimp']?>"><?=$euro?> €</option>
                                                    <?}
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                            <label for="finnra" class="col-sm-5 col-form-label">Numero rate</label>
                                                <div class="col-sm-7">
                                                    <select id="finnra" name="finnra" class="form-control valid" aria-invalid="false">
                                                        <option value="">Seleziona n. Rate</option>
                                                        <?php if($idFin){?>
                                                        
                                                        
                                                        <option selected value="<?=$fintab['finnra']?>"><?=$fintab['finnra']?></option>
                                                    <?}
                                                    ?>
                                                        </select>
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                    
                                
                                    
                                    <div class="col-12 col-md-6" >		                  
                                       
                                        <div class="card-body" id="det_fin" style="display:none;">
                                           
                                                <h5 class="card-title">Dettaglio Finanziamento</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                       
                                                        <tbody>
                                                        <tr><td>Contributo Cliente</td><td id="fincon" ></td></tr>
                                                        <tr><td>TotaleFinanaziamento</td><td id="fintot"></td></tr>
                                                        <tr><td>Importo Rata</td><td id="finira"></td></tr>
                                                        <tr><td>Tan % </td><td id="fintan"></td></tr>
                                                        <tr><td>Taeg %</td><td id="fintae"></td></tr>
                                                        <tr><td>Smpg €</td><td id="finsmp"></td></tr>
                                                        <tr><td>Totale Dovuto</td><td id="findvt"></td></tr>
                                                        <tr><td>Maxirata Finale</td><td id="finmx1"></td></tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                
                        </section>
                        <h3><i class="fa fa-bar-chart" aria-hidden="true"></i> Riepilogo</h3>
                        <section> <!-- riepilogo -->
                            
                            <div class="row" >
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-bank"></i> Tipologia Pagamento</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item" id="head6" style="display:none;">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Caparra Confirmatoria</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;margin-left: 120px;text-align:right;">
                                                           Importo <a id="impcap"  style="font-weight: bold;"></a><br>
                                                           Tipo <a id="tipcap" style="font-weight: bold;"></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Saldo</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;text-align:right;">
                                                           Importo <a id="impsal" style="font-weight: bold;"></a><br>
                                                           Tipo <a id="tipsal" style="font-weight: bold;"></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item" id="head7" style="display:none;">
                                                   
                                                        <div class="card-body" style="margin-right:10px;text-align:right;">
                                                            <div class="table-responsive">
                                                                <table class="table table-sm">
                                                        
                                                                    <tbody>
                                                                    <tr><td style="text-align: left;"> Tabella Finanziamento</td><td id="codtab"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Totale Finanaziamento</td><td id="fintot2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Contributo Cliente</td><td id="fincon2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Numero Rate</td><td id="finnra"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Importo Rata</td><td id="finira2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Tan % </td><td id="fintan2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Taeg %</td><td id="fintae2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Smpg €</td><td id="finsmp2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Totale Dovuto</td><td id="findvt2"style="font-weight: bold;"></td></tr>
                                                                    <tr><td style="text-align: left;">Maxirata Finale</td><td id="finmx12"style="font-weight: bold;"></td></tr>
                                                                    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                           
                                                        </div>
                                                   
                                                </li>
                                            </ul>    
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-money"></i> Riepilogo Importi</div>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo veicolo IVA escl</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="pvei_esc_info"></b>
                                                        </div>
                                                    </div>
                                                </li> 
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Costi Immatricolazione IVA escl</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="imma_info"></b>
                                                        </div>
                                                    </div>
                                                </li>  
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Aliquota IVA</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="iva_info"></b>
                                                        </div>
                                                    </div>
                                                </li> 
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo veicolo su strada IVA inc</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <b class="pvei_info"></b>
                                                        </div>
                                                    </div>
                                                </li> 
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Sconto Veicolo</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="scovei_info">0.00 €</b> /  <b class="persco_info"></b>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Veicolo Scontato</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="totscovei_info"></b></b>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Accessori</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="acc_info">0,00 €</b>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body ml-3">
                                                    <h6 class="mb-0">Sconto Accessori</h6>
                                                    </div>
                                                    <div class="date" style="margin-right:10px;">
                                                    <b class="scoacc_info" >0,00 €</b>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Finale Scontato</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="imp_fin_sco">0,00 €</b>
                                                        </div>
                                                    </div>
                                                </li>  
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Permuta</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                        <b class="per_info">0,00 €</b>
                                                        </div>
                                                    </div>
                                                </li>
                                                                                                
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Caparra</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="impcap">0,00 €</b> 
                                                        </div>
                                                    </div>
                                                </li> 
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Importo Saldo Residuo</h6>
                                                        </div>
                                                        <div class="date" style="margin-right:10px;">
                                                            <b class="impsal"></b>
                                                        </div>
                                                    </div>
                                                </li>                

                                            </ul>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-uppercase"><i class="fa fa-bank"></i> Consegna veicolo    <input type="month" style="float:right;"class="form-control col-6"id="data_consegna" name="data_consegna" min="<?=date("Y-m")?>"value="<?=date("Y-m")?>"/></div>
                                     
                                    </div>
                                </div>
                                     
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="card">
                                  
                                        <div class="card-body">
                                            <h4 class="card-title"><i aria-hidden="true" class="fa fa-pencil-square-o"></i> Acquisizione Firma</h4>
                                            <div id="signatureDiv">
                                            
                                                 <img id="signatureImage" src="images/sign.png" />
                                            </div>
                                            <input class="btn btn-success"type="button" id="signButton" value="Acquisisci" onClick="tabletDemo()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="card">
                                  
                                        <div class="card-body">
                                            <h4 class="card-title"><i aria-hidden="true" class="fa fa-check-square-o"></i> Validità Firma</h4>
                                            <ul class="list-group list-group-flush shadow-none">
                                                <li class="list-group-item" style="padding:10px;">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Sottoscrizione Proposta di Compravendita</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </li> 
                                                <li class="list-group-item" style="padding:10px;">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Approvazione "Condizioni Generali di Compravendita"</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </li> 
                                                <li class="list-group-item" style="padding:10px;">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                        <h6 class="mb-0">Autorizzazione Trattamento dati Personali</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </li> 
                                            </ul>    
                                            
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
</div>
<!-- End Row-->

      <!-- Modal -->
                    <div class="modal fade" id="modalcliente" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            
                            <form enctype="multipart/form-data" id="addformcli" action="controller/updateAnagr_cli.php" method="post">
                            
                       
                                <input type="hidden" name="actionContr" value="<?=$action?>">
                                <input type="hidden" name="action" value ="<?=$cli['id']?'storeClienteContr':'saveClienteContr'?>">

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
                                                                    <input type="text" id="ragsociale" oninput="this.value = this.value.toUpperCase()"name="ragsociale" value="<?=$cli['ragsociale']?>" placeholder="Inserire Ragione Sociale" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                <div class="row col-12">    
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                                <label class="col-sm-4 col-form-label">Cognome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="cognome" oninput="this.value = this.value.toUpperCase()"name="cognome" value="<?=$cli['cognome']?>" placeholder="Inserire Cognome" class="form-control"required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-12">
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label">Nome</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="nome"oninput="this.value = this.value.toUpperCase()" name="nome" value="<?=$cli['nome']?>" placeholder="Inserire Nome" class="form-control" required>
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
                                                        <input type="text" id="nazionalita"oninput="this.value = this.value.toUpperCase()" name="nazionalita" value="<?=$cli['nazionalita']?$cli['nazionalita']:'I'?>" class="form-control">
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
                                                        <input type="text" id="codfiscale" oninput="this.value = this.value.toUpperCase()"name="codfiscale" maxlength="16" class="form-control" value="<?=$cli['codfiscale']?>" required>
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
                                                                <input type="text" id="partitaiva" name="partitaiva" value="<?=$cli['partitaiva']?$cli['partitaiva']:''?>" placeholder="Inserire Partita Iva" class="form-control">
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
                                                    <input type="text" id="indirizzores"oninput="this.value = this.value.toUpperCase()" name="indirizzores" value="<?=$cli['indirizzores']?>" placeholder="Inserire Indirizzo" class="form-control">
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
                                                    <input type="text" id="capres" name="capres" maxlength="5" value="<?=$cli['capres']?>" placeholder="Inserire CAP" class="form-control">
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
                                                                    <input type="email" oninput="this.value = this.value.toUpperCase()"id="mail1" name="mail1" value="<?=$cli['mail1']?>"placeholder="Inserire eMail 1" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                
                                               
                                                    <div class="col-6 col-md-12 ">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">eMail 2</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" oninput="this.value = this.value.toUpperCase()"id="mail2" name="mail2" value="<?=$cli['mail2']?>" placeholder="Inserire eMail 2" class="form-control">
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

                                            
                                                
                                                

                                                
                                           


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?=$cliente?'Aggiornamento Dati':'Inserimento Nuovo'?> Cliente</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                   
                    <div id="message2"class="col-lg-6 alert alert-success alert-dismissible" style="display:none;right: 56px;top: 122px;z-index: 100;width: 436px;position: absolute;"role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                            <i class="fa fa-check"></i>
                            </div>
                            <div class="alert-message">
                                <span id="tex_msg2"></span>
                            </div>
                    </div>