<?php



function deleteFinanziamento($id,$id_pratica){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $sql ='DELETE FROM pratiche_fin WHERE id = '.$id;

    $res = $conn->query($sql);
    return $res && $conn->affected_rows;
    if($res){
        $sql2 ="DELETE FROM allegati_pratiche WHERE id_pratica = '$id_pratica'";

        $res2 = $conn->query($sql2);
    }
    
}
function getFinanziamenti(array $params = []){ 

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
    $amb = $_SESSION['userData']['ambiente'];
    $az = $_SESSION['userData']['azienda'];
    $fl = $_SESSION['userData']['filiale'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
    $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
    $search4 = array_key_exists('search3', $params) ? $params['search4'] : '';

    $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
    $start =$limit * ($page -1);
    if($start<0){
      $start = 0;
    }
    $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
    $search1 = $conn->escape_string($search1);

    
    //$search2 = $conn->escape_string($search2);

   
    
    if($orderDir !=='ASC' && $orderDir !=='DESC'){
      $orderDir = 'ASC';
    }
    $records = [];
        
    $sql = "SELECT * FROM pratiche_fin WHERE cod_ambiente = '$amb' and cod_azienda = '$az' and cod_filiale = '$fl'";
        if($search1 or $search2 or $search3 or $search4){
            $sql .=" AND";
        }
        if ($search1){
            $sql .=" id_cliente = '$search1'";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3 or $search4){
                $sql .="AND";
            }
            
          }
        if($search2){
            $sql .="  id_pratica like '%$search2%'";
            if($search3 or $search4){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  id_contratto =$search3";
            if($search4){
                $sql .="AND";
            }
        }
        if($search4){
            $sql .="  stato_pratica ='$search4'";
            
        }

          $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
                //    var_dump($sql);
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

    return $records;


}
function countFinanziamenti(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
   
    $amb = $_SESSION['userData']['ambiente'];
    $az = $_SESSION['userData']['azienda'];
    $fl = $_SESSION['userData']['filiale'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
    $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
    $search4 = array_key_exists('search3', $params) ? $params['search4'] : '';
    $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
    $start =$limit * ($page -1);
    if($start<0){
      $start = 0;
    }
    $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
    $search1 = $conn->escape_string($search1);

    
    //$search2 = $conn->escape_string($search2);

   
    
    if($orderDir !=='ASC' && $orderDir !=='DESC'){
      $orderDir = 'ASC';
    }
    $totalList = 0;
        
        $sql ="SELECT count(*) as totalList FROM pratiche_fin WHERE cod_ambiente = $amb and cod_azienda = $az and cod_filiale = $fl";
        if($search1 or $search2 or $search3 or $search4){
            $sql .=" AND";
        }
        if ($search1){
            $sql .=" id_cliente = '$search1'";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3 or $search4){
                $sql .="AND";
            }
            
          }
        if($search2){
            $sql .="  id_pratica like '%$search2%'";
            if($search3 or $search4){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  id_contratto =$search3";
            if($search4){
                $sql .="AND";
            }
        }
        if($search4){
            $sql .="  stato_pratica ='$search4'";
            
        }

        
         // var_dump($sql);
         $res = $conn->query($sql);
         if($res) {
 
          $row = $res->fetch_assoc();
          $totalList = $row['totalList'];
         }
 
     return $totalList;


}
function savePratica(array $data){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
        
        
        $cod_ambiente = $conn->escape_string($_SESSION['userData']['ambiente']);
        $cod_azienda = $conn->escape_string($_SESSION['userData']['azienda']);
        $cod_filiale = $conn->escape_string($_SESSION['userData']['filiale']);

        $data_ins = date("Y-m-d H:i:s");
        $user_ins = $conn->escape_string($_SESSION['userData']['username']);
        $id_contratto=$data['id_contratto']?$data['id_contratto']:'NULL';
        $id_contratto=$id_contratto =='N'?'NULL':$id_contratto;
        $id_cliente= $data['id_cliente'];
        $id_finanziaria= $data['id_finanziaria'];
        $id_pratica= $data['id_pratica'];
        $stato_pratica="I";
        $data_richiesta=$data['data_richiesta'];
        $imp_richiesto= $data['imp_richiesto'];
        $en_estin=$data['en_estin'];
        $stato_estin=$data['stato_estin'];
        $imp_estin=$data['imp_estin']?$data['imp_estin']:'NULL';
        $id_estin=$data['id_estin']?$data['id_estin']:NULL;
        $data_estin=$data['data_estin']?$data['data_estin']:NULL;
        $note=$data['note'];
       

        
        $result=0;
        $sql ='INSERT INTO pratiche_fin (id, cod_ambiente,cod_azienda,cod_filiale,data_ins,user_ins,id_contratto,id_cliente,id_finanziaria,id_pratica,stato_pratica,data_richiesta,imp_richiesto';
        if ($en_estin =="S"){
         $sql .=',en_estin,stato_estin,imp_estin,id_estin,data_estin,note';
        }                                                                                                                                      //) ';
        $sql.=")";
        $sql .= " VALUES (NULL, $cod_ambiente,$cod_azienda,$cod_filiale,'$data_ins','$user_ins',$id_contratto,'$id_cliente',$id_finanziaria,'$id_pratica','$stato_pratica','$data_richiesta',$imp_richiesto";
        
        if ($en_estin =="S"){
            $sql .= ",'$en_estin','$stato_estin',$imp_estin,'$id_estin','$data_estin','$note'"; 
        }//) ";
        $sql.=")";

        
        //echo $sql;die;
        $res = $conn->query($sql);
        //echo $res;die;
        if($res ){
          $result =  $conn->affected_rows;
          
        }else{
          $result -1;  
        }
      return $result;
    
    
}
function getFintablist(){
    $conn = $GLOBALS['mysqli'];
    $records=[];
    $sql ="SELECT DISTINCT codtab FROM honda_tab_fin order by codtab";
    // echo $sql;

        
    $res = $conn->query($sql);
    if($res) {

        while( $row = $res->fetch_assoc()) {
            $records[] = $row;
            
        }

    }

    return $records;

}
function getClientecf($id){

    $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale = '$id'";
       // echo $sql;
       
            
        $res = $conn->query($sql);
        if($res && $res->num_rows){
            $result = $res->fetch_assoc();
            
          }
     return $result;

}
function getFinanziamento($id){
       /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ='SELECT * FROM pratiche_fin WHERE id = '.$id;
        //echo $sql;
        $res = $conn->query($sql);
        
        if($res && $res->num_rows){
          $result = $res->fetch_assoc();
          
        }
      return $result;
}
function getFintab($id){
    /**
      * @var $conn mysqli
      */
   
     $conn = $GLOBALS['mysqli'];
     $result=[];
     $sql ='SELECT * FROM honda_tab_fin WHERE id = '.$id;
     //echo $sql;
     $res = $conn->query($sql);
     
     if($res && $res->num_rows){
       $result = $res->fetch_assoc();
       
     }
   return $result;
} 
function upStato(array $data){
    /**
      * @var $conn mysqli
      */
   

     $conn = $GLOBALS['mysqli'];
     $id=$data['id'];
     $id_contratto=$data['id_contratto'];
     $id_pratica=$data['id_pratica'];
     $id_fin=$data['id_fin'];
     $stato_pratica = $data['stato_pratica'];
     $data_responso = $data['data_responso'];
     $user_responso= $_SESSION['userData']['username'];
     $imp_finanziato =$data['imp_finanziato']; 
     $result=[];
     $sql ='UPDATE pratiche_fin SET ';
     $sql .= "stato_pratica = '$stato_pratica',data_responso = '$data_responso',user_responso = '$user_responso', imp_finanziato=$imp_finanziato";
     
     $sql .=" WHERE id=".$id;
     //echo $sql;die;
     $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              if($stato_pratica == "A"){
                $sqlcont="UPDATE contatori set contatore1 = contatore1 +1 WHERE tabella='contratti' and tipo='contratto'";
                $rescont = $conn->query($sqlcont);
                $sqlcont2="SELECT MAX(contatore1) as cont from contatori WHERE tabella='contratti' and tipo='contratto'";
                $rescont2 = $conn->query($sqlcont2);
                $resultcont2 = $rescont2->fetch_assoc();
                $num_cont = $resultcont2['cont'];
                $tipo="C";
                //var_dump($sqlcont);
                //var_dump($num_cont);die;
                $sql2 ='UPDATE contratti SET ';
                $sql2 .= "tip_saldo = 'F',id_fin = $id_fin, id_pratica = $id, imp_residuo = imp_finale-$imp_finanziato , tipo ='$tipo', num_cont=$num_cont ";
                
                $sql2 .=" WHERE id=".$id_contratto;
                //var_dump($sql2);die;
                $res2 = $conn->query($sql2);
               
                
           

              }
            }else{
              $result -1;  
            }
          
   return $result;
}
function getAllegati( $id){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
      $records = [];
        $sql ="SELECT * FROM allegati_pratiche WHERE id_cliente = '$id'";
        //echo $sql;
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

    return $records;
    
    
    
}
function getAllegaticli( $id){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
      $records = [];
        $sql ="SELECT * FROM allegati_cliente WHERE id_cliente = '$id'";
        //echo $sql;
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

    return $records;
    
    
    
}
function addAllegato(){
        /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];

    $cod_ambiente = $_SESSION['userData']['ambiente'];
    $cod_azienda = $_SESSION['userData']['azienda'];
    $cod_filiale = $_SESSION['userData']['filiale'];
    $user_ins = $_SESSION['userData']['username'];
    $data_ins = date('Y-m-d H:i:s');
    $descrizione = $_REQUEST['descrizione'];
    $id_cliente = $_REQUEST['id_cliente'];
    $tipo_file = $_REQUEST['tipof'];
    $id_pratica = $_REQUEST['id_pratica'];
    $tipo = $_REQUEST['tipo'];

    $importo = $_REQUEST['importo']?$_REQUEST['importo']:'';
    $stato_importo =$_REQUEST['importo']?'N':'';

    $scadenza = $_REQUEST['scadenza']?$_REQUEST['scadenza']:'0000-00-00';
    if($tipo=='CI'||$tipo=='CF'||$tipo=='DR'){
        $path = 'docs/CRM/Allegati/cliente/';
        $ext = strtolower($_REQUEST['ext']);
        // $nome_file = $id_contratto."_".$tipo."_".$tipo_file;
        $nome_file = $id_cliente."_".$tipo.".".$ext;

        $result=0;

        $sql ='INSERT INTO allegati_cliente (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, descrizione, id_cliente, tipo,importo,scadenza,tipo_file,percorso,nome_file,stato_importo) ';

        $sql .=" VALUES ( NULL, $cod_ambiente, $cod_azienda, $cod_filiale, '$user_ins', '$data_ins', '$descrizione','$id_cliente', '$tipo', $importo, '$scadenza', '$tipo_file','$path', '$nome_file','$stato_importo')";


    }else{
        $path = 'docs/CRM/Allegati/finanziamenti/';
        // $nome_file = $id_contratto."_".$tipo."_".$tipo_file;
        $ext = strtolower($_REQUEST['ext']);
        $nome_file = $id_pratica."_".$tipo."_".$tipo_file.".".$ext;

        $result=0;

        $sql ='INSERT INTO allegati_pratiche (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, descrizione, id_cliente, id_pratica,tipo,importo,scadenza,tipo_file,percorso,nome_file,stato_importo) ';

        $sql .=" VALUES ( NULL, $cod_ambiente, $cod_azienda, $cod_filiale, '$user_ins', '$data_ins', '$descrizione','$id_cliente', '$id_pratica', '$tipo', $importo, '$scadenza', '$tipo_file','$path', '$nome_file','$stato_importo')";

        // print_r($data);
        // echo $sql;die;
    }


    $res = $conn->query($sql);
    if($tipo =="CI"){ $tipod = "Documento di Riconoscimento";};
    if($tipo =="CF"){ $tipod = "Tessera Sanitaria/Codice Fiscale";};
    if($tipo =="DR"){ $tipod = "Documentazione di Reddito";};
    if($tipo =="IP"){ $tipod = "Copia Invio Pratica";};
    if($tipo =="RP"){ $tipod = "Responso Pratica";};
    if($tipo =="IS"){ $tipod = "Copia/Ricevuta Bonifico Importo Saldo";};
    if($tipo =="IE"){ $tipod = "Copia/Ricevuta Importo Estinzione";};

    $dat = date("d/m/Y H:i", strtotime($data_ins));
    $scad = date("d/m/Y", strtotime($scadenza));
    $last_id = mysqli_insert_id($conn);
    if($res ){
        $result =  $conn->affected_rows;
        $response[] =array( 
            "id" =>  "$last_id",
            "message" =>"$tipod Caricato Correttamente",
            "data" => "$dat",
            "user" => "$user_ins",
            "tipod" => "$tipod",
            "tipo" =>"$tipo",
            "descrizione" => "$descrizione",
            "importo" => "$importo",
            "stato_importo" => "$stato_importo",
            "scadenza" => "$scad",
            "percorso" => "$path",
            "nome" =>"$nome_file"                    

    );
    
    }else{
    $response=0;  
    }
    echo json_encode($response);

}
function delAllegato(int $id){

    /**
     * @var $conn mysqli
     */

      $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM allegati_pratiche WHERE id = '.$id;

        $res = $conn->query($sql);
        
       // return $res && $conn->affected_rows;
       if($res){
            echo json_encode($id);
       }

    
}
function delAllegatocli(int $id){

    /**
     * @var $conn mysqli
     */

      $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM allegati_cliente WHERE id = '.$id;

        $res = $conn->query($sql);
        
       // return $res && $conn->affected_rows;
       if($res){
            echo json_encode($id);
       }

    
}