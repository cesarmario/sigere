<?PHP
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('conexion.php'); 
$matricula = $_POST['matricula'];
$query = "SELECT * FROM profesionales WHERE profesionales.matricula = '$matricula' order by id asc limit 1 ";
$result = mysqli_query($conexion, $query);
if (mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	$_SESSION['sesion_ProfNom']  = $row['nombre'];
	$_SESSION['sesion_ProfMat']  = $row['matricula'];  // (variables de sesion) ?>
<script> location.replace("../index.php"); </script>

<?PHP } else { 	
// redirecciono	a pantalla de login ?> 
	<script> location.replace("../login.php"); </script>	
<?PHP }	?>