<?PHP 
session_start();
error_reporting (0); 
include('conexion.php'); 


$periodo = $_GET[periodo_a] . str_pad($_GET[periodo_a], 2, "0", STR_PAD_LEFT);



if ($_GET[idbkp]=='1'){
$query="SELECT * FROM practicas_main WHERE 
practicas_main.periodo_a = '$_GET[periodo_a]' AND 
practicas_main.periodo_m = '$_GET[periodo_m]'";
$result = mysqli_query($conexion, $query);

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=practicas_main_".$periodo.".xls");
header("Pragma: no-cache");
header("Expires: 0");
	echo "<table border=1>";
	/*<Cabecera>*/
	echo "<tr> ";
	echo "<th>id</th>";
	echo "<th>matricula</th>";
	echo "<th>periodo_a</th>";
	echo "<th>periodo_m</th>";
	echo "<th>id_bono</th>";
	echo "<th>fecha</th>";
	echo "<th>dni</th>";
	echo "<th>paciente</th>";
	echo "<th>institucion</th>";
	echo "<th>os</th>";
	echo "<th>cos</th>";
	echo "<th>rec_mas65</th>";
	echo "<th>rec_men3</th>";
	echo "<th>rec_urg</th>";
	echo "<th>rec_fds</th>";
	echo "<th>rec_fer</th>";
	echo "<th>rec_noc</th>";
	echo "<th>observ</th>";
	echo "<th>liquidacion_nro</th>";
	echo "<th>liquidacion_imp</th>";
	echo "<th>liquidacion_fec</th>";
	echo "<th>liquidacion_obs</th>";
	echo "<th>alta_fec</th>";
	echo "<th>alta_usu</th>";
	echo "<th>baja_fec</th>";
	echo "<th>baja_usu</th>";
	echo "<th>mod_fec</th>";
	echo "<th>mod_usu</th>";
	echo "</tr> ";
	/*</Cabecera>*/	
	while($exp=mysqli_fetch_assoc($result)){
	/*</Datos>*/
	echo "<tr>";
	echo "<td>".$exp['id']."</td>";
	echo "<td>".$exp['matricula']."</td>";
	echo "<td>".$exp['periodo_a']."</td>";
	echo "<td>".$exp['periodo_m']."</td>";
	echo "<td>".$exp['id_bono']."</td>";
	echo "<td>".$exp['fecha']."</td>";
	echo "<td>".$exp['dni']."</td>";
	echo "<td>".$exp['paciente']."</td>";
	echo "<td>".$exp['institucion']."</td>";
	echo "<td>".$exp['os']."</td>";
	echo "<td>".$exp['cos']."</td>";
	echo "<td>".$exp['rec_mas65']."</td>";
	echo "<td>".$exp['rec_men3']."</td>";
	echo "<td>".$exp['rec_urg']."</td>";
	echo "<td>".$exp['rec_fds']."</td>";
	echo "<td>".$exp['rec_fer']."</td>";
	echo "<td>".$exp['rec_noc']."</td>";
	echo "<td>".$exp['observ']."</td>";
	echo "<td>".$exp['liquidacion_nro']."</td>";
	echo "<td>".$exp['liquidacion_imp']."</td>";
	echo "<td>".$exp['liquidacion_fec']."</td>";
	echo "<td>".$exp['liquidacion_obs']."</td>";
	echo "<td>".$exp['alta_fec']."</td>";
	echo "<td>".$exp['alta_usu']."</td>";
	echo "<td>".$exp['baja_fec']."</td>";
	echo "<td>".$exp['baja_usu']."</td>";
	echo "<td>".$exp['mod_fec']."</td>";
	echo "<td>".$exp['mod_usu']."</td>";
	echo "</tr>";
	/*</Datos>*/
	}	
	echo "</table>";
}

if ($_GET[idbkp]=='2'){
	/*Exportamos la tabla detalle*/	
	$query2="SELECT
	practicas_detalle.*
	FROM practicas_main,practicas_detalle
	WHERE practicas_main.periodo_a = '$_GET[periodo_a]' AND practicas_main.periodo_m = '$_GET[periodo_m]' 
	AND practicas_main.id_bono = practicas_detalle.fk_id_bono";
	
	$result2 = mysqli_query($conexion, $query2);

	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=practicas_detalle_".$periodo.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
		echo "<table border=1>";
		/*<Cabecera>*/
		echo "<th>id</th>";
		echo "<th>matricula</th>";
		echo "<th>fk_id_bono</th>";
		echo "<th>codigo</th>";
		echo "<th>porcentaje</th>";
		echo "<th>alta_fec</th>";
		echo "<th>alta_usu</th>";
		echo "<th>baja_fec</th>";
		echo "<th>baja_usu</th>";
		echo "<th>mod_fec</th>";
		echo "<th>mod_usu</th>";
		/*</Cabecera>*/	
		while($exp2=mysqli_fetch_assoc($result2)){
		/*</Datos>*/
		echo "<tr>";
		echo "<td>".$exp2['id']."</td>";
		echo "<td>".$exp2['matricula']."</td>";
		echo "<td>".$exp2['fk_id_bono']."</td>";
		echo "<td>".$exp2['codigo']."</td>";
		echo "<td>".$exp2['porcentaje']."</td>";
		echo "<td>".$exp2['alta_fec']."</td>";
		echo "<td>".$exp2['alta_usu']."</td>";
		echo "<td>".$exp2['baja_fec']."</td>";
		echo "<td>".$exp2['baja_usu']."</td>";
		echo "<td>".$exp2['mod_fec']."</td>";
		echo "<td>".$exp2['mod_usu']."</td>";
		echo "</tr>";
		/*</Datos>*/
		}	
		echo "</table>";
}		
	
?>