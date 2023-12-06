<?php

class Pet
{
    private $conn;


    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($nome, $raca, $fk_don, $idade)
    {
        $query = "INSERT INTO  tbpet (nome,  raca , fk_don, idade) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $raca, $fk_don, $idade]);
        return $stmt;
    }

    public function read()
    {
        $query = "SELECT * FROM  tbpet";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    public function reads()
    {
        $query = "SELECT id FROM  tbprodu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readEdits($id)
    {
        $query = "SELECT id FROM tbpet WHERE fk_don = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function readEdit($id)
    {
        $query = "SELECT * FROM tbpet WHERE fk_don = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function petin($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM tbpet WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $pet = $stmt->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['id'] = $pet['id'];
            return true;
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }


}