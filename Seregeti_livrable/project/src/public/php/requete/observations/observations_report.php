<?php
    libxml_use_internal_errors(true);

    if(isset($_POST["typeRessencementReport"])) // si chaque valeur des arguments en get ne sont pas vides alors
    {
        $host = '172.19.0.2';
        $dbname = 'postgres';
        $username = 'postgres';
        $password = 'flute';

        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
        
        try {
        $conn = new PDO($dsn);
        
            if ($conn) {

                $date = date("Y-m-d\TH:i:s", strtotime($_POST["dateRessencement"]));

                $req = ($_POST["typeRessencementReport"] == "Animal") ? 
                'INSERT INTO "ressencement_A" ("animal", "zone", "nombre", "date") VALUES (?, ?, ?, ?)'
                : 'INSERT INTO "ressencement_V" ("vegetal", "zone", "nombre", "date") VALUES (?, ?, ?, ?)';

                $statement = $conn->prepare($req);
                $statement->bindParam(1,$_POST["referral"]);
                $statement->bindParam(2,$_POST["zoneTypeReport"]);
                $statement->bindParam(3,$_POST["number"]);
                $statement->bindParam(4,$date);
                $statement->execute();

                if ($statement)
                {
                    echo "Le rapport a été envoyé à la BDD";
                }
                else
                {
                    echo "Erreur lors de l'envoie à la BDD";
                }
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    else
    {
        echo "<p>Erreur: impossible de se connection à la BDD</p>";
    }
?>