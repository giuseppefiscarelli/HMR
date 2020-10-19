<?php






if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
                  

          $params =[
            'orderBy' => $orderBy,
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'page' => $page
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          //$totalUsers= countUsers($params);
          //$numPages= ceil($totalUsers/$recordsPerPage);
          //$users = getUsers($params);
          
          //var_dump($_SESSION['userData']) ;
          if($_SESSION['userData']['username']=='TestUser'){
           require_once 'view/hometabletHmr.php';
         }elseif($_SESSION['userData']['username']=='TestTablet'||'MaxHmr'){
          require_once 'view/hometabletHmr.php';
          //var_dump(getParam());
         }else{
            require_once 'view/hometabletHmr.php';
         }
          