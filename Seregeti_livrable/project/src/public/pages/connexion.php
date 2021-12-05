<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Parc national de Serengeti</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/connexion.css?v=1.0" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <?php
    error_reporting(0);
    if(isset($_GET)){
      if($_GET["error"]==1){
        echo'<div class="alert alert-danger" role="alert"> identifiant ou mots de passe incorrect!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> </div> ';
        //https://codepen.io/donyo0682/pen/QoQzzw
      }
      elseif($_GET["error"]==2) {
        echo'<div class="alert alert-danger" role="alert"> identifiant incorrect car trop long!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> </div> ';
      }
    }
  ?>
  <body>
    <div class="container-login">
      <div class="col-md-5 login">
        <h2 class="text-center">Identifiez vous</h2>
        <form action="http://localhost:8000/php/requete/user_space/mdp.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Identifiant</label>
            <input name="login" type="number" class="form-control" id="login" aria-describedby="LoginlHelp" placeholder="Identifiant" maxlength="16">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input name="mdp" type="password" class="form-control" id="mdp1" placeholder="Mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
    </div>
  </body>
</html>