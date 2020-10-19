<?php
require_once '../functions.php';
require_once '../connection.php';
function storeTestride(array $data,int $id){ 
        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $id_cliente =$conn->escape_string($data['codfiscale']);
            

            
      
      
            
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