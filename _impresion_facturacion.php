<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<script type="text/javascript">
	function mostrar(){
		document.getElementById('oculto1').style.display = 'block';
	}
</script>
<style media='print'>
input{display:none;} /* esto oculta los input cuando imprimes */
option{display:none;} /* esto oculta los option cuando imprimes */
breadcrumbs{display:none;}
div#breadcrumbs{display:none;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	position: absolute;
	height: 100%;
	width: 100%;} /* esto oculta los div cuando imprimes */
div#noprint{display:none;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	position: absolute;
	height: 100%;
	width: 100%;} /* esto oculta los div cuando imprimes */	
div#bottom{display:none;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	position: absolute;
	height: 100%;
	width: 100%;} /* esto oculta los div cuando imprimes */		
</style>
<body>
<?PHP error_reporting (0); 
include('funciones/login_ctrl.php'); 
include('funciones/ctrl_practicas.php');
$cantidad = mysqli_num_rows($result);?>
<div align="center">Facturaci&oacute;n de 
<b><?PHP echo $_SESSION['sesion_ProfNom'];?></b> 
Periodo 
<b><?PHP echo str_pad($_SESSION['sesion_PeridoM'], 2, "0", STR_PAD_LEFT);?>/<?PHP echo $_SESSION['sesion_PeridoA'];?></b><br>
Listado de&nbsp;<?PHP echo $cantidad;?>&nbsp;Cirugias</div>
<table border="1" style="font-size:12px" width="100%" cellspacing="2">
<thead>
    <tr>
        <th>DNI</th>
		<th>Nombre</th>
        <th>Lugar</th>
        <th>Obra Social/Coseguro</th>
        <th align="left">C&oacute;digo | Descripci&oacute;n | Complejidad | Porcentaje</th>
        <th>Recargo</th>
        <th>Bono</th>
        <th>Fecha</th>
		<th>Observaci&oacute;n</th>
    </tr>
</thead>
<?PHP include('funciones/ctrl_practicas.php');
while($fac=mysqli_fetch_assoc($result)){?>
<tbody>
    <tr valign="top">
		<td align="center"><?PHP if($fac['dni']!=0) { echo $fac['dni'];}?></td>
        <td align="center"><?PHP echo utf8_encode($fac['paciente']);?></td>
        <td align="center"><?PHP echo utf8_encode($fac["inom"]); ?></td>
        <td align="center"><?PHP echo $fac['onom']."/".$fac['cnom']; ?></td>
        <td>
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
                    <td><?PHP echo $det['codigo'] ?></td>
                    <td>
                        <?PHP
                        /*$ancho = strlen($det['nn_nom']);
                        echo substr(utf8_encode($det['nn_nom']),1,40); 
                        if($ancho>100){echo "...";}else{echo "";}; */
						
						 echo utf8_encode($det['nn_nom']);?>
                    </td>
                    <td align="right"><?PHP echo $det['nn_com'] ?></td>
                    <td align="right"><?PHP echo $det['porcentaje'] ?>%</td>
                </tr>
            <?PHP }?>
            </table>
        </td>
        <td align="center" valign="top">
            <?PHP echo ($fac['rec_mas65']+$fac['rec_men3']+$fac['rec_urg']+$fac['rec_fds']+$fac['rec_fer']+$fac['rec_noc']) * 20  . "% <br>"; ?>
            M<?PHP echo $fac['rec_mas65'] * 20; ?> <b>|</b>
            m<?PHP echo $fac['rec_men3'] * 20; ?> <b>|</b>
            u<?PHP echo $fac['rec_urg'] * 20; ?> <b>|</b>
            fi<?PHP echo $fac['rec_fds'] * 20; ?> <b>|</b>
            fe<?PHP echo $fac['rec_fer'] * 20; ?> <b>|</b>
            n<?PHP echo $fac['rec_noc'] * 20; ?>
        </td>
        <td align="center"><?PHP echo $fac['id_bono'];?></td>
        <td align="center"><?PHP echo date('d/m/Y',strtotime($fac['fecha']));?></td>
		<td align="center"><?PHP echo $fac['observ'];?></td>
    </tr>
</tbody>
 <?PHP }?>
</table>
<div id="noprint" align="center">
	<input type='button' onclick='window.print();' value='Imprimir' />
	<input type='button' onclick='window.close();' value='Cerrar' />
</div>
</body>
</html>
