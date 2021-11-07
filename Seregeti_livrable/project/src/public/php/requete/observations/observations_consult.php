<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if(isset($_GET["typeRessencementConsult"])) // si une valeur en particulier est prête alors
    {
        
            if ($r->link) {

                $req = $_GET["typeRessencementConsult"] == "Animal" ? 
                'SELECT * from "ressencement_A" WHERE "date" BETWEEN ? AND ?' 
                : 'SELECT * from "ressencement_V" WHERE "date" BETWEEN ? AND ?';

                $statement = $r->link->prepare($req);
                $statement->bindParam(1,$_GET["dateIntervention1"]);
                $statement->bindParam(2,$_GET["dateIntervention2"]);
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