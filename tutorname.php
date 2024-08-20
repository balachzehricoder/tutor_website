<?php
include("config.php");
if(isset($_POST["query"]))

{

$output = '';

$query = "SELECT * FROM tutor_info WHERE Name LIKE '%".$_POST["query"]."%'";
$result = mysqli_query($conn, $query);
$output = '<ul>';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<li>' .$row ["Name"].'</li>';
    }

}else{
    $output .='<li> techer is not found ):</li>';
}
$output .= '</ul>';
echo $output;
}



?>