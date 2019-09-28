<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Delete results</title>
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
         <li><a class = 'active' href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>

      </ul>
      <!--End of Nav Bar-->
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
         <?php
            //Connection
            require('config.php');
            
            //Variables
            $type = $_POST['p_type'];
            $delete = $_POST['p_delete'];
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
            
            $type = mysqli_real_escape_string($conn, $type);
            $delete = mysqli_real_escape_string($conn, $delete);
            
            //SQL Query
            $sql = "DELETE FROM $type WHERE $ID = '$delete';";
            
            //Run Query
            $result = mysqli_query($conn, $sql);
            
            //Output Results
            if(!$result) {
                die('<H1 class = form_heading>Could not update data</H1>'  .  "<br><H2 class = error_heading>"  .  mysqli_error($conn)  .  "</H2>");
             }
             echo "<H1 class = form_heading>Data deleted successfully</H1>";
                  //Close connection
                  mysqli_close($conn);
            ?>
      </div>
   </body>
</html>