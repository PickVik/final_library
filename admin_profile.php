<?php
session_start();
   
require_once 'user_class.php';
require_once 'login_backend.php';

if(!isset($_SESSION['Email'])){

echo "Sorry, Please login and use this page";
header("location:login.php");
exit;}

if ($_SESSION['Admin'] == 0){
    
    header("location:Profile.php");
}

$validateduser = new User;

$results= $validateduser->search();

$admin = $validateduser->admin_status();

if ($admin == 0) {
    header("location:Profile.php");
    exit;
}
//var_dump($results);

   /* foreach($results as $result){
    $oldpassword= $result['Password'];}
    
    $password= $_POST['password'];
      
    $newpassword = $_POST['newpassword'];
    $cnewpassword = $_POST['cnewpassword'];       
     
      
        if($password!= $oldpassword)
        {
        echo "You entered an incorrect password";
        }
        if($newpassword=$confirmnewpassword){
        $validateduser->change_password();
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "The new password and confirm new password fields must be the same";
       }

*/
?>


<!DOCTYPE html>

<html>
    <head>
        <title>My Account</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="myaccount.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <h1>My Account</h1>
    </div>
    
    <div class="container">
        
        <!-- cards -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="blueplanet.jpg" alt="blue planet" class="card-img-top img-fluid" />
  <div class="card-block">
    <h3 class="card-title">Your details</h3>
    <p><?php if(!empty($_SESSION))
        {foreach($results as $result){
        echo "Hello " . $result['FirstName'] . " ". $result['SecondName'];}}?> 
    </p>
    <form action="" method="post">

        <input class="btn btn-primary" type="submit" name="logout" value="Logout"/><br><br>
        <input class="btn btn-primary" type="submit" name="search" value="Back to Search Page"/>
    </form>
          <?php 
       if(isset($_POST['logout'])){ 
           session_destroy();
           header("location: login.php");
       }
       if(isset($_POST['search'])){ 
           header("location: insert_books.php");
       }
       ?>
  </div>
</div>
        </div>
        
    <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="mars.jpg" alt="blue planet" class="card-img-top img-fluid" />
  <div class="card-block">
    <h3 class="card-title">Change password</h3>
    
    <form action="" method="post">
        
        <input class="form-control" type="password" name="password" placeholder ="Password"/> <br>
        <input class="form-control" type="password"  name="newpassword" placeholder ="New Password"/> <br>
        <input class="form-control" type="password"  name="cnewpassword" placeholder ="Confirm New Password"/> <br>
        
        
        
       <input class="btn btn-danger" type="submit" name="submit" value="Update Password"/>
       <label></label>
    
       <?php foreach($results as $result){
            $oldpassword= $result['Password'];}
            //echo $oldpassword . PHP_EOL;
            $password = "";
            //$password = isset($_POST['password']) ? $_POST['password'] : '';
            //empty()
            $password = !empty($_POST['password']) ? $_POST['password'] : '';
            //echo $password . PHP_EOL;
                        
            $newpassword = "";
           // $newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';
            //empty()
            $newpassword = !empty($_POST['newpassword']) ? $_POST['newpassword'] : '';
            
            $cnewpassword = "";
           // $cnewpassword = isset($_POST['cnewpassword']) ? $_POST['cnewpassword'] : '';
            //empty()
            $cnewpassword = !empty($_POST['cnewpassword']) ? $_POST['cnewpassword'] : '';
      
              
     
      if (isset ($_POST['submit'])){
        if(password_verify($password, $oldpassword)){
       
            if($newpassword==$cnewpassword){
            $hash = password_hash($newpassword, PASSWORD_DEFAULT);

                $validateduser->change_password($hash);
        }
            else
        {
            echo "<label>The new password and confirm new password fields must be the same</label>";
        }
        
        }
       else {
           echo "<label>The password was incorrect</label>";
       }
      }
?>
    </form>
  </div>
</div>
    </div>
       <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="planet.jpg" alt="blue planet" class="card-img-top img-fluid" />
  <div class="card-block">
    <h3 class="card-title">Register New Admin</h3>
    <?php require_once 'create_admin.php'; ?>
    <form id="form" action="" method="post"> 
        
            <div class="form-group">
        <input type="email"  name="Email" placeholder ="Enter Email"/>
            </div>
                        
            <div class="form-group">
        <input type="password" name="APassword" placeholder ="Enter Password"/>
            </div>
            
            <div class="form-group">
        <input type="password"  name="Acpassword" placeholder ="Confirm Password"/>
            </div>
                        
            <div class="form-group">
        <input type="text" name="Firstname" placeholder ="First Name"/>
            </div>
                        
            <div class="form-group">
        <input type="text" name="Secondname" placeholder ="Last Name"/>
            </div>
        
        <input class="btn btn-success" type="submit" name="create" id="button" value="Create Admin" /> 
        <br>
        <br>
        <span><?php echo $msg?></span>
        </form>
  </div>
    </div>
       </div>
    </div>
    </div>


    
    </body>
</html>