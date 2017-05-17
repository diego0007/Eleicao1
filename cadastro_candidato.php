
<?php
include "teste.php";
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Dimapian</title>

</head>
<body background="images/liso.jpg" onload="document.teste.idade.focus()">
<div align="center">
<div class="form-cadastro">
		<form name="teste" class="form-inline" method="post" action="cadastro_candidato.php">
		<fieldset>

	<!-- Formulario Name -->
		<legend><font color="white">Cadastro de Candidatos</font></legend>

		<!-- Texto input-->
		<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Nome:</span>
      <input type="text" name="nome" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="">
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>

<br><br>
		  


<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">CPF:</span>
      <input type="text" name="cpf" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="">
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>


		<br><br>


<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Idade:</span>
      <input type="text" name="idade" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="" maxlength="3" onkeydown="if (event.keyCode != 8 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 96 || event.keyCode > 105) { alert('Você só pode digitar números neste campo.'); return false}" onmousedown="return false" onselectstart="return false" oncontextmenu="return false" onmousedown="return false" onmousemove="return false">
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>

<br><br>

<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Partido:</span>
      <input type="text" name="partido" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="">
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>


<br><br>


<div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Título:</span>
      <input type="text" name="titulo" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="">
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>


<br><br>

		<!-- Butao -->
		<div class="control-group">
		  <label class="control-label" for=""></label>
		  <div class="controls">
		    <input type="submit" id="btvalidar"  class="btn btn-info" value="Cadastrar">
		    <button type="reset" class="btn btn-danger">limpar</button>
		  </div>
		</div>

		</fieldset>
		</form>
	</div>



</div>

</body>
</html>
<?php
 include "conexao.php";

@$nome=$_POST['nome'];
@$cpf=$_POST['cpf'];
@$idade=$_POST['idade'];
@$partido=$_POST['partido'];
@$titulo=$_POST['titulo'];



if (isset($nome) && isset($cpf) && isset($idade)  && isset($titulo) && isset($partido)) {
$query = mysqli_query(@$conexao,"INSERT INTO candidatos values('','$nome','$cpf','$idade','$partido','$titulo')");


$resultado= mysqli_query($conexao, "SELECT * from candidatos where cpf = '$cpf'");
while($linha = mysqli_fetch_assoc($resultado)){

    $candidato = $linha['id_candidato'];
    $inserir = mysqli_query($conexao, "INSERT into voto values('', '$candidato', '')");

echo '<meta charset=UTF-8>
       <script>alert("Cadastro realizado com susseso! .....!")</script>';
       
echo "<script>
window.location=\"cadastro_candidato.php\" 
</script>";

}
}
?>