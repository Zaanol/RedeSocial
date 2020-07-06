<?php
    include("../db.php");

    $login_cookie = $_COOKIE['login'];
    if (!isset($login_cookie)) {
        header("Location: login.php");
    }

    $infoo = mysqli_query($conexao, "SELECT * FROM users WHERE email='$login_cookie'");
    $info = mysqli_fetch_assoc($infoo);

    $id = $_GET['from'];

    $tudo = mysqli_query($conexao, "SELECT * FROM users WHERE id='$id'");
    $saber = mysqli_fetch_assoc($tudo);

    $email = $saber['email'];

    $sql = mysqli_query($conexao, "SELECT * FROM mensagens WHERE para='$login_cookie' AND de='$email' OR de='$login_cookie' AND para='$email'");

    $mysql = "UPDATE mensagens SET status=1 WHERE para='$login_cookie' AND de='$email'";
    $update = mysqli_query($conexao, $mysql);
    
    while ($msg = mysqli_fetch_assoc($sql)) {
		if ($msg['de'] == $login_cookie) {
			if ($msg["imagem"] == "") {
				echo '<div class="bubble">
						<br />
						<span name="msg1">' . $msg["texto"] . '</span>
						<br /><br />
						<p>' . $msg["data"] . '</p>
						<br />
					</div><br />';
			} else {
				echo '<div class="bubble">
						<br />
						<span name="msg1">' . $msg["texto"] . '</span>
						<br />
						<img src="upload/' . $msg["imagem"] . '" />
						<br />
						<p>' . $msg["data"] . '</p>
						<br />
					</div><br />';
			}
		} else {
			if ($msg["imagem"] == "") {
				echo '<div class="bubble2">
						<br />
						<span name="msg1">' . $msg["texto"] . '</span>
						<br /><br />
						<p>' . $msg["data"] . '</p>
						<br />
					</div><br />';
			} else {
				echo '<div class="bubble2">
						<br />
						<span name="msg1">' . $msg["texto"] . '</span>
						<br />
						<img src="upload/' . $msg["imagem"] . '" />
						<br />
						<p>' . $msg["data"] . '</p>
						<br />
					</div><br />';
			}
		}
    }
    
    echo "<a href='#' id='bottom'></a>";
?>