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
<style>
input:focus {
   border: 2px solid #000;
   background: #F3F3F3;
}

select:focus {
   border: 2px solid #000;
   background: #F3F3F3;
}
checkbox:focus {
   border: 2px solid #000;
   background: #F3F3F3;
}
</style>
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
							<?PHP echo $_SESSION['sesion_UserId'];?> <span><?PHP echo $_SESSION['sesion_UserNom'];?></span>
						</div>
					</a>
					<div class="popup dropdown-menu dropdown-menu-right">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <h6><?PHP echo $_SESSION['sesion_UserNom'];?> <small>Matricula: <?PHP 
								echo $_SESSION['sesion_UserMat'];?></small>
                                </h6>                                
                            </div>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="usuario_perfil.php"><i class="icon-user"></i> Perfil</a></li>
                            <li class="list-group-item"><a href="funciones/logout.php"><i class="icon-exit"></i> Cerrar Sesion</a></li>
                        </ul>
                    </div>
				</div>
				<!-- /user dropdown -->

				<!-- Main navigation -->
				<ul class="navigation">
					<li><a href="index.php"><span>Inicio</span> <i class="icon-screen2"></i></a></li>
					<li>
						<a href="#"><span>Carga de Datos</span> <i class="icon-list"></i></a>
						<ul>
                            <li><a href="periodos.php">Periodos</a></li>
							<li><a href="#">Practicas</a></li>
                            <ul>
                            	<li class="active"><a href="#">&nbsp;&nbsp;Modificacion</a></li>
                            </ul>
                            
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
				
                <?PHP
					include('funciones/conexion.php');
					$id=$_REQUEST['id'];
					$query="SELECT *,
					instituciones.nombre as inom,
					obras_sociales.nombre as onom,
					coseguros.nombre as cnom
					FROM practicas_main,obras_sociales,coseguros,instituciones
					WHERE practicas_main.id = '$id'
					AND practicas_main.institucion=instituciones.id AND practicas_main.os=obras_sociales.id
					AND practicas_main.cos=coseguros.id";
					$result1 = mysqli_query($conexion, $query);
					if ($prac = mysqli_fetch_assoc($result1)){ ?>
					<script>
						//alert("Ocurrio un error!");
						//location.replace("facturacion.php");
					</script>
				<?PHP }
					/*$prac=mysqli_fetch_assoc($result1);*/
				?>                
				<!-- Basic inputs -->
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Datos principales de la practica</h6></div>
	                <div class="panel-body">
                         
                        <div class="form-group">
									<label class="col-sm-2 control-label">Periodo: </label>
									<div class="col-sm-10">
		                                <select class="multi-select" name="periodo_m" disabled>
		                                    <option selected value="<?PHP echo $prac['periodo_m']; ?>">
											<?PHP echo $prac['periodo_m']; ?>
                                            </option> 
		                                </select>

                                        <select class="multi-select" name="periodo_a" disabled>
		                                    <option selected value="<?PHP echo $prac['periodo_a']; ?>">
											<?PHP echo $prac['periodo_a']; ?>
                                            </option>  
		                                </select>
									</div>
								</div>
                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">N&uacute;mero de bono: </label>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-md-2">
                                    <input type="text" class="form-control" placeholder="N&uacute;mero de bono"
                                    value="<?PHP echo $prac['id_bono']; ?>" name="id_bono" disabled >
									</div>
								</div>
							</div>
						</div>
						                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">Fecha de la cirugia: </label>
							<div class="col-md-2">
                            	<?PHP // $fecha=date('d-m-Y',strtotime($prac['fecha'])); ?>
                            	<input type="text" class="form-control" data-mask="99/99/9999"
                                value="<?PHP echo date('d/m/Y',strtotime($prac['fecha'])); ?>" name="fecha" id="fecha"  tabindex="2" required >
							</div>
						</div>
                        
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Instituci&oacute;n: </label>
                           <div class="col-md-3">
                            <?PHP include('funciones/conexion.php');                                    
                            $query2="SELECT * FROM instituciones order by nombre"; 
							$result2 = mysqli_query($conexion, $query2);?>
                            <select data-placeholder="Seleccione instituci&oacute;n..." class="select-search"
                            tabindex="3" name="institucion" required>
                                <option selected value="<?PHP echo $prac['institucion']; ?>"><?PHP echo $prac['inom']; ?></option>
                            <?PHP while($inst=mysqli_fetch_assoc($result2)){?>
                                <option value="<?PHP echo $inst['id']; ?>">
                                 <?PHP echo utf8_encode($inst["nombre"]);?></option>
                            <?PHP }?>    
                            </select>
                            <!-- input type="text" class="form-control" placeholder="Nueva Institucion" name="nuevainst" -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Obra Social: </label>
                           <div class="col-md-3">
                            <?PHP include('funciones/conexion.php');                                    
                            $query3="SELECT * FROM obras_sociales order by nombre";
							$result3 = mysqli_query($conexion, $query3);?>
                            <select data-placeholder="Seleccione Obra Social..." class="select-search" tabindex="3"
                            name="os" required>
                                <option selected value="<?PHP echo $prac['os']; ?>"><?PHP echo $prac['onom']; ?></option>
                            <?PHP while($inst=mysqli_fetch_assoc($result3)){?>
                                <option value="<?PHP echo $inst['id']; ?>">
                                 <?PHP echo utf8_encode($inst['nombre']);?></option>
                            <?PHP }?>    
                            </select>
                            <!-- input type="text" class="form-control" placeholder="Nueva Obra Social" name="nuevaos" -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Coseguro: </label>
                           <div class="col-md-3">
                            <?PHP include('funciones/conexion.php');                                    
                            $query4="SELECT * FROM coseguros order by nombre";
							$result4 = mysqli_query($conexion, $query4);?>
                            <select data-placeholder="Seleccione Coseguro..." class="select-search" tabindex="4"
                            name="cos">
                                <option selected value="<?PHP echo $prac['cos']; ?>"><?PHP echo $prac['cnom']; ?></option>
                            <?PHP while($cos=mysqli_fetch_assoc($result4)){?>
                                <option value="<?PHP echo $cos['id']; ?>">
                                 <?PHP echo utf8_encode($cos['nombre']);?></option>
                            <?PHP }?>    
                            </select>
                            <!-- input type="text" class="form-control" placeholder="Nueva Obra Social" name="nuevaos" -->
                            </div>
                        </div>
                        
						<div class="form-group">
							<label class="col-sm-2 control-label">N&uacute;mero de Documento: </label>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-md-2">
									<input type="text" class="form-control" maxlength="8" placeholder="N&uacute;mero de DNI"
									name="dni" tabindex="1" value="<?PHP echo $prac['dni']; ?>" >
									</div>
								</div>	
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Paciente: </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="<?PHP echo $prac['paciente']; ?>" name="paciente" tabindex="6"
                                onkeyup="javascript:this.value=this.value.toUpperCase();" required> 
							</div>
						</div>
                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">Recargos: </label>
							<div class="col-sm-10">
								<div class="block-inner">
									<label class="checkbox-inline checkbox-primary">
										> 65: <input type="checkbox" class="styled" name="rec_mas65" value="rec_mas65" tabindex="7"
                                        <?PHP if($prac['rec_mas65']==1){?> checked <?PHP }; ?>>
									</label>

									<label class="checkbox-inline checkbox-primary">
										< 3: <input type="checkbox" class="styled" name="rec_men3" value="rec_men3" tabindex="8"
                                        <?PHP if($prac['rec_men3']==1){?> checked <?PHP }; ?>>
									</label>
    
                                    <label class="checkbox-inline checkbox-primary">
										Urgencia: <input type="checkbox" class="styled" name="rec_urg" tabindex="9"
                                        <?PHP if($prac['rec_urg']==1){?> checked <?PHP }; ?>>
									</label>
  
                                    <label class="checkbox-inline checkbox-primary">
										Fin de Semana: <input type="checkbox" class="styled" name="rec_fds" tabindex="10"
                                        <?PHP if($prac['rec_fds']==1){?> checked <?PHP }; ?>>
									</label>
  
                                    <label class="checkbox-inline checkbox-primary">
										Feriado: <input type="checkbox" class="styled" name="rec_fer" tabindex="11"
                                        <?PHP if($prac['rec_fer']==1){?> checked <?PHP }; ?>>
									</label>
  
                                    <label class="checkbox-inline checkbox-primary">
										Nocturno: <input type="checkbox" class="styled" name="rec_noc" tabindex="12"
                                        <?PHP if($prac['rec_noc']==1){?> checked <?PHP }; ?>>
									</label>
								</div>
							</div>
						</div>
                        
						<div class="form-group">
							<label class="col-sm-2 control-label">Observaci&oacute;n: </label>
							<div class="col-sm-10">
								<textarea rows="5" cols="5" class="form-control"
                                placeholder="Detalle" name="observ" tabindex="12"><?PHP echo $prac['observ']; ?></textarea>
							</div>
						</div>
                        <input type="hidden" id="fn" name="fn"  value="prac_main_u"/>
                        <input type="hidden" id="id" name="id"  value="<?PHP echo $_REQUEST['id']; ?>"/>
    					<input type="hidden" id="alta_usu" name="alta_usu" value="Admin"/>
						<div class="form-actions text-right">
                        <input type="reset" value="Cancelar" onClick="location.replace('facturacion.php');" class="btn btn-danger">
                       	<input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
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