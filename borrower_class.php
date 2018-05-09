<?php

class Borrower {
    
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

    function borrow_status($Email){
       $sql = "SELECT `user`.`Email`, `books`.`Title`, `authors`.`First Name`, `authors`.`Last Name` 
       FROM `authors` LEFT JOIN `borrowed_books` ON `borrowed_books`.`Author_ID` = `authors`.`Author_ID` 
       LEFT JOIN `user` ON `borrowed_books`.`User_ID` = `user`.`ID` 
       LEFT JOIN `book_authors` ON `book_authors`.`Author_ID` = `authors`.`Author_ID` 
       LEFT JOIN `books` ON `book_authors`.`ISBN` = `books`.`ISBN` WHERE Email = '$Email'";
      
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(NULL);   
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($data);
        if ($data != null) {
        foreach($data as $row)
             {
            echo "<li><strong>" . $row['Title'] . PHP_EOL . "</strong></li>";
            echo "by" . PHP_EOL;
            echo $row['First Name'] . PHP_EOL;
            echo $row ['Last Name'];
            echo "<br>";
        }
}
    }
}
   
//        SELECT `user`.`Email`, `books`.`Title`, `authors`.`First Name`, `authors`.`Last Name` FROM `authors` LEFT JOIN `borrowed_books` ON `borrowed_books`.`Author_ID` = `authors`.`Author_ID` LEFT JOIN `user` ON `borrowed_books`.`User_ID` = `user`.`ID` LEFT JOIN `book_authors` ON `book_authors`.`Author_ID` = `authors`.`Author_ID` LEFT JOIN `books` ON `book_authors`.`ISBN` = `books`.`ISBN` WHERE Email = 'jo@theharrisons.online'
