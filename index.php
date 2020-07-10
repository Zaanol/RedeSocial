<?php
include("header.php");

$pubs = mysqli_query($conexao, "SELECT
			T.id, 
		    T.user, 
		    T.texto, 
		    T.imagem, 
		    T.data,
		    U.de,
		    U.para, 
		    U.aceite
		 FROM
		    pubs AS T,
		    amizades AS U 
		 WHERE
		    T.user = U.de AND U.para = '$login_cookie' AND U.aceite='sim'
		    OR T.user = U.para AND U.de = '$login_cookie' AND U.aceite='sim'
		    order by T.id DESC;");

if (isset($_POST['publish'])) {
	if ($_FILES["file"]["error"] > 0) {
		$texto = $_POST["texto"];
		$hoje = date("Y-m-d");

		if ($texto == "") {
			echo "<h3>Escreva algo antes de publicar</h3>";
		} else {
			$query = "INSERT INTO pubs (user,texto,data) VALUES ('$login_cookie','$texto','$hoje')";
			$data = mysqli_query($conexao, $query) or die();
			if ($data) {
				header("Location: ./");
			} else {
				echo "Algo deu errado, tente outra vez mais tarde.";
			}
		}
	} else {
		$n = rand(0, 1000000);
		$img = $n . $_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $img);

		$texto = $_POST['texto'];
		$hoje = date("Y-m-d");

		if ($texto == "") {
			echo "<h3>Escreva algo antes de publicar!</h3>";
		} else {
			$query = "INSERT INTO pubs (user,texto,imagem,data) VALUES ('$login_cookie','$texto','$img','$hoje')";
			$data = mysqli_query($conexao, $query) or die();
			if ($data) {
				header("Location: ./");
			} else {
				echo "Algo deu errado, tente outra vez mais tarde.";
			}
		}
	}
}

if (isset($_GET["love"])) {
	love();
}

function love()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	$publicacaoid = $_GET['love'];
	$data = date("Y/m/d");

	$post = mysqli_query($conexao, "SELECT * FROM pubs WHERE id='$publicacaoid'");
	$postinfo = mysqli_fetch_assoc($post);
	$userinfo = $postinfo['user'];

	$ins = "INSERT INTO loves (`user`,`pub`,`date`) VALUES ('$login_cookie','$publicacaoid','$data')";
	$conf = mysqli_query($conexao, $ins) or die(mysqli_error());
	if ($conf) {
		$not = mysqli_query($conexao, "INSERT INTO notificacoes (`userde`,`userpara`,`tipo`,`post`,`data`) VALUES ('$login_cookie','$userinfo','1','$publicacaoid','$data')");
		header("Location: index.php#" . $publicacaoid);
	} else {
		echo "<h3>Erro</h3> " . mysqli_error();
	}
}

if (isset($_GET["unlove"])) {
	unlove();
}

function unlove()
{
	include("db.php");
	$login_cookie = $_COOKIE['login'];
	$publicacaoid = $_GET['unlove'];
	$data = date("Y/m/d");

	$del = "DELETE FROM loves WHERE `user`='$login_cookie' AND `pub`='$publicacaoid'";
	$conf = mysqli_query($conexao, $del) or die(mysqli_error());
	if ($conf) {
		header("Location: index.php#" . $publicacaoid);
	} else {
		echo "<h3>Erro</h3> " . mysqli_error();
	}
}
?>
<html>
<header>
	<style type="text/css">
		div#publish {
			width: 400px;
			height: 210px;
			display: block;
			margin: auto;
			border: none;
			border-radius: 5px;
			background: #FFF;
			box-shadow: 0 0 6px #A1A1A1;
			margin-top: 30px;
			
		}

		div#publish textarea {
			width: 365px;
			height: 125px;
			display: block;
			margin: auto;
			border-radius: 5px;
			padding-left: 5px;
			padding-top: 5px;
			border-width: 1px;
			border-color: #A1A1A1;
		}

		div#publish img {
			margin-top: 10px;
			margin-left: 16px;
			width: 40px;
			cursor: pointer;
		}

		div#publish input[type="submit"] {
		
			border-radius: 3px;
			float: right;
			margin-right: 15px;
			border: none;
			margin-top: 15px;
			background: #4169E1;
			color: #FFF;
			cursor: pointer;
			padding: 15px;
			padding-top: 5px;
			padding-bottom: 5px;
		}

		div#publish input[type="submit"]:hover {
			background: #001F3F;
		}

		div.pub {
			width: 550px;
			min-height: 70px;
			max-height: 1000px;
			display: block;
			margin: auto;
			border: none;
			border-radius: 5px;
			background-color: #FFF;
			box-shadow: 0 0 6px #A1A1A1;
			margin-top: 30px;
			padding-bottom: 25px;
			
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
			margin-left: 15px;
			width: 380px;
			margin-top: 10px;
		}

		div.pub img {
			display: block;
			margin: auto;
			width: 90%;
			margin-top: 10px;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
		}

		div#love {
			width: 400px;
			height: 30px;
			display: block;
			border: none;
			border-radius: 5px;
			margin-left: 480px;
		}

		div#love p {
			color: #FFF;
			font-size: 12px;
			padding-top: 5px;
			padding-left: 5px;
		}

		div#love a {
			color: #FFF;
			font-size: 16px;
			text-decoration: none;
		}

		#comentar {
			float: right;
			margin-top: 5px;
			margin-right: 25px;
			margin-left: 18px;
			cursor: pointer;
			width: 35px;
		}
		#footer{
			color: white;
		}
	</style>
</header>

<body>
	<div id="publish">
		<form method="POST" enctype="multipart/form-data">
			<br />
			<textarea placeholder="Escreva e publique uma imagem para seus amigos..." name="texto"></textarea>
			<label for="file-input">
				<img src="img/iconeimagem.png" title="Inserir uma fotografia" />
			</label>
			<input type="submit" value="Publicar" name="publish" />

			<input type="file" id="file-input" name="file" hidden />
		</form>
	</div>
	<?php
	while ($pub = mysqli_fetch_assoc($pubs)) {
		$email = $pub['user'];
		$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE email='$email'");
		$saber = mysqli_fetch_assoc($saberr);
		$nome = $saber['nome'] . " (" . $saber['apelido'] . ")";
		$id = $pub['id'];
		$saberloves = mysqli_query($conexao, "SELECT * FROM loves WHERE pub='$id'");
		$loves = mysqli_num_rows($saberloves);

		if ($pub['imagem'] == "") {
			echo '<div class="pub" id="' . $id . '">
					<a href="comentarios.php?id=' . $id . '"><img id="comentar" src="img/iconechat.jpg" width="13" ></a>
					<p><a href="profile.php?id=' . $saber['id'] . '">' . $nome . '</a> - ' . $pub["data"] . '</p>
					<span>' . $pub['texto'] . '</span><br />
				</div>
				<center><div id="love">';
			$email_check = mysqli_query($conexao, "SELECT user FROM loves WHERE pub='$id' AND user='$login_cookie'");
			$do_email_check = mysqli_num_rows($email_check);
			if ($do_email_check >= 1) {
				$loves = $loves - 1;
				echo '<p><a href="index.php?unlove=' . $id . '">Gostei</a> | Você e mais ' . $loves . ' gostaram disto</p>';
			} else {
				echo '<p><a href="index.php?love=' . $id . '">Gostar</a> | ' . $loves . ' gostaram disto</p>';
			}
			echo '</div></center>';
		} else {
			echo '<div class="pub" id="' . $id . '">
					<a href="comentarios.php?id=' . $id . '"><img id="comentar" src="img/iconechat.jpg" width="13" ></a>
					<p><a href="profile.php?id=' . $saber['id'] . '">' . $nome . '</a> - ' . $pub["data"] . '</p>
					<span>' . $pub['texto'] . '</span>
					<img src="upload/' . $pub["imagem"] . '" />
				</div>
				<center><div id="love">';
			$email_check = mysqli_query($conexao, "SELECT user FROM loves WHERE pub='$id' AND user='$login_cookie'");
			$do_email_check = mysqli_num_rows($email_check);
			if ($do_email_check >= 1) {
				$loves = $loves - 1;
				echo '<p><a href="index.php?unlove=' . $id . '">Gostei</a> | Você e mais ' . $loves . ' gostaram disto</p>';
			} else {
				echo '<p><a href="index.php?love=' . $id . '">Gostar</a> | ' . $loves . ' gostaram disto</p>';
			}
			echo '</div></center>';
		}
	}
	?>
	<br />
	<div id="footer">
		<p>&copy; Rede Social, 2020 - Todos os direitos reservados</p>
	</div><br />
</body>

</html>