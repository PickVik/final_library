<?php

include 'book_class.php';

if (!empty($_POST)) {
    
   
    if (isset($_POST['Delete'])){
    echo 'delete';
    $Book = new Books();
    
    $Book->delete($_POST['Title']);
    echo 'delete end';
}
if (isset($_POST['Insert'])){
        echo 'insert';
        $Book = new Books();
        echo 'insert end';
        $Book->insert($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
                   
    }

    if (isset($_POST['Update'])){
    
    $Book = new Books();
    $Book->update($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
}

    if (isset($_POST['Search'])){
    
    $Book = new Books();
    $results= $Book->search($_POST['ISBN'], $_POST['Title'], $_POST['Type'], $_POST['Genre'], $_POST['Price'], $_POST['Borrow_status']);
   ?>


        <table>
            <thead>
                <th>Book Title</th>
                <th>Borrow status</th>
            </thead>
            <tbody>
   
<?php

foreach($results as $result) {
                        
            echo "<tr>";
            echo "<td>{$result['Title']}</td>";
            echo "<td>{$result['Borrow_status']}</td>";
            echo "</tr>";
}

?>

                 </tbody>
        </table>
<?php
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
    
