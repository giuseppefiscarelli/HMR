<?php

/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/model/test_ride.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/functions.php';

$trId = intval($_GET['id']);
//var_dump($trId);die;
$tr = getTest($trId);
$cliId = $tr['id_cliente'];
$motoId = $tr['id_veicolo'];
$cli= getClientecf($cliId);
$m=getMotoinfo($motoId);
$pat=getPatente($cliId);
$quest = getValutazione($trId);
//var_dump($tr);die;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(5, 5, 5, 2),true);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->pdf->SetProtection(array('print','copy'));
    ob_start();
    include dirname(__FILE__).'/res/cons.php';
    //include dirname(__FILE__).'/res/full.php';
    include dirname(__FILE__).'/res/inf_pat.php';
    include dirname(__FILE__).'/res/ricons.php';
    include dirname(__FILE__).'/res/doc.php';

    include dirname(__FILE__).'/res/valutazione.php';
    include '../privacy/res/privacy.php';
    
    
    
    $content = ob_get_clean();
    $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/report/';
    $html2pdf->writeHTML($content);
   
    //$html2pdf->createIndex('Sommaire', 30, 12, false, true, 2, null, '10mm');
    $html2pdf->output($path.$trId.'_full.pdf','FI');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
