<?php
	function hacerListado($consulta)
	{
		$servidor = "localhost";
		$usuario = "root";
		$contrasena = "";
		$baseDeDatos = "beseries";

		$enlace = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

		if (mysqli_connect_errno()) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		mysqli_set_charset($enlace, 'utf8');

		$resultado = mysqli_query($enlace, $consulta);
		$listado = [];

		if ($resultado)
		{
			while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
			{
				$listado[] = $fila;
			}
		}

		mysqli_free_result($resultado);
		mysqli_close($enlace);
		return $listado;
	}

	function ejecutarConsulta($consulta)
	{
		$servidor = "localhost";
		$usuario = "root";
		$contrasena = "";
		$baseDeDatos = "beseries";

		$enlace = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

		if (mysqli_connect_errno()) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		mysqli_set_charset($enlace, 'utf8');

		$resultado = mysqli_query($enlace, $consulta);
		mysqli_close($enlace);
		return $resultado;
	}

	function consultaInsert($datos, $tabla) {
		$indices = array_keys($datos);
		$valores = array_values($datos);

		$consulta = "INSERT INTO $tabla (" . implode(", ", $indices) . ") VALUES ('" . implode("', '", $valores) . "')";
		return $consulta;
	}

	function consultaUpdate($datos, $tabla, $id) {

		$consulta = "UPDATE $tabla SET ";
		$parametros = [];

		foreach($datos as $indice => $valor){
			$parametros[] .= "$indice = '$valor'";
		}

		$consulta .= implode(", ", $parametros);
		$consulta .= " WHERE id='" . $id . "'";

		return $consulta;
	}

	function mostrarArray($datos)
	{
		echo "<pre>";
		print_r($datos);
		echo "</pre>";
	}

	function cifrarContrasena($contrasena) {
		return sha1($contrasena);

	}
?>
