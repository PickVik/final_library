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
                     Select the search category you would like to use - Title, Author or book category<br/>
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
                <div class="col-3"> 
                    Search by
                    <select>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="category">Category</option>
                        <option value="everything">Everything</option>
                    </select>
                    
                    <!--   drop down button - not working so using select as above
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        What do you want to search by?                        
                        </button>  
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Title</a>
                            <a class="dropdown-item" href="#">Author</a>
                            <a class="dropdown-item" href="#">Category</a>
                            <a class="dropdown-item" href="#">Show me everything you've got!</a>
                        </div>
                    </div> 
                    -->
                </div>    

                <div class="col-6">
                    <input id="search_term" type="text" name="search_term" placeholder = "Your search keywords" /> <br>
                </div>    
                <div class="col-3">   
                <input input class="btn btn-primary" type="submit" name="submit" value="Submit" /> 
                </div>
            </div>
       </form>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Your results:</h3>
            </div>
        </div>    
        
<!--dummy data-->   
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="container"> 
                    <div class="row result">
                        <div class="col-9">
                         Hamlet<br/>
                         Shakespeare<br/>
                         1234567890000<br/>
                         </div>
                         <div class="col-3">
                             <button class="btn btn-primary" type="submit">Borrow</button>  
                        </div>      
                    </div>
                    <div class="row result">
                        <div class="col-9">
                         Adrian Mole<br/>
                         Sue Townsend<br/>
                         1234567890004<br/>
                         </div>
                         <div class="col-3">
                             <button class="btn btn-primary" type="submit">Borrow</button>  
                        </div>    
                    </div>
                </div>
            </div>
        </div>   
    </div>
    
</body>    
</html>

<?php

    include 'library_class.php';

    if (!empty($_POST)) {
        $library = new Library();
        $library->search ($_POST['search_term']);
         
    }
?>
      
        <?php if(!empty($_POST)) { ?>

            <div>
                <h2> You have searched for <?php echo $_POST["search_term"]; ?></h2>
                <h3> Number of results for your search : <?php echo count($library-> books);?></h3>
                <h3> Books that match your search results are : </h3> 
                <?php 
                    foreach ($library->books as $book) {
                        echo "ID= " . $book -> id;
                        echo "Title= ". $book -> title;
                        echo "ISBN= " . $book -> ISBN;
                        echo "Year Published= ". $book -> year_published;                   
                    }                
                ?>                 
            </div>           
        <?php } ?> 


   
        
