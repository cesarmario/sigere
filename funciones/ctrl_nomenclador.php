<?PHP include('conexion.php');
$query="SELECT * FROM nomenclador WHERE complejidad > 0 AND baja = 0 limit 30";
$result = mysqli_query($conexion, $query); 

//	if (isset($_REQUEST['bcodigo'])){$bcodigo=$_REQUEST['bcodigo'];}else{$bcodigo="";};
//	if (isset($_REQUEST['bnombre'])){$bnombre=$_REQUEST['bnombre]';}else{$bnombre="";};
//	if (isset($_REQUEST['bcomple'])){$bcomple=$_REQUEST['bcomple'];}else{$bcomple="";}; 

//	if ($bcodigo=="" and $bnombre=="" and $bcomple==""){
//		$query="SELECT * FROM nomenclador WHERE complejidad > 0 AND baja = 0 limit 30";
//	} else { 
//		if ($bcodigo!=""){
//		$query="SELECT * FROM nomenclador WHERE codigo LIKE '%$bcodigo%' AND complejidad > 0 AND baja = 0";
//		}
		
//		if ($bnombre!=""){
//		$query="SELECT * FROM nomenclador WHERE nombre LIKE '%$bnombre%' AND complejidad > 0 AND baja = 0";
//		}
		
//		if ($bcomple!=""){
//		$query="SELECT * FROM nomenclador WHERE complejidad = '$bcomple' AND baja = 0";

//		}    
	
//	} 	
//	$result = mysqli_query($conexion, $query); 
?>