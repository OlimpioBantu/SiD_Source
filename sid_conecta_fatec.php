<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
header('Content-Type: text/html; charset=UTF-8');
$host = "127.0.0.1"; 					/*maquina a qual o banco de dados está*/
	$usuario = "root"; 					/*usuario do banco de dados MySql*/
		$senha =""; 					/*senha do banco de dados MySql*/			
			$banco = "fatec"; 			/*seleciona o banco a ser usado*/
				$link = mysqli_connect("127.0.0.1", "$usuario", "$senha", "$banco");/*<-- indica o banco */	
		$conexao = mysqli_connect($host, $usuario, $senha, $banco);  /* <--Conecta no banco de dados fatec */
	
	mysqli_select_db($link, $banco); /*seleciona o banco a ser usado*/  /*<-- bloco responsavel pela conexao com o Banco de Dados*/
		if ( mysqli_connect_errno() )
	{
		echo mysqli_connect_error();
	}
?>