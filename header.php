<?php
include("db.php");

$login_cookie = $_COOKIE['login'];
if (!isset($login_cookie)) {
	header("Location: login.php");
}

$usuario = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM users WHERE email='$login_cookie'"));

if ($usuario["img"] == "") {
	$imagemUsuario = "img/user.png";
} else {
	$imagemUsuario = "upload/".$usuario['img'];
}

?>
<!DOCTYPE html>
<html>

<head>
	<link href='css/util.css' rel='stylesheet' type='text/css'>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/82b447660d.js" crossorigin="anonymous"></script>
	<script src="js/util.js" crossorigin="anonymous"></script>
	<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<title>SociaLike | Conecte-se ao Mundo</title>
	<link rel="shortcut icon" href="img/icone.ico">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<a class="navbar-brand" href="index.php">
					<img src="img/logo.png" width="60" height="60" alt="">
				</a>
			</ul>

			<ul class="navbar-nav mr-auto">
				<form method="GET" action="pesquisar.php" class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" name="query" id="query" autocomplete="off" type="search" placeholder="Pesquisar pessoas" aria-label="Search">
					<button class="btn btn-primary" type="submit">Buscar</button>
				</form>
			</ul>

			<ul class="form-inline my-2 my-lg-0">
				<div class="row align-items-end">
					<div class="col-sm">
						<a href="inbox.php" data-toggle="tooltip" title="Inbox de Conversas">
							<div class="col align-self-end">
								<div id="qtdMensagens"></div>
							</div>
							<i class="fa fa-comments fa-2x" aria-hidden="true"></i>
						</a>
					</div>
					<div class="col-sm btn-group">
						<a href="notificacoes.php" id="quadroNotificacoes" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Notificações">
							<div class="col align-self-end">
								<div id="qtdNotificacoes"></div>
							</div>
							<i class="fa fa-bell fa-2x" aria-hidden="true"></i>
						</a>
						<div class="caixaNotificacoes dropdown-menu dropdown-menu-right" id="notificacoes">

						</div>
					</div>
					<div class="col-sm btn-group">
						<a href="myprofile.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Perfil"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<button onclick="location.href='myprofile.php'" class="dropdown-item" type="button">
								<i class="fa fa-eye" aria-hidden="true"></i>
								Visualizar
							</button>
							<button onclick="location.href='settings.php'" class="dropdown-item" type="button">
								<i class="fa fa-cog" aria-hidden="true"></i>
								Configurar
							</button>
							<div class="dropdown-divider"></div>
							<button onclick="location.href='logout.php'" class="dropdown-item" type="button">
								<i class="fa fa-power-off" aria-hidden="true"></i>
								Deslogar
							</button>
						</div>
					</div>
				</div>
			</ul>
		</div>
	</nav>
</body>
<script>
	$(document).ready(function() {
		recarregaNumeros();
	});

	var timeout = setInterval(recarregaNumeros, 1000);

	function recarregaNumeros() {
		$('#qtdMensagens').load('ajax/buscaMensagens.php');
		$('#qtdNotificacoes').load('ajax/buscaNotificacoes.php');
	}

	$("#quadroNotificacoes").click(function exibeNotificacoes() {
		$('#notificacoes').load('notificacoes.php');
	});

	function acaoAmizade(id, acao) {
		$.ajax({
			type: 'post',
			url: 'ajax/acaoAmizade.php',
			data: {
				id: id,
				acao: acao
			}
		});
	}
</script>

</html>