<?php

require_once 'phplot.php';// requisição da classe PHPlot

 function getValues()
{
	$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");
 	$query = $db->query ("SELECT nome_aluno, notas_discip
				FROM notas_disciplinas WHERE cod_discip = 111 order by notas_discip");
				
				
	while
 		($obj = $query->fetch_object())
 	{
		$values[] = array($obj->nome_aluno, $obj->notas_discip);
		
		/*
	$data = $db-> vetor ( "SELECT  Round(AVG(notas_discip),2), nome_discip
					FROM notas_disciplinas 
						WHERE cod_discip = 700 ");
	
	*/	
		
 	}
 
 return $values;
}
getValues() ;

$plot = new PHPlot(1020 , 500);//Cria um novo objeto do tipo PHPlot com n.px de larg x n.px de alt 
 
  // Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('S.!.D - Sistema de Importação e Gerenciamento de academicos Dados')); #acerta a acentuação
$plot->SetPrecisionY(2); # Precisão de uma casa decimal
$plot->SetPlotType("bars");# tipo de Gráfico 
$plot->SetDataType("text-data");# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (porcentagem)
$plot->SetDataValues(getValues());# Adiciona ao gráfico os valores do array
$plot->SetDataColors('orange'); // cores das linhas/barras do grafico
$plot->SetBackgroundColor( 'beige' ); #define a cor de fundo do grafico
$plot->SetShading(9); //Determina o 3D

// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
$plot->SetXLabel("Alunos");# Texto abaixo do eixo X 

# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(4);
$plot->SetAxisFontSize(4);

// Organiza eixo Y -------------------------------
$plot->SetYDataLabelPos('plotin');# Coloca nos pontos os valores de Y
$plot->SetPlotAreaWorld(NULL, 0, NULL, 10); # define a altura do eixo Y

// Desenha o Gráfico -----------------------------
$plot->DrawGraph();

?>