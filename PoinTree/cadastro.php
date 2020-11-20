<?php
include 'conecta.php';
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$cpf = mysqli_real_escape_string($conexao,$_POST['cpf']);
$email = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);
$cep = mysqli_real_escape_string($conexao,$_POST['cep']);
$rua = mysqli_real_escape_string($conexao,$_POST['rua']);
$bairro = mysqli_real_escape_string($conexao,$_POST['bairro']);
$cidade = mysqli_real_escape_string($conexao,$_POST['cidade']);
$estado = mysqli_real_escape_string($conexao,$_POST['uf']);

$firstName = substr($nome,0,strpos($nome, " "));
if($firstName == "Administrador"){
		echo '
	<center>
	<h1>Primeiro nome Bloqueado</h1>
	<h3>Por favor escolha um outro nome [Redirecionando...]</h3>
	</center>
	';
	echo '<script>setTimeout(function(){window.history.go(-1);},2000);</script>';
}

if (empty($nome) || empty($email) || empty($cep) || empty($senha) || empty($cpf))
{
	echo '<script>setTimeout(function(){window.history.go(-1);},2000);</script>';
	exit();
}

$sql = mysqli_query($conexao, "select * from usuario where cpf=$cpf or email='$email'");
$row = mysqli_num_rows($sql);

if($row > 0){
	
	echo '
	<center>
	<h1>Usuário já existente!</h1>
	<h3>Por favor escolha um email ou CPF válido [Redirecionando...]</h3>
	</center>
	';
	echo '<script>setTimeout(function(){window.history.go(-1);},2000);</script>';

	
}else{

$sql = "insert into usuario values('$nome', $cpf, '$email','$senha', $cep, '$rua', '$bairro', '$cidade', '$estado', NOW());";
$query = mysqli_query($conexao, $sql);

		if($query){
			
			session_start();

			if(strpos($nome, " ")){
			$_SESSION["user"] = substr($nome,0,strpos($nome, " "));
			}else{
			$_SESSION["user"] = substr($nome,0,strlen($nome));	
			}
			
			header('Refresh:0;url=main/index.php');
			
		}else{
				echo '
				<center>
				<h1>Ocorreu algum erro, por favor tente mais tarde</h1>
				<h3>Redirecionando...</h3>
				</center>
				';
				echo '<script>setTimeout(function{}(window.history.go(-1)),2000);</script>';
		}

}
?>