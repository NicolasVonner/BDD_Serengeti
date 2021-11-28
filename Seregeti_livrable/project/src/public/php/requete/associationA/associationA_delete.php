<?php
    require_once('../../index/connection.php');
    $r=new Connection();
    $pdo = $r->link;
    $id=$_POST['especeA'];
    $req='DELETE FROM "associationA" WHERE "especeA" = ?';
    $statement=$pdo->prepare($req);
    $statement->bindParam(1,$id,PDO::PARAM_STR);
    $t=$statement->execute();
    var_dump($t);
    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/associationA.php");
    </script>';  
?>