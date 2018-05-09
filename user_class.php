<?php

class User{
    
    public $user = array();
   
    public $pdo;

    
    
    function __construct() {
        
        $username = "root";
        $password = "";
    try{
        $dsn = "mysql:host=localhost;dbname=final_library";
        $this->pdo = new PDO( $dsn, $username, $password);        
    } catch (PDOException $e){
         die();
    }       
    } 

        

function search(){
        $sql = "SELECT * FROM user WHERE Email = '$_SESSION[Email]'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(NULL);     
return $stmt->fetchAll(PDO::FETCH_ASSOC);}
    


    function change_password($hash){
        $sql = "UPDATE user SET Password='$hash' WHERE Email = '$_SESSION[Email]'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        echo PHP_EOL;
        echo "<label>Congratulations! You have successfully changed your password</label>";
        }   
        
    
        function admin_status(){
        $sql = "SELECT Admin FROM user WHERE Email = '$_SESSION[Email]'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
        
        function borrow_status($ID){
       $sql = "SELECT books.Title, CONCAT (authors.'First Name', ' ', authors.'Last Name') as Author_Name, user.Email
    FROM authors
    LEFT JOIN book_authors ON book_authors. Author_ID = authors.Author_ID
    LEFT JOIN books ON book_authors . ISBN = books . ISBN
    LEFT JOIN borrowed_books ON borrowed_books. Author_ID = authors.Author_ID
    LEFT JOIN user ON borrowed_books.User_ID = user.ID
    WHERE ID = '$ID'";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(NULL);     
        return $stmt->fetchAll(PDO::FETCH_ASSOC);}
                
        }

   