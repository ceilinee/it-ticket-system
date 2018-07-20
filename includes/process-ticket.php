<?php
    if(isset($_POST['submit_ticket'])){
        session_start();
        include 'dbh-inc.php';
        $empid = $_SESSION['empID'];
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $issue = mysqli_real_escape_string($conn, $_POST['issue']);

        if(empty($title) | empty($description) | empty($issue) ){
            header("Location: ../customer/user.php?ticket=empty");
        }else{
            //create ticket and insert into db
            //initially all tickets will have unsolved status
            if(isset($_POST['low'])){
                $sql = "INSERT INTO ticket(Title, Description, Status, Priority, Issue_Type, Assigned)
                        VALUES('$title', '$description', 'unsolved', 'low', '$issue', 0)";
            }
            elseif(isset($_POST['med'])){
                $sql = "INSERT INTO ticket(Title, Description, Status, Priority, Issue_Type, Assigned)
                    VALUES('$title', '$description', 'unsolved', 'medium', '$issue', 0)";
            }elseif(isset($_POST['high'])){
                $sql = "INSERT INTO ticket(Title, Description, Status, Priority, Issue_Type, Assigned)
                    VALUES('$title', '$description', 'unsolved', 'high', '$issue', 0)";                                
            }
            mysqli_query($conn, $sql);
            $sql = "SELECT * FROM ticket WHERE Ticket_ID = 
                        (SELECT MAX(Ticket_ID) FROM ticket)";
            $res = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_assoc($res)){
                $ticket_id = $row['Ticket_ID'];
            }
            $sql = "INSERT INTO submits(empID, Ticket_ID, time_submitted) VALUES ('$empid', '$ticket_id', CURRENT_TIMESTAMP)";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                echo mysqli_error($conn);
            }
            header("Location: ../customer/user.php?ticket=success");
            exit();
        
    }
    
    }else{
        header("Location: ../customer/user.php?process=error");
        exit();
    }