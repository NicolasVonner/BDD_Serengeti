<?php    
    require_once('../../index/connection.php');
    $r = new Connection();
    if ($r->link) {
        if(isset($_POST["dateArrivee"]))
        {
            $familleA = strip_tags(htmlspecialchars($_POST["typeRessencementConsult"]));
            $dateArrivee=strip_tags(htmlspecialchars($_POST['dateArrivee']));
            $dateArrivee = date("Y-m-d\TH:i:s", strtotime($dateArrivee));;
     
            $req = 'SELECT * FROM animal WHERE animal."familleA"=? AND dateArrivee>=? ';
            $statement = $r->link->prepare($req);
            $statement->bindParam(1,$familleA);
            $statement->bindParam(2,$dateArrivee);
            $statement->execute();
        }
        else
        {
            $req="SELECT * FROM animal";
            $statement = $r->link->prepare($req);
            $statement->execute();
        }

        if ($statement)
        {
            $result = $statement->fetchAll(PDO::FETCH_CLASS);
            var_dump($result);
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