<script>
function envio(){
document.formu.submit()
}
</script>

<?php
	error_reporting (0) ;
	/*error_reporting(E_ALL ^ E_NOTICE)*/;
	include('conexion.php');
?>	

<?PHP 
	
	session_start();		
	$_SESSION['sesion_ProfNom']  = '';
	$_SESSION['sesion_ProfMat']  = '0';  // (variables de sesion)
?>

<script> location.replace("../user_profesional.php"); </script>
	
    
