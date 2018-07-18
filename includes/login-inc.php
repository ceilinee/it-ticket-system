<?php
if(isset($_POST['submit'])){//check if we pressed submit button
    include 'dbh-inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handling
    //check if these inputs are empty
    if(empty($uid) == true || empty($pwd) == true){
        header("Location: ../index.php?login=empty");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            header("Location: ../index.php?login=error");
            exit();
        }
        else{//if user typed in correct password that matched with a username in the database
            if($row = mysqli_fetch_assoc($result)){
                //de hash the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
            }

        }
    }

}
else{
    header("Location: ../index.php?login=error");
    exit();
}