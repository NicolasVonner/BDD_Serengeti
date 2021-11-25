<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if(isset($_POST["referralCaregiver"])) // si chaque valeur des arguments en get ne sont pas vides alors
    {   
            if ($r->link) {

                $date = date("Y-m-d\TH:i:s", strtotime($_POST["dateCaregiver"]));

                $req= 'INSERT INTO soin ("dateS","refS","codeA","typeS","nomZone","commentaireS") VALUES(?,?,?,?,?,?)';
                
                $statement = $r->link->prepare($req);
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
                    echo $statement;
                }
            }
    }
    else
    {
        echo "<p>Erreur: impossible de se connection à la BDD</p>";
    }
?>