<?php
	$codigo = 0;
		$cod_prof = "";
			$nome_prof = "";
				$nome_discip = "";
					$cod_discip = "";
					
 //verifica se a pagina foi recarregada	
 
 if(count($_POST) > 0)
 {
	$conexao = new mysqli("127.0.0.1","root","", "fatec");
	
	$codigo = $_POST["codigo"];
	
		$cod_prof = $_POST["cod_prof"];
		
			$nome_prof = $_POST["nome_prof"];
			
	$nome_discip  = $_POST["nome_discip"];
	
		$cod_discip  = $_POST["cod_discip"];
	
	if(isset($_POST["btnInserir"]))
	{
		$sql= "INSERT INTO professores_fatec.php (cod_prof, nome_prof, nome_discip, cod_discip) 
		
				values('".$cod_prof."','".$nome_prof."','".$nome_discip."','".$cod_discip."')"; 
				
						//echo $sql;
		
		if (!mysqli_query($conexao,$sql)) 
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "<Br>1 registro adicionado";
	}	
	//pesquisa um registro atraves do ID no BD
	
	if(isset($_POST["btnPesquisar"]))
	{
		$sql = "select cod_prof, nome_prof, nome_discip, cod_discip from professores_fatec.php where codigo=".$codigo;
		
			$result = mysqli_query($conexao,$sql);
			
			if($registro = mysqli_fetch_array($result)) 
		{
			 $cod_prof = $registro['cod_prof'];
			 
					$nome_prof = $registro['nome_prof'];
					
			 $nome_discip = $registro['nome_discip'];
			 
				$cod_discip = $registro['cod_discip'];
		} else 
		{
			echo "registro não existe";
		}		
	}
		//alterando um registro
		
	if(isset($_POST["btnAlterar"]))
	{
		$sql = "update professores_fatec.php set 
		
						cod_prof='".$cod_prof."', nome_prof='".nome_prof."',nome_discip='".$nome_discip."', cod_discip='".$cod_discip."' 
		
					where codigo=".$codigo;
					
		echo $sql;
		
			if (!mysqli_query($conexao, $sql)){
				
			die("Error: " . mysqli_error($conexao));
		}
		echo "registro alterado !";	
	}
	//removendo um registro
	
	if(isset($_POST["btnExcluir"]))
	{
		$sql = "delete from professores_fatec.php where codigo=".$codigo;
		
		if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		echo "registro removido !";	
	}	
$cone-->close();
 }
?>
<html>

<body>

	<h1>S.i.D - Sistema de Importacao de Dados</h1>	<form action="professores_fatec.php" method="post">
	
	Codigo: 
			<br><input type="text" name="codigo" value="<?php echo $codigo; ?>">	<br>
			
	Codigo do Professor: 
			<br><input type="text" name="cod_prof" value="<?php echo $cod_prof; ?>">	<br>
			
	Nome do Professor :
			<br><input type="text" name="nome_prof" value="<?php echo $nome_prof; ?>">	<br>
			
	Nome da Disciplina :
			<br><input type="text" name="nome_discip" value="<?php echo $nome_discip; ?>"><br>
			
	Codigo da Disciplina :
			<br><input type="text" name="cod_discip" value="<?php echo $cod_discip; ?>"><br>
	
	<br><br>
	
	<input type="submit" value="Inserir" name="btnInserir">
	
		<input type="submit" value="Pesquisar" name="btnPesquisar">
	
			<input type="submit" value="Alterar" name="btnAlterar">
	
				<input type="submit" value="Excluir"  name="btnExcluir">			
	
	</form>
	
</body>