<?PHP
	/*error_reporting (0) ;*/
	error_reporting(E_ALL ^ E_NOTICE);
	include('conexion.php');

	if (isset($_REQUEST['bcodigo'])){$bcodigo=$_REQUEST['bcodigo'];}else{$bcodigo="";};
	if (isset($_REQUEST['bnombre'])){$bnombre=$_REQUEST['bnombre]';}else{$bnombre="";};
	if (isset($_REQUEST['bcomple'])){$bcomple=$_REQUEST['bcomple'];}else{$bcomple="";}; 
	
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