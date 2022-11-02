<?php 
class Post 
{
    private $conn;
    private $table = 'posts';

    public $id, $category_id,$category_name, $title, $body, $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.created_at
            FROM $this->table p
             LEFT JOIN 
            categories c ON p.category_id = c.id
            ORDER BY
            p.created_at DESC
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;

    }

    public function readSingle(){
        $query = "SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.created_at
            FROM $this->table p
             LEFT JOIN 
            categories c ON p.category_id = c.id
            WHERE p.id = ?
            ORDER BY
            p.created_at DESC 
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->category_name = $row['category_name'];
        $this->category_id = $row['category_id'];

    }

    public function create(){
        $query = " INSERT INTO 
        $this->table SET
        title = :title,
        body = :body,
        category_id = :category_id
   

        ";

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':category_id', $this->category_id);


        if ( $stmt->execute() ){
            return true;
        } 

        printf("Error %s.\n", $stmt->error);
        return false;
    }

    public function update(){
        $query = " UPDATE
        $this->table SET
        title = :title,
        body = :body,
        category_id = :category_id
        WHERE id = :id
        ";

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        if ( $stmt->execute() ){
            return true;
        } 

        printf("Error %s.\n", $stmt->error);
        return false;   
    }

    public function delete(){
        $query = " DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
      return $stmt->execute() ?  true : printf("Error %s.\n", $stmt->error) ;

    }

}

?>