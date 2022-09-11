<?PHP
	$hostname_ = "localhost";
	$database_ = "c2261621_gestion";
	$username_ = "c2261621_gestion";
	$password_ = "30dudiDIpi";
	$conexion  = mysqli_connect($hostname_, $username_, $password_, $database_) or trigger_error(mysqli_error(),E_USER_ERROR);
	mysqli_set_charset($conexion, 'utf8');