<?php

require_once('dbconnect.php');

?>

<form action="" method="post"> 

            <input type="text" name="author" /> <br>
            <input type="submit" name="submit" value="Submit" /> 

</form>
        
<?php

if (isset($_POST['author'])){
    $query="SELECT books.Title, CONCAT(`authors`.`First Name`, ' ', `authors`.`Last Name`) as Author_Name
            FROM `authors` 
            INNER JOIN book_authors ON book_authors.Author_ID=authors.Author_ID
            INNER JOIN books ON books.ISBN=book_authors.ISBN 
            WHERE CONCAT(`authors`.`First Name`, ' ', `authors`.`Last Name`) LIKE '%{$_POST['author']}%'";

//var_dump($query);

$db= NEW DB();
$results=$db->query($query);

//var_dump($results);

?>

        <table>
            <thead>
                <th>Book Title</th>
                <th>Author</th>
            </thead>
            <tbody>
<?php

foreach($results as $result) {
                        
            echo "<tr>";
            echo "<td>{$result['Title']}</td>";
            echo "<td>{$result['Author_Name']}</td>";
            echo "</tr>";
}

?>

                 </tbody>
        </table>
<?php }