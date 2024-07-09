<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-color:lightblue;
        }
        div {
            height: auto;
            width: 60%;
            background-color: lightyellow;
            margin: 20%;
            margin-top:5%;
            padding-top:5px;
             border-radius:10px;
             padding-bottom:1px;
        }
        p {
            color: blue;
        }
        h1 {
            color: red;
             
        }
        strong {
            color: brown;
        }
        button{
            height:25px;
        }
        .head{
            height:10px;
            background-color:green:
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include("db_conn.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $gmail = $_POST['gmail'];
            $pass = $_POST['pass'];

            // Use prepared statement to prevent SQL injection
            $query = "SELECT * FROM info WHERE gmail = ? AND pass = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $gmail, $pass);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['gmail'] = $gmail; // Store email in session for future use
                echo '<div class="output-container">';
                 
                echo "<center>";
                echo '<img src="rgukt.jpeg" height="50px" width="50px">';
                echo "</center>";
                echo "<h4>RAJIV GANDHI UNIVERSITY OF KNOWLEDGE TECHNOLOGIES,BASAR</h4>";
                echo "<hr>";
                
                

                foreach ($result as $row) {
                    // echo "<center>";
                    
                    echo "<div class='user-details'>";
                    echo "<h1>HALL TICKET</h1>";
                    echo '<img src="'.$row['photo'].'" height="100px" width="100px">';
                    echo "<p><strong>Student Name:</strong> ".$row['name']."</p>";
                    echo "<p><strong>Id:</strong> ".$row['id']."</p>";
                    echo "<p><strong>Year:</strong> ".$row['year']."</p>";
                    echo "<p><strong>Semester:</strong> ".$row['semester']."</p>";
                    echo "<p><strong>Gender:</strong> ".$row['gender']."</p>";
                    echo "<p><strong>Phone Number:</strong> ".$row['number']."</p>";
                    echo "<p><strong>Email:</strong> ".$row['gmail']."</p>";
                    echo "<p><strong>Password:</strong> ".$row['pass']."</p>";
                    echo "<p><strong>Course Fee:</strong> ".$row['fee']."</p>";

                    // Display selected subjects
                    $subjectsArray = explode(", ", $row['subjects']);
                    echo "<p><strong>Subjects:</strong> " . implode(', ', $subjectsArray) . "</p>";

                     // Display current date
                     echo "<p><strong>Date:</strong> " . date("Y-m-d") . "</p>";
                     
                    echo '<button onclick="window.print()">Print</button>';
                     
                    echo "</div>";
                }
                echo "<h3>Instructions:</h3><hr>";
                echo "<h6>Arrival Time: Arrive at the examination center at least 30 minutes before the scheduled start time.<br>

Identification: Carry a valid photo ID and this hall ticket to the examination center.<br>

Stationery: Bring necessary stationery items such as pens, pencils, erasers, and a non-programmable calculator (if permitted).<br>

Prohibited Items: Mobile phones, smartwatches, any electronic gadgets, and written materials are strictly prohibited.<br>

Seating: Follow the seating arrangement as displayed at the entrance of the examination hall.<br>

Behavior: Maintain silence inside the examination hall.<br>

Answer Scripts: Use only the provided answer booklets.</h6>";
 
echo '</div>';
            } else {
                echo "<p class='error-message'>Invalid email or password</p>";
            }
        }
        ?>
    </div>
</body>
</html>
