<?PHP
error_reporting(E_ALL ^ E_NOTICE);
include('conexion.php');
/*	$query="SELECT
	practicas_main.*,
	instituciones.nombre as inom,
	obras_sociales.nombre as onom,
	coseguros.nombre as cnom	
	FROM practicas_main,obras_sociales,instituciones,coseguros
	WHERE practicas_main.matricula = '$_SESSION[sesion_ProfMat]' 
	AND practicas_main.institucion=instituciones.id
	AND practicas_main.os=obras_sociales.id
	AND practicas_main.cos=coseguros.id"; */
	if (isset($_REQUEST['anio'])) { $anio = $_REQUEST['anio'];}else{ $anio = date("Y");} 
	$query="SELECT * FROM practicas_view WHERE matricula = '$_SESSION[sesion_ProfMat]' AND periodo_a = $anio";
	$result = mysqli_query($conexion, $query);
?>