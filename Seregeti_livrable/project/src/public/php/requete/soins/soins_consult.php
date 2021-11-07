<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if(isset($_GET["typeZoneConsult"])) // si une valeur en particulier est prête alors
    {

            if ($r->link) {
                $req = 'SELECT DISTINCT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite" FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS" WHERE soin."codeA"=? AND soin."refS"=? AND soin."typeS"=? AND soin."nomZone"=?';
                $statement = $r->link->prepare($req);
                $statement->bindParam(1,$_GET["referralAnimal"]);
                $statement->bindParam(2,$_GET["referralCaregiver"]);
                $statement->bindParam(3,$_GET["typeCareConsult"]);
                $statement->bindParam(4,$_GET["typeZoneConsult"]);
                $statement->execute();

                if ($statement)
                {
                    $result = $statement->fetchAll();
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
    }
    else
    {
        echo "<p>Error cannot send the report to the DataBase</p>";
    }
?>