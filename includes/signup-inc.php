<?php 

if(isset($_POST['submit'])){//to check if user has filled out signup information and has pressed the sign up button
    include_once 'dbh-inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);//input from first name user input 
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $cubicle = mysqli_real_escape_string($conn, $_POST['cubicle']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $position - mysqli_real_escape_string($conn, $_POST['position']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    //get data from signup form to pass on to database

    //error handlers
    if(empty($first) || empty($last) || empty($email) || empty($email) || empty($pwd) ){//if this first input or last input is empty....
         header("Location: ../signup.php?signup=empty");//if people alter url, then it will send them over back to signup.php
    }
    else{//check if input characters are valid
        if(  (!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))  ){  //if $first or $last does not contain these characters
            header("Location: ../signup.php?signup=invalid"); //if people alter url, then it will send them over back to signup.php
        }
        else{
                //connect to database to see if email has been taken
                $sql = "SELECT * FROM employee WHERE email='$email'";//create sql query to check if username has been taken
                $result = mysqli_query($conn, $sql);//check if uid is taken
                $resultcheck = mysqli_num_rows($result);//check if any rows already have the inputted user id

                if($resultcheck > 0){
                    header("Location: ../signup.php?signup=email");
                }
                else{
                    //hashing the password so that the password is unrecognizable
                    //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user information into the database
                    $sql = "INSERT INTO employee (FirstName, LastName, 
                    Email, Password, Department, Position, Cubicle) VALUES ('$first', '$last' , '$email', '$pwd', '$dept', '$position', '$cubicle');";
                    mysqli_query($conn, $sql);
                        
                    header("Location: ../signup.php?signup=success");
                    exit();//exit script
                }
            }
        
    }//*************************************************************************
    //end of first else statement 

} else{
    header("Location: ../signup.php");//if people alter url, then it will send them over back to signup.php
    exit();//stops script from running

}