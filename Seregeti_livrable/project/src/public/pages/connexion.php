<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Parc national de Serengeti</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <form action="http://localhost:8000/php/requete/user_space/mdp.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">login</label>
    <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter login">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="mdp" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">connexion</button>
</form>
  </body>

</html>