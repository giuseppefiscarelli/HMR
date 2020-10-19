<div class="row">
        <div class="col-lg-12">
		      <div class="card">
           <div class="card-body">

        <div class="row">
        
            <!-- Left sidebar -->
            <div class="col-lg-3 col-md-4">
               
                <div class="card mt-3 shadow-none">
                        <div class="list-group shadow-none">
                          <a href="notifiche.php" class="list-group-item <?=!$search1?'active':''?>"><i class="fa fa-inbox mr-2"></i>Tutte le Notifiche <b>(<?=(countReadNot('N'))+(countReadNot('L'))?>)</b></a>
                          <a href="notifiche.php?search1=N" class="list-group-item  <?=$search1 == 'N'?'active':''?>"><i class="fa fa-envelope-o mr-2"></i>Nuove Notifiche <b>(<?=countReadNot('N');?>)</b></a>
                          <a href="notifiche.php?search1=L" class="list-group-item  <?=$search1 =='L'?'active':''?>"><i class="fa fa-envelope-open-o mr-2"></i>Notifiche precedenti <b>(<?=countReadNot('L');?>)</b></a>
                          <a href="notifiche.php?search1=E" class="list-group-item  <?=$search1 =='E'?'active':''?>"><i class="fa fa-trash-o mr-2"></i>Eliminate <b>(<?=countReadNot('E');?>)</b></a>
                          </div> 
                          <br>         
                          <div class="list-group shadow-none">  
                          <p  class="list-group-item">Categorie</p>
                          <?php
                            if($area){
                                foreach($area as $a){
                                    $ar = getnotArea($a['area']);
                                  // var_dump($ar);
                                    ?>
                                
                                 <a href="<?="$pageUrl?$navOrderByQueryString&"?>search2=<?=$ar['area']?>" class="list-group-item <?=$search2 == $ar['area']?'active':''?>"><span class="fa fa-circle text-<?=$ar['color']?> float-right"></span><?=$ar['area']?></a>
                            <?    }
                            }?>
                         

                          <!--<a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-success float-right"></span>Design</a>
                          <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-warning float-right"></span>Family</a>
                          <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-white float-right"></span>Friends</a>
                          <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-danger float-right"></span>Office</a>-->
                        </div>
                </div>

                
            </div>
            <!-- End Left sidebar -->
                    
        <!-- Right Sidebar -->
        <div class="col-lg-9 col-md-8">
            <div class="row">
                <div class="col-lg-8">
                    <div class="btn-toolbar" role="toolbar">
                   
                        <div class="btn-group mr-1">
                         
                            
                            <button type="button" onclick="location.reload();"class="btn btn-outline-success waves-effect waves-light"><i class="fa fa-refresh"> Aggiorna</i></button>
                            <button type="button" id="btnElimina" class="btn btn-outline-danger waves-effect waves-light"><i class="fa fa-trash-o"> Elimina Selezionate</i></button>
                        </div>

                        <!--
                        <div class="btn-group mr-1">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-folder"></i>
                            <b class="caret"></b>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item">Action</a>
                              <a href="javaScript:void();" class="dropdown-item">Another action</a>
                              <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <div class="btn-group mr-1">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tag"></i>
                            <b class="caret"></b>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item">Action</a>
                              <a href="javaScript:void();" class="dropdown-item">Another action</a>
                              <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                              <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                              <a onclick="read();" class="dropdown-item">Segna come già letto</a>
                              <a onclick="unread();" class="dropdown-item">Segna come da leggere</a>
                              
                            </div>
                        </div>
                        
                                         
                                                   
                                               

                    </div>

                </div>
               
                        <div class="col-lg-4">
                        <form id="searchForm" method="get" action="<?=$pageUrl?>">
                            <input type="hidden" name="page" id="page" value="<?=$page?>" >
                            <div class="position-relative has-icon-right">
                                <input type="text" id="search3" name="search3" value="<?=$search3?>" class="form-control" placeholder="cerca notifica">
                                <div class="form-control-position">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            </form>
                        </div>
                

            </div> <!-- End row -->
            
            <div class="card mt-3 shadow-none">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="notifiche"class="table table-hover">
                            <tbody>
                               <tr>
                                   <th colspan="2">
                                   <div class="icheck-material-primary my-0">
                                                    <input id="checkAll" type="checkbox">
                                                    <label for="checkAll"> Seleziona tutto
                                                    </label>
                                                </div>
                                   </th>
                                   
                               </tr>
                                <?php
                                    if($not){
                                        foreach($not as $no){?>
                                        <tr class="notifiche" <?=$no['stato']=='N'?'style="font-weight: bold;"':''?> >
                                            <td>
                                                <div class="icheck-material-primary my-0">
                                                    <input id="ck_<?=$no['id']?>" type="checkbox">
                                                    <label for="ck_<?=$no['id']?>">
                                                    </label>
                                                </div>
                                            </td>
                                           
                                            <td>
                                                <a style="color:black"href="mail-read.html"><?=$no['da']?></a>
                                            </td>
                                            <td>
                                                <a style="color:black;cursor:pointer;" onclick="openNot(<?=$no['id']?>);"data-toggle="modal" data-target="#modal-animation-<?=$no['id']?>"><i class="fa fa-circle text-<?=$no['color']?> mr-2"></i><?=$no['titolo']?></a>
                                            </td>
                                            
                                            <td class="text-right">

                                            <?php 
                                            


                                                    $today= date("Y-m-d");
                                                    setlocale(LC_TIME, "it_IT.utf8");
                                                   
                                                if (date("Y-m-d", strtotime($no['data'])) == $today){?>
                                                     Oggi <?=date("H:i:s", strtotime($no['data']))?>
                                               <? }else{  ?>                                         
                                                
                                               <?=ucwords(strftime("%A %e %B %Y", strtotime($no['data'])))?>
                                              <? }?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-animation-<?=$no['id']?>" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content animated flipInX">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?=$no['titolo']?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 <p>     <?=$no['descrizione']?>
                                                        <?php
                                                            switch($no['tipo']){
                                                                case 'QT':
                                                                $id_testride = explode('#',$no['titolo'],2);
                                                               // var_dump($id_testride);
                                                                ?>
                                                                    <br><br>Ora puoi generare e stampare il report completo!
                                                                    <br> Vai alla Pagina del Test Ride cliccando il pulsante qui sotto  
                                                                    <br> 
                                                                       
                                                                    <div style="justify-content:center;">
                                                                        <a type="button" class="btn btn-success" href="test_ridePage.php?id=<?=$id_testride[1]?>" style="color: #fff;;width: 40%;margin-left: 30%;"> gestione test ride </a>
                                                                    </div>
                                                         <?       break;    
                                                            }
                                                        ?>
                                                        </p>  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                                   
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                <?            
                                        }
                                    }
                                ?>
                                
                            
                            </tbody>
                        </table>
                    </div>
                    
                    <hr>
                    
                  
                    <?php
    require_once 'view/navigation.php';
?>
                </div> <!-- card body -->
            </div> <!-- card -->
        </div> <!-- end Col-9 -->
                    
                    </div><!-- End row -->

             </div>
                    </div>
        </div>
      </div>
     