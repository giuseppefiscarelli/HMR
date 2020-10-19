<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/finanziamenti.php';
$updateUrl = 'controller/updateFinanziamenti.php';
$deleteUrl = 'controller/updateFinanziamenti.php';
$pageShowUrl = 'finanziamentoPage.php';
 
require_once 'headerInclude.php';
?>
<style>
.ui-front {
    z-index: 9999999 !important;
}
.dropdown-menu {
    z-index: 9999999 !important;
}
.card .table td, .card .table th {
     padding-right:0px; 
     padding-left: 15px; 
}
</style>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

    <?php
    
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	  if(!checkAuthPage($authPage,$authThisPage)){
		
		require_once 'view/403.php' ;
		
	  }else{	  
	  
		require_once 'controller/displayFinanziamenti.php' ;
	   
	  }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
    $(function(){
            CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
            $("#provres").val("RM").change();
            setTimeout(()=>$("#luogores").val("H501"), 200);
 
            CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
            $("#provnasc").val("RM").change();
            setTimeout(()=>$("#luogonasc").val("H501"), 200);
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
                    $rat.append($("<option value=\"\" selected ></option>").text('Seleziona n. Rate'));
                    $el.append($("<option value=\"\" selected ></option>").text('Seleziona Importo'));
                    $.each(json, function(k,v) {
                        
                        $el.append($("<option></option>").attr("value", k).text(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(v)));
                    });														
                }       
            });
            
        });
        $('#en_estin').on('change select', function(event){
            stato = $(this).val();
            if (stato =='S'){
                $('.estin').show();  
                $('#imp_estin,#id_estin,#data_estin').prop("required",true);
            }else{
                $('.estin').hide();
                $('#imp_estin,#id_estin,#data_estin').removeAttr("required");
            }
        });
        $('#finimp').on('change select',function(event) {
            importo = $(this).val();
            tabella = $('#tab_fin').val();
            $('#imp_richiesto').val(importo);
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
                    $el.append($("<option value=\"\" selected ></option>").text('Seleziona n. Rate'));
                    $.each(json, function(k,v) {
                        $el.append($("<option></option>").attr("value", k).text(v));
                    });														
                }       
            });
            en_estin =  $('#en_estin').val();
            //console.log(en_estin);
            if (en_estin=="S"){
                importo = parseFloat($('#finimp').val());
                estin = parseFloat($('#imp_estin').val());
                imp_richiesto = importo-estin;
                $('#imp_richiesto').val(imp_richiesto);

            }
          //  $('#fincon,#fintot').html(Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(impvie)); 



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
                       
                       // pagamento();
                    });	
                    
                    
                }       
            });
            
        });
        $('#imp_estin').keyup(function(event){
            
            est = $(this).val();
            //chestin =Number.isNaN(est);
            if(est==''){
                est=0;
            }
            
            estin = parseFloat(est);
            importo = parseFloat($('#finimp').val());
            imp_richiesto = importo-estin;
            
            $('#imp_richiesto').val(imp_richiesto);
        });
        $('#id_contratto').on('change select',function(event){
            $('#imp_saldo_contr').hide();
            id_contratto = $(this).val();
            if (id_contratto>0){
                $('#imp_saldo_contr').show();
            }
            //console.log(id_contratto);
            $.ajax({
                url:'controller/updateContratto.php?action=getcontr',
                type:"POST",
                data: {id:id_contratto},
                dataType: 'json',
                success: function(json) {
                    importo=json.imp_saldo;
                    chimp = Number.isNaN(importo);
                    console.log(importo);
                    console.log(chimp);
                    euro = parseFloat(importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                    console.log(euro);
                    $('#imp_contratto').val(euro);
                                       
                    
                }       
            });

        });
        $( "#id_cliente" ).autocomplete({
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
                $('#btnAddCli').html('<i class="fa fa-refresh"></i> modifica dati Cliente').button("refresh");
                $("#id_cliente" ).val(ui.item.codfiscale);
                $('#id_cliente').prop('readonly', true);
                $('#btnModCli').show();
                $('#id_cli').val(ui.item.id);
                $('#cliaction').val("storeClienteFin");
                $("#climodaltitle").html( "Modifica Dati Cliente" );
                $("#btncli").html('<i class="fa fa-refresh"></i> Aggiorna dati Cliente').button("refresh");
                $("#ragsociale").val(ui.item.ragsociale);
                $("#cognome").val(ui.item.cognome);
                $("#nome").val(ui.item.nome);
                CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
                $("#provnasc").val(ui.item.provnasc).change();
                setTimeout(()=>$("#luogonasc").val(ui.item.luogonasc), 200);
                $("#datanasc").val(ui.item.datanasc);
                $("#sesso").val(ui.item.sesso);
                $("#codfiscale").val(ui.item.codfiscale);
                $("#partitaiva").val(ui.item.partitaiva);
                $("#indirizzores").val(ui.item.indirizzores);
                CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
                $("#provres").val(ui.item.provres).change();
                setTimeout(()=>$("#luogores").val(ui.item.luogores), 200);
                $("#capres").val(ui.item.capres);
                $("#mail1").val(ui.item.mail1);
                $("#mail2").val(ui.item.mail2);
                $("#tel1").val(ui.item.tel1);
                $("#tel2").val(ui.item.tel2);
                $("#mobile1").val(ui.item.mobile1);
                $("#mobile2").val(ui.item.mobile2);
                getcontr(ui.item.codfiscale);    
               
                
            return false;
            }

        });
        function newcli(){
            $('#btnAddCli').html('<i class="fa fa-plus"></i> Nuovo Cliente').button("refresh");
            $("#id_cliente" ).val("");
            $('#id_cliente').prop('readonly', false);
            $('#btnModCli').hide();
            $('#id_cli').val("");
            $('#cliaction').val("saveClienteFin");
            $("#climodaltitle").html( "Inserimento Nuovo Cliente" );
            $("#btncli").html('<i class="fa fa-plus"></i> Inserimento nuovo Cliente').button("refresh");
            document.getElementById("addformcli").reset();


        }
        $( "#search1" ).autocomplete({
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
               
                $( "#search1" ).val(ui.item.codfiscale);
                document.forms.searchForm.submit();
                
            return false;
            }

        });
        $('#climodal').on('shown.bs.modal', function() { 
            $("#addmodal").css("z-index", "auto");
            //document.getElementById("addformcli").reset();
            //alert('shown');
        });
        $('#climodal').on('hidden.bs.modal', function() { 
            $("#addmodal").css("z-index", "");
            //alert('shown');
        });
        
        $(document).ready(function(){
            Array.from(document.getElementsByClassName("importi")).forEach(
                function(element, index, array) {
                importo=array[index].innerHTML;
                euro = parseFloat(importo).toLocaleString('it-IT', {style: 'currency', currency: 'EUR'});
                array[index].innerHTML= euro;
                }
            );
        
        });
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
                el.innerHTML = '<button type="button" class="btn btn-success  btn-round " onclick="modevent(\''+data.codfiscale+'\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Seleziona</button>'
        
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
        function getcontr(cf){
            codfisc = cf;
            //$("#modbutton").prop('disabled', false); 
            $.ajax({
                url:'controller/updateContratto.php?action=getcontr',
                type:"POST",
                data: {id_cliente:codfisc},
            dataType: 'json',
            success:function(data){
            
              // console.log(data);
                //$('#sel_colore').show();
                var $el = $("#id_contratto");
                    $el.empty(); // remove old options
                    $el.append($("<option value=\"\" selected ></option>").text('Seleziona n. Contratto/Preventivo'));
                    $el.append($("<option value=\"N\" ></option>").text('Nessun Contratto-Solo Pratica'));
                    $.each(data, function(k,v) {
                        //console.log(k);
                       // console.log(v.id);
                        d = new Date(v.data_ins);
                        anno = d.getFullYear();
                        mese = d.getMonth()+1;
                        mese= mese < 10 ? '0' + mese : '' + mese;
                        giorno =  d.getDate();
                        if(v.tipo =="B"){
                            tipo = "Bozza";
                            $el.append($("<option></option>").attr("value", v.id).text(tipo+' n. '+v.id+' del '+giorno+'/'+mese+'/'+anno));
                            }
                        if(v.tipo =="P"){
                            tipo = "Preventivo";
                            $el.append($("<option></option>").attr("value", v.id).text(tipo+' n. '+v.num_cont+' del '+giorno+'/'+mese+'/'+anno));
                            }
                        if(v.tipo =="C"){
                            tipo ="Contratto";
                            $el.append($("<option></option>").attr("value", v.id).text(tipo+' n. '+v.num_cont+' del '+giorno+'/'+mese+'/'+anno));

                            }
                        
                    });		
                }
            }) 
        }
      $("#addformcli").submit(function(e) {
            e.preventDefault();
            addcliente();
            cf = $('#codfiscale').val();
            $("#climodal").modal('hide');
            $("#addmodal").css("z-index", "");
            $("#id_cliente").val(cf);
            document.getElementById("addformcli").reset();
      });
      function addcliente(){
        $("#addformcli").serialize() // returns all the data in your form
            $.ajax({
                type:"POST",
                url: 'controller/updateAnagr_cli.php?action=saveClienteFin',
                dataType : 'json',
                data: $("#addformcli").serialize(),
                success: function(e) {
                    console.log(e);
                    $("#message2").show();
                            $('#tex_msg2').html('Nuovo Cliente Inserito!');
                           
                            $('#message2').fadeOut(4000);
                }
            });


      }
      function modevent(cf){
        swal.close();
        $("#climodal").modal('hide');
        $("#addmodal").css("z-index", "");
        $("#id_cliente").val(cf);


      };
    
</script>


    </body>
</html>    