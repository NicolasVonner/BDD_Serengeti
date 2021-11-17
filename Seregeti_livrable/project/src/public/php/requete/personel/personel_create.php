<?php

    require_once('../../index/connection.php');
    
    $r=new Connection();
    $conn = $r->link;
   
    
    
	$nom=strip_tags(htmlspecialchars($_POST['nom']));
    $prenom=strip_tags(htmlspecialchars($_POST['prenom']));
    $age=strip_tags(htmlspecialchars($_POST['age']));
    $sexe=strip_tags(htmlspecialchars($_POST['sexeP']));
   
    $typeP=strip_tags(htmlspecialchars($_POST['typeP']));
    $dateArrivee=strip_tags(htmlspecialchars($_POST['dateArrivee']));
    $typeC=strip_tags(htmlspecialchars($_POST['typeC'])); 
    $dateArrivee = date("Y-m-d\TH:i:s", strtotime($dateArrivee));
    $salaire=strip_tags(htmlspecialchars($_POST['salaire']));


    $req='INSERT INTO personnel("nom", "prenom", "age", "sexeP","typeContrat","salaire","dateArrivee") values(?,?,?,?,?,?,?)';  
    $statement = $conn->prepare($req);
    $statement->bindParam(1,$nom,PDO::PARAM_STR);
    $statement->bindParam(2,$prenom,PDO::PARAM_STR);
    $statement->bindParam(3,$age,PDO::PARAM_INT);
    $statement->bindParam(4,$sexe,PDO::PARAM_STR);
    $statement->bindParam(5,$typeC,PDO::PARAM_STR);
    $statement->bindParam(6,$salaire,PDO::PARAM_INT);
    $statement->bindParam(7,$dateArrivee);
    $statement->execute();
    
    $id=$conn->lastInsertId();
    if($typeP=="soignant"){
        $specialiteS=strip_tags(htmlspecialchars($_POST['specialite']));
        $req='INSERT INTO SOIGNANT ("refS", "specialite") VALUES (?,?)';
        $statement = $conn->prepare($req);
        $statement->bindParam(1,$id, PDO::PARAM_INT);
        $statement->bindParam(2,$specialiteS,PDO::PARAM_STR);
        
        $statement->execute();
    }
    elseif($typeP=="garde"){
        $equipe=strip_tags(htmlspecialchars($_POST['equipe']));
        $req='INSERT INTO GARDE ("codeP", "codeE") VALUES (?, ?)';
        $statement = $conn->prepare($req);
        $statement->bindParam(1,$id, PDO::PARAM_INT);
        $statement->bindParam(2,$equipe);
        $t=$statement->execute();
        
    }
    



    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/login.php");
    </script>';  
?>
