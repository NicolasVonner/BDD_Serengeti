<?php
    require_once('../../index/connection.php');
    $r=new Connection();
    $pdo = $r->link;
    var_dump($_POST);
    $id=$_POST['codeA'];
    var_dump($id);
    $req='DELETE FROM animal WHERE "codeA" = ?';
    $statement=$pdo->prepare($req);
    $statement->bindParam(1,$id,PDO::PARAM_INT);
    $t=$statement->execute();
    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/animal.php");
    </script>'; 
?>