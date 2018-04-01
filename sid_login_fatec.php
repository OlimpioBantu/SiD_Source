<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	 <link rel="stylesheet" href="sid_senha.css" media="all"/> 
	</head>
	<body>
	<div id="central">
				<h1 align="center"> S.!.D  </center>
				<h3 align="center"> Sistema de Importação e Gerenciamento de Dados Acadêmicos </center>  		
				<br><br>
				<align="center"> Módulo Alpha</center>	<div id="central">
				<h5><align="center"> Versao 6.09.00</center>	</h5>
		        <center><h2> Login </h2></center>
	<div id="frm">	
	    <form name="frmlogin" method="post">						
		<select name="tipo">
			<option value="1">Admin</option>			
			<option value="2">Aluno</option>          <!-- Modulo de escolha de usuario-->
			<option value="3">Docente</option>
		</select>					
	<br> 
	<br> 
	<br> 
    <br>	<!-- modulo do cabecario-->
<?php

header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	if(count($_POST)>0)
{
		$conexao = mysqli_connect("127.0.0.1","root","","fatec"); /*<-- modulo da conexao com o BD */
		$login=$_POST["usuario"];
		$senha=$_POST["senha"];
	if(isset($_POST["Entrar"]))			 
  {
		  $tipo=$_POST["tipo"];		
		  
	session_start();
		  $_SESSION["tipo"]=$tipo;
		  $_SESSION["usuario"]=$login;
		  
	if($tipo=="1")
	{ 
	  $sql="SELECT nome_admin, cod_admin  FROM administradores WHERE cod_admin='".$senha."' AND nome_admin='".$login."'";
	} 
			if(($tipo=="2") )
	{
	 $sql="SELECT matr_aluno, nome_aluno FROM alunos WHERE matr_aluno='".$senha."' AND nome_aluno='".$login."'";
	}				
			 if($tipo=="3")
	{ 
	 $sql="SELECT cod_prof, nome_prof  FROM docentes WHERE cod_prof='".$senha."' AND nome_prof='".$login."'";
	}	
  }
	if (!mysqli_query($conexao,$sql))
		{
			die ("Erro de Conexão!".Mysqli_error($conexao));
		}
	if (mysqli_num_rows (mysqli_query($conexao,$sql))>0)
			{
				if($tipo == "1")
					header("Location:sid_admin_fatec.php");
				
				elseif($tipo == "2")
					header("Location:sid_modulo_notas_aluno.php?matr_aluno=$senha" );
					
				else
					header("Location:sid_notas_prof.php?cod_prof=$senha"); 
			}
		else
	{
		echo'<script>';
		echo'alert("ATENÇÃO !!! Usuário ou Senha não Cadastrados !!!");';
		echo'</script>';
	}
}
?>
			Usuário <br> <input type="text" name="usuario" id="usuario"><br><br>
			Senha <br>   <input type="password" name="senha" id="senha"  size="3" maxlength="9"><br><br>
			            
  <input type="submit" value="Entrar" name="Entrar" id="bt">&nbsp; 
			        	 <input type="reset" value="limpar" id="bt">
				    <br>
					<br>
	<input name = "Send" class="buttom" onClick = "document.location=' http://www.fatecipiranga.edu.br '" value="  Sair" > 
		</form>
			</div>
	</body>
</html>