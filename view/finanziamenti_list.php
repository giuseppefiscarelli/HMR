<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';






?> 
   <div class="row">
    <div class=col-lg-6>
        <div id="accordion1">
            <div class="card mb-2">
                <div class="card-header">
                    <button class="btn btn-link shadow-none collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                    <i class="fa fa-search"></i> Ricerca
                    </button>
                </div>

                <div id="collapse-1" class="collapse <?=$search1||$search2||$search3||$search4||$search5||$search6||$recordsPerPage?'show':''?>" data-parent="#accordion1" style="">
                    <div class="card-body">
                  
                        <form id="searchForm" method="get" action="<?=$pageUrl?>">
                            <input type="hidden" name="page" id="page" value="<?=$page?>" >
                            

                            <div class="form-group row">
                                <label for="search1" class="col-sm-6 col-form-label">Cliente </label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control ui-autocomplete-input" autocomplete="off" id="search1" name="search1" value="<?=$search1?>" placeholder="Ricerca per cognome/nome - codice fiscale ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="search1" class="col-sm-6 col-form-label">Numero Pratica </label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="search2" name="search2" value="<?=$search2?>" placeholder="Ricerca per numero Pratica ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="search1" class="col-sm-6 col-form-label">numero Preventivo/Contratto </label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control " a id="search3" name="search3" value="<?=$search3?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="search1" class="col-sm-6 col-form-label">Stato Pratica </label>
                                <div class="col-sm-3">
                                    <select type="text" class="form-control " a id="search4" name="search4"  onchange="document.forms.searchForm.submit()">
                                        <option value="">Tutti gli Stati</option>
                                        <option value="I" <?=$search4 =='I'?'selected':''?>>In Lavorazione</option>
                                        <option value="A" <?=$search4 =='A'?'selected':''?>>Accettata</option>
                                        <option value="R" <?=$search4 =='R'?'selected':''?>>Respinta</option>
                                    </select>
                                </div>
                            </div>
                            

                                                        
                            <div class="form-group row">
                                <label for="recordsPerPage" class="col-sm-6 col-form-label">Record per Pagina</label>
                                <div class="col-sm-2">
                                    <select class="form-control"  
                                    name="recordsPerPage" 
                                    id="recordsPerPage" 
                                    onchange="document.forms.searchForm.submit()">
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
    </div>             
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Pratiche Finanziamenti</h5>
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;"
                data-toggle="modal" data-target="#addmodal">
                <i class="fa fa-plus"></i> Nuova Pratica</button>
                <small style="float: right;">Totale Pratiche <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                           
                            <tr>
                                
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=data_ins&orderDir=<?=$orderDir?>&page=1">Inserimento</a></th>
                                    <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id_pratica&orderDir=<?=$orderDir?>&page=1">Pratica</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=data_richiesta&orderDir=<?=$orderDir?>&page=1">Richiesta</a></th>         
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id_cliente&orderDir=<?=$orderDir?>&page=1">Cliente</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id_contratto&orderDir=<?=$orderDir?>&page=1">Contratto</a></th>
                                
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=dtat_responso&orderDir=<?=$orderDir?>&page=1">Responso</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id_estin&orderDir=<?=$orderDir?>&page=1">Estinzione</a></th>
                                
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                
                            </tr> 
                        </thead>
                        <tbody>
                        <?php
                            if($finanziamenti){
                               
                                foreach ($finanziamenti as $f){ 
                                    $cli = getClientecf($f['id_cliente']);
                                    $ui = getNomeuser($f['user_ins']);
                                    //var_dump($ui);

                                    
                                    ?>
                                <tr style="font-size: 13px">
                                    
                                    <td>Data <b><?=date("d/m/Y H:i",strtotime($f['data_ins']))?></b><br>User <b><?=$ui['nome']." ".$ui['cognome']?></b></td>
                                    <td>n° pratica <b><?=$f['id_pratica']?></b><br>
                                    <?php if($f['stato_pratica']=="I"){?>
                                            <span class="badge badge-warning m-1">In Lavorazione</span>
                                        <?}elseif($f['stato_pratica']=="A"){?>
                                            <span class="badge badge-success m-1">Accettata</span>
                                        <?}elseif($f['stato_pratica']=="R"){?>
                                            <span class="badge badge-danger m-1">Respinta</span>
                                        <?}?>
                                        </td>
                                    <td>Data <b><?=date("d/m/Y",strtotime($f['data_richiesta']))?></b><br>
                                        Importo <b class="importi"><?=$f['imp_richiesto']?></b><br>
                                        </td>
                                    <td><b><?=$cli['nome']." ".$cli['cognome']?></b><br>CF <b><?=$f['id_cliente']?></b></td>
                                    <td><?=$f['id_contratto']?'Contratto #<b>'.$f['id_contratto'].'</b>':'<span class="badge badge-warning m-1">Non Assegnato</span>'?></td>
                                    
                                    <td><?=$f['data_responso']?'Data <b>'.date("d/m/Y",strtotime($f['data_responso'])).'</b><br>User <b>'.$f['user_responso'].'</b><br>Importo Contratto <b class="importi"> '.$f['imp_finanziato'].'</b>':'<span class="badge badge-warning m-1">In Lavorazione</span>'?></td>
                                    <td><?=$f['en_estin']=="S"?'Data pratica <b>'.date("d/m/Y",strtotime($f['data_estin'])).'</b><br>'.'Importo <b class="importi">'.$f['imp_estin'].'</b>':'<span class="badge badge-warning m-1">Non Presente</span>'?></td>
                                  <td><button onclick="location.href='<?=$pageShowUrl?>?id=<?=$f['id']?>'"style="padding: .375rem .75rem;"type="button" class="btn btn-success " title="Visualizza Pratica"> <i class="fa fa-book"></i> </button>
                                      <button style="padding: .375rem .75rem;"type="button" class="btn btn-warning " title="Aggiorna Pratica"> <i class="fa fa-edit"></i> </button>
                                      <a type="button" onclick="return confirm('Vuoi Eliminare il Record?')"  href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$f['id']?>&id_pratica=<?=$f['id_pratica']?>&action=delete" style="padding: .375rem .75rem;"type="button" class="btn btn-danger " title="Elimina"> <i class="fa fa-trash-o"></i> </a></td>
                                </tr>
                                
                                <?php
                                    
                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=8 style="text-align:center;">No Records Found</td></tr>';
                                }?>

                        </tbody>    

                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>    

                <div class="modal fade" id="addmodal" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width:50%;">
                    <div class="modal-content border-success">
                      <div class="modal-header bg-success">
                        <h5 class="modal-title text-white">Inserimento Nuova Pratica</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                        <form action="controller/updateFinanziamenti.php" method="post">
                            <input type="hidden" name="action" value="insert">
                            <div class="modal-body">
                                <input type="hidden" id="id_fin" name="id_finanziaria" value="">        
                                <div class="form-group row">
                                    <label for="id_cliente" class="col-sm-5 col-form-label">Cliente</label>
                                    <div class="col-sm-7">
                                        <input required type="text" class="form-control form-control-sm" id="id_cliente" name="id_cliente" value=""class="form-control ui-autocomplete-input" autocomplete="off">
                                    </div>
                                </div> 

                                <div class="row">
                                <label class="col-sm-5 col-form-label"></label>
                                    <div class="col-sm-7">
                                       
                                        <button type="button" class="btn btn-success" id="btnAddCli" data-toggle="modal" data-target="#climodal" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Nuovo Cliente</button>
                                        <button type="button" class="btn btn-primary" id="btnModCli" onclick="newcli();" style="display:none;margin-bottom: 10px;float:right;"><i class="fa fa-plus"></i> Nuova Ricerca Cliente</button>
                                        
                                    </div>
                                </div>

                                <div class="form-group row" >
                                <label for="id_contratto" class="col-sm-5 col-form-label">ID Contratto/Preventivo</label>
                                    <div class="col-sm-5">
                                        <select id="id_contratto" name="id_contratto"  class="form-control form-control-sm " aria-invalid="false">
                                            <option selected>Seleziona n. Contratto/Preventivo</option>
                                            <option value="N">Contratto/Preventivo Non Presente</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="imp_saldo_contr" style="display:none;">
                                <label for="id_pratica" class="col-sm-5 col-form-label">Importo Saldo Contratto</label>
                                    <div class="col-sm-4">
                                        <input readonly type="text" class="form-control form-control-sm" id="imp_contratto" val="">
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                <label for="id_pratica" class="col-sm-5 col-form-label">Numero pratica</label>
                                    <div class="col-sm-4">
                                        <input required type="text" class="form-control form-control-sm" id="id_pratica" name="id_pratica" val="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="data_richiesta" class="col-sm-5 col-form-label">Data Richiesta Pratica</label>
                                    <div class="col-sm-4">
                                        <input required type="date" class="form-control form-control-sm" id="data_richiesta" name="data_richiesta" max="<?=date("Y-m-d")?>" val="<?=date("Y-m-d")?>">
                                    </div>
                                </div>

                                <div class="form-group row" id="tabfinanz" style="">
                                    <label for="tab_fin" class="col-sm-5 col-form-label">Tabella Finanziamento</label>
                                    <div class="col-sm-4">
                                        <select required id="tab_fin" class="form-control form-control-sm ">
                                            <option value="">Seleziona tabella</option>
                                            <?php foreach($tabfin as $tab){?>
                                                    <option value="<?=$tab['codtab']?>"><?=$tab['codtab']?></option>
                                                <?}?>
                                        </select>    
                                    </div>
                                </div>

                                <div class="form-group row" >
                                <label for="finimp" class="col-sm-5 col-form-label">Importo da finanziare</label>
                                    <div class="col-sm-4">
                                        <select required id="finimp"  class="form-control form-control-sm" >
                                        <option value="">Seleziona Importo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" >
                                <label for="finnra" class="col-sm-5 col-form-label">Numero rate</label>
                                    <div class="col-sm-4">
                                        <select required id="finnra"  class="form-control form-control-sm valid" aria-invalid="false">
                                            <option >Seleziona n. Rate</option>
                                            </select>
                                    </div>
                                </div>        
                                
                               

                                <div class="form-group row">
                                    <label for="en_estin" class="col-sm-5 col-form-label">Estinzione</label>
                                    <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="en_estin" name="en_estin">
                                        <option value="N" selected>Non Presente</option>
                                        <option value="S">Presente</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row estin" style="display:none;">
                                    <label for="stato_estin" class="col-sm-5 col-form-label">Stato Estinzione</label>
                                    <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="stato_estin" name="stato_estin">
                                        <option>Seleziona Stato</option>        
                                        <option value="I" selected>Richiesta Inoltrata</option>
                                        <option value="A">Richiesta Accettata</option>
                                        <option value="R">Richiesta Respinta</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row estin" style="display:none;">
                                    <label for="imp_estin" class="col-sm-5 col-form-label">Importo Estinzione</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control form-control-sm" id="imp_estin" name="imp_estin">
                                    </div>
                                </div>
                                
                                <div class="form-group row estin" style="display:none;">
                                <label for="id_estin" class="col-sm-5 col-form-label">Numero pratica estinzione</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="id_estin" name="id_estin">
                                    </div>
                                </div>
                                <div class="form-group row estin" style="display:none;">
                                    <label for="data_estin" class="col-sm-5 col-form-label">Data pratica estinzione</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" id="data_estin" name="data_estin" val="<?=date("Y-m-d")?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row " >
                                    <label for="imp_richiesto" class="col-sm-5 col-form-label">Importo Finanziato per contratto</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control form-control-sm" id="imp_richiesto" name="imp_richiesto" val="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="note" class="col-sm-5 col-form-label">note</label>
                                    <div class="col-sm-7">
                                        <textarea rows="2" maxlenght="100"class="form-control form-control-sm" id="note" name="note" val=""></textarea>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Inserisci Pratica</button>
                            </div>
                        </form>              
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="climodal" aria-hidden="true" style="display: none;">
                 <div class="modal-dialog modal-lg modal-dialog-centered">
                            
                            <form enctype="multipart/form-data" id="addformcli" action="controller/updateAnagr_cli.php" method="post">
                            <input type="hidden" name="action" id="cliaction" value="saveClienteFin">
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



                <div id="message2"class="col-lg-6 alert alert-success alert-dismissible" style="display:none;right: 14px;top: 14px;z-index: 9999;width: 436px;position: absolute;"role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                            <i class="fa fa-check"></i>
                            </div>
                            <div class="alert-message">
                                <span id="tex_msg2"></span>
                            </div>
                    </div>





<?php
    require_once 'view/navigation.php';
?>
