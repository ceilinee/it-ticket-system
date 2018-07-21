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
    $specialization = str_replace('_', '', $specialization);
    $specialization = $specialization . "_assignment";
    
  }
?>
<html lang="en">
    <head>
      <title>IT Ticket System</title>
      <meta name="description" content="The HTML5 Herald">
      <link rel="stylesheet" href="../index.css">
    </head>
    <body>
      <?php
      
      //display all the assigned tickets to the logged in technician
        include 'sidebar.php';
        $sql = "SELECT * FROM `{$specialization}`
                INNER JOIN ticket ON ticket.Ticket_ID = `{$specialization}`.Ticket_ID
                WHERE tID = '$tID'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $id = $row['Ticket_ID'];
          $title = $row['Title'];
          $description = $row['Description'];
          $time = $row['time_assigned'];

          echo "<div class= 'ticket'>
          <div class = 'ticket-body'>
            Ticket ID : $id <br/>
            Title : $title
            <div class = 'ticket-date'>
            Starting Date : $time
            </div>
            <div class = 'ticket-information'>
            Description : <br/>
            $description
            </div>
          </div>
          <div class = 'information'>
              <a class='status-button' href=\"resolve-ticket.php?id=$id\">
              Change to Complete
              </a>
          </div>
       </div>";
        }
      ?>


      
      <script src="index.js"></script>
    </body>
</html>
