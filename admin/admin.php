<!doctype html>
<?php
  require '../includes/dbh-inc.php';
  session_start();
  $email = $_SESSION['email'];
  $id = $_SESSION['id'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $sql = "SELECT * FROM technician WHERE Email = '$email'";
  $res = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_array($res)){
    $tID = $row['tID'];
    $_SESSION['tID'] = $tID;
    $specialization = $row['Specialization'];
    $_SESSION['specialization'] = $specialization;
  }
?>
<html lang="en">
    <head>
      <title>Admin Portal</title>
      <meta name="description" content="The HTML5 Herald">
      <link rel="stylesheet" href="../index.css">
    </head>
    <body>
      <?php
        include 'sidebar.php';
      ?>

        <div class="new-ticket">
          <h1>Admin Portal</h1>
          <h3>Welcome <?php echo "IT Technician " . $firstname . " " . $lastname ?> </h3> 
          <h3>
          <?php
            //display the number of unassigned tickets 
            $sql = "SELECT COUNT(status) from ticket where assigned = 0 and status = 'unsolved' and issue_type = '$specialization'";
            $res = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_assoc($res)){
              $count = $row['COUNT(status)'];
            }
            echo "There are currently " . $count . " unassigned tickets availible";
         
          ?>
          </h3>
        </div>
      <!-- display all the unassigned tickets here -->
      <?php
        $sql = "SELECT * FROM submits 
                INNER JOIN ticket ON ticket.Ticket_ID = submits.Ticket_ID
                WHERE Status = 'unsolved' AND Assigned = 0 AND Issue_type = '$specialization' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $id = $row['Ticket_ID'];
          $title = $row['Title'];
          $description = $row['Description'];
          $time = $row['time_submitted'];
          $priority = $row['Priority'];

          echo "<div class= 'ticket'>
                  <div class = 'ticket-body'>
                    Ticket ID : $id <br/>
                    Title : $title 
                    <div class = 'ticket-date'>
                    Time Submitted : $time
                    Priority : $priority
                    </div>
                    <div class = 'ticket-information'>
                    Description : <br/> 
                    $description
                    </div>
                  </div>
                  <div class = 'information'>
                  <a class='status-button' href=\"assign-ticket.php?id=$id\">
                    Assign to me
                  </a>
                  </div>
                </div>";
        }
      ?>  

      </div>
      <script src="index.js"></script>
    </body>
</html>
