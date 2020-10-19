<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */

    $conn = $GLOBALS['mysqli'];

    $modello = $_REQUEST['modello']; 
    $sql ="SELECT * FROM honda_listino_veicoli WHERE lisdve = '$modello'";
    $result = $conn->query($sql);
    
    $json = array();
    while($row = $result->fetch_assoc() ){
         $json[] = $row;
    }
 
 
    echo json_encode($json);