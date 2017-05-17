



<html>
<head>
<meta http-equiv="Content_Type" content="text/html; charset=UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo_form.css">
	<?php
include "teste.php";
?>
	<?php

include "linkagen.php";
	?>
    <script src="jquery/jquery.js"></script>
	<script src="jquery/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery/jquery-ui/jquery-ui.css">
<script>
	<?php 
include "conexao.php";

	$autocomplete = mysqli_query($conexao,"SELECT * FROM eleitor ORDER BY nome"); 
		?>

	$(function(){
		var availableTags=[

		<?php
		while($dados = mysqli_fetch_assoc($autocomplete)){
			echo "'".$dados['nome']."',";

		}

		?>
		];
		$("#tags").autocomplete({
			source: availableTags
		});
	});

	</script>


</head>
<body background="images/liso.jpg">
<div class="form-cadastro">
	

<center><form class="form-inline" method="post" action="consulta_eleitor.php">
<h1><center><font color="white">Dados do Eleitor</font></center></h1>
<fieldset>
<legend><center><label><font color="white">Pesquisa de eleitor</font></label></center></legend><br>

<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Nome:</span>
      <input type="text"  id="tags" name="tx_pesquisa" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" >
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>
		  <br><br>



<center><input type="submit" name="Procurar" class="btn btn-info" value="Procurar"></center><br>
</fieldset>
</form></center>

<center><div class="table-responsive"><table border="5" id="" class="table table-striped" >
	<thead>
		<tr>
		    <th><font color="green">ID</font></th>
			<th><font color="green">Nome</font></th>
            <th><font color="green">Idade</font></th>

            </tr>
	</thead>
<?php
include "conexao.php";
@$tx_pesq = $_POST['tx_pesquisa'];
@$resultado = mysqli_query($conexao,"SELECT * FROM eleitor WHERE nome like '$tx_pesq%'");
if($resultado){
	while ($linha = mysqli_fetch_assoc($resultado) ) {
		?>
		<tbody>
		<tr>


        <td>
		<?php echo "<p></p>", $linha['id_eleitor']; ?>
		</td>
		<td>
		<?php echo "<p></p>", $linha['nome']; ?>	
		</td>
		<td>
		<?php echo "<p></p>", $linha['idade']; ?>	
		</td>
		

        </tr>
		</tbody>
		<?php
	}
}
?>
</table>
</div>
</center>

</div>
</body>
</html>






