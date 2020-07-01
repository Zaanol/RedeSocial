<?php
include("header.php");

$id = $_GET["id"];
$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
$saber = mysqli_fetch_assoc($saberr);
$email = $saber["email"];

if ($email == $login_cookie) {
	header("Location: myprofile.php");
}

$pubs = mysqli_query($conexao, "SELECT * FROM pubs WHERE user='$email' ORDER BY id desc");

if (isset($_POST['add'])) {
	add();
}

function add()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
	$id = $_GET['id'];
	$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
	$saber = mysqli_fetch_assoc($saberr);
	$email = $saber['email'];
	$data = date("Y/m/d");

	$ins = "INSERT INTO amizades (`de`,`para`,`data`) VALUES ('$login_cookie','$email','$data')";
	mysqli_query($conexao, "INSERT INTO notificacoes (`userde`,`userpara`,`tipo`,`data`) VALUES ('$login_cookie','$email','3','$data')");
	$conf = mysqli_query($conexao, $ins) or die(mysqli_error());
	if ($conf) {
		header("Location: profile.php?id=" . $id);
	} else {
		echo "<h3>Erro ao enviar pedido...</h3>";
	}
}

if (isset($_POST['cancelar'])) {
	cancel();
}

function cancel()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
	$id = $_GET['id'];
	$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
	$saber = mysqli_fetch_assoc($saberr);
	$email = $saber['email'];

	$ins = "DELETE FROM amizades WHERE `de`='$login_cookie' AND para='$email'";
	$conf = mysqli_query($conexao, $ins) or die(mysqli_error());
	if ($conf) {
		mysqli_query($conexao, "UPDATE notificacoes SET status = 1 WHERE userpara = '$email' AND userde = '$login_cookie' AND tipo = 3");
		header("Location: profile.php?id=" . $id);
	} else {
		echo "<h3>Erro ao cancelar pedido...</h3>";
	}
}

if (isset($_POST['remover'])) {
	remove();
}

if (isset($_POST['chat'])) {
	header("Location: chat.php?from=" . $id);
}

function remove()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
	$id = $_GET['id'];
	$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
	$saber = mysqli_fetch_assoc($saberr);
	$email = $saber['email'];

	$ins = "DELETE FROM amizades WHERE `de`='$login_cookie' AND para='$email' OR `para`='$login_cookie' AND de='$email'";
	$conf = mysqli_query($conexao, $ins) or die(mysqli_error());
	if ($conf) {
		header("Location: profile.php?id=" . $id);
	} else {
		echo "<h3>Erro ao excluir amigo...</h3>";
	}
}

if (isset($_POST['aceitar'])) {
	aceitar();
}

function aceitar()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
	$id = $_GET['id'];
	$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
	$saber = mysqli_fetch_assoc($saberr);
	$email = $saber['email'];

	$ins = "UPDATE amizades SET `aceite`='sim' WHERE `de`='$email' AND para='$login_cookie'";
	$conf = mysqli_query($conexao, $ins) or die(mysqli_error());
	if ($conf) {
		header("Location: profile.php?id=" . $id);
	} else {
		echo "<h3>Erro ao excluir amigo...</h3>";
	}
}
?>
<html>
<header>
	<style type="text/css">
		h2 {
			text-align: center;
			padding-top: 30px;
			color: #FFF;
		}

		img#profile {
			width: 100px;
			height: 100px;
			display: block;
			margin: auto;
			margin-top: 30px;
			border: 5px solid #007fff;
			background-color: #007fff;
			border-radius: 10px;
			margin-bottom: -30px;
		}

		div#menu {
			width: 400px;
			height: 120px;
			display: block;
			margin: auto;
			border: none;
			border-radius: 5px;
			background-color: #007fff;
			text-align: center;
		}

		div#menu input {
			height: 25px;
			border: none;
			border-radius: 3px;
			background-color: #FFF;
			cursor: pointer;
		}

		div#menu input[name="add"] {
			margin-right: 20px;
		}

		div#menu input[name="aceitar"] {
			margin-right: 20px;
		}

		div#menu input[name="remover"] {
			margin-right: 20px;
		}

		div#menu input[name="cancelar"] {
			margin-right: 20px;
		}

		div#menu input[name="chat"] {
			margin-right: 20px;
		}

		div#menu input:hover {
			height: 25px;
			border: none;
			border-radius: 3px;
			background-color: transparent;
			cursor: pointer;
			color: #FFF;
		}

		div.pub {
			width: 400px;
			min-height: 70px;
			max-height: 1000px;
			display: block;
			margin: auto;
			border: none;
			border-radius: 5px;
			background-color: #FFF;
			box-shadow: 0 0 6px #A1A1A1;
			margin-top: 30px;
		}

		div.pub a {
			color: #666;
			text-decoration: none;
		}

		div.pub a:hover {
			color: #111;
			text-decoration: none;
		}

		div.pub p {
			margin-left: 10px;
			content: #666;
			padding-top: 10px;
		}

		div.pub span {
			display: block;
			margin: auto;
			width: 380px;
			margin-top: 10px;
		}

		div.pub img {
			display: block;
			margin: auto;
			width: 100%;
			margin-top: 10px;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
		}
	</style>
</header>

<body>
	<?php
	if ($saber["img"] == "") {
		echo '<img src="img/user.png" id="profile">';
	} else {
		echo '<img src="upload/' . $saber["img"] . '" id="profile">';
	}
	?>
	<div id="menu">
		<form method="POST">
			<h2><?php echo $saber['nome'] . " (" . $saber['apelido'] . ")"; ?></h2><br />
			<?php
			$amigos = mysqli_query($conexao, "SELECT * FROM amizades WHERE de='$login_cookie' AND para='$email' OR para='$login_cookie' AND de='$email'");
			$amigoss = mysqli_fetch_assoc($amigos);
			if (mysqli_num_rows($amigos) >= 1 and $amigoss["aceite"] == "sim") {
				echo '<input type="submit" value="Remover amigo" name="remover"><input type="submit" name="chat" value="Conversar"><input type="submit" name="denunciar" value="Denunciar">';
			} elseif (mysqli_num_rows($amigos) >= 1 and $amigoss["aceite"] == "nao" and $amigoss["para"] == $login_cookie) {
				echo '<input type="submit" value="Aceitar pedido" name="aceitar"><input type="submit" name="chat" value="Conversar"><input type="submit" name="denunciar" value="Denunciar">';
			} elseif (mysqli_num_rows($amigos) >= 1 and $amigoss["aceite"] == "nao" and $amigoss["de"] == $login_cookie) {
				echo '<input type="submit" value="Cancelar pedido" name="cancelar"><input type="submit" name="chat" value="Conversar"><input type="submit" name="denunciar" value="Denunciar">';
			} else {
				echo '<input type="submit" value="Adicionar amigo" name="add"><input type="submit" name="chat" value="Conversar"><input type="submit" name="denunciar" value="Denunciar">';
			}
			?>
		</form>
	</div>
	<?php
	$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE email='$email'");
	$saber = mysqli_fetch_assoc($saberr);
	$nome = $saber['nome'] . " (" . $saber['apelido'] . ")";
	$amigoss = mysqli_query($conexao, "SELECT * FROM amizades WHERE de='$login_cookie' AND para='$email' AND aceite='sim' OR para='$login_cookie' AND de='$email' AND aceite='sim'");
	$amigos = mysqli_num_rows($amigoss);
	if ($amigos == 1) {
		while ($pub = mysqli_fetch_assoc($pubs)) {
			$email = $pub['user'];
			$id = $pub['id'];

			if ($pub['imagem'] == "") {
				echo '<div class="pub" id="' . $id . '">
						<p><a href="profile.php?id=' . $saber['id'] . '">' . $nome . '</a> - ' . $pub["data"] . '</p>
						<span>' . $pub['texto'] . '</span><br />
					</div>';
			} else {
				echo '<div class="pub" id="' . $id . '">
						<p><a href="profile.php?id=' . $saber['id'] . '">' . $nome . '</a> - ' . $pub["data"] . '</p>
						<span>' . $pub['texto'] . '</span>
						<img src="upload/' . $pub["imagem"] . '" />
					</div>';
			}
		}
	} elseif ($amigos == 0) {
		echo '<div class="pub" id="' . $id . '">
						<p>Aviso sobre as amizades...</p>
						<span>Tens de ser amigo(a) de ' . $nome . ' para poderes ver as suas publicações...</span><br />
					</div>';
	}
	?>
	<br />
	<div id="footer">
		<p>&copy; Rede Social, 2020 - Todos os direitos reservados</p>
	</div><br />
</body>

</html>