<?php
   include('config.php');
   session_start();
   
   //Checks session exists
   $user_check = $_SESSION['login_user'];
   
   //Selects user
   $ses_sql = mysqli_query($db,"SELECT username from User_Table WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //Assigns session variable
   $login_session = $row['username'];
   
   //If session is not active, redirect to login page
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>