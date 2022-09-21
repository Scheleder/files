<?php
include('verifica_login.php');
?>

<!--
<h2>Usuário: <?php echo $_SESSION['nome'];?></h2>
<h2>Matricula: <?php echo $_SESSION['matricula'];?></h2>
<h2>Tipo: <?php echo $_SESSION['tipo'];?></h2>
<h2><a href="logout.php">Sair</a></h2>
-->

<!DOCTYPE html>

<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    
    <title>Berry - Gerenciador de Backups</title>
<link rel="shortcut icon" href="favicons/favicon.ico" type="image/x-icon" />


    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
	  

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
	
	<script type="text/javascript">
	function abrirUpload(){
    document.getElementById("_frame").src = "upload.html"; 
	}
	</script> 

  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
     <a class="navbar-brand" href="painel.php"><button class="btn btn-success" name="submit" type="submit">ARQUIVOS</button></a>
	 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
	 
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#upload" onclick="abrirUpload();return false;">
			<button class="btn btn-success" name="submit" type="submit">UPLOAD</button></a>
			
          </li>
          
        </ul>
		
		
        <form class="d-flex" action="busca.php"  method="post" enctype="multipart/form-data" >
          <input class="form-control me-2" type="text" name="word" placeholder="Pesquisar" aria-label="Search">
          <button class="btn btn-outline-warning" name="submit" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container" id="main">
    
   <!-- <p class="lead">Navegue pelas pastas.</p> -->
   <iframe src="dir.php" width="600" height="500" id="_frame" allowfullscreen></iframe>
  </div>
  
 
</main>

<footer class="fixed-bottom mt-auto py-3 bg-light">
  <div class="container">
   <span class="text-muted">ElectricWare - Colombo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
   Usuário: <?php echo $_SESSION['nome'];?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
   <a href="logout.php"><button type="button" class="btn btn-outline-danger">SAIR DO SISTEMA</button></a>

  </div>
</footer>


    <script src="js/bootstrap.bundle.min.js"></script>

      
  </body>
  
</html>