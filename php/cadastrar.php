<?php
include 'conexao.php';



$usu_cpf = filter_input(INPUT_POST, 'usu_cpf', FILTER_DEFAULT);
$usu_nome = filter_input(INPUT_POST, 'usu_nome', FILTER_DEFAULT);
$usu_dataNasc = filter_input(INPUT_POST, 'usu_dataNasc', FILTER_DEFAULT);
$usu_email = filter_input(INPUT_POST, 'usu_email', FILTER_DEFAULT);
$usu_senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);
$usu_CEP = filter_input(INPUT_POST, 'usu_CEP', FILTER_DEFAULT);
$usu_estado = filter_input(INPUT_POST, 'usu_estado', FILTER_DEFAULT);
$usu_cidade = filter_input(INPUT_POST, 'usu_cidade', FILTER_DEFAULT);
$usu_bairro = filter_input(INPUT_POST, 'usu_bairro', FILTER_DEFAULT);
$usu_rua = filter_input(INPUT_POST, 'usu_rua', FILTER_DEFAULT);
$usu_numCasa = filter_input(INPUT_POST, 'usu_numCasa', FILTER_DEFAULT);
$usu_complemento = filter_input(INPUT_POST, 'usu_complemento', FILTER_DEFAULT);
$usu_celular = filter_input(INPUT_POST, 'usu_celular', FILTER_DEFAULT);
$usu_username = filter_input(INPUT_POST, 'usu_username', FILTER_DEFAULT);
//$usu_foto = filter_input(INPUT_POST, 'usu_foto', FILTER_DEFAULT);
$usu_foto = $_FILES['usu_foto']['name'];
//$ext = $_FILES['usu_foto']['type'];
$caminho_imagem = "../usuario/upload/img/";
move_uploaded_file($_FILES['usu_foto']['tmp_name'], $caminho_imagem.$_FILES['usu_foto']['name']);


$sth = $db->prepare("INSERT INTO tbl_usuario(
    usu_cpf,
    usu_nome, 
    usu_dataNasc, 
    usu_email,
    usu_senha, 
    usu_CEP, 
    usu_estado,
    usu_cidade,
    usu_bairro,
    usu_rua,
    usu_numCasa,
    usu_complemento,
    usu_celular,
    usu_username,
    usu_foto) 
VALUES (
    :usu_cpf, 
    :usu_nome, 
    :usu_dataNasc, 
    :usu_email, 
    :usu_senha, 
    :usu_CEP, 
    :usu_estado, 
    :usu_cidade, 
    :usu_bairro, 
    :usu_rua, 
    :usu_numCasa, 
    :usu_complemento, 
    :usu_celular,
    :usu_username,
    :usu_foto)");

$sth->bindValue(":usu_cpf", $usu_cpf);
$sth->bindValue(":usu_nome", $usu_nome);
$sth->bindValue(":usu_dataNasc", $usu_dataNasc);
$sth->bindValue(":usu_email", $usu_email);
$sth->bindValue(":usu_senha", $usu_senha);
$sth->bindValue(":usu_CEP", $usu_CEP);
$sth->bindValue(":usu_estado", $usu_estado);
$sth->bindValue(":usu_cidade", $usu_cidade);
$sth->bindValue(":usu_bairro", $usu_bairro);
$sth->bindValue(":usu_rua", $usu_rua);
$sth->bindValue(":usu_numCasa", $usu_numCasa);
$sth->bindValue(":usu_complemento", $usu_complemento);
$sth->bindValue(":usu_celular", $usu_celular);
$sth->bindValue(":usu_username", $usu_username);
$sth->bindValue(":usu_foto", $usu_foto);

$sth->execute();

echo " 
<script>alert('Usuário cadastrado com sucesso!');
window.location.href = '../public/login.php';
 </script>
header('location: ../public/login.php')";

?>

