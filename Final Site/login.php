<?php
    // Connection information
   include("config.php");
   // Starts session
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

      // Checks if user exists
      $sql = "SELECT UserID FROM User_Table WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;

         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Please Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    </head>

    <body>
        <div style="padding-top:10%;height:1000px;">

            <form method='post' name='login_form'>
                <label for='username'>Username</label>
                <br>
                <input type="text" name="username" placeholder="garb1_xxxx..." required>
                <br>
                <label for='password'>Password</label>
                <br>
                <input type="password" name="password" required>
                <br>
                <input type="submit" value="Login">
            </form>
            <div class="error_heading">
                <?php echo $error; ?>
            </div>

            <!-- Button to open the modal -->
            <div style="width: 100%; text-align: center;">
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Don't have an account? Sign Up!</button>
            </div>

            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" method="POST" action="signup.php">
                    <div class="container">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="myusername"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="myusername" required>

                        <label for="mypassword"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="mypassword" required>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('id01');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </div>
    </body>

    </html>