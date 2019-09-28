<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Phone List</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
   </head>
   <body>
      <!--Start of Nav Bar-->
      <ul>
         <li><a href='index.php'>Home</a></li>
         <li><a href="show_all_phones.php">List Phones</a></li>
         <li><a href="show_all_tablets.php">List Tablets</a></li>
         <li><a href="insert.php">Insert New Product</a></li>
         <li><a class='active' href="model_check.php">Check Models</a></li>
         <li><a href='delete.php'>Delete Record</a></li>
         <li><a href='update.php'>Update Record</a></li>
         <li><a href='logout.php'>Log Out</a></li>
         
      </ul>
      <div style="margin-left:15%;padding:1px 16px;height:1000px;">
         <?php
            //Connection
            require('config.php');
            
            //SQL Query
            $sql = 'CALL show_all_models();';
            
            //Run Query
            $result = mysqli_query($conn, $sql);
            
            //Output Results
            if (mysqli_num_rows($result) >0)
             {
                echo"<table>
                        <tr>
                            <th>Model NumberID</th>
                            <th>Manufactorer</th>
                            <th>Model Number</th>
                            <th>Model Name</th>
                        </tr>";
                
                while ($row = mysqli_fetch_assoc($result))
                 {
                    echo "<tr>";
                    echo "<td>" . $row['Model_NumberID'] . "</td>";
                    echo "<td>" . $row['Manufactorer'] . "</td>";
                    echo "<td>" . $row['Model_Number'] . "</td>";
                    echo "<td>" . $row['Model_Name'] . "</td>";
                    echo "</tr>";
                }
                echo"</table>";
            } else {
                echo'No results found!';
            }
            
            //Close connection
            mysqli_close($conn);
            ?>

            <?php
            //Connection
            require('config.php');
            
            //SQL Query
            $sql = 'SELECT * FROM Factory_Details_Table;';
            
            //Run Query
            $result = mysqli_query($conn, $sql);
            
            //Output Results
            if (mysqli_num_rows($result) >0)
             {
                echo"<table>
                        <tr>
                            <th>Factory DetailsID</th>
                            <th>Model NumberID</th>
                            <th>Colour</th>
                            <th>Storage</th>
                        </tr>";
                
                while ($row = mysqli_fetch_assoc($result))
                 {
                    echo "<tr>";
                    echo "<td>" . $row['Factory_DetailsID'] . "</td>";
                    echo "<td>" . $row['Model_NumberID'] . "</td>";
                    echo "<td>" . $row['ColourID'] . "</td>";
                    echo "<td>" . $row['StorageID'] . "</td>";
                    echo "</tr>";
                }
                echo"</table>";
            } else {
                echo'No results found!';
            }
            
            //Close connection
            mysqli_close($conn);
            ?>
      </div>
      <!--End of Nav Bar-->
   </body>
</html>

