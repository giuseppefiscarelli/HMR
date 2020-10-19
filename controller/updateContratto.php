<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
//$script = $_REQUEST['action'];
require '../model/contratto.php';
$params = $_GET;
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);

  }
switch ($action){
    case 'delete':
        unset($params['action']);
        unset($params['id']);
       
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
    
       //var_dump($params);die;
        $res = delete($id); 
        $message = $res ? 'Contratto Eliminato' : 'Errore Eliminazione Contratto!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../contratti.php?'.$queryString);


    break;    
    case 'saveContratto':
        $data = $_POST;
        //var_dump($data);die;
        $firma = $_POST['signCode'];
        $idfirma = $_POST['id_contratto'];
        if((strlen($firma))>2100){

            $firma = substr($firma,strpos($firma,",")+1);
            $firma = base64_decode($firma);
            
            $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/contratti/sign/';
            $file = $path.$idfirma.'.png';
            file_put_contents($file, $firma);
        }
       // die;
        $res = saveContratto($data);

        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        if ($res){
            
        //   require_once $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/report/contratto/contratto.php';
        }
        $_SESSION['message'] = $message; 
        $_SESSION['success'] = $res;
       
        header('Location:../successContratto.php?id='.$idfirma);
       
       
        
    break;
    case 'saveBozza':
        $data = $_REQUEST;
        $res = saveBozza($data);  
    break;
    case 'upBozza':
        $data = $_REQUEST;
        if($data['id_permuta']){
            $res = upBozzaper($data); 
        }else{
            $res = upBozza($data); 
        }
    break;
    case 'upAccessori':
        $data = $_REQUEST;
        $res = upAccessori($data); 

    break; 
    case 'delAccessori':
        $id = $_REQUEST['id'];
        $res = delAccessori($id); 

    break;   
    case 'addAllegato':
       
        $data = $_REQUEST;
        $res = addAllegato($data);
        
    break;  
    case 'delAllegato':
        $data = $_REQUEST['id'];
        $res = delAllegato($data);
    break; 
    case 'getColore':
        $data = $_REQUEST['modello'];
        $res = getColore($data);
    break; 
    case 'getVermag':
        $data = $_REQUEST['id_veicolo'];
        $res = getVermag($data);
    break; 
    case 'getcontr':
        $id_cliente = array_key_exists('id_cliente', $_REQUEST) ? $_REQUEST['id_cliente'] : null;
        $id_contratto =array_key_exists('id', $_REQUEST) ? $_REQUEST['id'] : null;
        if($id_cliente){
           
            $res = getContratticf($id_cliente);
        }
        if($id_contratto){
            
            $res = getContrattoId($id_contratto);
        }

    break; 
    case 'upload';
       
        $filename =  $_POST ["id"];
        $array = explode('.', $_FILES['file']['name']);
        $extension = end($array);
        $location = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/contratti/'.$filename.".".$extension;
        move_uploaded_file($_FILES['file']['tmp_name'],$location);
    break;
    case 'incImporto':
        $data = $_REQUEST['id'];
        $data = intval($data);

        $alle = getAllegato($data);
        //$alle= json_encode($alle);
        //$descrizione = $alle['descrizione'];
       // echo $alle;
        $res = incImporto($alle);
    break; 
    case 'getPermuta':
        $data = $_REQUEST['id'];
        $res = getPermutacontr($data);

    break;       
} 
/*switch ($script){
    case 'upBozza':
        $data = $_REQUEST;
        $res = upBozza($data); 
    break;
}*/