<?php
session_start();
if(!isset($_SESSION["user"])){
	header("refresh:0;url=../redirect.php");
	exit();
}
?>
  <html>
    <head>
 <link rel="stylesheet" href="../framework/css/materialize.min.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script src="../framework/jquery.slim.js"></script>
 <script src="../framework/js/materialize.min.js"></script>
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
        .parallax-container{
          height: 700px;

        }
		

        #fonte{
          font-size: 200px;
        }

        #botao{
          padding-top: 100px;
        }
        blockquote {
          border-left: 5px solid #33691e;
          text-align: justify;
        }
        #block2{
          border-left: none;
          border-right: 5px solid #33691e;
        }
		
		body {
  background-color: #ece5dc;
}
      </style>

		<title>PoinTree</title>
    </head>

    <body>
<?php

if(isset($_SESSION["splash"])){unset($_SESSION["splash"]);}
$pasta="../relatorio/";
include "../splash.php";
unset($_SESSION["splash"]);
?>	


    <nav>
    <div class="nav-wrapper light-green darken-4">
      <!-- LINK LOGO -->
      <a href="#" class="brand-logo"><img src="logo2.png" alt="" class="" width="35%"></a>
	  <span style="margin-left: 80px; font-size: 30px;">Ola, <b 
	  <?php if($_SESSION["user"] == "Administrador"){echo " style='color: darkred;'";}?>>
		  <?php echo $_SESSION["user"]; ?></b></span>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
			  <li><a href="../relatorio/relatorio.php?edit=off">Relatório</a></li>
          <li><a href="#">Localização</a></li>
          <li><a href="#">Plante uma Arvore</a></li>
          <li><a href="sair.php">Sair</a></li>
        </ul>
      </div>
    </nav>


    <!-- PARALLAX -->
    <div id="index-banner" class="parallax-container">
      <div class="section no-pad-bot">
          <div class="container">
            <br><br><br><br>
            <h1 class="header center white-text">PoinTree</h1>
            <div class="row center">
                <h4 class="header col s12  white-text">Cuidamos Dela,Para Nós</h4>
            </div>
            <br><br>
          </div>
        </div>
        <div id="parallaxmove" class="parallax">
          <img src="parallax.jpg" alt="parallax.jpg" class="responsive-img">
        </div>
      </div>
      
      <!-- CORPO DO SITE -->
      <div class="row">
        <br>
        <blockquote class="col s5 offset-s1"> <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur fugit nemo voluptatum vitae quibusdam assumenda quam quia, reprehenderit delectus tempora quo quasi accusantium consectetur illum vero adipisci doloribus eaque quaerat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit voluptate sed ut, repellat molestiae vero, distinctio neque asperiores, assumenda odio, eum dolores! Repellendus ut ducimus aspernatur asperiores quasi reiciendis doloremque.</h4></blockquote>
      

        <div class="col s5 offset-s1">
          <div class="card-panel light-green darken-4">
          <img src="img_1.jpg" class="responsive-img" width="750px" height="" alt="">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s5">
          <div class="card-panel light-green darken-4">
          <img src="img_2.jpg" class="responsive-img" width="750px" height="" alt="">
          </div>
        </div>

        <blockquote id="block2" class="col s5 offset-s1"> <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur fugit nemo voluptatum vitae quibusdam assumenda quam quia, reprehenderit delectus tempora quo quasi accusantium consectetur illum vero adipisci doloribus eaque quaerat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit voluptate sed ut, repellat molestiae vero, distinctio neque asperiores, assumenda odio, eum dolores! Repellendus ut ducimus aspernatur asperiores quasi reiciendis doloremque.</h4></blockquote>
      </div>

      <!-- FOOTER -->
      <footer class="page-footer light-green darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Pointree, cada um faz a diferença</h5>
                <p class="grey-text text-lighten-4">Uma Organização Não Governamental voltada para o tratamento e reflorestamento da natureza</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Entre em Contato</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">planteasua@pointree.org</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 Copyright Page
            <a class="grey-text text-lighten-4 right" href="#!">PoinTree.org</a>
            </div>
          </div>
        </footer>
		
		<script>
        $(document).ready(function(){
        $('.parallax').parallax();
        });
      </script>
	  
    </body>
  </html>