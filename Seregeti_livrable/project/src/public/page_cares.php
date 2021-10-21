<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Serengeti_Cares</title>
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
      /* Add a gray background color and some padding to the footer
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>*/
      footer {
        background-color: #f2f2f2;
        padding: 25px;
      }

    </style>
  </head>
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<style>
html,body {font-family:"Verdana",sans-serif}
h1,h2,h3,h4,h5,h6 {font-family:"Segoe UI",sans-serif}
</style>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.php"> <img src="./logo-v2/logo_gimp.png" alt="Image"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li  class="active"><a href="page_cares.php">Animal cares</a></li>
          <li><a href="page_interventions.php">Group interventions</a></li>
          <li><a href="page_observations.php">Observations</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <form>
    <div class="container-fluid">
      <div class="row content">

        <div class="col-sm-3 sidenav">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#section1">Report cares</a></li>
            <li><a href="#ConsultCare">Consult cares</a></li>
          </ul><br>
        </div>

        <div class="col-sm-5">
          <h4><small>REPORT CARE ZONE</small></h4>
          <hr>
          <h2>Report a care</h2>
          <br>
          <h5><span class="label label-danger">Date</span> <span class="label label-primary">Type</span></h5><br>
          <!-- ZONE D'AJOUT DE SOIN -->
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Caregiver referral</label>
                <input type="referralS" class="form-control" id="inputReferralS" placeholder="Caregiver referral">
              </div>

              <div class="form-group col-md-4">
                <label for="inputType">Care type</label>
                <select id="inputType" class="form-control">
                  <option selected>Recurring care</option>
                  <option>Natural injury</option>
                  <option>Poacher woundy</option>
                 <!--   <-?php 

                      #$obj = new MyClass();
                      #$row = $obj->getData("select city_name from city"); 
                   ?> 
                 
                 <-?php  foreach($row as $row){ ?>
                    <option><?php echo $row['city_name'] ?></option>
            
                  <-?php  } ?> -->
                </select>
              
              </div>

              <div class="form-group col-md-6">
                <label for="inputPassword4">Animal referral</label>
                <input type="referralA" class="form-control" id="inputreferralA" placeholder="Animal referral">
              </div>

              <div class="form-group col-md-4">
                <label for="inputType">Zone</label>
                <select id="inputType" class="form-control">
                  <option selected>A</option>
                  <option>B</option>
                  <option>C</option>
                 <!-- <?php foreach($row as $row){ ?>
                    <option><?php echo $row['city_name'] ?></option>
            
               <?php  } ?> -->
                </select>
              </div> 
              
              <div class="form-group col-md-10">
                <h4>Leave a Comment:</h4>
                <textarea class="form-control" rows="3" required></textarea>
                <br><br>
                <button type="submit" class="btn btn-primary">Valider</button>
              </div>

            </div> 
          </form>
          <br><br>
          <br><br>

          <form>
            <!-- ZONE CONSULTATTION DE SOIN -->
            <div class="form-group col-md-12">
              <h4 id="ConsultCare"><small>CARE REGISTER ZONE</small></h4>
              <hr>
              <h2>Consult a care</h2>
              <h5><span class="label label-success">Lorem</span></h5><br>
            </div>
            
            <div class="form-group col-md-4">  
              <select id="inputTypeZone" class="form-control">
                <option selected>A</option>
                <option>B</option>
                <option>C</option>
               <!-- <?php foreach($row as $row){ ?>
                  <option><?php echo $row['city_name'] ?></option>
          
             <?php  } ?> -->
              </select>
            </div> 
            <div class="form-group col-md-4">
              <label for="inputType">Care type</label>
              <select id="inputType" class="form-control">
                <option selected>Recurring care</option>
                <option>Natural injury</option>
                <option>Poacher woundy</option>
               <!--  <?php 

                    $obj = new MyClass();
                    $row = $obj->getData("select city_name from city"); 
                ?> 
               
                <?php foreach($row as $row){ ?>
                  <option><?php echo $row['city_name'] ?></option>
          
             <?php  } ?> -->
              </select>         
            </div>
    
            <form role="form">
              <div class="form-group">
                <textarea class="form-control" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </form>

          <br><br>      
        </div>
      </div>
    </div>    
  </form> 
    <footer class="container-fluid">
      <p>Footer Text</p>
    </footer>
</body>
</html>