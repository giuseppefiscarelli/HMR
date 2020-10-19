<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        //$data =[];
        $ab_testride = $_REQUEST['ab_testride'];
        $id = $_REQUEST['id'];
        $user_mod = $_REQUEST['username'];
        $data_mod = date("Y-m-d H:i:s");
       
        $sql ='UPDATE veicoli_usati SET ';
        $sql .= "ab_testride = '$ab_testride', user_mod = '$user_mod' , data_mod = '$data_mod' ";
        
        
        $sql .=' WHERE id = '.$id;
        $result = $conn->query($sql);


        
        //if ($result->num_rows > 0) {
        // output data of each row
          //      while( $row = $result->fetch_assoc()) {
            //    break; 
                
              //  }
        //}
        


        //echo json_encode($row);