<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Index</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
   </head>
   
   <body>
      <ul>
         <li><a class="active" href='index.php'>Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="show_all_tablets.php">List Tablets</a></li>
         <li><a href="insert.php">Insert New Product</a></li>
         <li><a href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
		  <h1>Welcome <?php echo $login_session; ?></h1> 
         <h1>Admin Dashboard</h1>
         <p>Please use the sidebar to navigate to the relevent sections</p>
      </div>
   </body>
</html>

