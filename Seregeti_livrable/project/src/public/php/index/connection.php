<?php
    echo "Tentative de connection PDO ( ligne test)\t";
    $host = '172.19.0.2';
    $dbname = 'postgres';
    $username = 'postgres';
    $password = 'flute';

    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
    
    try {
    $conn = new PDO($dsn);
    
    if ($conn) {
        echo "Connecté à $dbname avec succès!";
    }
    }
    catch (PDOException $e) {
    echo $e->getMessage();
    echo "Erreur de connection";
    }
?>