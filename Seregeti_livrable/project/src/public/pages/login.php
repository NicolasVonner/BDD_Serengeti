<?php
  require_once('../php/index/connection.php');
  session_start();
?>
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

    
 
  if (!isset($_SESSION['user_id'])) {
    echo '<script language="Javascript">
        document.location.replace("http://localhost:8000/pages/connexion.php");
        </script>'; 
    //header('Location: ../connexion.php?error=2');
  }
  else {
    $message = [];
  // Si le jeton CSRF du formulaire ne correspond pas à celui stocké en session
  // ou que le jeton est expiré
;
    if ($_SESSION['jeton_valid'] < new DateTime()) {
      $message['message'] = "Erreur de jeton.";
      echo '<script language="Javascript">
      document.location.replace("http://localhost:8000/pages/connexion.php?error=2");
      </script>'; */
      //header('Location: ../connexion.php?error=2');
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
    
    echo "Bonjour ".$_SESSION["utilisateur"];
    
    $r=new Connection();
    $conn = $r->link;
      $req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee", soignant."specialite" FROM personnel, soignant WHERE personnel."codeP"=soignant."refS"';
      $statementS = $conn->prepare($req);
      $statementS->execute();
      $resultatS=$statementS->fetchAll();
      
    echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">age</th>
      <th scope="col">sexe</th>
      <th scope="col">type de Contract</th>
      <th scope="col">Salaire</th>
      <th scope="col">Date d\'arrivée</th>
      <th scope="col">Specialité</th>
    </tr>
  </thead>
  <tbody>';



  foreach ($resultatS as &$valueS) {
    echo ' <tr>
    <th scope="row">'.$valueS["nom"].'</th>
    <td>'.$valueS["prenom"].'</td>
    <td>'.$valueS["age"].'</td>
    <td>'.$valueS["sexeP"].'</td>
    <td>'.$valueS["typeContrat"].'</td>
    <td>'.$valueS["salaire"].'</td>
    <td>'.$valueS["dateArrivee"].'</td>
    <td>'.$valueS["specialite"].'</td>
  </tr>';
}
  
echo "</tbody> </table>";

      $req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee", equipe."nomEquipe" FROM personnel, garde, equipe WHERE personnel."codeP"=garde."codeP" and garde."codeE"=equipe."codeE"';
      $statementG = $conn->prepare($req);
      $statementG->execute();
      $resultatG=$statementG->fetchAll();

      echo '<table class="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">age</th>
          <th scope="col">sexe</th>
          <th scope="col">type de Contract</th>
          <th scope="col">Salaire</th>
          <th scope="col">Date d\'arrivée</th>
          <th scope="col">equipe</th>
        </tr>
      </thead>
      <tbody>';
    
    
    
      foreach ($resultatG as &$valueS) {
        echo ' <tr>
        <th scope="row">'.$valueS["nom"].'</th>
        <td>'.$valueS["prenom"].'</td>
        <td>'.$valueS["age"].'</td>
        <td>'.$valueS["sexeP"].'</td>
        <td>'.$valueS["typeContrat"].'</td>
        <td>'.$valueS["salaire"].'</td>
        <td>'.$valueS["dateArrivee"].'</td>
        <td>'.$valueS["nomEquipe"].'</td>
      </tr>';
    }
      
    echo "</tbody> </table>";
        
    ?>
    <div class="container text-center">    
      <h3>vous pouvez également consulter : </h3><br>
      <a href="#" class="btn btn-primary">Animaux/Végétaux</a>
    </div><br>
   


    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>

  </body>

</html>