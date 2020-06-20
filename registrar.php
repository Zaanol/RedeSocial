<?php
	include("db.php");

	$nome = "";
	$apelido = "";
	$email = "";
	$mostrarErro = "none";
	if (isset($_POST['cadastrar'])) {
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$data = date("Y/m/d");

		$email_check = mysqli_query($conexao, "SELECT email FROM users WHERE email='$email'");

		$do_email_check = mysqli_num_rows($email_check);
		if ($do_email_check >= 1) {
			$mensagem = "Este email já está registado, realize o login <a href='login.php'>AQUI</a>";
			$mostrarErro = "block";
		}elseif ($password == '' OR strlen($password) < 8) {
			$mensagem = "A senha deve conter pelo menos 8 caracteres!";
			$mostrarErro = "block";
		}else{
			$query = "INSERT INTO users (`nome`,`apelido`,`email`,`password`,`data`) VALUES ('$nome','$apelido','$email','$password','$data')";
			echo $query;
			$data = mysqli_query($conexao, $query) or die(mysqli_error());
			echo $data;
			if ($data) {
				setcookie("login",$email);
				header("Location: ./");
			}else{
				$mensagem = "Desculpe, houve um erro interno!";
				$mostrarErro = "block";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
			<link href='css/util.css' rel='stylesheet' type='text/css'>
			<title>SociaLike | Cadastrar-se | Conecte-se ao Mundo</title>
			<link rel="shortcut icon" href="img/icone.ico" >
	</head>
	<body>
		<div class="wrapper fadeInDown">
			<div id="formContent">
				<br>
				
				<div id="mensagem" class='alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>Falha no Cadastro!</strong> <?php echo $mensagem; ?>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
				</div>

				<div>
				<img src="img/logo.png" id="icon" alt="User Icon" />
				</div>

				<form method="POST">
				<input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $nome;?>" required>
				<input type="text" id="apelido" name="apelido" placeholder="Apelido" value="<?php echo $apelido;?>" required>
				<input type="text" id="email" name="email" placeholder="Endereço e-mail" value="<?php echo $email;?>" required>
				<input type="password" id="password" name="password" placeholder="Senha" required>
				<input type="submit" value="cadastrar" name="cadastrar" value="Entrar">
				</form>

				<div id="formFooter">
				<a class="underlineHover" href="login.php">Entrar</a><br>
				</div>
			</div>
		</div>
	</body>
	<script>document.getElementById("mensagem").style.display = "<?php echo $mostrarErro; ?>";</script>
</html>