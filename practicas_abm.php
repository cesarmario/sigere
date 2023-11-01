<?PHP session_start();
include('funciones/login_ctrl.php'); 
include('funciones/adm_ctrl.php'); ?>
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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

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
					<li><a href="index.php"><span>Inicio</span> <i class="icon-screen2"></i></a></li>
					<li>
						<a href="#"><span>Carga de Datos</span> <i class="icon-insert-template"></i></a>
						<ul>
                        	<li><a href="#">Periodos</a></li>
							<li><a href="#">Cirugias</a></li>
                            <ul>
                            	<li class="active"><a href="#">&nbsp;&nbsp;Practicas</a></li>
                            </ul>                            
							<li><a href="#">Instituciones</a></li>
							<li><a href="#">Obras Sociales</a></li>
                            <li><a href="#">Coseguros</a></li>
                            <li><a href="#">Nomenclador</a></li>
						</ul>
					</li>
                    <li>
						<a href="#"><span>Control de Datos</span> <i class="icon-insert-template"></i></a>
						<ul>
                        	<li><a href="#">Facturacion</a></li>
                            <li><a href="#">Impresion</a></li>
                            <li><a href="#">Liquidacion</a></li>
							<li><a href="#">Busqueda</a></li>
                        </ul>
                    </li>
                    <?PHP if($_SESSION['sesion_UserAdm']==1){?>
                    <li>
						<a href="#"><span>Administrar</span> <i class="icon-settings"></i></a>
						<ul>
                        	<li><a href="usuarios.php">Usuarios</a></li>
                            <li><a href="profesionales.php">Profesionales</a></li>
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
					<h3>Practicas <small>Carga de Practicas</small></h3>
				</div>
			</div>
			<!-- /page header -->

        	<!-- Form components -->
    		<form class="form-horizontal" role="form" action="funciones/abm_practicas.php" method="GET">

				<!-- Basic inputs -->
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Detalle de la practica</h6></div>
	                <div class="panel-body">
                         
                        <div class="form-group">
							<label class="col-sm-2 control-label">N&uacute;mero de bono: </label>
							<div class="col-sm-3">
								<div class="row">
									<div class="col-sm-8 has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="N&uacute;mero de bono"
                                        value="<?PHP echo $_REQUEST['id_bono'];?>" name="id_bono" disabled >
                                        <i class="icon icon-checkmark3 form-control-feedback"></i>
									</div>
								</div>
							</div>
						</div>
						
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Practica: </label>
                           <div class="col-sm-10">
                            <?PHP include('funciones/conexion.php');                                    
                            $query="SELECT * FROM nomenclador WHERE complejidad > 0";
							$result = mysqli_query($conexion, $query);?>
                            <select data-placeholder="Seleccione c&oacute;digo..." class="select-full"
                            tabindex="2" name="codigo" required>
                                <option value=""></option>
                            <?PHP while($nn=mysqli_fetch_assoc($result)){?>
                                <option value="<?PHP echo $nn['codigo']; ?>">
                                 <?PHP echo $nn['codigo'] . " " . utf8_encode($nn["nombre"]);?></option>
                            <?PHP }?>    
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">Porcentaje: </label>
							<div class="col-md-3">
								<div class="row">
									<div class="col-sm-6 has-feedback has-feedback">
										<input type="text" class="form-control" value="100" name="porcentaje" required>
									</div>
								</div>
							</div>
						</div>
                        
                        <div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
                            <input type="hidden" id="id_bono"  name="id_bono"  value="<?PHP echo $_REQUEST['id_bono'];?>"/>
                            <input type="hidden" id="fn"       name="fn"       value="prac_det_a"/>
                            <div class="form-actions text-right">
                            <?PHP if (isset($_REQUEST['mod'])){ ?>
                            <input type="reset" value="Cancelar" onClick="location.replace('facturacion.php');" class="btn btn-danger">
                            <?PHP }else{?>
                            <input type="reset" value="Terminar" onClick="location.replace('cirugias.php');" class="btn btn-danger">
                            <?PHP }?>
                            <input type="submit" value="Agregar" class="btn btn-primary">
                            </div>
                            </div>
                        </div>
                        
                        <!-- Default table -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Pr&aacute;cticas</h6></div>
			                <div class="table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>C&oacute;digo</th>
				                            <th>Descripci&oacute;n</th>
				                            <th>Complejidad</th>
                                            <th>Porcentaje</th>
                                            <th></th>
				                        </tr>
				                    </thead>
                                    <?PHP include('funciones/conexion.php');                                    
                            		$query2="SELECT practicas_detalle.codigo,practicas_detalle.id,nomenclador.nombre,nomenclador.complejidad,practicas_detalle.porcentaje
									FROM practicas_detalle,nomenclador
									WHERE practicas_detalle.fk_id_bono='$_REQUEST[id_bono]' AND matricula='$_SESSION[sesion_ProfMat]' AND
									practicas_detalle.codigo = nomenclador.codigo AND practicas_detalle.baja_usu = '' "; 
									$result2 = mysqli_query($conexion, $query2);?>
                                    <?PHP while($prac=mysqli_fetch_assoc($result2)){?>
				                    <tbody>
				                        <tr>
				                            <td><?PHP echo $prac['codigo'];?></td>
				                            <td><?PHP echo utf8_encode($prac["nombre"]); ?></td>
				                            <td><?PHP echo $prac['complejidad']; ?></td>
                                            <td><?PHP echo $prac['porcentaje']; ?>%</td>
                                            <td>
                                            <div class="table-controls">
                                                <a href="funciones/abm_practicas.php?id=<?PHP echo $prac['id'];?>&fn=prac_det_b&id_bono=<?PHP echo $_REQUEST['id_bono'];?>"
                                                class="btn btn-success btn-icon btn-xs tip">
                                                <i class="icon-pencil4"></i> Eliminar</a>
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
				<!-- /basic inputs -->

			</form>
			<!-- /form components -->


	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; <script>document.write(new Date().getFullYear());</script> <a href="#">Mario De los Rios</a></div>
	        </div>
	        <!-- /footer -->


		</div>
		<!-- /page content -->

	</div>
	<!-- /content -->
</body>
</html>