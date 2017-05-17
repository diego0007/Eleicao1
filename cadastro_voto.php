<!DOCTYPE html>
<html>
<head>
	<title>Voto</title>
	<script language=javascript>
//MÁSCARA DE VALORES

function txtBoxFormat(objeto, sMask, evtKeyPress) {
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;


if(document.all) { // Internet Explorer
    nTecla = evtKeyPress.keyCode;
} else if(document.layers) { // Nestcape
    nTecla = evtKeyPress.which;
} else {
    nTecla = evtKeyPress.which;
    if (nTecla == 8) {
        return true;
    }
}

    sValue = objeto.value;

    // Limpa todos os caracteres de formatação que
    // já estiverem no campo.
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( " ", "" );
    fldLen = sValue.length;
    mskLen = sMask.length;

    i = 0;
    nCount = 0;
    sCod = "";
    mskLen = fldLen;

    while (i <= mskLen) {
      bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/") || (sMask.charAt(i) == ":"))
      bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

      if (bolMask) {
        sCod += sMask.charAt(i);
        mskLen++; }
      else {
        sCod += sValue.charAt(nCount);
        nCount++;
      }

      i++;
    }

    objeto.value = sCod;

    if (nTecla != 8) { // backspace
      if (sMask.charAt(i-1) == "9") { // apenas números...
        return ((nTecla > 47) && (nTecla < 58)); } 
      else { // qualquer caracter...
        return true;
      } 
    }
    else {
      return true;
    }
  }
</script>
</head>
<body background="images/liso.jpg">
	<?php
include "teste.php";
include "conexao.php";
include "linkagen.php";
?>
<br><br>
 <div class="form-horizontal">
<div align="center">
 <form class="form-inline" method="post" action="cadastro_voto.php">
 
   <div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Título:</span>
      <input type="text" name="titulo" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="" onkeypress="return txtBoxFormat(this, '999.999.999-999', event);" maxlength="15" >
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>
	<br><br>
               <input type="submit" name="botao" id="botao" value="Consultar" class="btn btn-warning">
</form>
</div>
			</div>		
	<?php include "conexao.php";

@$titulo = $_POST['titulo'];

@$botao = $_POST['botao'];

    if($botao){  

 $titulo1 = mysqli_query($conexao, "SELECT * from eleitor where titulo = '$titulo'");

 $voto = mysqli_query($conexao, "SELECT * from eleitor where voto = 1 and titulo = '$titulo'");

 $linha1 = mysqli_num_rows($titulo1);

 $linha2 = mysqli_num_rows($voto);

            if($linha2 == 1){

	echo '<meta charset=UTF-8>
       <script>alert("Desculpe! ..... O sistema nao pode deixar o usuário votar 2x!")</script>';

	echo "<script>
window.location=\"cadastro_voto.php\" 
</script>";

             }else{

	             if($linha1 == 1){

		$voto = mysqli_query($conexao, "UPDATE eleitor set voto = 1 where titulo = '$titulo'");

		echo '<meta charset=UTF-8>
       <script>alert("Verificaçao realizado com susseso! ..... Vote Certo!")</script>';

	echo "<script>
window.location=\"voto.php\" 
</script>";


		}else{

		echo '<meta charset=UTF-8>
       <script>alert("Cadastre-se para votar!")</script>';

	echo "<script>
window.location=\"cadastro_eleitor.php\" 
</script>";

	}

}

}

	?>
</body>
</html>