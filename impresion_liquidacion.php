<?PHP
session_start();
include('funciones/login_ctrl.php'); 
include('funciones/ctrl_practicas.php');
?>
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
<?PHP
$cantidad = mysqli_num_rows($result);?>
<div align="center">Liquidaci&oacute;n de 
<b><?PHP echo $_SESSION['sesion_ProfNom'];?></b> 
Periodo 
<b><?PHP echo str_pad($_SESSION['sesion_PeridoM'], 2, "0", STR_PAD_LEFT);?>/<?PHP echo $_SESSION['sesion_PeridoA'];?></b><br>
Listado de&nbsp;<?PHP echo $cantidad;?>&nbsp;Cirugias</div>
<table border="1" style="font-size:12px" width="100%" cellspacing="2">
<thead>
    <tr>
        <th>Bono</th>
        <th>Fecha</th>
		<th>DNI</th>
        <th>Nombre</th>
        <th>Institucion</th>
        <th>Obra Social/Coseguro</th>
        <th>Nro.Liquidacion</th>
        <!--th>Fec.Liquidacion</th>
        <th>Imp.Liquidacion</th -->
        <th>Observaci&oacute;n</th>
    </tr>
</thead>
<?PHP include('funciones/ctrl_practicas.php');
while($fac=mysqli_fetch_assoc($result)){?>
<tbody>
    <tr valign="top">
    	<td align="center" nowrap><?PHP echo $fac['id_bono'];?></td>
        <td align="center" nowrap><?PHP echo date('d/m/Y',strtotime($fac['fecha']));?></td>
		<td align="center"  nowrap><?PHP if($fac['dni']!=0) { echo $fac['dni'];}?></td>
        <td align="center" nowrap><?PHP echo utf8_encode($fac['paciente']);?></td>
        <td align="center" nowrap><?PHP echo utf8_encode($fac["inom"]); ?></td>
        <td align="center" nowrap><?PHP echo $fac['onom']."/".$fac['cnom']; ?></td>
        <td align="center" nowrap><?PHP if($fac['liquidacion_nro']!=0){ echo $fac['liquidacion_nro']; } ?></td>
        <!--td nowrap><?PHP // if($fac['liquidacion_nro']!=0){ echo $fac['liquidacion_fec']; } ?></td -->
        <!-- td nowrap><?PHP // if($fac['liquidacion_imp']!=0){ echo $fac['liquidacion_imp']; } ?></td-->
        <td nowrap><?PHP echo $fac['liquidacion_obs'];?></td>
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
