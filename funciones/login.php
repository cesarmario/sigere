<?PHP 
	session_start();
	error_reporting(E_ALL);
	include('conexion.php');
	//$_SESSION['sesion_PeridoM'] = date("m");
	//$_SESSION['sesion_PeridoA'] = date("Y");
	$query = "SELECT * FROM usuarios WHERE usuario = '$_REQUEST[usu]' AND pass = md5('$_REQUEST[pass]')";
	$result = mysqli_query($conexion, $query);
	if (mysqli_num_rows($result)>0){
		echo "Iniciando de session... <br>";
		$row = mysqli_fetch_assoc($result);
		$_SESSION['sesion_UserId']  = $row['usuario'];
		$_SESSION['sesion_UserNom'] = $row['nombre'];
		$_SESSION['sesion_UserAdm'] = $row['admin'];
		$_SESSION['sesion_ProfMat'] = $row['matricula']; // (variables de sesion) ?>

		<script> location.replace("../user_profesional.php"); </script>
	<?PHP }else{
			echo "NO se ha podido iniciar sesion... <br>"; 
			//echo "<br>Usuario: " . $_REQUEST['usu'];
			//echo "<br>Contraseña: " . md5($_REQUEST['pass']); 
			//echo $query;?> 
			<script> 
				alert("NO se ha podido iniciar sesion\nVuelva a intentarlo");
				//location.replace("../user_profesional.php");
				location.replace("../login.php");
			</script> 
	<?PHP } ?>
