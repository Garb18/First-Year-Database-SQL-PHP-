<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Insert Results</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
   </head>
   <body>
      <!--Start of Nav Bar-->
      <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="Show_all_tablets.php">List Tablets</a></li>
         <li><a class='active' href="insert.php">Insert New Product</a></li>
         <li><a href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>
      <!--End of Nav Bar-->
      <!--Start of insertion form-->
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
      <?php
         //Connection
         require('config.php');
         
         //Variables
         $mNumber = $_POST['p_model'];
         $mNumber = mysqli_real_escape_string($conn, $mNumber);

         $Colour = $_POST['p_colour'];
         $Colour = mysqli_real_escape_string($conn, $Colour);
         
         $Storage = $_POST['p_storage'];
         $Storage = mysqli_real_escape_string($conn, $Storage);

         $sPrice = $_POST['Starting_Price'];
         $sPrice = mysqli_real_escape_string($conn, $sPrice);
         
         $dupesql = "SELECT * FROM Factory_Details_Table WHERE (Model_NumberID = '$mNumber' AND ColourID = '$Colour' AND StorageID = '$Storage')";

         $dupecheck = mysqli_query($conn, $dupesql);

         if (mysqli_num_rows($dupecheck) > 0) {
            die('<H1 class = form_heading>Could not insert data, entry already exists!</H1>' .  "</H2>");
         }


         //SQL Query
         $sql =   "INSERT INTO Factory_Details_Table(Model_NumberID,ColourID,StorageID,Starting_Price) VALUES ('$mNumber','$Colour','$Storage','$sPrice');";

         //Run Query
         $result = mysqli_query($conn, $sql);

         //Output Results
         if(!$result) {
            die('<H1 class = form_heading>Could not insert data</H1>'  .  "<br><H2 class = error_heading>"  .  mysqli_error($conn)  .  "</H2>");
         }
         echo "<H1 class = form_heading>New data was inserted. Please check the product list to double check correct insertion</H1>";
              
         //Close connection
         mysqli_close($conn);
         ?>
   </body>
</html>