<?php
    //this is where we change the status of the ticket to resolved and place it into resolved table

    session_start();
    require '../includes/dbh-inc.php';
    $email = $_SESSION['email'];
    $techID = $_SESSION['id'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $ticketID = $_GET['id'];
    $specialization = $_SESSION['specialization'];

    //update ticket status to make sure that is is now resolved
    $sql = "UPDATE ticket 
            SET Status = 'solved' WHERE Ticket_ID = '$ticketID'";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo mysqli_error($conn);
    }else{
    //remove the ticket from the respective specialization assignment table and dump it into resolved table
    $specialization = str_replace('_', '', $specialization);
    $specialization = $specialization . "_assignment";
    $sql = "DELETE FROM `{$specialization}`
            WHERE Ticket_ID = '$ticketID' ";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo mysqli_error($conn);
    }
    //create an entry in resolved to ensure that ticket has now been resolved
    $sql = "INSERT INTO resolved (Ticket_ID, tID) VALUES ('$ticketID', '$techID')";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo mysqli_error($conn);
    }else{
        header("Location: admin-my.php?resolve=success");
    }
}