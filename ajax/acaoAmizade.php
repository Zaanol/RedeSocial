<?php
	include("../db.php");

	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
    }

    $id = $_POST['id'];
    $acao = $_POST['acao'];

    if ($acao == "aceitar"){
        $amigo = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'"));
		$email = $amigo['email'];
		mysqli_query($conexao, "UPDATE amizades SET `aceite`='sim' WHERE `de`='$email' AND para='$login_cookie'");
    }else if ($acao == "recusar"){
		$amigo = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'"));
		$email = $amigo['email'];

		mysqli_query($conexao, "DELETE FROM amizades WHERE `de`='$login_cookie' AND para='$email' OR `para`='$login_cookie' AND de='$email'");
	}
?>