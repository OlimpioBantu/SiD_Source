<html>
		<head>   <title>S.i.D - Sistema de Importação de Dados</title>  </head> 
		<link rel="stylesheet" href="css.css" media="all"/>
				
						<!-- inicio da tabela 
						
		<?
			$res1 = mysqli_connect("127.0.0.1", "root", "");
			
				$sql = "select  cod_prof, nome_prof, nome_discip from professores";
				header('Content-Type: text/html; charset=UTF-8');
			/*	$res2 = mysqli_db_query("professores", "$sql", "res1"); */
			
		?>

 	<body>										
					<table border = 5 width=100%>
	<tr>
			
	<th>Código do Professor</th>
		<th>Nome do Professor</th>
			<th>Nome da Disciplina</th>
</tr>
 
 <?
 
 $cod_prof = $_POST['cod_prof'];
				$nome_prof = $_POST['nome_prof'];
			$sql = nome_discip = $_POST['nome_discip'];
 
		while ($valor = mysqli_fetch_array($res1)) 
		{ ?>
	 <tr>
		<td><?=$valor ["cod_prof"]?></td>
		
			<td><?=$valor ["nome_prof"]?></td>
			
						<td><?=$valor["nome_discip"]?></td>
		</tr>
		<?
		}
			mysqli_close($res1);
			?>
													fim da tabla 
 -->
													
							<p align = "middle">  <h1>Resultado da Pesquisa</h1> </p>
			<p align = "middle"> <input type="button" onClick="document.location='formulario_fatec.php'" value="Retorna !!!"><br />

<?php

$host = "127.0.0.1"; /*maquina a qual o banco de dados está*/
	$usuario = "root"; /*usuario do banco de dados MySql*/
		$senha =""; /*senha do banco de dados MySql*/
			$banco = "fatec"; /*seleciona o banco a ser usado*/
			
					$link = mysqli_connect("127.0.0.1", "$usuario", "$senha", "$banco");
					
$conexao = mysqli_connect($host,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/

$res = mysqli_query($link, "select  cod_prof, nome_prof, nome_discip from professores"); /* while($exibe = mysql_fetch_assoc($sql))*/

 /* Executa o comando SQL, para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */												

print " <table>";
		 print "<tr><td>Codigo do Professor - </td>" ;
	
			print "<td> Nome do Professor - </td>";
			
				print "<td>Nome da Disciplina</td><tr>";	
/*        

Para obter todos os registros você precisa de uma laço de repetição:

include("conectar.php");
$sql = mysql_query("Select * From tb_trabalhador and tb_detalhe_trabalhador");
while($exibe = mysql_fetch_assoc($sql)){
   echo "<table>"; 
   echo "<tr><td>Nome:</td>";
   echo "<td>".$exibe["Nome"]."</td></tr>";
}

    Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */

		while($escrever = mysqli_fetch_array($res)){

/*Escreve cada linha da tabela*/
			print "<tr><td>" . $escrever['cod_prof'] . "</td><td>" . $escrever['nome_prof'] . "</td><td>" . $escrever['nome_discip'] . "</td></tr>";

}/*Fim do while*/

print "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysqli_close($conexao);

?>
	</table>	
			</table>
					</body>
</html>