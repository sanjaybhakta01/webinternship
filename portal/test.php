<?php 
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
        $result = $con->query("select skillset from skill");
    echo "<html>";
    echo "<body>";
    echo "<select name='workers'>";
    while ($row = $result->fetch_assoc()) {
        unset($skillset);
        $skillset = $row['skillset'];
        echo '<option value=" '.$skillset.'"  >'.$skillset.'</option>';
    }
    echo "</select>";
    echo "</body>";
    echo "</html>";
?>