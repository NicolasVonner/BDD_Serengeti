<?php

require_once('../php/index/connection.php');
$r=new Connection();
$conn = $r->link;
$reqCLA='SELECT DISTINCT "classeA" from "associationA" ORDER BY "classeA"';
$reqESA='SELECT DISTINCT "especeA" from "associationA" ORDER BY "especeA"';
$reqFAA='SELECT DISTINCT "familleA" from "associationA"  ORDER BY "familleA"';
$req='SELECT DISTINCT "familleA" from animal ORDER BY "familleA"';
  
$statement = $conn->prepare($req);
$statement->execute();

$statementCLA = $conn->prepare($reqCLA);
$statementCLA->execute();

$statementESA = $conn->prepare($reqESA);
$statementESA->execute();

$statementFAA = $conn->prepare($reqFAA);
$statementFAA->execute();

$result=$statement->fetchall();
$resultCLA=$statementCLA->fetchall();
$resultESA=$statementESA->fetchall();
$resultFAA =$statementFAA->fetchall();

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Serengeti_Animal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
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
            <li class="active"><a href="animal.php">Animal</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1>Page Animal</h1>

    <p> Ici nous ajoutons et consultons les animaux </p>
    <div class="container-fluid">
      <div class="col-md-5">
        <!-- ZONE D'AJOUT DE RESSENCEMENT -->
        <div>
          <h4><small>ZONE DE D'AJOUT D'UN ANIMAL</small></h4>
          <h2 id="title-report-espece">Ressencer un nouvelle Animal</h2>
        </div>

        <div>
          <form id="report_new_animal" method="post" action="http://localhost:8000/php/requete/animal/animal_report.php">

            <div class="row">
              <div class="form-group col-md-5">
              Sexe * : <INPUT  type="radio" name="sexeA" value="M" checked> M
              <INPUT type="radio" name="sexeA" value="F"> F
              <br />
            </div>   
              
        </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="especeA">espece Animal</label>
                    <select class="form-control" name="especeA" id="especeA">
                      <?php             
                      foreach ($resultESA as $value) {
                        
                          echo '<option value="'.$value["especeA"].'">'.$value["especeA"].'</option>';
                      }
                      ?>
                    </select>
                  </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-5">
                <label for="familleA">Famille animale</label>
                <select class="form-control" name="familleA" id="familleA">
                    <?php                   
                    foreach ($resultFAA  as $value) {
                        echo '<option value="'.$value["familleA"].'">'.$value["familleA"].'</option>';
                    }
                    ?>
                </select>
              </div>
            </div>
      

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputType">classe animale</label>
                <select id="classeA" name="classeA" class="form-control">               
                  <?php
                      
                    foreach ($resultCLA as $value) {
                      echo '<option value="'.$value["classeA"].'">'.$value["classeA"].'</option>';
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="row">        
              <div class="form-group col-md-5">
                <label for="dateArrivee">Date Arrivée:</label>
                <input id="dateArrivee" name="dateArrivee" type="datetime-local" value="2021-12-03T23:07" min="1980-01-01T09:00" >
              </div>
            </div> 
          </form>
              <button type="submit" class="btn btn-primary"> Envoyer <span class="glyphicon glyphicon-plus"></span></button>
        </div>   
      </div>

      <div class="col-md-5" style="float: right;">
        <!-- ZONE CONSULTATTION DE RESSENCEMENT -->
        <div>
          <h4><small>ZONE DE CONSULTATION DES ANIMAUX</small></h4>
          <hr>
          <h2 id="title-consult-espece">Consulter un Animal</h2>
        </div>

        <div>
          <form id = "consult" method="post" action="#">
              <div class="row">
                <div class="form-group col-md-5">
                  <input class="form-check-input" type="checkbox" name="checkAllInfo" id="checkAnim">
                  <label class="form-check-label" for="checkAnim">Check All Info</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-5">
                    <label for="inputType"> famille animal</label>
                    <select id="classeAConsult" name="familleA" class="form-control">
                    <?php foreach ($result as $value) {
                        echo '<option value="'.$value["familleA"].'">'.$value["familleA"].'</option>';
                    } ?>
                    </select>
                </div>

                <div class="row">
                  <div class="form-group col-md-5 margin-right">
                    <label for="inputEmail4"> Date Arrivée >= </label>
                    <input id="dateArrivee" name="dateArrivee" type="datetime-local"  min="1975-01-01T00:00">
                  </div>
                </div>
              </div>
            <button type="submit" class="btn btn-primary" id ="submitlsd">  Chercher <span class="glyphicon glyphicon-search"></span></button>           
         
          </form>
          
        </div>
      </div>

    </div>

    <div id="consult-care" class="container-fluid text-center consult-care-scroll-x" style="min-height: 200px; max-height: 500px; overflow-y: scroll; overflow-x: scroll;">

    <?php
    if (!empty($_POST) && isset($_POST)) {
      require_once('../php/index/connection.php');
      $r = new Connection();
      if ($r->link) {
        if(isset($_POST["dateArrivee"]))
        {
            $familleA = strip_tags(htmlspecialchars($_POST["familleA"]));
            $dateArrivee=strip_tags(htmlspecialchars($_POST['dateArrivee']));
            $dateArrivee = date("Y-m-d\TH:i:s", strtotime($dateArrivee));
     
            $req = 'SELECT * FROM animal WHERE animal."familleA"=? AND animal."dateArrivee">=? ';
            $statement = $r->link->prepare($req);
            $statement->bindParam(1,$familleA);
            $statement->bindParam(2,$dateArrivee);
            $statement->execute();
        }else{
              $req="SELECT * FROM animal";
              $statement = $r->link->prepare($req);
              $statement->execute();
          }

          if ($statement)
          {
            $result = $statement->fetchAll();
            //var_dump($result);
            echo '<table class="table">
              <thead>
                <tr>
                  <th scope="col">codeA</th>
                  <th scope="col">classeA</th>
                  <th scope="col">familleA</th>
                  <th scope="col">especeA</th>
                  <th scope="col">sexeA</th>
                  <th scope="col">Date d\'arrivée</th>
                  <th scope="col">vaccin</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>';
              foreach ($result as &$valueS) {
                echo ' <tr>
                <th scope="row">'.$valueS["codeA"].'</th>
                <td>'.$valueS["classeA"].'</td>
                <td>'.$valueS["familleA"].'</td>
                <td>'.$valueS["especeA"].'</td>
                <td>'.$valueS["sexeA"].'</td>
                <td>'.$valueS["dateArrivee"].'</td>
                <td>'.$valueS["vaccin"].'</td>
                <td>
                <form action="http://localhost:8000/php/requete/animal/animal_delete.php" method="post">
                <input  name="codeA" type="hidden" value="'.$valueS["codeA"].'">
                <button type="submit" class="btn btn-danger">  Suprimer <span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
              </tr>';
          }
          echo "</tbody> </table>";
        }
      }
    }
    ?>

    </div>
    <br/>

    <div class="navbar-fixed-bottom">
      <footer class="container-fluid text-center" style="background-color:#333; color: #9d9d9d;">
        <div class="text-center p-3" >
          © 2021 Copyright: Adrien Lamé, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>

  </body>
  <script src="../js/connexion/is_logged.js"></script>
  <script type="module" src="../js/animal/animal_consult.js"></script>

</html>
<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>