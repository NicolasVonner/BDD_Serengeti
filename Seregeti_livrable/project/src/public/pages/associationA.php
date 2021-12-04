<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>associationA</title>
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
            <li><a href="animal.php">Animal</a></li>
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="associationA.php">associationA</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1>Page  associationA</h1>

    <p> Ici nous ajoutons les nouvelles espece présente dans le parc</p>
    <div class="container-fluid">
      <div class="col-md-5">
        <!-- ZONE D'AJOUT DE RESSENCEMENT -->
        <div>
          <h4><small>ZONE DE D'AJOUT D'UN espèce dans le parc</small></h4>
          <h2 id="title-report-espece">Ressencer un nouvelle Animal</h2>
        </div>

        <div>
          <form id="report_new_animal" method="post" action="http://localhost:8000/php/requete/associationA/associationA_create.php">
 
              
        </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="especeA">espece Animal</label>
                    <input type="text" required
                  minlength="2" maxlength="255"class="form-control" name="especeA" id="especeA" value="Elephant d'Afrique">
                  </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-5">
                <label for="familleA">Famille animale</label>
                <input type="text" required
                  minlength="2" maxlength="255" class="form-control" name="familleA" id="familleA" value="Éléphantidés">

              </div>
            </div>
      

            <div class="row">
              <div class="form-group col-md-5">
                <label for="inputType">classe animale</label>
                <input type="text" required
                  minlength="2" maxlength="255"  id="classeA" name="classeA" class="form-control" value="Mammifère">
              </div>
            </div>
            <div class="row">        
              <div class="form-group col-md-5">
              </div>
            </div> 
         
              <button type="submit" class="btn btn-primary"> Envoyer <span class="glyphicon glyphicon-plus"></span></button>
        
            </div>   
      </div>

  

    </div>
 </form>
    <div id="consult-care" class="container-fluid text-center consult-care-scroll-x" style="min-height: 200px; max-height: 500px; overflow-y: scroll; overflow-x: scroll;">

    <?php
      require_once('../php/index/connection.php');
      $r = new Connection();
      if ($r->link) {
              $req='SELECT * FROM "associationA" ORDER BY "especeA"';
              $statement = $r->link->prepare($req);
              $statement->execute();
          

    
            $result = $statement->fetchAll();
            echo '<table class="table">
              <thead>
                <tr>
                  <th scope="col">especeA</th>
                  <th scope="col">classeA</th>
                  <th scope="col">familleA</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>';
              foreach ($result as &$valueS) {
                echo ' <tr>
                <th scope="row">'.$valueS["especeA"].'</th>
                <td>'.$valueS["classeA"].'</td>
                <td>'.$valueS["familleA"].'</td>
                <td>
                <form action="http://localhost:8000/php/requete/associationA/associationA_delete.php" method="post">
                <input  name="especeA" type="hidden" value="'.$valueS["especeA"].'">
                <button type="submit" class="btn btn-danger">  Suprimer <span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
              </tr>';
          }
          echo "</tbody> </table>";
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