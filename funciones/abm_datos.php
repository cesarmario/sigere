<?PHP
error_reporting(E_ALL ^ E_NOTICE); 

include('conexion.php'); ?>
<!-- Funciones Tabla Obras Sociales -->
<?PHP
if ($_REQUEST['fn']=='os_a'){ //Funcion Insertar Obra Social
	$os=$_REQUEST['os'];
	$query="INSERT INTO obras_sociales (`nombre`)VALUES('$os')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../obras_sociales.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../obras_sociales.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_REQUEST['fn']=='os_u'){ //Funcion Editar Obra Social
	$nombre=$_REQUEST['nombre'];
	$id=$_REQUEST['id'];
	if (isset($_REQUEST['baja]')){$baja=1;}else{$baja=0;};
	$query="UPDATE obras_sociales SET nombre = '$nombre', baja = '$baja' WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos Modificados correctamente");
			location.replace("../obras_sociales.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../obras_sociales.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Coseguro -->
<?PHP
if ($_REQUEST['fn']=='cos_a'){ //Funcion Insertar Coseguro
	$os=$_REQUEST['os'];
	$query="INSERT INTO coseguros (`nombre`)VALUES('$os')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../coseguros.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../coseguros.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_REQUEST['fn']=='cos_u'){ //Funcion Editar Coseguro
	$nombre=$_REQUEST['nombre'];
	$id=$_REQUEST[id];
	if (isset($_REQUEST['baja'])){$baja=1;}else{$baja=0;};
	$query="UPDATE coseguros SET nombre = '$nombre', baja = '$baja' WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos Modificados correctamente");
			location.replace("../coseguros.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../coseguros.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Instituciones -->
<?PHP
if ($_REQUEST['fn']=='inst_a'){ //Funcion Insertar Institucion
	$os=$_REQUEST['os'];
	$query="INSERT INTO instituciones (`nombre`)VALUES('$os')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../instituciones.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../instituciones.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_REQUEST['fn']=='inst_u'){ //Funcion Editar Institucion
	$nombre=$_REQUEST['nombre'];
	$id=$_REQUEST[id];
	if (isset($_REQUEST['baja'])){$baja=1;}else{$baja=0;};
	$query="UPDATE instituciones SET nombre = '$nombre', baja = '$baja' WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos Modificados correctamente");
			location.replace("../instituciones.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../instituciones.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Nomenclador -->
<?PHP
if ($_REQUEST['fn']=='nn_c'){ //Funcion Control Nomenclador
	$codigo=strtoupper($_REQUEST['codigo']);
	$query="SELECT * FROM nomenclador WHERE codigo = '$codigo'"; 
    $result = mysqli_query($conexion, $query);
	$cantidad = mysqli_num_rows($result);
    if ($cantidad>0){
	?>
		<script>
        	alert("El Codigo Ya existe!");
			location.replace("../nomenclador.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            location.replace("../nomenclador_abm.php?codigo=<?PHP echo $codigo?>&fn=nn_a");
        </script>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_REQUEST['fn']=='nn_u'){ //Funcion Editar Nomenclador
	$id=$_REQUEST[id];
	$codigo=strtoupper($_REQUEST['codigo']);
	$nombre=$_REQUEST['nombre'];
	$comple=$_REQUEST['comple'];
	if (isset($_REQUEST['baja'])){$baja=1;}else{$baja=0;};
	$query="UPDATE nomenclador SET nombre = '$nombre',complejidad = '$comple',baja = '$baja' WHERE id = '$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos Modificados correctamente");
			location.replace("../nomenclador.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../nomenclador.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<?PHP
if ($_REQUEST['fn']=='nn_a'){ //Funcion Insertar en Nomenclador
	$codigo=strtoupper($_REQUEST['codigo']);
	$nombre=strtoupper($_REQUEST['nombre']);
	$comple=$_REQUEST[comple];
	$query="INSERT INTO nomenclador (`codigo`,`nombre`,`complejidad`,`baja`)VALUES('$codigo','$nombre','$comple','0')"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../nomenclador.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
            //location.replace("index.php");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../nomenclador.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Usuarios -->
<?PHP
if ($_REQUEST['fn']=='us_c'){ //Funcion Control Usuarios
	$usuario=$_REQUEST['usuario'];
	$query="SELECT * FROM usuarios WHERE usuario = '$usuario'"; 
    $result = mysqli_query($conexion, $query);
	$cantidad = mysqli_num_rows($result);
    if ($cantidad>0){
	?>
		<script>
        	alert("El Usuario Ya existe!");
			location.replace("../usuarios.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            location.replace("../usuarios_datos.php?usuario=<?PHP echo $usuario?>&fn=us_a");
        </script>
	<?PHP } ?>
<?PHP } ?>



<!-- Funciones Tabla Usuarios -->
<?PHP
if ($_REQUEST['fn']=='us_a'){ //Funcion Insertar Usuarios
	$us=$_REQUEST['usuario'];
	$mt=$_REQUEST['matricula'];
	$ps=md5($mt);
	
	$query1 = "SELECT * FROM profesionales WHERE matricula = '$mt' ";
	$result1 = mysqli_query($conexion, $query1);
	if ($row1 = mysqli_fetch_assoc($result1)){
		$nm=$row1['nombre'];
			
		$query="INSERT INTO usuarios (`usuario`,`nombre`,`matricula`,`pass`,`baja`,`baja`)VALUES('$us','$nm','$mt','$ps','0','0')"; 
		$result = mysqli_query($conexion, $query);
		if (mysqli_affected_rows($conexion)>0){
		?>
			<script>
				//alert("Datos cargados correctamente");
				location.replace("../usuarios.php");
			</script>
			<body onLoad="envio()">
		<?PHP } else {?>
			<script>
				alert("Ocurrio un Error!!");
			</script>
			<input type ='button' value = 'Volver' onClick="location.replace('../usuarios.php');" class="button"/>
		<?PHP }
	
	} else {?>
    	<script>
            alert("Ocurrio un Error!!");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../usuarios.php');" class="button"/>
    
    <?PHP } ?>    
    
<?PHP } ?>

<!-- Funciones Tabla Obras Usuarios -->
<?PHP
if ($_REQUEST['fn']=='us_u'){ //Funcion Modificar Usuarios
	$id=$_REQUEST['id'];
	$us=$_REQUEST['usuario'];
	$nm=$_REQUEST['nombre'];
	$mt=$_REQUEST['matricula'];
	$query="UPDATE usuarios SET usuario='$us',nombre='$nm',matricula='$mt' WHERE id='$id'"; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
        	//alert("Datos cargados correctamente");
			location.replace("../usuarios.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../usuarios.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Profesionales-->
<?PHP
if ($_REQUEST['fn']=='pf_c'){ //Funcion Control Profesionales
	$matricula=$_REQUEST['matricula'];
	$query="SELECT * FROM profesionales WHERE matricula = '$matricula'"; 
    $result = mysqli_query($conexion, $query);
	$cantidad = mysqli_num_rows($result);
    if ($cantidad>0){
	?>
		<script>
        	alert("La Matricula Ya existe!");
			location.replace("../profesionales.php");
        </script>
        <body onLoad="envio()">
    <?PHP } else {?>
		<script>
            location.replace("../editar_datos.php?id=<?PHP echo $matricula?>&fn=pf_a");
        </script>
	<?PHP } ?>
<?PHP } ?>

<!-- Funciones Tabla Profesionales -->
<?PHP
if ($_REQUEST['fn']=='pf_a'){ //Funcion Insertar Profesionales
	$mt=$_REQUEST['id'];
	$nm=$_REQUEST['nombre'];
			
		$query="INSERT INTO profesionales (`matricula`,`nombre`,`baja`)VALUES('$mt','$nm','0')"; 
		$result = mysqli_query($conexion, $query);
		if (mysqli_affected_rows($conexion)>0){
		?>
			<script>
				alert("Datos cargados correctamente");
				location.replace("../profesionales.php");
			</script>
			<body onLoad="envio()">
		<?PHP } else {?>
			<script>
				alert("Ocurrio un Error!!");
			</script>
			<input type ='button' value = 'Volver' onClick="location.replace('../profesionales.php');" class="button"/>
		<?PHP } ?>
    
<?PHP } ?>

<!-- Funciones Tabla Usuarios -->
<?PHP
if ($_REQUEST['fn']=='pf_u'){ //Funcion Modificar Profesionales
	$nm=$_REQUEST['nombre'];
	$mt=$_REQUEST['id'];
	$query="UPDATE profesionales SET nombre='$nm' WHERE matricula='$mt' "; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
		
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../profesionales.php");
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../profesionales.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>

<!-- Actualizar Contrase�a -->
<?PHP
if ($_REQUEST['fn']=='psw_u'){ //Funcion Modificar Profesionales
	$id=$_REQUEST['id'];
	$us=$_REQUEST['usuario'];
	$psw=$_REQUEST['password'];
	
	$query="UPDATE usuarios SET pass=md5('$psw') WHERE id='$id' "; 
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	
	?>
		<script>
        	alert("Datos cargados correctamente");
			location.replace("../profesionales.php");
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
        </script>
        <input type ='button' value = 'Volver' onClick="location.replace('../perfil.php');" class="button"/>
	<?PHP } ?>
<?PHP } ?>