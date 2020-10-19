<page pagegroup="new"  style="font-size:12px" backtop="15mm" backleft="5mm" backright="5mm" backbottom="9mm">
	


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
    

</style>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Report TestRide riconsegna HMR - ver 1.0</em>
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
        
        </tr>
        <tr>
        <td style="font-size:9px;text-align:center;">MEGASTORE: Via Tiburtina 1166/1168 - 00156 ROMA - Tel. 06.41224598 - 06.41205475 - Fax 06.41205475</td>
        </tr>
        <tr>	
        <td style="font-size:9px;text-align:center;">STORE: via Gregorio VII 374/380 - 00165 ROMA - Tel. - 06.66013627 - Fax 06.6624046</td>
        </tr>
        </table>
		
	</page_header>
    <table>
		<tr><td style="width:145mm"></td>
			<td style="font-size:9px;text-align:right">Prenotazione del
			</td>
			<td style="font-size:10px;text-align:left;font-weight: bold;"><?=date("d/m/Y  h:i", strtotime($tr['data_pren']))?>
			</td>
		</tr>
		<tr>
		<td></td>
			<td style="font-size:9px;text-align:right">Numero test</td>
			<td style="font-size:10px;text-align:left;font-weight: bold;"><?=$tr['id']?></td>
		</tr>
		<tr>
		<td></td>
			<td style="font-size:9px;text-align:right">Consulente HMR
			</td>
			<td style="font-size:10px;text-align:left;font-weight: bold;"><?=$tr['user_pren']?></td>
		</tr>
	</table>
    <h4 style="text-align:center">MODULO RICONSEGNA VEICOLO TESTRIDE</h4>
<br>
<table>
<tr><td style="text-align:left;font-size:12px;width:40mm;">Cod. Cliente</td><TD><strong><?=$tr['id']?></strong></TD></TR>
<tr><td >Cliente</td><TD><strong><?=$cli['cognome']?> <?=$cli['nome']?></strong></TD></tr>

<tr><td >Veicolo Testato</td><td><strong><?=$m['marca']?> <?=$m['modello']?> Targa <?=$tr['id_veicolo']?></strong></td></TR>
<tr><td >Riconsegnato il</td><td><strong><?=date("d/m/Y", strtotime($tr['data_ricons']))?></strong></td></tr>
<tr><td >Alle Ore</td><TD><strong><?=date("h:i", strtotime($tr['data_ricons']))?></strong></td></tr>
<tr><td>KM</td><TD><strong><?=$tr['km_ricons']?></strong></td></tr>

</table>
<BR><BR><br>
<table>
	<tbody>
		<tr>
			<td><div style="width:110mm;"></div></td>
            <td style="text-align:center;">Firma </td>
		</tr>
		<tr>
			<td></td>
		 	<?php if(file_exists($_SERVER['DOCUMENT_ROOT']."ERP/HMR/docs/testride/sign/".$cli['id']."_sig_ricons_tr_".$tr['id'].".png")){?>
			<td> <img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/docs/testride/sign/<?=$cli['id']?>_sig_ricons_tr_<?=$tr['id']?>.png" style="width:65mm;text-align:center;">
			<?}else{?>
			<td><div style="height:20mm;"></div>
				<?}?>
			</td>
		</tr>
	</tbody>
</table>

</page>


