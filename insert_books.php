<?php

include 'book_class.php';

if (!empty($_POST)) {
    if (isset($_POST['Insert'])){
        
        $Book = new Books();

        $Book->insert($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
                   
    }
    if (isset($_post['Delete'])){
    
    $Book = new Books();
    
    $Book->delete($_POST['Title']);
}

    if (isset($_post['Update'])){
    
    $Book = new Books();
    $Book->update($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
}

    if (isset($_post['Search'])){
    
    $Book = new Books();
    $Book->search($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
}
}
?>


<!DOCTYPE html>


<html>
    <head>
        <title>Library - Insert Books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        
        <h1>Welcome to the library!</h1>
        <h2>Please insert a new book!</h2>
        
    <form action="" method="post" > 
        
        
     ISBN:          <input type="int" name="ISBN" /> <br><br>
     Title:         <input type="text" name="Title" /> <br><br>
    Type:           <input type="text" name="Type" /> <br><br>
    Genre:          <input type="text" name="Genre" /> <br><br>
    Price:          <input type="text" name="Price" /> <br><br>
    Borrow_status:  <input type="text" name="Borrow_status" /> <br><br>
    <div>
                    <input type="submit" name="Insert" value="Insert" /> 
                    <input type="submit" name="Delete" value="Delete" />
                    <input type="submit" name="Update" value="Update" />
                    <input type="submit" name="Search" value="Search" />
    </div>
    </form>
        
    </body>
</html>
    
