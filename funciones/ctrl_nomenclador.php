<?PHP include('conexion.php');

//Filtros   
    $bcodigo = "";
    $bnombre = "";
    $bcomple = "";

    if (isset($_REQUEST['bcodigo'])){ if(!empty($_REQUEST['bcodigo'])){ $bcodigo = " and codigo LIKE '%". $_REQUEST['bcodigo'] . "%'";}}
    if (isset($_REQUEST['bnombre'])){ if(!empty($_REQUEST['bnombre'])){ $bnombre = " and nombre LIKE '%". $_REQUEST['bnombre'] . "%'";}}
    if (isset($_REQUEST['bcomple'])){ if(!empty($_REQUEST['bcomple'])){ $bcomple = " and complejidad = '". $_REQUEST['bcomple'] . "'";}}
    $filtro = $bcodigo . $bnombre . $bcomple;



$querynn="SELECT * FROM nomenclador WHERE complejidad > 0 AND baja = 0 $filtro";
$rtsnn = mysqli_query($conexion, $querynn); 
$listadonn = "<div class='panel-heading'><h6 class='panel-title'><i class='icon-table'></i> Practicas</h6></div>";
$listadonn .= "<div class='datatable'>";
$listadonn .= "<table class='table'>";
$listadonn .= "<thead>";
//$listadonn .= "<tr>";
//$listadonn .= "<th>C&oacute;digo</th>";
//$listadonn .= "<th>Nombre</th>";
//$listadonn .= "<th>Complejidad</th>";
//$listadonn .= "<th></th>";
//$listadonn .= "</tr>";

$listadonn .= "<tr>";
$listadonn .= "<th><input type='text' class='form-control' value='' placeholder='C&oacute;digo' name='bcodigo'></th>";
$listadonn .= "<th><input type='text' class='form-control' value='' placeholder='Nombre Pr&aacute;ctica' name='bnombre'></th>";
$listadonn .= "<th><input type='text' class='form-control' value='' placeholder='Complejidad' name='bcomple'></th>";
$listadonn .= "<th>";
$listadonn .= "<input type='submit' value='Buscar' class='btn btn-primary'>";
$listadonn .= "</th>";
$listadonn .= "</tr>";

$listadonn .= "</thead>";
$listadonn .= "<tbody>";
while($nn=mysqli_fetch_assoc($rtsnn)) { 
$listadonn .= "<tr>";
$listadonn .= "<td>" . $nn['codigo'] . "</td>";
$listadonn .= "<td>" . $nn['nombre'] . "</td>";
$listadonn .= "<td>" . $nn['complejidad'] . "</td>";
$listadonn .= "<td>";
$listadonn .= "<div class='table-controls'>";
$listadonn .= "<a href='nomenclador_abm.php?id=" . $nn['id'] . "&codigo=" . $nn['codigo']. "&nombre=" . utf8_encode($nn['nombre']) . "&comple=" . $nn['complejidad'] . "&fn=nn_u' class='btn btn-info btn-icon btn-xs tip' title='Editar'><i class='icon-pencil'></i></a>";
$listadonn .= "</div>";
$listadonn .= "</td>";
$listadonn .= "</tr>";
}
$listadonn .= "</tbody>";
$listadonn .= "</table>";
$listadonn .= "</div>";


?>