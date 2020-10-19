<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        //$data =[];
        
        $id = $_REQUEST['id'];
        //$result=[];
       
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale = '$id' ";
        //echo $sql;
        
        
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
        // output data of each row
                while( $row = $result->fetch_assoc()) {
                break; 
                
                }
        }
        


        echo json_encode($row);