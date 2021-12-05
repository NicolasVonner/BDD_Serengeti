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
    <link rel="stylesheet" href="../css/login.css">
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
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li><a href="vaccins.php">Vaccins</a></li>
            <li><a href="animal.php">Animal</a></li>
            <li><a href="associationA.php">associationA</a></li>
            <li class="active"><a href="login.php">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

   
    <br>
    <br>
    <h1>Page de login</h1>
    <p>Cette page permet aux responsables de zone de se connecter afin d'accéder à leur espace</p>
    <p>Les reponsables de zones peuvent consulter les information du personnel (salaire, datearrivee, ....)</p>
    <div class="grid">
      <div class="col-md-5 center-block login">
        <div class="text-center">
          <h2>Saisir des informations</h2>
          <h4><small>Information Utilisateur</small></h4>
        </div>

        <div>
          <form id="report">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="nom">Nom *:</label>
                <input class="form-control" type="text" id="nom" name="nom" required minlength="2" maxlegth="255">
              </div>

              <div class="form-group col-md-5">
                <label for="prenom">Prenom *:</label>
                <input class="form-control" type="text" id="prenom" name="prenom" required minlength="2" maxlegth="255">
              </div>

            </div>

            <div class="row">

              <div class="form-group col-md-5">
                <label for="age">Age * :</label>
                <input class="form-control" type="number" id="age" name="age" min="0" max="100" value="23">
              </div>

              <div class="form-group col-md-5">
                <label for="sexe">Sexe * :</label>
                <div>
                  <input type="radio" name="sexeP" value="M" checked> Homme
                  <input type="radio" name="sexeP" value="F"> Femme
                </div>
              </div> 

            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="salaire">Salaire * :</label>
                <input class="form-control" type="number" id="salaire" name="salaire" min="200" max="10000" value="1500">
              </div>
              <div class="form-group col-md-5">
                <label>type de personel</label>
                <select class="form-control" name="typeP" id="typeP">
                    <option value="soignant">Soignant</option>
                    <option value="garde">Garde</option>
                </select>
              </div>
            </div>

            <div class="row">

              <div class="form-group col-md-5">
                <label>Date d'arrivée</label>
                <input id="dateArrivee" name="dateArrivee" type="datetime-local" value="2021-10-07T20:00">
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
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="specialite">Spécialité *:</label>
                <input class="form-control" type="text" id="specialite" name="specialite" required minlength="2" maxlegth="255" disabled>
              </div>

              <div class="form-group col-md-5">
                <label>Equipe</label>
                <select class="form-control" name="equipe" id="equipe">
                <?php
                  $r=new Connection();
                  $conn = $r->link;
                  $req = 'SELECT equipe."codeE", equipe."nomEquipe" FROM equipe';
                  $statement = $conn->prepare($req);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach ($result as $value) {
                      echo '<option value="'.$value["codeE"].'">'.$value["nomEquipe"].'</option>';
                  }
                ?>
                </select>
              </div>
            </div>
          </form>
          <button class="btn btn-primary btn-block" onclick="envoyerPersonnel();">Envoyer</button>
          <div id="create-personnel">
            
          </div>
        </div>   
      </div>


      <div class="container text-center">    
        <h3>Soignant :</h3><br>
        <?php
        
        
          $req='SELECT "codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee", soignant."specialite" FROM personnel, soignant WHERE personnel."codeP"=soignant."refS"';
          $statementS = $conn->prepare($req);
          $statementS->execute();
          $resultatS=$statementS->fetchAll();

          echo '
          <table class="table">
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
                <th scope="col"></th>
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
            <td>
            <form action="http://localhost:8000/php/requete/personel/personel_delete.php" method="post">
            <input  name="codeP" type="hidden" value="'.$valueS["codeP"].'">
            <input  name="typeC" type="hidden" value="soignant">
            <button type="submit" class="btn btn-danger"> Suprimer <span class="glyphicon glyphicon-trash"></span></button>
            </form>
            </td>
            </tr>';
          }
          echo "</tbody> </table>";
        ?>
      </div>

      <div class="container text-center">    
        <h3> Gardes : </h3><br>
      
        <?php
          $req='SELECT personnel."codeP","nom", "prenom", "age", "sexeP", "typeContrat", "salaire", "dateArrivee", equipe."nomEquipe" FROM personnel, garde, equipe WHERE personnel."codeP"=garde."codeP" and garde."codeE"=equipe."codeE"';
          //$req='SELECT * FROM personnel, garde, equipe WHERE garde."codeE"=equipe."codeE" and  personnel."codeP"=garde."codeP" ';
          
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
              <th scope="col">Equipe</th>
              <th scope="col"></th>
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
            <td>
            <form action="http://localhost:8000/php/requete/personel/personel_delete.php" method="post">
            <input  name="codeP" type="hidden" value="'.$valueS["codeP"].'">
            <input  name="typeC" type="hidden" value="garde">
            <button type="submit" class="btn btn-danger">Suprimer <span class="glyphicon glyphicon-trash"></span> </button>
            </form>
            </td>
            </tr>';
          }   
          echo "</tbody> </table>";
        ?>
      </div>
    </div>

    <div class="navbar-fixed-bottom"> 
      <footer class="container-fluid text-center">
        <div class="text-center p-3" >
          © 2021 Copyright: Adrien Lamé, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>

  </body>
  <script type="module" src="../js/login/create_personnel.js"></script>
  <script src="../js/connexion/is_logged.js"></script>
</html>

<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>