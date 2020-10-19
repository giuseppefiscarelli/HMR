<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */
$conn = $GLOBALS['mysqli'];
if(isset($_POST['search'])){
    $search = $_POST['search'];
    
    $strpos = strpos($search," ");
    $countspace = substr_count($search, " ");
    $search1 = explode(" ",$search);
    if ($countspace == 1 && $strpos <= 3){
        
        $s1 = $search1[0];
        $s1 .= " ";
        $s1 .= $search1[1];
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale LIKE '$s1%' OR cognome LIKE '$s1%' ";
        //$sql .=" and nome LIKE '$s2%'";

        
    }elseif($countspace == 2 && $strpos <= 3){
        
        $s1 = $search1[0];
        $s1 .= " ";
        $s1 .= $search1[1];
        $s2 = $search1[2];
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale LIKE '$s1%' OR cognome LIKE '$s1%' ";
        $sql .=" and nome LIKE '$s2%'";

        
    }elseif($countspace == 3 && $strpos <= 3){
        
        $s1 = $search1[0];
        $s1 .= " ";
        $s1 .= $search1[1];
        $s2 = $search1[2];
        $s2 .= " ";
        $s2.= $search1[3];
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale LIKE '$s1%' OR cognome LIKE '$s1%' ";
        $sql .=" and nome LIKE '$s2%'";

        
    }elseif($countspace == 4 && $strpos <= 3){
        
        $s1 = $search1[0];
        $s1 .= " ";
        $s1 .= $search1[1];
        $s2 = $search1[2];
        $s2 .= " ";
        $s2.= $search1[3];
        $s2 .= " ";
        $s2.= $search1[4];
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale LIKE '$s1%' OR cognome LIKE '$s1%' ";
        $sql .=" and nome LIKE '$s2%'";

        
    }else{
       
        $s1 = $search;
        $sql ="SELECT * FROM anagr_clienti WHERE codfiscale LIKE '$s1%' OR cognome LIKE '$s1%' OR nome LIKE '$s1%' OR mail1 LIKE '%$s1%' OR mobile1 LIKE '%$s1%' ";
    }
    
    //$s1 = $search1;
    //$s2 = $search1[1];
    //$s3 = $search1[2];
    //$s4 = $search1[3];
    //$s5 = $search1[4];
    //$s6 = $search1[5];

        
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        while($row = $result->fetch_array() ){
        $response[] = array(
        "value"=>$row['id'],
        "label"=>$row['id'].' - '. $row['cognome'].' '.$row['nome'].' - '.$row['codfiscale'],
        "nome" =>$row['nome'],
        "cognome" =>$row['cognome'],
        "id" =>$row['id'],
        "codfiscale" =>$row['codfiscale'],
        "datanasc" =>$row['datanasc'],
        "luogonasc" =>$row['luogonasc'],
        "provnasc" =>$row['provnasc'],
        "sesso" =>$row['sesso'],
        "nazionalita" =>$row['nazionalita'],
        "indirizzores" =>$row['indirizzores'],
        "luogores" =>$row['luogores'],
        "provres" =>$row['provres'],
        "capres" =>$row['capres'],
        "mail1" =>$row['mail1'],
        "mail2" =>$row['mail2'],
        "tel1" =>$row['tel1'],
        "tel2" =>$row['tel2'],
        "mobile1" =>$row['mobile1'],
        "mobile2" =>$row['mobile2']
        );

        }

        echo json_encode($response);
        }

        exit;
                
        