<!doctype html>
<?php
  require '../includes/dbh-inc.php';
  session_start();
  $email = $_SESSION['email'];
  $name = $_SESSION['firstname'];
  $sql = "SELECT * FROM employee WHERE Email = '$email'";
  $res = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_assoc($res)){
    $empid = $row['empID'];
    $_SESSION['empID'] = $empid;
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
        require 'sidebar.php';
      ?>
      <form action="../includes/process-ticket.php" method="POST">
        <div class= "new-ticket">
          <div class = "ticket-body">
            <h1>Customer Portal</h1>
            <h3>Welcome <?php echo $name . " " . $email ?> </h3> 
              <h1 class = "selected-user">New Ticket</h1>
              <textarea name="title" placeholder="Title" class= "text-box" rows= "2"></textarea>
              <textarea name="description" placeholder="Describe your problem" class= "text-box" rows= "7"></textarea>
                <div>
                  <select name="issue" class="dropdown">
                    <option value="Software">software</option>
                    <option value="General">general</option>
                    <option value="Hardware">hardware</option>
                    <option value="Change">change_request</option>
                    <option value="New">new_employee</option>
                    <option value="Network">network_issue</option>
                  </select>
                </div>
              <div>
                  <label>
                  <input type="checkbox" id="low" name="low" >
                    Low
                  </label>
                  <label>
                  <input type="checkbox" id="med" name="med" >
                    Medium
                  </label>
                  <label>
                  <input type="checkbox" id="high" name="high" >
                    High
                  </label>
              </div>
              <!--
              <button type="submit" name="submit ticket" class= "new-ticket-button">
                 Submit Ticket
              </button>
              -->
              <input type="submit" class="new-ticket-button" name="submit_ticket" value="Submit Ticket">
          </div>
        </div>
      <form>
      <script src="index.js"></script>
    </body>
</html>
