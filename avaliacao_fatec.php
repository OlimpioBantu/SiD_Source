<?php

	$codigo = 0;
		$cod_aval = "";
			$cod_discip = "";
				$matr_aluno = "";
	$cod_turma = "";
	
 //verifica se a pagina foi recarregada	
 
 if(count($_POST) > 0)
 {
	$conexao	= new mysqli("127.0.0.1","root","", "fatec");
	
	$codigo = $_POST["codigo"];
	
			$cod_aval   = $_POST["cod_aval"];
			
				$cod_discip  = $_POST["cod_discip"];
				
		$matr_aluno  = $_POST["matr_aluno"];
		
	$cod_turma   = $_POST["cod_turma"];
	
	if(isset($_POST["btnInserir"]))
	{
		
		$sql= "INSERT INTO avaliacao (cod_aval, cod_discip, matr_aluno, cod_turma) 
		
							values('".$cod_aval."','".$cod_discip."','".$matr_aluno."','".$cod_turma."')"; 
		//echo $sql;
		
		if (!mysqli_query($conexao,$sql)) {die("Error: " . mysqli_error($conexao));}
		
		echo "<Br>1 registro adicionado";
	}	
	//pesquisa um registro atraves do ID no BD
	
	if(isset($_POST["btnPesquisar"]))
	{
		$sql = "select cod_aval, cod_discip, matr_aluno, cod_turma from avaliacao where codigo=".$codigo;
	
		$result = mysqli_query($conexao,$sql);
		
		if($registro = mysqli_fetch_array($result)) {

			$cod_aval = $registro['cod_aval'];
		
			 $cod_discip = $registro['cod_discip'];
			 
			 $matr_aluno = $registro['matr_aluno'];
			 
			 $cod_turma = $registro['cod_turma']
		
		else 
		{
			echo "registro não existe";
		}		
	}
	//alterando um registro
	
	if(isset($_POST["btnAlterar"]))
		
	{   $sql = "update avaliacao set cod_aval='".$cod_aval."', cod_discip ='".$cod_discip."',matr_aluno ='".$matr_aluno."', 
	
				cod_turma ='".$cod_turma."' where codigo=".$codigo;
	
		echo $sql;
		
		if (!mysqli_query($conexao, $sql))
		{
			
			die("Error: " . mysqli_error($conexao));
		}
		echo "registro alterado !";	
	}
	//removendo um registro
	
	if(isset($_POST["btnExcluir"])){$sql  = "delete from avaliacao where codigo=".$codigo;
	
		if (!mysqli_query($conexao, $sql)){die("Error: " . mysqli_error($conexao));
		}
		echo "registro removido !";	
	}
		
	$conexao->close();
 }
?>
<html>
<body>
	<h1>SiD - Sistema de Importacao de Dados</h1><form action="avaliacao_fatec.php" method="post">
	
	Codigo: 
			<br><input type="text" name="codigo" value="<?php echo $codigo; ?>">	<br>
	
	Codigo da Avaliacao :
							<br>	<input type="text" name="cod_aval" value="<?php echo $cod_aval; ?>">	<br>
	
	Codigo da Disciplina :
							<br>	<input type="text" name="cod_discip" value="<?php echo $cod_discip; ?>"><br>
	
	Matricula do Aluno :
							<br>	<input type="text" name="matr_aluno" value="<?php echo $matr_aluno; ?>"><br>
	
	Codigo da Turma :
							<br>	<input type="text" name="cod_turma" value="<?php echo $cod_turma; ?>"><br>
		
	<br>	<br>
	<input type="submit" value="Inserir" name="btnInserir">
	
				<input type="submit" value="Pesquisar" name="btnPesquisar">
	
						<input type="submit" value="Alterar" name="btnAlterar">
	
								<input type="submit" value="Excluir" name="btnExcluir">								
	
	</form>
</body>