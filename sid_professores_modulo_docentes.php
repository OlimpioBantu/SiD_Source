<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
		<head>   <title>S.i.D - Sistema de Importação e Gerenciamento de Dados</title>  </head> 
		<link rel="stylesheet" href="prof.css" media="all"/>
							<!-- inicio da tabela -->
 	    <body>										
		<table border = 4 width=35%>
<tr>
	<th>Código</th>
	<th>Professor</th>
	<th>email Prof.</th>
	<th>Disciplina</th>
</tr>
																			
<p align = "middle">  <h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Resultado da Pesquisa - Professores</h2></center>	
<br>
<br><br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_grafico_docentes_teste.php'" value="Graficos" name="Cadastrar ">	
			<br>
			<br>

<p align = "middle"> 
<input type="button" onClick="document.location='sid_cadastro_modulo_docentes.php'" value="Cadastrar Novo Docente" name="Cadastrar ">
<br>
<br>	
	<input type="button" onClick="document.location='sid_modulo_docentes.php'" value="  Retornar pagina anterior " ><br />	
	<br>

<p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair  " ><br />
	<br>
	<br>
<?php

header('Content-Type: text/html; charset=UTF-8'); /*<!--Acerta a acentuação*/

$host = "127.0.0.1"; /*<-- maquina a qual o banco de dados está*/
$usuario = "root"; /*<-- usuario do banco de dados MySql*/
$senha =""; /*<-- senha do banco de dados MySql*/
$banco = "fatec"; /*<--seleciona o banco a ser usado*/

//$link = mysqli_connect("127.0.0.1", "$usuario", "$senha", "$banco");		

$conexao = mysqli_connect($host,$usuario,$senha);  /*Conecta no bando de dados MySql*/
           mysqli_select_db($conexao, $banco); /*seleciona o banco a ser usado*/
$res = mysqli_query($conexao, "SELECT  cod_prof, nome_prof, email_prof,nome_discip 
							FROM prof_discip
							ORDER BY nome_prof"); 
							
	   while($escrever = mysqli_fetch_array($res))
 {
	print "<tr> <td>" . $escrever['cod_prof'] . "</td><td>" . $escrever['nome_prof'] . "</td><td>"  . $escrever['email_prof'] . "</td><td>" . $escrever['nome_discip'] . "</td></tr>";
 }

print "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysqli_close($conexao);

?>
	</body>
</html>