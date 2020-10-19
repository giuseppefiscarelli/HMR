<?php


function getClienti(array $params = []){ 

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'lisdve';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
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
        
        $sql ='SELECT * FROM anagr_clienti';
        if($search1 or $search2 or $search3){
            $sql .=" WHERE";
        }
        if ($search1){
            $sql .=" cognome LIKE '%$search1%' OR nome like '%$search1%' ";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3){
                $sql .="AND";
            }
            
          }
        if($search2){
            $sql .="  codfiscale like '%$search2%'";
            if($search3){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  lisgam ='$search3'";
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

function getCliente(int $id){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ='SELECT * FROM anagr_clienti WHERE id = '.$id;
        //echo $sql;die;
        $res = $conn->query($sql);
        
        if($res && $res->num_rows){
          $result = $res->fetch_assoc();
          
        }
      return $result;
    
    
}

function getClientecf($id){

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $result=[];
      $sql ="SELECT * FROM anagr_clienti WHERE codfiscale = '$id'";
      //echo $sql;die;
      $res = $conn->query($sql);
      
      if($res && $res->num_rows){
        $result = $res->fetch_assoc();
        
      }
    return $result;
  
  
}

function getPatente($id){

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * FROM patenti WHERE id_cliente = '$id'";
        //echo $sql;
        $res = $conn->query($sql);
        
        if($res && $res->num_rows){
          $result = $res->fetch_assoc();
          
        }
      return $result;
    
    
}

function deleteCliente(int $id){

    /**
     * @var $conn mysqli
     */

      $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM anagr_clienti WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;
    
    
}  

function storeCliente(array $data, int $id){ 

    /**
     * @var $conn mysqli
     */
  
      $conn = $GLOBALS['mysqli'];
        $user_mod = $_SESSION['userData']['username'];
        $ragsociale = $conn->escape_string($data['ragsociale']);
        $ragsociale?$ragsociale:NULL;
        $cognome = $conn->escape_string($data['cognome']);
        $nome = $conn->escape_string($data['nome']);
        $luogonasc = $conn->escape_string($data['luogonasc']);
        $provnasc = $conn->escape_string($data['provnasc']); 
        $datanasc = $conn->escape_string($data['datanasc']);
        $nazionalita = $conn->escape_string($data['nazionalita']); 
        $sesso = $conn->escape_string($data['sesso']);  
        $codfiscale = $conn->escape_string($data['codfiscale']);
        $partitaiva = $conn->escape_string($data['partitaiva']);
        $partitaiva?$partitaiva:NULL;
        $indirizzores = $conn->escape_string($data['indirizzores']);
        $indirizzores?$indirizzores:NULL;
        $luogores = $conn->escape_string($data['luogores']);
        $luogores?$luogores: NULL;
        $provres = $conn->escape_string($data['provres']);
        $provres?$provres:NULL;
        $capres = $conn->escape_string($data['capres']);
        $capres?$capres:NULL;
        $mail1 = $conn->escape_string($data['mail1']);
        $mail1?$mail1:NULL;
        $mail2 = $conn->escape_string($data['mail2']);
        $mail2?$mail2:NULL;
        $tel1 =$conn->escape_string($data['tel1']);
        $tel1?$tel1:NULL;
        $tel2 = $conn->escape_string($data['tel2']);
        $tel2?$tel2:NULL;
        $mobile1 =$conn->escape_string($data['mobile1']);
        $mobile1?$mobile1:NULL;
        $mobile2 = $conn->escape_string($data['mobile2']);
        $mobile2?$mobile2:NULL;
        
        $result=0;
        $sql ='UPDATE anagr_clienti SET ';
        $sql .= "user_mod = '$user_mod', ragsociale ='$ragsociale',cognome = '$cognome', nome = '$nome', luogonasc ='$luogonasc', provnasc='$provnasc', datanasc ='$datanasc', nazionalita='$nazionalita',        sesso ='$sesso', codfiscale = '$codfiscale', partitaiva = '$partitaiva', indirizzores ='$indirizzores', luogores = '$luogores', provres ='$provres', capres ='$capres', mail1 = '$mail1', mail2 ='$mail2', tel1 = '$tel1', tel2 = '$tel2', mobile1 = '$mobile1', mobile2 = '$mobile2'  ";
        
        
        $sql .=' WHERE id = '.$id;
       // print_r($data);
        //echo $sql;die;
        $res = $conn->query($sql);
        
        if($res ){
          $result =  $conn->affected_rows;
          
        }else{
          $result -1;  
        }
      return $result;
    
    
}

function saveCliente(array $data){ 

    /**
     * @var $conn mysqli
     */
  
        $conn = $GLOBALS['mysqli'];
        
        $ragsociale = $conn->escape_string($data['ragsociale']);
        $ragsociale?$ragsociale:NULL;
        $cognome = $conn->escape_string($data['cognome']);
        $nome = $conn->escape_string($data['nome']);
        $luogonasc = $conn->escape_string($data['luogonasc']);
        $provnasc = $conn->escape_string($data['provnasc']); 
        $datanasc = $conn->escape_string($data['datanasc']);
        $nazionalita = $conn->escape_string($data['nazionalita']); 
        $sesso = $conn->escape_string($data['sesso']);  
        $codfiscale = $conn->escape_string($data['codfiscale']);
        $partitaiva = $conn->escape_string($data['partitaiva']);
        $partitaiva?$partitaiva:NULL;
        $indirizzores = $conn->escape_string($data['indirizzores']);
        $indirizzores?$indirizzores:NULL;
        $luogores = $conn->escape_string($data['luogores']);
        $luogores?$luogores: NULL;
        $provres = $conn->escape_string($data['provres']);
        $provres?$provres:NULL;
        $capres = $conn->escape_string($data['capres']);
        $capres?$capres:NULL;
        $mail1 = $conn->escape_string($data['mail1']);
        $mail1?$mail1:NULL;
        $mail2 = $conn->escape_string($data['mail2']);
        $mail2?$mail2:NULL;
        $tel1 =$conn->escape_string($data['tel1']);
        $tel1?$tel1:NULL;
        $tel2 = $conn->escape_string($data['tel2']);
        $tel2?$tel2:NULL;
        $mobile1 =$conn->escape_string($data['mobile1']);
        $mobile1?$mobile1:NULL;
        $mobile2 = $conn->escape_string($data['mobile2']);
        $mobile2?$mobile2:NULL;
        $cod_ambiente = $_SESSION['userData']['ambiente'];
        $cod_azienda = $_SESSION['userData']['azienda'];
        $cod_filiale = $_SESSION['userData']['filiale'];
        $user_ins = $_SESSION['userData']['username'];
        $data_ins = date('Y-m-d H:i:s');
        $tipo_anagr = 'C';
        $result=0;
        $sql ='INSERT INTO anagr_clienti (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, user_mod, tipo_anagr, ragsociale, cognome, nome, luogonasc, provnasc, datanasc, nazionalita, sesso, codfiscale, partitaiva, indirizzores, luogores, provres, capres, mail1, mail2, tel1 ,tel2 , mobile1, mobile2) ';
        
        $sql .=" VALUE ( NULL,'$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins', '$user_ins', '$tipo_anagr', '$ragsociale', '$cognome', '$nome', '$luogonasc', '$provnasc', '$datanasc', '$nazionalita', '$sesso', '$codfiscale', '$partitaiva', '$indirizzores', '$luogores', '$provres', '$capres', '$mail1', '$mail2', '$tel1' ,'$tel2' , '$mobile1', '$mobile2')";
        
        
        
        
       // print_r($data);
        //echo $sql;die;
        $res = $conn->query($sql);
        
        if($res ){
          $result =  $conn->affected_rows;
          $last_id = mysqli_insert_id($conn);
          
        }else{
          $result -1;  
        }
      return $last_id;
    
    
}



function countClienti(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id';
    $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
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
        
        $sql ='SELECT count(*) as totalList FROM anagr_clienti';
        if($search1 or $search2 or $search3){
            $sql .=" WHERE";
        }
        if ($search1){
            $sql .=" cognome LIKE '%$search1%' OR nome LIKE '%$search1%' ";
            //$sql .=" OR lisdve LIKE '%$search1%' ";
            if($search2 or $search3){
                $sql .="AND";
            }
            
          }
        if($search2){
            $sql .="  codfiscale like '%$search2%'";
            if($search3){
                $sql .="AND";
            }
        }
        if($search3){
            $sql .="  lisgam ='$search3'";
        }

        
         // var_dump($sql);
         $res = $conn->query($sql);
         if($res) {
 
          $row = $res->fetch_assoc();
          $totalList = $row['totalList'];
         }
 
     return $totalList;


}

function delete(int $id){

    /**
     * @var $conn mysqli
     */

      $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM anagr_clienti WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;
    
    
}

function getClienteTest( $id){

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $des=0;
      $sql ="SELECT id as des FROM anagr_clienti WHERE codfiscale = '$id' ";
      //echo $sql;
      $res = $conn->query($sql);
        if($res) {
    
         $row = $res->fetch_assoc();
         $des = $row['des'];
        }
    
       return $des;
  
  
}

function storePatente(array $data,$id){ 

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $data_rilascio = $conn->escape_string($data['data_rilascio']);
      $data_scadenza = $conn->escape_string($data['data_scadenza']);
      $ente_rilascio = $conn->escape_string($data['ente_rilascio']);
      $numero_patente = $conn->escape_string($data['numero_patente']);
      $tipo_patente = $conn->escape_string($data['tipo_patente']);



      
      $result=0;
      $sql ='UPDATE patenti SET ';
      $sql .= "data_rilascio = '$data_rilascio', data_scadenza ='$data_scadenza',ente_rilascio = '$ente_rilascio', numero_patente = '$numero_patente', tipo_patente ='$tipo_patente' ";
      
      
      $sql .=" WHERE id_cliente = '$id' ";
     // print_r($data);
      //echo $sql;die;
      $res = $conn->query($sql);
      
      if($res ){
        $result =  $conn->affected_rows;
        
      }else{
        $result -1;  
      }
    return $result;
  
  
}

function savePatente(array $data,$id){ 

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $data_rilascio = $conn->escape_string($data['data_rilascio']);
      $data_scadenza = $conn->escape_string($data['data_scadenza']);
      $ente_rilascio = $conn->escape_string($data['ente_rilascio']);
      $numero_patente = $conn->escape_string($data['numero_patente']);
      $tipo_patente = $conn->escape_string($data['tipo_patente']);



      
      $result=0;
      $sql ='INSERT INTO patenti (id, id_cliente, data_rilascio, data_scadenza, ente_rilascio, numero_patente,tipo_patente) ';
      $sql .= "VALUE ( NULL , '$id', '$data_rilascio', '$data_scadenza','$ente_rilascio', '$numero_patente', '$tipo_patente') ";
      
    
    
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

function getTestAn( $id){

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $records=[];
      $sql ="SELECT * FROM testride WHERE id_cliente = '$id'";
      //echo $sql;
      $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

    return $records;
  
  
}
function getContrAn( $id){

  /**
   * @var $conn mysqli
   */

    $conn = $GLOBALS['mysqli'];
      $records=[];
      $sql ="SELECT * FROM contratti WHERE id_cliente = '$id' order by Id DESC";
      //echo $sql;
      $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

    return $records;
  
  
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