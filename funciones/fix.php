<script>
function envio(){
document.formu.submit()
}
</script>
<?PHP
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
include('conexion.php'); ?>
<!-- Funcion corrigue tabla nomenclador -->
<?PHP
if ($_GET['fn']=='fix_nn'){ //Funcion Insertar Obra Social
	$query="UPDATE `nomenclador` SET nombre = REPLACE(nombre,'í','i')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos cargados correctamente");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
         </script>

	<?PHP } ?>
<?PHP } ?>