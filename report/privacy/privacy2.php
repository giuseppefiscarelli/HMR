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
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/model/anagr_cli.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/HMR/functions.php';

$cliId = intval($_GET['id']);
//var_dump($cliId);die;
$cli = getCliente($cliId);
//var_dump($cliente);die;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(5, 5, 5, 2));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->pdf->SetProtection(array('print','copy'));
    ob_start();
    include dirname(__FILE__).'/res/privacy.php';
    $content = ob_get_clean();
    $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/';
    $html2pdf->writeHTML($content);
   
    //$html2pdf->createIndex('Sommaire', 30, 12, false, true, 2, null, '10mm');
    $html2pdf->output($path.$cliId.'_privacy.pdf','FI');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
