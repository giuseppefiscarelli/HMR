
<?php
session_start();
require_once 'functions.php';


if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/contratto.php';
$updateUrl = 'contrattoUpdate.php'; 
$updateCliUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateTestride.php';

require_once 'headerInclude.php';
?>

<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

<style>
            .swal-title {
            color: #000000;
        }
        .swal-text {
            text-align: center;
            color: rgb(0 0 0);
            font-size: 18px;
            font-weight: 400;
            line-height: 1.6;
        }
        .swal-button--confirm, .swal-button:focus {
            background-color: #04b962;
            box-shadow: none;
        }
        .swal-button--cancel {
            color: #fff;
            background-color: #f43643;
        }

        .swal-modal {
            border-radius: 1.25rem;
            background-color: #b1aeae;
            box-shadow: 0px 0px 12px 1px black inset;
        }
            .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
            color: #000;
        }
        .btn-light {
        
            background-color: #e0e0e000;
            border-color: #e0e0e0;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        .wizard > .content
        {
        background: white;
        display: block;
        margin: 0.5em;
        min-height: 700px;
        overflow: auto;
        position: relative;
        width: auto;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        }
        .wizard.vertical > .steps
        {
            display: inline;
            float: left;
            width: 15%;
        }
        .wizard.vertical > .content
        {
            display: inline;
            float: left;
            margin: 0 2.5% 0.5em 2.5%;
            width: 80%;
        }
        .wizard > .content > .body ul
        {
            list-style: none !important; 
        }

</style>
   
    <?php
  
    if(!empty($_SESSION['message'])){
      $message = $_SESSION['message'];
      $alertType = $_SESSION['success'] ? 'success':'danger';
      $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
      require 'view/messageDelete.php';
      unset($_SESSION['message'],$_SESSION['success']);
    }
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
    
    $id = getParam('id',0);
    if ($id){
       $contr=getContratto($id);
       $idVei=$contr['id_veicolo'];
       $selVei = getMotosel($idVei);
       $modVei = getColor($selVei['modello']);
       $lisVei = getListIdvei($selVei['descrizione']);
       var_dump($modVei);
    }
    $action = getParam('action',0);
    $title=basename($_SERVER['PHP_SELF']);
    $titolo = getTitle($title."?action=".$action);
    //var_dump(basename($_SERVER['REQUEST_URI']));
    $cliente = getParam('cliId',0);
    $idFin = getParam('idFin',0);
    if ($idFin){

        $pratica = getPraticafin($idFin);
        //var_dump($pratica);
        $fintab = getFintab($pratica['id_finanziaria']);
        var_dump($fintab);
    }
    if (!$cliente){
        $cli =[
            'id' =>'',
            'cod_ambiente'=>'',
            'cod_azienda'=>'',
            'cod_filiale'=>'',
            'user_ins' =>'',
            'data_ins'=>'',
            'user_mod' =>'',
            'tipo_anagr'=>'',
            'ragsociale'=>'',
            'cognome' =>'',
            'nome' => '',
            'luogonasc' => '',
            'datanasc' => '',
            'provnasc' => '',
            'nazionalita' => '',
            'sesso' => '',
            'codfiscale' => '',
            'partitaiva' => '',
            'indirizzores' => '',
            'luogores' => '',
            'provres' => '',
            'capres' => '',
            'mail1' => '',
            'mail2' => '',
            'tel1' => '',
            'tel2' => '',
            'mobile1' => '',
            'mobile2' => '',
            'fax' => ''
          ];
          
        $checkclinom = false;
        $checkcliana = false;
        $checkclires = false;
        $checkclicon = false;
        $checkcap = false;
        $checkcli = '0';
    }else{
        $cli = getCliente($cliente);

        $checkclinom = $cli['cognome'] !== ''&&$cli['nome'] !== ''&&$cli['codfiscale'] !== ''?true:false;
        $checkcliana = $cli['luogonasc'] !== ''&&$cli['provnasc'] !== ''&&$cli['datanasc'] !== ''?true:false;
        $checkclires = $cli['luogores'] !== ''&&$cli['indirizzores'] !== ''&&$cli['provres'] !== ''&&$cli['capres'] !== ''&&strlen($cli['capres'])==5?true:false;
        $checkcap = strlen($cli['capres'])<5?false:true;
        $checkclicon = $cli['mail1'] !== ''&&$cli['mobile1'] !== ''?true:false;
        $checkcli = $checkclinom&&$checkcliana&&$checkclires&&$checkclicon?true:'0';
        /*
        var_dump($checkclinom);
        var_dump($checkcliana);
        var_dump($checkclires);
        var_dump($checkclicon);
        */
    }
    //var_dump($cli); 
    
     
    $moto=getMotolist();
    //var_dump($_POST);
    $tabfin = getFintablist();
    //var_dump($tabfin);
    require_once 'view/formContrattoUpdate.php';

    ?>
         
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
    if(!isMobile()){
        //require_once 'view/wacomlogo.php';
        require_once 'view/wacomsign.php';
      }
?>
<script type="text/javascript">

    var form = $("#wizard-validation-form");
    form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "Questo è un campo Obbligatorio."
    });
    
       

    form.children("div").steps({
    labels: {
            
            
            finish: "Salva Preventivo/Contratto",
            next: "Avanti",
            previous: "Indietro"
        
        },
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "fade",
            stepsOrientation: "vertical",
            onStepChanging: function (event, currentIndex, newIndex)
    {       
        form.validate().settings.ignore = ":disabled,:hidden";
        checkcli = <?=$checkcli?>;
        if(currentIndex == 0 && checkcli ==0){
            swal({
                    title: "Completare/aggiornare i dati!",
                    //text: "Una volta eliminato, non potrai più recuperarlo!",
                    icon: "warning",
                    buttons: "Indietro",
                   // dangerMode: true,
                  })
            return false;
            
                }
       
        if(currentIndex == 1 ){
            bozza = $("#id_contratto").val();
            id_cliente = $('#id_cliente').val();
            id_veicolo = $('#col_veicolo option:selected').val();
            info_vei = $('#mod_veicolo option:selected').html();
            info_col = $("#col_veicolo option:selected").attr("data-content");
            info_prezzo = $('#piinc').html();
            info_prezzo_esc = $('#piesc').html();
            imma_info = $('#pimma').html();
            iva_info = $('#aliva').html();
            
            $(".mod_info").html(info_vei);
            $(".col_info").html(info_col);
            $(".pvei_info").html(info_prezzo);
            $(".pvei_esc_info").html(info_prezzo_esc);
            $(".info-contr").show();
            $('.imma_info').html(imma_info);
            $('.iva_info').html(iva_info);
            user_ins = $('#user_ins').val();
            if(bozza==0){
                
                $.ajax({
                    url: "controller/updateContratto.php?action=saveBozza",
                    type: 'post',
                    dataType: 'json',
                    data: {
                    id_cliente:id_cliente, id_veicolo:id_veicolo, user_ins:user_ins
                    },
                    success: function(json) {
                        $.each(json, function(k,v) {
                            $("#id_contratto").val(v);
                            $("#message2").show();
                            $('#tex_msg2').html('Bozza Salvata!')
                            $('#message2').fadeOut(4000);
                        });														
                    }   
                });
            }else{
               
                $.ajax({
                    url: "controller/updateContratto.php?action=upBozza",
                    type: 'post',
                    dataType: 'json',
                    data: {
                    id_cliente:id_cliente, id_veicolo:id_veicolo, user_ins:user_ins, id:bozza
                    },
                    success: function() {
                        
                            $("#message2").show();
                            $('#tex_msg2').html('Bozza n°'+bozza+' Aggiornata!')
                            $('#message2').fadeOut(4000);
                        													
                    }   
                });
                
            }
        } 

        if(currentIndex == 3 && $('#stato_stima').val() == "D"){
            swal({
                    title: "Confermare La Stima!",
                    //text: "Una volta eliminato, non potrai più recuperarlo!",
                    icon: "warning",
                    buttons: "Indietro",
                   // dangerMode: true,
                  })
                  $("#addpermuta").focus();
            return false;

        }
        if(currentIndex == 4 ){
            a = parseFloat($('#imp_veicolo_iva').val());
            b = parseFloat($('#imp_sconto').val().replace(',','.'));
            c = parseFloat($('#imp_accessori').val());
           
            d= a-b+c;
            deuro = parseFloat(d).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            $('.imp_fin_sco').html(deuro);
            $('#imp_finale').val(d);
        }
        return form.valid();
        
        
    },
        onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex > 1 ){
            $('#head5').empty();
            $(".daticli , .dativeicolo").clone().appendTo("#head5");
        };
        if(currentIndex == 0){

            checkcli = <?=$checkcli?>;
        };
       
        
        
    },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
           
        },
        onFinished: function (event, currentIndex)
        { jsignCode =  document.getElementById("signatureImage").src;
         $("#signCode").val(jsignCode); 
         a = $
         $("#wizard-validation-form").submit();
         id = $('#id_contratto').val();
         url = 'report/contratto/contratto.php?id='+id;
         
        
        }
    });
    
</script>
<script type="text/javascript">
   
    function upImporti(){
        cap= parseFloat($('#imp_caparra').val().replace(',','.'));
        fin= parseFloat($('#imp_pratica').val());
            $("#tot_scon").blur(function(){
                max=$('#imp_veicolo_iva').val();
                if($(this).val()==''){
                    $(this).val(0.00);
                }
                
                    a= parseFloat($(this).val().replace(',','.'));
                    a= a.toFixed(2);
                    b= parseFloat($('#imp_veicolo_iva').val());
                    b= b.toFixed(2);
                    if(a>b){
                         $(this).val(b);
                    }
                    c= (b-a).toFixed(2);
                    d= c/(b/100);
                    d= d.toFixed(2);
                    e = (a-cap).toFixed(2);
                    $('#per_sconto').val(d);
                    $('#imp_sconto').val(c);
                    residuo =  parseFloat($('#tot_scontato').val());
                    ceuro = parseFloat(c).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    aeuro = parseFloat(a).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    //feuro = parseFloat(f).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    $('.scovei_info').html(ceuro);
                    //residuo = residuo.toFixed(2);
                    sub = residuo-c;
                    res = residuo-c-cap-fin;
                    
                    console.log(res);
                    $('#tot_residuo').val(res);
                    eurores = parseFloat(sub).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    $('.sub_info').html(eurores);
                    $('.totscovei_info').html(aeuro);
                    $('.persco_info').html(d.replace('.',',')+" %");
                    //subtotale();
            });
            $("#imp_sconto").blur(function(){
                if($(this).val()==''){
                $(this).val(0.00);
                }
                a= parseFloat($(this).val().replace(',','.'));
                a= a.toFixed(2);
                b= parseFloat($('#imp_veicolo_iva').val());
                b= b.toFixed(2);
                c= (b-a).toFixed(2);
                d= a/(b/100);
                d= d.toFixed(2);
                e = (c-cap).toFixed(2);
                $("#tot_scon").val(c);
                residuo =  parseFloat($('#tot_scontato').val());
                aeuro = parseFloat(a).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                ceuro = parseFloat(c).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                $('.scovei_info').html(aeuro);

                sub = residuo-a;
                res = (residuo-a-cap-fin);

                $('#tot_residuo').val(res.toFixed(2));
                eurores = parseFloat(sub).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                $('.sub_info').html(eurores);


                $('.impscon').html(c);
                $('#per_sconto').val(d);
                $('.totscovei_info').html(ceuro);
                $('.persco_info').html(d.replace('.',',')+" %");

                //$('#tot_residuo').val(e);

            });
            $("#per_sconto").blur(function(){
                if($(this).val()==''){
                $(this).val(0.00);
                }
                a= parseFloat($(this).val().replace(',','.'));
                a= a.toFixed(2);
                b= parseFloat($('#imp_veicolo_iva').val());
                b= b.toFixed(2);
                
                d= a*(b/100);
                d= d.toFixed(2);
                c= (b-d).toFixed(2);
                e = (c-cap).toFixed(2);
                $("#tot_scon").val(c);


                residuo =  parseFloat($('#tot_scontato').val());
                ceuro = parseFloat(c).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                deuro = parseFloat(d).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                $('.scovei_info').html(deuro);

                sub = residuo-d;
                res = (residuo-d-cap-fin).toFixed(2);

                $('#tot_residuo').val(res);
                eurores = parseFloat(sub).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                $('.sub_info').html(eurores);
                


                $('.impscon').html(c);
                $('#imp_sconto').val(d);
                $('.totscovei_info').html(ceuro);
                $('.persco_info').html(a.replace('.',',')+" %");
               // $('#tot_residuo').val(e);

            });
    };
    function updateAcc(id) {
       
        qta = "#qta_".concat(id);
        pre = "#pre_".concat(id);
        pri = "#pri_".concat(id);
        tote = "#tote_".concat(id);
        toti = "#toti_".concat(id);
        sconper = "#persco_".concat(id);
        sconimp = "#impsco_".concat(id);
       // totac =parseFloat($('#totale_acc').html().replace(',','.'));
        
        a = $(qta).val();
        
        b = parseFloat($(pre).html().replace(',','.'));
        c = parseFloat($(pri).html().replace(',','.'));
        //ta = parseFloat((a*b).replace('.',','));
        d = parseFloat($(sconimp).html().replace(',','.'));
        tota = (a*b).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
        totb = (a*c).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
        $(tote).html(tota);
        $(toti).html(totb);
       
       subtotale();
      
    };
    function updateAccSco(id) {
       
       qta = "#qta_".concat(id);
       pre = "#pre_".concat(id);
       pri = "#pri_".concat(id);
       tote = "#tote_".concat(id);
       toti = "#toti_".concat(id);
       sconper = "#persco_".concat(id);
       sconimp = "#impsco_".concat(id);
       totscon = "#totsco_".concat(id);
      
       
       a = $(qta).val();
       b = parseFloat($(pre).html().replace(',','.'));
       c = parseFloat($(pri).html().replace(',','.'));
       d = parseFloat($(sconper).val().replace(',','.'));
       if(isNaN(d) ) {
                        d = '0.00';
                    }
      // console.log(d);
       e = parseFloat($(totscon).val());
       f = parseFloat($(sconimp).val().replace(',','.'));
       g = parseFloat($(totscon).val().replace(',','.'));

        
       impscon = ((c/100)*d).toFixed(2);
       impscone = ((b/100)*d).toFixed(2);
       totsco = (c-impscon).toFixed(2);
       totscoe = (b-impscone).toFixed(2);
      
       $(sconimp).val(impscon.replace('.',','));
       $(totscon).val(totsco.replace('.',','));

       tota = (a*totscoe).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
       totb = (a*totsco).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
        $(tote).html(tota);
        $(toti).html(totb);
      
        $.ajax({
                    url: "controller/updateContratto.php?action=upAccessori",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id:id, qnt:a,per_sconto:d
                    },
                    success: function(json) {
                       													
                    }   
                });
      subtotale();
     
   };
   

    function subtotale(){
                sum = 0;
                sconacc =0;
                $(".totalacc").each(function() {
                    sub = parseFloat($('#imp_veicolo_iva').val()); 
                    value= $(this).html();
                    value = value.replace('.','');   
                    console.log(value);    
                    value = value.replace(',','.');
                    value= parseFloat(value);
                    console.log(value);
                    if(!isNaN(value) && value.length != 0) {
                        sum += value;
                    }
                });

                $(".scontoacc").each(function() {
                       
                    value = parseFloat($(this).val().replace(',','.'));
                    if(!isNaN(value) && value.length != 0) {
                        sconacc += value;
                    }

                   
                });
               
               $('#imp_sco_accessori').val(sconacc);
               sconacceur = parseFloat(sconacc).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
               $('.scoacc_info').html(sconacceur);
               // sub1 = (sub+sum).toFixed(2).replace('.',',');
                sub1 = sub+sum;
                sum2 = parseFloat(sum).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                sub2 = parseFloat(sub1).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
               // sub1= parseFloat(sub2).replace(',','.');
                $('#totale_acc').html(sum2);
                $('.acc_info').html(sum2);
                $('.sub_info').html(sub2);
                $('#imp_accessori').val(sum);
               //$('#subh3,#subh4,#subh5').html(sub2);
                a= parseFloat($('#imp_veicolo_iva').val());
                b= (sum+a).toFixed(2);
                c=  parseFloat($('#imp_caparra').val().replace(',','.'));
                c= c.toFixed(2);
                e=  parseFloat($('#imp_sconto').val().replace(',','.'));
                e=e.toFixed(2);
                console.log(e);
                h =parseFloat($('#imp_permuta').val().replace(',','.'));
                h= h.toFixed(2);
                per = parseFloat(h).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
               // $('#perh4,#perh5').html(per);
                d= (b-e).toFixed(2);
                f= (b-c-e-h).toFixed(2);
                console.log(f);
                g= (e/(b/100)).toFixed(2);
                h =parseFloat($('#imp_permuta').val().replace(',','.'));
                h= h.toFixed(2);
                eeuro = parseFloat(e).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                feuro = parseFloat(f).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                $('.scovei_info').html(eeuro);
                $('.sub_info').html(feuro);
                fin = parseFloat($('#imp_pratica').val());
                tot_fin = (b-c-e-h-fin).toFixed(2);
                console.log(fin);
                console.log(tot_fin);
                $('#tot_scontato').val(f);
                $('#tot_residuo').val(tot_fin);
                $('#per_sconto').val(g);
                
                //$('.head4,.head8,.head14').show();
                upImporti();
    };
  
   
    function pagamento(){
            tipo = $('#tip_saldo').val();
            tipc= $('#tip_caparra').val();
            t = $("#tip_saldo option:selected").text();
            tc = $("#tip_caparra option:selected").text();
            ts=$("#tot_residuo").val();
            ts = parseFloat(ts).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            tcs=parseFloat($('#imp_caparra').val().replace(',','.'));
            tcs = parseFloat(tcs).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            impvie = parseFloat($('#imp_veicolo_siva').val().replace(',','.'));
            impvie = parseFloat(impvie).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            impimma = parseFloat($('#imp_imma').val().replace(',','.'));
            impimma = parseFloat(impimma).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            impiva =$('#aliva').html();
            //impvic = $('#imph4,#imph5').html();
            //impacc = $('#acch4,#acch5').html();
            //imptot=$('#subh4,#subh5').html();
           // a= parseFloat($('#imp_sconto').val().replace(',','.'));

            //impsco = parseFloat($('#imp_sconto').val().replace(',','.'));
            //impsco = parseFloat(impsco).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});

            persco = $('#per_sconto').val();
            // persco = parseFloat(persco).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
            impsal = parseFloat($('#tot_residuo').val().replace(',','.'));
            impsal = parseFloat(impsal).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});

            console.log(t);
            $('#tab_finanziamento').hide();
            $('#head6').hide();
            $('#head7').hide();

            if (tipc){
                $('#head6').show();

            }
            if (tipo === "F"){
                
                $('#tipsal').html(t);
                $('#impsal').html(ts);
                $('#tab_finanziamento').show();
                $('#head7').show();
                //$('#tab_fin').focus();
                c= parseFloat($('#finimp').val().replace(',','.'));
                if (c>0){
                    cap = parseFloat($('#imp_caparra').val());
                    b= parseFloat($('#tot_scon').val().replace(',','.'));
                    tot = (b-c-cap).toFixed(2);
                    $('#tot_residuo').val(tot);
                }

            }
            $('#impcap,.impcap').html(tcs);
            
            
           

           $('.persco').html(persco+" %");
            $('.impsal').html(impsal);
           // $('.totsco').html(imptot);
            $('#tipcap').html(tc);
            $('#impsal').html(ts);
            
            $('#tipsal').html(t);
    };
    function allowNumbersOnly(e){
        code =(e.which) ? e.which : e.keyCode;
  
        if (code >31 && (code< 44 || code > 57 ) ){
            e.preventDefault();
        }
        
    };
    function delAcc(id){
        $.ajax({
                        url:'controller/updateContratto.php?action=delAccessori',
                        method:'POST',
                        data:{id:id},
                        
                            success: function(event){
                                row = "#rowacc_".concat(id);
                                console.log(row);
                                $(row).remove();
                                subtotale();

                        } 
            });  
       
    };

    
    

    $(function () {
        $( "#autocomplete" ).autocomplete({
            minLength: 3,
            source: function( request, response ) {
            
            // Fetch data
            $.ajax({
                url: "script/autoUser.php",
                type: 'post',
                dataType: 'json',
                data: {
                search: request.term
                },
                //success: function(data) {
                //response(data);
                //},
                success: function (data) {
                            if (data) {
                            //var data = [{ label: 'No results found.', val: -1}];
                                    response(data);
                                
                                
                            } else {
                            var d = [{ label: 'No results found.', val: -1}];
                            response(d);
                            }
                        
                }
                
            });
            },
            select: function (event, ui) {
                
                location.href = location.href.split("&",1) + "&cliId=" + ui.item.id;
                
            return false;
            }

        });
        $( "#accessori" ).autocomplete({
            minLength: 3,
            source: function( request, response ) {
            
            // Fetch data
            $.ajax({
                url: "script/autoAccessori.php",
                type: 'post',
                dataType: 'json',
                data: {
                search: request.term
                },
                //success: function(data) {
                //response(data);
                //},
                success: function (data) {
                            if (data) {
                            //var data = [{ label: 'No results found.', val: -1}];
                                    response(data);
                                
                                
                            } else {
                            var d = [{ label: 'No results found.', val: -1}];
                            response(d);
                            }
                        
                }
                
            });
            },
            select: function (event, ui) {
                p1 =parseFloat(ui.item.prezzo_lordo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                p2 =parseFloat(ui.item.prezzo_netto).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});

                $('#acc_cod').html(ui.item.codice);
                $('#acc_des').html(ui.item.descrizione);
                $('#acc_udm').html(ui.item.udm);
                $('#acc_pre').html(p1);
                $('#acc_pri').html(p2);

                $('#acc_info').show();
                $("#accessori").val("");

            return false;
            }

        });
        var ci = 1;
        $('#acc_add').click(function() {
            p1=parseFloat($("#acc_pre").html().replace(',','.'));
            p2=parseFloat($("#acc_pri").html().replace(',','.'));
            //p1=parseFloat(p1);
            // col1 = 
            $('#acc_info').hide();
            $.ajax({
                        url:'script/addAccessori.php',
                        method:'POST',
                        data:{
                            
                            codice:$("#acc_cod").html(),
                            descrizione:$("#acc_des").html(),
                            id_contratto:$('#id_contratto').val(),
                            id_cliente:$('#id_cliente').val(),
                            id_veicolo:$('#col_veicolo option:selected').val(),
                            user_ins:$('#user_ins').val(),
                            prezzo_siva:p1,
                            tot_siva:p1,
                            prezzo_iva:p2,
                            tot_iva:p2,
                            qnt:1,
                            id_row:ci
                        },
                        
                            success: function(dataResult){
                                dataResult = JSON.parse(dataResult);
                               // console.log(dataResult.id);
                                cci = dataResult.id;
                              //  console.log(cci);

                            $('#acc_table').show();
                            markup = '<tr id="rowacc_'+cci+'">';
                            markup +='<td style="padding-left:9px;padding-right:0px;"><button style="padding:5px 9px;"onclick="delAcc('+cci+');"type="button" class="btn btn-danger"> <i class="fa fa-trash-o"></i> </button></td>';
                            markup +='<td><a id="cod_'+cci+'">'+$("#acc_cod").html()+'</a></td>';
                            markup +='<td><a id="des_'+cci+'">'+$("#acc_des").html()+'</a></td>';
                            markup +='<td><input type="text" id="qta_'+cci+'" class="form-control form-control-sm" onkeyup="updateAccSco('+cci+')" maxlength="3" value="1"></td>';
                            markup +='<td><a id="udm_'+cci+'">'+$("#acc_udm").html()+'</a></td>';
                            markup +='<td><a id="pre_'+cci+'">'+$("#acc_pre").html()+'</a> iva escl<br><a id="pri_'+cci+'">'+$("#acc_pri").html()+'</a> iva incl</td>';
                            markup +='<td><div class="input-group"><input id="persco_'+cci+'" type="number" class="form-control form-control-sm" onkeyup="updateAccSco('+cci+')" maxlength="3" max="100" value="0"><div class="input-group-append"><span class="input-group-text"><i class="fa fa-percent"></i></span></div></div>';
                            markup +='<div class="input-group"><input id="impsco_'+cci+'"type="text" readonly class="form-control form-control-sm scontoacc" onkeyup="updateAcc('+cci+')" maxlength="7" value="0"><div class="input-group-append"><span class="input-group-text"><i class="fa fa-euro"></i></span></div></div>';
                            markup +='<div class="input-group"><input id="totsco_'+cci+'" readonly type="text" class="form-control form-control-sm " value="'+p2+'"><div class="input-group-append"><span class="input-group-text"><i class="fa fa-euro">  totale</i></span></div></div></td>';

                            markup +='<td><a id="tote_'+cci+'">'+$("#acc_pre").html()+'</a> iva escl<br><a class="totalacc" id="toti_'+cci+'">'+$("#acc_pri").html()+'</a> iva incl</td>';
                            markup +='</tr>';
                           
                            $("#acc_table tbody").append(markup);
                            
                            //getAccessori();
                            subtotale();
                            ci++; 

                        } 
            });          
        });
        $('#mod_veicolo').on('change select',function(event) {
            var modello = $(this).val();
            $('#dispvei').hide();
            $.ajax({
                url: "controller/updateContratto.php?action=getColore",
                type:"POST",
                data: {modello:modello},
                dataType: 'json',
                success: function(json) {
                    $('#sel_colore').show();
                    var $el = $("#col_veicolo");
                    $el.empty(); // remove old options
                        //$('.selectpicker').selectpicker('refresh');
                        // $el.append($("<option selected disabled></option>").text('Scegli Colore'));
                    $("#col_veicolo").append('<option value="" selected="">Scegli il Colore</option>');
                    $("#col_veicolo").val("");
                    $("#col_veicolo").selectpicker("refresh");
                    disp=0;
                    $.each(json, function(k,v) {
                        if(v.quantita > 0){
                            data = v.descrizione+" <span class=\'badge badge-success\'> Disponibili "+v.quantita+" unità </span>";
                           
                        }else{
                            data = v.descrizione;
                            $('#dispvei').hide();
                        }
                       
                        $el.append($("<option></option>").attr({
                                                            value :  k,
                                                             'data-content': data
                                                        }));
                    });

                    $('.selectpicker').selectpicker('refresh');														
                }       
            });
            $.ajax({
                url:'script/getMotolist.php',
                type:"POST",
                data: {modello:modello},
                dataType: 'json',
                success: function(json) {
                    
                    $.each(json, function(k,v) {
                    p1 =parseFloat(v.lisppe).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    p2 = v.lisiva;
                    p3 = parseFloat(v.lisppi).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    p4 = (250.00).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});               
                    $('#piesc').html(p1);
                    $('#imp_veicolo_siva').val(v.lisppe);
                    $('#pimma').html(p4);
                    $('#imp_imma').val(250.00);
                    $('#aliva').html(p2.replace('.',',')+" %");
                    $('#iva').val(p2);
                    $('#piinc,#imph3,#subh3,#imph4,#imph5,#subh4,#subh5').html(p3);
                    fin = $('#imp_pratica').val();
                    fin =parseFloat(fin);
                    residuo = v.lisppi - fin;
                    console.log(residuo);
                    $('#imp_veicolo_iva,#tot_scontato,#tot_scon').val(v.lisppi);
                    $('#tot_residuo').val(residuo);
                   
                    });														
                }       
            });
        });
        $('#col_veicolo').on('change select',function() {
            $('#dispvei').hide();
            colore = $("#col_veicolo option:selected").attr("data-content");
            //console.log(colore);
            modello = $("#mod_veicolo option:selected").text();
            id_veicolo = $("#col_veicolo option:selected").val();
            $('#id_veicolo').val(id_veicolo);
            $.ajax({
                url: "controller/updateContratto.php?action=getVermag",
                type:"POST",
                data: {id_veicolo:id_veicolo},
                dataType: 'json',
                success: function(json) {
                    if(json){
                    $('#dispvei').show();
                    }
                    $("div").remove(".telaio");
                  
                    $.each(json, function(k,v) {

                        markup = "<div class=\"icheck-material-danger telaio\"><input type=\"radio\" id=\"tel_"+v.id+"\" name=\"telaio\" value=\""+v.telaio+"\" ><label for=\"tel_"+v.id+"\">VIN <b>"+v.telaio+"</b></label></div>";
                        $('#telai').append(markup);    
                   
                    });			
                    //$('#telai').append(markup);											
                }       
            });

            
        });
        $(".sconto").keyup(function(){
          
            upImporti();


        });
        $("#imp_caparra").keyup(function(){
            if($(this).val()==''){
                $(this).val(0.00);
            }

            a= parseFloat($(this).val().replace(',','.'));
            b= parseFloat($('#tot_scontato').val().replace(',','.'));
            c= parseFloat($('#imp_sconto').val().replace(',','.'));
            d=parseFloat($('#imp_pratica').val());
            tot = (b-a-c-d).toFixed(2);
            $('#tot_residuo').val(tot);
            console.log(a);
            console.log(b);
            console.log(c);
            console.log(d);
            console.log(tot);
            



            pagamento();
           
          
            

        });
        $('#tip_saldo,#tip_caparra').on('change select',function() {

            $('#tipsal').html("");
            pagamento();


        });
        $('#tab_fin').on('change select',function(event) {
            var tabella = $(this).val();
            
            $.ajax({
                url:'script/getImpfin.php',
                type:"POST",
                data: {tabella:tabella},
                dataType: 'json',
                success: function(json) {
                    //$('#sel_colore').show();
                    var $el = $("#finimp");
                    $rat = $("#finnra");
                    $el.empty(); // remove old options
                    $rat.empty(); 
                    $('#det_fin').hide();
                    $rat.append($("<option selected ></option>").text('Seleziona n. Rate'));
                    $el.append($("<option selected ></option>").text('Seleziona Importo'));
                    $.each(json, function(k,v) {
                        
                        $el.append($("<option></option>").attr("value", k).text(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v)));
                    });														
                }       
            });
            
        });
        $('#finimp').on('change select',function(event) {
            importo = $(this).val();
            tabella = $('#tab_fin').val();
            
            $.ajax({
                url:'script/getRatfin.php',
                type:"POST",
                data: {importo:importo,tabella:tabella},
                dataType: 'json',
                success: function(json) {
                    //$('#sel_colore').show();
                    $el = $("#finnra");
                    $('#det_fin').hide();
                    $el.empty(); // remove old options
                    $el.append($("<option selected ></option>").text('Seleziona n. Rate'));
                    $.each(json, function(k,v) {
                        $el.append($("<option></option>").attr("value", k).text(v));
                    });														
                }       
            });
          //  $('#fincon,#fintot').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(impvie)); 
            a= parseFloat($(this).val().replace(',','.'));
            b= parseFloat($('#tot_scon').val().replace(',','.'));
            tot = (b-a).toFixed(2);
            $('#tot_residuo').val(tot);
            pagamento();
            //pagamento();


        });
        $('#finnra').on('change select',function(event) {
            rata = $(this).val();
            tabella = $('#tab_fin').val();
            importo = $('#finimp').val();

            
            $.ajax({
                url:'script/getInfofin.php',
                type:"POST",
                data: {rata:rata,tabella:tabella,importo:importo},
                dataType: 'json',
                success: function(json) {
                    //$('#sel_colore').show();
                    //var $el = $("#finnra");
                    //$el.empty(); // remove old options
                    //$el.append($("<option selected >< /option>").text('Seleziona n. Rate'));
                    $.each(json, function(k,v) {
                        $('#id_fin').val(v.id);
                        $('#fincon,#fincon2').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.fincon));

                        $('#fintot,#fintot2').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.fintot));
                        $('#finira,#finira2').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.finira));
                        $('#fintan,#fintan2').html(v.fintan);
                        $('#fintae,#fintae2').html(v.fintae);
                        $('#finsmp,#finsmp2').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.finsmp));
                        $('#findvt,#findvt2').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.findvt));
                        $('#finmx1,#finmx12').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v.finmx1));
                        
                        $('#det_fin').show();
                       // pagamento();
                    });	
                    
                    
                }       
            });
            
        });
        $('#permuta').on('change select',function(event) {
            val = $(this).val();
            if(val == "S"){
                $('#card_permuta').show();
                $('#card_dettaglio_val').hide();
                $('#id_permuta').val("");
                $('#permuta_val').val("");
                $('#card_permuta_val').hide();
                $('#stato_stima').val("D");
            }
            else if(val=="P"){
                $('#card_permuta_val').show();
                $('#card_permuta').hide();
                $('#id_permuta').val("");
                $('#stato_stima').val("D");
            }
            else{
                $('#card_permuta').hide();
                $('#card_permuta_val').hide();
                $('#id_permuta').val("");
                $('#permuta_val').val("");
                $('#card_dettaglio_val').hide();
                $('#stato_stima').val("N");
            }
        });
        $('#permuta_val').on('change select',function(event) {
            val = $(this).val();
            if(val == ""){
                $('#card_dettaglio_val').hide();
            }
            if(val !== "") 
            {
                $('#card_dettaglio_val').show();
                id=$('#permuta_val option:selected').val();
                $('#id_permuta,#per_int_val,#per_targa_val,#per_modello_val,#per_anno_val,#per_km_val,#per_stima_val,#per_note_val').prop('readonly', true);
               $('#per_marca_val').attr('readonly','readonly');
               
                $.ajax({
                    url: "controller/updateContratto.php?action=getPermuta",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id:id
                    },
                    success: function(json) {
                        $.each(json, function(k,v) {
                            $('#id_permuta').val(v.id);
                            $('#per_int_val').val(v.intestatario);
                            $('#per_targa_val').val(v.targa);
                            $('#per_marca_val').val(v.marca);
                            $('#per_modello_val').val(v.modello);
                            $('#per_anno_val').val(v.anno);
                            $('#per_km_val').val(v.km);
                            $('#per_stima_val').val(v.stima);
                            $('#per_note_val').val(v.note);
                            
                           
                        })
                       													
                    }   
                });



            }
        });
        $('#modstima').click(function(event){
          
                id=$('#id_permuta').val();
                $('#id_permuta').removeAttr('readonly');
                $('#per_int_val').removeAttr('readonly');
                $('#per_targa_val').removeAttr('readonly');
                $('#per_marca_val').removeAttr('readonly');
                $('#per_modello_val').removeAttr('readonly');
                $('#per_anno_val').removeAttr('readonly');
                $('#per_km_val').removeAttr('readonly');
                $('#per_stima_val').removeAttr('readonly');
                $('#per_note_val').removeAttr('readonly');





        });
        $('#addpermuta').click(function(event){
          
          id_permuta=$('#id_permuta').val();
          id_contratto=$('#id_contratto').val();
          stima =$('#per_stima_val').val();
          
          $.ajax({
                    url: "controller/updateContratto.php?action=upBozza",
                    type: 'post',
                    dataType: 'json',
                    data: {
                    id_contratto:id_contratto,id_permuta:id_permuta,imp_permuta:stima
                    },
                    success: function() {
                            $('#stato_stima').val("S");
                            $('#imp_permuta').val(stima);
                            steuro =parseFloat(stima).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                            $('.per_info').html(steuro);
                            //$('#perh4,#perh5').html(steuro);
                            $("#message2").show();
                            $('#tex_msg2').html('Bozza n°'+id_contratto+' Aggiornata!')
                            $('#message2').fadeOut(4000);
                            //$('.head14').show();
                            subtotale();
                        													
                    }   
                });
         





        });

    });

</script>

<script type="text/javascript">
        function checkcli(id){
        codfisc = id;
        $("#modbutton").prop('disabled', false); 
        $.ajax({
		      url:'script/checkuser.php',
              type:"POST",
		      data: {id:codfisc},
          dataType: 'json',
          success:function(data){
          
            el = document.createElement('div');
            el.innerHTML = '<a type="button" class="btn btn-success  btn-round " href="contrattoUpdate.php?action=insert&cliId='+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Seleziona</a>'
      
                swal({
                    title:"Cliente Già Presente",
                    text: "Id "+data.id+ '\n' + "Nominativo "+data.cognome+" "+data.nome,
                    content: el,
                    icon:"info"
                    });
                $(".swal-modal").css('background-color', '#88040bd1');//Optional changes the color of the sweetalert 
                $("#modbutton").prop('disabled', true);
            }
              
            
            

          })  
	};
 	$(function(){
            CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
            $("#provres").val("<?=$cli['provres']?$cli['provres']:'RM'?>").change();
            setTimeout(()=>$("#luogores").val("<?=$cli['luogores']?$cli['luogores']:'H501'?>"), 200);
 
            CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
            $("#provnasc").val("<?=$cli['provnasc']?$cli['provnasc']:'RM'?>").change();
            setTimeout(()=>$("#luogonasc").val("<?=$cli['luogonasc']?$cli['luogonasc']:'H501'?>"), 200);
            $('#cf').click(function(ev){
                    ev.preventDefault();
                    let cf = new CodiceFiscale({
                        name : $("#nome").val(),
                        surname : $("#cognome").val(),
                        gender : $("#sesso").val(),
                        birthday : $("#datanasc").val(),
                        birthplace : $("#luogonasc").val()
                    });
                    $("#codfiscale").val(cf.toString());
                    checkcli(cf.toString());
            });

	});
   
      
   
            
        
</script>
<script>
    $(document).ready(function(){
        $('.yearpicker').yearpicker();
        document.title = 'HMR - <?=$titolo?>';
    /*! Fades in page on load */
   // $('body').css('display', 'none');
    $('#wizardbody').fadeIn(500);
    Array.from(document.getElementsByClassName("importi")).forEach(
                function(element, index, array) {
                importo=array[index].innerHTML;
                euro = parseFloat(importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                array[index].innerHTML= euro;
                }
            );
    
   
    });
</script>	
</body>
</html>    
