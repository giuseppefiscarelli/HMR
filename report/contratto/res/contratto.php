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
 .bordered-bottom {
    	border-bottom: 1px dashed black;	
    }
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
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Compravendita Veicolo HMR - ver 1.0</em>
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
    <h3 style="text-align:center">PROPOSTA DI COMPRAVENDITA VEICOLO</h3>



Tra la concessionaria HONDA MOTOR ROMA S.P.A come indicato compiutamente nell'intestazione del presente modulo (d'ora in
avanti denominato "venditore" ) e

<table>
	<tr>
		<td>Egr. Sig. / Sig.ra / Spett.le</td>
		<td colspan="3" class="bordered-bottom"><div style="width:150mm;margin-left:5px;"><b><?=$cli['cognome']?> <?=$cli['nome']?></b></div></td>
	</tr>
	<tr>
		<td>Nato a</td>
		<td class="bordered-bottom"><div style="width:60mm;margin-left:5px;"><b><?=getComune($cli['luogonasc'])?>(<?=$cli['provnasc']?>)</b></div></td>
		<td style="text-align:right;">il</td>
		<td class="bordered-bottom"><div style="width:20mm;margin-left:5px;"><b><?=date("d/m/Y", strtotime($cli['datanasc']))?></b></div></td>
	</tr>
	<tr>
		<td>Residente / Sede Legale in</td>
		<td colspan="3" class="bordered-bottom"><div style="width:60mm;margin-left:5px;"><b><?=getComune($cli['luogores'])?>(<?=$cli['provres']?>)</b></div></td>
	</tr>
	<tr>
		<td>Via / P.zza</td>
		<td class="bordered-bottom"><div style="width:60mm;margin-left:5px;"><b><?=$cli['indirizzores']?></b></div></td>
		<td style="text-align:right;">CAP</td>
		<td class="bordered-bottom"><div style="width:20mm;margin-left:5px;"><b><?=$cli['capres']?></b></div></td>
	</tr>
</table>
<table>
	<tr>
		<td>C.F / P. IVA</td>
		<td class="bordered-bottom"><div style="width:81mm;margin-left:5px;"><b><?=$cli['codfiscale']?></b></div></td>
		<td>E-Mail</td>
		<td class="bordered-bottom"><div style="width:78mm;margin-left:5px;"><b><?=$cli['mail1']?></b></div></td>
	</tr>
	<tr>
		<td>Cell</td>
		<td class="bordered-bottom"><div style="width:81mm;margin-left:5px;"><b><?=$cli['mobile1']?><?=$cli['mobile2']?' - '.$cli['mobile2']:''?></b></div></td>
		<td>Tel</td>
		<td class="bordered-bottom"><div style="width:78mm;margin-left:5px;"><b><?=$cli['tel1']?><?=$cli['tel2']?' - '.$cli['tel2']:''?></b></div></td>
	</tr>	
</table>

<br> 
<div style="text-align:center">
a seguito di trattative verbali intercorse, si stipula e si conviene quanto segue:<br>
il Venditore PROPONE<br>
all' acquirente che accetta con la sottoscrizione della presente proposta, la compravendita del seguente motoveicolo:<br>
</div>
<br> 
<table>
	<tr>
		<td >Modello</td>
		<td class="bordered-bottom"><div style="width:75mm"><b><?=$m['descrizione']?></b></div></td>
		<td>Telaio</td>
		<td class="bordered-bottom"><div style="width:75mm"><b></b></div></td>
	</tr>
	<tr>
		<td>Colore</td>
		<td class="bordered-bottom"><div style="width:75mm"><b><?=$m['des_col']?></b></div></td>
		<td>Targa</td>
		<td class="bordered-bottom"><div style="width:75mm"></div></td>
	</tr>
 
	<tr>
		<td>Prezzo su strada</td>
		<td class="bordered-bottom"><div style="width:75mm;text-align:right;"><b><?=number_format($contr['imp_veicolo_iva'],2,",",".")?></b></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:75mm"><b></b></div></td>
	</tr> 
	<tr>
		<td>Assistenza stradale</td>
		<td class="bordered-bottom"><div style="width:75mm"></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:75mm"></div></td>
	</tr>
    
</table>



<br>
alle "Condizioni Generali di compravendita per motoveicoli" allegate al presente documento, nonchè alle condizioni di
seguito indicate con le lettere da A) a D), prenotando sin d'ora il motoveicolo al venditore:
<br>
<br>
<b>A) PREZZO</b><br>
Prezzo complessivo chiavi in mano (come determinato in base all'art. 3 delle Condizioni Generali di compravendita<br> 
<table>	
	<tr>
		<td>viene fissato in</td>
		<td class="bordered-bottom"><div style="width:45mm;text-align:right;"><b><?=number_format($contr['imp_finale'],2,",",".")?></b></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"><b></b> </div></td>
	</tr>
    <tr>
		<td>di cui accessori (segue dettaglio)</td>
		<td class="bordered-bottom"><div style="width:45mm;text-align:right;"><b><?=number_format($contr['imp_accessori'],2,",",".")?></b></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"><b></b> </div></td>
	</tr>  
    <tr>
		<td>Sconto</td>
		<td class="bordered-bottom"><div style="width:45mm;text-align:right;"><b><?=number_format($contr['imp_sconto'],2,",",".")?></b></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"><b></b> </div></td>
	</tr> 
    
	<tr>
		<td>Caparra confirmatoria</td>
		<td class="bordered-bottom"><div style="width:45mm;text-align:right;"><b><?=number_format($contr['imp_caparra'],2,",",".")?></b></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"><b></b> </div></td>
	</tr> 	
	<tr>
		<td>Valutazione veicolo usato</td>
		<td class="bordered-bottom"><div style="width:45mm"></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"> </div></td>
	</tr> 
	<tr>
		<td>Minipassaggio/Atti amministrativi</td>
		<td class="bordered-bottom"><div style="width:45mm"></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"> </div></td>
	</tr> 
    <?php
         if($contr['tip_saldo']=="F"){?>  	
	<tr>
		<td>Finanziamento (segue dettaglio)</td>
		<td class="bordered-bottom"><div style="width:45mm"></div></td>
		<td>&euro;</td>
		<td class="bordered-bottom"><div style="width:62mm"><b></b> </div></td>
	</tr> 
         <?}?>
          
</table>
<table>		
	<tr>
		<td><div style="width:130mm;text-align:right"><b>TOTALE da pagare a saldo &euro;</b></div></td> 
		<td class="bordered-bottom "><div style="width:27mm;text-align:right;"><b><?=number_format($contr['imp_saldo'],2,",",".")?></b></div></td>
	</tr>
</table> 

<br>
<b>B) PAGAMENTO</b>
La caparra confirmatoria verrà versata al momento dell'accettazione della presente
proposta; Il saldo del prezzo verrà versato prima dell'immatricolazione.
<br>
<br>
<b>C)PERMUTA DI MOTOVEICOLO USATO</b><br>
<table>
	<tr>
		<td>Intestatario</td>
		<td class="bordered-bottom"><div style="width:125mm"></div></td>
		<td>Targa</td>
		<td class="bordered-bottom"><div style="width:38mm"> </div></td>
	</tr> 
</table>
<table>
	<tr>
		<td>Marca</td>
		<td class="bordered-bottom"><div style="width:38mm"> </div></td>
		<td>Modello</td>
		<td class="bordered-bottom"><div style="width:37mm"> </div></td>
		<td>Anno</td>
		<td class="bordered-bottom"><div style="width:37mm"> </div></td>
		<td>Km</td>
		<td class="bordered-bottom"><div style="width:37mm"> </div></td> 
	</tr>
</table>
 <table>
	<tr>
		<td>Note</td>
		<td class="bordered-bottom"><div style="width:185mm"></div></td> 
	</tr> 
</table>
<br>
<b>D)CONSEGNA</b>
<table>
	<tr>
		<td>La consegna dovr&agrave; avvenire entro il mese di </td>
		<td class="bordered-bottom"><div style="width:75mm"></div></td>
		<td>Anno</td>
		<td class="bordered-bottom"><div style="width:38mm"> </div></td>
	</tr> 
</table>
Salvo la tolleranza di cui all'articolo 5.2 delle "Condizioni Generali di compravendita per motoveicoli".
<br>
<br>
<table>
	<tr>
		<td>Roma,</td>
		<td class="bordered-bottom"><div style="width:35mm:text-align:center;"> <?=date("d/m/Y")?></div></td> 
	</tr> 
</table>
<br>
<table>
	<tr>
		<td><div style="width:65mm;text-align:center;">Il venditore</div></td>
		<td><div style="width:55mm;text-align:center;"> </div></td>
		<td><div style="width:65mm;text-align:center;">L'acquirente</div></td>
	</tr>
	<tr>
		<td><div style="width:65mm;text-align:center;"></div></td>  
		<td><div style="width:55mm;text-align:center;"> </div></td>
		<td><div style="width:65mm;text-align:center;">
		<?php if(file_exists($_SERVER['DOCUMENT_ROOT']."ERP/HMR/docs/contratti/sign/".$contr['id'].".png")){?>
			 	<img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/docs/contratti/sign/<?=$contr['id']?>.png" >
		<?}else{?>
			<img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/images/sign2.png" style="width:298px;height:100px;"/>
		<?}?>
		
		
		</div></td>
		 
		

	</tr>
	 
</table>
</page>