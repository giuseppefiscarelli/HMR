<?php
function getVeicoli(array $params = []){

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
        
        $sql ='SELECT * FROM veicoli_usati ';
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

function countVeicoli(array $params = []){

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
        
        $sql ='SELECT COUNT(*) as totalList FROM veicoli_usati';
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
        
        $targa = $conn->escape_string($data['targa']);
        $marca = $conn->escape_string($data['marca']);
        $modello = $conn->escape_string($data['modello']);
        $colore_tr = $conn->escape_string($data['colore_tr']);
        $ab_testride = $data['ab_testride']?$conn->escape_string($data['ab_testride']):'N';
        if($ab_testride=='on'){
            $ab_testride = "S";
        }else{
            $ab_testride = "N";

        }
        $km = $data['km']? $conn->escape_string($data['km']):0;
        $cod_ambiente = $_SESSION['userData']['ambiente'];
        $cod_azienda = $_SESSION['userData']['azienda'];
        $cod_filiale = $_SESSION['userData']['filiale'];
        $user_ins = $_SESSION['userData']['username'];
        $data_ins = date('Y-m-d H:i:s');
       
        $result=0;
        $sql ='INSERT INTO veicoli_usati (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, targa ,marca, modello, km, ab_testride, colore_tr) ';
        
        $sql .=" VALUE ( NULL,'$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins', '$targa', '$marca','$modello', '$km', '$ab_testride', '$colore_tr')";
        
        

        
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
