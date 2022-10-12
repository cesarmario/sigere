<?PHP
	include('conexion.php');
	
if ($_GET['fn']=='periodo_s'){ //Funcion Seleccionar Periodo
	/*echo "USER: " . $_POST[usu] . "<br>";
	echo "PASS:" . $_POST[pass]. "<br>"*/;
	$periodo_a = $_REQUEST['periodo_a'];
	$periodo_m = $_REQUEST['periodo_m'];
	$query="SELECT * FROM periodos WHERE periodos.periodo_a = '$periodo_a' AND periodos.periodo_m = '$periodo_m' limit 1 ";
	$result = mysqli_query($conexion, $query);
	if ($row = mysqli_fetch_assoc($result)){			
		$_SESSION['sesion_PeridoA']  = $row['periodo_a'];
		$_SESSION['sesion_PeridoM']  = $row['periodo_m']; ?>
		<script> location.replace("../periodos.php"); </script>
	<?PHP }else{ ?> 
    ERROR EN LA CONSULTA
		<script> // location.replace("../index_main.php"); </script>	
<?PHP }   
} ?>
	
<?PHP
if ($_GET['fn']=='periodo_a'){ //Funcion Editar Institucion
	$periodo_a = $_REQUEST['periodo_a'];
	$periodo_m = $_REQUEST['periodo_m'];
	if (isset($_REQUEST['baja'])){$baja=1;}else{$baja=0;};
	$query="INSERT INTO periodos (`periodo_a`,`periodo_m`)VALUES('$periodo_a','$periodo_m')";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Se agrego correctamente el Periodo");
			location.replace("../periodos.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../periodos.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_GET['fn']=='periodo_b'){ //Funcion Baja practicas_detalle
	$periodo_a = $_REQUEST['periodo_a'];
	$periodo_m = $_REQUEST['periodo_m'];
	$query="UPDATE periodos SET baja = '1' WHERE periodo_a = '$periodo_a' AND periodo_m = '$periodo_m'";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Se Elimino correctamente el Periodo");
			location.replace("../periodos.php");
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../periodos.php');" class="button"/>
	<?PHP }; ?>

<?PHP } ?>