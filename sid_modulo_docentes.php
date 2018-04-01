
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><h4 style="text-align:center;">°°S i D -Sistema de Importacao de Dados°</h4></title>
		<link rel="stylesheet" href="prof.css" media="all"/>
	</head>
 <!--  <html> --->
	<body>
					<h2>SiD - Sistema de Importacao de Dados </h2> 		
	
	<form> 	<h2>	<p align = "middle">  <legend> Modulo Docente</legend></h2>
		<br>
     <p align = "middle"><input type="button" onClick="document.location='sid_notas_prof.php'" value = "  Alunos  ">
	 <br><br>
     <p align = "middle"><input type="button" onClick="document.location='sid_professores_modulo_docentes.php'" value = "  Docentes  "> 
	 <br>
	 <br>
     <p align = "middle"><input type="button" onClick="document.location='sid_disciplinas_modulo_docentes.php'" value = "  Disciplinas  ">	
	</form> 	
			<br>
			<p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair   "><br />
			<br><br>
			<form> 				
	<!--	<p align = "middle"> <input type="button" onClick="document.location='sid_cadastro_aluno.php'" value="Novo Cadastro" name="Cadastrar ">			-->						
<?php
			if(count($_POST) > 0)
{
	 $conexao= mysqli_connect("127.0.0.1","root", "", "fatec");
	  $codigo = $_POST["codigo"];
	  $nome_aluno = $_POST["nome_aluno"];					//colunas da tabela alunos
	  $matr_aluno = $_POST["matr_aluno"];
	  $ano_ingresso  = $_POST["ano_ingresso"];
	  $email_aluno  = $_POST["email_aluno"];
	  $nome_mae  = $_POST["nome_mae"];
	 //$cod_prof = $_POST["cod_prof"];
	if(isset($_POST["btnInserir"]))
	{
	  $sql= "INSERT INTO alunos(nome_aluno, matr_aluno, ano_ingresso, email_aluno,  nome_mae) 
		    VALUES('".$nome_aluno."','".$matr_aluno."','".$ano_ingresso."','".$email_aluno."','".$nome_mae."')"; 
	}
}
?>		
		</body>
</html>