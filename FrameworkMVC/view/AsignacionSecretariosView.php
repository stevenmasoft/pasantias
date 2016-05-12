<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Permisos Rol - coactiva 2016</title>
   
  
		
      <script>
        
       $(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#id_controladores").change(function() {

               // obtenemos el combo de subcategorias
                var $id_acciones = $("#id_acciones");
               // lo vaciamos
               
				///obtengo el id seleccionado
				

               var id_controladores = $(this).val();


               $id_acciones.empty();

               $id_acciones.append("<option value= " +"0" +" > --TODOS--</option>");
           
               if(id_controladores > 0)
               {
            	   var datos = {
            			   id_controladores : $(this).val()
                   };


            	   $.post("<?php echo $helper->url("PermisosRoles","devuelveAcciones"); ?>", datos, function(resultAcc) {

            		 		$.each(resultAcc, function(index, value) {
               		 	    $id_acciones.append("<option value= " +value.id_acciones +" >" + value.nombre_acciones  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	   $.post("<?php echo $helper->url("PermisosRoles","devuelveAllAcciones"); ?>", datos, function(resultAcc) {

   		 		        $.each(resultAcc, function(index, value) {
          		 	    $id_acciones.append("<option value= " +value.id_acciones +" >" + value.nombre_acciones  + "</option>");	
                	  });
     		  		}, 'json');

               }
               
		    });
    
		}); 

	</script>
		
	<script>

		$(document).ready(function(){

			$("#id_acciones").change(function() {

	               // obtenemos el combo de categorias
	                var $id_controladores = $("#id_controladores");
	               
					///obtengo el id seleccionado
					var id_acciones = $(this).val();

	               if(id_acciones > 0)

	               {
	            	   var datos = {
	            			   id_acciones : $(this).val()
	                   };


	            	   //$categorias.append("<option value= " +"0" +" >"+ id_subcategorias  +"</option>");
	                   $.post("<?php echo $helper->url("PermisosRoles","devuelveSubByAcciones"); ?>", datos, function(resultAcc) {
	            		   
         		 		  $.each(resultAcc, function(index, value) {
         		 			$('#id_controladores').val( value.id_controladores );//To select Blue	 
 								
							 });

         		 		 	 		   
         		  		}, 'json');
	                   
	               }
	               else
	               {

	          		 $('#controladres').val( 0 );//To select Blue

			        }
	               
	               
			    });
		}); 

	</script>
       
       
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
    </head>
    <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/head.php"); ?>
       
       <?php include("view/modulos/menu.php"); ?>
  
   <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
  <div></div>
       
      <form action="<?php echo $helper->url("PermisosRoles","InsertaPermisosRoles"); ?>" method="post" class="col-lg-4">
            <h4 style="color:#ec971f;">Insertar Asignacion Secretarios</h4>
            <hr/>
            	
		   		
            
             <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	            	
	            	
	            	
	            	Nombre Secretario: <select name="id_rol" id="id_rol"  class="form-control">
									<?php foreach($resultRol as $resRol) {?>
				 						<option value="<?php echo $resRol->id_rol; ?>" <?php if ($resRol->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $resRol->nombre_rol; ?> </option>
						            <?php } ?>
								    	
									</select>
		   		   
	            	 Nombre Abogado Impulsor: <select name="id_controladores" id="id_controladores"  class="form-control">
									<?php foreach($resultCon as $resCon) {?>
				 						<option value="<?php echo $resCon->id_controladores; ?>" <?php if ($resCon->id_controladores == $resEdit->id_controladores )  echo  ' selected="selected" '  ;  ?> ><?php echo $resCon->nombre_controladores; ?> </option>
						            <?php } ?>
								    	
									</select>
		   		   
		   		   <table class="table">
		   		   	<tr>
		   		   		<th style="width: 33.3%" > Ver</th>
		   		   		<th style="width: 33.3%"> Editar</th>
		   		   		<th style="width: 33.3%"> Borrar</th>
		   		   	</tr>
		   		   	<tr>
					  <td> 
		   		   		<select name="ver_permisos_rol" id="ver_permisos_rol"  class="form-control">
										<option value="TRUE"  <?php  if ( $resEdit->ver_permisos_rol =='t')  echo ' selected="selected" ' ; ?> >Permitir </option>
						            	<option value="FALSE" <?php  if ( $resEdit->ver_permisos_rol =='f')  echo ' selected="selected" ' ; ?> >Denegar </option>
					    </select>
		   		   		</td>
		   		   		<td> 
		   		   		<select name="editar_permisos_rol" id="editat_permisos_rol"  class="form-control">
										<option value="TRUE"  <?php  if ( $resEdit->editar_permisos_rol =='t')  echo ' selected="selected" ' ; ?>>Permitir </option>
						            	<option value="FALSE" <?php  if ( $resEdit->editar_permisos_rol =='f')  echo ' selected="selected" ' ; ?>  >Denegar </option>
					    </select>
					    </td>
		   		   		<td>
		   		   		<select name="borrar_permisos_rol" id="borrar_permisos_rol"  class="form-control">
										<option value="TRUE"  <?php  if ( $resEdit->borrar_permisos_rol =='t')  echo ' selected="selected" ' ; ?> >Permitir </option>
						            	<option value="FALSE" <?php  if ( $resEdit->borrar_permisos_rol =='f')  echo ' selected="selected" ' ; ?>  >Denegar </option>
					    </select>
		   		   		</td>
		   		
		   		   	</tr>
		   		   </table>
		   		   
		   		   <hr>
		    
		     <?php } } else {?>
		    
	            	
	            	Nombre Secretario: <select name="nombre_secretario" id="nombre_secretario"  class="form-control">
									<?php foreach($resultUsuarioSecretario as $resSecretario) {?>
				 						<option value="<?php echo $resSecretario->id_usuarios; ?>" ><?php echo $resSecretario->nombre_usuarios; ?> </option>
						            <?php } ?>
								    	
									</select>
		   		   
	            	 Nombre Abogado Impulsor: <select name="nombre_impulsor" id="nombre_impulsor"  class="form-control">
									<?php foreach($resultUsuarioImpulsor as $resImpulsor) {?>
				 						<option value="<?php echo $resImpulsor->id_usuarios; ?>"  ><?php echo $resImpulsor->nombre_usuarios; ?> </option>
						            <?php } ?>
								    	
									</select>
		   		   
		    	   <table class="table">
		   		   	<tr>
		   		   		<th style="width: 33.3%"> Ver</th>
		   		   		<th style="width: 33.3%"> Editar</th>
		   		   		<th style="width: 33.3%"> Borrar</th>
		   		   	</tr>
		   		   	<tr>
		   		   		<td> 
		   		   		<select name="ver_permisos_rol" id="ver_permisos_rol"  class="form-control">
										<option value="TRUE"  >Permitir </option>
						            	<option value="FALSE"  >Denegar </option>
					    </select>
		   		   		</td>
		   		   		<td> 
		   		   		<select name="editar_permisos_rol" id="editat_permisos_rol"  class="form-control">
										<option value="TRUE"  >Permitir </option>
						            	<option value="FALSE"  >Denegar </option>
					    </select>
					    </td>
		   		   		<td>
		   		   		<select name="borrar_permisos_rol" id="borrar_permisos_rol"  class="form-control">
										<option value="TRUE"  >Permitir </option>
						            	<option value="FALSE"  >Denegar </option>
					    </select>
		   		   		</td>
		   		   	</tr>
		   		   </table>
		        <hr>
		     <?php } ?>
		        
		        <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
           <input type="submit" value="Guardar" class="btn btn-success"/>
           </div>
           </div>
          </form>
       
       
        <div class="col-lg-8">
            <h4 style="color:#ec971f;">Asignacion Secretarios</h4>
           
        </div>
        <section class="col-lg-8 usuario" style="height:400px;overflow-y:scroll; margin-top: 10px;">
        <table class="table table-hover">
	         <tr>
	    		<th style="color:#456789;font-size:80%;">Id</th>
	    		<th style="color:#456789;font-size:80%;">Nombre Permisos Rol</th>
	    		<th style="color:#456789;font-size:80%;">Nombre Rol</th>
	    		<th style="color:#456789;font-size:80%;">Nombre Controlador</th>
	    		<th style="color:#456789;font-size:80%;">Ver</th>
	    		<th style="color:#456789;font-size:80%;">Editar</th>
	    		<th style="color:#456789;font-size:80%;">Borrar</th>
	    		<th></th>
	    		<th></th>
	  		</tr>
            
	            <?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
	        		<tr>
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->id_permisos_rol; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_permisos_rol; ?>     </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_rol; ?>     </td> 
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_controladores; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->ver_permisos_rol; ?>     </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->editar_permisos_rol; ?>     </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->borrar_permisos_rol; ?>     </td>
		           	   <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("PermisosRoles","index"); ?>&id_permisos_rol=<?php echo $res->id_permisos_rol; ?>" class="btn btn-warning" style="font-size:65%;">Editar</a>
			                </div>
			            
			             </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("PermisosRoles","borrarId"); ?>&id_permisos_rol=<?php echo $res->id_permisos_rol; ?>" class="btn btn-danger" style="font-size:65%;">Borrar</a>
			                </div>
			                <hr/>
		               </td>
		    		</tr>
		        <?php } } ?>
            
            <?php 
            
            //echo "<script type='text/javascript'> alert('Hola')  ;</script>";
            
            ?>
            
       	</table>     
      </section>
      </div>
      </div>
       
     </body>  
    </html>   