<?php
include("header.php");

if (isset($_POST['save'])) {
	if ($_FILES["file"]["error"] > 0) {
		echo "<script language='javascript' type='text/javascript'>alert('Tens de escolher uma foto...');</script>";
	} else {
		$n = rand(0, 10000000);
		$img = $n . $_FILES["file"]["name"];

		move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . $img);
		echo "Já está!";

		$query = "UPDATE users SET `img`='$img' WHERE `email`='$login_cookie'";
		$data = mysqli_query($conexao, $query);
		if ($data) {
			header("Location: myprofile.php");
		} else {
			echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao atualizar a tua foto...');</script>";
		}
	}
}
?>
<html>
<header>
	<style type="text/css">
		body {
			background-color: #007fff;
		}

		h2 {
			margin-top: 50px;
			text-align: center;
			color: #FFF;
			font-size: 49px;
		}

		form#perfil {
			display: block;
			margin: auto;
			text-align: center;
			width: 350px;
			margin-top: 20px;
			background-color: #FFF;
			box-shadow: 0 0 10px #666;
			border-radius: 5px;
		}

		input[type="submit"] {
			border: none;
			border-radius: 3px;
			background-color: #007fff;
			cursor: pointer;
			color: #FFF;
		}

		p {
			color: #FFF;
			text-align: center;
		}
	</style>
</header>

<body>	
	<form method="POST" enctype="multipart/form-data" id="perfil">
		<br />
	
		<h3>Adicionar ou alterar a foto de perfil</h3><br /><br />
		<input type="file" name="file" /><br /><br /><br />
		<input type="submit" value="Guardar" name="save" />
		<br /><br />
	</form>
	<br /><br /><br />
	<p>&copy; Rede Social, 2020 - Todos os direitos reservados</p>
</body>

</html>