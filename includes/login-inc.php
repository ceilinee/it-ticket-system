<?php
session_start();

if(isset($_POST['submit'])){//check if we pressed submit button
    include 'dbh-inc.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if(empty($email) == true || empty($pwd) == true){
        echo "empty login";
    }
    else{
        if(isset($_POST['user'])){
        $sql = "SELECT * FROM employee WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck == 0){
            echo "user doesnt exist";
        }else{
            if($row = mysqli_fetch_assoc($result)){
                if($row['Password'] != $pwd){
                    echo "invalid password";
                }elseif($row['Password'] == $pwd){
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['firstname'] = $row['FirstName'];
                    $_SESSION['lastname'] = $row['LastName'];
                    $_SESSION['id'] = $row['empID'];
                    header("Location: ../customer/user.php"); 
                }
            }

        }
    }elseif(isset($_POST['admin'])){
        $sql = "SELECT * FROM technician WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck == 0){
            echo "technician doesnt exist";
        }else{
            if($row = mysqli_fetch_assoc($result)){
                if($row['Password'] != $pwd){
                    echo "invalid password";
                }else{
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['firstname'] = $row['FirstName'];
                    $_SESSION['lastname'] = $row['LastName'];
                    $_SESSION['id'] = $row['tID'];
                    header("Location: ../admin/admin.php");
                }
            }
        }
    }
    }
}
else{
    header("Location: ../index.php?login=error");
    
}
?>
