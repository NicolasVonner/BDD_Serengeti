<?php
if(strlen($_POST['login']>16)){
    echo '<script language="Javascript"> document.location.replace("http://localhost:8000/pages/connexion.php?error=2");</script>';
}
else{


    session_start();
    require_once('../../index/connection.php');
    
    $r=new Connection();
    $conn = $r->link;
    
	usleep(200000); //delais de 0,2 second pour éviter les brute force.
    
    
	$login=htmlspecialchars($_POST['login']); //fonction htmlspecialchars affiche les chatère de formatage html tell qu'elle afin d'éviter la faille xss aussi appeler injection de code.
    $login=strip_tags($login);
    $mdp=htmlspecialchars($_POST['mdp']); 
    $mdp=strip_tags($mdp);
    

    //déclaration des constante
    define('PREFIX_SALT', "7777");
    define('SUFFIX_SALT', "Anticonstitutionnellement");
    $hashSecure=hash('sha512', PREFIX_SALT.$mdp.SUFFIX_SALT);
    $hashSecure=strval($hashSecure);
    


    $req='SELECT "identifiant", "mdp" from "utilisateur" WHERE identifiant=? and mdp=?';  
    $statement = $conn->prepare($req);
    $statement->bindParam(1,$login,PDO::PARAM_INT);
    $statement->bindParam(2,$hashSecure,PDO::PARAM_STR);  
    $statement->execute();
    $test_req=$statement->fetchAll();
    $statement->execute();
    if (count($test_req)>0){ //si la requête n'est pas vide
        $resultat=$statement->fetchAll(); //covertie l'objet en tableau
        $_SESSION['user_id']=$resultat[0]["identifiant"];
        $req='SELECT "prenom" from personnel WHERE "codeP"=?';  
        $statement = $conn->prepare($req);
        $statement->bindParam(1, $_SESSION["utilisateur"],PDO::PARAM_INT);
        $resultat=$statement->fetchAll();
        $_SESSION["utilisateur"] = $resultat[0]["prenom"];
        $jeton = hash("sha256", uniqid(mt_rand(), true));
        $_SESSION['jeton'] = $jeton;
        $time = new DateTime;
        $time->modify('+2 seconds');
        $_SESSION['jeton_valid'] = $time;
        
        echo '<script language="Javascript">
        document.location.replace("http://localhost:8000/pages/login.php");
        </script>'; 
        //header('Location: ../../pages/login.php'); //conection réussi on redirige vers l'espace responsable 
    } 
    else {
        echo '<script language="Javascript">
        document.location.replace("http://localhost:8000/pages/connexion.php?error=1");
        </script>'; 
        //header('Location: ../../pages/connexion.php?error=1'); //on renvoi vers la page de connection avec l'erreur en paramètre d'url afin d'uttiliser la méthode get pour afficher l'erreur
    }
    
    

}   
?>
