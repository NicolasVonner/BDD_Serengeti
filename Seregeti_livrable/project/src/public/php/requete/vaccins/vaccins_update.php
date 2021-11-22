<?php
    libxml_use_internal_errors(true);

    require_once('../../index/connection.php');
    $r = new Connection();

    if(isset($_POST["referralAnimal"])) // si chaque valeur des arguments en get ne sont pas vides alors
    {   
            if ($r->link) {

                $req= 'UPDATE animal SET "vaccin"=? WHERE "codeA"=? RETURNING animal.*';
                $statement = $r->link->prepare($req);
                $statement->bindParam(1,$_POST["vaccin"]);
                $statement->bindParam(2,$_POST["referralAnimal"]);
                $statement->execute();

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
    }
    else
    {
        echo "<p>Erreur: impossible de se connection à la BDD</p>";
    }
?>