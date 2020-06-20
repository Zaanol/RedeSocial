<?php
    include("../db.php");

    $login_cookie = $_COOKIE['login'];
    if (!isset($login_cookie)) {
        header("Location: login.php");
    }
        
    $qtdNotificacoes =  mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM notificacoes WHERE userpara = '$login_cookie' AND status = 0"));

    if($qtdNotificacoes > 0){
        echo "<span class='badge badge-pill badge-primary'>".$qtdNotificacoes."</span>";
    }
?>