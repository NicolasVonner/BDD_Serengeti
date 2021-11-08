<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Parc national de Serengeti</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <?php

    session_start();
 
  if (!isset($_SESSION['user_id'])) {
    //header('Location: ../connexion.php?error=2');
  }
  else {
    $message = [];
  // Si le jeton CSRF du formulaire ne correspond pas à celui stocké en session
  // ou que le jeton est expiré
    if ($_POST['jeton'] !== $_SESSION['jeton'] || $_SESSION['jeton_valid'] < new DateTime()) {
      $message['message'] = "Erreur de jeton.";
      header('Location: ../connexion.php?error=2');
    } else {
    //suppression des variables de session concernant le jeton
      unset($_SESSION['jeton']);
      unset($_SESSION['jeton_valid']);
    }
  }

    ?>
    
    <title>Page Title</title>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php"> <img src="../images/logo-v2/logo_gimp.png" alt="Image"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="cares.html">Animal cares</a></li>
            <li><a href="interventions.html">Group interventions</a></li>
            <li><a href="observations.html">Observations</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1>Page de login</h1>
    <p>Cette page permet aux responsables de zone de se connecter afin d'accéder à leur espace</p>
    <p>Les reponsables de zones peuvent consulter les information du personnel (salaire, datearrivee, ....)</p>
    <?php
    //$_SESSION["utilisateur"] 
    //SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee" FROM "personnel", soignant WHERE personnel.codeP=soignant.refS
    //SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee" FROM "personnel", garde WHERE personnel.codeP=garde.codeP
      $req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee" FROM "personnel", soignant WHERE personnel.codeP=soignant.refS';
      $statementS = $conn->prepare($req);
      $statement->execute();
      $resultatS=$statement->fetchAll();

      $req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee" FROM "personnel", garde WHERE personnel.codeP=garde.codeP';
      $statementS = $conn->prepare($req);
      $statement->execute();
      $resultatG=$statement->fetchAll();
        
    ?>

    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>

  </body>

</html>