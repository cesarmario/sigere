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
<script>
	alert("OK");
</script>
<?PHP
	/* if (isset($_GET[bcodigo])){$bcodigo=$_GET[bcodigo];}else{$bcodigo="";};
	if (isset($_GET[bnombre])){$bnombre=$_GET[bnombre];}else{$bnombre="";};
	if (isset($_GET[bcomple])){$bnombre=$_GET[bcomple];}else{$bnombre="";}; */
	
	$query="SELECT * FROM nomenclador WHERE complejidad > 0 AND baja = 0 limit 30";
	$result = mysqli_query($conexion, $query);
	
	$bcodigo = $_GET[bcodigo];
	
	if ($bcodigo!=""){
	$query="SELECT * FROM nomenclador WHERE codigo LIKE '%$bcodigo%' AND complejidad > 0 AND baja = 0";
	
	$result = mysqli_query($conexion, $query);
	$cantidad = mysqli_num_rows($result);
    if ($cantidad>0){?>
	<body onload = "envio()">
		<script>
        alert("Exitos");
        </script>
    <?PHP
	$_GET[mostrar] = "1" ;
	$mostrar="1"; ?>
	<form action="prestadores.php?mostrar=1" method="GET">
    <input type="hidden" id="mostrar" name="mostrar" value="1"/>
    </form>
	<?PHP }else{ ?> 
    <body onload = "envio()">
		<script>
        alert("No se encontraron Datos");
        </script>
    <?PHP
	$_GET[mostrar] = "0";
	$mostrar="1"; ;?>
	<form action="prestadores.php?mostrar=0" method="GET">
    <input type="hidden" id="mostrar" name="mostrar" value="0"/>
    </form>
	
<?PHP }	?>