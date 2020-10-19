
<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/veicoli_usati.php';


$params = $_GET;

switch ($action){

    case 'delete':
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $res = deleteCliente($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../veicoli_usati.php?'.$queryString);
    break;

    case 'saveVeicolo':
        
        $data = $_POST;
        //var_dump($data);die;
        $res = saveVeicolo($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../veicoli_usati.php?'.$queryString);
    break;
    case 'saveVeicoloTr':
        $data = $_REQUEST;
        
        $res = saveVeicolo($data); 
        echo json_encode($res);
       
    break;

}