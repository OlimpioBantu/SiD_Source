<?php

require_once 'phplot.php';// requisição da classe PHPlot

 function getValues()
{
	$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");
 	$query = $db->query ( "SELECT a.notas_discip, a.cod_discip,a.nome_aluno,  a.matr_aluno,
					b.cod_discip 
		     FROM notas_disciplinas a, prof_discip b 
			 WHERE a.cod_discip = b.cod_discip
			 AND cod_prof='". $_GET["cod_prof"] ."' order by nome_aluno ");
	while
 		($obj = $query->fetch_object())
 	{
		$values[] = array($obj->nome_aluno, $obj->notas_discip);
 	}
 
 return $values;
}
getValues() ;

$plot = new PHPlot(1324 , 500);//Cria um novo objeto do tipo PHPlot com n.px de larg x n.px de alt 
 
  // Organiza Gráfico -----------------------------
$plot->SetTitle('S.!.D - Sistema de Importacao e Gerenciamento de academicos Dados');
$plot->SetPrecisionY(2); # Precisão de uma casa decimal
$plot->SetPlotType("bars");# tipo de Gráfico 
$plot->SetDataType("text-data");# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (porcentagem)
$plot->SetDataValues(getValues());# Adiciona ao gráfico os valores do array
$plot->SetDataColors('gray'); // cores das linhas do grafico
$plot->SetBackgroundColor( 'yellow' ); #define a cor de fundo do grafico
$plot->SetShading(15); //Determina o 3D
  // Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none'); //Desabilita as descrições de cada eixo.
$plot->SetXLabel("Alunos");# Texto abaixo do eixo X
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