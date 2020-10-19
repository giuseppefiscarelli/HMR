<?php
require "Mail.php";

    


    $host    = "smtp.gmail.com";

    $port    =  "587";

    $user    = "hondamotoromadev@gmail.com";

    $pass    = "01735583";


    $smtp    = @Mail::factory("smtp", array("host"=>$host, "port"=>$port, "auth"=> true, "username"=>$user, "password"=>$pass));



    

    $from    = "\"Honda Moto Roma\" <hondamotoromadev@gmail.com>"; // the email address