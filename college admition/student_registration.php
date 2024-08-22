<!-- register.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <style>
  /* Styling for the main container */
  .main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 85vh;
    
   
  }
  
  .main-container
{
    width: 400px;
    height: 600px;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);

    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;

    border-radius: 20px;
    border: 3px solid rgba(255, 255, 255, 0.5);
   
}

.main-container input{
    width: 80%;
    height: 30px;
    border-radius: 10px;
    border: 2px solid #fff;
    margin: 0 10px;
  

    
    padding: 0 35px 0 10px;
    font-size: 1.2em;
    
   
    color: #fff;
    background: transparent;

}
.main-container input:focus{
    outline: none;
    }
    .main-container label{
        color: #fff;
        font-size: 1.2em;

      
    }

h2
{
    color: #ffff;
    font-size: 2em;
    text-transform: uppercase;
    padding: 20px 0;
}
h3{
    color: #e9d7d7;
    font-size: 1.2em;
    text-transform: uppercase;
    padding: 10px 0;

    
}

.main-container button{
   
    
    cursor: pointer;
    outline: 0;
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    text-align: center;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    color: #fff;
    background: transparent;
    border: 2px solid #fff;
    margin: 0 10px;
    font-size: 1.2em;
    
  
    :hover {
        color: #fff;
        background: #fff;
        
    }


}

p
{
    text-align: center;
    color: #fff;
    margin: 10px 0;
}

a
{
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}

a:hover
{
    text-decoration: underline;
    font-style: italic;
}

#btn
{
    width: 100%;
    height: 50px;
    border-radius: 40px;
    border: none;
    font-size: 1.5em;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: all 0.5s;
}

#btn:hover
{
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
}


/* Footer styles */
.main-footer {
    background-color: #33333377;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: relative;
    bottom: 0;
    width: 100%;
}

.main-footer p {
    margin: 0;
    font-size: 1rem;
}


  </style>
    <link rel="stylesheet" href="s.css">
</head>
<body>
<header class="header">
        <div class="container">
            <h1 class="logo"><a href="welcome.php">Admission Predictor</a></h1>
            <nav class="nav">
                <ul>
                    <li><a href="welcome.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="admin_login.php">Admin Login</a></li>
                    <li><a href="student_login.php">Student Login</a></li>
               
                </ul>
            </nav>
        </div>
    </header>






<main class="main">
    <div class="main-container">
        <h2>Student Registration</h2>
        <form action="register.php" method="post">
        <label for="">username</label> 
            <input type="text" name="username" placeholder="Username" required>
            <label for="">password</label>
            <input type="password" name="password" placeholder="Password" required>
           
            <button type="submit" name="Register">Register</button>
            
        </form>
        <p>Already have an account? <a href="student_login.php">Login here</a></p>
        <p>Go to Homepage <a href="welcome.php">Homepage</a></p>
    </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 Admission Predictor. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
