<?php

require_once 'phplot.php';// requisição da classe PHPlot

 function getValues()
{
	$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");
 	$query = $db->query ("SELECT nome_discip, notas_discip
				           FROM notas_disciplinas 
						     WHERE matr_aluno = ('". $_GET["matr_aluno"] . "')order by notas_discip");
	while
 		($obj = $query->fetch_object())
 	{
		$values[] = array($obj->nome_discip, $obj->notas_discip);
 	}
 
 return $values;
}
getValues() ;

$plot = new PHPlot(1450 , 500);//Cria um novo objeto do tipo PHPlot com n.px de larg x n.px de alt 
 
  // Organiza Gráfico -----------------------------
$plot->SetTitle('S.!.D - Sistema de Importacao e Gerenciamento de academicos Dados');
$plot->SetPrecisionY(2); # Precisão de uma casa decimal

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

// Organiza eixo Y -------------------------------
$plot->SetYDataLabelPos('plotin');# Coloca nos pontos os valores de Y
$plot->SetYLabel("Notas");# Texto do eixo Y
$plot->SetPlotAreaWorld(NULL, 0, NULL, 10); # define a altura do eixo Y
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();

?>