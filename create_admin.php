<?php
 $msg = "";
        if (isset ($_POST['create'])){

        $conn = new mysqli('localhost', 'root', '', 'final_library');
    
        $email = $conn->real_escape_string($_POST['Email']);
        $first_name = $conn->real_escape_string($_POST['Firstname']);
        $last_name = $conn->real_escape_string($_POST['Secondname']);
        $password = $conn->real_escape_string($_POST['APassword']);
        $cpassword = $conn->real_escape_string($_POST['Acpassword']);
    
        foreach($_POST as $key=>$value) {
            if(empty($_POST[$key])) {
            $msg = "All Fields are required";
            break;
        }
    
        if ($password !== $cpassword){
            $msg = "Password does not match";
        
        
    }   else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn->query("INSERT INTO user (Email, Firstname, Secondname, Password, Admin) VALUES ('$email', '$first_name', '$last_name', '$hash','1')");
        $msg = "Admin successfully created";
        
    }
      //  if ($msg != "") {echo $msg . "<br><br>";}
        }

        }