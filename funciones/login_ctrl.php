<?PHP session_start();
if(!isset($_SESSION['sesion_UserId'])) { ?>
     <script> location.replace("./login.php"); </script>
<?PHP } ?>

