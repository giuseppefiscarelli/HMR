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
.tab{
    border: 1px solid black;
  border-collapse: collapse;
}
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
	
  

</style>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
				<em style="font-size:10px;">Dettaglio Compravendita HMR - ver 1.0</em>
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
    <h3 style="text-align:center">DETTAGLIO COMPRAVENDITA VEICOLO</h3>

    <h5>Dettaglio Veicolo</h5>
    <table >
        <tr><td>Modello</td><td><b><?=$m['descrizione']?></b></td></tr>
        <tr><td>Colore</td><td><b><?=$m['des_col']?></b></td></tr> 
                    
    </table>
    <h5>Dettaglio Importi</h5>
        <table>
            <tr><td>Prezzo Iva Esclusa</td><td style="text-align: right;"><b><?=number_format($contr['imp_veicolo_siva'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Immatricolazione (iva escl)</td><td style="text-align: right;"><b><?=number_format($contr['imp_imma'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Aliquota IVA</td><td style="text-align: right;"><b><?=number_format($contr['iva'],1,",",".")?> %</b></td></tr>
            <tr><td>Prezzo su Strada IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_veicolo_iva'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Importo Accessori IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_accessori'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Prezzo Finale IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_finale'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Importo Sconto IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_sconto'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Totale Scontato IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['tot_scontato'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Importo Caparra IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_caparra'],2,",",".")?> &euro;</b></td></tr>
            <tr><td>Importo Saldo IVA Incl</td><td style="text-align: right;"><b><?=number_format($contr['imp_saldo'],2,",",".")?> &euro;</b></td></tr>
        </table>
    <h5>Dettaglio Pagamento</h5>
        <table>
            <tr><td>Tipologia Pagamento Caparra </td><td><b><?php
                                                                            if($contr['tip_caparra']=="B"){
                                                                                echo " Bonifico";
                                                                            }
                                                                            if($contr['tip_caparra']=="C"){
                                                                                echo " Contanti";
                                                                            }
                                                                            if($contr['tip_caparra']=="A"){
                                                                                echo " Assegno";
                                                                            }
                                                                        ?> 
                                                                        </b></td></tr>   
            <tr><td>Tipologia Pagamento Saldo </td><td> <b><?php
                                                                            if($contr['tip_saldo']=="B"){
                                                                                echo " Bonifico";
                                                                            }
                                                                            if($contr['tip_saldo']=="F"){
                                                                                echo " Finanziamento";
                                                                            }
                                                                            if($contr['tip_saldo']=="A"){
                                                                                echo " Assegno";
                                                                            }
                                                                        ?></b></td></tr>        
        </table> 
    <?php
         if($contr['tip_saldo']=="F"){?>                                                                        
    <h5>Dettaglio Finaziamento</h5>
         <?}?>       
    <h5>Dettaglio Accessori</h5>
            <table>
            <tr>
                <th style="width:70mm">Descrizione</th>
                <th style="width:25mm">Quantità</th>
                <th style="width:25mm">Prezzo</th>
                <th style="width:25mm">Totale</th>
            </tr>
            <?php 
            if($acc){
                foreach($acc as $a){?>   
                <tr>
                    <td><b><?=$a['descrizione']?></b></td>
                    <td style="text-align:center;"><b><?=$a['qnt']?></b></td>
                    <td ><b><?=number_format($a['prezzo_iva'],2,",",".")?> &euro; </b></td>
                    <td><b><?=number_format($a['tot_iva'],2,",",".")?> &euro; </b></td>
                </tr>    
                <?}
            }?>
             
            </table>


</page>