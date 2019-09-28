<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Update results</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
   </head>
   <body>
      <!--Start of Nav Bar-->
      <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="show_all_tablets.php">List Tablets</a></li>
         <li><a href="insert.php">Insert New Product</a></li>
         <li><a href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a class='active' href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>
      <!--End of Nav Bar-->
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
         <?php
            //Connection
            require('config.php');
            
            //Variables
            $type = $_POST['p_type'];
            $update = $_POST['p_update'];
            $stock = $_POST['p_stock'];
            $ID;
            
            //Switch statement for productID
            switch ($type) {
                case "Tablet_Table":
                    $ID = 'TabletID';
                    break;
                case "Phones_Table":
                    $ID = 'PhoneID';
                    break;
            }
            
            //Escape special characters
            //$type = mysqli_real_escape_string($conn, $type);
            $update = mysqli_real_escape_string($conn, $update);
            //$stock = mysqli_real_escape_string($conn, $stock);
            
            //SQL Query
            $sql = "UPDATE $type SET Stock = $stock WHERE $ID = '$update';";
            
            //Run Query
            $result = mysqli_query($conn, $sql);
            
            //Output Results
            if(!$result) {
                die('<H1 class = form_heading>Could not update data</H1>'  .  "<br><H2 class = error_heading>"  .  mysqli_error($conn)  .  "</H2>");
             }
             echo "<H1 class = form_heading>Updated data successfully</H1>";
                  //Close connection
                  mysqli_close($conn);
            ?>
      </div>
   </body>
</html>

