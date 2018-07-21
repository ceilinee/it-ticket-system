<?php
    session_start();
    require '../includes/dbh-inc.php';
    $email = $_SESSION['email'];
    $techID = $_SESSION['id'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $ticketID = $_GET['id'];
    $specialization = $_SESSION['specialization'];

    //update the ticket assigned status to make sure that it is now assigned
    $sql = "UPDATE ticket 
            SET Assigned = 1 WHERE Ticket_ID = '$ticketID' ";
    mysqli_query($conn, $sql);
    //insert the ticket into its respective assigned table based on the specialization
    $specialization = str_replace('_', '', $specialization);
    $specialization = $specialization . "_assignment";
    $sql = "INSERT INTO `{$specialization}` (ticket_ID, tID ) VALUES ('$ticketID', '$techID')";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo mysqli_error($conn);
    
    //header("Location: admin.php?assignment=fail");
    }else{
        header("Location: admin.php?assignment=success");
    }
    

    

    
    
    