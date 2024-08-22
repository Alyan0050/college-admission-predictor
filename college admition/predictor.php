<!-- predictor.php -->
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

    if (isset($_POST['submit'])) {
        $fsc_marks = $_POST['fsc_marks'];
        $mdcat_score = $_POST['mdcat_score'];

        // Query to get colleges based on criteria
        $sql = "SELECT * FROM colleges WHERE fsc_cutoff <= $fsc_marks AND mdcat_cutoff <= $mdcat_score";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Colleges for You:</h2>";
            echo "<table>";
            echo "<tr><th>Name</th><th>City</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['city'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No colleges match your criteria.";
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College Admission Predictor</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="container">
        <h2>College Admission Predictor</h2>
        <form action="predictor.php" method="post">
        <label for="">FSc Marks</label>
            <input type="number" name="fsc_marks" placeholder="Enter FSc Marks" step="0.01" required>
            <label for="">MDCAT Score</label>
            <input type="number" name="mdcat_score" placeholder="Enter MDCAT Score" step="0.01" required>
            <button type="submit" name="submit">Predict Colleges</button>
          
            <p>Go to Homepage <a href="welcome.php">Homepage</a></p>
        </form>
    </div>
</body>
</html>
