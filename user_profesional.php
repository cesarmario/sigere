<?PHP session_start();
include('funciones/login_ctrl.php');
include('funciones/profesionales.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>Control de Cirugias</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>

</head>

<body class="full-width page-condensed">

	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Sistema de Control"></a>
		</div>
		
	</div>
	<!-- /navbar -->


	<!-- Login wrapper -->
	<div class="login-wrapper">
    	<form name="login" action="funciones/ctrl_profesional.php" role="form" method="POST">
			<div class="popup-header">
				<span class="text-semibold">Bienvenido al Sistema</span>
			</div>
			<div class="well">
				<div class="form-group has-feedback">
					<label>Nombre de Usuario</label>
					<input type="text" class="form-control" value="<?PHP echo $_SESSION['sesion_UserId'];?>" disabled>
					<i class="icon-users form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label>Profesional</label>
							<select data-placeholder="Seleccione el profesional..." class="select-full"
							tabindex="2" name="matricula" required <?PHP if ($_SESSION['sesion_ProfMat']>0){?>disabled <?PHP } ?>>
								<option selected value="<?PHP if ($_SESSION['sesion_ProfMat']>0){ echo $_SESSION['sesion_ProfMat'];} ?>" >
								<?PHP if ($_SESSION['sesion_ProfMat']>0){ echo $_SESSION['sesion_ProfMat'];} ?>
                                </option>
							<?PHP 
							      while($prof=mysqli_fetch_assoc($result)){ ?>
								<option value="<?PHP echo $prof['matricula']; ?>">
								 <?PHP echo $prof['matricula'] . " " . utf8_encode($prof["nombre"]);?></option>
							<?PHP } ?>
							</select>
                            
                            <?PHP if ($_SESSION['sesion_ProfMat']>0){?>
                            <input type="hidden" id="matricula" name="matricula" value="<?PHP echo $_SESSION['sesion_ProfMat']; ?>"/> 
							<?PHP } ?>
                            
				</div>

				<div class="row form-actions">
					<div class="col-xs-6">
						<div class="checkbox checkbox-success">
						<!--<label><input type="checkbox" class="styled"> Remember me </label>-->
						</div>
					</div>

					<div class="col-xs-6">
						<button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Continuar</button>
					</div>
				</div>
			</div>
    	</form>
	</div>  
	<!-- /login wrapper -->

    <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; <script>document.write(new Date().getFullYear());</script> <a href="#">Mario De los Rios</a></div>
	        </div>
	<!-- /footer -->


</body>
</html>