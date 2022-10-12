<?PHP
if(!isset($_SESSION['sesion_UserId'])) { ?>
     <script> location.replace("./login.php"); </script>
<?PHP } 

if(!isset($_SESSION['sesion_PeridoM'])) {?>
     <script> location.replace("periodos.php"); </script>
<?PHP } ?>

