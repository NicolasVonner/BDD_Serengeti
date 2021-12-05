<?php
require_once('../php/index/connection.php');
$r=new Connection();
$conn = $r->link;
$reqESA='SELECT DISTINCT "codeA" from "soin" ORDER BY "codeA"';
$reqESS='SELECT DISTINCT "refS" from "soignant" ORDER BY "refS"';
$reqESS2='SELECT DISTINCT "refS" from "soin" ORDER BY "refS"';
$reqESALL='SELECT DISTINCT "codeA" from animal ORDER BY "codeA"';

$statementESA = $conn->prepare($reqESA);
$statementESA->execute();

$statementESS = $conn->prepare($reqESS);
$statementESS->execute();

$statementESS2 = $conn->prepare($reqESS2);
$statementESS2->execute();

$statementESALL = $conn->prepare($reqESALL);
$statementESALL->execute();

$resultESA=$statementESA->fetchall();

$resultESS=$statementESS->fetchall();

$resultESS2=$statementESS2->fetchall();

$resultESALL=$statementESALL->fetchall();

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Serengeti_Cares</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cares.css?v=1.0" type="text/css">
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
            <li><a href="../index.php">Acceuil</a></li>
            <li class="active"><a href="cares.php">Soins animal</a></li>
            <li><a href="interventions.php">Interventions</a></li>
            <li><a href="observations.php">Observations</a></li>
            <li><a href="vaccins.php">Vaccins</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span>S'identifier</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="col-md-5">
        <!-- ZONE D'AJOUT DE SOIN -->
        <div>
          <h4><small>ZONE DE DECLARATION DE SOIN</small></h4>
          <h2>Déclarer un soin</h2>
        </div>

        <div>
          <form id="report">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="inputEmail4">Référence soignant</label>
                <select class="form-control" name="referralCaregiver" id="referralCaregiver">
                      <?php
                      
                      foreach ($resultESS as $value) {
                        
                          echo '<option value="'.$value["refS"].'">'.$value["refS"].'</option>';
                      }
                      ?>
                 </select>
              </div>

              <div class="form-group col-md-5">
                <label for="inputPassword4">Référence animal</label>
                    <select class="form-control" name="referralAnimal" id="referralAnimal">
                      <?php
                      
                      foreach ($resultESALL as $value) {
                        
                          echo '<option value="'.$value["codeA"].'">'.$value["codeA"].'</option>';
                      }
                      ?>
                    </select>
              </div>
  
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputType">Type de soin</label>
                <select id="typeCareReport" name="typeCareReport" class="form-control">
                  <option selected>Blessure_naturelle</option>
                  <option>Blessure_braconier</option>
                  <option>Soin_recurent</option>
                </select>
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
                <label for="inputEmail4">Date</label>
                <input id="dateCaregiver" name="dateCaregiver" type="datetime-local" value="2018-06-12T19:30">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-12">
                <h4>Commentaire:</h4>
                <textarea class="form-control" name="commentaire" rows="3" required></textarea>
              </div>
            </div>
            
          </form> 
          <button class="btn btn-primary" onclick="envoyerFormulaireReport();">Envoyer</button>
          <div id="report-care">

          </div>
        </div>   
      </div>

      <div class="col-md-5" style="float: right;">
        <!-- ZONE CONSULTATTION DE SOIN -->
        <div>
          <h4 id="ConsultCare"><small>ZONE DE CONSULATION DE SOIN</small></h4>
          <hr>
          <h2>Consulter un soin</h2>
        </div>

        <div>
          <form id="consult">
            <div class="row">
              <div class="form-group col-md-5">
                <input class="form-check-input" type="checkbox" name="checkAllInfo" id="checkCare">
                <label class="form-check-label" for="checkCare">Toutes les infos</label>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputEmail4">Référence soignant</label>
                <select class="form-control" name="referralCaregiver" id="referralCaregiver">
                      <?php
                      
                      foreach ($resultESS2 as $value) {
                        
                          echo '<option value="'.$value["refS"].'">'.$value["refS"].'</option>';
                      }
                      ?>
                 </select>
              </div>

              <div class="form-group col-md-5">
                <label for="inputPassword4">Référence animal</label>
                <select class="form-control" name="referralAnimal" id="referralAnimal">
                      <?php
                      
                      foreach ($resultESA as $value) {
                        
                          echo '<option value="'.$value["codeA"].'">'.$value["codeA"].'</option>';
                      }
                      ?>
                    </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputType">Type de soin</label>
                <select id="typeCareConsult" name="typeCareConsult" class="form-control">
                  <option selected>Blessure_naturelle</option>
                  <option>Blessure_braconier</option>
                  <option>Soin_recurent</option>
                </select>       
              </div>

              <div class="form-group col-md-5">  
                <label for="inputType">Zone</label>
                <select id="typeZoneConsult" name="typeZoneConsult" class="form-control">
                  <option selected>A</option>
                  <option>B</option>
                  <option>C</option>
                </select>
              </div> 
            </div>
          </form>
          <button class="btn btn-primary" onclick="envoyerFormulaireConsult();">Chercher</button>
        </div>
      </div>

    </div>
    <div id="consult-care" class="container-fluid text-center consult-care-scroll-x">

    </div>

    <div class="navbar-fixed-bottom">
      <footer class="container-fluid text-center">
        <div class="text-center p-3" >
          © 2021 Copyright: Adrien Lamé, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>
    
  </body>
  <script type="module" src="../js/soins/soins_report.js"></script>
  <script type="module" src="../js/soins/soins_consult.js"></script>
  <script src="../js/connexion/is_logged.js"></script>
</html>

<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>