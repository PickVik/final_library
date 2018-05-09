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
        
        
        function register_admin($hash){
            $msg = "";
            $email = $_POST['Email'];
            $first_name = $_POST['Firstname'];
            $last_name = $_POST['Secondname'];
            $password = $_POST['Password'];
            $cpassword = $_POST['cpassword'];
            
            foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$msg = "<label>All Fields are required</label>";
        break;}
    
    if ($password !== $cpassword){
        $msg = "<label>Password does not match</label>";
         } else {
               $hash = password_hash($password, PASSWORD_DEFAULT);
               $sql = "INSERT INTO user Email, Firstname, Secondname, Password, Admin VALUES '$email', '$first_name', '$last_name', '$hash', '1'";
               $stmt = $this->pdo->prepare($sql);
               $stmt->execute();
               echo PHP_EOL;
               echo "<label>Admin successfully created</label>";}
    }
        }
}