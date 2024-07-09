<?php
session_start();
include("db_conn.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $gmail = $_POST['gmail'];
    $pass = $_POST['pass'];

    // Data validation
    if (!empty($gmail) && !empty($pass)) {
        $query = "DELETE FROM student WHERE gmail = ? AND pass = ?";
        $stmt = mysqli_prepare($con, $query);
        
        // Bind the parameters to the query
        mysqli_stmt_bind_param($stmt, "ss", $gmail, $pass);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error in deletion');</script>";
        }
    } else {
        echo "<script>alert('Please enter valid information');</script>";
    }
}
?>
