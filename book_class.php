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


  /*  function search2 ($search_term)    {
       echo "searching" ;
       $sql = "SELECT books.ISBN, books.Title, books.Price, books.Genre, CONCAT(authors.`First Name`, ' ', authors.`Last Name`) as Author_Name
               FROM books     
               LEFT JOIN book_authors ON books.ISBN=book_authors.ISBN
               LEFT JOIN authors ON book_authors.Author_ID=authors.AuthorID
               WHERE title like \"%$search_term%\" or books.ISBN like \"%$search_term%\" or Genre like \"%$search_term%\" or authors.`First Name` like  \"%$search_term%\" or authors.`Last Name` like \"%$search_term%\"";
       
       $results = $this->pdo->query($sql);
       return $results;
      print_r($results);
      foreach($results as $row) {
         // print_r($row);
           $book=new books ($row["ID"],$row["Title"], $row["ISBN"],$row["Price"]);
               array_push ($this->books, $book);
        
               }
    }  */
  

