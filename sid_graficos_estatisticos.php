<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
 if(count($_POST) > 0)
 {
	$conexao= mysqli_connect("127.0.0.1","root", "", "fatec");
	
	$conexao->close();
 }
?>
<html>
	<body>
			<h1 align="middle"> S i D - Sistema de Importação e Gerenciamento de Dados Acadêmicos</h1>
				
			<h2 align="middle">  Gráficos </h2>
			<form action="alunos.php" method="post">	
		<!--	<h1 align="middle"><input type="button" onClick="document.location='sid_graficos_alunos.php'" value=" Grafico por Aluno" >
			-->
			<h1 align="middle"><input type="button" onClick="document.location='sid_grafico_docentes.php?cod_discip'" value=" Grafico por Docente" >

			<h1 align="middle"><input type="button" onClick="document.location='sid_grafico_disciplinas.php'" value=" Grafico por Disciplina" >

			<!-- <h1 align="middle">	<input type="button" onClick="document.location='sid_grafico_turma.php?cod_prof=<?php echo $_GET["cod_prof"]; ?>'" value=" Grafico por Turma" > -->

			<link rel="stylesheet" href="sid_graficos.css" media="all"/>
	
			<br> <br>
			<input type="button" onClick="document.location='sid_admin_fatec.php'" value="  Retornar ao Menu " ><br />	
	</body>
</html>