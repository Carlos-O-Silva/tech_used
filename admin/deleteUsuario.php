<?php

    if($_GET){
        $usu_id = $_GET['cod'];
                
        include "../php/conexao.php";

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            
            $stmt = $db->prepare("DELETE FROM tbl_usuario WHERE usu_id = ?;");
            $stmt->bindParam(1, $usu_id); 
            
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location:mostrarUsuariosDELETE.php');
                    echo "<script>alert('Usuário APAGADO com sucesso!');
                       window.location.href='mostrarUsuariosDELETE.php';
                      </script>";
                }else{
                    //throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>
