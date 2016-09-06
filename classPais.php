<?php
class Pais {

	public function mostrar_pais(){
		//Iniciar conexión
		$bd= new connexio();
		//Sql
		$result=$bd->query("SELECT * FROM paises ORDER BY Pais DESC");
		//Array
		$pais=array();
		//Bucle para rellenar la array
		while ($row = $result->fetch_object()) {
			$pais[]=array("Codigo"=>$row->Codigo,"Pais"=>utf8_decode($row->Pais));
		}
		//Imprimir el array pais en un json
		$imprime= json_encode($pais);
		// Retorno de json
		return $imprime;
		//Cerrar base de datos y sql
		$bd->cerrarconexion($bd,$result);

	}

}