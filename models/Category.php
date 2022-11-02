<?php 
class Category 
{
    private $conn;
    private $table ='categories';

    public $name, $slug, $id, $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT c.id, c.name, c.slug FROM $this->table AS c" ;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
 
}


?>