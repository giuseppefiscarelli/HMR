<page pagegroup="new"  style="font-size:12px" backtop="15mm" backleft="5mm" backright="5mm" backbottom="9mm">
	
<style>
	.testoParagrafo {
		text-align:justify;	
	}
    .smallBox {
    	border:1px solid #333;
    	height:3mm; 
    	width:3mm; 
    	display:inline;
    }
</style>
<style>
    .separator {
    	border-top:1px solid #333;
    }
    .box {
    	border:1px solid #333;
    	height:5mm; 
    	width:5mm; 
    	display:inline;
    }
    .priv{
        text-align: justify;
        font-size:8px;

    }
	</style>
<style type="text/css">

    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {
					width: 91%;
					text-align:"center";
					border: none; 
					border-top: solid 1mm black; 
					padding: 1mm; 
					margin-left :10mm;
					}
    div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
    ul { width: 95%; list-style-type: square; }
    ul li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
	h4 { text-align: center; font-size: 5mm}
  

</style>
<style>
table.list {
  font-size:12px;	
  border-collapse: collapse;
  width: 100%;
}

td.list, th.list {
  border: 1px solid #ddd;
  padding: 6px;
}



th.list {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #BE1E2D;
  color: white;
}
</style>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Report TestRide HMR - ver 1.0</em>
                </td>
                <td style="width: 34%; text-align: center">
                    pagina [[page_cu]] di [[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">
				<em style="font-size:10px;">Setec &copy; <?php echo date('Y'); ?></em>
                </td>
            </tr>
        </table>
    </page_footer>
    <page_header> 
        <table width="75%">
        <tr>
            <td rowspan="3"><img style="width:140px;height:40px;display:inline;"  src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/images/hmrsmall.png"></td>
            <td style="font-size:14px;text-align:center;"><strong>HONDA MOTO ROMA S.p.A.</strong></td>
            <td rowspan="3"><img style="width:160px;height:25px;display:inline;" src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/images/hondalogo.png"></td>
            <td rowspan="3" style="width:100px">&nbsp;</td>
            <td style="font-size:9px;border: 1px solid gray; border-collapse: collapse;">Tipo Report</td>
            <td style="border: 1px solid gray;border-collapse: collapse;"> Test <?php
                                                                                        if($_GET['type']==='P'){echo ' Prenotati ';}
                                                                                        if($_GET['type']==='E'){echo ' Effettuati ';}
                                                                                        if($_GET['type']===''){echo ' TestRide ';}?> </td>
        </tr>
        <tr>
            <td style="font-size:9px;text-align:center;">MEGASTORE: Via Tiburtina 1166/1168 - 00156 ROMA - Tel. 06.41224598 - 06.41205475 - Fax 06.41205475</td>
            <td style="font-size:9px;border: 1px solid gray; border-collapse: collapse;">Dal</td>
            <td style="border: 1px solid gray;border-collapse: collapse;"><?=$_GET['type']!==''?$_GET['from']:$_GET['search3']?></td>
        </tr>
        <tr>	
            <td style="font-size:9px;text-align:center;">STORE: via Gregorio VII 374/380 - 00165 ROMA - Tel. - 06.66013627 - Fax 06.6624046</td>
            <td style="font-size:9px;border: 1px solid gray; border-collapse: collapse;">al
            </td>
            <td style="border: 1px solid gray;border-collapse: collapse;"><?=$_GET['type']!==''?$_GET['to']:$_GET['search4']?>
            </td>
        </tr>
        </table>
		
	</page_header>
    <br><br>



    </page>