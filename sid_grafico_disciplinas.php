<?php

require_once 'phplot.php';// requisição da classe PHPlot

 function getValues()
{
	$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");
	
			 $query = $db->query ("SELECT ROUND (AVG (notas_discip),2) AS notas_discip, nome_discip
									FROM notas_disciplinas 
										GROUP BY nome_discip ");
	while
 		($obj = $query->fetch_object())
 	{
		$values[] = array( $obj->nome_discip,$obj->notas_discip);
 	}
 
 return $values;
}

$plot = new PHPlot(1450 , 500);//Cria um novo objeto do tipo PHPlot com n.px de larg x n.px de alt 
 
  // Organiza Gráfico -----------------------------
$plot->SetTitle('S.!.D - Sistema de Importação e Gerenciamento de acadêmicos Dados');
$plot->SetPrecisionY(1); # Precisão de casas decimais

$plot->SetPlotType("bars");# tipo de Gráfico 

$plot->SetDataType("text-data");# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (porcentagem)

$plot->SetDataValues(getValues());# Adiciona ao gráfico os valores do array
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
$plot->SetXLabel("Disciplinas");# Texto abaixo do eixo X

# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(3);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
// Organiza eixo Y -------------------------------
$plot->SetYDataLabelPos('plotin');# Coloca nos pontos os valores de Y
$plot->SetPlotAreaWorld(NULL, 0, NULL, 10); # define a altura do eixo Y
// -----------------------------------------------
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------

?>