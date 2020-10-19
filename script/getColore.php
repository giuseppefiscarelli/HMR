<?php
require_once '../functions.php';
require_once '../connection.php';
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
             $json[$row['id']] = $row['cod_col']." - ".$row['des_col'];
        }
     
     
        echo json_encode($json);
        

