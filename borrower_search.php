<?php

include 'booksearch_class.php';

  if (!empty($_POST)) {

        $books = new Booksearch();
        $results = $books->booksearch($_POST['search_term']);
//        print_r ($results);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="book_search.css">
  
        <title>book_search</title>
    </head>
        
<body>
    <div class="jumbotron jumbotron-fluid">
        <h1>Book Search</h1>
    </div>     
    
    <div class="container instructions-container">
        <div class="row">
            <a href="profile.php"><button>Go To Profile Page</button></a>
        </div>
        
        <div class="row">
            <div class="col-9 instructions">
                <p>  Searching for a book? - You've come to the right place! <br/>
                     Type in your search word/s<br/>
                     Hit submit to get your results<br/>   
                </p>
            </div> 
            <div class="col-3">
                <img src="search.jpg" alt="book search" class=""  /> 
            </div>           
        </div>        

        <form action="" method="post" > 
            <div class="row">   
                 
<!--                    Search by
                    <select>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="genre">Genre</option>
                        <option value="everything">Everything</option>
                    </select>-->
                   
                <div class="col-6">
                    <input id="search_term" type="text" name="search_term" placeholder = "Your search keywords" /> <br>
                </div>    
                <div class="col-3">   
                <input input class="btn btn-primary" type="submit" name="submit" value="Submit" /> 
                </div>
            </div>
       </form>
    </div>
     
    <?php if(!empty($_POST)) { ?>
    
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Your results for <strong><i><?php echo $_POST["search_term"]; ?></strong></i>:</h3>
                    <h3> Number of results for your search : <?php echo count($results);?></h3>
                    <h3><?php if(count($results) === 0) {echo "There are no results for your search";}?></h3>
                </div>
            </div>        

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="container"> 
                         <?php foreach ($results as $result) { ?>
                            <div class="row result">
                                <div class="col-9">
                                    <strong>ISBN:</strong> <?php echo $result ["ISBN"]; ?><br/>  
                                    <strong>Title:</strong> <?php echo $result ["Title"]; ?><br/>
                                    <strong>Genre:</strong> <?php echo $result ["Genre"]; ?><br/>
                                    <strong>Author:</strong> <?php echo $result ["Author_Name"]; ?><br/>
                                    <strong>Price:</strong> <?php echo $result ["Price"]; ?><br/>
                                </div>

                                <div class="col-3">
                                    <button class="btn btn-primary" onclick= "borrow(<?php echo $result["ISBN"]; ?>);">Borrow</button>  
                                </div>  

                            </div>           

                        <?php } ?>
                    </div>
                </div>
            </div> 

        </div>

    <?php  } ?>
    
    <script>
        function borrow(ISBN) {
                  
            var xhttp;
            
            xhttp = new XMLHttpRequest(); //object instantiation
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
//                    document.getElementById("result").innerHTML = this.responseText;
                    alert(`Book Borrowed is ISBN ${ISBN}`);
                    console.log(this.responseText);
                }
            };
            xhttp.open("GET", "borrow_book.php?ISBN="+ISBN, true);
            xhttp.send();   
        }
    </script> 
    
    
</body>    
</html>





        
    

