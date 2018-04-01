<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
		<head>   <title>S.i.D - Sistema de Importação e Gerenciamento de Dados Acadêmicos </title>  </head> 
		<link rel="stylesheet" href="disciplinas.css" media="all"/>				
						<!-- inicio da tabela -->
 	<body>										
	<table border = 4 width = 48%> <!--tamanho das bordas da tabela-->
	<tr>
     <th>&nbsp Disciplinas &nbsp &nbsp  &nbsp </th>	
	 <th>Notas</th>
	 <th>Códigos</th>
	 <th>Período</th>	
	 <th>Nome Aluno</th>
	 <th> &nbsp R A  &nbsp </th>
	 <th>&nbsp Nome Docente &nbsp </th>
	 
	 
	<p align = "middle">  <h1>Resultado da Pesquisa - Notas Disciplinas</h1> </p>
	
    <p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="&nbsp &nbsp Sair &nbsp &nbsp "><br />
    <br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_graficos_prof.php?cod_prof=<?php echo $_GET["cod_prof"];?> '" value="&nbsp &nbsp Graficos &nbsp &nbsp "><br />
    <br> 	
	 <p align = "middle"> <input type="button" onClick="document.location='sid_cadastro_aluno.php'" value="Cadastrar Novo Aluno" name="Cadastrar ">	
	 <br>
	 <br>
<?php
	header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	
	include "sid_conecta_fatec.php"; //faz a conexão com o BD
	 mysqli_select_db($link, $banco); //seleciona o banco a ser usado 
	
	$res = mysqli_query 
	($link, "SELECT a.nome_discip, a.notas_discip, a.cod_discip, a.nome_aluno, a.matr_aluno,
					b.cod_discip, b.periodo_discip,  b.nome_prof, b.email_prof 
		     FROM notas_disciplinas a, prof_discip b 
			 WHERE a.cod_discip = b.cod_discip
			 AND cod_prof='". $_GET["cod_prof"] ."' order by nome_aluno ");
		
 	while($escrever = mysqli_fetch_array($res))
	{ 
		print " <tr><td> ". $escrever['nome_discip'] ."  </td>
					<td> ". $escrever['notas_discip'] ." </td>
					<td> ". $escrever['cod_discip'] ."  </td>
					<td> ". $escrever['periodo_discip'] ."  </td>
					<td> ". $escrever['nome_aluno'] ."   </td>
					<td> ". $escrever['matr_aluno'] ."   </td>    		  
					<td> ". $escrever['nome_prof'] ."    </td>  			  
							
				<td><a href='sid_notas_disciplinas.php?aluno=". $escrever['nome_discip'] ."  //cria um link p mail_prof
				    &nome_discip=". $escrever['nome_discip'] ."&notas_discip=". $escrever['notas_discip'] ." 
				    &nome_aluno=". $escrever['nome_aluno']."&matr_aluno'></a></td>
			    </td></tr>";
	}
print '</table>'; 
	if(isset($_POST["txtPesquisa"]))
	{
	  $sql=$sql . " where cod_prof '%". $_POST["txtPesquisa"] ."%'"; //<-- define o nome a ser pesquisado
	}		
mysqli_close($conexao);

?>					
	</body>
</html>