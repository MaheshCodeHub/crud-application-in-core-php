<?php
include('dbcon.php');

if (isset($_POST['add_students'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('location:index.php?message=you need to add first name');
        exit(); // Add an exit statement after header redirection
    } else {
        // Use double quotes for the query string to properly insert variables
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection)); // Pass the connection parameter to mysqli_error
        } else {
            header('location:index.php?insert_message=Save into db');
            exit(); // Add an exit statement after header redirection
        }
    }
}
?>
