<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Delete Form</title>
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
         <li><a class='active' href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
      </ul>
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
         <H1 class ='form_heading'>Please use this form to delete outdated/incorrect products from our system</H1>
         <H2 class='form_heading'><u>If you are unsure about our deletion etiquette, please refer to this guidebook</u></H2>
         <form method ='post' name="delete_form" action="database_delete.php">
            <label for='p_type'> Product Type </label>
            <br>
            <select name="p_type" required>
               <option value="Phones_Table">Phone</option>
               <option value="Tablet_Table">Tablet</option>
            </select>
            <br>
            <label for='p_delete'>Product to be deleted</label>
            <br>
            <input type="text" name="p_delete" placeholder="Insert product ID here..." required>
            <br>
            <input type="submit" value="Submit" onclick="return confirm('Are you sure? There is no way to revert this action');">
         </form>
      </div>
   </body>
</html>