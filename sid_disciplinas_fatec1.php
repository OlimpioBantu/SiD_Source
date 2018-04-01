<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
		<head>   <title>S.i.D - Sistema de Importação de Dados</title>  </head> 
		<link rel="stylesheet" href="disciplinas.css" media="all"/>
						
 	<body>										
					<table border = 4 width=30%>
	<tr>
		<th>Código</th>
		<th>Disciplinas</th>
		<th>Professor</th>
		<th>Período</th>
</tr>
																						
<p align = "middle">  <h1>&nbsp &nbsp &nbsp &nbsp Resultado da Pesquisa - Disciplinas</h1> </p>
<p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair  ">
 <br> <br>
<input type="button" onClick="document.location='sid_menu_fatec.php'" value="  Retornar pagina anterior " ><br />	
<br />   
<p align = "middle"> <input type="button" onClick="document.location='sid_disciplinas_fatec.php'" value="Cadastrar Nova Disciplina" name="Cadastrar ">	<br />	
<br />
<?php

include "sid_conecta_fatec.php";
header('Content-Type: text/html; charset=UTF-8');

mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/
	 
$res=mysqli_query($link,"SELECT a.cod_discip, a.nome_discip, b.cod_discip, b.cod_prof, a.periodo_discip, b.nome_prof
						 FROM  disciplinas a, prof_discip b
						 WHERE a.cod_discip = b.cod_discip
						 ORDER BY nome_discip "); 
						  
		while($escrever = mysqli_fetch_array($res))
{
/*Escreve cada linha da tabela*/
print "<tr><td>".$escrever['cod_discip']."</td><td>" . $escrever['nome_discip'] . "</td><td>" . $escrever['nome_prof'] . "</td><td>" . $escrever['periodo_discip'] . "</td></tr>";
}

print "</table>"; /*fecha a tabela apos termino de impressão das linhas*/
mysqli_close($conexao);
?>
	</table>	
			</table>
					</body>
</html>