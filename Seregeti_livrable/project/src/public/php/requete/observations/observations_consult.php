<?php
    libxml_use_internal_errors(true);

    if(isset($_GET["typeRessencementConsult"])) // si une valeur en particulier est prête alors
    {
        $host = '172.19.0.2';
        $dbname = 'postgres';
        $username = 'postgres';
        $password = 'flute';
        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
        
        try {
        $conn = new PDO($dsn);
            if ($conn) {

                $req = $_GET["typeRessencementConsult"] == "Animal" ? 
                'SELECT * from "ressencement_A" WHERE "date" BETWEEN ? AND ?' 
                : 'SELECT * from "ressencement_V" WHERE "date" BETWEEN ? AND ?';

                $statement = $conn->prepare($req);
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
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    else
    {
        echo "<p>Error cannot send the report to the DataBase</p>";
    }
?>