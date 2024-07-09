<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: lightyellow;
            padding: 50px;
            border-radius: 10px;
            width: 50%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h4 {
            text-align: center;
        }
        h1 {
            color: blue;
        }
        h4 {
            margin-bottom: 20px;
        }
        .user-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
        }
        .user-details img {
            border-radius: 50%;
            margin-left: 20px;
            width: 120px;
            height: 120px;
        }
        table {
            width: 100%;
        }
        table td {
            padding: 5px;
        }
        strong {
            color: brown;
        }
        button {
            height: 30px;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        hr {
            border: none;
            height: 1px;
            background-color: #ccc;
        }
        .instructions {
            margin-top: 20px;
        }
        .output-container {
            padding: 20px;
            padding-top: 70px;
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
                 
                echo '<div style="text-align: center;">';
                echo '<img src="rgukt.jpeg" height="50px" width="50px" style="vertical-align: middle; margin-right: 10px;">';
                echo '<span style="font-size: 20px; font-weight: bold; color:brown;">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE TECHNOLOGIES, BASAR</span>';
                echo '</div>';
                echo '<hr>';

                foreach ($result as $row) {
                    echo '<div class="user-details">';
                    echo '<div class="details">';
                    echo '<h1>HALL TICKET</h1>';
                    echo '<table>';
                    echo '<tr><td><strong>Student Name:</strong></td><td>'.$row['name'].'</td></tr>';
                    echo '<tr><td><strong>Id:</strong></td><td>'.$row['id'].'</td></tr>';
                    echo '<tr><td><strong>Year:</strong></td><td>'.$row['year'].'</td></tr>';
                    echo '<tr><td><strong>Semester:</strong></td><td>'.$row['semester'].'</td></tr>';
                    echo '<tr><td><strong>Gender:</strong></td><td>'.$row['gender'].'</td></tr>';
                    echo '<tr><td><strong>Phone Number:</strong></td><td>'.$row['number'].'</td></tr>';
                    echo '<tr><td><strong>Email:</strong></td><td>'.$row['gmail'].'</td></tr>';
                    echo '<tr><td><strong>Password:</strong></td><td>'.$row['pass'].'</td></tr>';
                    echo '<tr><td><strong>Course Fee:</strong></td><td>'.$row['fee'].'</td></tr>';
                    echo '<tr><td><strong>Date:</strong></td><td>'.date("Y-m-d").'</td></tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '<img src="'.$row['photo'].'" alt="Student Photo">';
                    echo '</div>';
                    
                    // Table for subjects and signature
                     
                    echo '<table border="1">';
                    echo '<tr><th>Subject</th><th>Signature</th></tr>';
                    $subjectsArray = explode(", ", $row['subjects']);
                    foreach ($subjectsArray as $subject) {
                        echo '<tr><td>'.$subject.'</td><td></td></tr>';
                    }
                    echo '</table>';
                }
                echo '<button onclick="window.print()">Print</button>';
                echo '<div class="instructions">';
                echo '<h3>Instructions:</h3>';
                echo '<hr>';
                echo '<h6>Arrival Time: Arrive at the examination center at least 30 minutes before the scheduled start time.<br>';
                echo 'Identification: Carry a valid photo ID and this hall ticket to the examination center.<br>';
                echo 'Stationery: Bring necessary stationery items such as pens, pencils, erasers, and a non-programmable calculator (if permitted).<br>';
                echo 'Prohibited Items: Mobile phones, smartwatches, any electronic gadgets, and written materials are strictly prohibited.<br>';
                echo 'Seating: Follow the seating arrangement as displayed at the entrance of the examination hall.<br>';
                echo 'Behavior: Maintain silence inside the examination hall.<br>';
                echo 'Answer Scripts: Use only the provided answer booklets.</h6>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p class="error-message">Invalid email or password</p>';
            }
        }
        ?>
    </div>
</body>
</html>
