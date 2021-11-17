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
    
    
    <form id="report" method="post" action="http://localhost:8000/php/requete/personel/personel_create.php">
            <div class="row">

              <div class="form-group col-md-5">
              <label for="nom">Nom *:</label>
    <input class="form-control" type="text" id="nom" name="nom" required minlength="2" maxlegth="255"  >
    <label for="prenom">Prenom *:</label>
    <input class="form-control" type="text" id="prenom" name="prenom" required minlength="2" maxlegth="255" >
   
    <label for="age">Age * :</label>
    <input class="form-control" type="number" id="age" name="age" min="0" max="100" value="23">
    Sexe * : <INPUT  type="radio" name="sexeP" value="M" checked> Homme <INPUT type="radio" name="sexeP" value="F"> Femme
    <br />
    <label for="salaire">Salaire * :</label>
    <input class="form-control" type="number" id="salaire" name="salaire" min="200" max="10000" value="1500">
    <br />
    </div>

    
    <div class="form-group col-md-5">
    <label>type de personel</label>
    <select class="form-control" name="typeP" id="typeP">
        <option value="soignant">Soigniant</option>
        <option value="garde">Garde</option>
    </select>
      <br />
      
</div>
            <div class="form-group col-md-5">
                <label>Date d'arrivée</label>
                <input id="dateArrivee" name="dateArrivee" type="datetime-local" value="2021-10-07T20:00">
              </div>


      
            </div>
          
          <div class="form-group col-md-5">
          <label>Type de contract</label>
        <select class="form-control" name="typeC" id="typeC">
        <option value="CDI">CDI</option>
        <option value="CDD">CDD</option>
        <option value="Alternance">Alternance</option>
        <option value="Stage">Stage</option>
    </select>
    
    
          </div>
          <div class="form-group col-md-5">
          <label for="specialite">Spécialité *:</label>
    <input class="form-control" type="text" id="specialite" name="specialite" required minlength="2" maxlegth="255" >

    </div>
<div class="form-group col-md-5">
<label>equipe</label>
    <select class="form-control" name="equipe" id="equipe">
<?php
       $r=new Connection();
       $conn = $r->link;
        $req = 'SELECT equipe."codeE", equipe."nomEquipe" FROM equipe';
        $statement = $conn->prepare($req);
        $statement->execute();
        $result = $statement->fetchAll();
        //var_dump($result);
        foreach ($result as $value) {
          
            echo '<option value="'.$value["codeE"].'">'.$value["nomEquipe"].'</option>';
        }
  ?>
  </select>
  <input class="btn btn-primary form-control" type="submit" value="Envoyer">
    </form>
    </div>
    <div class="container text-center">    
      <h3> Soigniant : </h3><br>
    </div>

    

    <?php
    
    echo "Bonjour ".$_SESSION["utilisateur"];
    
    
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
  
echo "</tbody> </table>"; ?>
<div class="container text-center">    
      <h3> Gardes : </h3><br>
    </div>
<?php
      //$req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee", equipe."nomEquipe" FROM personnel, garde, equipe WHERE personnel."codeP"=garde."codeP" and garde."codeE"=equipe."codeE"';
      $req='SELECT * FROM personnel, garde, equipe WHERE garde."codeE"=equipe."codeE" and  personnel."codeP"=garde."codeP" ';
      //$req='SELECT "nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee" FROM personnel, garde WHERE personnel."codeP"=garde."codeP"';
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
    <div hidden class="container text-center">    
      <h3>vous pouvez également consulter : </h3><br>
      <a href="#" class="btn btn-primary">Animaux/Végétaux</a>
    </div><br>
   
    <script>
        //document.getElementById('equipe').style.display = 'none';
        //document.getElementById('specialite').style.display = 'none';
      </script>

    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>

  </body>

</html>