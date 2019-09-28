<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Insertion</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
   </head>
   <body>
      <!--Start of Nav Bar-->
      <ul>
         <li><a href='index.php'>Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="show_all_tablets.php">List Tablets</a></li>
         <li><a class='active' href="insert.php">Insert New Product</a></li>
         <li><a href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>
      <!--End of Nav Bar-->
      <!--Start of insertion form-->
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
         <H1 class='form_heading'>Please use this form to insert new products into our system</H1>
         <H2 class='form_heading'><u>If you are unsure about our insertion etiquette, please refer to this guidebook</u></H2>
         <form method ='post' name="insert_form" action="database_insert.php">
            <label for='p_model'>Model</label>
            <br>
            <select name="p_model">
            <?php
                  require('config.php');
                  
                  //Populate Dropdown
                  $get_model = "SELECT * FROM Model_Table;";
                  
                  $model_dropdown = mysqli_query($conn, $get_model);
                  
                  if(mysqli_num_rows($model_dropdown) > 0){
                     while($row = mysqli_fetch_assoc($model_dropdown)){
                        ?>
               <option value="<?php echo $row['Model_NumberID']; ?>">
                  <!--Value to be outputted to the dropdown-->
                  <?php echo $row['Model_Name']; ?>
               </option>
               <?Php
                  }
                  }?>
            </select>
            <br>
            <label for='p_colour'>Colour</label>
            <br>
            <select name="p_colour">
            <?php
                  require('config.php');
                  
                  //Populate Dropdown
                  $get_colour = "SELECT * FROM Colour_Table;";
                  
                  $colour_dropdown = mysqli_query($conn, $get_colour);
                  
                  if(mysqli_num_rows($colour_dropdown) > 0){
                     while($row = mysqli_fetch_assoc($colour_dropdown)){
                        ?>
               <option value="<?php echo $row['ColourID']; ?>">
                  <!--Value to be outputted to the dropdown-->
                  <?php echo $row['Colour']; ?>
               </option>
               <?Php
                  }
                  }?>
            </select>
            <br>
            <label for='p_storage'>Storage</label>
            <br>
            <select name="p_storage">
            <?php
                  require('config.php');
                  
                  //Populate Dropdown
                  $get_storage = "SELECT * FROM Storage_Table;";
                  
                  $storage_dropdown = mysqli_query($conn, $get_storage);
                  
                  if(mysqli_num_rows($storage_dropdown) > 0){
                     while($row = mysqli_fetch_assoc($storage_dropdown)){
                        ?>
               <option value="<?php echo $row['StorageID']; ?>">
                  <!--Value to be outputted to the dropdown-->
                  <?php echo $row['Storage']; ?>
               </option>
               <?Php
                  }
                  }?>
            </select>
            <br>
            <label for="Starting_Price">Starting Price</label>
            <br>
            <input type="number" name="Starting_Price" placeholder="Starting Price..." required>
            <br>
            <input type="submit" value="Submit">
         </form>
         <!--End of insertion form-->
      </div>
   </body>
</html>

