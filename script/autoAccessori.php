<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        if(isset($_POST['search'])){ 
        $search = $_POST['search'];
        
        $sql ="SELECT * FROM articoli WHERE codice LIKE '%$search%' OR descrizione LIKE '%$search%' ";
        $result = $conn->query($sql);
        $response = array();
        while($row = $result->fetch_array() ){
        $response[] = array(
        "value"=>$row['codice'],
        "label"=>$row['codice'].' - '. $row['descrizione'],
        "codice"=>$row['codice'],
        "descrizione"=>$row['descrizione'],
        "prezzo_lordo"=>$row['prezzo_lordo'],
        "prezzo_netto"=>$row['prezzo_netto'],
        "udm"=>$row['udm']

       
        );

        }

        echo json_encode($response);
        }

        exit;
                