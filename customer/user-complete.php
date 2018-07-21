<!doctype html>

<html lang="en">
    <head>
      <title>IT Ticket System</title>
      <meta name="description" content="The HTML5 Herald">
      <link rel="stylesheet" href="../index.css">
    </head>
    <body>
      <?php
        session_start();
        require 'sidebar.php';
        require '../includes/dbh-inc.php';
        $empid = $_SESSION['empID'];
      ?>
      <div class="new-ticket">
      <div class="ticket-body">
      <h2>
      <?php
        //get the number of tickets that have yet to be solved
        $sql = "SELECT COUNT(empID), submits.empID 
                FROM submits INNER JOIN ticket ON ticket.Ticket_ID = submits.Ticket_ID
                WHERE ticket.Status = 'solved' AND empID = '$empid' GROUP BY (empID)";
        $res = mysqli_query($conn, $sql);
        if(!$res){
          echo mysqli_error($conn);
        }
        if($row = mysqli_fetch_assoc($res)){
          $count = $row['COUNT(empID)'];
        }
        echo "You currently have " . $count . " resolved tickets";
      ?>
      </h2>
      </div>
      </div>
      <?php
        $sql = "SELECT * FROM submits 
                INNER JOIN ticket ON ticket.Ticket_ID = submits.Ticket_ID
                WHERE empID = '$empid' AND Status='solved'";
        $result = mysqli_query($conn, $sql);
        $tickets = array();
        while($row = mysqli_fetch_array($result)){
          $title = $row['Title'];
          $description = $row['Description'];
          $time = $row['time_submitted'];

          echo "<div class= 'ticket'>
                  <div class = 'ticket-body'>
                      $title
                    <div class = 'ticket-date'>
                      $time
                    </div>
                    <div class = 'ticket-information'>
                      $description
                    </div>
                  </div>
                </div>";
        }
        
      ?>
     
         
      
     <script src="index.js"></script>
    </body>
</html>
