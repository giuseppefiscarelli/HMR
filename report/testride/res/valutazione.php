<page pagegroup="new"  style="font-size:12px" backtop="22mm" backleft="5mm" backright="5mm" backbottom="9mm">
	
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
	
	label.checkbox:before {
		content: "☐ ";
	}
	label.checkbox.checked:before {
		content: "☑ ";
	}

</style>
<style>
    .bordered-bottom-2 {
    	border-bottom: 1px solid black;	
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
    h4 { text-align: center; font-size: 6mm}

</style>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Report Valutazione Honda - ver 1.0</em>
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
        <td ><img style="width:160px;height:25px;display:inline;" src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/images/hondalogo.png"></td>
        <td ></td>
        
       
        
        </tr>
        </table>
		<h4>Valutazione prova su strada - <?=date("Y")?></h4>
	</page_header>
	
    <table>
	<tbody>
		<tr>
		<td style="text-align:left;FONT-SIZE:12PX;width:40mm;"> Nome</td>
		<td ><b><?=$cli['nome']?></b></td>
		</tr>
		<tr>
		<td > Cognome</td>
		<td ><b><?=$cli['cognome']?></b></td>
		</tr>
	
		<tr>
		<td > Data di Nascita</td>
		<td ><b><?=$cli['datanasc']?></b></td>
		</tr>
		<tr>
		<td > Codice fiscale</td>
		<td ><b><?=$cli['codfiscale']?></b></td>
		</tr>
        <tr>
		<td> Residente in Via/Piazza</td>
		<td ><b><?=$cli['indirizzores']?></b></td>
		</tr>
        <tr>
		<td > CAP</td>
		<td ><b><?=$cli['capres']?></b></td>
		</tr>
        <tr>
		<td > Comune</td>
		<td ><b><?=getComune($cli['luogores'])?></b></td>
		<td > PR</td>
		<td ><b><?=$cli['provres']?></b></td>
		</tr>
        <tr>
		<td > Cellulare</td>
		<td ><b><?=$cli['mobile1']?> <?=$cli['mobile2']?></b></td>
		</tr>
        <tr>
		<td > E-mail</td>
		<td ><b><?=$cli['mail1']?></b></td>
		</tr>
	</tbody>
</table>
<br><br>
<table style="border: 1px solid black;">
	<tbody >

		<tr>
		<td style="text-align:left;FONT-SIZE:12PX;width:40mm;height:10mm;"> Modello provato:</td>
		<td style="width:140mm;"><strong><?=$m['marca']?> <?=$m['modello']?></strong></td>
		</tr>
	
	</tbody>
</table>
<br>
<table>
	<tbody>
		<tr>
		<td ><strong>I dati acquisiti verranno trattati ai sensi degli art. 13 e 14 del Regolamento Europeo n. 679/2016 e normativa vigente come da Informativa in calce.</strong></td>
		</tr>
	</tbody>
</table>
<br>
<br>
<table>	
	<tbody>
		 <tr>
			<td >
			1.Modello attualmente posseduto:</TD>
		</TR>
	</TBODY>
</TABLE>
<br>
<?php
if(!$quest){

    $quest = [
        'quest1a' => ' ',
        'quest1b' => ' ',
        'quest2a'=> ' ',
        'quest2b'=> ' ',
        'quest2c'=> ' ',
        'quest2d'=> ' ',
        'quest3a'=> ' ',
        'quest4a'=> ' ',
        'quest4b'=> ' ',
        'quest5c'=> ' ',
        'quest5'=> ' ',
        'quest5d'=> ' ',
        'quest6b'=> ' ',
        'quest6c'=> ' ',
        'quest6d'=> ' ',
        'quest6'=> ' ',
        'quest7'=> ' ',
        'quest8'=> ' ',
        'quest9'=> ' ',
        'quest10'=> ' ',
        'quest11'=> ' ',
        'quest11aa'=> ' ',
        'quest11bb'=> ' ',
        'quest12'=> ' ',
        'priv1'=> ' ',
        'priv2'=> ' ',
        'priv3'=> ' '



    ];
    
}

?>
<table>
	<tbody>
		<tr>
		<td style="width:15mm"> Marca:</td>
		<td ><?=!$quest['quest1a']?' ':$quest['quest1a']?></td>
		<td><div style="width:13mm"></div></td>
		<td style="width:15mm"> Modello:</td>
		<td ><?=$quest['quest1b']?></td>
		</tr>
	</tbody>
</table>
<br>
<table>	
	<tbody>
		 <tr>
			<td >
			2. Se attualmente non possiede alcun modello, potrebbe indicarci quali sono stati i modelli da Lei posseduti in passato?</TD>
		</TR>
	</TBODY>
</TABLE>
<br>
<br>
<table>
	<tbody>
    <tr>
		<td style="width:15mm"> Marca:</td>
		<td > <?=$quest['quest2a']?></td>
		<td><div style="width:13mm"></div></td>
		<td style="width:15mm"> Modello:</td>
		<td ><?=$quest['quest2b']?></td>
		</tr>
	</tbody>
</table>
<br>
<BR>
<table>	
	<tbody>
		 <tr>
			<td >
			3. Qual &egrave; la sua marca preferita di moto?</TD>
			<td><div style="width:12mm"></div></td>
			<td ><?=$quest['quest3a']?></td>
		</TR>
	</TBODY>
</TABLE>
<br>

<table>
	<tbody>
		<tr>
		<td style="width:15mm;">Perch&eacute;?</td>
		<td class="bordered-bottom-2" Style="width:172mm;"></td>
		</tr>
	</tbody>
</table>
<br>
<BR>
<table>	
	<tbody>
		 <tr>
			<td style="width:70mm">
			4. Qual &egrave; la sua marca preferita di scooter?</TD>
			<td><div style="width:12mm"></div></td>
			<td ><?=$quest['quest4a']?></td>
		</TR>
	</TBODY>
</TABLE>
<br>
<table>
	<tbody>
		<tr>
		<td style="width:15mm;">Perch&eacute;?</td>
		<td ><?=$quest['quest4b']?></td>
		</tr>
	</tbody>
</table>
<br>
<BR>




<table>	
	<tbody>
		 <tr>
			<td style="width:80mm">
			5. Pu&ograve; dirci perch&eacute; &egrave; interessato alla prova di guida?  </TD>
			
		</TR>
	</TBODY>
</TABLE>
<br>

<table>
	<tbody>
		<tr>
		<td><div class="box"><?=$quest['quest5']==="A"?" X":''?></div></td>
		<td style="width:60mm;">Interesse all'acquisto</td>
		<td><div class="box"><?=$quest['quest5']==="B"?" X":''?></div></td>
		<td style="width:43mm;">Curiosit&agrave; </td>
	
		</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box"><?=$quest['quest5']==="C"?" X":''?></div></td>
		<td style="width:80mm;">Comparazione con altro modello (specificare quale):</td>
		<td > <?=$quest['quest5']==="C"?$quest['quest5c']:''?> </td>
		</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box"><?=$quest['quest5']==="D"?" X":''?></div></td>
		<td style="width:40mm;">Altro (specificare):</td>
		<td > <?=$quest['quest5']==="D"?$quest['quest5d']:''?> </td>
		</tr>
	</tbody>
</table>

<br>
<BR>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			6. Come &egrave; venuto a conoscenza della possibilit&agrave;  di provare questo modello?</TD>
			
		</TR>
	</TBODY>
</TABLE>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['quest6']==="B"?" X":''?></div></td>
		<td style="width:40mm;">Quotidiani (specificare):</td>
		<td > <?=$quest['quest6']==="B"?$quest['quest6b']:''?> </td>
		</tr>
		<tr>
		<td><div class="box"><?=$quest['quest6']==="A"?" X":''?></div></td>
		<td style="twidth:40mm;">Amici</td>
		<td class="bordered-bottom-2" style="width:142mm;"></td>
		</tr>
		<tr>
		<td><div class="box"><?=$quest['quest6']==="C"?" X":''?></div></td>
		<td style="width:40mm;">Internet (specificare):</td>
		<td > <?=$quest['quest6']==="C"?$quest['quest6c']:''?> </td>
		</tr>
		<tr>
		<td><div class="box"><?=$quest['quest6']==="D"?"X ":''?></div></td>
		<td style="width:40mm;">Riviste di settore (specificare):</td>
		<td > <?=$quest['quest6']==="D"?$quest['quest6d']:''?> </td>
		</tr>
		<tr>
		<td><div class="box"><?=$quest['quest6']==="E"?"X":''?></div></td>
		<td style="width:40mm;">Altro (specificare):</td>
		<td > <?=$quest['quest6']==="E"?$quest['quest6d']:''?> </td>
		</tr>
		</tbody>
</table>

<br>
<BR>
<br>
<BR>
<br>
<BR>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			7. Qual &egrave; il suo giudizio complessivo sul modello?</TD>
		</TR>	
	</TBODY>
</TABLE>
<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest7']?></td>
		</tr>
		
	</tbody>
</table>
<br><br><br>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			8. Che cosa le &egrave; piaciuto di pi&ugrave;?</TD>
		</TR>	
	</TBODY>
</TABLE>

<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest8']?></td>
		</tr>
	</tbody>
</table>
<br><br><br>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			9. Che cosa le &egrave; piaciuto di meno?</TD>
		</TR>	
	</TBODY>
</TABLE>

<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest9']?></td>
		</tr>
	</tbody>
</table>
<br><br><br>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			10. Che cosa avrebbe desiderato ci fosse?</TD>
		</TR>	
	</TBODY>
</TABLE>

<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest10']?></td>
		</tr>
	</tbody>
</table>
<br><br>
<table>	
	<tbody>
		 <tr>
			<td style="width:100mm">
			11. Pensa di acquistare questo modello?</TD>
			<td><div class="box" style="text-align:bottom;"> <?=$quest['quest11']==="Si"?" X":''?></div></td>
			<td style="width:20mm;">Si</td>
			<td><div class="box" style="text-align:bottom;"> <?=$quest['quest11']==="No"?" X":''?></div></td>
			<td style="width:20mm;">No</td>			
			
		</TR>	
	</TBODY>
</TABLE>
<table>	
	<tbody>
		 <tr>
			<td style="width:100mm">
			11 - a. Se &ldquo;Si&rdquo;, pu&ograve; dirci orientativamente quando?  </TD>
			<td><div class="box" style="text-align:bottom;"> <?=$quest['quest11aa']==="A"?" X":''?></div></td>
			<td style="width:20mm;">Entro 3 mesi</td>
			<td><div class="box" style="text-align:bottom;"> <?=$quest['quest11aa']==="B"?" X":''?></div></td>
			<td style="width:20mm;">Tra 3 e 6 mesi</td>			
			<td><div class="box" style="text-align:bottom;"> <?=$quest['quest11aa']==="C"?" X":''?></div></td>
			<td style="width:20mm;">Oltre 6 mesi</td>			
			
		</TR>	
	</TBODY>
</TABLE>
<br>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			11 - b. Se &ldquo;No&rdquo;, pu&ograve; dirci il motivo?</TD>
		</TR>	
	</TBODY>
</TABLE>
<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest11bb']?></td>
		</tr>
		
	</tbody>
</table>
<br>
<br>
<table>	
	<tbody>
		 <tr>
			<td style="width:200mm">
			12. Altre osservazioni</TD>
		</TR>	
	</TBODY>
</TABLE>
<table>
	<tbody>
		<tr>
		<td class="bordered-bottom-2" style="width:190mm;height:4mm;"><?=$quest['quest12']?></td>
		</tr>
		
	</tbody>
</table>
</page>
<page  style="font-size:12px" backtop="22mm" backleft="5mm" backright="5mm" backbottom="9mm">
<page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Report Valutazione Honda - ver 1.0</em>
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
        <td ><img style="width:160px;height:25px;display:inline;" src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/images/hondalogo.png"></td>
        <td ></td>
        
       
        
        </tr>
        </table>
		<h4>Valutazione prova su strada - <?=date("Y")?></h4>
	</page_header>
	


<br><br><br><br><br><br><br>

<table>
	<tbody>
		 <tr>
		<td style="text-align:justify;font-size:11px;">
		<strong>INFORMATIVA PER IL TRATTAMENTO DI DATI PERSONALI AI SENSI DELL'ART. 13 E 14 DEL REGOLAMENTO EUROPEO N. 679/2016 E NORMATIVA VIGENTE</strong>
		</TD>
		</TR>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		TITOLARE DEL TRATTAMENTO<br>
		Honda Motor Europe LTD Italia - "HONDA ITALIA" - Sede Secondaria della Honda Motor Europe LTD, con sede in Roma, via della Cecchignola, 13.</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		FINALITA' DEL TRATTAMENTO<br>
		a) Gestione di eventi dimostrativi organizzati dal Titolare sui prodotti specifici ivi compresa la possibilit&agrave; di prova/test del prodotto.<br>
		b) Gestione del rapporto con l'interessato (Cliente e/o potenziale Cliente) in riferimento all'acquisto di prodotti Honda e relative operazioni di trattamento connesse (con garanzia, etc)<br>
		c) Attivit&agrave; di marketing diretto ed indiretto, attraverso inoltro all'interessato di comunicazioni promozionali tramite diverse modalit&agrave; di comunicazione di seguito indicate.<br>
		</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		TEMPI DI CONSERVAZIONE DEI DATI<br>
		dati saranno conservati per il tempo necessario all'esecuzione/gestione del rapporto con il Cliente, ivi comprese esigenze di esecuzione della garanzia e/o eventuali campagne del prodotto, secondo quanto previsto dalle disposizioni vigenti, nonche', limitatamente alle finalit&agrave; di marketing diretto ed indiretto, per un periodo coerente con le finalit&agrave; connesse alla natura stessa del prodotto.</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		NATURA DEL CONFERIMENTO<br>
		Il conferimento dei dati è libero, ma il rifiuto di conferire alcuni dati potrebbe non rendere possibile l'espletamento delle prestazioni afferenti il rapporto con il Cliente. Il consenso in ogni caso potra' essere negato senza che cio' comporti alcun onere o danno all'interessato in relazione alla sua posizione nei confronti del Titolare.</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		TIPOLOGIA DI DATI TRATTATI<br>
		Dati anagrafici, dati di fatturazione nonche' dati inerenti le scelte commerciali effettuate limitatamente alle finalita' di marketing.</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		MODALITA' DI TRATTAMENTO<br>
		Il trattamento dei dati potr¹ essere effettuato sia con mezzi manuali che con mezzi informatici. Sara' inoltre possibile che il trattamento venga effettuato tramite strumenti auto 
		specifica modalita' di trattamento, l'interessato potra' richiedere di non essere sottoposto a decisioni che derivino dalla stessa con le medesime indicate per l'esercizio delle gene</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		AMBITO DI DIFFUZIONE DEI DATI<br>
		I dati potranno circolare all'interno della societa' Titolare nei limiti di quanto necessario per il perseguimento delle finalita' sopra indicate e comunque nel rispetto delle mis evitare fenomeni di perdita o fuoriuscita del dato.<br>
		I dati o alcuni di essi potranno essere comunicati ad altre entita' Honda nonche' all'interno del circuito dei "Concessionari Honda" e dei fornitori di servizi che trattano i dati p saranno diffusi in alcun modo.</td>
		</tr>
		<tr>
		<td style="text-align:justify;font-size:8px;">
		DIRITTI DELL'INTERESSATO<br>
		In qualunque momento l'interessato potra' esercitare i diritti di cui agli articoli 15 e seguenti del Regolamente Europeo n, 678/2016 e precisamente: il diritto di sapere se i prop
		trattamento e quindi di conoscerne il contenuto e l'origine, di verificarne l'esattezza o chiederne l'integrazione, la cancellazione, la limitazione, l'aggiornamento, la rettifica
		anonima o il blocco, nonche' il diritto di opporsi in ogni caso, per motivi legittimi, al loro trattamento e di proporre reclamo al Garante per la Protezione die dati Personali.<br>
		Il consenso prestato al trattamento potra' essere revocato in qualsiasi momento determinando l'interruzione del trattamento.<br>
		Tali diritti potranno essere esercitati nei confronti del Titolare come sopra individuato inviando un'e-mail al Responsabile pro-tempore scrivendo all'indirizzo e-mail Privacy.It</td>
		</tr>

	</tbody>
</table>





<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;width:30mm"><strong>Il/La Sottoscritto/a</strong></td>
	<td class="bordered-bottom-2" style="text-align:center;width:80mm;"><STRONG><?=$cli['cognome'].' '.$cli['nome']?></STRONG></td>	
	<td style="text-align:center;font-size:9px;width:80mm;"><strong> dichiara di avere letto l'informativa qui riportata.</strong></td>
	</tr>
	</tbody>
</table>
<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;"><strong>Con riferimento all'attivita' di marketing (punto 2 lettera b), si prega di voler compilare correttamente i campi della Scheda di
	 seguito riportata relativa al "consenso", con la che lo stesso potra' in ogni caso ed in qualsiasi momento essere modificato e/o revocato nelle modalita' di seguito previste.</strong></td>
	</tr>
	</tbody>
</table>
<br>
<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;">
	Desidero ricevere informazioni/newletters/aggiornamenti su prodotti ed iniziative di Marketing diretto ed indiretto correlate, da parte di:
	</td>
	</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv1']==="A"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">HONDA ITALIA</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv1']==="B"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:100mm;">Concessionari Autorizzati (indicati negli elenchi accessibili dal sito www.honda.it)</td>
		</tr>
	</tbody>
</table>
<br>
<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;">
	Desidero ricevere le suddette informazioni sui seguenti prodotti:
	</td>
	</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv2']==="A"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">TUTTI</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv2']==="B"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">Auto</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv2']==="C"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">Moto</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv2']==="D"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">Prodotti Green e Marine</td>

		</tr>
	</tbody>
</table>
<br>
<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;">
	Desidero ricevere le informazioni attraverso i seguenti canali:
	</td>
	</tr>
	</tbody>
</table>
<table>
	<tbody>
		<tr>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv3']==="A"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">TUTTI</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv3']==="B"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">E-Mail</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv3']==="C"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">Posta</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv3']==="D"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">Telefono</td>
		<td><div class="box" style="text-align:bottom;"> <?=$quest['priv3']==="E"?" X":''?></div></td>
		<td style="text-align: justify;font-size:9px;width:30mm;">SMS</td>
		</tr>
	</tbody>
</table>
<br>
<table>
	<tbody>
	<tr>
	<td style="text-align:justify;font-size:9px;">
	Si fa presente che qualora intendesse revocare e/o modificare il consenso al trattamento dei dati per le finalita' indicate oppure non ricevere piu' informazioni su prodotti, inviare indirizzo di posta elettronica Privacy.Italia@honda.it oppure contattare direttamente il call-center Honda la n. 800.889977
	</td>
	</tr>
	</tbody>
</table>
<br><br><br><br><br><br>

<table>
	<tbody >

		<tr>
		<td style="border: 1px solid black;text-align:center;vertical-align:bottom;font-size:12px;width:80mm;height:35mm;"> <STRONG>TIMBRO DEL CONCESSIONARIO</STRONG></td>
		<td style="text-align:center;vertical-align:top;width:120mm;"><strong>Data <?=date("d/m/Y")?></strong>
		
		<br><br><br><br> Firma
		<br><br>          
		<?php if(file_exists($_SERVER['DOCUMENT_ROOT']."ERP/HMR/docs/testride/sign/".$cli['id']."_sig_ricons_tr_".$tr['id'].".png")){?>
			<img src="<?=$_SERVER['DOCUMENT_ROOT']?>ERP/HMR/docs/testride/sign/<?=$cli['id']?>_sig_ricons_tr_<?=$tr['id']?>.png" style="width:65mm;text-align:center;">
			<?}else{?>
	<div style="height:20mm;"></div>
<?}?>
		</td>	
		
		</tr>
	
	</tbody>
</table>

    </page>