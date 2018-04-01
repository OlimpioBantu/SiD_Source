<?php
$conexao= mysqli_connect("127.0.0.1","root", "", "fatec");

    $cod_prof    = "";
	$nome_prof   = "";
    $email_prof  = "";
    $nome_discip = "";
	$cod_discip  = "";


	/*$cod_prof    = $_POST["cod_prof"];
	$nome_prof   = $_POST["nome_prof"];					//colunas da tabela alunos
	$email_prof  = $_POST["email_prof"];
	$nome_discip = $_POST["nome_discip"];
	$cod_discip  = $_POST["cod_discip"];*/
	
	
	$sql= "INSERT INTO docentes(cod_prof, nome_prof, email_prof, nome_discip,  cod_discip) 
				VALUES('$cod_prof','$nome_prof','$email_prof','$nome_discip','$cod_discip')";
	$resultado = mysqli_query ($conexao, $sql);
		echo " Eita entrou !!";
				
	mysqli_close( $conexao);
?>