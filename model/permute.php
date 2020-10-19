<?php
function getPermute(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
    $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
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
        
        $sql ='SELECT * FROM permute_contratto ';
        if($search1 or $search2 or $search3){
            $sql .=" WHERE";
        }
        if ($search1){
            $sql .=" targa = '$search1' ";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3){
                $sql .="AND";
            }
            
        }
        if($search2){
            $sql .="  modello LIKE '%$search2%'";
            if($search3){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  ab_testride ='$search3'";
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

function countPermute(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
    $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
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
        
        $sql ='SELECT COUNT(*) as totalList FROM permute_contratto';
       if($search1 or $search2 or $search3){
            $sql .=" WHERE";
        }
        if ($search1){
            $sql .=" targa LIKE '%$search1%' ";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3){
                $sql .="AND";
            }
            
          }
        if($search2){
            $sql .="  modello LIKE '%$search2%'";
            if($search3){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  ab_testride ='$search3'";
        }

        
         // var_dump($sql);
         $res = $conn->query($sql);
         if($res) {
 
          $row = $res->fetch_assoc();
          $totalList = $row['totalList'];
         }
 
     return $totalList;


}

function saveVeicolo(array $data){ 

    /**
     * @var $conn mysqli
     */
  
        $conn = $GLOBALS['mysqli'];

        $cod_ambiente = $_SESSION['userData']['ambiente'];
        $cod_azienda = $_SESSION['userData']['azienda'];
        $cod_filiale = $_SESSION['userData']['filiale'];
        $user_ins = $_SESSION['userData']['username'];
        $data_ins = date('Y-m-d H:i:s');
        $data_ritiro= $conn->escape_string($data['data_ritiro']);
        $id_cliente= $conn->escape_string($data['id_cliente']);
        $fascia_ritiro= $conn->escape_string($data['fascia_ritiro']);
        $stato_permuta = "P";
        $targa = $conn->escape_string($data['targa']);
        $telaio = $conn->escape_string($data['telaio']);
        $tipo_veicolo= $conn->escape_string($data['tipo_veicolo']);
       
        $marca = $conn->escape_string($data['marca']);
        $modello = $conn->escape_string($data['modello']);
        $anno = $conn->escape_string($data['anno']);
        $km = $data['km']? $conn->escape_string($data['km']):0;
        $cilindrata= $conn->escape_string($data['cilindrata']);
        $cod_colore= $conn->escape_string($data['cod_colore']);
        $des_colore= $conn->escape_string($data['des_colore']);
        $fuel = $conn->escape_string($data['fuel']);
       
        
        $result=0;
        $sql ='INSERT INTO permute_contratto (id,id_cliente, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins,data_ritiro,fascia_ritiro,stato_permuta,targa,telaio,tipo_veicolo,marca,modello,anno,km,cilindrata,cod_colore,des_colore,fuel) ';
        
        $sql .=" VALUE ( NULL,'$id_cliente','$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins','$data_ritiro','$fascia_ritiro','$stato_permuta','$targa','$telaio','$tipo_veicolo','$marca','$modello','$anno',$km,$cilindrata,'$cod_colore','$des_colore',$fuel)";
        
        

        
        //print_r($data);
        //echo $sql;die;
        $res = $conn->query($sql);
        
        if($res ){
          $result =  $conn->affected_rows;
          
        }else{
          $result -1;  
        }
      return $result;
    
    
}
function getPermuta(int $id){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ='SELECT * FROM permute_contratto WHERE id = '.$id;
        //echo $sql;
        $res = $conn->query($sql);
        
        if($res && $res->num_rows){
          $result = $res->fetch_assoc();
          
        }
      return $result;
    
    
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
function upVal(array $data){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
    $id=$data['id'];
        $stato_motore=$data["stato_motore"] ;
        $note_motore=$data["note_motore"] ;
        $costo_motore=$data["costo_motore"];
        $stato_cambio=$data["stato_cambio"];
        $note_cambio=$data["note_cambio"];
        $costo_cambio=$data["costo_cambio"];
        $stato_retrotreno=$data["stato_retrotreno"];
        $note_retrotreno=$data["note_retrotreno"];
        $costo_retrotreno=$data["costo_retrotreno"];
        $stato_freni=$data["stato_freni"];
        $note_freni=$data["note_freni"];
        $costo_freni=$data["costo_freni"];
        $stato_batteria=$data["stato_batteria"];
        $note_batteria=$data["note_batteria"];
        $costo_batteria=$data["costo_batteria"];
        $stato_strumenti=$data["stato_strumenti"];
        $note_strumenti=$data["note_strumenti"];
        $costo_strumenti=$data["costo_strumenti"];
        $stato_interno=$data["stato_interno"];
        $note_interno=$data["note_interno"];
        $costo_interno=$data["costo_interno"];
        $stato_pneumatici=$data["stato_pneumatici"];
        $note_pneumatici=$data["note_pneumatici"];
        $costo_pneumatici=$data["costo_pneumatici"];
        $stato_frizione=$data["stato_frizione"];
        $note_frizione=$data["note_frizione"];
        $costo_frizione=$data["costo_frizione"];
        $stato_avantreno=$data["stato_avantreno"];
        $note_avantreno=$data["note_avantreno"];
        $costo_avantreno=$data["costo_avantreno"];
        $stato_sosp=$data["stato_sosp"];
        $note_sosp=$data["note_sosp"];
        $costo_sosp=$data["costo_sosp"];
        $stato_scarico=$data["stato_scarico"]; 
        $note_scarico=$data["note_scarico"];
        $costo_scarico=$data["costo_scarico"]; 
        $stato_fari=$data["stato_fari"] ;
        $note_fari=$data["note_fari"];
        $costo_fari=$data["costo_fari"]; 
        $stato_ruote=$data["stato_ruote"];
        $note_ruote=$data["note_ruote"];
        $costo_ruote=$data["costo_ruote"];
        $stato_esterno=$data["stato_esterno"];
        $note_esterno=$data ["note_esterno"] ;
        $costo_esterno=$data ["costo_esterno"] ;
        $note_prestazione=$data ["note_prestazione"];
        $costo_prestazione=$data ["costo_prestazione"];
        $costi_ripristino=$data ["costi_ripristino"];


    $result=0;
    
    $sql ="UPDATE permute_contratto SET stato_motore='$stato_motore',note_motore='$note_motore',costo_motore=$costo_motore,stato_cambio='$stato_cambio',note_cambio='$note_cambio',costo_cambio=$costo_cambio,stato_retrotreno='$stato_retrotreno',note_retrotreno='$note_retrotreno',costo_retrotreno=$costo_retrotreno,stato_freni='$stato_freni',note_freni='$note_freni',costo_freni=$costo_freni,stato_batteria='$stato_batteria',note_batteria='$note_batteria',costo_batteria=$costo_batteria,stato_strumenti='$stato_strumenti',note_strumenti='$note_strumenti',costo_strumenti=$costo_strumenti,stato_interno='$stato_interno',note_interno='$note_interno',costo_interno=$costo_interno,stato_pneumatici='$stato_pneumatici',note_pneumatici='$note_pneumatici',costo_pneumatici=$costo_pneumatici,stato_frizione='$stato_frizione',note_frizione='$note_frizione',costo_frizione=$costo_frizione,stato_avantreno='$stato_avantreno',note_avantreno='$note_avantreno',costo_avantreno=$costo_avantreno,stato_sosp='$stato_sosp',note_sosp='$note_sosp',costo_sosp=$costo_sosp,stato_scarico='$stato_scarico',note_scarico='$note_scarico',costo_scarico= $costo_scarico,stato_fari='$stato_fari',note_fari='$note_fari',costo_fari=$costo_fari,stato_ruote='$stato_ruote',note_ruote='$note_ruote',costo_ruote=$costo_ruote,stato_esterno='$stato_esterno',note_esterno='$note_esterno',costo_esterno=$costo_esterno,note_prestazione= '$note_prestazione',costo_prestazione=$costo_prestazione,costi_ripristino=$costi_ripristino";
    //";
    $sql .=" WHERE id = $id";
    //print_r($data);
    //echo $sql;die;
    $result = $conn->query($sql);


    
   
          
      if($res ){
            $result =  $conn->affected_rows;
            
      }else{
            $result -1;  
      }
    return $result;
}
function upValore(array $data){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
    $id=$data['id'];
    $stima=$data['stima'];  
    $valore_finale=$data['valore_finale'];  
    $user_value=$_SESSION['userData']['username']; 
    $data_value=date("Y-m-d H:i:s");  
    $stato_permuta = "V";
    $note=$data['note']?$data['note']:''; 


    $result=0;
    
    $sql ="UPDATE permute_contratto SET stima=$stima,valore_finale=$valore_finale,user_value='$user_value',data_value='$data_value',stato_permuta='$stato_permuta',note='$note'";
    //";
    $sql .=" WHERE id = $id";
    //print_r($data);
    //echo $sql;die;
    $result = $conn->query($sql);


    
   
          
      if($res ){
            $result =  $conn->affected_rows;
            
      }else{
            $result -1;  
      }
    return $result;
}
function upDettagli(array $data){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
    $id=$data['id'];
    $libretto=$data['libretto'];  
    $num_inte=$data['num_inte'];  
    $cdp=$data['cdp']; 
    $firma_cdp=$data['firma_cdp'];

    $doc_copia=$data['doc_copia'];
    $stato_tassa=$data['stato_tassa'];
    $data_tassa=$data['data_tassa'];
    $stato_fermo=$data['stato_fermo'];
    $data_revisione=$data['data_revisione'];
    $stato_chiavi=$data['stato_chiavi'];
    $stato_borsa=$data['stato_borsa'];

    $stato_scorta=$data['stato_scorta'];
    
    $note=$data['note'];




    $result=0;
    
    $sql ="UPDATE permute_contratto SET libretto='$libretto',num_inte=$num_inte,cdp='$cdp',firma_cdp='$firma_cdp',doc_copia='$doc_copia',stato_tassa='$stato_tassa',data_tassa='$data_tassa',stato_fermo='$stato_fermo',data_revisione='$data_revisione',stato_chiavi='$stato_chiavi',stato_borsa='$stato_borsa',stato_scorta='$stato_scorta',note='$note'";
    //";
    $sql .=" WHERE id = $id";
    //print_r($data);
    //echo $sql;die;
    $result = $conn->query($sql);


    
   
          
      if($res ){
            $result =  $conn->affected_rows;
            
      }else{
            $result -1;  
      }
    return $result;
}
function upRitiro(array $data){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
    $id=$data['id'];
    
    $procedura_ritiro=$data['procedura_ritiro'];
    $tipo_fattura=$data['tipo_fattura'];
    $note_vendita=$data['note_vendita'];




    $result=0;
    
    $sql ="UPDATE permute_contratto SET procedura_ritiro='$procedura_ritiro',tipo_fattura='$tipo_fattura',note_vendita='$note_vendita'";
    //";
    $sql .=" WHERE id = $id";
    //print_r($data);
    //echo $sql;die;
    $result = $conn->query($sql);


    
   
          
      if($res ){
            $result =  $conn->affected_rows;
            
      }else{
            $result -1;  
      }
    return $result;
}