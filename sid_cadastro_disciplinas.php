<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<body>
<h1 align="middle"> S i D - Sistema de Importao e Gerenciamento de Dados </h1>
	<h1></h1>
	<h3 align="middle">  Cadastro de nova Disciplina</h3>
	<form action="sid_cadastro_disciplinas.php" method="post" >	

<?php

	header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	
	$cod_discip     = "";
	$periodo_discip = "";
	$nome_prof      = "";
	$nome_discip    = "";
    

 if(count($_POST) > 0)
{
	$conexao = mysqli_connect("127.0.0.1","root", "", "fatec"); //efetua a conexa
		
	if(isset($_POST["btnInserir"]))
	{
		$cod_discip     = $_POST["cod_discip"];
		$nome_discip    = $_POST["nome_discip"];
		$nome_prof      = $_POST["nome_prof"];
		$periodo_discip = $_POST["periodo_discip"];	
	    
      //$cod_prof       = $_POST["cod_prof"];
	  //$email_prof      = $_POST["email_prof"];
		 
		$sql= "INSERT INTO fatec.disciplinas (cod_discip, nome_discip, nome_prof, periodo_discip) 
		           VALUES('$cod_discip','$nome_discip', '$nome_prof', '$periodo_discip')";
				
		if (!mysqli_query($conexao,$sql)) 
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "<Br> Registro adicionado!";
	}
						
	if(isset($_POST["btnAlterar"]))
	{
		$cod_discip     = $_POST["cod_discip"];
		$nome_discip    = $_POST["nome_discip"];
		$nome_prof      = $_POST["nome_prof"];
		$periodo_discip = $_POST["periodo_discip"];
		
		$sql = "UPDATE disciplinas 
		        SET cod_discip ='".$cod_discip."', nome_discip ='".$nome_discip."', nome_prof ='".$nome_prof."', periodo_discip ='".$periodo_discip."' 
		        WHERE cod_discip = $cod_discip";
			
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "Registro alterado !";	
	}

	if(isset($_POST["btnExcluir"]))
	{
		$cod_discip     = $_POST["cod_discip"];
		$nome_discip    = $_POST["nome_discip"];
		$nome_prof      = $_POST["nome_prof"];
		$periodo_discip = $_POST["periodo_discip"];
		
		$sql = "DELETE FROM disciplinas  WHERE cod_discip =" .$cod_discip;
		
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: "  .mysqli_error($conexao));
		}
		echo "Registro removido !";	
	}
 	$conexao->close();
 }
?>
	
	<h3 align="middle">			Codigo da Disciplina :
					<input type="text" name="cod_discip" value="<?php echo $cod_discip; ?>">
	<h3 align="middle">			Periodo da Disciplina:
					<input type="text" name="periodo_discip" value="<?php echo $periodo_discip; ?>">	
	<h3 align="middle">			Nome da Disciplina :
					<input type="text" name="nome_discip" value="<?php echo $nome_discip; ?>">
	<h3 align="middle">			Nome Professor :
					<input type="text" name="nome_prof" value="<?php echo $nome_prof; ?>">
					
		<link rel="stylesheet" href="sid_cadastro_aluno.css" media="all"/> 
	<br>
	<br>
				<input type="submit" value="Cadastrar" name="btnInserir">
				<input type="submit" value="Alterar" name="btnAlterar">
				<input type="submit" value="Excluir" name="btnExcluir">		
		       <br> <br>
<input type="button" onClick="document.location='sid_admin_fatec.php'" value="  Retornar ao Menu " ><br />	
<br />   <br>				
	</form>
</body>
</html>