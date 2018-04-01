<?php

	require_once 'phplot.php';// requisição da classe PHPlot
	
	
	
	header('Content-Type: text/html; charset=UTF-8');//acerta a pontuação
	
	function getValues()
{
	$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");

	$query = $db->query ("SELECT a.matr_aluno, a.notas_discip 
							FROM notas_disciplinas a, prof_discip b 
							where a.cod_discip = b.cod_discip" ) ;		
	
	/*
	select AVG(notas_discip ) from notas_disciplinas
           where cod_discip = 100
		
	*/
	
	while
 		($obj = $query->fetch_object())
 	{
		$values[] = array($obj->matr_aluno, $obj->notas_discip);
 	}

 return $values;
}
getValues() ;

$plot = new PHPlot(1450 , 550);//Cria um novo objeto do tipo PHPlot com n.px de larg x n.px de alt 
 
 // Organiza Gráfico -----------------------------
$plot->SetTitle('S.i.D - Sistema de Importacao e Gerenciamento de Dados Academicos');
$plot->SetPrecisionY(2); # Precisão de uma casa decimal

$plot->SetPlotType("bars");# tipo de Gráfico 

$plot->SetDataType("text-data");# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (porcentagem)

$plot->SetDataValues(getValues());# Adiciona ao gráfico os valores do array
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');

$plot->SetXLabel("S.!.D");# Texto abaixo do eixo X

# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(1);
$plot->SetAxisFontSize(1);
// -----------------------------------------------
// Organiza eixo Y -------------------------------
$plot->SetYDataLabelPos('plotin');# Coloca nos pontos os valores de Y
$plot->SetPlotAreaWorld(NULL, 0, NULL, 10); # define a altura do eixo Y
// -----------------------------------------------
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>