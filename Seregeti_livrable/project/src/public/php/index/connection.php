<?php
class Connection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    public $link;

    public function __construct() {
        $this->host = 'programwithgio-postgres_server';
        $this->dbname = 'postgres';
        $this->username = 'postgres';
        $this->password = 'flute';
        $this->connection();

    }

    private function connection(){
        try {
            $this->link = new PDO('pgsql:host='.$this->host.';port=5432;dbname='.$this->dbname.';user='.$this->username.';password='.$this->password);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            echo "Erreur de connection";
        }
    }
}
?>