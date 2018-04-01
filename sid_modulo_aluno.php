<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<title><h4 style="text-align:center;">°°S i D -Sistema de Importação e gerenciamento de Dados°</h4></title>
		<link rel="stylesheet" href="css.css" media="all"/>
	</head>
	<body>
					<h2>SiD - Sistema de Importação e gerenciamento de Dados </h2> 		
	
	<form> 	<h2>	<p align = "middle">  <legend> Módulo Aluno</legend></h2>
		<br>
     <p align = "middle"><input type="button" onClick="document.location='sid_notas_disciplinas.php'" value = "  Notas  ">
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
header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	
	include "sid_conecta_fatec.php"; //faz a conexÃO COM O BANCO DE DADOS
	 mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/
	
	
?>

	
		 </form>	
	</body>
</html>