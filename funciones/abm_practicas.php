<?PHP session_start();
include('conexion.php'); 
//error_reporting(E_ALL ^ E_NOTICE); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$actual = date("Y-m-d H:i:s");
?>

<!-- Funciones Control Bono-->
<?PHP
//if (isset($_REQUEST['fn'])) $fn=$_REQUEST['fn'];

if ($_REQUEST['fn']=='prac_main_c'){ //Funcion Control Nomenclador
	$id_bono=$_REQUEST['id_bono'];
	$query="SELECT * FROM practicas_main WHERE id_bono = '$id_bono' and baja_usu = ''"; 
    $result = mysqli_query($conexion, $query);
	$cantidad = mysqli_num_rows($result);
    if ($cantidad>0){
	?>
		<script>
        	alert("El Bono Ya existe!");
			location.replace("../cirugias.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
          location.replace("../cirugias_alta.php?id_bono=<?PHP echo $id_bono?>");
        </script>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Alta Cirugia-->

<?PHP 
if ($_REQUEST['fn']=='prac_main_a'){ //Funcion Insertar cirugias
	if (isset($_REQUEST['rec_mas65'])){$var_rec_mas65=1;}else{$var_rec_mas65=0;};
	if (isset($_REQUEST['rec_men3'])) {$var_rec_men3=1;} else{$var_rec_men3=0;};
	if (isset($_REQUEST['rec_urg']))  {$var_rec_urg=1;}  else{$var_rec_urg=0;};
	if (isset($_REQUEST['rec_fds']))  {$var_rec_fds=1;}  else{$var_rec_fds=0;};
	if (isset($_REQUEST['rec_fer']))  {$var_rec_fer=1;}  else{$var_rec_fer=0;};
	if (isset($_REQUEST['rec_noc']))  {$var_rec_noc=1;}  else{$var_rec_noc=0;};
	$id_bono =$_REQUEST['id_bono'];
	//$fecha = date('Y-m-d',strtotime($_REQUEST[fecha]));
	
	$fecha = str_replace("/", "-", $_REQUEST['fecha']);
	$fecha = date("Y-m-d",strtotime($fecha));
	$query="INSERT INTO practicas_main (
	`matricula`,
	`periodo_a`,
	`periodo_m`,
	`id_bono`,
	`fecha`,
	`dni`,
	`paciente`,
	`institucion`,
	`os`,
	`cos`,
	`rec_mas65`,
	`rec_men3`,
	`rec_urg`,
	`rec_fds`,
	`rec_fer`,
	`rec_noc`,
	`observ`,
	`cobrado`,
	`alta_fec`,
	`alta_usu`
	)VALUES(
	'$_SESSION[sesion_ProfMat]',
	'$_SESSION[sesion_PeridoA]',
	'$_SESSION[sesion_PeridoM]',
	'$id_bono',
	'$fecha',
	'$_REQUEST[dni]',
	'$_REQUEST[paciente]',
	'$_REQUEST[institucion]',
	'$_REQUEST[os]',
	'$_REQUEST[cos]',
	'$var_rec_mas65',
	'$var_rec_men3',
	'$var_rec_urg',
	'$var_rec_fds',
	'$var_rec_fer',
	'$var_rec_noc',
	'$_REQUEST[observ]',
	'0',
	'$actual',
	'$_SESSION[sesion_UserId]')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
          location.replace("../practicas_abm.php?id_bono=<?PHP echo $id_bono?>");
        </script>
		
    <?PHP } else {
		echo $_SESSION['sesion_ProfMat'] . '<br>'; 
		echo $_SESSION['sesion_PeridoA'] . '<br>';
		echo $_SESSION['sesion_PeridoM'] . '<br>';
		echo $id_bono . '<br>';
		echo $fecha . '<br>';
		echo $_REQUEST['dni'] . '<br>';
		echo $_REQUEST['paciente'] . '<br>';
		echo $_REQUEST['institucion'] . '<br>';
		echo $_REQUEST['os'] . '<br>';
		echo $_REQUEST['cos'] . '<br>';
		echo $var_rec_mas65 . '<br>';
		echo $var_rec_men3 . '<br>';
		echo $var_rec_urg . '<br>';
		echo $var_rec_fds . '<br>';
		echo $var_rec_fer . '<br>';
		echo $var_rec_noc . '<br>';
		echo $_REQUEST['observ'] . '<br>';
		echo $actual . '<br>';
		echo $_SESSION['sesion_UserId'] . '<br>';
		?>
		<script>
            alert("Ocurrio un Error a guardar en la Base de Datos!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../cirugias.php');" class="button"/>
	<?PHP }; ?>
<?PHP }; 
/********************************************************************************************/
?>

<?PHP //Funcion Insertar practicas_detalle
if ($_REQUEST['fn']=='prac_det_a'){ 

	$query="INSERT INTO practicas_detalle (
	`fk_id_bono`,
	`codigo`,
	`porcentaje`,
	`alta_fec`,
	`alta_usu`,
	`matricula`
	)VALUES(
	'$_REQUEST[id_bono]',
	'$_REQUEST[codigo]',
	'$_REQUEST[porcentaje]',
	'$actual',
	'$_SESSION[sesion_UserId]',
	'$_SESSION[sesion_ProfMat]')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
         location.replace("../practicas_abm.php?id_bono=<?PHP echo $_REQUEST['id_bono'];?>");
        </script>

    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error a guardar en la Base de Datos!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../practicas_abm.php');" class="button"/>
	<?PHP }; ?>

<?PHP }; //Funcion Insertar practicas_main
/********************************************************************************************/
?>

<?PHP
if ($_REQUEST['fn']=='prac_det_b'){ //Funcion Baja practicas_detalle
	$actual = date("Y-m-d H:i:s");
	$id=$_REQUEST['id'];
	$id_bono = $_REQUEST['id_bono'];
	$query="UPDATE practicas_detalle SET baja_fec = '$actual', baja_usu = '$_SESSION[sesion_UserId]' WHERE id = '$id'";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
            //alert("Datos cargados correctamente");
			location.replace("../practicas_abm.php?id_bono=<?PHP echo $_REQUEST['id_bono'];?>");
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../cirugias.php');" class="button"/>
	<?PHP }; ?>

<?PHP }; //Funcion Baja practicas_main
/********************************************************************************************/
?>

<?PHP
if ($_REQUEST['fn']=='prac_main_b'){ //Funcion Baja practicas
	$actual = date("Y-m-d H:i:s");
	$id_bono = $_REQUEST['id_bono'];
	$query="UPDATE practicas_main SET baja_fec = '$actual', baja_usu = '$_SESSION[sesion_UserId]' WHERE id_bono = '$id_bono' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
        $query2="UPDATE practicas_detalle SET baja_fec = '$actual', baja_usu = '$_SESSION[sesion_UserId]' WHERE fk_id_bono = '$id_bono' ";
        $result2 = mysqli_query($conexion, $query2);
        if (mysqli_affected_rows($conexion)>0){
        ?>
            <body onLoad="envio()">
            <script>
				alert("La Cirugia a sido ELIMINADA correctamente");
				location.replace("../facturacion.php");
			</script>
        <?PHP } else {?>
            <script>
                alert("Ocurrio un Error!!");
            </script>
            <input type ='button' value = 'Volver' onClick="location.replace('../facturacion.php');" class="button"/>
        <?PHP }; ?>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../facturacion.php');" class="button"/>
	<?PHP }; ?>

<?PHP }; //Funcion Insertar practicas_main
/********************************************************************************************/
?>

<?PHP
if ($_REQUEST['fn']=='prac_main_u'){ //Funcion Modificar practicas_main
	if (isset($_REQUEST['rec_mas65'])){$var_rec_mas65=1;}else{$var_rec_mas65=0;};
	if (isset($_REQUEST['rec_men3'])){$var_rec_men3=1;}else{$var_rec_men3=0;};
	if (isset($_REQUEST['rec_urg'])){$var_rec_urg=1;}else{$var_rec_urg=0;};
	if (isset($_REQUEST['rec_fds'])){$var_rec_fds=1;}else{$var_rec_fds=0;};
	if (isset($_REQUEST['rec_fer'])){$var_rec_fer=1;}else{$var_rec_fer=0;};
	if (isset($_REQUEST['rec_noc'])){$var_rec_noc=1;}else{$var_rec_noc=0;};
	$actual = date("Y-m-d H:i:s");
	$id=$_REQUEST['id'];
	//$fechanew = $_REQUEST[fecha];
	$fecha = str_replace("/", "-", $_REQUEST['fecha']);
	$fecha = date("Y-m-d",strtotime($fecha));
	//Mostramos los datos para controlar***
	//echo "Fecha New " . $fechanew  . "<br>";
	//echo "Fecha Con Formato: " . $fecha . "<br>";
	//echo "Fecha Original: " . $_REQUEST[fecha] . "<br>";
	//echo $_SESSION[sesion_UserId] . "<br>";
	//echo $id . "<br>";
	//echo $_REQUEST[paciente] . "<br>";
	//echo $_REQUEST[institucion] . "<br>";
	//echo $_REQUEST[os] . "<br>";
	//**************************************
	$query="UPDATE practicas_main SET
	fecha='$fecha',
	dni='$_REQUEST[dni]',
	paciente='$_REQUEST[paciente]',
	institucion='$_REQUEST[institucion]',
	os='$_REQUEST[os]',
	cos='$_REQUEST[cos]',
	rec_mas65='$var_rec_mas65',
	rec_men3='$var_rec_men3',
	rec_urg='$var_rec_urg',
	rec_fds='$var_rec_fds',
	rec_fer='$var_rec_fer',
	rec_noc='$var_rec_noc',
	observ='$_REQUEST[observ]',
	mod_fec='$actual',
	mod_usu='$_SESSION[sesion_UserId]'
	WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
			location.replace("../facturacion.php");		   
        </script>
        <!--input type ='button' value = 'Volver' onClick="location.replace('../facturacion.php');" class="button"/-->
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../facturacion.php');" class="button"/>
	<?PHP }; ?>
<?PHP }; //Funcion Insertar practicas_main
/********************************************************************************************/
?>

<?PHP
if ($_REQUEST['fn']=='prac_liq_u'){ //Funcion Modificar Liquidacion

	$id=$_REQUEST['id'];
	$liquidacion_nro=$_REQUEST['liquidacion_nro'];
	$liquidacion_imp=$_REQUEST['liquidacion_imp'];
	$liquidacion_obs=$_REQUEST['liquidacion_obs'];	
	$fecha = str_replace("/", "-", $_REQUEST['liquidacion_fec']);
	$liquidacion_fec = date("Y-m-d",strtotime($fecha));
	$actual = date("Y-m-d H:i:s");
	$query="UPDATE practicas_main SET
	liquidacion_nro='$liquidacion_nro',
	liquidacion_imp='$liquidacion_imp',
	liquidacion_fec='$liquidacion_fec',
	liquidacion_obs='$liquidacion_obs',
	mod_fec='$actual',
	mod_usu='$_SESSION[sesion_UserId]'
	WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
         /*   alert("Datos cargados correctamente"); */
			location.replace("../liquidacion.php);
        </script>

    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../liquidacion.php');" class="button"/>
	<?PHP }; ?>
<?PHP }; //Funcion modificar Liquidacion
/********************************************************************************************/
?>

<?PHP
if ($_REQUEST['fn']=='prac_liq_c'){ //Funcion Cobrar Liquidacion
	
	$cob=$_REQUEST['cob'];
	$id=$_REQUEST['id'];
	$query="UPDATE practicas_main SET cobrado='$cob' WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
		/*	location.replace("../liquidacion.php); */
			window.close();
        </script>

    <?PHP } else { ?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../liquidacion.php');" class="button"/>
	<?PHP }; ?>
<?PHP }; ?>
