<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if ($r->link) {
        if(isset($_GET["typeZoneConsult"]))
        {
            $req = 'SELECT DISTINCT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite", personnel."nom" FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS" WHERE soin."codeA"=? AND soin."refS"=? AND soin."typeS"=? AND soin."nomZone"=? and soignant."refS"=personnel."codeP"';
            $statement = $r->link->prepare($req);
            $statement->bindParam(1,$_GET["referralAnimal"]);
            $statement->bindParam(2,$_GET["referralCaregiver"]);
            $statement->bindParam(3,$_GET["typeCareConsult"]);
            $statement->bindParam(4,$_GET["typeZoneConsult"]);
            $statement->execute();
        }
        else
        {
            $req = 'SELECT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite", personnel."nom" FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS", personnel WHERE soignant."refS"=personnel."codeP"';
            $statement = $r->link->prepare($req);
            $statement->execute();
        }

        if ($statement)
        {
            $result = $statement->fetchAll(PDO::FETCH_CLASS);
            echo json_encode($result);
        }
        else
        {
            echo "Erreur lors de l'envoie à la BDD";
        }
    }
    else
    {
        echo "Erreur lors de la connection à la BDD";
    }
?>