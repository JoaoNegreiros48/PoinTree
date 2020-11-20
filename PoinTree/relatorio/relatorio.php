<?php
session_start();
if(!isset($_SESSION["user"])){
	header("refresh:0;url=../redirect.php");
	exit();

}else{

		if($_SESSION["user"] == "Administrador"){
			$admMode = "on";
		}else{
			$admMode = "off";
		}
}


?>
<html>
<head>
<link rel="stylesheet" href="../framework/css/materialize.min.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script src="../framework/jquery.slim.js"></script>
 <script src="../framework/js/materialize.min.js"></script>
<title>Pointree</title>

	<style>
		th{color: #757575;}
		body {
  background-color: #ece5dc;
}
	</style>

</head>
<body>

<?php
$pasta="";
include "../splash.php";
include "../conecta.php";

$modal = 1;
$modalAdd = 1;

// Mysqli Table and Column 
$table = "usuario";
$table2 = "relatorio_Plantio";

$tabNome = "nome";
$tabEmail = "email";
$tabCpf = "cpf";
$tabFlora = "flora";
$tabNum_arvores = "num_arvores_plantadas";
$tabData = "data_plantio";

// Edit Mode
if($admMode == "on"){
$edit1 = filter_input(INPUT_GET, 'edit', FILTER_DEFAULT);

if($edit1 == "" || $edit1 == "on"){
$color1 = "amber darken-4"; //Yellow
$color2 = "amber darken-3";
$color3 = "amber darken-1";
$color4 = "amber accent-4"; //modal color 

$modeBtn = "Edição";
$modeIcon = "create";

$pulse = "pulse";
$edit = "off";
}
}else{
	$edit1 = "off";
}

if($edit1 == "off"){
$color1 = "light-green darken-4"; //Green
$color2 = "light-green darken-3"; 
$color3 = "light-green darken-1";
$color4 = "grey darken-1"; //modal color (gray)

$modeBtn = "Visualização";
$modeIcon = "remove_red_eye";

$pulse = "";
$edit = "on";
}

?>

<?php
if($admMode == "on"){

//Function Delete
$del = filter_input(INPUT_GET, "del", FILTER_DEFAULT);
$alert = filter_input(INPUT_GET, "alert", FILTER_DEFAULT);
$nome = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);
$dataPlantio = filter_input(INPUT_GET, "dataPlantio", FILTER_DEFAULT);
$mysqliDate = filter_input(INPUT_GET, "mysqliDate", FILTER_DEFAULT);

if($del == "on"){

	$del = "off";

	$delPlantio = filter_input(INPUT_GET, "delPlantio", FILTER_DEFAULT);
	$cpf = filter_input(INPUT_GET, "cpf", FILTER_DEFAULT);
	
	if($delPlantio == "on"){
		mysqli_query($conexao, "DELETE from $table2 where $tabCpf=$cpf AND $tabData='$mysqliDate'");
		header("refresh:0;url=relatorio.php?edit=on&&alert=delPlantio&&dataPlantio=$dataPlantio");
	}else{
			mysqli_query($conexao, "DELETE from $table2 where $tabCpf=$cpf");
			mysqli_query($conexao,"DELETE from $table where $tabCpf=$cpf");
			header("refresh:0;url=relatorio.php?edit=on&&alert=del&&nome=$nome");
	}
	
	
}

//Function Insert

if(isset($_POST["group1"])){$bioma = $_POST["group1"];}
if(isset($_POST["numArv"])){$numArv = $_POST["numArv"];}
if(isset($_POST["date"])){$date = $_POST["date"];}
if(isset($_POST["addPlantioCPF"])){$addPlantioCPF = $_POST["addPlantioCPF"];}
if(isset($_POST["addPlantio"]))
{
	$addPlantio = $_POST["addPlantio"];
		if($addPlantio == "on"){
			$addPlantio = "off";
			
			mysqli_query($conexao, "insert into $table2 values(
			'$bioma', $addPlantioCPF, $numArv, '$date 00:00:00');");
			
			header("refresh:0;url=relatorio.php?alert=insert");
		}
}

//Alerts

if($alert == "del"){
	echo "<script>setTimeout(function(){alert('O usuário $nome foi deletado com sucesso!');},1000);</script>";
	header("refresh:2;url=relatorio.php");
	
}else if($alert == "delPlantio"){
	echo "<script>setTimeout(function(){alert('Os dados do plantio na data $dataPlantio foram apagados!');},1000);</script>";
	header("refresh:2;url=relatorio.php");
	
}else if($alert == "insert"){
	echo "<script>setTimeout(function(){alert('O plantio foi adicionado com sucesso!');},1000);</script>";
	header("refresh:2;url=relatorio.php");
}
}

//----- NavBar

if(isset($_POST['navbar'])){$navbar = $_POST['navbar'];}else{$navbar = filter_input(INPUT_GET, 'navbar',FILTER_DEFAULT);}

echo '
<form action="relatorio.php?edit='.$edit1.'" method="POST">

<div class="row">
<div class="input-field col s4">
  <nav>
    <div class="nav-wrapper '.$color1.'">
      <form>
        <div class="input-field">
          <input name="navbar" value="'.$navbar.'" id="search" type="search" placeholder="Buscar..." required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  </div>
 </div>
 
 </form>
  ';
  
  echo '
  
  <a href="../main/index.php" class="waves-effect '.$color2.' btn"><b><</b></a>
	';
	
	
	
  echo '
   <div class="right-align">
		<a href="relatorio.php?edit='.$edit1.'" class="waves-effect '.$color3.' btn tooltipped" 
		data-position="top" data-tooltip="Recarregar">
		<i class="medium material-icons">autorenew</i></a>
		';
		
		if($admMode == "on"){
   echo '
	   <a href="relatorio.php?edit='.$edit.'&&navbar='.$navbar.'" class="waves-effect '.$color3.' btn tooltipped"
	   data-position="top" data-tooltip="'.$modeBtn.'">
	   <i class="medium material-icons">'.$modeIcon.'</i></a>
   </div>
	
	';
		}else{
			
		echo '
			<a href="#" class="waves-effect grey darken-2 btn tooltipped"
		   data-position="top" data-tooltip="Modo Editor">
		   <i class="medium material-icons">lock</i></a>
	   </div>
	   ';
		}

				if($navbar != ""){
					$sql = mysqli_query($conexao,"select * from $table 
					where $tabNome LIKE '%$navbar%' or $tabEmail LIKE '%$navbar%'
					order by $tabNome ASC");
					$row = mysqli_num_rows($sql);
					
				}else{
					$sql = mysqli_query($conexao,"select * from $table order by $tabNome ASC");
					$row = 1;
				}
					
			if($row < 1){
				echo '<h4><b>Nenhum resultado encontrado por: "'."$navbar".'"</b></h4>';
			}else{
					
			  echo '
			  <h4 style="margin-left: 10px;"><b>Usuários Cadastrados:</b></h4>
			  <div class="row">
			  <div class="input-field col s10">
			  <table style="margin-left: 20px; margin-right: 20px;">
			  <tr>
					<th>Bioma</th>
					<th>Árvores <br>Plantadas</th>
					<th>Data do <br>Último Plantio </th>
					<th>Nome</th>
					';
					
					if($admMode == "on"){
				echo '
					<th>CPF</th>
					';
					}
					
					echo '
					<th>Email</th>
					<th>
			  </tr>
			  ';
			  
					while($lista = mysqli_fetch_array($sql)){
							
					$nome = $lista["$tabNome"];
					$cpf = $lista["$tabCpf"];
					$email = $lista["$tabEmail"];
					
				//---------------------------------------------------------- ADD NEW Tree's------------------------------------------------
				echo '
						<div id="A'.$modalAdd.'" class="modal modal-fixed-footer">
						<div class="modal-content">
						
						  <h4><b>Novo Plantio</b></h4>
						  <h5 style="color: #bdbdbd "><b>Usuário: '.$nome.'</b></h5>
						  ______________________________________________
						  
				
						  <form action="relatorio.php" method="POST">
						  
						  <div class="row">
						  <div class="input-field col s3">
								  <input placeholder="Apenas Números" id="numArv" type="text" class="validate" 
								  onkeypress="return SomenteNumero(event)" name="numArv" required>
								  <label for="numArv">Árvores Plantadas</label>
								</div>
								
								<input type="hidden" name="addPlantioCPF" value="'.$cpf.'">
								<input type="hidden" name="addPlantio" value="on">
								
								<div class="input-field col s3">
								<input type="date" name="date" required>
								</div> 
								</div>
								
		<p><label>
        <input name="group1" value="Amazônia" type="radio" checked />
        <span>Amazônia</span></label></p>
		<p><label>
		
        <input name="group1" value="Caatinga" type="radio"  />
        <span>Caatinga</span></label></p>
		<p><label>
		
        <input name="group1" value="Cerrado" type="radio"  />
        <span>Cerrado</span></label></p>
		<p><label>
		
        <input name="group1" value="Mata Atlântica" type="radio"  />
        <span>Mata Atlântica</span></label></p>
		
		<p><label>
        <input name="group1" value="Pampas" type="radio"  />
        <span>Pampas</span></label></p>
		
		<p><label>
        <input name="group1" value="Pantanal" type="radio"  />
        <span>Pantanal</span></label></p>
		
						  
						</div>
						<div class="modal-footer">
						  <button class="btn waves-effect waves-light '.$color1.'" type="submit">Enviar</button>
						</div>
						</form>
					  </div>
				';
				
				
				//-----------------------------------------------------------------------------------------------------------------------
					
					//total
					$sql2 = mysqli_query($conexao,"select * from relatorio_Plantio
					where $tabCpf = $cpf order by $tabData DESC");
					
			$row = mysqli_num_rows($sql2);
					
			if($row > 0){
					
					$sqlTotal = mysqli_query($conexao,"SELECT cpf, SUM(num_arvores_plantadas) AS total 
					FROM relatorio_Plantio where $tabCpf=$cpf
					GROUP BY cpf;");
					$total = mysqli_fetch_array($sqlTotal);
					$total1 = $total['total'];
					
					
					
					echo '
					<div id="'.$modal.'" class="modal modal-fixed-footer">
						<div class="modal-content">
						  <h4><b>Relatório de Plantio</b></h4>
						  <h5 style="color: #bdbdbd "><b>Usuário: '.$nome.'</b></h5>
						 <h6 style="color: #bdbdbd "><b>Total: '.$total1.'</b></h6>
						 ______________________________________________
						  <br><br>
						  ';
							
							$i = 1;
							while($listaRelatorio = mysqli_fetch_array($sql2)){

							$flora = $listaRelatorio["$tabFlora"];
							$num_arvores = $listaRelatorio["$tabNum_arvores"];
							
							$mysqliDate = $listaRelatorio["$tabData"];
							$date = date_create($mysqliDate);
							$data = date_format($date,"d/m/Y");
							
							if($i > 0){
								$ultData = $data; 
								$ultFlora = $flora;
								if($edit == "off"){$colorSec = "#ffc107";}else{$colorSec = "green";}
								$i--;}else{$colorSec="gray";}
				
					echo "
					<p style='font-size:25px'>
					";
					
					if($edit == "off"){
						echo "
						<a  href='relatorio.php?
							del=on&&delPlantio=on&&cpf=$cpf&&dataPlantio=$data&&mysqliDate=$mysqliDate
												' class='btn-floating btn-small $color4 modal-trigger $pulse'>
												<i class='small material-icons'>clear</i></a>
						";
					}
					echo '
								[<b>'.$flora.' - <span style="color: '.$colorSec.';">'.$data.'</span></b>] 
								Árvores Plantadas: '.$num_arvores.'</p>
							';
							}
							
					echo '
						</div>
						<div class="modal-footer">
						  <a href="#!" class="modal-close waves-effect waves-red btn-flat">X</a>
						</div>
					  </div>
					';
					$modalbtn = "on";
			}else{
					$ultFlora = "---";
					$total1 = "<b>---</b>";
					$ultData = "<b>xx/xx/xxxx</b>";
					$modalbtn = "off";
			}
							
							echo"
							  <tr>
									<td><b>$ultFlora</b></td>
									<td>$total1</td>
									<td>$ultData 
									";
						if($modalbtn == "on"){		
							echo"
									<a  href='#$modal' class='btn-floating btn-small $color4 modal-trigger $pulse'>
									<i class='small material-icons'>assignment</i></a>
							";
						}
						if($edit != "on"){
							echo"
										<a  href='#A$modalAdd' class='btn-floating btn-small $color4 modal-trigger $pulse'>
										<i class='small material-icons'>add</i></a></td>
								";
						}else{echo "</td>";}
							echo"
									<td>$nome</td>
									";
									
									if($admMode == "on"){
									echo "
									<td>$cpf</td>
									";
									}else{
										
										$emailsub = substr($email,0,3);
										$emailDominio = strstr($email, '@');
										$email = "$emailsub******$emailDominio";
										
										
									}
									
									echo "
									<td>$email</td>
									";
									
								if($edit != "on"){
										echo"
										<td><a  href='relatorio.php?
											del=on&&nome=$nome&&cpf=$cpf
											' class='btn-floating btn-small $color4 modal-trigger $pulse'>
											<i class='small material-icons'>clear</i></a></td>
									  ";
								}
								
							  $modal++;
							  $modalAdd++;
						}
						
						echo "
							</tr>
						    </table></div></div>
							  ";
							  
					
			}

?>

<script>
  $(document).ready(function(){
    $('.modal').modal();
  });
  
  $(document).ready(function(){
    $('select').formSelect();
  });
  
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>	

<!-- Código Copiado de Gabriel Fróes (Bloquear letras em input de número)-->
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
</script>
<!-- -->


</body>
</html>