<html>
	<head>
			<style>
				body {
  background-color: #ece5dc;
}
			</style>
	</head>
<body>
<?php
session_start();
if(isset($_SESSION["splash"])){unset($_SESSION["splash"]);}
$pasta="../relatorio/";
include "../splash.php";
session_destroy();
header('Refresh:2;url=../login_cadastro.php');

?>
</body>
</html>