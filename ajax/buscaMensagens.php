<?php
    include("../db.php");

    $login_cookie = $_COOKIE['login'];
    if (!isset($login_cookie)) {
        header("Location: login.php");
    }

    $qtdMensagens = mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM mensagens WHERE para='$login_cookie' AND  status=0"));
    
    if($qtdMensagens > 0){
        echo "<span class='badge badge-pill badge-primary'>".$qtdMensagens."</span>";
    }
?>