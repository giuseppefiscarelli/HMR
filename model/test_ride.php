<?php



    function getTestride(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3',$params)?date("Y-m-d H:i:s", strtotime($params['search3'])):date('Y-m-d H:i:s');
        $search4 = array_key_exists('search4',$params)?date("Y-m-d 23:59:59", strtotime($params['search4'])):date('Y-m-d H:i:s');
        $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
        $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
        //var_dump($params);die;
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

    
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
        $orderDir = 'ASC';
        }
        $records = [];
            
            $sql ='SELECT * FROM testride';
           if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" id '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 || $search3|| $search4|| $search5|| $search6){
                    $sql .=" AND "; 
                }  
            }
            if($search2){
                $sql .="  stato_test = '$search2'";
                if($search3|| $search4|| $search5|| $search6){
                    $sql .=" AND ";
                }
            }
            if($search3){
                $sql .="  data_pren >= '$search3'";
                 if( $search4|| $search5|| $search6){
                 $sql .=" AND ";
              }
            }
            if($search4){
                $sql .="  data_pren <= '$search4' ";
                if($search5|| $search6){
                  $sql .=" AND ";
              }
            }
             if($search5){
                $sql .="  id_veicolo = '$search5'";
                if($search6){
                  $sql .=" AND ";
              }
            }
            if($search6){
              $sql .="  user_pren ='$search6'";
              
            }
        

            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
            // var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function prtTestride(array $params = []){

      /**
       * @var $conn mysqli
       */

      $conn = $GLOBALS['mysqli'];

      $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
      $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'DESC';
      $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;

      if(array_key_exists('search2', $params)){
        $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
      }else{
      $search2 = array_key_exists('type', $params) ? $params['type'] : '';
      }
      if(array_key_exists('search3', $params)){
        $search3 = array_key_exists('search3',$params)?$params['search3']:'';
      }else{
        $search3 = array_key_exists('from',$params)?$params['from']:'';

      }
     
      if(array_key_exists('search4', $params)){
        $search4 = array_key_exists('search4',$params)?$params['search4']:'';

      }else{ 
        $search4 = array_key_exists('to',$params)?$params['to']:'';
      }
    
 
      $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
      $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
      //var_dump($params);die;
      $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
      $start =$limit * ($page -1);
      if($start<0){
      $start = 0;
      }
      $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
      $search1 = $conn->escape_string($search1);

      
      //$search2 = $conn->escape_string($search2);

  
      
      if($orderDir !=='ASC' && $orderDir !=='DESC'){
      $orderDir = 'ASC';
      }
      $records = [];
          
          $sql ='SELECT * FROM testride';
         if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
              $sql .=" WHERE";
          }
          if ($search1){
              $sql .=" id '%$search1%' ";
              //$sql .=" OR lisdve LIKE '%$search1%' ";
              if($search2 || $search3|| $search4|| $search5|| $search6){
                  $sql .=" AND "; 
              }  
          }
          if($search2){
              $sql .="  stato_test = '$search2'";
              if($search3|| $search4|| $search5|| $search6){
                  $sql .=" AND ";
              }
          }
          if($search3){
              $sql .="  data_pren >= '".$search3." 00:00:00'";
               if( $search4|| $search5|| $search6){
               $sql .=" AND ";
            }
          }
          if($search4){
              $sql .="  data_pren <= '".$search4." 23:59:59' ";
              if($search5|| $search6){
                $sql .=" AND ";
            }
          }
           if($search5){
              $sql .="  id_veicolo = '$search5'";
              if($search6){
                $sql .=" AND ";
            }
          }
          if($search6){
            $sql .="  user_pren ='$search6'";
            
          }
      

          $sql .= "   ";
          //echo $sql;die;
          $res = $conn->query($sql);
          if($res) {

              while( $row = $res->fetch_assoc()) {
                  $records[] = $row;
                  
              }

          }

      return $records;


    }

    function getUsersList(){

      /**
       * @var $conn mysqli
       */

          $conn = $GLOBALS['mysqli'];

          $amb = $_SESSION['userData']['ambiente'];
          $az = $_SESSION['userData']['azienda'];
          $fl = $_SESSION['userData']['filiale'];
          $records = [];

          

          $sql = "SELECT * FROM users WHERE ambiente = $amb and azienda = '$az' and filiale = '$fl'";
          
          $sql .= " ORDER BY id";
          

          $res = $conn->query($sql);
          if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

          }

      return $records;

    }

    function delete(int $id){

        /**
         * @var $conn mysqli
         */
    
          $conn = $GLOBALS['mysqli'];
    
            $sql ='DELETE FROM testride WHERE id = '.$id;
            //var_dump($sql);die;
            $res = $conn->query($sql);
            
            return $res && $conn->affected_rows;
        
        
    }

    function getTest(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * FROM testride WHERE id = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
          return $result;
        
        
    }

    function sendMail(array $data){

      require "Mail.php";
      $host    = "smtp.gmail.com";
      $port    = "587";
      $user    = "hondamotoromadev@gmail.com";
      $pass    = "01735583";
      $smtp    = @Mail::factory("smtp", array("host"=>$host, "port"=>$port, "auth"=> true, "username"=>$user, "password"=>$pass));
      $from    = "\"Honda Moto Roma\" <hondamotoromadev@gmail.com>";

      $to      = $data['email'];

      $subject = "Invio Questionario";
      $logomail = $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/images/HONDA.png';
     // $body    = "\n\n<html><body><h1>Email contents here from HMR</h1></body></html>";
      $body = '<html> <style></style> <body >';
      $body .='<div class="container"style=" background-image:url(\'https://portfolio.setec.cloud/ERP/HMR/images/5.jpg\')">';
      $body .='<p><img style="display: block; margin-left: auto; margin-right: auto;padding-top:50px" src="https://portfolio.setec.cloud/ERP/HMR/images/HONDA.png" width="349" height="69" /></p>';
      $body .= '<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #ff0000;">Grazie per aver effettuato il Test Ride!</span></h1>';
      $body .='<h1 style="color: #5e9ca0; text-align: center"><span style="color:  #ff0000;";">Raccontaci cosa ne pensi (ci vuole 1 minuto, promesso).</span></h1>';
      $body .='
                      <div style="justify-content:center;">
                          <a type="button" href="https://portfolio.setec.cloud/ERP/HMR/questcli.php?id='.$data['id'].'" style="color: #fff; background-color: #04b962; border-color: #04b962; border-radius: .25rem; padding: 9px 19px;width: 40%;margin-left: 30%;"> Iniziamo </a>
                       </div>
                       <div style="display: flex; justify-content: center; align-items: center;">&nbsp;</div>
                        <div style="display: flex; justify-content: center; align-items: center;">&nbsp;</div>
                        <blockquote>
                          <hr>
                        <div style="font-size:8px;color:blue;display: flex; justify-content: center; align-items: center;"><span style="color:#4d90fe;">La presente comunicazione, con le informazioni in essa contenute e ogni documento o file allegato, è rivolta unicamente alla/e persona/e cui è indirizzata ed alle altre da questa autorizzata/e a riceverla. Se non siete i destinatari/autorizzati siete avvisati che qualsiasi azione, copia, comunicazione, divulgazione o simili basate sul contenuto di tali informazioni è vietata e potrebbe essere contro la legge vigente (ad es. art. 616 C.P., D.Lgs n. 196/2003 Codice Privacy, Regolamento Europeo n. 679/2016/GDPR). Se avete ricevuto questa comunicazione per errore, vi preghiamo di darne immediata notizia al mittente e di distruggere il messaggio originale e ogni file allegato senza farne copia alcuna o riprodurne in alcun modo il contenuto.</span></div>
                        <div style="display: flex; justify-content: center; align-items: center;">&nbsp;</div>
                        <div style="font-size:8px;color:blue;display: flex; justify-content: center; align-items: center;"><span style="color:#4d90fe;">This e-mail and its attachments are intended for the addressee(s) only and are confidential and/or may contain legally privileged information. If you have received this message by mistake or are not one of the addressees above, you may take no action based on it, and you may not copy or show it to anyone; please reply to this e-mail and point out the error which has occurred.</span></div>
                        </blockquote>
                        </div>
  
               
       
          </div>';
      $body .= '</body></html>';
      $headers = array("From"=> $from, "To"=>$to, "Subject"=>$subject, "MIME-Version"=>"1.0", "Content-Type"=>"text/html; charset=ISO-8859-1");
      
      $mail    = @$smtp->send($to, $headers, $body);

     echo json_encode($data['id']);


      
  }

    function getTestDay(){

      /**
       * @var $conn mysqli
       */
    
        $conn = $GLOBALS['mysqli'];
        $data = date('Y-m-d');
          $records=[];
          $sql ="SELECT * FROM testride WHERE data_pren like '$data%'";
          //echo $sql;
          $res = $conn->query($sql);
          
          if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

      return $records;
      
      
    }

    function getEvent(){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * FROM testride ';
            //echo $sql;
           
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
        
        
    }

    function countTestride(array $params = []){
     /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3',$params)?date("Y-m-d H:i:s", strtotime($params['search3'])):date('Y-m-d H:i:s');
        $search4 = array_key_exists('search4',$params)?date("Y-m-d 23:59:59", strtotime($params['search4'])):date('Y-m-d H:i:s');
        $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
        $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
        //var_dump($params);die;
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        

        
        //$search2 = $conn->escape_string($search2);

       
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
          $orderDir = 'ASC';
        }
        $totalList = 0;
            
            $sql ='SELECT count(*) as totalList FROM testride';
            if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
              $sql .=" WHERE";
          }
          if ($search1){
              $sql .=" id_cliente like %'$search1'% ";
              //$sql .=" OR lisdve LIKE '%$search1%' ";
              if($search2 || $search3|| $search4|| $search5|| $search6){
                  $sql .=" AND ";
              }  
          }
          if($search2){
              $sql .="  stato_test = '$search2'";
              if($search3|| $search4|| $search5|| $search6){
                  $sql .=" AND ";
              }
          }
          if($search3){
              $sql .="  data_pren >= '$search3'";
               if( $search4|| $search5|| $search6){
               $sql .=" AND ";
            }
          }
          if($search4){
              $sql .="  data_pren <= '$search4' ";
              if($search5|| $search6){
                $sql .=" AND ";
            }
          }
           if($search5){
              $sql .="  id_veicolo = '$search5'";
              if($search6){
                $sql .=" AND ";
            }
          }
          if($search6){
            $sql .="  user_pren ='$search6'";
            
          }
             // var_dump($sql);
             $res = $conn->query($sql);
             if($res) {
     
              $row = $res->fetch_assoc();
              $totalList = $row['totalList'];
             }
     
         return $totalList;


    }

    function getCliente($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM anagr_clienti WHERE id = '$id'";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }

    function getClientecf($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM anagr_clienti WHERE codfiscale = '$id'";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }

    function getMotoinfo($id){
        
        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM veicoli_usati WHERE targa = '$id' ";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }
    function getMotolist($id, $action){
        
      $conn = $GLOBALS['mysqli'];
          $result=[];
          $sql ="SELECT * FROM veicoli_usati WHERE targa = '$id' ";
          if($action ==="fastinsert"){
            $sql .=" AND stato_tr = 'D'";
          }
        //  echo $sql;
         
              
          $res = $conn->query($sql);
          if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
       return $result;
  
    }

    function getValutazione($id){

      $conn = $GLOBALS['mysqli'];
          $result=[];
          $sql ="SELECT * FROM questionario WHERE id_testride = '$id' ";
         // echo $sql;
         
              
          $res = $conn->query($sql);
          if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
       return $result;
  
    }

    
    function getMoto($action){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM veicoli_usati WHERE ab_testride = 'S' ";
            if($action ==="fastinsert"){
              $sql .=" AND stato_tr = 'D'";
            }
            $sql .="ORDER BY id";
            //echo $sql;
            $res = $conn->query($sql);
            
           
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

     return $records;
        
        
    }
    function getMoto2(){

      /**
       * @var $conn mysqli
       */
    
        $conn = $GLOBALS['mysqli'];
          $result=[];
          $sql ="SELECT * FROM veicoli_usati WHERE ab_testride = 'S' ";
         
          $sql .="ORDER BY id";
          //echo $sql;
          $res = $conn->query($sql);
          
         
      if($res) {

          while( $row = $res->fetch_assoc()) {
              $records[] = $row;
              
          }

      }

     return $records;
      
      
    }

    function getMotoCol($id){

      /**
       * @var $conn mysqli
       */
    
        $conn = $GLOBALS['mysqli'];
          $result=[];
          $sql ="SELECT * FROM veicoli_usati WHERE targa = '$id'";
          //echo $sql;
          $res = $conn->query($sql);
          
         
          if($res && $res->num_rows){
            $result = $res->fetch_assoc();
            
          }
        return $result;
      
      
    }

    function getKM(){

        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $data =[];
        $targa = $_REQUEST['targa'];
        $sql ="SELECT * FROM veicoli_usati WHERE targa = '$targa'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
        // output data of each row
                while( $row = $result->fetch_assoc()) {
                break; 
                
                }
        }
        


        echo json_encode($row);
    }

    function upKM($targa,$km){

      /**
       * @var $conn mysqli
       */
      $conn = $GLOBALS['mysqli'];
      $result=0;
      
      $sql ="UPDATE veicoli_usati SET km = $km, stato_tr='D' WHERE targa = '$targa'";
      //print_r($sql);
      //echo $sql;die;
      $result = $conn->query($sql);


      
      $res = $conn->query($sql);
            
        if($res ){
              $result =  $conn->affected_rows;
              
        }else{
              $result -1;  
        }
      return $result;
    }
    function motoDisp($targa){

      /**
       * @var $conn mysqli
       */
      $conn = $GLOBALS['mysqli'];
      $result=0;
      
      $sql ="UPDATE veicoli_usati SET stato_tr = 'T' WHERE targa = '$targa'";
      //print_r($sql);
      //echo $sql;die;
      $result = $conn->query($sql);


      
      $res = $conn->query($sql);
            
        if($res ){
              $result =  $conn->affected_rows;
              
        }else{
              $result -1;  
        }
      return $result;
    }

    function saveTestride(array $data){ 

        /**
         * @var $conn mysqli
         */
      
            $conn = $GLOBALS['mysqli'];
                   
            $cod_ambiente = $_SESSION['userData']['ambiente'];
            $cod_azienda = $_SESSION['userData']['azienda'];
            $cod_filiale = $_SESSION['userData']['filiale'];
            $user_ins = $_SESSION['userData']['username'];
            $data_ins = date('Y-m-d H:i:s');
            $user_pren = $_SESSION['userData']['username'];
            $data_pren = $conn->escape_string($data['data_pren']);
            $id_cliente =  $conn->escape_string($data['codfiscale']);
            $id_veicolo =  $conn->escape_string($data['targa']);
            $durata_test =  $conn->escape_string($data['durata_test']);
            $ora_pren =  $conn->escape_string($data['ora_pren']);
            $km_cons =  $conn->escape_string($data['km_cons']);
            $note_pren =$conn->escape_string($data['note_pren']);
            $stato_test = 'P';
            //$durata_test =date("i:s",$conn->escape_string($data['durata_test']));
            //$km_cons =  $conn->escape_string($data['km_cons']);

            
            $result=0;
            $sql ='INSERT INTO testride (id, stato_test, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, user_pren, data_pren, id_cliente, id_veicolo, km_cons, durata_test,note_pren) ';
            
            $sql .=" VALUE ( NULL,'$stato_test','$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins',  '$user_pren', '$data_pren $ora_pren', '$id_cliente', '$id_veicolo' ,'$km_cons' ,'$durata_test', '$note_pren')";
            
            
            
            
           //print_r($data);
          // echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              $last_id = mysqli_insert_id($conn);
               //echo "New record created successfully. Last inserted ID is: " . $last_id;
               return $last_id;
            }else{
              $result -1;  
            }
          return $last_id;
        
        
    }

    function saveTestridefast(array $data){ 
 
      /**
       * @var $conn mysqli
       */
    
          $conn = $GLOBALS['mysqli'];

          $report1 =$conn->escape_string($data['report1']);
          $report2 =$conn->escape_string($data['report2']);
          
          $priv1 =$conn->escape_string($data['priv1']);
          $priv2 =$conn->escape_string($data['priv2']);
          $priv3 =$conn->escape_string($data['priv3']);

          $quest_tr1 =$conn->escape_string($data['quest_tr1']);
          $quest_tr1_text =$conn->escape_string($data['quest_tr1_text']);
          $quest_tr2 =$conn->escape_string($data['quest_tr2_text']);
          $quest_tr3 =$conn->escape_string($data['quest_tr3']);
          $quest_tr4 =$conn->escape_string($data['quest_tr4']);
          $quest_tr5 =$conn->escape_string($data['quest_tr5']);
          $quest_tr6 =$conn->escape_string($data['quest_tr6']);
          $quest_tr7 =$conn->escape_string($data['quest_tr7']);       
          $cod_ambiente = $_SESSION['userData']['ambiente'];
          $cod_azienda = $_SESSION['userData']['azienda'];
          $cod_filiale = $_SESSION['userData']['filiale'];
          $user_ins = $_SESSION['userData']['username'];
          $data_ins = date('Y-m-d H:i:s');
          
          $id_cliente =  $conn->escape_string($data['codfiscale']);
          $id_veicolo =  $conn->escape_string($data['targa']);
          $durata_test =  $conn->escape_string($data['durata_test']);
          $stato_test = "C";
          $km_cons =  $conn->escape_string($data['km_cons']);
          $note_pren =$conn->escape_string($data['note_pren']);
          //$durata_test =date("i:s",$conn->escape_string($data['durata_test']));
          //$km_cons =  $conn->escape_string($data['km_cons']);

          
          $result=0;
          $sql ='INSERT INTO testride (id, stato_test, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, user_pren, data_pren, user_cons, data_cons,id_cliente, id_veicolo, km_cons, durata_test,note_pren,report1, report2,priv1,priv2,priv3,quest_tr1,quest_tr1_text,quest_tr2,quest_tr3,quest_tr4,quest_tr5,quest_tr6,quest_tr7) ';
          
          $sql .=" VALUE ( NULL, '$stato_test','$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins',  '$user_ins', '$data_ins', '$user_ins', '$data_ins', '$id_cliente', '$id_veicolo' ,'$km_cons' ,'$durata_test', '$note_pren','$report1', '$report2','$priv1','$priv2','$priv3','$quest_tr1','$quest_tr1_text','$quest_tr2','$quest_tr3','$quest_tr4','$quest_tr5','$quest_tr6','$quest_tr7')";
          
          
          
          
         // print_r($data);
         // echo $sql;die;
          $res = $conn->query($sql);
          
          if($res ){
            $result =  $conn->affected_rows;
            $last_id = mysqli_insert_id($conn);
             //echo "New record created successfully. Last inserted ID is: " . $last_id;
             return $last_id;
          }else{
            $result -1;  
          }
        return $last_id;
      
      
    }

    function storeTestride(array $data,int $id){ 

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $data_pre =$conn->escape_string($data['data_pren']);
            $ora_pre = $conn->escape_string($data['ora_pren']);
            $id_cliente = $conn->escape_string($data['codfiscale']);
            $km_ricons = $conn->escape_string($data['km_ricons']?$data['km_ricons']:'');
            if($km_ricons){
            $km_ricons = $conn->escape_string($data['km_ricons']?$data['km_ricons']:'');
            $data_ric = $conn->escape_string($data['data_ricons']?$data['data_ricons']:'');
            $ora_ric = $conn->escape_string($data['ora_ricons']?$data['ora_ricons']:'');
            $data_ricons = $data_ric." ".$ora_ric;
            $user_ricons = $data['km_ricons']?$_SESSION['userData']['username']:'';
            }    
            $data_pren = $data_pre. " ".$ora_pre;
            $user_pren = $data['data_pren']?$_SESSION['userData']['username']:'';

            
      
      
            
            $result=0;
            $sql ='UPDATE testride SET ';
            $sql .= "data_pren = '$data_pren', user_pren = '$user_pren'";
            if($km_ricons){
                $sql .= ",km_ricons = $km_ricons, data_ricons ='$data_ricons', user_ricons='$user_ricons'";
            }
            $sql .=" WHERE id = ".$id;
            //print_r($data);
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              
            }else{
              $result -1;  
            }
          return $result;
        
        
    }

    function storeTestridePage($data,int $id){ 

      /**
       * @var $conn mysqli
       */
    
        $conn = $GLOBALS['mysqli'];
          $id_cliente =$conn->escape_string($data['id_clientenew']);
          

          
    
    
          
          $result=0;
          $sql ='UPDATE testride SET ';
          $sql .= "id_cliente = '$id_cliente'";
          
          $sql .=" WHERE id = ".$id;
          //print_r($data);
          //echo $sql;die;
          $res = $conn->query($sql);
          
          if($res ){
            $result =  $conn->affected_rows;
            
          }else{
            $result -1;  
          }
        return $result;
      
      
    }

    function storeTestrideCons(array $data,int $id){ 

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
          $report1 =$conn->escape_string($data['report1']);
          $report2 =$conn->escape_string($data['report2']);

          $priv1 =$conn->escape_string($data['priv1']);
          $priv2 =$conn->escape_string($data['priv2']);
          $priv3 =$conn->escape_string($data['priv3']);

          $quest_tr1 =$conn->escape_string($data['quest_tr1']);
          $quest_tr1_text =$conn->escape_string($data['quest_tr1_text']);
          $quest_tr2 =$conn->escape_string($data['quest_tr2_text']);
          $quest_tr3 =$conn->escape_string($data['quest_tr3']);
          $quest_tr4 =$conn->escape_string($data['quest_tr4']);
          $quest_tr5 =$conn->escape_string($data['quest_tr5']);
          $quest_tr6 =$conn->escape_string($data['quest_tr6']);
          $quest_tr7 =$conn->escape_string($data['quest_tr7']);







            $data_cons = date("Y-m-d H:i");
            $user_cons = $_SESSION['userData']['username'];
            $km_cons = $data['km_cons'];
            $stato_test = "C";
      
      
            
            $result=0;
            $sql ='UPDATE testride SET ';
            $sql .= "stato_test = '$stato_test', data_cons = '$data_cons',user_cons = '$user_cons', km_cons = $km_cons, report1 = '$report1', report2 = '$report2'";
            $sql .= " ,priv1 = '$priv1', priv2 = '$priv2', priv3 ='$priv3', quest_tr1 = '$quest_tr1', quest_tr1_text = '$quest_tr1_text', quest_tr2 = '$quest_tr2', quest_tr3 = '$quest_tr3' , quest_tr4 = '$quest_tr4', quest_tr5 = '$quest_tr5', quest_tr6 ='$quest_tr6' , quest_tr7 = '$quest_tr7'" ;
            $sql .=" WHERE id = ".$id;
            //print_r($data);
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              
            }else{
              $result -1;  
            }
          return $result;
        
        
    }

    function storeTestrideRicons(array $data,int $id){ 

      /**
       * @var $conn mysqli
       */
    
        $conn = $GLOBALS['mysqli'];
        $report1 =$conn->escape_string($data['freport']);
        $report2 =$conn->escape_string($data['freport2']);
          $data_ricons = date("Y-m-d H:i");
          $user_ricons = $_SESSION['userData']['username'];
          $km_ricons = $data['km_ricons'];
          $data_cons = $data['data_cons'];
          $durata = ((strtotime($data_ricons))- (strtotime($data_cons)))/60;
          $stato_test = "E";

          //var_dump($durata);die;
          
          $result=0;
          $sql ='UPDATE testride SET ';
          $sql .= "stato_test = '$stato_test',data_ricons = '$data_ricons',  user_ricons = '$user_ricons', km_ricons = $km_ricons, durata_test = $durata, report1 = '$report1', report2 = '$report2'" ;
          
          $sql .=" WHERE id = ".$id;
          //print_r($data);
          //echo $sql;die;
          $res = $conn->query($sql);
          
          if($res ){
            $result =  $conn->affected_rows;
            
          }else{
            $result -1;  
          }
        return $result;
      
      
    }

    function getPatente($id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM patenti WHERE id_cliente = '$id'";
           // echo $sql;
            $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
          return $result;
        
        
    }

    function saveQuest(array $data){ 

      /**
       * @var $conn mysqli
       */
    
          $conn = $GLOBALS['mysqli'];
                 
          
          //$note_pren =$conn->escape_string($data['note_pren']);

          $id_testride=$conn->escape_string($data['id_testride']);
          $id_cliente=$conn->escape_string($data['id_cliente']);
          $quest1a=$conn->escape_string($data['quest1a']);
          $quest1b=$conn->escape_string($data['quest1b']);
          $quest2a=$conn->escape_string($data['quest2a']);
          $quest2b=$conn->escape_string($data['quest2b']);
          $quest2c=$conn->escape_string($data['quest2c']);
          $quest2d=$conn->escape_string($data['quest2d']);
          $quest3a=$conn->escape_string($data['quest3a']);
          $quest4a=$conn->escape_string($data['quest4a']);
          $quest4b=$conn->escape_string($data['quest4b']);
          $quest5c=$conn->escape_string($data['quest5c']);
          $quest5=$conn->escape_string($data['quest5']);
          $quest5d=$conn->escape_string($data['quest5d']);
          $quest6b=$conn->escape_string($data['quest6b']);
          $quest6c=$conn->escape_string($data['quest6c']);
          $quest6d=$conn->escape_string($data['quest6d']);
          $quest6=$conn->escape_string($data['quest6']);
          $quest7=$conn->escape_string($data['quest7']);
          $quest8=$conn->escape_string($data['quest8']);
          $quest9=$conn->escape_string($data['quest9']);
          $quest10=$conn->escape_string($data['quest10']);
          $quest11=$conn->escape_string($data['quest11']);
          $quest11aa=$conn->escape_string($data['quest11aa']);
          $quest11bb=$conn->escape_string($data['quest11bb']);
          $quest12=$conn->escape_string($data['quest12']);
          $priv1=$conn->escape_string($data['priv1']);
          $priv2=$conn->escape_string($data['priv2']);
          $priv3=$conn->escape_string($data['priv3']);
         

          
          $result=0;
          $sql ='INSERT INTO questionario (id, id_testride, id_cliente, quest1a, quest1b, quest2a, quest2b, quest2c, quest2d, quest3a, quest4a, quest4b, quest5c, quest5, quest5d, quest6b, quest6c, quest6d, quest6, quest7, quest8, quest9, quest10, quest11, quest11aa, quest11bb, quest12, priv1, priv2, priv3) ';
          $sql .=" VALUES (NULL, '$id_testride', '$id_cliente', '$quest1a', '$quest1b', '$quest2a', '$quest2b', '$quest2c', '$quest2d', '$quest3a', '$quest4a', '$quest4b', '$quest5c', '$quest5', '$quest5d', '$quest6b', '$quest6c', '$quest6d', '$quest6', '$quest7', '$quest8', '$quest9', '$quest10', '$quest11', '$quest11aa', '$quest11bb', '$quest12', '$priv1', '$priv2', '$priv3')";
          
          
          
        //print_r($data);
        //echo $sql;die;
          $res = $conn->query($sql);
          
          if($res ){
            $result =  $conn->affected_rows;
            $last_id = mysqli_insert_id($conn);
            $dat= date("y-m-d H:i:s");
            $descrizione ="Il questionario del Test Ride #".$id_testride." è stato compilato via web";
            $sql2 ='INSERT INTO notifiche(id,data,da,a,tipo,stato,titolo,descrizione,area,color) ';
           
            $sql2 .="VALUES(NULL, '$dat','Web','MaxHmr','QT','N','Questionario Test Ride #$id_testride','$descrizione','Test Ride','success')"; 
            $res2 = $conn->query($sql2);
            //var_dump($sql2);
            //echo $sql2;die;
             //echo "New record created successfully. Last inserted ID is: " . $last_id;
             return $last_id;
          }else{
            $result -1;  
          }
        return $last_id;
      
      
    }
    function upDanni($data,$file,$id_rif){
      /**
       * @var $conn mysqli
       */
    
      $conn = $GLOBALS['mysqli'];
      $targa=$data['id_veicolo'];
      $nome_file=$file['name'];
      $descrizione_file=$data['descrizione_danno'];
      $tipo_rif="Test Ride";
      
      $data_ins=date("Y-m-d H:i:s");
      $user_ins=$_SESSION['userData']['username'];
      $pathd = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/veicoli/danni/';
      $result=0;
      $sql ='INSERT INTO danni_veicoli (id,targa,descrizione_file,tipo_rif,id_rif,data_ins,user_ins,nome_file,path) ';
          
      $sql .=" VALUE ( NULL,'$targa','$descrizione_file','$tipo_rif',$id_rif,'$data_ins','$user_ins','$nome_file','$pathd')";
        // print_r($data);
        // print_r($file);
        // print_r($id_rif);
        // echo $sql;die;
         $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              
            }else{
              $result -1;  
            }
          return $result;



    }
    
    
