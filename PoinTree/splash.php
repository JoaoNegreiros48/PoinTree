<?php

if(isset($_SESSION["splash"])){
	
$splash=$_SESSION["splash"];

}else{
	$_SESSION["splash"]="off"; $splash="on";
	}


if($splash == "on"){

echo '

<script>
var i = setInterval(function () {
    
    clearInterval(i);
  
    document.getElementById("loading").style.display = "none";
    document.getElementById("conteudo").style.display = "inline";

}, 3000);
</script>

<div id="loading" style="display: block">

	<center>
	<img src="'.$pasta.'PoinTree.gif" style="width:50%;">
	</center>

</div>
<div id="conteudo" style="display: none">
';
}
?>
