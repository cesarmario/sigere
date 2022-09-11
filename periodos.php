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

<script type="text/javascript" src="js/globalize/globalize.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.de-DE.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.ja-JP.js"></script>

<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/mousewheel.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>

</head>

<body>
<?PHP error_reporting (0); 
session_start();
if(!isset($_SESSION['sesion_UserId'])) {?>
     <script> location.replace("user_login.php"); </script>
<?PHP } ?>
	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>
        
        <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-calendar"></i>
					<span class="label label-default"><?PHP echo $_SESSION['sesion_PeridoM'];?></span>&nbsp;
					<span class="label label-default"><?PHP echo $_SESSION['sesion_PeridoA'];?></span>
				</a>
           	</li>
		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-content">

				<!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="images/users/user.png" alt="">
						<div class="user-info">
							<?PHP echo $_SESSION['sesion_UserNom'];?> <span><?PHP echo $_SESSION['sesion_ProfNom'];?></span>
						</div>
					</a>
					<div class="popup dropdown-menu dropdown-menu-right">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <h6><?PHP echo $_SESSION['sesion_ProfNom'];?> <small>Matricula: <?PHP echo $_SESSION['sesion_ProfMat'];?></small></h6>                                
                            </div>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="perfil.php"><i class="icon-user"></i> Perfil</a></li>
                            <li class="list-group-item"><a href="funciones/logout.php"><i class="icon-exit"></i> Cerrar Sesion</a></li>
                        </ul>
                    </div>
				</div>
				<!-- /user dropdown -->

				<!-- Main navigation -->
				<ul class="navigation">
					<li><a href="index.php"><span>Inicio</span><i class="icon-screen2"></i></a></li>
					<?PHP if($_SESSION['sesion_UserAdm']==1){?>
					<li>
						<a href="#"><span>Carga de Datos</span><i class="icon-list"></i></a>
						<ul>
                        	<li class="active"><a href="#">Periodos</a></li>
							<li><a href="cirugias.php">Cargar Cirugia</a></li>
							<li><a href="instituciones.php">Instituciones</a></li>
							<li><a href="obras_sociales.php">Obras Sociales</a></li>
                            <li><a href="coseguros.php">Coseguros</a></li>
                            <li><a href="nomenclador.php">Nomenclador</a></li>
						</ul>
					</li>

                    <li>
						<a href="#"><span>Control de Datos</span> <i class="icon-table"></i></a>
						<ul>
                        	<li><a href="facturacion.php">Facturacion</a></li>
                            <li><a href="impresion.php">Impresion</a></li>
                            <li><a href="liquidacion.php">Liquidacion</a></li>
							<li><a href="busqueda.php">Busqueda</a></li>
                        </ul>
                    </li>

                    <li>
						<a href="#"><span>Administrar</span> <i class="icon-settings"></i></a>
						<ul>
                        	<li><a href="usuarios.php">Usuarios</a></li>
                            <li><a href="profesionales.php">Profesionales</a></li>
                        </ul>
                    </li>
                    <?PHP }?>
                    <?PHP if($_SESSION['sesion_UserAdm']!=1){?>
                    <li>
						<a href="#"><span>Control de Datos</span> <i class="icon-table"></i></a>
						<ul>
                        	<li class="active"><a href="#">Periodos</a></li>
                            <li><a href="impresion.php">Impresion</a></li>
                        </ul>
                    </li>
                    <?PHP }?>
				</ul>
				<!-- /main navigation -->

			</div>
		</div>
		<!-- /sidebar -->

		<!-- Page content -->
	 	<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Periodos <small>Seleccione un periodo para operar</small></h3>
				</div>
			</div>
			<!-- /page header -->

        	<!-- Form components -->
    		<form class="form-horizontal" role="form" action="funciones/abm_periodos.php" method="GET">
			<?PHP //if($_SESSION['sesionc_UserAdm']==1){?>
            <div class="form-group">
                <label class="col-sm-1 control-label">Agregar: </label>
                <div class="row">
                    <div class="col-md-1">                	
                        <select class="multi-select" tabindex="2" name="periodo_m" required>
                            <option selected value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option> 
                        </select>
                    </div>   
                    <div class="col-md-1">    
                        <input type="text" class="form-control" placeholder="Año" name="periodo_a" required>
                    </div>
                    <div class="col-md-1">
                    	<input type="hidden" id="fn" name="fn" value="periodo_a"/>
                        <input type="submit" value="Agregar" class="btn btn-primary">
                    </div>   
				</div>
                
            </div>
            <?PHP //} ?>
			<!-- Questions and contact -->
            <div class="row">
            	<div class="col-md-6">

                	<!-- Questions -->
			        <div class="panel-group block">
                         
                        <!-- Default table -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Periodos</h6></div>
			                <div class="table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>A&ntilde;o</th>
				                            <th>Mes</th>
				                            <th></th>
				                        </tr>
				                    </thead>
                                    <?PHP include('funciones/conexion.php');                                    
                            		$query="SELECT * FROM periodos WHERE baja = 0 ORDER BY periodo_a DESC ,periodo_m DESC"; 
									$result = mysqli_query($conexion, $query);?>
                                    <?PHP while($per=mysqli_fetch_assoc($result)){?>
				                    <tbody>
				                        <tr>
				                            <td><?PHP echo $per['periodo_a'];?></td>
				                            <td><?PHP echo utf8_encode($per["periodo_m"]); ?></td>
				                            <td>	
                                            <div class="table-controls">
                                                <a href="funciones/abm_periodos.php?periodo_m=<?PHP echo $per["periodo_m"]; ?>&periodo_a=<?PHP echo $per["periodo_a"]; ?>&fn=periodo_s" 
                                                class="btn btn-success btn-icon btn-xs tip" title="Seleccionar Periodo">
                                               
                                                <i class="icon-checkmark3"></i></a>
                                                 <?PHP if($_SESSION['sesion_UserAdm']==1){?>
                                                <a href="funciones/abm_periodos.php?periodo_m=<?PHP echo $per["periodo_m"]; ?>&periodo_a=<?PHP echo $per["periodo_a"]; ?>&fn=periodo_b"
                                                class="btn btn-danger btn-icon btn-xs tip" title="Eliminar Periodo">
                                                <i class="icon-remove"></i></a>
                                                <?PHP } ?>
                                            </div>
                                            </td>
				                        </tr>
				                    </tbody>
                                     <?PHP }?>
				                </table>
			                </div>
				        </div>
				        <!-- /default table -->

					</div>
				</div>
			</div>
			<!-- Questions -->

			</form>
			<!-- /form components -->


	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; 2018. <a href="#">Mario De los Rios</a></div>
	        </div>
	        <!-- /footer -->


		</div>
		<!-- /page content -->

	</div>
	<!-- /content -->
</body>
</html>