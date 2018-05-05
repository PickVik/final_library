<?php


if (isset ($_POST['submit'])){
    
    
    $conn = new mysqli('localhost', 'Library', '12345', 'test_library');


        $email = $_POST['email'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $cnewpassword = $_POST['cnewpassword'];
        
        $result = $conn->query("SELECT Password FROM users WHERE Email ='$email'");
        if(!$result)
       {
        echo "The username you entered does not exist";
        }
       
        if ($password = $result['Password'] AND $newpassword == $cnewpassword){
        $sql = $conn->mysql_query("UPDATE user SET Password='$newpassword' WHERE login='$email'");
        }
        if($sql)
        {
        echo "You have  changed your password";
        }
       else
        {
       echo "Update is unsuccesful";
       }
      
}

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
    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div>
        
    <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="mars.jpg" alt="blue planet" class="card-img-top img-fluid" />
  <div class="card-block">
    <h3 class="card-title">Change password</h3>
    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
    <form>
        Email Address:         <input class="form-control" type="email"  name="email" placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" placeholder ="Password"/> <br>
        New Password:          <input class="form-control" type="password"  name="newpassword" placeholder ="New Password"/> <br>
        Confirm New Password:  <input class="form-control" type="password"  name="cnewpassword" placeholder ="Confirm New Password"/> <br>
        
        
        
       <input class="btn btn-primary" type="submit" name="submit" value="Update Password"/>
    
    </form>
  </div>
</div>
    </div>
       <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="planet.jpg" alt="blue planet" class="card-img-top img-fluid" />
  <div class="card-block">
    <h3 class="card-title">Borrowing status</h3>
    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
    </div>
       </div>
    </div>
    </div>


    
    </body>
</html>