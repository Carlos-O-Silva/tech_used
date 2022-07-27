<?php 
    include '../php/conexao.php';
    
// $modelos = $db->prepare("SELECT * FROM tbl_modelos WHERE fk_mar_id=6");
$modelos = $db->prepare("SELECT * FROM tbl_modelos WHERE fk_mar_id='".$_POST['mar_id']."' ");
$modelos->execute();

		$fetchAll = $modelos->fetchAll();
		
		foreach($fetchAll as $modelos)
		{
			echo '<option>'.$modelos['mod_nome'].'</option>';
			
		}