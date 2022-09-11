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

<body class="sidebar-narrow">
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
					<li><a href="index.html"><span>Inicio</span> <i class="icon-screen2"></i></a></li>
					<li>
						<a href="#"><span>Carga de Datos</span> <i class="icon-insert-template"></i></a>
						<ul>
                        	<li><a href="periodos.php">Periodos</a></li>
							<li><a href="cirugias.php">Cargar Cirugia</a></li>                            
							<li><a href="instituciones.php">Instituciones</a></li>
							<li><a href="obras_sociales.php">Obras Sociales</a></li>
                            <li><a href="coseguros.php">Coseguros</a></li>
                            <li><a href="nomenclador.php">Nomenclador</a></li>
						</ul>
					</li>
                    <li>
						<a href="#"><span>Control de Datos</span> <i class="icon-insert-template"></i></a>
						<ul>
                        	<li><a href="facturacion.php">Facturacion</a></li>
                            <li><a href="impresion.php">Impresion</a></li>
                            <li class="active"><a href="#">Liquidacion</a></li>
							<li><a href="busqueda.php">Busqueda</a></li>
							<li><a href="exportar.php">Exportar</a></li>
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
					<h3>Control de Liquidaci&oacute;n <small><?PHP echo $_SESSION['sesion_ProfNom'];?></small></h3>
				</div>
			</div>
			<!-- /page header -->

        	<!-- Form components -->
    		<form class="form-horizontal" role="form" action="funciones/abm_practicas.php" method="GET">

				<!-- Basic inputs -->
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Control de Liquidaci&oacute;n</h6></div>
	                <div class="panel-body">
                        
                        <!-- Default table -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i>
                            &nbsp;Pr&aacute;cticas</h6></div>
			                <div class="table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th style="font-size:10px">Paciente</th>
				                            <th style="font-size:10px">Lugar</th>
				                            <th style="font-size:10px">O.S./Coseguro</th>
                                            <th align="center" style="font-size:10px">
                                            C&oacute;digo | Descripci&oacute;n | Complejidad | %</th>
                                            <th style="font-size:10px">Recargo</th>
                                            <th style="font-size:10px">Bono/Fecha</th>                                            
                                            <th style="font-size:10px">Liquidacion</th>
                                            <th style="font-size:10px">Estado</th>
                                            <th style="font-size:10px"></th>
				                        </tr>
				                    </thead>
                                    <?PHP include('funciones/ctrl_practicas.php');
                                    while($fac=mysqli_fetch_assoc($result)){?>
				                    <tbody>
				                        <tr valign="top">
				                            <td valign="top" style="font-size:10px"><?PHP echo $fac['paciente']; if($fac['dni']!=0) { echo " " . $fac['dni'];}?></td>
				                            <td valign="top" style="font-size:10px"><?PHP echo utf8_encode($fac["inom"]); ?></td>
				                            <td valign="top" style="font-size:10px"><?PHP echo $fac['onom']."<br>".$fac['cnom']; ?></td>
                                            <td valign="top" style="font-size:10px">
                                            <?PHP include('funciones/conexion.php');
												$query2="SELECT
												practicas_detalle.*,
												nomenclador.nombre as nn_nom,nomenclador.complejidad as nn_com
												FROM practicas_detalle,nomenclador
												WHERE practicas_detalle.matricula = '$_SESSION[sesion_ProfMat]' 
												AND practicas_detalle.fk_id_bono = '$fac[id_bono]'
												AND practicas_detalle.codigo=nomenclador.codigo AND practicas_detalle.baja_usu = ''";
												$result2 = mysqli_query($conexion, $query2);?>
                                                <table class="table">
												<?PHP while($det=mysqli_fetch_assoc($result2)){ ?>
                                                	<tr>
                                                        <td nowrap><?PHP echo $det['codigo'] ?></td>
                                                        <td><?PHP echo utf8_encode($det['nn_nom']);?></td>
                                                        <td align="center"><?PHP echo $det['nn_com'] ?></td>
                                                        <td align="center"><?PHP echo $det['porcentaje'] ?>%</td>
                                                    </tr>
												<?PHP }?>
                                                </table>
                                            </td>
                                            <td align="center" valign="top" style="font-size:10px" nowrap>
												<?PHP echo ($fac['rec_mas65']+$fac['rec_men3']+$fac['rec_urg']+$fac['rec_fds']+$fac['rec_fer']+$fac['rec_noc']) * 20  . "% <br>"; ?>
                                            	M<?PHP echo $fac['rec_mas65'] * 20; ?> <b>|</b>
                                            	m<?PHP echo $fac['rec_men3'] * 20; ?> <b>|</b>
                                                u<?PHP echo $fac['rec_urg'] * 20; ?> <b>|</b>
                                                fi<?PHP echo $fac['rec_fds'] * 20; ?> <b>|</b>
                                                fe<?PHP echo $fac['rec_fer'] * 20; ?> <b>|</b>
                                                n<?PHP echo $fac['rec_noc'] * 20; ?>
                                            </td>
                                            <td valign="top" nowrap><?PHP echo $fac['id_bono'];?><br>
											<?PHP echo date('d/m/Y',strtotime($fac['fecha']));?></td>
                                            <td nowrap><?PHP 
												if($fac['liquidacion_nro']!=0){ 
												//echo $fac['liquidacion_nro']."<br>";
												// echo $fac['liquidacion_fec']."<br>";
												echo $fac['liquidacion_obs']; }?>
                                            </td>    
											
											<td nowrap>
												<?PHP 
													if($fac['cobrado']==0){$cob=1;}else{$cob=0;}
												?>
												
												<label>
													<input type="radio" name="cobrado" class="styled" <?PHP if($fac['cobrado']==1){ ?> checked="checked" <?PHP } ?> >
													Cobrado
												</label>
												<label>
													<input type="radio" name="cobrado" class="styled" <?PHP if($fac['cobrado']==0){ ?> checked="checked" <?PHP } ?> >
													Pendiente
												</label>
											
												<a href="funciones/abm_practicas.php?id=<?PHP echo  $fac['id'];?>&cob=<?PHP echo $cob; ?>&fn=prac_liq_c" target="_blank"
                                                class="btn btn-info btn-icon btn-xs tip">Guardar</a>
											</td>
                                            
											<td align="left">
                                            	<?PHP if($fac['liquidacion_nro']!=0){ echo "$" . $fac['liquidacion_imp']?>
												<div class="table-controls">                                            	
                                                <a href="practicas_liquidacion.php?id=<?PHP echo  $fac['id'];?>&id_bono=<?PHP 
												echo $fac['id_bono'];?>&liquidacion_nro=<?PHP 
												echo $fac['liquidacion_nro'];?>&liquidacion_fec=<?PHP 
												echo $fac['liquidacion_fec'];?>&liquidacion_imp=<?PHP 
												echo $fac['liquidacion_imp'];?>&liquidacion_obs=<?PHP 
												echo $fac['liquidacion_obs'];?>&fn=prac_liq_m"
                                                class="btn btn-success btn-icon btn-xs tip">Editar</a>
                                            	</div>
                                                <?PHP }else{ ?>
                                                <div class="table-controls">                                            	
                                                <a href="practicas_liquidacion.php?id=<?PHP echo  $fac['id'];?>&id_bono=<?PHP echo  $fac['id_bono'];?>"
                                                class="btn btn-success btn-icon btn-xs tip">Cargar Liq.</a>
                                            	</div>
                                                <?PHP } ?>
                                            </td>
				                        </tr>
				                    </tbody>
                                     <?PHP }?>
				                </table>
			                </div>
				        </div>
				        <!-- /default table -->
						<div class="form-group" align="center">
                            <div class="form-actions texlt-right">
                            <a href="impresion_liquidacion.php" target="_blank" class="btn btn-success btn-icon btn-xs tip">
                            <i class="icon-print"></i> Imprimir</a>
                            </div>
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