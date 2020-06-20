<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
		<link href='css/util.css' rel='stylesheet' type='text/css'>
		
	</head>
	<body>
		<div class="wrapper fadeInDown">
			<div id="formContent">
				<br>
				<?php
					include("db.php");
					
					$email = "";
					$foco = "email";
					if (isset($_POST['entrar'])) {
						$email = $_POST['email'];
						$pass = $_POST['pass'];
						$verifica = mysqli_query($conexao, "SELECT * FROM users WHERE email = '$email' AND password='$pass'");
						if (mysqli_num_rows($verifica)<=0) {
							echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							<strong>Falha no Login!</strong> E-mail e/ou senha incorreto(s)!
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
						</div>";
						$foco = "password";
					}else{
						setcookie("login",$email);
						header("location: ./");
					}
					}
				?>

				<div>
				<img src="img/logo.png" id="icon" alt="User Icon" />
				</div>

				<form method="POST">
				<input type="text" id="email" name="email" placeholder="Endereço e-mail" value="<?php echo $email;?>">
				<input type="password" id="password" name="pass" placeholder="Senha">
				<input type="submit" value="Entrar" name="entrar" value="Entrar">
				</form>

				<div id="formFooter">
				<a class="underlineHover" href="#">Esqueci a senha</a><br>
				<a class="underlineHover" href="registrar.php">Cadastrar-se</a>
				</div>
			</div>
		</div>
	</body>
	<script>document.getElementById("<?php echo $foco;?>").focus()</script>
</html>