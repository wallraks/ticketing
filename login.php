<?php
//Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
  if ($count == 1){
   $_SESSION['email'] = $email;
   while($row = $result->fetch_assoc()){
     $id = $row["id"];
     $username=$_SESSION['username'];
   }

  }
  else{
  //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
  $fmsg = "Invalid Login Credentials.";
  }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  header("Location: index.php");
  // echo "Hi " . $id ;
  // echo "This is the Members Area";
  // echo "<a href='logout.php'>Logout</a>";
}
else{
//3.2 When the user visits the page first time, simple login form will be displayed.

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <div class="container ">
          <div class="row col-md-8 col-md-offset-2">
            <!-- <div class="col-md-6">
              <h1 class="text-center">Login in using your account details</h1>

            </div> -->
            <div class="col-md-6 col-md-offset-3 panel panel-success">
              <form class="form  " method="POST" >
                <!-- display the status message -->
                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

                <h4 class="form-signin-heading text-center">Login</h4>
                <hr>
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-lg btn-primary btn-default" type="submit">Login</button>
                  <a class="btn btn-lg btn-primary btn-warning" href="register.php">Register</a>

                </div>
              </form>
            </div>

          </div>
    </div>
  </body>
</html>
<?php } ?>
