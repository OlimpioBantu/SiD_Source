<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<body>
<h1 align="middle"> S i D - Sistema de Importação e Gerenciamento de Dados </h1>
	<h1></h1>
<h3 align="middle">  Cadastro de Novo Docente</h3>
<form action="sid_cadastro_docentes.php" method="post">		
	
<?php

header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	$cod_prof    = "";
	$nome_prof   = "";
	$email_prof  = "";
	$nome_discip = "";
	$cod_discip  = "";
	$periodo_discip = ""; 

 if(count($_POST) > 0)
{
	$conexao = mysqli_connect("127.0.0.1","root", "", "fatec"); //efetua a conexa
		
	if(isset($_POST["btnInserir"]))
	{
		$nome_prof   = $_POST["nome_prof"];
		$cod_prof    = $_POST["cod_prof"];
		$email_prof  = $_POST["email_prof"];
		
		$nome_discip = $_POST["nome_discip"];
		$cod_discip  = $_POST["cod_discip"];
		$periodo_discip = $_POST["periodo_discip"];	
		
				$sql="INSERT INTO prof_discip (nome_prof, cod_prof, email_prof, nome_discip,  cod_discip, periodo_discip) 
		           VALUES('$nome_prof','$cod_prof','$email_prof','$nome_discip','$cod_discip', '$periodo_discip' )" ;

		
	$sql="INSERT INTO prof_discip (nome_prof, cod_prof, email_prof, nome_discip,  cod_discip, periodo_discip) 
		           VALUES('$nome_prof','$cod_prof','$email_prof','$nome_discip','$cod_discip', '$periodo_discip' )" ;
				
		if (!mysqli_query($conexao,$sql)) 
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "<Br>1 Registro adicionado!";
	}
		if(isset($_POST["btnPesquisar"]))
		{
			$sql = "SELECT cod_prof, nome_prof, email_prof, nome_discip, cod_discip, periodo_discip FROM prof_discip ";
		
			$result = mysqli_query($conexao,$sql);
			if($registro = mysqli_fetch_array($result)) 
		 {
			$cod_prof = $registro['cod_prof'];
			$nome_prof = $registro['nome_prof'];
			$email_prof = $registro['email_prof'];
			$nome_discip = $registro['nome_discip'];
			$cod_discip = $registro['cod_discip'];
			$periodo_discip = $_POST["periodo_discip"];	
		 } 		
			else 
		 {
			echo "Registro não existe";
		 }		
		}
				
	if(isset($_POST["btnAlterar"]))
	{
		$nome_prof   = $_POST["nome_prof"];
		$cod_prof    = $_POST["cod_prof"];
		$email_prof  = $_POST["email_prof"];
		
		$nome_discip    = $_POST["nome_discip"];
		$cod_discip     = $_POST["cod_discip"];
		$periodo_discip = $_POST["periodo_discip"];	
		
		$sql = "UPDATE prof_discip
		SET  nome_prof ='".$nome_prof."', cod_prof ='".$cod_prof."',  email_prof ='".$email_prof."', 
		nome_discip ='".$nome_discip."', cod_discip ='".$cod_discip."', periodo_discip ='".$periodo_discip."'
		WHERE cod_prof = $cod_prof";
		
					
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "Registro alterado !";	
	}

	if(isset($_POST["btnExcluir"]))
	{
		$nome_prof   = $_POST["nome_prof"];	
		$cod_prof    = $_POST["cod_prof"];
		$email_prof  = $_POST["email_prof"];
		
		$cod_discip  = $_POST["cod_discip"];
		$nome_discip = $_POST["nome_discip"];
		$periodo_discip = $_POST["periodo_discip"];	
		
		$sql = "DELETE FROM prof_discip
				WHERE cod_discip =" .$cod_discip ;
				
		if (mysqli_query($conexao, $sql))
		{
			die("Error: Ate aki foi bem, mas..." .mysqli_error($conexao));
		}
    	echo "Registro removido !";	
	}
	$conexao->close();
 }
	
?>
	<h3 align="middle">			Nome do Professor:
					<input type="text" name="nome_prof" value="<?php echo $nome_prof; ?>">
	<h3 align="middle">			Código Professor :
					<input type="text" name="cod_prof" value="<?php echo $cod_prof; ?>">
	<h3 align="middle">			e-mail Professor :
					<input type="text" name="email_prof" value="<?php echo $email_prof; ?>">
					
	<h3 align="middle">			Disciplina :
					<input type="text" name="nome_discip" value="<?php echo $nome_discip; ?>">
	<h3 align="middle">			Código Disciplina :
					<input type="text" name="cod_discip" value="<?php echo $cod_discip; ?>">
	<h3 align="middle">			Período Disciplina :
					<input type="text" name="periodo_discip" value="<?php echo $periodo_discip; ?>">
					<link rel="stylesheet" href="sid_cadastro_aluno.css" media="all"/> 
	<br> <br>
				<input type="submit" value="Cadastrar" name="btnInserir">
				<input type="submit" value="Alterar" name="btnAlterar">
				<input type="submit" value="Excluir" name="btnExcluir">	
				<input type="reset" value="limpar" id="bt">
<br> <br>
<input type="button" onClick="document.location='sid_modulo_docentes.php'" value="  Retornar pagina anterior " ><br />		
<br />   <br>	
 
	</form>
</body>
</html>