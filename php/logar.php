<?php

session_start();
//$usu_id = filter_input(INPUT_POST, 'usu_id', FILTER_DEFAULT);
$usu_username = filter_input(INPUT_POST, 'usu_username', FILTER_DEFAULT);
$usu_senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);

include 'conexao.php';

$sth = $db->prepare("SELECT * FROM tbl_usuario WHERE usu_username = :usu_username AND usu_senha = :usu_senha;");
$sth->bindValue(":usu_username", $usu_username);
$sth->bindValue (":usu_senha", $usu_senha);
$sth->execute();

$num = $sth->rowCount();
$rs = $sth->fetch(PDO::FETCH_OBJ);

if ($num > 0) {
    $_SESSION['usu_username'] = $rs->usu_username;
    $_SESSION['usu_senha'] = $rs->usu_senha;
    $_SESSION['usu_id'] = $rs->usu_id;


    header("LOCATION: ../usuario/indexLogado.php");

} else {
   
    ?>
    
    <script>alert("Login ou senha errados!");
    window.location.href = "../public/login.php";
     </script>
    
    <?php
}
