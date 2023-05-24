<?php 
$server_name = "localhost";
$user_name = "root";
$password = "abdu";
$db_name = "Confrence";


$conn = mysqli_connect($server_name, $user_name, $password,$db_name);

if (!$conn) {

  die("Connection failed: " . mysqli_connect_error());
}else{

}

?>