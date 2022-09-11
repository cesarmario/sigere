<script>
function envio(){
document.formu.submit()
}
</script>

<?php
	/*error_reporting (0) ;*/
	error_reporting(E_ALL ^ E_NOTICE);
	include('conexion.php');
?>	

<?PHP
	if (isset($_GET[bcodigo])){$bcodigo=$_GET[bcodigo];}else{$bcodigo="";};
	if (isset($_GET[bnombre])){$bnombre=$_GET[bnombre];}else{$bnombre="";};
	if (isset($_GET[bcomple])){$bcomple=$_GET[bcomple];}else{$bcomple="";}; 
	
	if ($bcodigo=="" and $bnombre=="" and $bcomple==""){
	$query="SELECT * FROM nomenclador WHERE complejidad > 0 AND baja = 0 limit 30";
	//$query="SELECT * FROM nomenclador WHERE codigo = '' ";
	$result = mysqli_query($conexion, $query);
	} else { 
	
		if ($bcodigo!=""){
		$query="SELECT * FROM nomenclador WHERE codigo LIKE '%$bcodigo%' AND complejidad > 0 AND baja = 0";
		$result = mysqli_query($conexion, $query);
		}
		
		if ($bnombre!=""){
		$query="SELECT * FROM nomenclador WHERE nombre LIKE '%$bnombre%' AND complejidad > 0 AND baja = 0";
		$result = mysqli_query($conexion, $query);
		}
		
		if ($bcomple!=""){
		$query="SELECT * FROM nomenclador WHERE complejidad = '$bcomple' AND baja = 0";
		$result = mysqli_query($conexion, $query);
		}
    
	
	} ?>