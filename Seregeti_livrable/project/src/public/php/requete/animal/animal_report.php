<?php

    require_once('../../index/connection.php');
    
    $r=new Connection();
    $conn = $r->link;
   
    
	$classeA=strip_tags(htmlspecialchars($_POST['classeA']));
    $familleA=strip_tags(htmlspecialchars($_POST['familleA']));
    $especeA=strip_tags(htmlspecialchars($_POST['especeA']));
    $sexeA=strip_tags(htmlspecialchars($_POST['sexeA']));
    $dateArrivee=strip_tags(htmlspecialchars($_POST['dateArrivee']));
    $dateArrivee = date("Y-m-d\TH:i:s", strtotime($dateArrivee));

    $req='INSERT INTO ANIMAL("classeA", "familleA","especeA", "sexeA", "dateArrivee") values (?, ?, ?,?,?)';  
    $statement = $conn->prepare($req);
    $statement->bindParam(1,$classeA,PDO::PARAM_STR);
    $statement->bindParam(2,$familleA,PDO::PARAM_STR);
    $statement->bindParam(3,$especeA,PDO::PARAM_STR);
    $statement->bindParam(4,$sexeA,PDO::PARAM_STR);
    $statement->bindParam(5,$dateArrivee,PDO::PARAM_STR);
    $statement->execute();
    
    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/animal.php");
    </script>';  
?>
