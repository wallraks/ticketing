
<?php
  include 'connect.php';
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Ticketing</title>
     <link rel="stylesheet" href="css/bootstrap-theme.min.css" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" href="css/custom.css" media="screen" title="no title" charset="utf-8">
   </head>
   <body>
     <div id="jquery-script-menu">
       <div class="jquery-script-center">
           <h3 class="text-center"><strong>VERIFICATION SYSTEM</strong></h3>
       </div>

         .
       <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. At id porro earum, qui laudantium tempore cupiditate, nihil quasi delectus illo adipisci consectetur, esse nam nulla, nostrum! Quidem accusantium omnis, adipisci. -->
     </div>

     <div class="container">
       <ul class="nav nav-tabs" id="myTab">
  			  <li class="active"><a data-target="#home" data-toggle="tab">Check In</a></li>
  			  <li><a data-target="#profile" data-toggle="tab">Checked In</a></li>
  			  <li><a data-target="#messages" data-toggle="tab">Unused Tickets</a></li>
  			  <li><a data-target="#settings" data-toggle="tab">Stats</a></li>
  			</ul>
  			<div class="tab-content">
  			  <div class="tab-pane active" id="home">
           <div class="col-md-12">
             <div class="content">
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
                        $query="SELECT * FROM ticketing";
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
  			  <div class="tab-pane" id="profile">Profile</div>
  			  <div class="tab-pane" id="messages">Message</div>
  			  <div class="tab-pane" id="settings">Settings</div>
  			</div>
     </div>

     <!-- <script src="js/bootstrap.js" charset="utf-8"></script> -->
     <script src="js/jquery.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.min.js" charset="utf-8"></script>
     <script src="js/filterForTable.js" charset="utf-8"></script>
     <!-- <script src="js/filter.js" charset="utf-8"></script> -->
     <script>
       jQuery(function () {
         jQuery('#myTab a:first').tab('show')

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
              }else{
                alert(response.msg);
              }

            }

            $.post('process.php', data, callback, 'json');

         });

       });
     </script>
     <script>
         $('table').filterForTable();
     </script>

   </body>
 </html>
