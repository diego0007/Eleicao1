
<html>
<head>
	<title>Início</title>
</head>
<?php
include "teste.php";
include "linkagen.php";
?>



<body background="images/liso.jpg">

<div class="w3-content w3-section" style="max-width:500px">
  <a href="cadastro_eleitor.php"><img class="mySlides" src="images/cadastro.png" width="1350" height="350"></a>
  <a href=cadastro_voto.php><img class="mySlides" src="images/img2.jpg" width="1350" height="350"></a>
  <a href="grafico_den.php"><img class="mySlides" src="images/grafico.jpeg" width="1350" height="350"></a>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>


</body>

</html>