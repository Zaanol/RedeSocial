<?php
    include "../db.php";
    $login_cookie = $_COOKIE['login'];
    if (!isset($login_cookie)) {
        header("Location: login.php");
    }

	$msg = $_POST['text'];
	$data = date("Y/m/d");
	$email = $_POST['email'];

	if ($msg == "") {
		echo "<h3>Não podes enviar uma mensagem em branco!</h3>";
	} else {
		$query = "INSERT INTO mensagens (`de`,`para`,`texto`,`status`,`data`) VALUES ('$login_cookie','$email','" . mysqli_real_escape_string($conexao, $msg) . "',0,'$data')";
		$data = mysqli_query($conexao, $query);
		if ($data) {
			
		} else {
			echo "<h3>Algo não correu muito bem ao enviar a tua mensagem... Desculpa</h3>" . mysqli_error();
		}
	}
?>