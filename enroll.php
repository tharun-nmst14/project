<?php
session_start();
include("db_conn.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $gender = $_POST['gender'];
    $num = $_POST['num'];
    $gmail = $_POST['gmail'];
    $pass = $_POST['pass'];
    $photo = $_POST['photo'];

    // Subjects handling
    $fee=0;
    $subjects = [];
    if (isset($_POST['oops'])) {
        $subjects[] = "OOPs";
        $fee=$fee+100;
    }
    if (isset($_POST['web'])) {
        $subjects[] = "WEB";
        $fee=$fee+200;
    }
    if (isset($_POST['daa'])) {
        $subjects[] = "DAA";
        $fee=$fee+300;
    }
    if (isset($_POST['py'])) {
        $subjects[] = "Python";
        $fee=$fee+400;
    }

    // Convert subjects array to comma-separated string
    $subjectsString = implode(", ", $subjects);

    // Data validation
    if (!empty($gmail) && !empty($pass) && is_numeric($num)) {
        $query = "INSERT INTO info (name, id, year, semester, gender, number, pass, gmail, photo, subjects,fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssisssssssi", $name, $id, $year, $sem, $gender, $num, $pass, $gmail, $photo, $subjectsString,$fee);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error in registration');</script>";
        }
    } else {
        echo "<script>alert('Please enter valid information');</script>";
    }
}
?>
