<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
      
        $importo = $_REQUEST['importo'];
        $tabella = $_REQUEST['tabella'];
        $sql ="SELECT distinct finnra FROM honda_tab_fin WHERE finimp = '$importo' and codtab ='$tabella'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        $json = [];
        while($row = $result->fetch_assoc()){
             $json[$row['finnra']] = $row['finnra'];
        }
     
     
        echo json_encode($json);
        