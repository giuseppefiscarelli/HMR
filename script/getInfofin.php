<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        if(isset($_REQUEST['rata'])){
        $rata = $_REQUEST['rata'];
        $tabella = $_REQUEST['tabella'];
        $importo = $_REQUEST['importo'];
        
        $sql ="SELECT * FROM honda_tab_fin WHERE codtab = '$tabella' AND finimp = '$importo' AND finnra = '$rata' ";
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        while($row = $result->fetch_array() ){
            $response[] = array(
            "id"=>$row['id'],
            "fincon"=>$row['fincon'],
            "fintot"=>$row['fintot'],
            "finira"=>$row['finira'],
            "fintan"=>$row['fintan'],
            "fintae"=>$row['fintae'],
            "fintan"=>$row['fintan'],
            "finsmp"=>$row['finsmp'],
            "findvt"=>$row['findvt'],
            "finmx1"=>$row['finmx1']
            
        );

        }

        echo json_encode($response);
        }

        exit;
                