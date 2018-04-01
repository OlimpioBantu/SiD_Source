<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
		<head>  <title>S.i.D - Sistema de Importação e Gerenciamento de Dados Acadêmicos</title>  </head> 
        		<link rel="stylesheet" href="disciplinas.css" media="all"/>	
 <body>										
				<table border = 5 width = 35%> <!--tamanho das bordas da tabela-->
		<tr>
		<th>Código</th>
		<th>Disciplinas</th>
		<th>Professor</th>
		<th>Período</th>
		
<p align = "middle">  <h1>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Resultado Disciplinas</h1> </p>



<p align = "middle"> <input type="button" onClick="document.location='sid_modulo_docentes.php'" value="  Retornar ao Menu  "><br />
	<form method="post" action="sid_disciplinas_fatec.php">	

	<!--	<input type="text" name="txtPesquisa">
		<input type="submit" value="Pesquisar por Nome">   -->
	<br>
	<p align = "middle"> <input type="button" onClick="document.location='sid_grafico_docentes_teste.php'" value="Graficos" name="Cadastrar ">	
	<br>
	<br>
	 <p align = "middle"> <input type="button" onClick="document.location='sid_cadastro_disciplinas_modulo_docentes.php'" value="Cadastrar Nova Disciplina" name="Cadastrar ">	
	 <br><br>
	 
	 <p align = "middle"> <input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair  " ><br />
	<br>
	</form>
	<br>
<?php
$conexao = mysqli_connect("127.0.0.1","root", "", "fatec");
header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
include "sid_conecta_fatec.php"; //faz a conexão com o Banco de Dados
			
    $sql="SELECT cod_discip, nome_discip, nome_prof, periodo_discip
						 FROM  disciplinas 
						 WHERE cod_discip = cod_discip
						 ORDER BY nome_discip ";
	$nome="";
	
	session_start();
	
	$res = mysqli_query($conexao,$sql );	
	
   while($escrever = mysqli_fetch_array($res))
	   
{ 	 /*Transf.linha da tabela em link -> <a href='detalhe_aluno.php?discip=" . $escrever['cod_discip'] . */		
					 
	print " <tr>  <td> ". $escrever['cod_discip'] ." </td>
			      <td><a href= 'sid_disciplinas.php?discip=". $escrever['nome_discip'] . "
								&cod_discip=". $escrever['cod_discip'] ."
								&nome_discip=". $escrever['nome_discip'] . "
								&nome_prof=". $escrever['nome_prof'] ."' >  "
								. $escrever['nome_discip'] . " </a></td>
			<td> ". $escrever['nome_prof'] ." </td><td> ". $escrever['periodo_discip'] ." </td></tr>";
			
			
}		
print "</table>";     /*<--fecha a tabela apos termino de impressão das linhas*/
mysqli_close($conexao);
?>
</body>
</html>