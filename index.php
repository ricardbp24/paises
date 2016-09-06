<!DOCTYPE html>
<html>
<head>
	<title>Paises www.riberdesigns.es</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js" ></script>
	<?php
	//Class conexión, pais y el zebra pagination
	require_once 'conexion.php';
	require_once 'classPais.php';
	require_once 'Zebra_Pagination.php';
	?>
</head>
<body>
	<div class="container">
		<table class="table table-condensed">
		
			<thead>
				<tr>
					<th>Código</th>
					<th>Pais</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//Class Pais
				$pais = new Pais();
				//Url de el json de pais
				$url=json_decode($pais->mostrar_pais(),true);
				//Contar el registro de valores
				$total_registro=count($url);
				//Resultado de fila i el limite de filas
                $resultado = 10;
              	$limite=10;

              	//Class Zebra Todas las funciones de Zebra
              	$paginacion = new Zebra_Pagination();
              	$paginacion->records($total_registro);
              	$paginacion->records_per_page($resultado);

              	//Formula para la paginación

              	$url2=(($paginacion->get_page()-1)*$resultado);
              	//Llenar otra vez el array
              	$array=array_slice($url, $url2,$limite);
              	//Recorrer todo el bucle de paises
				foreach ($array as $key => $valor) {
				?>
				<tr>
					<td><?php echo $valor['Codigo']; ?></td>
					<td><?php echo $valor['Pais']; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
				<?php 
				//Paginación imprime y fin del tutorial!!!
                $paginacion->render();
                ?>
	</div>
	<footer>
		<center><a  href="http://www.riberdesigns.es" "email me">Riber Designs 2016</a> | <a  href="https://www.youtube.com/user/tribersounds" "email me">Suscribirse Riber Designs Youtube</a></center>
	</footer>
</body>
</html>