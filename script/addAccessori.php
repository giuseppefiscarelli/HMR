<?php
require_once '../functions.php';
require_once '../connection.php';
    /**
     * @var $conn mysqli
     */



    $conn = $GLOBALS['mysqli'];
    $id_contratto = $_REQUEST['id_contratto'];
    $id_cliente = $_REQUEST['id_cliente'];
    $id_veicolo = $_REQUEST['id_veicolo'];
    $user_ins = $_REQUEST['user_ins'];
    $id_row = $_REQUEST['id_row'];
    $codice = $_REQUEST['codice'];
    $descrizione  = $_REQUEST['descrizione'];
    $qnt = $_REQUEST['qnt'];
    $prezzo_siva = $_REQUEST['prezzo_siva'];
    $prezzo_iva = $_REQUEST['prezzo_iva'];
    $tot_siva = $_REQUEST['tot_siva'];
    $tot_iva = $_REQUEST['tot_iva'];

   

    
    $result=0;
    $sql ='INSERT INTO accessori_contratto (id, id_contratto, id_cliente,id_veicolo,  user_ins, id_row, codice, descrizione,qnt, prezzo_siva, prezzo_iva, tot_siva, tot_iva) ';
    $sql .=" VALUES (NULL, $id_contratto, '$id_cliente', $id_veicolo,  '$user_ins', $id_row, '$codice', '$descrizione', $qnt, $prezzo_siva, $prezzo_iva, $tot_siva, $tot_iva)";
    
    
    
    
   //print_r($data);
   //echo $sql;//die;
   $res = $conn->query($sql);
   if($res ){
       $result =  $conn->affected_rows;
       $last_id['id'] = mysqli_insert_id($conn);
       //echo "New record created successfully. Last inserted ID is: " . $last_id;
       //return $last_id;
   }else{
       $last_id=0;  
   }
   echo json_encode($last_id);

   
