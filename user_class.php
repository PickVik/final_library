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
        {echo PHP_EOL;
        echo "<label>Congratulations! You have successfully changed your password</label>";
        }   }
    }