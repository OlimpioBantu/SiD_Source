<?php
include('./PHPlot.php');
$graph = new PHPlot(500,450);      //cria um gráfico com tamanho 300x250 pixels

$graph->SetTitle("Title\n\rTestes");
$graph->SetXTitle('X data');
$graph->SetYTitle('Y data');

//Dados para gerar o gráfico
$example_data = array(
                array('a',3,4,2),
                array('b',5,'',1),
                array('c',7,2,6),
                array('d',8,1,4),
                array('e',2,4,6),
                array('f',6,4,5),
                array('g',7,2,3)
);

$graph->SetDataValues($example_data);# Adiciona ao gráfico os valores do array
$graph->DrawGraph(); // Desenha o Gráfico
?>
 
