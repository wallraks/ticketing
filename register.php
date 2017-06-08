<?php require ('connect.php');
// If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
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
            <div class="col-md-6 col-md-offset-3 panel panel-warning">
              <form class="form  " method="POST" >
                <!-- display the status message -->
                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

                <h4 class="form-signin-heading text-center">PLEASE REGISTER</h4>
                <hr>
                <div class="form-group">
                	   <label for="inputUsername" class="sr-only">User Name</label>
                	  <input type="text" name="username" class="form-control" placeholder="Username" required>
              	</div>
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
                </div>
                <div class="text-center form-group">
                  <button class="btn btn-lg btn-primary btn-default" type="submit">Register</button>
                  <a class="btn btn-lg btn-primary btn-warning" href="login.php">Login</a>
                </div>
              </form>
            </div>

          </div>
    </div>
  </body>
</html>
