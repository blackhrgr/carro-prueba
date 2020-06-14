<?php 
session_start();
$_SESSION['detalle'] = array();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Agregar Compras</title>

    <link rel="icon" type="image/png" href="imagenes/icono.png" />
    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/jquery-1.8.3.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
   	
    <script type="text/javascript" src="libs/ajax.js"></script>

    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>


<style>
	


body{

background-image: url(imagenes/fondo.jpg);
background-size: 100%;

}

.contenedor{

width: 92%;
background-color: #D5D5D5;
margin-top: 70px;

margin-left: 4%;
margin-right: 4%;



}

</style>

  <body>
  	<div class="contenedor">
 	<div class="container">
 		
 		<div class="page-header">
			<h1><center>AGREGADOR DE COMPRAS ONLINE</center></h1>
		</div>
 		<div class="row">
 			<center>
			<div class="col-md-6">	
				<div>Nombre del Producto: <input id="txt_producto" name="txt_producto" type="text" class="col-md-2 form-control" placeholder="Ingresar Producto.." autocomplete="off" />
				</div>
			</div>
			<div class="col-md-2">
				<div>Cantidad:
				  <input id="txt_cantidad" name="txt_cantidad" type="text" class="col-md-2 form-control" placeholder="Ingrese cantidad" autocomplete="off" />
				</div>
			</div>
			<div class="col-md-4">
				<div style="margin-top: 19px;">
				<button type="button" class="btn btn-danger btn-agregar-producto">Agregar producto</button>
				<a href="QR.php"><button type="button" class="btn btn-danger btn-agregar-producto">Codigo QR</button></a>
				</div>
			</div>
		</center>
		</div>
		
		<br>
		<div class="panel panel-danger">
			 <div class="panel-heading">
		        <h3 class="panel-title">Productos</h3>
		      </div>
			<div class="panel-body detalle-producto">
				<?php if(count($_SESSION['detalle'])>0){?>
					<table class="table">
					    <thead>
					        <tr>
					            <th>Descripci&oacute;n</th>
					            <th>Cantidad</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($_SESSION['detalle'] as $k => $detalle){ 
					    	?>
					        <tr>
					        	<td><?php echo $detalle['producto'];?></td>
					            <td><?php echo $detalle['cantidad'];?></td>
					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{?>
				<div class="panel-body"> No hay productos agregados</div>
				<?php }?>
			</div>
		</div>
 	</div>
 </div>
  </body>
</html>
