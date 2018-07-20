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
        $sql = "SELECT Ticket_ID FROM submits WHERE empID = '$empid'";
        $res = mysqli_query($conn, $sql);
        $tickets = array();
        while($row = mysqli_fetch_array($res)){
          $tickets[] = $row['Ticket_ID'];
        }
      ?>
     
         <div class= "ticket">
           <div class = "ticket-body">
             Ticket Name
             <div class = "ticket-date">
             Starting Date
             </div>
             <div class = "ticket-information">
             Information
             </div>
           </div>
        </div>

        <div class= "ticket">
          <div class = "ticket-body">
            Ticket Name
            <div class = "ticket-date">
            Starting Date
            </div>
            <div class = "ticket-information">
            Information
            </div>
          </div>
       </div>

       <div class= "ticket">
         <div class = "ticket-body">
           Ticket Name
           <div class = "ticket-date">
           Starting Date
           </div>
           <div class = "ticket-information">
           Information
           </div>
         </div>
      </div>
      
     <script src="index.js"></script>
    </body>
</html>
