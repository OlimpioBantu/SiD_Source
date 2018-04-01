<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>   <title>S.i.D - Sistema de Importação e Gerenciamento de Dados</title>  </head> 
	<link rel="stylesheet" href="aluno.css" media="all"/>				
						<!-- inicio da tabela -->
 	<body>										
	<table border = 4 width = 48%> <!--tamanho das bordas da tabela-->
	<tr>
	 <th>Códigos</th>
     <th>Disciplinas</th>	
	 <th>Notas</th>
	 <th>&nbsp Docentes &nbsp </th>
	 <th>e-mail Docentes</th>
	<p align = "right">  <h1>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp   Resultado da Pesquisa - Notas & Gráficos </h1> </p>

	<p align = "middle"> <input type="button" onClick=" document.location='grafico_para_testes.php'" value="Graficos" name="Gráficos ">	
	<br><br>
    <p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="&nbsp &nbsp Sair &nbsp &nbsp "><br />
    <br>
	<br>
<?php
	header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	include "sid_conecta_fatec.php"; //faz a conexão com o BANCO DE DADOS
	mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/
	
	$res = mysqli_query 
	($link, "SELECT a.cod_discip, a.nome_discip, a.notas_discip, b.nome_prof, b.email_prof 
		     FROM notas_disciplinas a, docentes b WHERE matr_aluno = 200"
	);
	
 	while($escrever = mysqli_fetch_array($res))
	{ 
		print " <tr><td> ". $escrever['cod_discip'] ."  </td>
					<td> ". $escrever['nome_discip'] ."  </td>
					<td> ". $escrever['notas_discip'] ." </td>		  
					<td> ". $escrever['nome_prof'] ."    </td>
					<td><a href='sid_professores_fatec.php?aluno=". $escrever['nome_discip'] ."
		    &nome_discip=". $escrever['nome_discip'] ."&notas_discip=". $escrever['notas_discip'] ." 
		    &matr_aluno'> ". $escrever['email_prof']."</a></td>
			    </td></tr>";
	}
print '</table>'; 
	if(isset($_POST["txtPesquisa"]))
	{
	  $sql=$sql . " where nome_aluno like '%". $_POST["txtPesquisa"] ."%'"; //<-- define o nome a ser pesquisado
	}		
mysqli_close($conexao);

?>					
	</body>
</html>