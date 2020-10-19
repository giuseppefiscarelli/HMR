<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
//$orderBy = 'lisdve';
//var_dump(getRicerca('listip'));





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
                  <label for="search3" class="col-sm-8 col-form-label">Abilitazione test ride</label>
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
                    <h5 class="card-title">Veicoli Usati</h5>
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
                                <th  style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=listip&orderDir=<?=$orderDir?>&page=1">Tipologia<br>Veicolo</a></th>
                                
                                <th class="<?=$orderBy === 'lisdve'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdve&orderDir=<?=$orderDir?>&page=1">Marca</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=liskw&orderDir=<?=$orderDir?>&page=1">Modello</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdat&orderDir=<?=$orderDir?>&page=1">Targa <br>Telaio</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisppi&orderDir=<?=$orderDir?>&page=1">Abilitazione<br> TestRide</a></th>
                                <th></th>
                                
                            </tr> 
                        </thead>
                        
                        <tbody>
                            <?php
                            if($veicoli){
                                //$modalView = 0;
                                foreach ($veicoli as $v){ 
                                    //$modalView++;
                                    
                                    ?>
                                <tr>
                                    <td><?=$v['id']?></td>
                                    <td><?=$v['tipologia']?></td>
                                    
                                    <td><?=$v['marca']?></td>
                                    <td><?=$v['modello']?></td>
                                    <td><?=$v['targa']?><br><?=$v['telaio']?></td>
                                    <td>
                                    <input onchange="ab_teride(this,<?=$v['id']?>);"type="checkbox" <?=$v['ab_testride']==='N'?'':'checked'?> class="js-switch" data-color="#04b962" data-size="small" data-secondary-color="#f43643"/>
                                    </td>
                                    
                                    <td></td>
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
                                <input type="hidden" name="action" value="saveVeicolo">
                            <div class="form-group row">
                                <label for="targa" class="col-sm-4 col-form-label">Targa</label>
                                <div class="col-sm-2">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();"maxlength="7" class="form-control" name="targa" id="targa">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="marca" class="col-sm-4 col-form-label">Marca</label>
                                <div class="col-sm-4">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" maxlength="20"class="form-control" name="marca" id="marca">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="modello" class="col-sm-4 col-form-label">Modello</label>
                                <div class="col-sm-8">
                                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" maxlength="50" class="form-control" name="modello" id="modello">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ab_testride" class="col-sm-4 col-form-label">Abilitazione<br>TestRide</label>
                                <div class="col-sm-2">
                                <input type="checkbox" name="ab_testride" class="js-switch" data-color="#04b962" data-size="small" data-secondary-color="#f43643"/>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colore" class="col-sm-4 col-form-label">Colore<br>TestRide</label>
                                <div class="col-sm-2">
                                <select id="colorselector_1" name="colore_tr">
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
                                <label for="ab_testride" class="col-sm-4 col-form-label">KM</label>
                                <div class="col-sm-2">
                                    <input type="number" name="km" value="1" class="form-control" id="ab_testride">
                                    
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
		   </div>






