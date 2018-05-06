<?php

include 'library_books.php';

class Booksearch{
    
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
    
    
    function booksearch ($search_term)    {
       echo "searching" ;
       $sql = "SELECT books.ISBN, books.Title, books.Price, books.Genre, CONCAT(authors.`First Name`, ' ', authors.`Last Name`) as Author_Name
               FROM books     
               LEFT JOIN book_authors ON books.ISBN=book_authors.ISBN
               LEFT JOIN authors ON book_authors.Author_ID=authors.AuthorID               
               WHERE title like \"%$search_term%\" or books.ISBN like \"%$search_term%\" or Genre like \"%$search_term%\" or authors.`First Name` like  \"%$search_term%\" or authors.`Last Name` like \"%$search_term%\"";
       
       $results = $this->pdo->query($sql);
       return $results;
    } 
    
}
//       print_r($results);
//       foreach($results as $row) {
//          // print_r($row);
//           $book=new books ($row["ID"],$row["Title"], $row["ISBN"],$row["Price"]);
//           array_push ($this->books, $book);
//           
//           //               LEFT JOIN book_authors ON books.ISBN=book_authors.ISBN
//              LEFT JOIN authors ON book_authors.Author_ID=authors.AuthorID
//        CALL `JoinAuthorsToBooks`()
