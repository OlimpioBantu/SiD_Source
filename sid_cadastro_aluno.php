<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<body>
<h1 align="middle"> S i D - Sistema de Importacao e Gerenciamento de Dados Acadêmicos</h1>
	<h1></h1>
	<h3 align="middle">  Cadastro de novo Aluno</h3>
	<form action="sid_cadastro_aluno.php" method="post">	

<?php

header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	$matr_aluno   = "";
	$nome_aluno   = "";
	$ano_ingresso = "";	
	$email_aluno  = ""; 
	$nome_mae     = "";

 if(count($_POST) > 0)
 {
	$conexao= mysqli_connect("127.0.0.1","root", "", "fatec"); 
	
	$matr_aluno   = $_POST["matr_aluno"];
	$nome_aluno   = $_POST["nome_aluno"];					
	$ano_ingresso = $_POST["ano_ingresso"];
	$email_aluno  = $_POST["email_aluno"];
	$nome_mae     = $_POST["nome_mae"];
	
	
	if(isset($_POST["btnInserir"]))
	{
	$matr_aluno   = $_POST["matr_aluno"];
	$nome_aluno   = $_POST["nome_aluno"];					
	$ano_ingresso = $_POST["ano_ingresso"];
	$email_aluno  = $_POST["email_aluno"];
	$nome_mae     = $_POST["nome_mae"];
				
	$sql= "INSERT INTO fatec.alunos (matr_aluno, nome_aluno, ano_ingresso, email_aluno, nome_mae)
			   VALUES('$matr_aluno', '$nome_aluno', '$ano_ingresso', '$email_aluno', '$nome_mae')"; 
				
		if (!mysqli_query($conexao,$sql)) 
		{
				die("Error: " . mysqli_error($conexao));
		}
		echo "<Br> Registro adicionado";
	}	
	
	if(isset($_POST["btnAlterar"]))  //alterando um registro
	{
		$matr_aluno   = $_POST["matr_aluno"];
		$nome_aluno   = $_POST["nome_aluno"];					
		$ano_ingresso = $_POST["ano_ingresso"];
		$email_aluno  = $_POST["email_aluno"];
		$nome_mae     = $_POST["nome_mae"];
		
	   $sql = "UPDATE alunos 
	           SET matr_aluno ='".$matr_aluno."', nome_aluno ='".$nome_aluno."', 
	               ano_ingresso ='".$ano_ingresso."', email_aluno ='".$email_aluno."', nome_mae ='".$nome_mae."' 
		       WHERE matr_aluno =".$matr_aluno;
		
		 if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "Registro alterado !";	
	}
	
	if(isset($_POST["btnExcluir"]))   //removendo um registro
	{
		$matr_aluno   = $_POST["matr_aluno"];
		$nome_aluno   = $_POST["nome_aluno"];				
		$ano_ingresso = $_POST["ano_ingresso"];
		$email_aluno  = $_POST["email_aluno"];
		$nome_mae     = $_POST["nome_mae"];
		
		$sql = "DELETE from alunos WHERE matr_aluno=".$matr_aluno;
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "Registro Removido !";	
	}
	$conexao->close();
 }
?>
	
	<h3 align="middle">			R A do Aluno :
					<input type="text" name="matr_aluno" value="<?php echo $matr_aluno; ?>">
	<h3 align="middle">			Nome do Aluno:
					<input type="text" name="nome_aluno" value="<?php echo $nome_aluno; ?>">	
	<h3 align="middle">			Ano de Ingresso :
					<input type="text" name="ano_ingresso" value="<?php echo $ano_ingresso; ?>">
	<h3 align="middle">			e-mail Aluno :
					<input type="email" name="email_aluno" value="<?php echo $email_aluno; ?>" required >
	<h3 align="middle">			Nome da Mãe :
					<input type="text" name="nome_mae" value="<?php echo $nome_mae; ?>"><br>
	<link rel="stylesheet" href="sid_cadastro_aluno.css" media="all"/><p>
	
	
	            <input type="submit" value=" Alterar " name="btnAlterar">
				
				<input type="submit" value=" Excluir " name="btnExcluir">
				
				<input type="submit" value=" Inserir " name="btnInserir">
				
<br> <br>
<input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair  " ><br />	
<br />   <br>				
	</form>
</body>
</html>