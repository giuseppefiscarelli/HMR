<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/test_ride.php';
$params = $_GET;
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);

  } 
  $orderByParams = $orderByNavigatorParams = $params;
 
  $orderByQueryString = http_build_query($orderByParams,'&amp;');
  $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
switch ($action){

    case 'delete':
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $res = delete($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../test_ride.php?'.$queryString);
    break;

    case 'deletean':
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $idcli = getParam('idcli',0);
        $res = delete($id);
        $message = $res ? 'Test Ride Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cliPage.php?id='.$idcli);
    break;

    case 'saveTestride':
        $data = $_POST;
        //var_dump($data);die;
        $firma = $_POST['signCode'];
        $idfirma = $_POST['id_cliente'];
        if((strlen($firma))<3000){
            $res = saveTestride($data); 
            $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res; 
            header('Location:../indexhmr.php');
        }else{  
        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        $res = saveTestride($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //var_dump($res);
        $file = $path.$idfirma.'_sig_pren_tr_'.$res.'.png';
        file_put_contents($file, $firma);
        header('Location:../indexhmr.php');
        }
    break;

    case 'saveTestridefast':
        $data = $_POST;
       
        $firma = $_POST['signCode'];
        $idfirma = $_POST['id_cliente'];
        $targa = $data['id_veicolo'];
        //$data['descrizione_danno']= $data['report1'];
        //var_dump($data['descrizione_danno']);
        //$tttt=$_FILES['freport']['size']>0?true:false;
        //var_dump($tttt);
        //var_dump($_FILES);die;
        
        
        if((strlen($firma))<3000){
            $res = saveTestridefast($data); 
            $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
            if($_FILES['freport']['size']>0){
                
                $file = $_FILES['freport'];
                $data['descrizione_danno']= $data['report1'];
                $danni= upDanni($data,$file,$res);
                //var_dump($data);
                //var_dump($file);
                //var_dump($res);
                //die;
                $pathd = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/veicoli/danni/';
                move_uploaded_file($_FILES['freport']['tmp_name'], $pathd.$file['name']);
                
               
            }
            
            $res2 = motoDisp($targa);
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res; 
            header('Location:../indexhmr.php');
        }else{  
        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        $res = saveTestridefast($data); 
        //var_dump($res);die;
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $res2 = motoDisp($targa);

        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //var_dump($res);
        $file = $path.$idfirma.'_sig_cons_tr_'.$res.'.png';
        if($_FILES['freport']['size']>0){
            $file = $_FILES['freport'];
            $data['descrizione_danno']= $data['report1'];
            //$danni= upDanni($data,$file,$res);
            //var_dump($data);
            //var_dump($file);
            //var_dump($res);
            //die;
            //$pathd = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/veicoli/danni/';

           // move_uploaded_file($_FILES['freport']['tmp_name'], $pathd.$res.'_'.$targa.'_patfront.jpg');
            
           
        }
        file_put_contents($file, $firma);
        header('Location:../indexhmr.php');
        }
    break;

    case 'quest':
        $data = $_POST;
        $idTr= $data['id_testride'];
        $firma = $_POST['signCode'];
        //$idfirma = $_POST['id_cliente'];
        if((strlen($firma))<3000){
            $res = saveQuest($data); 
            $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res; 
            header('Location:../test_ridePage.php?id='.$idTr);
        }else{  
        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        $res = saveQuest($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //var_dump($res);
        $file = $path.'sign_quest_tr_'.$idTr.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$idTr);
        }


    break;  
    case 'questcli':
        $data = $_POST;
        $idTr= $data['id_testride'];
        
        
           $res = saveQuest($data); 
           header('Location:../thanks.php');
        
      


    break;    
     
    case 'storeTestride':
        $data = $_POST;
        //var_dump($_POST);die;
        $firma = $_POST['signCode'];
        $id = intval(getParam('id',0));
        //var_dump($id);die;
        if((strlen($firma))<3000){
            $res = storeTestride($data,$id); 
            $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';

            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestride($data,$id); 
        $message = 'Record Aggiornato, Firma Inserita' ;

        //var_dump($res);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_ricons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$id);
        }
    break;
    
    case 'storeTestridePage':
        $data = $_POST;
        //var_dump($data);die;
        
        $id = intval(getParam('idTr',0));
        //var_dump($id);die;
       
            $res = storeTestridePage($data,$id); 
            $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';

            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        
        
    break;

    case 'storeTestrideCons':
        $data = $_POST;
        //var_dump($_POST);die;
        $firma = $_POST['signCode2'];
        $id = intval(getParam('id',0));
        //var_dump($id);die;
        if((strlen($firma))<3000){
            $res = storeTestrideCons($data,$id); 
            $message = $res ? 'Test Ride Aggiornato, Motoveicolo Consegnato' : 'Errore Aggiornamento Record!';

            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message; 
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestrideCons($data,$id); 
        $message = $res ? 'Test Ride Aggiornato, Motoveicolo Consegnato, Firma Digitale Inserita': 'Errore Aggiornamento Record!' ;

        //var_dump($res);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_cons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$id);
        }
    break;

    case 'storeTestrideConsHome':
        $data = $_POST;
        //var_dump($_POST);die;
        $id = intval(getParam('id',0));
        $sign = 'signCode'.$id;
        $firma = $_POST[$sign];
        var_dump($_POST);var_dump($sign);
        //die;
        $id = intval(getParam('id',0));
        var_dump($id);die;
        if((strlen($firma))<3000){
            $res = storeTestrideCons($data,$id); 
            $message = $res ? 'Test Ride Aggiornato, Motoveicolo Consegnato' : 'Errore Aggiornamento Record!';

            var_dump(strlen($firma));
          //  die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestrideCons($data,$id); 
        $message = $res ? 'Test Ride Aggiornato, Motoveicolo Consegnato, Firma Digitale Inserita': 'Errore Aggiornamento Record!' ;

        //var_dump($res);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_cons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../indexhmr.php');
        }
    break;

    case 'storeTestrideRicons':
        $data = $_POST;
        //var_dump($_POST);die;
        $firma = $_POST['signCode'];
        $km = $data['km_ricons'];
        $targa = $data['id_veicolo'];
        $id = intval(getParam('id',0));
        //ar_dump($id);die;
        if((strlen($firma))<3000){
            $res = storeTestrideRicons($data,$id); 
            $message = $res ? 'Test Ride Aggiornato, Motoveicolo Riconsegnato' : 'Errore Aggiornamento Test   Ride!';
            $res2 = upKM($targa,$km);
            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestrideRicons($data,$id); 
        $message = $res ? 'Test Ride Aggiornato, Motoveicolo Riconsegnato, Firma Digitale Inserita': 'Errore Aggiornamento Te  stRide!' ;
        $res2 = upKM($targa,$km);
        //var_dump($res);
        //var_dump($res2);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_ricons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$id);
        }
    break;

    case 'storeTestrideRiconsHome':
        $data = $_POST;
        //var_dump($_POST);die;
        $firma = $_POST['signCode'];
        $km = $data['km_ricons'];
        $targa = $data['id_veicolo'];
        $id = intval(getParam('id',0));
        //var_dump($id);die;
        if((strlen($firma))<3000){
            $res = storeTestrideRicons($data,$id); 
            $message = $res ? 'Test Ride Aggiornato, Motoveicolo Riconsegnato' : 'Errore Aggiornamento TestRide!';
            $res2 = upKM($targa,$km);
            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            
            header('Location:../indexhmr.php');    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestridericons($data,$id); 
        $message = $res ? 'Test Ride Aggiornato, Motoveicolo Riconsegnato, Firma Digitale Inserita': 'Errore Aggiornamento TestRide!' ;
        $res2 = upKM($targa,$km);    
        //var_dump($res);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_ricons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../indexhmr.php');
        }
    break;
    
    case 'getkm':
        getKM();
        
    break;
    
    case 'sendmail':
        $data = $_REQUEST;
        $res = sendMail($data);
    break;    
   }