<?PHP
include('conexion.php');                                    
$query="SELECT * FROM profesionales";
$result = mysqli_query($conexion, $query);
?>