<?php
session_start();
require_once 'login_backend.php';

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group<?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" <?php echo $email; ?>>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>     
            <button type="submit" class="btn btn-success">Login</button>
                 
                 
                 </form>
        <p>New user? Click <a href="library_register.php">here</a> to register</p>
                </div>
            </div>
        </div>
    
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
