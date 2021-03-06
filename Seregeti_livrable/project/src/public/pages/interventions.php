<?php
  require_once('../php/index/connection.php');
  $r=new Connection();
  $conn = $r->link;
  $reqESSE='SELECT DISTINCT "codeE" from equipe';

  $statementESSE = $conn->prepare($reqESSE);
  $statementESSE->execute();

  
  $resultESSE=$statementESSE->fetchall();
  
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Serengeti_Interventions</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/interventions.css?v=1.0" type="text/css">
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
            <li><a href="cares.php">Soins animal</a></li>
            <li class="active"><a href="interventions.php">Interventions</a></li>
            <li><a href="observations.php">Observations</a></li>
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
        <!-- ZONE D'AJOUT D'INTERVENTION -->
        <div>
          <h4><small>AJOUTER UNE INTERVENTION</small></h4>
          <h2>Reporter une intervention</h2>
        </div>

        <div>
          <form id="report">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="inputEmail4">Date Report</label>
                <input id="dateIntervention" name="dateIntervention" type="datetime-local" value="2018-06-12T19:30">
              </div>
  
            </div>

            <div class="row">

              <div class="form-group col-md-5">
                <label for="inputEmail4">Groupe code</label>
                <select class="form-control" name="codeGroup" id="codeGroup" placeholder="Code Group">
                      <?php
                      
                      foreach ($resultESSE as $value) {
                        
                          echo '<option value="'.$value["codeE"].'">'.$value["codeE"].'</option>';
                      }
                      ?>
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
              <div class="form-group col-md-12">
                <h4>Zone de commentaire:</h4>
                <textarea class="form-control" name="commentaire" rows="3" required></textarea>
              </div>
            </div>
          </form> 
          <button class="btn btn-primary" onclick="envoyerFormulaireReport();">Envoyer</button>
          <div id="report-intervention">

          </div>
        </div>   
      </div>

      <div class="col-md-5" style="float: right;">
        <!-- ZONE CONSULTATTION D'INTERVENTION -->
        <div>
          <h4 id="ConsultCare"><small>ZONE DE CONSULTATION D'INTERVENTIONS</small></h4>
          <hr>
          <h2>Consulter une intervention</h2>
        </div>

        <div>
          <form id="consult">
              <div class="row">
                <div class="form-group col-md-5">
                  <input class="form-check-input" type="checkbox" name="checkAllInfo" id="checkIntervention">
                  <label class="form-check-label" for="checkIntervention">Toutes les infos</label>
                </div>
              </div>

              <div class="row">
                <p style="margin-left: 10px ; font-weight: bold;"> Date :</p>
                <div class="form-group col-md-5">
                  <label for="inputEmail4">Du</label>
                  <input id="dateIntervention1" name="dateIntervention1" type="datetime-local" value="1975-06-12T19:30">
                </div>

                <div class="form-group col-md-5">
                  <label for="inputEmail4">au</label>
                  <input id="dateIntervention2" name="dateIntervention2" type="datetime-local" value="2022-06-12T19:30">
                </div>

              </div>
          </form>
          <button class="btn btn-primary" onclick="envoyerFormulaireConsult();">Chercher</button>
        </div>
      </div>

    </div>
    <div id="consult-intervention" class="container-fluid text-center consult-care-scroll-x">

    </div>

    <div class="navbar-fixed-bottom">
      <footer class="container-fluid text-center">
        <div class="text-center p-3" >
          ?? 2021 Copyright: Adrien Lam??, Nicolas Vonner, Mathias Rando
        </div>
      </footer>
    </div>

  </body>
  <script type="module" src="../js/interventions/interventions_report.js"></script>
  <script type="module" src="../js/interventions/interventions_consult.js"></script>
  <script src="../js/connexion/is_logged.js"></script>
</html>
<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  echo "<script>setLoginTag($userId)</script>";
?>