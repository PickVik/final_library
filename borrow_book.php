<?php

include 'booksearch_class.php';

  if (!empty($_GET)) {

        $books = new Booksearch();
        $results = $books->updateborrower(2, $_GET['ISBN']);
//        print_r ($results);
    }
