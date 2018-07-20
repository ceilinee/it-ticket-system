<!doctype html>
<?php
  require '../includes/dbh-inc.php';
  session_start();
  $user = $_SESSION['email'];
  $id = $_SESSION['id'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
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
           <div class = "information">
             <button id="myBtn" class = "status-button">
               Assign to me
             </button>
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
          <div class = "information">
            <button id="myBtn" class = "status-button">
              Assign to me
            </button>
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
           <div class = "information">
             <button id="myBtn" class = "status-button">
               Assign to me
             </button>
           </div>
        </div>

      </div>
      <script src="index.js"></script>
    </body>
</html>
