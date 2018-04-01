<?php
	$codigo = "0";
		$matr_aluno = "";
			$nome_aluno = "";
			  $sexo_aluno = "";
		$ano_ingresso = "";
	$id_aluno = "";
	
 //verifica se a pagina foi recarregada	
 
 if(count($_POST) > 0){
	 
	$conexao= mysqli_connect("127.0.0.1","root", "", "fatec");	
	
			//$codigo = $_POST["codigo"];
	
	$matr_aluno = $_POST["matr_aluno"];					//colunas da tabela alunos
	
			$nome_aluno = $_POST["nome_aluno"];
			
				$sexo_aluno  = $_POST["sexo_aluno"];
				
			$ano_ingresso  = $_POST["ano_ingresso"];
			
	$id_aluno  = $_POST["id_aluno"];
	
		//insere dados
	
		if(isset($_POST["btnInserir"])){
			
		$sql= "INSERT INTO alunos(matr_aluno, nome_aluno, sexo_aluno, ano_ingresso, id_aluno) 
		
				values('".$matr_aluno."','".$nome_aluno."','".$sexo_aluno."','".$ano_ingresso."','".$id_aluno."')"; 
		//echo $sql;
		
		if (!mysqli_query($conexao,$sql)) {
			
			die("Error: " .mysqli_error($conexao));
		}
		echo "<Br>1 registro adicionado";
	}	
	
	//pesquisa um registro atraves do ID no BD
	
	if(isset($_POST["btnPesquisar"])){
		
		$sql = "select matr_aluno, nome_aluno, sexo_aluno, ano_ingresso, id_aluno from alunos where codigo=".$codigo;
					
		$result = mysqli_query('$conexao','$sql');
		
		if($registro = mysqli_fetch_array('$result')) 
		{
			
			 $matr_aluno = $registro['matr_aluno'];
					$nome_aluno = $registro['nome_aluno'];
						$sexo_aluno = $registro['sexo_aluno'];
							$ano_ingresso = $registro['ano_ingresso'];
								//$id_aluno = $registro['id_aluno'];
			 
		} else {
			
			echo "registro não existe";
		}		
	}
	
	//alterando um registro
	if(isset($_POST["btnAlterar"])){
		
		$sql = "update alunos set matr_aluno ='".$matr_aluno."', nome_aluno ='".$nome_aluno."', sexo_aluno ='".$sexo_aluno."', ano_ingresso ='"
		.$ano_ingresso."', id_aluno ='".$id_aluno."' where codigo =".$codigo;
		
		echo $sql;
		
		if (!mysqli_query($conexao, $sql)){
			die("Error: " . mysqli_error($conexao));
		}
		
		echo "registro alterado !";	
	}
	//removendo um registro
	
	if(isset($_POST["btnExcluir"])){
		
		$sql = "delete from alunos where codigo=".$codigo;
		
		if (!mysqli_query($conexao, $sql)){
			
			die("Error: " . mysqli_error($conexao));
		}
		echo "registro removido !";	
	}
	
	$conexao->close();
 }
?>
<html>
<body>
	<h1>S i D - Sistema de Importacao de Dados</h1>	<form action="alunos.php" method="post">
			Codigo: 
				<br>	<input type="text" name="codigo" value="<?php echo $codigo; ?>">	<br>
			Matricula do Aluno:
				<br>	<input type="text" name="matr_aluno" value="<?php echo $matr_aluno; ?>">	<br>
			Nome do Aluno :
				<br>	<input type="text" name="nome_aluno" value="<?php echo $nome_aluno; ?>"><br>
			Sexo :
				<br>	<input type="text" name="sexo_aluno" value="<?php echo $sexo_aluno; ?>"><br>
			Ano de Ingresso :
				<br>	<input type="text" name="ano_ingresso" value="<?php echo $ano_ingresso; ?>"><br>
			id_aluno :
				<br>	<input type="text" name="id_aluno" value="<?php echo $id_aluno; ?>"><br>
	
	<br>	<br>
	
				<input type="submit" value="Inserir" name="btnInserir">
	
					<input type="submit" value="Pesquisar" name="btnPesquisar">
	
						<input type="submit" value="Alterar" name="btnAlterar">
	
							<input type="submit" value="Excluir" name="btnExcluir">								
	</form>
</body>