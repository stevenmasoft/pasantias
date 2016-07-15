
   <!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Documentos - aDocument 2015</title>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>
		
           <!-- AQUI NOTIFICAIONES -->
		<script type="text/javascript" src="view/css/lib/alertify.js"></script>
		<link rel="stylesheet" href="view/css/themes/alertify.core.css" />
		<link rel="stylesheet" href="view/css/themes/alertify.default.css" />
		
		
		
		<script>

		function Ok(){
				alertify.success("Has Pulsado en Guardar"); 
				return false;
			}
			
			function Borrar(){
				alertify.success("Has Pulsado en Borrar"); 
				return false; 
			}

			function notificacion(){
				alertify.success("Has Pulsado en Editar"); 
				return false; 
			}
		</script>
		
		
		
		<!-- TERMINA NOTIFICAIONES -->
        
       <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
         
       
         <script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#Guardar").click(function() 
			{
		    	var juicios = $("#juicios").val();
		    	var id_estados_procesales_juicios = $("#id_estados_procesales_juicios").val();
		    	var detalle_documentos = $("#detalle_documentos").val();
		    	var observacion_documentos = $("#observacion_documentos").val();
		    	var avoco_vistos_documentos = $("#avoco_vistos_documentos").val();
		    	
		   				
		    	if (juicios == "")
		    	{
			    	
		    		$("#mensaje_juicio").text("Introduzca un Juicio");
		    		$("#mensaje_juicio").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_juicio").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	if (id_estados_procesales_juicios == "0")
		    	{
			    	
		    		$("#mensaje_estados_procesales").text("Introduzca un Estado");
		    		$("#mensaje_estados_procesales").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_estados_procesales").fadeOut("slow"); //Muestra mensaje de error
		            
				}

				if (detalle_documentos == "")
		    	{
			    	
		    		$("#mensaje_detalle").text("Introduzca un Detalle");
		    		$("#mensaje_detalle").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_detalle").fadeOut("slow"); //Muestra mensaje de error
		            
				}if (observacion_documentos == "")
		    	{
			    	
		    		$("#mensaje_observacion").text("Introduzca una Observacion");
		    		$("#mensaje_observacion").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_observacion").fadeOut("slow"); //Muestra mensaje de error
		            
				}if (avoco_vistos_documentos == "")
		    	{
			    	
		    		$("#mensaje_avoco").text("Introduzca un Contenido");
		    		$("#mensaje_avoco").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_avoco").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		    	

			
		    					    

			}); 


		 
				
				$( "#juicios" ).focus(function() {
					$("#mensaje_juicio").fadeOut("slow");
					});
					
					$( "#id_estados_procesales_juicios" ).focus(function() {
						$("#mensaje_estados_procesales").fadeOut("slow");
					});
						
						$( "#detalle_documentos" ).focus(function() {
							$("#mensaje_detalle").fadeOut("slow");
						});

							$( "#observacion_documentos" ).focus(function() {
								$("#mensaje_observacion").fadeOut("slow");
							});
								$( "#avoco_vistos_documentos" ).focus(function() {
									$("#mensaje_avoco").fadeOut("slow"); 			});
				
			
		
				
		
		      
				    
		}); 

	</script>
     

    </head>
    <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       
       
       <?php
       
       $sel_juicios = "";
       
       
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       
       	if(!empty($resulSet)){
       	$sel_juicios = $_POST['juicios'];
       	 }else{
       	 	
       	 }
       	 
       }
       
       $habilitar="disabled";
       
       if(!empty($resulSet)){
       	$habilitar="";
       }
       
		   
		?>
 
			  
			  <div class="container">
			  
			  <div class="row" style="background-color: #ffffff;" >
			  
			  <h4 ALIGN="center"></h4>
			<div class="" style="margin-left:50px">	
				<BR>
            	
		    <h4 style="color:#ec971f;" ALIGN="center" >EMISIÓN Y APROBACIÓN DE DOCUMENTOS</h4>
		    
            	<BR>
            	
            	<div class="col-lg-11" style=" text-aling: justify;">
            	 	<p align = "justify"><b><center><font face="univers" size=2>***Esta Leyenda será incluída automaticamente por el sistema a las Providencias para los casos de Juicios anteriores a la gestión del nuevo Liquidador***</b></font></center></p>
					<p align = "justify"><font face="univers" size=1><b>VISTOS:</b> Avoco conocimiento del presente proceso en mi calidad de Liquidador del Banco Territorial S.A. en Liquidación conforme la designación a mí extendida mediante Resolución No. SB-2016-304 emitida por el MBA. Christian Cruz Rodríguez en su calidad de Superintendente de Bancos, dada en la Superintendencia de Bancos en Quito Distrito Metropolitano con fecha 28 de abril de 2016 debidamente inscrita en el Registro Mercantil del cantón Guayaquil el 03 de mayo de 2016, cuyo desglose ordeno dejando copias certificadas en autos.- Continúen actuando los abogados Nombre Secretario y Nombre Abogado en calidad de secretario y abogado impulsor respectivamente, con los juramentos que tienen rendido en autos.-</font></p>
			  </div>
			     <br>
			     <br>
    
     
     
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("Documentos","index"); ?>" method="post" enctype="multipart/form-data">
            
         
            <div class="col-lg-6">	
         

		   		
            
          <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
            
		    
		     <?php } } else {?>
		    
			   <div class="row">
		    <div class="col-xs-4 col-md-4" style="margin-top:10px">
			  	<p  class="formulario-subtitulo" >Ciudad:</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control" disabled >
					<?php foreach($resultDatos as $res) {?>
						 <option value="<?php echo $res->id_ciudad; ?>"  ><?php echo $res->nombre_ciudad; ?> </option>
			            <?php } ?>
				</select> 
			  </div>
			 </div>
		      
		      
		       <div class="row">
		       <div class="col-xs-4 col-md-4" style="margin-top:10px">
			  <p  class="formulario-subtitulo" >Juicios:</p>
	          <input type="text" id="juicios" name="juicios" class="form-control" placeholder="Nº Juicio" value="<?php echo $sel_juicios;?>">
	        
	         <input type="hidden" id="id_juicios" name="id_juicios" value="<?php if(!empty($resulSet)){ foreach ($resulSet as $res){
	         echo 	$res->id_juicios;
	         }}?>">
		   	<div id="mensaje_juicio" class="errores"></div>	   
		    </div>
		    
		    <div class="col-xs-4 col-md-4" style="margin-top:10px">
		     <p  class="formulario-subtitulo" >Validar:</p>
			  <input type="submit" id="Validar" name="Validar" value="Validar" onClick="Ok()" class="btn btn-success"/>
			 </div>
		       </div>
		       
		      <div class="row">
		     <div class="col-xs-4 col-md-4" style="margin-top:10px">
			  	<p  class="formulario-subtitulo" >Estado Procesal:</p>
			  	 <select name="id_estados_procesales_juicios" id="id_estados_procesales_juicios"  class="form-control" <?php echo $habilitar;?>>
				<option value="0">--Seleccione--</option>
			   <?php foreach($resultEstPro as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>"  ><?php echo $res->nombre_estado_procesal_juicios; ?> </option>
			        <?php } ?>
				</select> 
				<div id="mensaje_estados_procesales" class="errores"></div>	   
			  </div>
		      </div>
		      
		      <div class="row">
		      <div class="col-xs-4 col-md-4" style="margin-top:10px">
			  <p  class="formulario-subtitulo" >Fecha de Providencia:</p>
			 <input type="text" id="fecha_emision_documentos" name="fecha_emision_documentos" value="<?php $sdate=date("d")."/".date("m")."/".date("Y"); $stime=date("h").":".date("i"); echo "$sdate";?>" class="form-control" <?php echo $habilitar;?>>
		   	   	<div id="mensaje_criterio" class="errores"></div>	   
		    </div>
		    
		     <div class="col-xs-4 col-md-4" style="margin-top:10px">
			  <p  class="formulario-subtitulo" >Hora de Providencia:</p>
	          <input type="text" id="hora_emision_documentos" name="hora_emision_documentos" class="form-control" value="<?php $sdate=date("d")."/".date("m")."/".date("Y"); $stime=date("h").":".date("i");  echo " $stime";?>" <?php echo $habilitar;?>>
		   	<div id="mensaje_criterio" class="errores"></div>	   
		    </div>
		      </div>
		      
		      
		      <div class="row">
		      <div class="col-xs-6 col-md-6" style="margin-top:10px">
			  <p  class="formulario-subtitulo" >Detalle:</p>
			  <input type="text" id="detalle_documentos" name="detalle_documentos" placeholder="Ingrese" class="form-control" <?php echo $habilitar;?>>
		   	   	<div id="mensaje_detalle" class="errores"></div>	   
		    </div>
		    </div>
		    
		    <div class="row">
		     <div class="col-xs-6 col-md-6" style="margin-top:10px">
			  <p  class="formulario-subtitulo" >Observación:</p>
	          <input type="text" id="observacion_documentos" name="observacion_documentos" class="form-control" placeholder="Ingrese" <?php echo $habilitar;?>>
		   	<div id="mensaje_observacion" class="errores"></div>	   
		    </div>
		      </div>

		    
		    <?php } ?>
		    
		     </div>
		     
         <div class="col-lg-6">
             <div class="row">
              <div class="col-xs-6 col-md-6" style="margin-top:10px">
              <p class="formulario-subtitulo" ><?php setlocale(LC_ALL,"es_ES");  echo strftime("%A %d de %B del %Y");?></p>
		      <textarea id="avoco_vistos_documentos" name="avoco_vistos_documentos" rows="8" cols="60" <?php echo $habilitar;?>>VISTOS: </textarea>
		      	<div id="mensaje_avoco" class="errores"></div>	 
		      </div>
		      </div>
        </div>
          
          
          
          <div class="row">
			  <div class="col-xs-12 col-md-5" style="text-align: center; margin-top:10px"  >
			  <input type="submit" id="Guardar" name="Guardar" onclick="this.form.action='<?php echo $helper->url("Documentos","InsertaDocumentos"); ?>'" value="Guardar" class="btn btn-success"/>
			  </div>
			   <div class="col-xs-12 col-md-5" style="text-align: center; margin-top:10px" >
			 <input type="submit" id="Visualizar" name="Visualizar" onclick="this.form.action='<?php echo $helper->url("Documentos","VisualizarDocumentos"); ?>'" value="Visualizar" class="btn btn-success"/>
			 </div>   
			  </div>    
       </form>
       <!-- termina el form --> 
       <BR>     
        
      </div>
      </div>
     
      </div>
     
   </body>  

    </html>   