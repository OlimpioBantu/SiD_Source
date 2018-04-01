<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<body>
<br>
<h1 align="middle">&nbsp Sistema de Importacao e Gerenciamento de Dados Acadêmicos</h1>
						<h1 align="middle"> S.I.D</h1>
				<link rel="stylesheet" href="notas.css" media="all"/>	
		
	<h3 align="middle">  Atualizar notas </h3>
	<form action="sid_atualiza_notas.php" method="post">	
<br>
<?php

header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	$matr_aluno   = "";
	$cod_discip   = "";
	$notas_discip = "";	

 if(count($_POST) > 0)
 {
	$conexao= mysqli_connect("127.0.0.1","root", "", "fatec"); 
	
	$matr_aluno   = $_POST["matr_aluno"];
	$cod_discip   = $_POST["cod_discip"];					
	$notas_discip = $_POST["notas_discip"];
	
	
	if(isset($_POST["btnAlterar"]))  //alterando um registro
	{
		$matr_aluno   = $_POST["matr_aluno"];
		$cod_discip   = $_POST["cod_discip"];				
		$notas_discip = $_POST["notas_discip"];
		
	   $sql = "UPDATE notas_disciplinas
	           SET matr_aluno ='".$matr_aluno."', notas_discip ='".$notas_discip."',cod_discip ='".$cod_discip."'
	    
		WHERE cod_discip =".$cod_discip;
		
		/* if (isset($_GET["cod_discip"]))
		{
			$sql_query="SELECT notas_discip FROM cod_disciplinas WHERE cod_discip= ".$_GET["cod_discip"]; //[user_id= nome da linha]
			$result_set=mysql_query($sql_query);
			$fetched_row=mysql_fetch_array($result_set); //tentar esse
		//*/
		 if (!mysqli_query($conexao, $sql))
		{
			die("Error: " . mysqli_error($conexao));
		}
		
		echo "Registro alterado !";	
	}
	
   	$conexao->close();
 }
?>
	<h3 align="middle">			R.A do Aluno :
		<input type="text" name="matr_aluno" size="3" maxlength="6" value="<?php echo $_GET["matr_aluno"];?>">
		<br> <!--size = define tamanho visual do campo o atributo que limita os caracteres é o maxlenght
							<input type="text" name="nome" size=30 maxlength=30> -->
		<br>
					
	<h3 align="middle">			Código da Diciplina:
		<input type="number" size="3" maxlength="6" name="cod_discip"  value="<?php [" $cod_discip"];?>">	
		<br>								
		<br>
		<br>
	<h3 align="middle">			Nota atualizada:
	<input type="text" name="notas_discip" size="3" maxlength="4" value="<?php echo $notas_discip; ?>">
					<br>
					<br>
	
	<link rel="stylesheet" href="sid_atualiza_notas.php" media="all"/><p>
	
		            <input type="submit" value=" Alterar " name="btnAlterar">
				
		<br> <br>
<input type="button" onClick="document.location='sid_login_fatec.php'" value="  Sair  " ><br />	
<br/>   <br>				
	</form>
</body>
</html>