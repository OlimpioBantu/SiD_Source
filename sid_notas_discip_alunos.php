<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
		<head>  <title>S.i.D - Sistema de Importação e Gerenciamento de Dados Acadêmicos</title>  </head> 
        		<link rel="stylesheet" href="aluno.css" media="all"/>	
 <body>										
				<table border = 4 width = 45%> <!--tamanho das bordas da tabela-->
		<tr>
		<th>Nome aluno</th>			
		<th>&nbsp R A &nbsp</th>							
		<th>Ano de ingresso</th>
		<th>email Aluno</th>
		<th>Nome da Mae</th>
		
<p align = "middle">  <h1>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Resultado da Pesquisa - Alunos</h1> </p>
<p align = "middle"> <input type="button" onClick="document.location='sid_menu_fatec.php'" value="  Pagina Anterior  "><br />
	<form method="post" action="sid_lista_aluno.php">	
    <br>
		<input type="text" name="txtPesquisa">
		<input type="submit" value="Pesquisar por Nome">
		<br>
	<br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_importador_fatec_csv.php'" value="  Importar novo Arquivo  "><br />
	<form method="post" action="sid_importador_fatec_csv.php">	
	 <br>
	 <p align = "middle"> <input type="button" onClick="document.location='sid_cadastro_aluno.php'" value="Cadastrar Novo Aluno" name="Cadastrar ">	
	 <br>
	 <br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_graficos_estatisticos.php'" value="Graficos" name="Cadastrar ">	
	<br>
	</form>
	<br>  <br>
<?php

header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
include "sid_conecta_fatec.php"; //faz a conexão com o Banco de Dados
			
    $sql="SELECT  nome_aluno, matr_aluno, ano_ingresso, email_aluno, nome_mae FROM alunos";
	$nome="";
	
	session_start();

		if(isset($_POST["txtPesquisa"]) or isset($_SESSION["usuario"]))
	{
			if((isset($_SESSION["usuario"]) &&  $_SESSION["tipo"] == 2))
			{
				$nome = $_SESSION["usuario"];
				$sql=$sql . " where matr_aluno =".$matr_aluno ." order by nome_aluno";
			}
		      else
		    {
	        	if(isset($_POST["txtPesquisa"]))
					
				$nome= $_POST["txtPesquisa"] ;
				
			    $sql=$sql . " where nome_aluno like '".$nome ."%' order by nome_aluno";
		    }
	}										
	$res = mysqli_query($link,$sql );	/*<--Para obter todos os registros você precisa de uma laço de repetição:*/
	
   while($escrever = mysqli_fetch_array($res))
	   
{ 	 /*Transf.linha da tabela em link -> <a href='detalhe_aluno.php?aluno=" . $escrever['matr_aluno'] . */							 
	print " <tr><td> ". $escrever['nome_aluno'] ." </td>
			<td><a href= 'sid_notas_disciplinas.php?aluno=". $escrever['nome_aluno'] .
				"&matr_aluno=". $escrever['matr_aluno'] ."&ano_ingresso=". $escrever['ano_ingresso'] .
				"&email_aluno=". $escrever['email_aluno'] ."' >  " . $escrever['matr_aluno'] . " </a></td>
			<td>". $escrever['ano_ingresso'] ." </td><td> ". $escrever['email_aluno'] ." </td><td> ". $escrever['nome_mae'] ." </td></tr>";
}		/*Fim do while*/
print "</table>";     /*<--fecha a tabela apos termino de impressão das linhas*/
mysqli_close($conexao);
?>
</body>
</html>