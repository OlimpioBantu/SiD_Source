<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<style type="text/css">
body 
{
    background:  #00868B;
    font: normal 14px/30px Helvetica, Arial, sans-serif; <!--quadro externo-->
    color: #2b2b2b;
}
a 
{
    color:#898989;
    font-size:14px;
    font-weight:bold;
    text-decoration:none;
}
a:hover 
{
    color:#CC0033;
}
h1
 {
    font: bold 14px Helvetica, Arial, sans-serif;
    color: #CC0033;  <!--arquivo: -->
}
h2 
{
    font: bold 14px Helvetica, Arial, sans-serif;
    color:#000000;   <!--exibindo os dados-->
}
#container {
    background:#8B8878;
    margin: 100px auto; <!--quadro interno-->
    width: 945px;
}
#form           {padding: 20px 150px;}
#form input     {margin-bottom: 20px;}

<p align = "middle"> <input type="button" onClick="document.location='sid_menu_fatec.php'" value="  Pagina Anterior  "><br />
	<form method="post" action="sid_lista_aluno.php">	
    <br>

		</style>
	</head>
<body>
	<div id="container">
		<div id="form">
<?php
	INCLUDE "sid_conecta_fatec.php";
	header('Content-Type: text/html; charset=UTF-8');
		$import ="SELECT  matr_aluno, nome_aluno, ano_ingresso, email_aluno, nome_mae FROM alunos";
	
		if (isset($_POST['submit'])) 	//comando que habilita a transferencia do arquivo
{
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) //<--script que define o arquivo a ser importado
		{
			echo "<h0>" . "Arquivo: ". $_FILES['filename']['name'] .", carregado com sucesso ! ." . "</h0>";
		}
	$handle = fopen($_FILES['filename']['tmp_name'], "r"); 
 
	   while (($line = fgetcsv($handle,0,";")) !==false)
	{
	 $sql="INSERT INTO fatec.alunos (matr_aluno, nome_aluno, ano_ingresso, email_aluno, nome_mae) VALUES('".$line[0]."', '".$line[1]."', '".$line[2]."', '".$line[3]."', '".$line[4]."')";// carrega na tela os dados
	 $result = mysqli_query($conexao, $sql);
		if (!$result)
		{
			echo mysqli_error($conexao);
		}
    }
		fclose($handle);
				print "Importação feita com sucesso!!.";				
} 
	else //Visualizar formulário de transferência
	{
      print "Importar novos arquivos .csv selecione o arquivo e clique no botão Upload<br /> \n";
	  print "<form enctype='multipart/form-data' action='#' method='post'>";
	  print "Nome do arquivo a importar:<br /> \n";
	  print "<input size='50' type='file' name='filename'><br />\n";
	  print "<input type='submit' name='submit' value='Upload'></form>";
	}  
?> 
	</div>
		</div>
			</body>
				</html>				