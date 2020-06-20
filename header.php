<?php
	include("db.php");

	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
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
		<link rel="shortcut icon" href="img/icone.ico" >
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
						<div class="col-sm">
							<a href="notificacoes.php" data-toggle="tooltip" title="Notificações">
								<div class="col align-self-end">
									<div id="qtdNotificacoes"></div>
								</div>
								<i class="fa fa-bell fa-2x" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm">
							<a href="myprofile.php" data-toggle="tooltip" title="Perfil"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
						</div>
						<div class="col-sm">
							<a href="#" data-toggle="tooltip" title="Configurações"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
						</div>
					</div>
				</ul>
			</div>		
		</nav>	
	</body>
	<script>
		$(document).ready(function(){
			recarregaNumeros();
		});

		var timeout = setInterval(recarregaNumeros, 1000);
		function recarregaNumeros() {
			$('#qtdMensagens').load('ajax/buscaMensagens.php');
			$('#qtdNotificacoes').load('ajax/buscaNotificacoes.php');
		}
	</script>
</html>