<?php
class Contato {
    private $pdo;
    private $DBNAME = "YOUR DB NAME";
    private $DBHOST = "YOUR DB ADDR";
    private $DBUSR  = "YOUR DB USR";
    private $DBPWD  = "YOUR DB PASS";

    public function __construct() {
        $dsn = "mysql:dbname=".$this->DBNAME.";host=".$this->DBHOST;
        try {
            $this->pdo = new PDO($dsn, $this->DBUSR, $this->DBPWD);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function AddUser($email, $name = "") {
        if(!$this->VerifyIfEmailExists($email)) {

            $sql = "INSERT INTO contatos (name, email) VALUES (:name, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->execute();
            
            return true;
        } else {
            return false;
        }
    }

    public function GetName($email) {
        $sql = "SELECT name FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info["name"];
        } else { 
            return "";
        }
    }

    public function GetInfo($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    public function GetAll() {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function Edit($name, $email, $id) {
        if(!$this->VerifyIfEmailExists($email)) {
            $sql = "UPDATE contatos SET name = :name, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();
        } else {
            $sql = "UPDATE contatos SET name = :name WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":id", $id);
            $sql->execute();
        }
    }

    public function Delete($id) {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function VerifyIfEmailExists($email) {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
