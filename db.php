<?php
	$dbServidor = "127.0.0.1:3307";
	$dbUsuario  = "root";
	$dbSenha    = "";
	$dbBanco    = "redeSocial";
	
	$conexao = mysqli_connect($dbServidor, $dbUsuario, $dbSenha, $dbBanco);
	
	if (mysqli_connect_errno($conexao))
	{
		echo "<h1>Problema ao conectar com o banco! Verifique.</h1>";
		die();
	}
?>