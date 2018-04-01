<?php
	$codigo ="";	
	$senha_admin = "";
		$nome_admin = "";
			$email = "";	
 //verifica se a pagina foi recarregada	
 if(count($_POST) > 0)
 {
		$conexao = new mysqli("127.0.0.1","root","", "fatec");
					$codigo = $_POST["codigo"];
							$senha_admin   = $_POST["senha_admin"];
									$nome_admin  = $_POST["nome_admin"];
										 $email  = $_POST["email"];					
	if(isset($_POST["btnInserir"]))
	{
		$sql= "INSERT INTO cadastro_senha (senha_admin, nome_admin, email_admin )
				values('".$senha_admin."','".$nome_admin."','".$email_admin."')"; 
		//echo $sql;
		if (!mysqli_query($conexao,$sql)) { die("Error: " . mysqli_error($conexao));
		}
		echo "<Br>1 Registro Adicionado";
	}	
	$conexao->close();
 }
?>
<html>
<body>
	<p><h3>SiD - Sistema de Importacao de Dados - Cadastro de senha:</h3> </p>
				
		<form action="cadastro_senha_fatec.php" method="post">	<link rel="stylesheet" href="css.css" media="all"/>	
	<p align = "middle"> 	Codigo : <p align = "middle"> 	<br><input type="text" name="codigo" value="<?php echo $codigo; ?>">	
				<br> 
				<br>				
		</form>
</body>