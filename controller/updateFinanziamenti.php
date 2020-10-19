
<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/finanziamenti.php';


$params = $_GET;

switch ($action){

    case 'delete':
        
        unset($params['action']);
        unset($params['id']);
        unset($params['id_pratica']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $id_pratica = getParam('id_pratica',0);
       //var_dump($params);die;
        $res = deleteFinanziamento($id,$id_pratica); 
        $message = $res ? 'Pratica Eliminata' : 'Errore Inserimento Pratica!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../finanziamenti.php?'.$queryString);
    break;
    case 'insert':
        
        $data = $_POST;
        //var_dump($data);die;
        $res = savePratica($data); 
        $message = $res ? 'Pratica Inserita' : 'Errore Inserimento Pratica!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../finanziamenti.php?'.$queryString);
    break;
    case 'upStato':
        
        $data = $_POST;
       // var_dump($data);die;
        $res = upStato($data); 
        $message = $res ? 'Pratica Aggiornata' : 'Errore Aggiornamento Pratica!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        //var_dump($res);
        $redirect = $data['redirect'];
        if(!$redirect){
            header('Location:../finanziamentoPage.php?id='.$data['id']);
        }else{
            header('Location:../'.$redirect);
        }

    break;
    case 'addAllegato':
       
        $data = $_REQUEST;
        $res = addAllegato($data);
        
    break; 
    case 'delAllegato':
        $data = $_REQUEST['id'];
        $nomefile = $_REQUEST['nome_file'];
        $res = delAllegato($data);
        if($res){

            unlink( $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/finanziamenti/'.$filename);
        }
    break;
    case 'delAllegatocli':
        $data = $_REQUEST['id'];
        $nomefile = $_REQUEST['nome_file'];
        $res = delAllegatocli($data);
        if($res){

            unlink( $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/cliente/'.$filename);
        }
    break;
    case 'upload';
        //var_dump($_POST);
        $filename =  $_POST["id"];
        $tipo =$_POST['tipo'];
        $array = explode('.', $_FILES['file']['name']);
        $extension = end($array);
        if($tipo=='CI'||$tipo=='CF'||$tipo=='DR'){
            $filename =  $_POST["id_cliente"];
            $location = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/cliente/'.$filename.".".$extension;
       }else{

           $location = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/finanziamenti/'.$filename.".".$extension;
        }
        move_uploaded_file($_FILES['file']['tmp_name'],$location);
    break;

    

}