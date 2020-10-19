
<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/permute.php';


$params = $_GET;

switch ($action){

    

    case 'saveVeicolo':
        
        $data = $_POST;
        //var_dump($data);die;
        $res = saveVeicolo($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../permute.php?'.$queryString);
    break;
    case 'upVal':
        
        $data = $_POST;
        //var_dump($data);die;
        $id= $data['id'];
        $res = upVal($data); 
        $message = $res ? 'Record Aggiornato' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../permutaPage.php?id='.$id);
        
    break;
    case 'upValore':
        
        $data = $_POST;
        //var_dump($data);die;
        $id= $data['id'];
        $res = upValore($data); 
        $message = $res ? 'Record Aggiornato' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../permutaPage.php?id='.$id);
        
    break;
    case 'upDettagli':
        
        $data = $_POST;
       // var_dump($data);die;
        $id= $data['id'];
        $res = upDettagli($data); 
        $message = $res ? 'Record Aggiornato' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../permutaPage.php?id='.$id);
        
    break;
    case 'upRitiro':
        
        $data = $_POST;
        //var_dump($data);die;
        $id= $data['id'];
        $res = upRitiro($data); 
        $message = $res ? 'Record Aggiornato' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../permutaPage.php?id='.$id);
        
    break;
    
}