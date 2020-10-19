<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
//require '../model/test_ride.php';
$params = $_GET;
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);

  } 
  
switch ($action){

    case 'test':
        
        


        $a = $_POST['test'];

       $str = implode(",",$a);
       var_dump($_POST);
       Var_dump($str);die;

    break;

     
   }