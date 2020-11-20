<?php

$host = "localhost";
$user = "root";
$pass = ""; 
$banco = "pointree";

$conexao = mysqli_connect($host, $user, $pass, $banco)or die(mysqli_error());

mysqli_select_db($conexao,$banco);
mysqli_set_charset($conexao, "utf8");

?>