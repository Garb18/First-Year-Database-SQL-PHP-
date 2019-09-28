<?php

// Connection details
$db_host = '172.16.11.22:3306';
$db_user = 'garb1_18';
$db_pass = 'Kzyg0^03';
$db_data = 'garb1_18_electronic_stock';


//Make connection
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_data);
if(!$conn){
    die('Connection error:' . mysqli_connect_error());
}
?>