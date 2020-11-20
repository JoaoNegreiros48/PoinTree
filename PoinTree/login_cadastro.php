
  <html>
    <head>
      	<!--Import Google Icon Font-->
    	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<!--Import materialize.css-->
      <link rel="stylesheet" href="framework/css/materialize.min.css" media="screen,projection">
    	<!-- MaterialDesign -->
    	<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    	<!--Let browser know website is optimized for mobile-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="custom.css">
      <!-- #f1f8e9 light-green lighten-5
      #c5e1a5 light-green lighten-3
      #9ccc65 light-green lighten-1
      #8bc34a light-green
      #558b2f light-green darken-3
      #33691e light-green darken-4 -->
      <style>
          input{
            color: white;
          }
          .painel{
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 5%;
           /* margin-bottom: 50%;*/
          }
          .divisa{
            border-right: 5px solid #c5e1a5;
            padding-right: 50px;
          }
          .centro{
            margin-top: 10%;
          }
		  #uf{
				text-transform: uppercase;
			}
      </style>

		<title>PoinTree</title>
    </head>

    <body class="light-green lighten-5">

  <div class="painel card-panel light-green darken-4">
    <div class="row">

    <div class="col s6">
      <div class="divisa">
        <h3 class="light-green-text text-lighten-5">Cadastrar</h3>
        <br><br>
    <!-- CADASTRO -->
    <form action="cadastro.php" method="POST" class="">
      <!-- NOME -->
      <div class="row">
        <div class="input-field col s9">
          <input id="nome" placeholder="José Carlos" name="nome" type="text" class="validate" maxlength="60" onkeypress="return SomenteLetras(event)" required>
          <label for="nome">Nome</label>
        </div>
        
      <!-- CPF -->
        <div class="input-field col s3">
          <input id="cpf" placeholder="35867811097" name="cpf" type="text" class="validate" maxlength="11" onkeypress="return SomenteNumero(event)" required>
          <label for="cpf">CPF</label>
        </div>
      </div>

      <!-- Email -->
      <div class="row">
        <div class="input-field col s8">
          <input placeholder="pointree@gmail.com" name="email" id="email" type="text" class="validate" maxlength="40" required>
          <label for="email">Email</label>
        </div>

      <!-- Senha -->
        <div class="input-field col s4">
          <input placeholder="Digite sua senha" id="senha" name="senha" type="password" class="validate" maxlength="16" required>
          <label for="senha">Senha</label>
        </div>
      </div>

      <div class="row">
      <!-- CEP -->
        <div class="input-field col s2">
          <input placeholder="35998268" name="cep" id="cep" type="text" class="validate" onkeypress="return SomenteNumero(event)" maxlength="9" required>
          <label for="cep">CEP</label>
        </div>

        <!-- RUA -->
        <div class="input-field col s3">
          <input placeholder="Pedroso Alameda" name="rua" id="rua" type="text" class="validate" maxlength="60" required>
          <label for="rua">Rua</label>
        </div>

        <!-- BAIRRO -->
        <div class="input-field col s3">
          <input placeholder="Votocel" name="bairro" id="bairro" type="text" class="validate" maxlength="60" required>
          <label for="bairro">Bairro</label>
        </div>

        <!-- CIDADE -->
        <div class="input-field col s3">
          <input placeholder="Votorantim" name="cidade" id="cidade" type="text" class="validate" maxlength="20" onkeypress="return SomenteLetras(event)" required>
          <label for="cidade">Cidade</label>
        </div>

        <!-- UF -->
        <div class="input-field col s1">
          <input placeholder="SP" name="uf" id="uf" type="text" class="validate" maxlength="2" onkeypress="return SomenteLetras(event)" required>
          <label for="uf">UF</label>
        </div>
      </div>

      <div class="center">
        <button class="btn waves-effect waves-light light-green lighten-5 light-green-text text-darken-4" type="submit" name="action">
          Cadastrar<i class="material-icons right">create</i>
        </button>
      </div>
    </form>
    </div>
    </div>
      
    <!-- LOGIN -->
    <div class="col s4 offset-s1">
      <div class="center-align">
        <h3 class="light-green-text text-lighten-5">Login do Usuario</h3>
        <br><br>
      <form action="login.php" method="POST">
      <!-- Email -->
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input placeholder="pointree@gmail.com" name="email" id="email" type="text" class="validate" maxlength="60" required>
          <label for="email">Email</label>
        </div>

      <!-- Senha -->
        <div class="input-field col s6 offset-s3">
          <input placeholder="Digite sua senha" id="senha" name="senha" type="password" class="validate" maxlength="16" required>
          <label for="senha">Senha</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light light-green lighten-5 light-green-text text-darken-4" type="submit" name="action">
          Login<i class="material-icons right">person</i>
        </button>
      </form>
      </div>
    </div>
    </div>



      <!-- MaterialDesign -->
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <!-- Jquery -->
    <script src="framework/jquery.slim.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script src="framework/js/materialize.min.js"></script>
      <script>
	  
	  
	  
        $(document).ready(function(){
        $('.parallax').parallax();
        });
      </script>
	  
	  <!-- (Bloquear letras em input de número)-->
<script language='JavaScript'>
function SomenteNumero(e){
var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true; //abilita valores nulos e a tecla apagar
	else  return false;
    }
}
</script>
<!-- -->

<script language='JavaScript'>
function SomenteLetras(e){
var tecla1=(window.event)?event.keyCode:e.which;   
    if((tecla1>64 && tecla1<91 || tecla1>96 && tecla1<123)) return true;
    else{
    	if (tecla1==8 || tecla1==0 || tecla1==32) return true; //abilita valores nulos e a tecla apagar
	else  return false;
    }
}
</script>
	  
	  
	  
    </body>
  </html>