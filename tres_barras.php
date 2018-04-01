<?php

$db = new mysqli("localhost", "root", "", "fatec");
 	$db->set_charset("utf8");

#incluindo a classe.
require_once 'phplot.php';

#Matriz utilizada para gerar os graficos
		 $data = array(
					array('Jan', 20, 2, 14), array('Fev', 30, 3, 4), array('Mar', 20, 4, 14),
					array('Abr', 30, 5, 4), array('Mai', 13, 6, 4), array('Jun', 37, 7, 24),
					array('Jul', 10, 8, 4), array('Ago', 15, 9, 4), array('Set', 20, 5, 12),
					array('Out', 28, 4, 14),array('Nov', 16, 7, 14), array('Dez',25, 15,9)
					);
	
	/*
	$data = $db-> array ( "SELECT  Round(AVG(notas_discip),2), nome_discip
					FROM notas_disciplinas 
						WHERE cod_discip = 700 ");
	
	$data = array (array ("SELECT  Round(AVG(notas_discip),2)
					FROM notas_disciplinas 
						WHERE cod_discip = 700 "),
	                 array ("SELECT  Round(AVG(notas_discip),2)
					FROM notas_disciplinas 
						WHERE cod_discip = 100"),
					array ("SELECT  Round(AVG(notas_discip),2)
					FROM notas_disciplinas 
						WHERE cod_discip = 101")	
                      
		          );
					
					
				/*	select AVG(notas_discip ) from notas_disciplinas
where cod_discip = 100
		
	*/	
			
	
#Instancia o objeto e setando o tamanho do grafico na tela
$plot = new PHPlot(800,600);

#Tipo de borda, consulte a documentacao
$plot->SetImageBorderType('plain');

#Tipo de grafico, nesse caso barras, existem diversos(pizza…)
$plot->SetPlotType('lines');

#Tipo de dados, nesse caso texto que esta no array
$plot->SetDataType('text-data');

#Setando os valores com os dados do array
$plot->SetDataValues($data);

#Titulo do grafico
$plot->SetTitle('Grafico de Notas e medias');

#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array('Alunos','Disciplinas', 'Turma'));

#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos('none');

$plot->SetXTickPos('none');
#Gera o grafico na tela
$plot->SetPlotAreaWorld(NULL, 0, NULL, 40); # define a altura do eixo Y
$plot->DrawGraph();
?>