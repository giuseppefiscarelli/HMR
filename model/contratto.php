<?php
function delete($id){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $sql ='DELETE FROM contratti WHERE id = '.$id;
    $sql2 ="DELETE FROM allegati_contratti WHERE id_contratto =".$id;
    $sql3 ="DELETE FROM contratto_cron WHERE id_contratto =".$id;
    $sql4 ="DELETE FROM accessori_contratto WHERE id_contratto =".$id;
    var_dump($sql);
    var_dump($sql2);
    var_dump($sql3);
    var_dump($sql4);
    $res = $conn->query($sql);
    $res2 = $conn->query($sql2);
    $res3 = $conn->query($sql3);
    $res4 = $conn->query($sql4);
   
    return $res && $conn->affected_rows;
    
    
}
    function getUsersList(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $amb = $_SESSION['userData']['ambiente'];
        $az = $_SESSION['userData']['azienda'];
        $fl = $_SESSION['userData']['filiale'];
        $records = [];

        

        $sql = "SELECT * FROM users WHERE ambiente = $amb and azienda = '$az' and filiale = '$fl'";
        
        $sql .= " ORDER BY id";
        

        $res = $conn->query($sql);
        if($res) {

          while( $row = $res->fetch_assoc()) {
              $records[] = $row;
              
          }

        }

     return $records;

    }
    function getCliente($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM anagr_clienti WHERE id = '$id'";
        // echo $sql;
        
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
            }
        return $result;

    }

    function getMotolist(){
        $conn = $GLOBALS['mysqli'];
        $records=[];
        $sql ="SELECT * FROM honda_listino_veicoli order by lisdes";
        // echo $sql;
    
            
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

        return $records;

    }
    function getListIdvei($des){
        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * FROM honda_listino_veicoli WHERE lisdes='$des'";
        // echo $sql;
    
            
        $res = $conn->query($sql);
        if($res && $res->num_rows){
            $result = $res->fetch_assoc();
            
        }
        return $result;


    }
    
    function getMotosel($id){
        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * FROM versioni_veicoli  WHERE id = '$id'";
        // echo $sql;
    
            
        $res = $conn->query($sql);
        if($res && $res->num_rows){
            $result = $res->fetch_assoc();
            
        }
        return $result;

    }
    function getColor($modello){

                /**
             * @var $conn mysqli
             */
            $conn = $GLOBALS['mysqli'];
            $records=[];
            
            $sql ="SELECT * FROM versioni_veicoli WHERE modello = '$modello'";
            //print_r($sql);
            //echo $sql;die;
                
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

    return $records;


    
}
    function getMotomag($des){
        $conn = $GLOBALS['mysqli'];
        //$records=[];
        //$sql ='SELECT count(*) as totalList FROM contratti';
        $totalList = 0;
        $sql ="SELECT count(*) as total FROM veicoli_nuovi  WHERE descrizione = '$des'";
        // echo $sql;
    
            
        $res = $conn->query($sql);
        if($res) {

         $row = $res->fetch_assoc();
         $totalList = $row['total'];
        }

        return $totalList;

    }
    function getVermag(int $id){
        $conn = $GLOBALS['mysqli'];
        //$records=[];
        //$sql ='SELECT count(*) as totalList FROM contratti';
        $json = [];
        $sql ="SELECT * FROM veicoli_nuovi  WHERE id_veicolo = $id";
        //echo $sql;
    
            
        $res = $conn->query($sql);
            if($res && $res->num_rows) {

                while( $row = $res->fetch_assoc()) {
                    $json[] = $row;
                    
                }
                echo json_encode($json);
            }else{

                echo json_encode(0);
            }
            
       

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
    function upBozza(){
        /**
     * @var $conn mysqli
     */
        $conn = $GLOBALS['mysqli'];
        $id_cliente = $_REQUEST['id_cliente'];
            $id_veicolo = $_REQUEST['id_veicolo'];
            $user_mod = $_REQUEST['user_ins']; 
            $id = intval($_REQUEST['id']);
            $result=0;
            $sql ="UPDATE contratti SET ";
            $sql .=" user_mod = '$user_mod' , id_cliente = '$id_cliente', id_veicolo = '$id_veicolo' ";
            $sql .=" WHERE id = $id";
            //print_r($data);
            // echo $sql;//die;
            $res = $conn->query($sql);
            if($res ){
                $result =  $conn->affected_rows;
                $last_id['id_contratto'] = $id;
                //echo "New record created successfully. Last inserted ID is: " . $last_id;
                //return $last_id;
            }else{
                $last_id=0;  
            }
            echo json_encode($last_id);

    }
    function upBozzaper(array $data){
        /**
     * @var $conn mysqli
     */
        $conn = $GLOBALS['mysqli'];
        
            $id = $data['id_contratto'];
            $id_permuta = $data['id_permuta'];
            $imp_permuta = $data['imp_permuta'];
            $permuta = "P";
            $result=0;
            $sql ="UPDATE contratti SET ";
            $sql .=" id_permuta = '$id_permuta' ,imp_permuta = '$imp_permuta' , permuta = '$permuta'";
            $sql .=" WHERE id = $id";
            //print_r($data);
            // echo $sql;//die;
            $res = $conn->query($sql);
            if($res ){
                $result =  $conn->affected_rows;
                $last_id['id_contratto'] = $id;
                //echo "New record created successfully. Last inserted ID is: " . $last_id;
                //return $last_id;
            }else{
                $last_id=0;  
            }
            echo json_encode($last_id);

    }

    function saveBozza(){
     /**
     * @var $conn mysqli
     */
        $conn = $GLOBALS['mysqli'];

        $cod_ambiente = $_SESSION['userData']['ambiente'];
        $cod_azienda = $_SESSION['userData']['azienda'];
        $cod_filiale = $_SESSION['userData']['filiale'];

        $user_ins = $_SESSION['userData']['username'];
        $data_ins = date('Y-m-d H:i:s');     
        $id_cliente = $_REQUEST['id_cliente'];
        $id_veicolo = $_REQUEST['id_veicolo'];
        $user_ins = $_REQUEST['user_ins'];
        $data_ins = date('Y-m-d H:i:s');
        $tipo = "B";
        $result=0;

        $sql ='INSERT INTO contratti (id, cod_ambiente,cod_azienda,cod_filiale, user_ins, data_ins, id_cliente, id_veicolo, tipo) ';
        
        $sql .=" VALUES ( NULL,'$cod_ambiente','$cod_azienda','$cod_filiale','$user_ins','$data_ins', '$id_cliente', '$id_veicolo', '$tipo')";
           
        //print_r($data);
        //echo $sql;//die;
        $res = $conn->query($sql);
        if($res ){
            $result =  $conn->affected_rows;
            $last_id['id_contratto'] = mysqli_insert_id($conn);
            //echo "New record created successfully. Last inserted ID is: " . $last_id;
            //return $last_id;
        }else{
            $last_id=0;  
        }
        echo json_encode($last_id);


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
            $id_contratto = $_REQUEST['id_contratto'];
            $tipo = $_REQUEST['tipo'];
           
            $importo = $_REQUEST['importo']?$_REQUEST['importo']:'';
            $stato_importo =$_REQUEST['importo']?'N':'';
            $scadenza = $_REQUEST['scadenza']?$_REQUEST['scadenza']:'0000-00-00';
            $path = 'docs/CRM/Allegati/contratti/';
           // $nome_file = $id_contratto."_".$tipo."_".$tipo_file;
            $ext = $_REQUEST['ext'];
            $nome_file = $id_contratto."_".$tipo."_".$tipo_file.".".$ext;
            $result=0;

            $sql ='INSERT INTO allegati_contratto (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, descrizione, id_cliente, id_contratto,tipo,importo,scadenza,tipo_file,percorso,nome_file,stato_importo) ';
            
            $sql .=" VALUES ( NULL, $cod_ambiente, $cod_azienda, $cod_filiale, '$user_ins', '$data_ins', '$descrizione','$id_cliente', $id_contratto, '$tipo', $importo, '$scadenza', '$tipo_file','$path', '$nome_file','$stato_importo')";
            
           // print_r($data);
          // echo $sql;//die;
            $res = $conn->query($sql);
            if($tipo =="CI"){ $tipod = "Documento di Riconoscimento";};
            if($tipo =="CF"){ $tipod = "Tessera Sanitaria/Codice Fiscale";};
            if($tipo =="DR"){ $tipod = "Documentazione di Reddito";};
            if($tipo =="BS"){ $tipod = "Copia/Ricevuta Bonifico Saldo";};
            if($tipo =="AS"){ $tipod = "Copia/Ricevuta Assegno Saldo";};
            if($tipo =="BC"){ $tipod = "Copia/Ricevuta Bonifico Caparra";};
            if($tipo =="AC"){ $tipod = "Copia/Ricevuta Assegno Caparra";};
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
    
            $sql ='DELETE FROM allegati_contratto WHERE id = '.$id;
    
            $res = $conn->query($sql);
            
           // return $res && $conn->affected_rows;
           if($res){
                echo json_encode($id);
           }

        
    }

    function countContratti(array $params = []){
        /**
            * @var $conn mysqli
            */
   
           $conn = $GLOBALS['mysqli'];
   
           $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
           $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
           $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
           $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
           $search3 = array_key_exists('search3',$params)?date("Y-m-d H:i:s", strtotime($params['search3'])):date('Y-m-d H:i:s');
           $search4 = array_key_exists('search4',$params)?date("Y-m-d 23:59:59", strtotime($params['search4'])):date('Y-m-d H:i:s');
           $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
           $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
           //var_dump($params);die;
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
               
               $sql ='SELECT count(*) as totalList FROM contratti';
               /*
               if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
                 $sql .=" WHERE";
             }
             if ($search1){
                 $sql .=" id_cliente like %'$search1'% ";
                 //$sql .=" OR lisdve LIKE '%$search1%' ";
                 if($search2 || $search3|| $search4|| $search5|| $search6){
                     $sql .=" AND ";
                 }  
             }
             if($search2){
                 $sql .="  stato_test = '$search2'";
                 if($search3|| $search4|| $search5|| $search6){
                     $sql .=" AND ";
                 }
             }
             if($search3){
                 $sql .="  data_pren >= '$search3'";
                  if( $search4|| $search5|| $search6){
                  $sql .=" AND ";
               }
             }
             if($search4){
                 $sql .="  data_pren <= '$search4' ";
                 if($search5|| $search6){
                   $sql .=" AND ";
               }
             }
              if($search5){
                 $sql .="  id_veicolo = '$search5'";
                 if($search6){
                   $sql .=" AND ";
               }
             }
             if($search6){
               $sql .="  user_pren ='$search6'";
               
             }
             */
                // var_dump($sql);
                $res = $conn->query($sql);
                if($res) {
        
                 $row = $res->fetch_assoc();
                 $totalList = $row['totalList'];
                }
        
            return $totalList;
   
   
    }

    function getContratti(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3',$params)?date("Y-m-d H:i:s", strtotime($params['search3'])):date('Y-m-d H:i:s');
        $search4 = array_key_exists('search4',$params)?date("Y-m-d 23:59:59", strtotime($params['search4'])):date('Y-m-d H:i:s');
        $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
        $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
        //var_dump($params);die;
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
            
            $sql ='SELECT * FROM contratti';
           if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" id '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 || $search3|| $search4|| $search5|| $search6){
                    $sql .=" AND "; 
                }  
            }
            if($search2){
                $sql .="  tipo = '$search2'";
                if($search3|| $search4|| $search5|| $search6){
                    $sql .=" AND ";
                }
            }
            if($search3){
                $sql .="  data_ins >= '$search3'";
                 if( $search4|| $search5|| $search6){
                 $sql .=" AND ";
              }
            }
            if($search4){
                $sql .="  data_ins <= '$search4' ";
                if($search5|| $search6){
                  $sql .=" AND ";
              }
            }
             if($search5){
                $sql .="  id_veicolo = '$search5'";
                if($search6){
                  $sql .=" AND ";
              }
            }
            if($search6){
              $sql .="  user_ins ='$search6'";
              
            }
        
        
            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
            // var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }

    function getContratticf($id){
        $conn = $GLOBALS['mysqli'];
        //$records=[];
        //$sql ='SELECT count(*) as totalList FROM contratti';
        $json = [];
        $sql ="SELECT * FROM contratti  WHERE id_cliente = '$id' order by id DESC";
        //echo $sql;
    
            
        $result = $conn->query($sql);
    
        $json = array();
        while($row = $result->fetch_assoc() ){
             $json[] = $row;
        }
        echo json_encode($json);
            
       

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
    function getContrattoId($id){

        /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ='SELECT * FROM contratti WHERE id = '.$id;
        $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
            echo json_encode($result);

    }
    function getContratto(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * FROM contratti WHERE id = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
          return $result;
        
        
    }

    function getAccessori(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
          $records = [];
            $sql ='SELECT * FROM accessori_contratto WHERE id_contratto = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
        
        
    }

    function upAccessori(array $data){
        /**
     * @var $conn mysqli
     */
        $conn = $GLOBALS['mysqli'];
        $id = $data['id'];
        $qnt = $data['qnt'];
        $per_sconto = $data['per_sconto'];
           
            $sql ="UPDATE accessori_contratto SET ";
            $sql .=" qnt = $qnt ,per_sconto = $per_sconto";
            $sql .=" WHERE id = $id";
            //print_r($data);
            //echo $sql;//die;
            $res = $conn->query($sql);
            if($res ){
                $result =  $conn->affected_rows;
                $last_id['id_contratto'] = $id;
                //echo "New record created successfully. Last inserted ID is: " . $last_id;
                //return $last_id;
            }else{
                $last_id=0;  
            }
            echo json_encode($last_id);

    }
    function delAccessori(int $id){

        /**
         * @var $conn mysqli
         */
    
          $conn = $GLOBALS['mysqli'];
    
            $sql ='DELETE FROM accessori_contratto WHERE id = '.$id;
    
            $res = $conn->query($sql);
            
           // return $res && $conn->affected_rows;
           if($res){
                echo json_encode($id);
           }

        
    }
    function getAllegati(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
          $records = [];
            $sql ='SELECT * FROM allegati_contratto WHERE id_contratto = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
        
        
        
    }
    function getAllegato(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
          $result = [];
            $sql ='SELECT * FROM allegati_contratto WHERE id = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
            }
        return $result;
        
        
    }


    function sumAccessori(int $id){

        /**
         * @var $conn mysqli
         */
  
            $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT SUM(tot_iva)  FROM accessori_contratto WHERE id_contratto = '.$id;
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res && $res->num_rows){
            $result = $res->fetch_assoc();
            
            }
        return $result;

    }
    function saveContratto(array $data){ 

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];

          $cod_ambiente = $_SESSION['userData']['ambiente'];
          $cod_azienda = $_SESSION['userData']['azienda'];
          $cod_filiale = $_SESSION['userData']['filiale'];

          $id_cliente =$conn->escape_string($data['id_cliente']);
          $id_veicolo =$conn->escape_string($data['id_veicolo']);
          $id_contratto =intval($data['id_contratto']);
          $user_mod =$conn->escape_string($data['user_ins']);
          $imp_imma=$conn->escape_string($data['imp_imma']);
          $iva=$conn->escape_string($data['iva']);

          $imp_caparra=$conn->escape_string($data['imp_caparra']);
          $tip_caparra=$conn->escape_string($data['tip_caparra']);
          $imp_sconto=$conn->escape_string($data['imp_sconto']);
          $per_sconto=$conn->escape_string($data['per_sconto']);
          $tot_scontato=$conn->escape_string($data['tot_scon']);
          $imp_saldo=$conn->escape_string($data['tot_residuo']);
          $tip_saldo=$conn->escape_string($data['tip_saldo']);
          $imp_finale=$conn->escape_string($data['imp_finale']);
          $imp_residuo=$conn->escape_string($data['tot_residuo']);
          $imp_accessori=$data['imp_accessori']?$conn->escape_string($data['imp_accessori']):0;
          $imp_veicolo_siva=$conn->escape_string($data['imp_veicolo_siva']);
          $imp_veicolo_iva=$conn->escape_string($data['imp_veicolo_iva']);
          $id_fin=$data['id_fin']?$conn->escape_string($data['id_fin']):0;
          $id_pratica=$data['id_pratica']?$conn->escape_string($data['id_pratica']):0;
          $permuta = $data['permuta']?$conn->escape_string($data['permuta']):'';
          $id_permuta = $data['id_permuta']?$conn->escape_string($data['id_permuta']):'';
          $imp_permuta = $data['imp_permuta']?$conn->escape_string($data['imp_permuta']):'';
          $telaio = $data['telaio']?$conn->escape_string($data['telaio']):'';
          $data_consegna =$data['data_consegna']?$conn->escape_string($data['data_consegna']):'';
            if($permuta == "S"){
                $cod_ambiente = $_SESSION['userData']['ambiente'];
                $cod_azienda = $_SESSION['userData']['azienda'];
                $cod_filiale = $_SESSION['userData']['filiale'];
                $intestatario = $conn->escape_string($data['per_int']);
                $targa = $conn->escape_string($data['per_targa']);
                $marca = $conn->escape_string($data['per_marca']);
                $modello =$conn->escape_string($data['per_modello']);
                $anno =$conn->escape_string($data['per_anno']);
                $km = $conn->escape_string($data['imp_caparra']);
                $stima =$conn->escape_string($data['per_stima']);
                $note =$conn->escape_string($data['per_note']);
                $user_ins = $_SESSION['userData']['username'];
                $data_ins = date('Y-m-d H:i:s');     
                $sqlper='INSERT INTO permute_contratto (id, cod_ambiente,cod_azienda,cod_filiale, user_ins, data_ins, id_cliente, id_contratto,intestatario,targa,marca,modello,anno,km,stima,note ) ';
        
                $sqlper .=" VALUES ( NULL,'$cod_ambiente','$cod_azienda','$cod_filiale','$user_ins','$data_ins', '$id_cliente', $id_contratto, '$intestatario','$targa','$marca','$modello','$anno',$km,$stima,'$note')";
                $resper = $conn->query($sqlper);
            }

            if($telaio){

                $sqltel ="UPDATE veicoli_nuovi SET ";
                $sqltel .=" stato = 'R' , id_contratto = $id_contratto";
                $sqltel .=" WHERE telaio = '$telaio'";
                //print_r($data);
                // echo $sql;//die;
                $restel = $conn->query($sqltel);
            }


            if($imp_caparra==0.00&&$imp_saldo!=0.00){
                $tipo="P";
                $sqlcont="UPDATE contatori set contatore1 = contatore1 +1 WHERE tabella='contratti' and tipo='preventivo'";
                $rescont = $conn->query($sqlcont);
                $sqlcont2="SELECT MAX(contatore1) as cont from contatori WHERE tabella='contratti' and tipo='preventivo'";
                $rescont2 = $conn->query($sqlcont2);
                $resultcont2 = $rescont2->fetch_assoc();
                $num_cont = $resultcont2['cont'];

            }else{
                $tipo="C";
                $sqlcont="UPDATE contatori set contatore1 = contatore1 +1 WHERE tabella='contratti' and tipo='contratto'";
                $rescont = $conn->query($sqlcont);
                $sqlcont2="SELECT MAX(contatore1) as cont from contatori WHERE tabella='contratti' and tipo='contratto'";
                $rescont2 = $conn->query($sqlcont2);
                $resultcont2 = $rescont2->fetch_assoc();
                $num_cont = $resultcont2['cont'];
                //var_dump($sqlcont2);die;

            }
               
         
             
         
          //$id_fin



            
      
      
            
            $result=0;
            $sql ='UPDATE contratti SET ';
            $sql .= "num_cont= $num_cont, id_cliente = '$id_cliente', id_veicolo = '$id_veicolo', user_mod = '$user_mod',";
            $sql .="imp_caparra = $imp_caparra, tip_caparra = '$tip_caparra', imp_sconto = $imp_sconto, tipo = '$tipo',per_sconto = $per_sconto, tot_scontato = $tot_scontato, imp_saldo = $imp_saldo, tip_saldo = '$tip_saldo'";
           $sql .= ", imp_finale = $imp_finale, imp_residuo = $imp_residuo";
           $sql .= ",imp_accessori = $imp_accessori, imp_veicolo_siva = $imp_veicolo_siva,imp_veicolo_iva = $imp_veicolo_iva, id_fin = $id_fin,id_pratica=$id_pratica, imp_imma = $imp_imma, iva = $iva";

            $sql .=" WHERE id = $id_contratto";
            //print_r($data);
            //echo $sql;
            //die;
            
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              if($id_pratica>0){
                $sqlfin ='UPDATE pratiche_fin SET ';
                $sqlfin .= "id_contratto= $id_contratto";
    
                $sqlfin .=" WHERE id = $id_pratica";
                //print_r($data);
                echo $sqlfin;
                //die;
                
                $resfin = $conn->query($sqlfin);

              }
              
            }else{
              $result -1;  
            }
          return $result;
        
        
    }

    function incImporto(array $alle){
        /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];
        //var_dump($alle);
        $cod_ambiente = $_SESSION['userData']['ambiente'];
        $cod_azienda = $_SESSION['userData']['azienda'];
        $cod_filiale = $_SESSION['userData']['filiale'];
        $user_ins = $_SESSION['userData']['username'];
        $data_ins = date('Y-m-d H:i:s');
        $descrizione = $alle['descrizione'];
        $id_contratto = $alle['id_contratto'];
        $id_cliente = $alle['id_cliente'];
        $importo_a = $alle['importo'];
        $tipo_a = $alle['tipo'];
        $stato_a = "I";


        $result=0;

            $sql ='INSERT INTO contratto_cron (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins,descrizione,id_contratto,id_cliente,importo_a,tipo_a,stato_a) ';
            
            $sql .=" VALUES ( NULL, $cod_ambiente, $cod_azienda, $cod_filiale, '$user_ins', '$data_ins','$descrizione',$id_contratto,'$id_cliente',$importo_a,'$tipo_a','$stato_a')";
            
           // print_r($data);
          // echo $sql;//die;
            $res = $conn->query($sql);
            if($res ){
                $id = $alle['id'];
                $sql2 ='UPDATE allegati_contratto SET stato_importo = "I" WHERE id='.$id;
                $res2 = $conn->query($sql2);
                $getContr = getContratto($id_contratto);

                if($alle['tipo']=="BC"||$alle['tipo']=="AC"){
                    $sql3 ='UPDATE contratti SET stato_caparra = "I" WHERE id='.$id_contratto;
                }
                if($alle['tipo']=="BS"||$alle['tipo']=="AS"){
                    $a = floatval($alle['importo']);
                    $b = floatval($getContr['imp_residuo']);
                    $c = $b-$a;
                   //var_dump($c);
                    if ($c > 0){
                        $s = "P";
                    }
                    if ($c == 0){
                        $s = "I";
                    }
                    $sql3 ="UPDATE contratti SET stato_saldo = '$s' , imp_residuo = $c WHERE id=".$id_contratto;
                   // echo $sql3;
                }

                $res3 = $conn->query($sql3);
                //$result=1;
                $dat = date("d/m/Y H:i", strtotime($data_ins));
                
                if($tipo_a =="BS"){ $tipod = "Bonifico Saldo";};
                if($tipo_a =="AS"){ $tipod = "Assegno Saldo";};
                if($tipo_a =="BC"){ $tipod = "Bonifico Caparra";};
                if($tipo_a =="AC"){ $tipod = "Assegno Caparra";};
                if($tipo_a =="BS"||$tipo_a =="AS"){ $tipoi = "Saldo";};
                if($tipo_a =="BC"||$tipo_a =="AC"){ $tipoi = "Caparra";};
                $response[] =array( 
                    "result" => 1,
                    "data" => "$dat",
                    "user" => "$user_ins",
                    "tipod" => "$tipod",
                    "tipo" =>"$tipoi",
                    "descrizione" => "$descrizione",
                    "importo" => "$importo_a",
                    "stato_importo" => "$stato_a"
                                  
            
            );
            }
            
           echo json_encode($response);
  



    }

    function getCron($id){
        
        /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];
        $records = [];
          $sql ='SELECT * FROM contratto_cron WHERE id_contratto = '.$id;
          //echo $sql;
          $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getPermuta(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
          $result = [];
            $sql ='SELECT * FROM permute_contratto WHERE id_contratto = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
            }
        return $result;
        
        
    }
    function getPermutacontr($id){

        /**
         * @var $conn mysqli
         */
        
          $conn = $GLOBALS['mysqli'];
         
          $result = [];
          $sql ='SELECT * FROM permute_contratto WHERE id = '.$id;
           
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
            while($row = $result->fetch_array() ){
                    $response[] = array(
                    "id"=>$row['id'],
                    "intestatario"=>$row['intestatario'],
                    "targa"=>$row['targa'],
                    "marca"=>$row['marca'],
                    "modello"=>$row['modello'],
                    "anno"=>$row['anno'],
                    "km"=>$row['km'],
                    "stima"=>$row['stima'],
                    "note"=>$row['note']
                    
                );

            }

        echo json_encode($response);
        
        
    }
    function getPermute($id){

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * FROM permute_contratto WHERE id_cliente = '$id'";
            echo $sql;
           
                
           $res = $conn->query($sql);
           if($res) {
 
               while( $row = $res->fetch_assoc()) {
                   $records[] = $row;
                   
               }
 
           }
 
       return $records;
 
    
    }
    function getColore(){

            /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
      
        $modello = $_REQUEST['modello'];
        $sql ="SELECT * FROM versioni_veicoli WHERE modello = '$modello'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        $json = [];
        while($row = $result->fetch_assoc()){
            $des = $row['id'];
            $sql2 ="SELECT count(*) as total FROM veicoli_nuovi  WHERE id_veicolo = $des";
            //echo $sql;
        
                
            $res2 = $conn->query($sql2);
            while($row2 = $res2->fetch_assoc()){
    
            
                $row['total'] = $row2['total'];
            }

           // $json[$row['id']] = $row['cod_col']." - ".$row['des_col']. " - ".$row['total'];
            $json[$row['id']] =array(
                
                "descrizione"=>$row['cod_col']." - ".$row['des_col'],
                "quantita"=>$row['total']
        
               
                );
        }
     
     
        echo json_encode($json);
        
    }
    function getFinanziamento($id){
         /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];
        $records = [];
          $sql ='SELECT * FROM pratiche_fin WHERE id_contratto = '.$id;
          //echo $sql;
          $res = $conn->query($sql);
          if($res) {

              while( $row = $res->fetch_assoc()) {
                  $records[] = $row;
                  
              }

          }

      return $records;


    }
    function getPraticafin($id){
        /**
        * @var $conn mysqli
        */
     
       $conn = $GLOBALS['mysqli'];
       $result = [];
         $sql ='SELECT * FROM pratiche_fin WHERE id = '.$id;
         //echo $sql;
         $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
            }
        return $result;


   }



   
    