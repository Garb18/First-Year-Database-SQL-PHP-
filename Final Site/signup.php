<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    <title>Please wait...</title>
</head>

<body>
    <div style="padding:1px 16px;height:1000px;">
        <?php
//Connection
require('config.php');

//Variables
$myusername = mysqli_real_escape_string($conn, $_POST['myusername']);
$mypassword = mysqli_real_escape_string($conn, $_POST['mypassword']);

$dupesql = "SELECT * FROM User_Table WHERE (username = '$myusername')";

$dupecheck = mysqli_query($conn, $dupesql);

if (mysqli_num_rows($dupecheck) > 0) {
    header('refresh: 3; url=login.php'); // redirect the user after 3 seconds
    die('<H1 class = form_heading>Could not create user. Username already exists! You will be redirected in three seconds.</H1>');
}

//SQL Query
$sql = "INSERT INTO User_Table(username, password) VALUES ('$myusername', '$mypassword');";

//Run Query
$result = mysqli_query($conn, $sql);

//Output Results
echo "<H1 class = form_heading>New user created! You may now log in. You will be redirected in three seconds.</H1>";

header('refresh: 3; url=login.php'); // redirect the user after 3 seconds

//Close connection
mysqli_close($conn);
?>
   </div>
</body>

</html>