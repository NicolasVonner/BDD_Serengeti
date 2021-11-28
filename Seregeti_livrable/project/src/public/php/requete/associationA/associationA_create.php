<?php

    require_once('../../index/connection.php');
    
    $r=new Connection();
    $conn = $r->link;
   
    
	$classeA=strip_tags(htmlspecialchars($_POST['classeA']));
    $familleA=strip_tags(htmlspecialchars($_POST['familleA']));
    $especeA=strip_tags(htmlspecialchars($_POST['especeA']));

    $req='INSERT INTO "associationA" ("classeA", "familleA","especeA") values (?, ?, ?)';  
    $statement = $conn->prepare($req);
    $statement->bindParam(1,$classeA,PDO::PARAM_STR);
    $statement->bindParam(2,$familleA,PDO::PARAM_STR);
    $statement->bindParam(3,$especeA,PDO::PARAM_STR);
    $statement->execute();
    
    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/associationA.php");
    </script>';  
?>
