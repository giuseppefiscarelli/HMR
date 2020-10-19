<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/notifiche.php';
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

    case 'update':
        
        $data = $_REQUEST;
        //die;
        $res = update($data);
    break;
   
   }