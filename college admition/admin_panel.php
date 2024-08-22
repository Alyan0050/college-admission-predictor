<!-- admin_panel.php -->

<?php


session_start();

    // Handle admin login validation here
    if (isset($_POST['login'])) {
        // Get the input values
        $username = $_POST['username'];
        $password = $_POST['password'];
      
        // Validate the input values
        if (empty($username) || empty($password)) {
          $error = "Please enter both username and password";
        } elseif (!validateUsername($username)) {
          $error = "Invalid username";
        } elseif (!validatePassword($password)) {
          $error = "Invalid password";
        } else {
          // Check if the username and password match the admin credentials
          $admin_username = 'alyan@admin'; // Replace with your admin username
          $admin_password = '12345678'; // Replace with your admin password
      
          if ($username === $admin_username && password_verify($password, $admin_password)) {
            // Login successful, redirect to admin dashboard
            header('Location: admin_panel.php');
            exit;
          } else {
            $error = "Invalid username or password";
          }
        }
      }
// Function to validate username
function validateUsername($username) {
    // You can add your own validation rules here
    // For example, check if the username is alphanumeric and has a minimum length
    return preg_match('/^[a-zA-Z0-9]{3,}$/', $username);
  }
  
  // Function to validate password
  function validatePassword($password) {
    // You can add your own validation rules here
    // For example, check if the password has a minimum length and contains at least one uppercase letter, one lowercase letter, and one digit
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
  }
  
  // Display the error message if there is one
  if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
  }
  // logout code
  if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php");
    exit();
}
    // Database connection
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'college_admission';
    
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Add College Form
    if (isset($_POST['add_college'])) {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $fsc_cutoff = $_POST['fsc_cutoff'];
        $mdcat_cutoff = $_POST['mdcat_cutoff'];

        $sql = "INSERT INTO colleges (name, city, fsc_cutoff, mdcat_cutoff) VALUES ('$name', '$city', '$fsc_cutoff', '$mdcat_cutoff')";

        if (mysqli_query($conn, $sql)) {
            echo "<div class='success-message'>College added successfully</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<div class='error-message'>Error: " . mysqli_error($conn) . "</div>";
        }
    }

    // Remove College
    if (isset($_POST['remove_college'])) {
        $college_id = $_POST['college_id'];

        $sql = "DELETE FROM colleges WHERE id=$college_id";

        if (mysqli_query($conn, $sql)) {
           
            echo "<div class='success-message'>College removed successfully</div>";
        } else {
            echo "<div class='error-message'>Error: " . mysqli_error($conn) . "</div>";
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        
        <h3>Add College</h3>
        <form action="admin_panel.php" method="post">
        <label for="">College Name</label> 
            <input type="text" name="name" placeholder="college name" required><br>
            <label for="">City</label><br> 
            <input type="text" name="city" placeholder="City" required><br>
            <label for="">FSc Cutoff</label> 
            <input type="number" name="fsc_cutoff" placeholder="FSc Cutoff"  required><br>
            <label for="">MDCAT Cutoff</label> 
            <input type="number" name="mdcat_cutoff" placeholder="MDCAT Cutoff"  required><br>
            <div class="button"> <button type="submit" name="add_college">Add College</button></div>
        </form>
       
        
        <h3>Remove College</h3>
        <form action="admin_panel.php" method="post">
            <input type="number" name="college_id" placeholder="College ID to Remove" required>
            <button type="submit" name="remove_college">Remove College</button>
        </form>
 
        <form action="admin_panel.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
    <script>
        // Automatically hide success and error messages after 2 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.querySelector('.success-message');
            var errorMessage = document.querySelector('.error-message');

            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000); // 2 seconds
            }

            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 2000); // 2 seconds
            }
        });
    </script>
</body>
</html>
<?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) { ?>
  <p>You are logged in as admin. <a href="<?php echo $_SERVER['PHP_SELF']; ?>?logout=true">Logout</a></p>
<?php } ?>
