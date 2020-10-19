<?php


function countNot(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $total = 0;
    $user = $_SESSION['userData']['username'];
    $search1 = array_key_exists('search1', $params) ? $params['search1'] : 'N';
    $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
    $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';


    $sql = 'SELECT COUNT(*) as total FROM notifiche';
    
      $sql .=" WHERE a = '$user'  ";
      
    if ($search1){
        $sql .=" AND stato = '$search1' ";
        
    }else{
        $sql .=" AND stato != 'E' ";
         
    }
    if($search2){
        $sql .="  AND area = '$search2'";
        
    }
    if($search3){
        $sql .="  AND descrizione like '%$search3%'";
        
    }
     
    //echo $sql;
    

    $res = $conn->query($sql);
    if($res) {

    $row = $res->fetch_assoc();
    $total = $row['total'];
    }

 return $total;


}
function getNot(array $params = []){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
  
    
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
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : 'N';
       // $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

       
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
          $orderDir = 'ASC';
        }
        
    $records = [];
    $user = $_SESSION['userData']['username'];
    
    $sql = "SELECT * FROM notifiche WHERE a = '$user'";
   
    if ($search1){
        $sql .=" AND stato = '$search1' ";
        
    }else{
        $sql .=" AND stato != 'E' ";
         
    }
    if($search2){
        $sql .="  AND area = '$search2'";
        
    }
    if($search3){
        $sql .="  AND descrizione like '%$search3%'";
        
    }
    $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
    //echo $sql;

    $res = $conn->query($sql);
    if($res) {

    while( $row = $res->fetch_assoc()) {
        $records[] = $row;
          
    }

    }

 return $records;

}

function countReadNot($data){

    /**
     * @var $conn mysqli
     */

        $conn = $GLOBALS['mysqli'];
      
        
        $total = 0;
        $user = $_SESSION['userData']['username'];
        
        $sql = "SELECT COUNT(*) as total FROM notifiche WHERE a = '$user' AND stato = '$data'";
        

        $res = $conn->query($sql);
        if($res) {
    
        $row = $res->fetch_assoc();
        $total = $row['total'];
        }
    
     return $total;

}

function getArea(){
    /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        
            
        $records=[];
        $user = $_SESSION['userData']['username'];
        
        $sql = "SELECT distinct area FROM notifiche order by area";
        

        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

        return $records;


}
function getnotArea($area){
  
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
  
    
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

    $result=[];
    $user = $_SESSION['userData']['username'];
    
    $sql = "SELECT * FROM notifiche WHERE a = '$user' and area = '$area'";
    

    $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
          return $result;
}
function update(array $data){
       /**
         * @var $conn mysqli
         */
      
        $conn = $GLOBALS['mysqli'];

        $id =$data['id'];
        $stato = $data['stato'];
        $result=0;
        $sql ="UPDATE notifiche SET ";
        $sql .=" stato = '$stato' ";
        $sql .=" WHERE id = $id";
        //print_r($data);
        // echo $sql;//die;
        $res = $conn->query($sql);
        if($res ){
            $result =  $conn->affected_rows;
            $last_id['id'] = $id;
            //echo "New record created successfully. Last inserted ID is: " . $last_id;
            //return $last_id;
        }else{
            $last_id=0;  
        }
        echo json_encode($last_id);

}