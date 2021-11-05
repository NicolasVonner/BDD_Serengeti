<?php
    libxml_use_internal_errors(true);

    if(isset($_POST["referralCaregiver"])) // si chaque valeur des arguments en get ne sont pas vides alors
    {
        $host = '172.19.0.2';
        $dbname = 'postgres';
        $username = 'postgres';
        $password = 'flute';

        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
        
        try {
        $conn = new PDO($dsn);
        
            if ($conn) {

                $date = date("Y-m-d\TH:i:s", strtotime($_POST["dateCaregiver"]));

                $req= 'INSERT INTO soin ("dateS","refS","codeA","typeS","nomZone","commentaireS") VALUES(?,?,?,?,?,?)';
                $statement = $conn->prepare($req);
                $statement->bindParam(1,$date);
                $statement->bindParam(2,$_POST["referralCaregiver"]);
                $statement->bindParam(3,$_POST["referralAnimal"]);
                $statement->bindParam(4,$_POST["typeCareReport"]);
                $statement->bindParam(5,$_POST["zoneTypeReport"]);
                $statement->bindParam(6,$_POST["commentaire"]);
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