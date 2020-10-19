<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $id_contratto = $_REQUEST['id_contratto'];
        
        $sql ="SELECT * FROM accessori_contratto WHERE id_contratto = $id_contratto ";
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        while($row = $result->fetch_array() ){
            $response[] = array(
            "codice"=>$row['codice'],
            //"descrizione"=>$row['descrizione'],
            "qnt"=>$row['qnt'],
            "prezzo_siva"=>$row['prezzo_siva'],
            "prezzo_iva"=>$row['prezzo_iva'],
            "tot_siva"=>$row['tot_siva'],
            "tot_iva"=>$row['tot_iva']
            
        );

        }

        echo json_encode($response);
        

        exit;
                