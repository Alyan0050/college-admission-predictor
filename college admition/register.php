<!-- register.php -->
<?php
    // Database connection
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'college_admission';

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['Register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username already exists
        $check_query = "SELECT * FROM students WHERE username='$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Username already exists. Please choose another.";
        } else {
            // Insert new student into database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO students (username, password) VALUES ('$username', '$hashed_password')";

            if (mysqli_query($conn, $insert_query)) {
        header("Location:student_login.php");
                
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
?>
