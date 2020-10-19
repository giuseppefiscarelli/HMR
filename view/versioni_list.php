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
                  <label for="search1" class="col-sm-6 col-form-label">NOME COMMERCIALE</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Ricerca nome Commerciale">
                  </div>
                </div>    


                
                <div class="form-group row">
                  <label for="search2" class="col-sm-8 col-form-label">Tipo Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search2" 
                  id="search2" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php 
                            $tipo = getRicerca('listip');
                            //var_dump($tipo);
                            $tab = 'listino';
                                foreach ( $tipo as $s2) { ?>
                        
                           <option value="<?=$s2['listip']?>" <?=$search2 ==$s2['listip']?'selected':''?>><?= tabCodifica($tab,'listip',$s2['listip'])?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="search3" class="col-sm-8 col-form-label">Gamma Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search3" 
                  id="search3" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php 
                            $tipo = getRicerca('lisgam');
                            //var_dump($tipo);
                            $tab = 'listino';
                                foreach ( $tipo as $s3) { ?>
                        
                           <option value="<?=$s3['lisgam']?>" <?=$search3 ==$s3['lisgam']?'selected':''?>><?= tabCodifica($tab,'lisgam',$s3['lisgam'])?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="search3" class="col-sm-8 col-form-label">Gamma Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search3" 
                  id="search3" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php 
                            $tipo = getRicerca('lisgam');
                            //var_dump($tipo);
                            $tab = 'listino';
                                foreach ( $tipo as $s3) { ?>
                        
                           <option value="<?=$s3['lisgam']?>" <?=$search3 ==$s3['lisgam']?'selected':''?>><?= tabCodifica($tab,'lisgam',$s3['lisgam'])?></option>
                        <?php }?>
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
                <h5 class="card-title">Versioni Veicoli</h5>
                <a  class="btn btn-primary" style="margin-bottom: 10px;"
                    href="<?=$updateUrl?>?action=insert">
                <i class="fa fa-user-plus"></i> Aggiungi Versione</a>
                <small style="float: right;">Totale Versioni <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                           
                            <tr>
                                <th  style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id&orderDir=<?=$orderDir?>&page=1"> ID</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=cod_interno&orderDir=<?=$orderDir?>&page=1">Codice</a></th>     
                                <th class="<?=$orderBy === 'lisdve'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=modello&orderDir=<?=$orderDir?>&page=1">Modello</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=desrizione&orderDir=<?=$orderDir?>&page=1">Descrizione</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=cod_col&orderDir=<?=$orderDir?>&page=1">Codice Colore</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=des_col&orderDir=<?=$orderDir?>&page=1">Descrizione Colore</a></th>
                                
                                <th></th>
                                
                            </tr> 
                        </thead>
                        <tbody>
                        <?php
                            if($versioni){
                               
                                foreach ($versioni as $v){ 
                                    
                                    ?>
                                <tr>
                                    <td><?=$v['id']?></td>
                                    <td><?=$v['cod_interno']?></td>
                                    <td><?=$v['modello']?></td>
                                    <td><?=$v['descrizione']?></td>
                                    <td><?=$v['cod_col']?></td>
                                    <td><?=$v['des_col']?></td>
                                   
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
