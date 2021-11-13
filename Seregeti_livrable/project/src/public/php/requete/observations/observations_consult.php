<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if ($r->link) {
        if(isset($_GET["dateIntervention1"]))
        {
            $req = $_GET["typeRessencementConsult"] == "Animal" ? 
            'SELECT * from "ressencement_A" WHERE "date" BETWEEN ? AND ?' 
            : 'SELECT * from "ressencement_V" WHERE "date" BETWEEN ? AND ?';

            $statement = $r->link->prepare($req);
            $statement->bindParam(1,$_GET["dateIntervention1"]);
            $statement->bindParam(2,$_GET["dateIntervention2"]);
            $statement->execute();
        }
        else
        {
            $req = $_GET["typeRessencementConsult"] == "Animal" ? 
            'SELECT * from "ressencement_A"' 
            : 'SELECT * from "ressencement_V"';
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