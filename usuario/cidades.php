<?php 
include '../php/conexao.php';

$pegaCidades = $db->prepare("SELECT * FROM tbl_cidades WHERE estados_id='".$_POST['id']."'");
$pegaCidades->execute();

		$fetchAll = $pegaCidades->fetchAll();
		
		foreach($fetchAll as $cidades)
		{
			echo '<option>'.$cidades['nome'].'</option>';
			
		}

        ?>