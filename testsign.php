<?php
session_start();
require_once '../functions.php';
require_once dirname(__FILE__).'/vendor/autoload.php';
if(!isUserLoggedin()){
    require_once "../Mail.php";
  header('Location:../login.php');
  exit;
}


require_once 'headerInclude.php';
require_once '../../testmail.php';
    $to      = "giuseppe.fiscarelli@setec.it";

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
                        <button style="color: #fff; background-color: #04b962; border-color: #04b962; border-radius: .25rem; padding: 9px 19px;width: 40%;margin-left: 30%;"> Iniziamo </button>
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
    
//var_dump($logomail);
?>


<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">
    <div>
    <div id="signatureDiv">
      Signature image:<br />
      <img id="signatureImage" value="#" />
    </div>
    <div>
      Actions:<br />
      <input type="button" id="signButton" value="Start demo" onClick="tabletDemo()" />
    </div>
  </div>
  
  
 
 
   

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
        //require_once 'view/wacomlogo.php';
        require_once 'view/wacomsign.php';
      }
?>

<script>
   

</script>
  

</body>
</html>  