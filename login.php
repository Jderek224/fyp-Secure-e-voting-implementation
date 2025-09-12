
        <?php
            include'connection.php';
            session_start();
            if (isset($_POST['submit']))
            {
            $email=$_POST['email'];
            $password=$_POST['password'];
            $sql = "SELECT * FROM voters WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query ($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            if(!empty($user)){
            $_SESSION['user_info'] = $user['email'];
            $_SESSION['user_info'] = $user['password'];
            $message='Logged in successfully';
            
            }
            else{
            $message = 'Wrong email or password.';
            }
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Location: vote.php");
            }
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

        <script type="text/javascript">
        function validate() {
        var EmailId=document.getElementById("email");
        var atpos = EmailId.value.indexOf("@");
        var dotpos = EmailId.value.lastIndexOf(".");
        var password=document.getElementById("password");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
        {
            alert("Enter valid email");
            EmailId.focus();
            return false;
        }
        if(password.value.length< 8)
        {
            alert("Password consists of atleast 8 characters");
            password.focus();
            return false;
        }
        return true;
     }
    </script>
        <body style="background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url('img/campu.avif');background-position: center; background-size: cover;background-repeat: no-repeat;height: 600px; width:100%;">
            <br><br>
         <form method="POST" action="login.php">
            <h1>Voters Login</h1>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>

            <label for="password" style="margin-top:20px;">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <br><br><br>
            <button type="submit" name="submit" style="margin-top: 20px;">Login</button>
            <br><br><br> 
         </form>
        </body>
        </html>
        