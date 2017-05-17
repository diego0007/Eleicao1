<?php include"teste.php";?>
<html>
<head>
	<title></title>

	<script language="javascript">
function Valida(form){

var ok = false;
var form = document.forms[0].chk;

for (i = 0; i < form.length; i++)	{ 
	if (form[i].checked) { 
		ok = true; 
	}
}
if (!ok) {
	alert ("Selecione algum item.");
	return false;
	}
}
</script>
</head>
<body background="images/liso.jpg">
<div align="center">
<form  name="form"  method="post" action="voto.php" onsubmit="return Valida(this)">

	<?php include "conexao.php";
$resultado1 = mysqli_query($conexao,"SELECT * from candidatos  ");
while ($linha1 = mysqli_fetch_assoc($resultado1)) {
	?>
	<label class="btn btn-success">
<input type="radio" name="radio"  id="chk" value="<?php  echo $linha1['id_candidato'];?>" > <?php  echo $linha1['nome'];?>   <br>
</label>

<?php

}
?>
<div class="control-group">
		  <label class="control-label" for=""></label>
		  <div class="controls">
		    <input type="submit" name="votar"  class="btn btn-warning" value="Votar">
	
		  </div>
		</div>

</div>


</form>
</body>
</html>

<?php include "conexao.php";

@$id = $_POST['radio'];
@$submit = $_POST['votar'];

if (isset($submit)) {
if($submit) {
$um = 1;

	@$query = mysqli_query(@$conexao,"UPDATE voto SET qtd_votos=qtd_votos+'$um' WHERE id_candidato='$id'");

echo"<script> alert('Voto realizado com susseso.');
window.location=\"cadastro_eleitor.php\"</script>";

}
}

?>



