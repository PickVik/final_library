<?php
session_start();
include 'book_class.php';
if(!isset($_SESSION['Email'])){
echo "Sorry, Please login and use this page";
header("location:login.php");
exit;
if ($_SESSION['Admin'] == 0){
    
    header("location:borrower_search.php");
}
}
 ?>                       
   
<!DOCTYPE html>

<html>
    <head>
        <title>Library - Insert Books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link href="book.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        
        <div class="container-fluid">
             <h1>Welcome to PikVik library!</h1>
             </div>
         <div class="row">
            <a href="admin_profile.php"><button>Go To Profile Page</button></a>
        </div>
               <div class="container-fluid">
       
                  <p>You can update the library here.</p>
               </div>
                <div class="col-8">
                <img src="search.jpg" alt="book search" class="float-right"  /> 
            </div> 
 
    <form action="" method="post" > 
        <div class="container"> 
             <div> 
                 <strong>ISBN                :   </strong><input type="int" name="ISBN" /> <br><br>
                 <strong>Title               :   </strong><input type="int" name="Title" /> <br><br>
                 <strong>Author's First name :   </strong><input type="int" name="First_name" /> <br><br>
                 <strong>Author's last name  :  </strong> <input type="text" name="Last_name" /> <br><br>
                 <strong>Type                :   </strong> <input type="text" name="Type" /> <br><br>
                 <strong>Genre               :  </strong> <input type="text" name="Genre" /> <br><br>
                 <strong>Price               :  </strong><input type="text" name="Price" /> <br><br>
                 <strong>Borrow_status       :   </strong><input type="text" name="Borrow_status" /> <br><br>
            <div>
                    <input type="submit" name="Insert" value="Insert" /> 
                    <input type="submit" name="Delete" value="Delete" />
                    <input type="submit" name="Update" value="Update" />
                    <input type="submit" name="Search" value="Search" />
                    
             </div>
        </div>
</div> 
        <?php
        
        if (!empty($_POST)) {
    
   if (isset($_POST['Insert'])){
        //echo 'insert';
        $Book = new Books();
        //echo 'insert end';
        $Book->insert($_POST['ISBN'], $_POST['Title'],$_POST['First_name'],$_POST['Last_name'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
                   
    }
    if (isset($_POST['Delete'])){
    //echo 'delete';
    $Book = new Books();
    
    $Book->delete($_POST['Title'],$_POST['First_name'],$_POST['Last_name']);
    //echo 'delete end';
}
    if (isset($_POST['Update'])){
    
    $Book = new Books();
    $Book->update($_POST['ISBN'], $_POST['Title'],$_POST['First_name'],$_POST['Last_name'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
}
    if (isset($_POST['Search'])){
    
    $Book = new Books();
    $results= $Book->search($_POST['ISBN'], $_POST['Title'],$_POST['First_name'],$_POST['Last_name'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
    }
    
    
?>
        
        <div class="container" style="align-self: flex-end">
        <div class="col-3">     
        <table>
            <thead>
            <strong> <th>Book Title</th></strong>
            <strong> <th>Borrow status</th></strong>
            </thead>
            <tbody>
                

<?php foreach($results as $result) {?>
            
              <div class="row result">
               
                        <?php echo "<tr>";?>
                        <?php echo "<td>{$result['Title']}</td>";?>
                        <?php echo "<td>{$result['Borrow_status']}</td>";?>
                        <?php echo "</tr>";?>
                 </div>
              
            
              <?php }?>

             </tbody>
                 
        </table>
</div>
        </div>
                  
                    
  <?php 
  
}                     
  ?>
    
      
    </form>
 </body>
</html>