<html>
		<head>   <title>S.i.D - Sistema de Importação de Dados</title>  </head> 
		<link rel="stylesheet" href="css.css" media="all"/>				
						<!-- inicio da tabela -->
 	<body>										
					<table border = 4 width = 48%> <!--tamanho das bordas da tabela-->
	<tr>		
		<th>Nome aluno</th>							
			<th>Ano de ingresso</th>
				<th>Disciplinas</th>
					<th>Notas</th>	
							<th>Nome do Professor</th>
								
			<!--	fim da tabela -->	
							<p align = "middle">  <h1>Resultado da Pesquisa - Disciplinas</h1> </p>
			<p align = "middle"> <input type="button" onClick="document.location='formulario_fatec.php'" value="  Retornar  "><br />
			<br>
<?php
include "sid_conecta_fatec.php";
	/*	$host = "127.0.0.1"; 
			$usuario = "root"; 
				$senha =""; 
					$banco = "fatec"; 
						$link = mysqli_connect("127.0.0.1", "$usuario", "$senha", "$banco");
							$conexao = mysqli_connect($host,$usuario,$senha); */
	mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/
	$res = mysqli_query($link, "SELECT  nome_aluno, ano_ingresso, nome_discip, notas_discip, nome_prof FROM pesquisa order by nome_discip ");
 /* Executa o comando SQL, para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */												
/*Para obter todos os registros você precisa de uma laço de repetição:
    Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
		while($escrever = mysqli_fetch_array($res)){
/*Escreve cada linha da tabela*/
		print "<tr><td>" . $escrever['nome_aluno'] . "</td><td>" . $escrever['ano_ingresso'] . "</td>
<td>" . $escrever['nome_discip'] . "</td> <td>" . $escrever['notas_discip'] . "</td><td>" . $escrever['nome_prof'] . "</td>
<td>"  . "</td>  </tr>";
}  /*<--Fim do while*/
print "</table>"; /*fecha a tabela apos termino de impressão das linhas*/    				
$sql="SELECT  matr_aluno, nome_aluno, ano_ingresso, cod_discip, nome_discip	FROM alunos, disciplinas ";
	if(isset($_POST["txtPesquisa"]))
	{
		$sql=$sql . " where nome_aluno like '%". $_POST["txtPesquisa"] ."%'"; //<-- define o nome a ser pesquisado
	}		
mysqli_close($conexao);
?>
	</table>									
			</table>
					</body>
</html>