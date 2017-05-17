
<?php
include "teste.php";
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Dimapian</title>
<script language="javascript" type="text/javascript">
    /*
     Função para aumentar o  tamanho da letra.
     Funciona em todos os Navegadores. 
     by Juliano Sales
     */
    function mudarTamanho(variavel){
     /* Essa função pode ser reutilizada em qualquer campo.
         o valor do campo recebe = o valor dele mesmo  mas em  maiúsculo
       */
          variavel.value = variavel.value.toUpperCase();
    };
    </script>
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
<body background="images/liso.jpg" onload="document.teste.idade.focus()">

<div align="center">
<div class="form-cadastro">
		<form  name="teste" class="form-inline" method="post" action="cadastro_eleitor.php">
		<fieldset>

	<!-- Formulario Name -->
		<legend><font color="white">Cadastro de Eleitores</font></legend>

		<!-- Texto input-->
	  <div class="form-group has-success has-feedback">
    <label class="control-label" for="inputGroupSuccess3"></label>
    <div class="input-group">
      <span class="input-group-addon">Nome:</span>
      <input type="text" name="nome" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="" onblur="mudarTamanho(this)">
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
      <span class="input-group-addon">Titulo:</span>
      <input type="text" name="titulo" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required="" onkeypress="return txtBoxFormat(this, '999.999.999-999', event);" maxlength="15" >
    </div>
    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
  </div>


<br><br>


		<!-- Butao -->
		<div class="control-group">
		  <label class="control-label" ></label>
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
@$idade=$_POST['idade'];
@$titulo=$_POST['titulo'];

if (isset($nome) && isset($idade) && isset($titulo) ) {
if ($idade < 16) {
	echo '<meta charset=UTF-8>
       <script>alert("Voçê é muito novo para votar! .....!")</script>';
       
echo "<script>
window.location=\"cadastro_candidato.php\" 
</script>";
}else{
	



$query2 = mysqli_query(@$conexao,"INSERT INTO eleitor values('','$nome','$idade','$titulo','')");

echo '<meta charset=UTF-8>
       <script>alert("Cadastro realizado com susseso! ..... Voçe sera encaminhado o local de votação!")</script>';

	echo "<script>
window.location=\"cadastro_voto.php\" 
</script>";
}
}
?>