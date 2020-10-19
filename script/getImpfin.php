<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
      
        $tabella = $_REQUEST['tabella'];
        $sql ="SELECT distinct finimp FROM honda_tab_fin WHERE codtab = '$tabella'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        $json = [];
        while($row = $result->fetch_assoc()){
             $json[$row['finimp']] = $row['finimp'];
        }
     
     
        echo json_encode($json);
        