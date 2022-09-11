<?PHP
	error_reporting(E_ALL ^ E_NOTICE);
	include('conexion.php');
	$query="SELECT
	practicas_main.*,
	instituciones.nombre as inom,
	obras_sociales.nombre as onom,
	coseguros.nombre as cnom	
	FROM practicas_main,obras_sociales,instituciones,coseguros
	WHERE (practicas_main.matricula = '$_SESSION[sesion_ProfMat]' 
	AND practicas_main.periodo_a = '$_SESSION[sesion_PeridoA]' AND practicas_main.periodo_m = '$_SESSION[sesion_PeridoM]')
	AND practicas_main.institucion=instituciones.id
	AND practicas_main.os=obras_sociales.id
	AND practicas_main.cos=coseguros.id
	AND practicas_main.baja_usu = '' ";
	$result = mysqli_query($conexion, $query);	
?>