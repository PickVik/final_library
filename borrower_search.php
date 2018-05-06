<?php

include 'book_class.php';

  if (!empty($_POST)) {

        $books = new Books();
        $results = $books->search2 ($_POST['search_term']);
        print_r ($results);
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
            <div class="col-9 instructions">
                <p>  Searching for a book? - You've come to the right place! <br/>
<!--                     Select the search category you would like to use - Title, Author or book category<br/>-->
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
                <h3>Your results:</h3>
            </div>
        </div>        
        
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="container"> 
                     <?php foreach ($results as $result) { ?>
                        <div class="row result">
                            <div class="col-9">
                                
                           <?php echo $result ["ISBN"]; ?><br/>  
                           <?php echo $result ["Title"]; ?><br/>
                           <?php echo $result ["Price"]; ?><br/>
                           <?php echo $result ["Genre"]; ?><br/>
                            </div>
                            <div class="col-3">
                                 <button class="btn btn-primary" type="submit">Borrow</button>  
                            </div>  
                       
                        </div>           
                       
                    <?php } ?>
                </div>
            </div>
        </div> 

    </div>

        <?php  } ?>
</body>    
</html>





        
    

