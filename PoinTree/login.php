<?php
include 'conecta.php';
$email = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

$sql = "select * from usuario where email = '$email' and senha = '$senha'";
$query = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($query);

if ($row > 0) {
	
	$sql = mysqli_query($conexao, "select * from usuario where email='$email' and senha='$senha'");
	$userTable = mysqli_fetch_array($sql);
	$nome = $userTable["nome"];
	
	session_start();
	if(strpos($nome, " ")){
	$_SESSION["user"] = substr($nome,0,strpos($nome, " "));
	}else{
	$_SESSION["user"] = substr($nome,0,strlen($nome));	
	}
	
	header('Refresh:0;url=main/index.php');
}
else{
	echo '
		<center>
		<h1>Senha ou Email inválidos</h1>
		<h3>Redirecionando...</h3>
		</center>
	';
echo '<script>setTimeout(function(){window.history.go(-1);},2000);</script>';
}
?>