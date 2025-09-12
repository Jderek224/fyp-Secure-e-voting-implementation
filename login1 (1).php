        
    <?php
        $conn =  new mysqli("localhost", "root","", "evoting");
        if(! $conn )
        {
         die('Could not connect: ' . mysqli_error($conn));
        }

        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // get user input
          $username = $_POST['username'];
          $password = $_POST['password'];

          $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
          $result = $conn->query($sql);

          if ($result->num_rows == 1) {
            $_SESSION['admin_username'] = $username; 
            header("Location: admin_files/admin_dashboard.php"); 
            exit;
          } else {
            $error_message = 'Invalid username or password'; 
          }
        }

        $conn->close();   
        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./CSS/styles.css">
            <link rel="stylesheet" href="CSS/W3.css"> 
            <title>Login</title>
        </head>
        <body style="background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url('img/campu.avif');background-position: center; background-size: cover;background-repeat: no-repeat;height: 600px; width:100%;">
            <br><br>
         <form method="POST" action="login1.php">
            <h1>Login</h1>
            <label for="email">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password" style="margin-top:20px;">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br><br>
             <button type="submit" name="submit" style="margin-top: 20px;">Login</button>
                   
            <!-- <button onclick="location.href='admin_files/admin_login.php'" style="margin-top: 20px;">Admin Login</button> -->
         </form>
        </body>
        </html>