<?php
	include("db.php");

	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}

	mysqli_query($conexao, "UPDATE notificacoes SET status = 1 WHERE userpara = '$login_cookie' AND status = 0");

	$pubs = mysqli_query($conexao, "SELECT * FROM amizades WHERE para='$login_cookie' AND aceite='nao' ORDER BY id desc");
	$notificacoes = mysqli_query($conexao, "SELECT * FROM notificacoes WHERE userpara='$login_cookie' ORDER BY id desc");
?>
<html>

<body>
	<div class="col align-self-center">
	<center>
	<h3>Notificações</h3><hr>
	<?php
		if (mysqli_num_rows($pubs)>=1) {
			while ($pub=mysqli_fetch_assoc($pubs)) {
				$email = $pub['de'];
				$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE email='$email'");
				$saber = mysqli_fetch_assoc($saberr);
				$nome = $saber['nome']." (".$saber['apelido'].")";
				$id = $pub['id'];

				echo '<div id="'.$id.'">
					<div class="card">
						<h5 class="card-header">Solicitação de '.$nome.'</h5>
						<div class="card-body">
							<h5 class="card-title"><a href="profile.php?id='.$saber['id'].'">Ver perfil de '.$nome.'</a></h5>
							<button type="submit" onclick="acaoAmizade('.$saber['id'].', \'aceitar\')" class="btn btn-primary">
								Sim, aceito
							</button>
							<button type="submit" onclick="acaoAmizade('.$saber['id'].', \'recusar\')" class="btn btn-primary">
								Não, obrigado
							</button>
						</div>
					</div>
				</div>';
			}
		}
	?>
	<?php
		if (mysqli_num_rows($notificacoes)>=1) {
			while ($not=mysqli_fetch_assoc($notificacoes)) {
				$email = $not['userde'];
				$saberr = mysqli_query($conexao, "SELECT * FROM users WHERE email='$email'");
				$saber = mysqli_fetch_assoc($saberr);
				$nome = $saber['nome']." (".$saber['apelido'].")";
				$id = $not['id'];

				if ($not['tipo']=="1") {
					echo '<br /><div class="not" id="'.$id.'">
						<a href="myprofile.php?id='.$not['post'].'">'.$nome.' gostou da tua publicação</a>
					</div>';
				}elseif($not['tipo']=="2"){
					echo '<br /><div class="not" id="'.$id.'">
						<a href="comentarios.php?id='.$not['post'].'">'.$nome.' comentou a tua publicação</a>
					</div>';
				}
			}
			echo "<br /><h3>Não tens mais notificações...</h3>";
		}else{
			echo "<br /><h3>Não tens notificações...</h3>";
		}
	?>
	</center></div>
</body>
</html>