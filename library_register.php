<?php
$msg ="";
if (isset ($_POST['submit'])){
    
    
    $conn = new mysqli('localhost', 'root', '', 'final_library');
    
    $email = $conn->real_escape_string($_POST['email']);
    $first_name = $conn->real_escape_string($_POST['firstname']);
    $second_name = $conn->real_escape_string($_POST['secondname']);
    $password = $conn->real_escape_string($_POST['password']);
    $cpassword = $conn->real_escape_string($_POST['cpassword']);
    
    foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$msg = "<label>All Fields are required</label>";
        break;
        }
    
    if ($password !== $cpassword){
        $msg = "<label>Password does not match</label>";
        
        
    } else {
        
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $conn->query("INSERT INTO user (Email, FirstName, SecondName, Password)
          VALUES ('$email', '$first_name', '$second_name', '$hash')");
       header( 'Location: ../NewTest/login.php');   
        
    }
    
    
    }
    
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="register.css">
        <title>Registration page</title>
    </head>
    <body>
         <div class="jumbotron jumbotron-fluid">
        <h1>Please Register to Enter Our Site</h1>
    </div>
        <div class="modal-dialog text-center">
        <div class="col-sm-12 main-section">
    
            <div class="col-12 form-input">
            <div class="modal-content">

        <form action="" method="post"> 
        
            <div class="form-group">
        <input type="email"  name="email" placeholder ="Enter Email"/>
            </div>
                        
            <div class="form-group">
        <input type="password" name="password" placeholder ="Enter Password"/>
            </div>
            
            <div class="form-group">
        <input type="password"  name="cpassword" placeholder ="Confirm Password"/>
            </div>
                        
            <div class="form-group">
        <input type="text" name="firstname" placeholder ="First Name"/>
            </div>
                        
            <div class="form-group">
        <input type="text" name="secondname" placeholder ="Second Name"/>
            </div>
        
        <input class="btn btn-success" type="submit" name="submit" value="Let me in"/> 
        <br>
        <br>
        <?php if ($msg != "") {echo $msg . "<br><br>";} ?>
      
        
        </form>
   
                            <label>Already Registered? Click <a href='login.php'>here</a> to log in</label>
         </div>
        </div>
    </div>
    </div>
     
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
