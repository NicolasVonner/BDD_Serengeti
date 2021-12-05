<?php
require_once('../php/index/connection.php');
$r=new Connection();
$conn = $r->link;

$reqESALL='SELECT "codeA" from "animal" ORDER BY "codeA" ASC';

$reqESVLL='SELECT "codeV" from "vegetal" ORDER BY "codeV" ASC';

$statementESALL = $conn->prepare($reqESALL);
$statementESALL->execute();

$statementESVLL = $conn->prepare($reqESVLL);
$statementESVLL->execute();

$resultESALL=$statementESALL->fetchall();
$resultESVLL=$statementESVLL->fetchall();

session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Serengeti_Observations</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/observations.css?v=1.0" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <script>
    /*  function getval(typeRessencementReport)
      {
        //Faire en sorte qu'un seul s'affiche
        if(typeRessencementReport.value == 'Animal'){
          console.log("AAAAAAAAAAAAAAAAA")
        document.getElementById("referralV").style.display = "none"; 
        document.getElementById("referral").style.display = "inline"; 
        }
        else if (typeRessencementReport.value == 'Végétal'){
         document.getElementById("referral").style.display = "none"; 
        document.getElementById("referralV").style.display = "inline"; 
        }       
      }*/
    
    </script>
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
            <li><a href="../index.php">Acceuil</a></li>
            <li><a href="cares.php">Soins animal</a></li>
            <li><a href="interventions.php">Interventions</a></li>
            <li class="active"><a href="observations.php">Observations</a></li>
            <li><a href="vaccins.php">Vaccins</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> S'identifier</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="col-md-5">
        <!-- ZONE D'AJOUT DE RESSENCEMENT -->
        <div>
          <h4><small>ZONE DE D'AJOUT DE RESSENCEMENT</small></h4>
          <h2 id="title-report-espece">Ressencer un nouvelle Animal</h2>
        </div>

        <div>
          <form id="report">

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputType"> Type </label>
                <select id="typeRessencementReport" name="typeRessencementReport" class="form-control" onchange="getval(this);">
                  <option selected>Animal</option>
                  <option>Végétal</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputEmail4">Référence</label>
                <select class="form-control" name="referral" id="referral">
                      <?php
                      
                      foreach ($resultESALL as $value) {
                        
                          echo '<option value="'.$value["codeA"].'">'.$value["codeA"].'</option>';
                      }
                      ?>
                  </select>
                  <!-- <select class="form-control" name="referral" id="referralV">
                    <?php
                      
                      /*foreach ($resultESVLL as $value) {
                        
                          echo '<option value="'.$value["codeV"].'">'.$value["codeV"].'</option>';
                      }*/
                      ?> 
                  </select> -->
              </div>

              <div class="form-group col-md-5">
                <label for="inputType">Zone</label>
                <select id="zoneTypeReport" name="zoneTypeReport" class="form-control">
                  <option selected>A</option>
                  <option>B</option>
                  <option>C</option>
                </select>
              </div>
  
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputEmail4">Date de l'observation</label>
                <input id="dateRessencement" name="dateRessencement" type="datetime-local" value="2021-06-12T19:30">
              </div>

            </div>
            
          </form> 
          <button class="btn btn-primary" onclick="envoyerFormulaireReport();">Envoyer</button>
          <div id="report-ressencement">

          </div>
        </div>   
      </div>

      <div class="col-md-5" style="float: right;">
        <!-- ZONE CONSULTATTION DE RESSENCEMENT -->
        <div>
          <h4><small>ZONE DE CONSULTATION DE RESSENCEMENT</small></h4>
          <hr>
          <h2 id="title-consult-espece">Consulter un Animal</h2>
        </div>

        <div>
          <form id="consult">

            <div class="row">
              <div class="form-group col-md-5">
                <input class="form-check-input" type="checkbox" name="checkAllInfo" id="checkObservation">
                <label class="form-check-label" for="checkObservation">Toutes les infos</label>
              </div>

              <div class="form-group col-md-5">
                <label for="inputType"> Type </label>
                <select id="typeRessencementConsult" name="typeRessencementConsult" class="form-control">
                  <option selected>Animal</option>
                  <option>Végétal</option>
                </select>
              </div>

            </div>
            <div class="row">
                <p style="margin-left: 10px ; font-weight: bold;"> Date :</p>
                <div class="form-group col-md-5 margin-right">
                  <label for="inputEmail4"> Du</label>
                  <input id="dateIntervention1" name="dateIntervention1" type="datetime-local" value="">
                </div>
            
                <div class="form-group col-md-5">
                  <label for="inputEmail4">Au </label>
                  <input id="dateIntervention2" name="dateIntervention2" type="datetime-local" value="">
                </div>
            </div>
          </form>
          <button class="btn btn-primary" onclick="envoyerFormulaireConsult();">Chercher</button>
        </div>
      </div>

    </div>
    <div id="consult-ressencement" class="container-fluid text-center consult-care-scroll-x">

    </div>

    <div class="navbar-fixed-bottom">
      <footer class="container-fluid text-center">
        <div class="text-center p-3" >
          © 2021 Copyright: Adrien Lamé, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>

  </body>
  <script type="module" src="../js/observations/observations_report.js"></script>
  <script type="module" src="../js/observations/observations_consult.js"></script>
  <script src="../js/connexion/is_logged.js"></script>
</html>
<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>