<?php
include "conexao.php";
 $capturar=mysqli_query($conexao,"SELECT c.*, v.* from candidatos as c, voto as v where c.id_candidato = v.id_candidato");
 $votos = mysqli_query($conexao,"SELECT sum(qtd_votos) from voto");

     while ($linha1=mysqli_fetch_assoc($votos)) {
     	$somar = $linha1['sum(qtd_votos)'];
     	while($linha2 = mysqli_fetch_assoc($capturar)){
     		$qtd_votos = $linha2['qtd_votos'];
     		$nome = $linha2['nome'];
     		$total = ($qtd_votos * 100)/$somar;
     		

?>
<html>
<head>
	<title>Gráfico:</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([



        	
          ['Candidatos', 'Votos'],
          ['<?php  echo $linha2['nome']; ?>', <?php echo (int)$total; ?>]
        
        ]);

        var options = {
          title: 'Gráfico por Votos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

     
    </script>






</head>
<body>
<div id="piechart" style="width: 900px; height: 500px;"></div>

<?php
}
}

?>
</body>
</html>