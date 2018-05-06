<?php

include 'library_books.php';

class Books{
    
    public $books = array();
   
    public $pdo;

    
    function __construct() {
        
        $username = "root";
        $password = "";
    try{
        $dsn = "mysql:host=localhost;dbname=final_library";
        $this->pdo = new PDO( $dsn, $username, $password);
        echo "Connected to database";        
    } catch (PDOException $e){
         die();
    }       
        

    }
    
    function insert($ISBN, $Title, $Type, $Genre, $Price, $Borrow_status){
        $sql = "INSERT INTO books ( ISBN, Title, Type, Genre, Price, Borrow_status )
        VALUES ( '$ISBN','$Title', '$Type','$Genre', '$Price', '$Borrow_status')";
        echo $sql;
        $this->pdo->exec($sql);
        
        
    }
    function delete($Title){
        $sql = "DELETE FROM books WHERE Title ='$Title'";
       
        echo $sql;
        $this->pdo->exec($sql);
        
    }
    
    function update($ISBN, $Title, $Type, $Genre, $Price, $Borrow_status){
        $sql = "UPDATE books SET  ISBN= '$ISBN', Title='$Title', Type='$Type', Genre='$Genre',Price='$Price', Borrow_status='$Borrow_status'
        where Title='$Title'";
        echo $sql;
        $this->pdo->exec($sql);    
    }
    function search($ISBN, $Title, $Type, $Genre, $Price){
        $sql = "SELECT    ISBN, Title, Type, Genre, Price, Borrow_status
                FROM books WHERE  ISBN= '$ISBN' OR Title='$Title' OR Type='$Type' OR Genre='$Genre' OR Price= '$Price'";
        echo $sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(NULL);     
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$this->pdo->exec($sql);
           
        // $this->pdo-> fetchAll(PDO::FETCH_ASSOC);
        
}
    
}  

