<?php
    include("../db.php");

    $login_cookie = $_COOKIE['login'];
    if (!isset($login_cookie)) {
        header("Location: login.php");
    }

    $infoo = mysqli_query($conexao, "SELECT * FROM users WHERE email='$login_cookie'");
    $info = mysqli_fetch_assoc($infoo);

    $id = $_GET['id'];

    $usuarioAmigo = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'"));

    $email = $usuarioAmigo['email'];

    $sql = mysqli_query($conexao, "SELECT * FROM mensagens WHERE para='$login_cookie' AND de='$email' OR de='$login_cookie' AND para='$email'");

    $mysql = "UPDATE mensagens SET status=1 WHERE para='$login_cookie' AND de='$email'";
    $update = mysqli_query($conexao, $mysql);

    if ($usuarioAmigo["img"] == "") {
        $amigoImagem = "img/user.png";
    }else{
        $amigoImagem = "upload/".$usuarioAmigo["img"];
    }

    $mensagens = "";

    while ($msg = mysqli_fetch_assoc($sql)) {
		if ($msg['de'] == $login_cookie) {
			if ($msg["imagem"] == "") {
                $mensagens .= '<div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>'.$msg["texto"].'</p>
                            <span class="time_date">'.$msg["data"].'</span>
                        </div>
                    </div>';
			} else {
				$mensagens .= '<div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>'.$msg["texto"].'</p>
                            <img src="upload/'.$msg["imagem"].'" width="335">
                            <span class="time_date">'.$msg["data"].'</span>
                        </div>
                    </div>';
			}
		} else {
            if ($msg["imagem"] == "") {
                $mensagens .= '<div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="'.$amigoImagem.'" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                        <p>'.$msg["texto"].'</p>
                                        <span class="time_date">'.$msg["data"].'</span></div>
                                    </div>
                                </div>';
			} else {
                $mensagens .= '<div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="'.$amigoImagem.'" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                        <p>'.$msg["texto"].'</p>
                                        <img src="upload/'.$msg["imagem"].'" width="335">
                                        <span class="time_date">'.$msg["data"].'</span></div>
                                    </div>
                                </div>';
			}
		}
    }

    echo '<div class="head-box-1">
            <ul class="msg-box list-inline text-left d-inline-block float-left">
                <li> <i class="fas fa-arrow-left" id="back"></i> </li> 
                <li> <img src="'.$amigoImagem.'" alt="" width="40px"> <span> '.$usuarioAmigo["nome"].' </span></li> 
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

        <div class="msg_history" id="msg_history">'.$mensagens.'<a href="#" id="bottom"></a></div>';
?>
<script>var elem = document.getElementById('msg_history');
    elem.scrollTop = elem.scrollHeight;
</script>