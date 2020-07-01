<?php
	$dbServidor = "127.0.0.1:5354";
	$dbUsuario  = "root";
	$dbSenha    = "";
	$dbBanco    = "redeSocial";
	
	$conexao = mysqli_connect($dbServidor, $dbUsuario, $dbSenha, $dbBanco);
	
	if (mysqli_connect_errno($conexao))
	{
		echo "<h1>Erro ao conectar-se ao banco de dados. </h1>";
		die();
	}	
?>