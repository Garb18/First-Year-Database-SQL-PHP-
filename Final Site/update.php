<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Update Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
     </head>
   <body>
      <ul>
         <li><a href='index.php'>Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="show_all_tablets.php">List Tablets</a></li>
         <li><a href="insert.php">Insert New Product</a></li>
         <li><a href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a class='active' href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>

      <div style="margin-left:15%;padding:1px 16px;height:1000px;">

         <H1 class ='form_heading'>Please use this form to update stock levels of our products in our system</H1>
         <H2 class='form_heading'><u>If you are unsure about our update etiquette, please refer to this guidebook</u></H2>
         
         <form method ='post' name="update_form" action="database_update.php">
            <label for='p_type'> Product Type </label>
            <br>
            <select name="p_type">
               <option value="Phones_Table">Phone</option>
               <option value="Tablet_Table">Tablet</option>
            </select>
            <br>
            <label for='p_update'>Product to be updated</label>
            <br>
            <input type="text" name="p_update" placeholder="Insert product ID here..." required>
            <br>
            <label for='p_stock'>New stock level</label>
            <br>
            <input type="text" name="p_stock" placeholder="Insert new stock level here..." required>
            <br>
            <input type="submit" value="Submit">
         </form>
      </div>
   </body>
</html>

