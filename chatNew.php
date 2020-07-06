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
										<img src="<?php echo $imagemUsuario ?>" alt="" width="50px"> <?php echo $usuario["nome"] ?>
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

											echo '<li> <a href="#" class="flip" onclick="selecionarAmigo('.$amigo["id"].')"> <img src="'.$amigoImagem.'" alt=""> <span> '.$amigo["nome"].'</span> 
												<span class="badge badge-pill badge-primary">'.$contar.'</span></a></li>';
										}
									?>
								</ul>
							</div>	
						</div>
					</div>
						
					<div class="col-md-8">
						<div class="message-box" display="block">
							<div class="head-box-1">
								<ul class="msg-box list-inline text-left d-inline-block float-left">
									<li> <i class="fas fa-arrow-left" id="back"></i> </li> 
									<li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> <span> Naveen mandwariya </span> <br> <small class="timee"> 12:45 Pm </small> </li> 
								</ul>
								
								<ul class="flat-icon list-inline text-right d-inline-block float-right">
									<li> <a href="#"> <i class="fas fa-video"></i> </a> </li>
									<li> <a href="#"> <i class="fas fa-camera"></i> </a> </li> 
									<li> 
										<a href="#" id="dset"> <i class="fas fa-ellipsis-v"></i> </a>
										<div class="setting-drop">
											<ul class="list-inline"> 
											<li> <a href="#"> My Profile</a> </li>  
											<li> <a href="#"> Setting </a> </li>
											<li> <a href="#"> Privacy Policy </a> </li>
											<li> <a href="#"> Hidden chat  </a> </li>
											<li> <a href="#"> Logout </a> </li>
											</ul>
										</div>
									</li> 
								</ul>
							</div>
							
							<div class="msg_history">
								<div class="incoming_msg">
									<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="received_msg">
										<div class="received_withd_msg">
										<p>Hi, How are you ?</p>
										<span class="time_date"> 11:01 AM    |    June 9</span></div>
									</div>
								</div>
								<div class="outgoing_msg">
									<div class="sent_msg">
										<p>Hello, i am fine thankyou, what about you ?</p>
										<span class="time_date"> 11:01 AM    |    June 9</span>
									</div>
								</div>
								<div class="incoming_msg">
									<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="received_msg">
										<div class="received_withd_msg">
										<p>I am also good thankyou!</p>
										<span class="time_date"> 11:01 AM    |    Yesterday</span></div>
									</div>
								</div>
								<div class="outgoing_msg">
									<div class="sent_msg">
										<p> ok </p>
										<span class="time_date"> 11:01 AM    |    Today</span> </div>
								</div>
								<div class="incoming_msg">
									<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="received_msg">
										<div class="received_withd_msg">
										<p> What's going on ?</p>
										<span class="time_date"> 11:01 AM    |    Today</span></div>
									</div>
								</div>
							</div>

							<div class="send-message">
								<form action="" method="">
									<textarea cols="10" rows="2" class="form-control"> </textarea>
									<ul class="list-inline"> 
										<li>
											<a href="#" id="attach">  <i class="fas fa-paperclip"></i> </a> 
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
										<li> <i class="fas fa-paper-plane"></i> </li>
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

		function selecionarAmigo(idAmigo){
			$(".message-box").hide();
			console.log(idAmigo);
			$(".message-box").show();
		}

		$(document).ready(function(){
			$("#back").click(function(){
				$(".message-box").hide();
			});
		});
	</script>
</html>