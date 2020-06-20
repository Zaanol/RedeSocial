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

	/*error_reporting(E_ALL ^ E_DEPRECATED);
	$connect = mysql_connect("127.0.0.1:3307","root","") or die("Não foi possível ligar ao servidor...");
	$db = mysql_select_db("redeSocial", $connect) or die("Impossível entrar na Base de dados");*/	
?>