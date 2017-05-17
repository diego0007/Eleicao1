
<?php

include "teste.php";

?>




<html>
<head>
	<title></title>
	<?php

include "linkagen.php";
	?>
</head>
<body background="images/liso.jpg">
<div class="container">
<div class="form-vertical">
	<center><label><font size="5" color="white">Consulta de Votos de Candidatos:</font></label></center>
<hr width="70%" >


</div>
</div>
<center>
<table border="5" class="table table-striped">

<thead>
		<tr>
		    
			<th><font color="green">Nome</font></th>
            <th><font color="green">Quantidade de votos</font></th>
            </tr>
	</thead>


<?php

include "conexao.php";


   $consulta = mysqli_query($conexao,'select c.nome,v.qtd_votos from candidatos as c,voto as v where c.id_candidato = v.id_candidato');

		while ($dados = mysqli_fetch_assoc($consulta)){
?>
<tbody>
		<tr>


        <td>
		<?php echo "<p></p>" , $dados['nome']; ?> 
		</td>
		<td>
		<?php echo "<p></p>" , $dados['qtd_votos']; ?> 	
		</td>
		
		

        </tr>
		</tbody>
		<?php
	
}
?>

</table>
</center>





</body>
</html>
<center>

