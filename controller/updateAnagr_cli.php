
<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/anagr_cli.php';


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
        header('Location:../anagr_cli.php?'.$queryString);
    break;

    case 'saveCliente':
        $data = $_POST;
        $res = saveCliente($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../anagr_cli.php?'.$queryString);
    break;
    case 'saveClienteTest':
        $data = $_POST;
        //var_dump($data);die;
        $action = $data['actionTr'];
        $res = saveCliente($data); 
        $res2 = savePatente($data,$_POST['codfiscale']); 
        $message = $res&&$res2 ? 'Cliente Inserito Correttamente' : 'Errore Inserimento Record!';
       

        $id = $res;
        
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/patente/';
        if($_FILES['patfront']){
            move_uploaded_file($_FILES['patfront']['tmp_name'], $path.$id.'_patfront.jpg');
            $res =1;
           
        }
        if($_FILES['patrear']){
          
            move_uploaded_file($_FILES['patrear']['tmp_name'], $path.$id.'_patrear.jpg');
            $res =1;
        }
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res&&$res2;
        
        
        
        header('Location:../test_rideUpdate.php?cliId='.$id.'&action='.$action);
    break;
    case 'saveClienteContr':
        $data = $_POST;
        //var_dump($data);die;
        $action = $data['actionTr'];
        $res = saveCliente($data); 
       // $res2 = savePatente($data,$_POST['codfiscale']); 
        $message = $res ? 'Cliente Inserito Correttamente' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        
        
        //var_dump($res); 
        //var_dump($_POST['codfiscale']);  
        $resTest = getClienteTest($_POST['codfiscale']); 
        $id = $resTest;    
        //die;
        header('Location:../contrattoUpdate.php?cliId='.$id.'&action='.$action);
    break;

    case 'saveClienteTestPren':
        $data = $_POST;
        $idTest = $_POST['idTr'];
        //var_dump($idTest);die;
        $res = saveCliente($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //var_dump($res);
        //var_dump($_POST['codfiscale']);  
        //die;
        //var_dump($data);die;
        require_once '../script/test_rideUpcli.php';
        $res2 = storeTestride($data, $idTest); 
        $message2 = $res2 ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message2;
        $_SESSION['success'] = $res2;
        //var_dump($res2);
        //var_dump($_POST['codfiscale']);  
        //die;
        //$resTest = getClienteTest($_POST['codfiscale']); 
        //$id = $resTest; 
        header('Location:../test_ridePage.php?id='.$idTest);
    break;

    case 'storeCliente':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeCliente($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        
        header('Location:../anagr_cli.php?'.$queryString);
    break;
    case 'saveClienteFin':
        $data = $_POST;
        //echo json_encode($data);
        //var_dump($data);die;
        //$id = getParam('id',0);
        $res = saveCliente($data); 
        //$message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
       // $_SESSION['message'] = $message;
        //$_SESSION['success'] = $res;
        echo json_encode ($res);
        
        
    break;
    case 'saveClientePer':
        $data = $_POST;
        //echo json_encode($data);
        //var_dump($data);die;
        //$id = getParam('id',0);
        $res = saveCliente($data); 
        //$message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
       // $_SESSION['message'] = $message;
        //$_SESSION['success'] = $res;
        echo json_encode ($res);
        
        
    break;
    
    case 'storeClienteTest':
        $data = $_POST;
        $id = getParam('id',0);
        $action = getParam('actionTr');
        $idPat = getParam('id_patente');
       // var_dump($data);
        var_dump($_FILES);
        
      
        
   
        

        $res = storeCliente($data,$id);
        if($idPat){
            $res2 = storePatente($data,$_POST['codfiscale']); 
        }else{
            $res2 = savePatente($data,$_POST['codfiscale']); 
        }
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/patente/';
        if($_FILES['patfront']){
            move_uploaded_file($_FILES['patfront']['tmp_name'], $path.$id.'_patfront.jpg');
            $res =1;
           
        }
        if($_FILES['patrear']){
          
            move_uploaded_file($_FILES['patrear']['tmp_name'], $path.$id.'_patrear.jpg');
            $res =1;
        }
        $message = $res||$res2 ? 'Dati Cliente Aggiornati' : 'Dati Cliente Non Aggiornati!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res||$res2;
        header('Location:../test_rideUpdate.php?cliId='.$id.'&action='.$action);
    break; 
    case 'storeClienteContr':
        $data = $_POST;
        $id = getParam('id',0);
        $action = getParam('actionContr');
        $idPat = getParam('id_patente');
        //var_dump($data);die;
        
        
        
   
        

        $res = storeCliente($data,$id);
        
         
        $message = $res ? 'Dati Cliente Aggiornati' : 'Dati Cliente Non Aggiornati!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../contrattoUpdate.php?action='.$action.'&cliId='.$id);
    break; 

    case 'storeClientePageTr':
        $data = $_POST;
        $id = getParam('id',0);
        $idTr=getParam('idTr',0);
        //var_dump($_FILES);die;
        //$action = getParam('actionTr');
        
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/CRM/Allegati/patente/';
        if($_FILES['patfront']&&$_FILES['patrear']){
            move_uploaded_file($_FILES['patfront']['tmp_name'], $path.$id.'_patfront.jpg');
            move_uploaded_file($_FILES['patrear']['tmp_name'], $path.$id.'_patrear.jpg');
        }

        
        
   
        

        $res = storeCliente($data,$id);
        $res2 = storePatente($data,$_POST['codfiscale']);  
        $message = $res||$res2 ? 'Dati Cliente Aggiornati' : 'Dati Cliente Non Aggiornati!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res||$res2;
        header('Location:../test_ridePage.php?id='.$idTr.'&cliId='.$id);
    break; 
    
    case 'upCliente':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeCliente($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cliPage.php?id='.$id);
    break;  
    case 'upPatente':
        $data = $_POST;
        $id = getParam('id_cliente',0);
        $idCli = getParam('id',0); 
        //var_dump($idCli);
        //die;
        $res = storePatente($data,$id); 
        $message = $res ? 'Dati Patente Aggiornati' : 'Dati Patente Non Aggiornati!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cliPage.php?id='.$idCli);
    break; 
    
    case 'newPatente':
        $data = $_POST;
        $id = getParam('id_cliente',0);
        $idCli = getParam('id',0); 
        //var_dump($idCli,$id);
        //die;
        $res = savePatente($data,$id); 
        $message = $res ? 'Dati Patente Inseriti' : 'Errore Inserimento Dati Patente!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cliPage.php?id='.$idCli);
    break; 
   

   }