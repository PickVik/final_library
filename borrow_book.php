<?php

session_start();
print_r ($_SESSION);
//need user ID in the session scope as well as the email address
include 'booksearch_class.php';

  if (!empty($_GET)) {

        $books = new Booksearch();
        //User ID hard coded as 2 for now as not available in session scope
        $results = $books->updateborrower(2, $_GET['ISBN']);
//        print_r ($results);
    }
