<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Parc national de Serengeti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-brand{
      padding-top: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
<?php
echo "Tentative de connection PDO";
    $host = '172.19.0.2';
    $dbname = 'postgres';
    $username = 'postgres';
    $password = 'flute';
 
  $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
   
  try{
     $conn = new PDO($dsn);
     
     if($conn){
      echo "Connecté à $dbname avec succès!";
     }
  }catch (PDOException $e){
     echo $e->getMessage();
     echo "Erreur de connection";
  }
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.html"> <img src="./logo-v2/logo_gimp.png" alt="Image"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="page_cares.php">Animal cares</a></li>
        <li><a href="page_interventions.html">Group interventions</a></li>
        <li><a href="page_observations.html">Observations</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="./images/IMG_00611.jpg " alt="Image">
        <div class="carousel-caption">
          <h3>Zone A</h3>
          <p>06/07/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_00622.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>20/08/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_00600.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>18/07/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5479.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>10/04/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5480.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone A</h3>
          <p>01/05/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5478.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone A</h3>
          <p>05/03/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5477.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>11/09/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5476.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>07/12/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5475.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>25/12/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5474.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>19/04/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5473.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone A</h3>
          <p>01/01/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5472.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>18/07/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5471.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>08/03/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5470.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone A</h3>
          <p>03/10/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5469.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>02/02/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5468.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>17/09/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5467.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone B</h3>
          <p>15/06/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5466.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>06/07/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5465.JPG" alt="Image">
        <div class="carousel-caption">
          <h3>Zone C</h3>
          <p>18/08/2021</p>
        </div>      
      </div>

      <div class="item">
        <img src="./images/IMG_5464.JPG" alt="Image">
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
  <h3>What We Do</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Current Project</p>
    </div>
    <div class="col-sm-4"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Project 2</p>    
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
