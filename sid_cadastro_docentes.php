<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<body>
<h1 align="middle"> S i D - Sistema de Importação e Gerenciamento de Dados Acadêmicos</h1>
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
		$email_prof  = $_POST["email_prof"] ;
		$nome_discip = $_POST["nome_discip"];
		$cod_discip  = $_POST["cod_discip"];
		$periodo_discip = $_POST["periodo_discip"];	
		
				$sql="INSERT INTO prof_discip (nome_prof, cod_prof, email_prof, nome_discip,  cod_discip, periodo_discip) 
		           VALUES('$nome_prof','$cod_prof','$email_prof','$nome_discip','$cod_discip', '$periodo_discip' )" ;
		           
		/*$sql= "INSERT INTO docentes ( cod_prof, nome_prof, email_prof, cod_discip, nome_discip) 
		           VALUES('$cod_prof ', '$nome_prof',  '$email_prof',, '$cod_discip', '$nome_discip')";	*/  
				
		if (!mysqli_query($conexao,$sql)) 
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "<Br> Registro Adicionado!";
	}
					
	if(isset($_POST["btnAlterar"]))
	{
		$nome_prof      = $_POST["nome_prof"];
		$cod_prof       = $_POST["cod_prof"];
		$email_prof     = $_POST["email_prof"];
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
		
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: Ate aki ..." .mysqli_error($conexao));
		}
		
		echo "Registro removido !";	
	}
	$conexao->close();
 }
	
?>
	<h3 align="middle">			Nome do Professor:
					<input type="text" name="nome_prof" value="<?php echo $nome_prof; ?>" >
	<h3 align="middle">			Código Professor :
					<input type="text" name="cod_prof" value="<?php echo $cod_prof; ?>">
	<h3 align="middle">			e-mail Professor :
					<input type="email" name="email_prof" value="<?php echo $email_prof; ?>" required>
	<h3 align="middle">			Disciplina :
					<input type="text" name="nome_discip" value="<?php echo $nome_discip; ?>">
	<h3 align="middle">			Código Disciplina :
					<input type="text" name="cod_discip" value="<?php echo $cod_discip; ?>">
	<h3 align="middle">			Período Disciplina :
					<input type="text" name="periodo_discip" value="<?php echo $periodo_discip; ?>">
					<link rel="stylesheet" href="sid_cadastro_aluno.css" media="all"/> <!--????-->
	<br> <br>
				<input type="submit" value="Cadastrar" name="btnInserir">
				<input type="submit" value="Alterar" name="btnAlterar">
				<input type="submit" value="Excluir" name="btnExcluir">	
				<br> <br>
<input type="button" onClick="document.location='sid_admin_fatec.php'" value="  Retornar ao Menu " ><br />		
<br />   <br>	
 
	</form>
</body>
</html>