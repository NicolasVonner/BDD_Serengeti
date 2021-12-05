<?php
  require_once('./php/index/connection.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Parc national de Serengeti</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="./js/libs/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php"> <img src="./images/logo-v2/logo_gimp.png" alt="Image"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="./pages/cares.php">Animal cares</a></li>
            <li><a href="./pages/interventions.php">Group interventions</a></li>
            <li><a href="./pages/observations.php">Observations</a></li>
            <li><a href="./pages/vaccins.php">Vaccins</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="./pages/connexion.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="./images/index/IMG_00611.jpg " alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>06/07/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_00622.jpg" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>20/08/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_00600.jpg" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>18/07/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5479.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>10/04/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5480.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>01/05/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5478.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>05/03/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5477.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>11/09/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5476.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>07/12/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5475.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>25/12/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5474.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>19/04/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5473.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>01/01/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5472.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>18/07/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5471.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>08/03/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5470.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>03/10/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5469.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>02/02/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5468.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>17/09/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5467.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone B</h3>
            <p>15/06/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5466.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>06/07/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5465.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone C</h3>
            <p>18/08/2021</p>
          </div>      
        </div>

        <div class="item">
          <img src="./images/index/IMG_5464.JPG" alt="Image">
          <div class="carousel-caption">
            <h3>Zone A</h3>
            <p>02/07/2021</p>
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      
    <div class="container text-center">    
      <h3>Serregenti en quelque chiffres : </h3><br>
    </div><br>

    <div class="container-svg">
      <style>
          svg {
            margin-left:10px;
            margin-right:auto;
            margin-top: auto;
            margin-bottom: auto;
          }
          .container-svg{
            margin: auto;
            width: 50%;
            padding: 10px;
          }
        </style>

    <?php
      require_once('./php/index/connection.php');
      $r=new Connection();
      $conn = $r->link;
      //$req='SELECT COUNT(*) FROM "personnel"';
      $req='select * from home_stats() as (count_a int, count_p int, count_s int, count_v int)';
      $statement = $conn->prepare($req);
      $statement->execute();
      $test_req=$statement->fetchall();

      echo '<svg height="150" width="150" viewBox="0 0 20 20">
 
    
      
    <circle r="5" cx="10" cy="10" fill="transparent"
          stroke="#935116"
          stroke-width="10"
       
          stroke-dasharray="calc(100 * 31.5 / 100) 31.5"
          transform="rotate(-90) translate(-20)" />
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="6" alignment-baseline="central" text-anchor="middle" font-size="3">Employés</text>
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="11" alignment-baseline="central" text-anchor="middle" font-size="4">'.strval($test_req[0]["count_p"]).'</text>    

      </svg>';
       
      echo '<svg height="150" width="150" viewBox="0 0 20 20">
      <style type="text/css">
    .st4{font-family:Montserrat", Arial, sans-serif; fill:white;} 
    </style>
      
        
      <circle r="5" cx="10" cy="10" fill="transparent"
            stroke="#880808"
            stroke-width="10"
         
            stroke-dasharray="calc(100 * 31.5 / 100) 31.5"
            transform="rotate(-90) translate(-20)" />
            <text class="st4" font-family="Montserrat" fill="white" x="10" y="6" alignment-baseline="central" text-anchor="middle" font-size="3">Blessure </text>   
            <text class="st4" font-family="Montserrat" fill="white" x="10" y="9" alignment-baseline="central" text-anchor="middle" font-size="2.5">de braconnier</text>  
            <text class="st4" font-family="Montserrat" fill="white" x="10" y="13" alignment-baseline="central" text-anchor="middle" font-size="4">'.strval($test_req[0]["count_s"]).'</text>    
            </svg>';



      echo '<svg height="150" width="150" viewBox="0 0 20 20">
  
      
    <circle r="5" cx="10" cy="10" fill="transparent"
          stroke="#f5b041"
          stroke-width="10"
       
          stroke-dasharray="calc(100 * 31.5 / 100) 31.5"
          transform="rotate(-90) translate(-20)" />
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="6" alignment-baseline="central" text-anchor="middle" font-size="3">Animaux</text>
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="11" alignment-baseline="central" text-anchor="middle" font-size="4">'.strval($test_req[0]["count_a"]).'</text>    
      </svg>';
      echo '<svg height="150" width="150" viewBox="0 0 20 20">      
    <circle r="5" cx="10" cy="10" fill="transparent"
          stroke="#3A9D23"
          stroke-width="10"
       
          stroke-dasharray="calc(100 * 31.5 / 100) 31.5"
          transform="rotate(-90) translate(-20)" />
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="6" alignment-baseline="central" text-anchor="middle" font-size="3">Végétaux</text>
          <text class="st4" font-family="Montserrat" fill="white" x="10" y="11" alignment-baseline="central" text-anchor="middle" font-size="4">'.strval($test_req[0]["count_v"]).'</text>    
      </svg>';

      $req='SELECT "intervention"."nomZone", COUNT(*) FROM "intervention" GROUP BY INTERVENTION."nomZone" ORDER  BY COUNT(*) DESC';

      $statement = $conn->prepare($req);
      $statement->execute();
      $test_req2=$statement->fetchall();
     
      echo '</svg>'; 
  
    echo'<br /> 
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Zones</th>
      <th scope="col">Nombre d\'interventions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">'.$test_req2[0]["nomZone"].'</th>
      <td>'.$test_req2[0]["count"].'</td>
    </tr>
    <tr>
    <th scope="row">'.$test_req2[1]["nomZone"].'</th>
    <td>'.$test_req2[1]["count"].'</td>
    </tr>
    <tr>
    <tr>
    <th scope="row">'.$test_req2[2]["nomZone"].'</th>
    <td>'.$test_req2[2]["count"].'</td>
    </tr>
  </tbody>
</table> <br />';
?>
  </div>
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
  <script src="./js/connexion/is_logged.js"></script>
</html>
<?php
  $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
  $connexionPath = "./pages/";
  echo "<script>setLoginTag($userId,'$connexionPath')</script>";
?>