<?php

session_start();

include 'library_class.php';

if (!empty($_POST)) {
    if ($_POST['submit'] == 'Login'){

        $library = new Library();

        $library->login ($_POST['email'], $_POST['password']);
                   

    }
    
     elseif (empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<label>All fields are required</label>';
}
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>PickVik Library Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <h1>Welcome to the PickViK Library</h1>
    </div>
    <div class="modal-dialog text-center">
        <div class="col-sm-9 main-section">
        
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="Book-tower (2).jpg" alt="books">
                </div>
    
    <div class="col-12 form-input">
        <form action="" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter Password">
            </div>     
            <button type="submit" class="btn btn-success">Login</button>
                 
                 
                 </form>
        <p>New user? Click <a href="signup.php">here</a> to register</p>
                </div>
            </div>
        </div>
    
    </div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
