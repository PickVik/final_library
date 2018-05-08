<?php


$msg ="";

if (isset ($_POST['submit'])){
    
    
    $conn = new mysqli('localhost', 'root', '', 'final_library');
    
    $email = $conn->real_escape_string($_POST['email']);
    $first_name = $conn->real_escape_string($_POST['firstname']);
    $second_name = $conn->real_escape_string($_POST['secondname']);
    $password = $conn->real_escape_string($_POST['password']);
    $cpassword = $conn->real_escape_string($_POST['cpassword']);
    
    
    if ($password != $cpassword){
        $msg = "please check you passwords";
        
    } else {
        
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $conn->query("INSERT INTO user (Email, FirstName, SecondName, Password)
          VALUES ('$email', '$first_name', '$second_name', '$hash')");
       $msg = "you have been registered";
               
        
        
    }
    
    
    
    
    
    
}









?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
       <div class="container" style ="">
   
          
        <h1>Welcome to the library!</h1>
        <h2>Please register</h2>
        
        <form action="" method="post" > 
        
        
        Email Address:         <input class="form-control" type="email"  name="email" placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" placeholder ="Password"/> <br>
        Confirm Password:      <input class="form-control" type="password"  name="cpassword" placeholder ="Confirm Password"/> <br>
        First Name:            <input class="form-control" type="text" name="firstname" placeholder ="First Name" /> <br>
        Second Name:           <input class="form-control" type="text" name="secondname" placeholder ="Second Name"/> <br>
   
        <input class="btn btn-primary" type="submit" name="submit" value="Register" /> 
        
        <?php if ($msg != "") {echo $msg . "<br><br>";} ?>
      
        
        </form>
   
         </div>
        
        
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
