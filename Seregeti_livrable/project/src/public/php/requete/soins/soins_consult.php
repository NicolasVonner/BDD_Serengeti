<?php
    libxml_use_internal_errors(true);

    if(isset($_GET["typeZoneConsult"])) // si une valeur en particulier est prête alors
    {
        $host = '172.19.0.2';
        $dbname = 'postgres';
        $username = 'postgres';
        $password = 'flute';
        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
        
        try {
        $conn = new PDO($dsn);
            if ($conn) {
                $req = 'SELECT DISTINCT soin."dateS", soin."codeA", soin."typeS", soin."commentaireS", soin."nomZone", animal."especeA", soignant."specialite" FROM animal inner join soin on animal."codeA"=soin."codeA" inner join soignant on soin."refS"=soignant."refS" WHERE soin."codeA"=? AND soin."refS"=? AND soin."typeS"=? AND soin."nomZone"=?';
                $statement = $conn->prepare($req);
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
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    else
    {
        echo "<p>Error cannot send the report to the DataBase</p>";
    }
?>