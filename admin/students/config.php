<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'tutor';
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo die("sorry your database is refueds or under contraction    :(");
}
?>