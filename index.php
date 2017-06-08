<?php
  include 'connect.php';
  session_start();
  if(!isset($_SESSION['email']))
  {
      $_SESSION['logged-in'] = false;
      header("Location: login.php");
  }
  else{
    $_SESSION['logged-in'] = true;
      $email = $_SESSION['email'];
   ?>
   <!DOCTYPE html>
   <html>
     <head>
       <meta charset="utf-8">
       <title>ticketing_2</title>
       <link rel="stylesheet" href="css/bootstrap-theme.min.css" media="screen" title="no title" charset="utf-8">
       <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
       <link rel="stylesheet" href="css/style.css">
       <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CORIDO.CO.KE</a>
             </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              <ul class="nav navbar-nav nav-pills navbar-right">
                <li><a>Welcome
                  <?php
                    $email = $_SESSION['email'];
                    echo $email;
                  ?>
              </a></li>
                <li><a href="logout.php" class=" ">Log Out</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
     </head>
     <body>
        <div class="container wrapper">
          <div class="col-md-3 sides">
            <h1 class="">~STATS~</h1>
            <hr>
              <div class="">
                  <h4>TOTAL  USERS:
                    <?php
                    $query_total= "SELECT * FROM ticketing_2";
                      if ($result=mysqli_query($conn,$query_total))
                        {
                        // Return the number of rows in result set
                        $rowcount=mysqli_num_rows($result);
                        printf($rowcount);
                        // Free result set
                        mysqli_free_result($result);
                        }
                     ?>
                  </h4>
              </div>
              <hr>
              <div class=" ">
                  <h4>VERIFIED  USERS:
                    <?php
                      $query_total= "SELECT * FROM ticketing_2 WHERE status='Used'";
                        if ($result=mysqli_query($conn,$query_total))
                          {
                          // Return the number of rows in result set
                          $rowcount=mysqli_num_rows($result);
                          printf($rowcount);
                          // Free result set
                          mysqli_free_result($result);
                          }
                     ?>
                  </h4>
              </div>
              <hr>
              <div class=" ">
                  <h4>Oliver:
                    <?php
                      $query_oliva= "SELECT * FROM ticketing_2 WHERE  verified_by='oliver.barasa9@gmail.com'";
                        if ($result_oliva=mysqli_query($conn,$query_oliva))
                          {
                          // Return the number of rows in result set
                          $rowcount_oliva=mysqli_num_rows($result_oliva);
                          printf($rowcount_oliva);
                          // Free result set
                          mysqli_free_result($result_oliva);
                          }
                     ?>
                  </h4>
              </div>
          </div>
          <div class="col-md-9">
            <div class=" ">
              <br>
                <div class="row">
                    <input id="searchInput" name="search" class="form-control" placeholder="Searching..."/>
                </div>
                <br>

                <table class="table" border="0">
                    <thead>
                        <tr>
                            <th>No:</th>
                            <th>Name</th>
                            <th>Ticket No.</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php

                       //Querying the database
                       $query="SELECT * FROM ticketing_2";
                       $result = $conn->query($query);
                     if ($result->num_rows > 0){
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                           echo "<tr>
                             <td> " . $row["id"]. " </td>
                             <td>" . $row["name"]." </td>
                             <td>" . $row["code"]. "</td>
                             <td> " . $row["amount"]. " </td>
                             <td>" . $row["type"]. " </td>
                             <td>" . $row["status"].  "</td>
                             <td>
                               <button class='btn btn-sm btn-info checking_button' data-ticket_id='". $row["id"] ."' data-ticket_code='". $row["code"] ."' >Check In</button>

                               <!--
                               <input type=\"submit\" value=\"Check In\" name=\"submit\" class=\"checking_button\"/>
                               -->

                             </td>
                           <tr>";
                       }
                     }
                     ?>

                     </tbody>
                </table>
            </div>
          </div>
       </div>

       <!-- <script src="js/bootstrap.js" charset="utf-8"></script> -->
       <script src="js/jquery.min.js" charset="utf-8"></script>
       <script src="js/bootstrap.min.js" charset="utf-8"></script>
       <script src="js/filterForTable.js" charset="utf-8"></script>
       <!-- <script src="js/filter.js" charset="utf-8"></script> -->
       <script>
           $('body').on('click', 'td button.checking_button', function(){
              var ticket_id = $(this).data('ticket_id');
              var ticket_code = $(this).data('ticket_code');
              var data = {
                id:ticket_id,
                code:ticket_code,
                checkin:1,
              }
              var callback = function(response){
                console.log(response);
                if(response.status == 'success'){
                  window.location.reload();
                }
                else{
                  // alert(response.msg);
                }
              }
              $.post('process.php', data, callback, 'json');
           });
       </script>
       <script>
           $('table').filterForTable();
       </script>

     </body>
   </html>
<?php } ?>
