<?php
include("header.php");

$sql = mysqli_query($conexao, "SELECT * FROM mensagens WHERE para='$login_cookie' GROUP BY de ORDER BY id");

$ups = mysqli_query($conexao, "SELECT * FROM mensagens WHERE para='$login_cookie' AND  status=0");
$contagem = mysqli_num_rows($ups);

?>
<html>
	<header>
		<link href='css/chat.css' rel='stylesheet' type='text/css'>
	</header>
	<body>
		<br><br>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="chat-list-box">
							<div class="head-box">
								<ul class="list-inline text-left d-inline-block float-left">
									<li>
										<img src="<?php echo $imagemUsuario ?>" alt="" width="50px"> <span><?php echo $usuario["nome"]; ?></span>
									</li> 
								</ul>
								<ul class="flat-icon list-inline text-right d-inline-block float-right">
									<li> <a href="#"> <i class="fas fa-search"></i> </a> </li> 
									<li> <a href="#"> <i class="fas fa-ellipsis-v"></i> </a> </li> 
								</ul>
							</div>
							
							<div class="chat-person-list">
								<ul class="list-inline">
									<?php
										while ($msg = mysqli_fetch_assoc($sql)) {
											$from = $msg["de"];
											$tudo = mysqli_query($conexao, "SELECT * FROM users WHERE email='$from'");
											$amigo = mysqli_fetch_assoc($tudo);
											$conta = mysqli_query($conexao, "SELECT * FROM mensagens WHERE de='$from' AND para='$login_cookie' AND status=0");
											$contar = mysqli_num_rows($conta);
											if ($amigo["img"] == "") {
												$amigoImagem = "img/user.png";
											}else{
												$amigoImagem = "upload/".$amigo["img"];
											}

											echo '<li> <a href="#" class="flip" onclick="selecionarAmigo('.$amigo["id"].', \''.$amigo["email"].'\')"> <img src="'.$amigoImagem.'" alt=""> <span> '.$amigo["nome"].'</span> 
												<span class="badge badge-pill badge-primary">'.$contar.'</span></a></li>';
										}
									?>
								</ul>
							</div>	
						</div>
					</div>

					<div id="idAmigo"></div>
						
					<div class="col-md-8">
						<div class="message-box" display="block">
							<div id="message-box"></div>
							<div class="send-message">
								<form name="send" id="send" method="POST">
									<textarea cols="10" rows="2" name="text" id="text" class="form-control"> </textarea>
									<input name="email" id="email" type="hidden" value=""> 
									<ul class="list-inline"> 
										<li>
											<a href="" id="attach">  <i class="fas fa-paperclip"></i> </a> 
											<div class="attachement">
												<ul class="list-inline"> 
													<li> <a href="#"> <i class="fas fa-file"></i> </a> </li> 
													<li> <a href="#"> <i class="fas fa-camera"></i> </a> </li> 
													<li> <a href="#"> <i class="fas fa-image"></i> </a> </li> 
													<li> <a href="#"> <i class="far fa-play-circle"></i> </a> </li> 
													<li> <a href="#"> <i class="fas fa-map-marker-alt"></i> </a> </li> 
													<li> <a href="#"> <i class="fas fa-id-card"></i> </a> </li> 
												</ul>
											</div> 
										</li>	  
										<li><div id="sendButtom"><i class="fas fa-paper-plane"></i></div></li>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<div id="footer">
			<p>&copy; Rede Social, 2020 - Todos os direitos reservados</p>
		</div><br />
	</body>
	<script>
		$(".message-box").hide();

		$("#attach").click(function(){
			$(".attachement").toggle();
			});

		$("#dset").click(function(){
			$(".setting-drop").toggle('1000');
		});

		function selecionarAmigo(idAmigo, emailAmigo){
			$(".message-box").hide();
			$('#message-box').load('ajax/buscaChatMensagens.php?id=' + idAmigo + '&rolar=true');
			$("#email").val(emailAmigo);
			$("#idAmigo").val(idAmigo);
			$(".message-box").show();
		}

		$("#enviarMsg").click(function(){
				console.log($('#message-box').val());
			});

		$(document).ready(function(){
			$("#back").click(function(){
				$(".message-box").hide();
			});
		});

		$('#sendButtom').click(function() {
			$.ajax({
				url: 'ajax/acaoEnviaMensagemChat.php',
				type: 'POST',              
				data: $("#send").serialize()
			});
		});


		var timeout = setInterval(buscaMensagensChat, 1000);

		function buscaMensagensChat() {
			if($('#idAmigo').val() != ""){
				$('#message-box').load('ajax/buscaChatMensagens.php?id=' + $('#idAmigo').val() + '&rolar=false');
			}
			
		}
	</script>
</html>