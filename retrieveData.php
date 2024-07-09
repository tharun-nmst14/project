<?php
include("db_conn.php");
$query="select * from info";
$result=mysqli_query($con,$query);

echo "<h4>Print all Candidates";
echo '<button onclick="window.print()">Print All</button>';
echo "<br><hr>";
echo "<center>";
foreach($result as $row)
{    echo "<center>"; 
    echo '<img src="'.$row['photo'].'" height="100px" width="100px" align=center>';
    
                    echo "<p><strong>Student Name:</strong> ".$row['name']."</p>";
                    echo "<p><strong>Id:</strong> ".$row['id']."</p>";
                    
                    echo "<p><strong>Year:</strong> ".$row['year']."</p>";
                    echo "<p><strong>Semester:</strong> ".$row['semester']."</p>";
                    echo "<p><strong>Gender:</strong> ".$row['gender']."</p>";
                    echo "<p><strong>Phone Number:</strong> ".$row['number']."</p>";
                    echo "<p><strong>Email:</strong> ".$row['gmail']."</p>";
                    echo "<p><strong>Password:</strong> ".$row['pass']."</p>";
                    echo "<p><strong>Course Fee:</strong> ".$row['fee']."</p>";

                    $subjectsArray = explode(", ", $row['subjects']);
                    echo "<p><strong>Subjects:</strong> " . implode(', ', $subjectsArray) . "</p>";

                    
                    echo "<hr>";
}           

?>