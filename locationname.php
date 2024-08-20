<?php
include("config.php");
if(isset($_POST["query"]))

{

$output = '';

$query = "SELECT * FROM suburbs WHERE name LIKE '%".$_POST["query"]."%'";
$result = mysqli_query($conn, $query);
$output = '<ul>';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<li>' .$row ["name"].'</li>';
    }

}else{
    $output .='<li> location is not found ):</li>';
}
$output .= '</ul>';
echo $output;
}



?>