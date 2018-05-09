<?php

//session_start();


require_once 'user_class.php';
//print_r ($_SESSION);
$validateduser = new User;
//print_r ($validateduser);
$results= $validateduser->search();

//foreach($results as $result){
//        echo $result['ID'];
//}

$loggedinuser = $results[0];


include 'booksearch_class.php';

  if (!empty($_GET)) {

        $books = new Booksearch();
        //User ID hard coded as 2 for now as not available in session scope
        $results = $books->updateborrower($loggedinuser['ID'], $_GET['ISBN']);

    }

   