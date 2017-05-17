
<html>
<head>
<meta charset="utf-8">
	<title>Consulta Votos</title>
	<style type="text/css">
		.grafico{
			position: relative;
			width: 200px;	
			border: 1px solid #B1D632;
			padding: 2px;
		}
		.grafico .barra{
			display: block;
			position: relative;
			background: pink ;
			text-align: left;
			color:black;
			height: 2em;
		}
		.grafico .barra span{position: absolute;left: 1em;}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
	</script>
	</head>
<body background="images/liso.jpg">
<?php
include "teste.php";
include "conexao.php";
?>
<div class="container">
<br><br>
<div class="col-lg-12">
            <h2 class="page-header" align="center"><font color="white">Gráfico de votos</font></h2>
            </div>
<?php
   include "conexao.php";
 $capturar=mysqli_query($conexao,"SELECT c.*, v.* from candidatos as c, voto as v where c.id_candidato = v.id_candidato");
 $votos = mysqli_query($conexao,"SELECT sum(qtd_votos) from voto");

     while ($linha1=mysqli_fetch_array($votos)) {
     	$somar = $linha1['sum(qtd_votos)'];
     	while($linha2 = mysqli_fetch_array($capturar)){
     		$qtd_votos = $linha2['qtd_votos'];
     		$nome = $linha2['nome'];

     		$total = ($qtd_votos * 100)/$somar;
   ?>

   <div align="center">
<a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $linha2['partido']; ?>"><?php echo "<br>".$linha2['nome']; ?></a><div class="grafico" align="right"><strong style="width: <?php echo (int)$total; ?>%" class="barra"><?php echo (int)$total; ?>%</strong></div>
</div>
   <?php
     	}
     }

 ?>
</body>
</html>
