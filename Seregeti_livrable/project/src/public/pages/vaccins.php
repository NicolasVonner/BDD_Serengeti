<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Serengeti_Cares</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/vaccins.css?v=1.0" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <title>Page Title</title>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="../index.php"> <img src="../images/logo-v2/logo_gimp.png" alt="Image"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="cares.php">Animal cares</a></li>
            <li><a href="interventions.php">Group interventions</a></li>
            <li><a href="observations.php">Observations</a></li>
            <li class="active"><a href="vaccins.php">Vaccins</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="col-md-5">
        <!-- ZONE D'AJOUT DE SOIN -->
        <div>
          <h4><small>UPDATE ANIMAL VACCIN</small></h4>
          <h2>Update a vaccin</h2>
        </div>

        <div>
          <form id="update">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="inputEmail4">Animal referral</label>
                <input type="referralS" class="form-control" id="referralAnimal" name="referralAnimal" placeholder="Animal referral">
              </div>

              <div class="form-group col-md-5">
                <label for="inputPassword4">Vaccin</label>
                <input type="referralA" class="form-control" id="vaccin" name="vaccin" placeholder="Vaccin">
              </div>
  
            </div>
            
          </form> 
          <button class="btn btn-primary" onclick="envoyerFormulaireUpdate();">Envoyer</button>
        </div>   
      </div>
    </div>
    <div id="updated-vaccin" class="container-fluid text-center consult-care-scroll-x">

    </div>

    <div class="navbar-fixed-bottom">
      <footer class="container-fluid text-center">
        <div class="text-center p-3" >
          © 2021 Copyright: Adrien Lamé, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>
    
  </body>
  <script type="module" src="../js/vaccins/vaccins_update.js"></script>
  <script src="../js/connexion/is_logged.js"></script>
</html>

<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>