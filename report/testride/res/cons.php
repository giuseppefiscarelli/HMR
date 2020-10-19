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
				<em style="font-size:10px;">Report TestRide consegna HMR - ver 1.0</em>
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
    <h4 style="text-align:center">MODULO DI ASSUNZIONE DI RESPONSABILITA'</h4>
<br>

Io sottoscritto:<br>
<div class="separator">&nbsp;</div>
<table cellpadding="4">
<tr>
	<td>Nominativo</td>
	<td style="width:90mm;font-weight: bold;"><?=$cli['cognome']?> <?=$cli['nome']?></td>
	<td>Sesso</td>
	<td style="font-weight: bold;"><?=$cli['sesso']?></td>
</tr>
<tr>
	<td>Nato a</td>
	<td style="width:90mm;font-weight: bold;"><?=getComune($cli['luogonasc'])?>(<?=$cli['provnasc']?>)</td>
	<td>il</td>
	<td style="font-weight: bold;"><?=date("d/m/Y", strtotime($cli['datanasc']))?></td>
</tr>
<tr>
	<td>Residente a</td>
	<td style="width:90mm;font-weight: bold;"><?=getComune($cli['luogores'])?>(<?=$cli['provres']?>)</td>
	<td>Via</td>
	<td style="font-weight: bold;"><?=$cli['indirizzores']?></td>	
</tr>
<tr>
	<td>Tel.Cell</td>
	<td style="width:90mm;font-weight: bold;"><?=$cli['mobile1']?> - <?=$cli['mobile2']?></td>
	<td>E-mail</td>
	<td style="font-weight: bold;"><?=$cli['mail1']?> - <?=$cli['mail2']?></td>	
</tr>
</table>
<div class="separator">&nbsp;</div>

<table>
<tr>
	<td>Patente posseduta tipo</td>
	<td style="width:25mm;font-weight: bold;"><?=$pat['tipo_patente']?></td>
	<td>N.</td>
	<td style="width:25mm;font-weight: bold;"><?=$pat['numero_patente']?></td>
	<td>Data rilascio</td>
	<td style="width:25mm;font-weight: bold;"><?=date("d/m/Y",strtotime($pat['data_rilascio']))?></td>	
	<td>Data scadenza</td>
	<td style="width:25mm;font-weight: bold;"><?=date("d/m/Y",strtotime($pat['data_scadenza']))?></td>	
</tr>
<tr>
	<td>Rilasciata da</td>
	<td style="width:25mm;font-weight: bold;"><?=$pat['ente_rilascio']?></td>
</tr>
</table>

<div class="separator">&nbsp;</div>

<table>
	<tr>
		<td valign="top">POSSIEDO:</td>
		<td valign="top">
			<div style="width:50mm">
				SCOOTER&nbsp;&nbsp;<div class="box">&nbsp;</div>&nbsp;&nbsp;
				MOTO&nbsp;&nbsp;<div class="box">&nbsp;</div>
			</div>
		</td>
		
		<td valign="top">MARCA:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>

		<td valign="top">MODELLO:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>
		
		<td valign="top">ANNO:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>
	</tr>
</table>
<div class="separator">&nbsp;</div>
<table>
	<tr>
		<td valign="top">POSSIEDO AUTO:</td>
		<td valign="top">
			<div style="width:40mm">
				SI&nbsp;&nbsp;<div class="box">&nbsp;</div>&nbsp;&nbsp;
				NO&nbsp;&nbsp;<div class="box">&nbsp;</div>
			</div>
		</td>
		
		<td valign="top">MARCA:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>

		<td valign="top">MODELLO:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>
		
		<td valign="top">ANNO:</td>
		<td valign="top">
			<div style="width:30mm"> 
			</div>
		</td>
	</tr>
</table>
<div class="separator">&nbsp;</div>
<table>
	<tr>
		<td valign="top">CONCESSIONARIO DI FIDUCIA:</td>
		<td valign="top">
			<div style="width:70mm"> 
			</div>
		</td>
		
		<td valign="top">CITTA':</td>
		<td valign="top">
			<div style="width:50mm"> 
			</div>
		</td> 
	</tr>
</table>
<div class="separator">&nbsp;</div>
<table>

	<tr>
		<td valign="bottom" class="priv">chiedo di poter usare in comodato di prova gratuito la moto/scooter HONDA, modello:</td>
		<td valign="top">
		<div style="width:40mm;display:inline;text-align:center"><STRONG><?=$m['marca']?> <?=$m['modello']?></STRONG></div>
		</td>
		
		<td valign="bottom" style="display:inline;FONT-SIZE:8PX;">TARGA:</td>
		<td valign="top">
			<div style="width:70mm;display:inline;text-align:center"><STRONG><?=$m['targa']?></STRONG></div>
		</td> 
	</tr>
</table>
<table>	
	<tbody>
	 <tr>
	    <td class="priv">
        di proprieta' della Honda Moto Roma S.p.A. obbligandosi alla riconsegna del suddetto motoveicolo a semplice 
        richiesta della Honda Moto Roma S.p.A.,	a tal fine dichiaro:</td>
	</tr>
    <tr>
    <td class="priv">1. di aver gia' compiuto la maggiore eta' alla data della firma del presente esonero e di essere in possesso
		 di patente di guida specifica per la guida del mezzo che andro' ad utilizzare;</td>

	</tr>
    <tr>
		<td class="priv">
		2. di aver preso perfetta conoscenza del Codice della strada e di impegnarmi ad uniformarvisi;</td>
	</tr>
	<tr>
		<td class="priv">
		3. di aver personalmente constatato lo stato attuale del suddetto motoveicolo (piena efficienza e affidabilita' del mezzo)
		 e di uniformarmi prontamente a tutte le disposizioni e segnalazioni del personale della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, 
		 Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. preposto e, considerato quanto precede, il suddetto motoveicolo e' perfettamente idoneo alla 
		 prova che intendo effettuare;</td>
	</tr>
	<tr>
		<td class="priv">
		4. di assumermi a tale riguardo ogni responsabilita' per la custodia di detto motoveicolo fino alla riconsegna del medesimo, 
		per gli incidenti e per i conseguenti danni che ne derivassero sia a se stessi ed alle cose di loro proprieta', sia a terzi ed alle cose di terzi, compresi 
		tra i terzi il pilota e le persone eventualmente trasportate dal suddetto motoveicolo;</td>
	</tr>
	<tr>
		<td class="priv">
		5. di impegnarmi a manlevare e tenere indenne la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe
		Ltd o Honda Italia Industriale S.p.A. nonch� qualsiasi loro rappresentante, incaricato, funzionario, dipendente o collaboratore, da qualsiasi responsabilita' 
		comunque connessa o dipendente o conseguente alla prova che il sottoscritto intende effettuare;</td>
	</tr>
	<tr>
		<td class="priv">
		6. di impegnarmi tassativamente a non cedere il suddetto motoveicolo a persona non autorizzata dalla Honda Moto Roma S.p.A., 
		Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. e che comunque non abbia sottoscritto la presente dichiarazione 
		assumendomi fin d'ora tutte le responsabilita' per qualsiasi sanzione civile, amministrativa, penale, conseguente alla inosservanza di questa norma;</td>
	</tr>
	<tr>
		<td class="priv">
		7. di impegnarmi a risarcire la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o 
		Honda Italia Industriale S.p.A. di tutti i danni da me causati agli impianti e alle persone nonche' ad indennizzare per tutte le spese ed oneri che abbia a 
		sostenere per qualsiasi motivo di mio interesse;</td>
	</tr>
	<tr>
		<td class="priv">
		8. di impegnarmi a risarcire, per un valore minimo pari a euro 500,00 la Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, 
		Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. di eventuali danni subiti nell'utilizzo del suddetto motoveicolo concesso in comodato gratuito;</td>
	</tr>
	<tr>
		<td class="priv">
		9.di trovarmi in perfetto stato di salute fisica e psichica.</td>
	</tr>
	<tr>
		<td class="priv">
		Io sottoscritto confermo espressamente tutto quanto sopra precede ad ogni e qualsiasi effetto di legge.</td>
</tr>
	
	
</tbody>
</table>
<br><br><br>

<table>
	<tbody>
		<tr>
			<td><div style="width:110mm;"></div></td>
			<td></td>
		</tr>
	</tbody>
</table>
<br>
<table>
	<tbody>
		<tr>
		<td class="priv">
		Ai sensi e per gli effetti degli artt. 1341 e 1342 c.c., io sottoscritto dichiaro specificatamente le clausole 1);2);3);4);5);6);7);8);9); e quanto sopra selezionato.</td>
		</tr>
			
	</tbody>
</table>
<br><br>
<table>
	<tbody>
		<tr>
			<td><div style="width:110mm;"></div></td>
			<td style="text-align:center;">Firma </td>
			</tr>
		<tr>
			<td></td>
		 <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."ERP/HMR/docs/testride/sign/".$cli['id']."_sig_cons_tr_".$tr['id'].".png")){?>
			<td> 	<img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/docs/testride/sign/<?=$cli['id']?>_sig_cons_tr_<?=$tr['id']?>.png" style="width:65mm;text-align:center;">
		
<?}else{?>
	<td><div style="height:20mm;"></div>
<?}?>
			</td>  
		</tr>
	</tbody>
</table>

<BR><BR>
<table>
	<tbody>
			<tr>
			<td>VEICOLO CONSEGNATO IN PROVA IL:</td>
			<td><div style="width:30mm;text-align:center;"><STRONG><?=date("d/m/Y", strtotime($tr['data_cons']))?></STRONG></div></td>
			<td>ALLE ORE:</td>
			<td><div style="width:20mm"><STRONG><?=date("H:i", strtotime($tr['data_cons']))?></STRONG></div></td>
			<td>A KM:</td>
			<td><div style="width:20mm"><STRONG><?=$tr['km_cons']?></STRONG></div></td>
		</tr>
		<BR><BR>
		<tr>
			<td>VEICOLO DA RICONSEGNARE IL:</td>
			<td><div style="width:30mm;text-align:center;"><STRONG><?=date('d/m/Y',strtotime('+ '.$tr['durata_test'].' minutes',strtotime($tr['data_cons'])))?></STRONG></div></td>
			<td >ENTRO LE ORE:</td>
			<td><div style="width:20mm"><STRONG><?=date('H:i',strtotime('+ '.$tr['durata_test'].' minutes',strtotime($tr['data_cons'])))?></STRONG></div></td>
		</tr>
	</tbody>
</table>
<BR><BR>
<table>
	<tbody>
		<tr>
			<td><div style="width:110mm;"></div></td>
		</tr>
	</tbody>
</table>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<table>	
	<tbody>
		 <tr>
			<td class="priv">
			Il sottoscritto, in relazione all'informativa ricevuta ai sensi del Regolamento Europeo N. 679/2016 a quanto segue:</TD>
		</TR>
	</TBODY>
</TABLE>
<table>	
	<tbody>
		 <tr>
			<td class="priv">
			<b>1. Trattamento dei dati personali, riproduzione e pubblicazione immagini personali </b></TD>
			<td valign="top"><div style="width:18mm"></div></td>

			<td><div class="box" style="text-align:bottom;"> <?=$tr['priv1']==="A"?" X":''?></div></td>
				<td class="priv">
				presto il consenso al trattamento</TD>
				<td valign="top"><div style="width:15mm"></div></td>
				<td><div class="box" style="text-align:bottom;"> <?=$tr['priv1']==="B"?" X":''?></div></td>
				<td class="priv">
				nego il consenso al trattamento</TD>

		</TR>
	</TBODY>
</TABLE>
<table>
	<tbody>
		 <tr>
			<td class="priv">
			da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda
			Italia Industriale S.p.A. e dei soggetti ad essa legati per finalita' legate alla effettuazione e promozione 
			dell'evento a cui si e' inteso partecipare, e per le altre finalita' citate nell'informativa contenuta nel sito ufficiale
			(hondaitalia.com/privacy), in conformita' al Regolamento Europeo N. 679/2016 e s.m..i.</TD>
		</TR>
	</tbody>
</table>
<table>	
	<tbody>
		 <tr>
			<td class="priv">
			<b>2. Comunicazione di promozioni, offerte, eventi ed inviti tramite e-mail</b></TD>
			<td valign="top"><div style="width:31mm"></div></td>

			<td><div class="box" style="text-align:bottom;"> <?=$tr['priv2']==="A"?" X":''?></div></td>
				<td class="priv">
				presto il consenso al trattamento</TD>
				<td valign="top"><div style="width:15mm"></div></td>
				<td><div class="box" style="text-align:bottom;"> <?=$tr['priv2']==="B"?" X":''?></div></td>
				<td class="priv">
				nego il consenso al trattamento</TD>

		</TR>
	</TBODY>
</TABLE>
<table>
	<tbody>
		 <tr>
			<td class="priv">
		     da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o
		     Honda Italia Industriale S.p.A. e dei soggetti ad essa legati,incluse le comunicazioni su programmi
		     e concorsi, ricerche e analisi di mercato, inviate tramite posta elettronica in conformita' al Regolamento
		     Europeo N. 679/2016 e s.m.i.</TD>
		</TR>
	</tbody>
</table>
<table>	
	<tbody>
		 <tr>
			<td class="priv">
			<b>3. Comunicazione di promozioni, offerte, eventi ed inviti tramite sms, contatto telefonico e/o posta</b></TD>
			<td valign="top"><div style="width:3mm"></div></td>

			<td><div class="box" style="text-align:bottom;"> <?=$tr['priv3']==="A"?" X":''?></div></td>
				<td class="priv">
				presto il consenso al trattamento</TD>
				<td valign="top"><div style="width:15mm"></div></td>
				<td><div class="box" style="text-align:bottom;"> <?=$tr['priv3']==="B"?" X":''?></div></td>
				<td class="priv">
				nego il consenso al trattamento</TD>

		</TR>
	</TBODY>
</TABLE>
<table>
	<tbody>
		 <tr>
			<td class="priv">
		     da parte della Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia
		     Industriale S.p.A. e dei soggetti ad essa legati,incluse le comunicazioni su programmi e concorsi, ricerche e 
		     analisi di mercato, effettuate via sms, telefono e/o posta in conformita' al Regolamento Europeo N.679/2016 e s.m.i.</TD>
		</TR>
		<tr>
		<td class="priv">
		Ai sensi del Regolamento Europeo N. 679/2016 il sottoscritto ha il diritto di conoscere, in ogni momento, quali sono 
		i suoi dati e come essi sono utilizzati. Ha anche il diritto di farli aggiornare e rettificare. In particolare, per 
		richiedere la cancellazione dei suoi dati dovra' inviare una comunicazione raccomandata alla Honda Moto Roma S.p.A., 
		Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia Industriale S.p.A. Il Titolare del trattamento 
		e l'elenco dei terzi ai quali i dati potranno essere comunicati c disponibile, previa richiesta scritta del sottoscritto alla Honda Moto Roma S.p.A., Honda Motor Europe Ltd. - Italia, Honda Motor Europe Ltd o Honda Italia Industriale S.p.A.</td>
		</tr>
	</tbody>
</table>
<br><br>
<table>
<tbody>
		<tr>
			<td><div style="width:110mm;"></div></td>
			<td style="text-align:center;">Firma </td>
			</tr>
		<tr>
			<td></td>
		 <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."ERP/HMR/docs/testride/sign/".$cli['id']."_sig_cons_tr_".$tr['id'].".png")){?>
			<td> <img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/docs/testride/sign/<?=$cli['id']?>_sig_cons_tr_<?=$tr['id']?>.png" style="width:65mm;text-align:center;">
			<?}else{?>
	<td><div style="height:20mm;"></div>
<?}?>
			</td> 		</tr>
	</tbody>
</table>
<br><br><br><br>
<div class="separator">&nbsp;</div>
<table>	
	<tbody>
		 <tr>
			<td class="priv">
			1. Come e' venuto a conoscenza del programma eventi Honda?</td>
			<td class="priv">
			2.Quale modello honda prevede di acquistare?.............<?=$tr['quest_tr1']==="F"?$tr['quest_tr1_text']:''?>
..................</td>
		 </tr>				
	</TBODY>
</TABLE>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="A"?" X":''?></div></td>
		<td class="priv">PUBBLICITA'</td>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="D"?" X":''?></div></td>
		<td class="priv">REDAZIONALI</td>
		<td class="priv">Entro quando?</td>
		</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="B"?" X":''?></div></td>
		<td class="priv">INTERNET</td>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="E"?" X":''?></div></td>
		<td class="priv">CONCESSIONARIO HONDA</td>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr3']==="A"?" X":''?></div></td>
				<td class="priv">3 mesi</td>
				<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr3']==="B"?" X":''?></div></td>		<td class="priv">6 mesi</td>
				<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr3']==="C"?" X":''?></div></td>		<td class="priv">oltre 6 mesi</td>
		</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="C"?" X":''?></div></td>
		<td class="priv">AMICI</td>
		<td><div class="box" style="text-align:bottom;"> <?=$tr['quest_tr1']==="F"?" X":''?></div></td>
		<td class="priv">ALTRO.............................</td>
		
		</tr>
	</tbody>
</table>
<br><br><br>
<table>
	<tbody>
		<tr>
		<td class="priv">3. Quali quotidiani legge?</td>	<td class="priv"><?=$tr['quest_tr4']?></td>
		</tr>
		<tr>
		<td class="priv">4. Quali riviste legge?</td>	<td class="priv"><?=$tr['quest_tr5']?></td>
		</tr>
		<tr>
		<td class="priv">5. Quali radio ascolta?</td><td class="priv"><?=$tr['quest_tr6']?></td>
		</tr>
		<tr>
		<td class="priv">6. Quale sito visita più di frequente?</td><td class="priv"><?=$tr['quest_tr7']?></td>
		</tr>
	</tbody>
</table>		
		<br><br>
 
<div class="separator">&nbsp;</div>
</page>