<?php

    if($_GET){
        $anu_id = $_GET['cod'];
                
        include "../php/conexao.php";

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            
            $stmt = $db->prepare("DELETE FROM tbl_anuncio WHERE anu_id = ?;");
            $stmt->bindParam(1, $anu_id); 
            
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    echo "<script>alert('Anúncio APAGADO com sucesso!');
                       window.location.href='mostrarAnuncios.php';
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
