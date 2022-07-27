<?php

session_start();
$adm_nome = filter_input(INPUT_POST, 'adm_nome', FILTER_DEFAULT);
$adm_senha = filter_input(INPUT_POST, 'adm_senha', FILTER_DEFAULT);

include '../php/conexao.php';

$sth = $db->prepare("SELECT * FROM tbl_adm WHERE adm_nome = :adm_nome AND adm_senha = :adm_senha");
$sth->bindValue(":adm_nome", $adm_nome);
$sth->bindValue (":adm_senha", $adm_senha);
$sth->execute();

$num = $sth->rowCount();

if ($num > 0) {
    $_SESSION['adm_nome'] = $adm_nome;
    $_SESSION['adm_senha'] = $adm_senha;

    header("LOCATION: index_admin.php");

} else {
   
    ?>
    
    <script>alert("Parece que temos um BURRO entre nós!");
    window.location.href = "login.php";
     </script>
    
    <?php
}
