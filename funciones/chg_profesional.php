<?PHP
	error_reporting(E_ALL ^ E_NOTICE);
	include('conexion.php');		
	$_SESSION['sesion_ProfNom']  = '';
	$_SESSION['sesion_ProfMat']  = '0';  
?>
<script> location.replace("../user_profesional.php"); </script>
	
    
