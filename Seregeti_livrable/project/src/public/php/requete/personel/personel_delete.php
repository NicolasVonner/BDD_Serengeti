<?php
    require_once('../../index/connection.php');
    $r=new Connection();
    $pdo = $r->link;

    $id=$_POST['codeP'];
    $typeP=strip_tags(htmlspecialchars($_POST['typeC'])); 
   
    if($typeP=="soignant"){
        $req='DELETE FROM soignant WHERE "refS" = ?';
    }
    elseif($typeP=="garde"){
        $req='DELETE FROM GARDE WHERE "codeP" = ?';
    }
    $statement=$pdo->prepare($req);
    $statement->bindParam(1,$id,PDO::PARAM_INT);
    $t=$statement->execute();
    $req='DELETE FROM personnel WHERE "codeP" = ?';
    $statement=$pdo->prepare($req);
    $statement->bindParam(1,$id,PDO::PARAM_INT);
    $statement->execute();

    echo '<script language="Javascript">
    document.location.replace("http://localhost:8000/pages/login.php");
    </script>'; 
?>