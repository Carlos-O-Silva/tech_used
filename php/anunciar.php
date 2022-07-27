<?php

session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];


include 'conexao.php';


$anu_titulo = filter_input(INPUT_POST, 'anu_titulo', FILTER_DEFAULT);
$anu_marca = filter_input(INPUT_POST, 'anu_marca', FILTER_DEFAULT);
$anu_modelo = filter_input(INPUT_POST, 'anu_modelo', FILTER_DEFAULT);
$anu_dataPostagem = filter_input(INPUT_POST, 'anu_dataPostagem', FILTER_DEFAULT);
$anu_preco = filter_input(INPUT_POST, 'anu_preco', FILTER_DEFAULT);
$anu_descricao = filter_input(INPUT_POST, 'anu_descricao', FILTER_DEFAULT);
$anu_imei = filter_input(INPUT_POST, 'anu_imei', FILTER_DEFAULT);


$anu_foto = $_FILES['anu_foto']['name'];
//$ext = $_FILES['usu_foto']['type'];
$caminho_imagem = "../upload/img/";
move_uploaded_file($_FILES['anu_foto']['tmp_name'], $caminho_imagem.$_FILES['anu_foto']['name']);






$sth = $db->prepare("INSERT INTO tbl_anuncio(
    anu_titulo,
    anu_marca, 
    anu_modelo, 
    anu_dataPostagem,
    anu_preco, 
    anu_descricao,
    anu_imei,
    anu_foto,
    fk_usu_id) 
VALUES (
    :anu_titulo,
    :anu_marca, 
    :anu_modelo, 
    :anu_dataPostagem,
    :anu_preco, 
    :anu_descricao,
    :anu_imei,
    :anu_foto,
    :fk_usu_id)");

$sth->bindValue(":anu_titulo", $anu_titulo);
$sth->bindValue(":anu_marca", $anu_marca);
$sth->bindValue(":anu_modelo", $anu_modelo);
$sth->bindValue(":anu_dataPostagem", $anu_dataPostagem);
$sth->bindValue(":anu_preco", $anu_preco);
$sth->bindValue(":anu_descricao", $anu_descricao);
$sth->bindValue(":anu_imei", $anu_imei);
$sth->bindValue(":anu_foto", $anu_foto);
$sth->bindValue(":fk_usu_id", $id);

$sth->execute();

echo " 
<script>alert('Anúncio criado com sucesso!');
window.location.href = '../usuario/historicoAtv&Ina.php';
 </script>";

?>

