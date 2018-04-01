<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<title><h4 style="text-align:center;">°°S i D -Sistema de Importacao e Gerenciamento de Dados°</h4></title>
		<link rel="stylesheet" href="css.css" media="all"/>
	</head>

	<body>
					<h2>SiD - Sistema de Importação e Gerenciamento de Dados Acadêmicos</h2> 		
	
	<form> 	<h2>	<p align = "middle">  <legend> Módulo Pesquisa</legend></h2>
		<br>
     <p align = "middle"><input type="button" onClick="document.location='sid_lista_aluno.php'" value = "  Alunos  ">
	 <br><br>
     <p align = "middle"><input type="button" onClick="document.location='sid_professores_fatec.php'" value = "  Docentes  "> 
	 <br>
	 <br>
     <p align = "middle"><input type="button" onClick="document.location='sid_disciplinas_fatec.php'" value = "  Disciplinas  ">	
	<!--</form> 	-->
			<br><br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_graficos_estatisticos.php'" value="Graficos" name="Cadastrar ">	
			<br>
			<br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair   "><br />
			<br><br>
			<form> 				
		
<?php
  header('Content-Type: text/html; charset=UTF-8'); /*<!--Acerta a acentuação*/
			if(count($_POST) > 0)
{
	 $conexao= mysqli_connect("127.0.0.1","root", "", "fatec");
	 
	  $codigo       = $_POST["codigo"];
	  $nome_aluno   = $_POST["nome_aluno"];					//colunas da tabela alunos
	  $matr_aluno   = $_POST["matr_aluno"];
	  $ano_ingresso = $_POST["ano_ingresso"];
	  $email_aluno  = $_POST["email_aluno"];
	  $nome_mae     = $_POST["nome_mae"];
	  
	if(isset($_POST["btnInserir"]))
	{
	  $sql= "INSERT INTO alunos(nome_aluno, matr_aluno, ano_ingresso, email_aluno,  nome_mae) 
		    VALUES('".$nome_aluno."','".$matr_aluno."','".$ano_ingresso."','".$email_aluno."','".$nome_mae."')"; 
	}
}
?>		
		 </form>	
	</body>
</html>