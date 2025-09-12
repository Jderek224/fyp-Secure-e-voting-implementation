<?php
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
   require 'connection.php';
   $email=$_POST['email'];
   $password=$_POST['password'];

   $sql="SELECT * FROM voters WHERE email='$email'";
   $result=mysqli_query($conn,$sql); 
   $numRows=mysqli_num_rows($result);     
       if($numRows == 1){
           $row=mysqli_fetch_assoc($result);
             if($password==$row['password']){ 
               $status = $row['status'];
                 if($status == 'Applied'){

                  header("Location: waiting.php");
                   exit();
                 }
                 else
                 {
                   session_start();
                   $_SESSION['loggedin']=true;
                   $_SESSION['id']=$row['id'];
                   $_SESSION['name']=$row['firstname']." ".$row['lastname']; 
                   //$_SESSION['class_joined']=$row['class_joined'];
                  header("Location: vote.php");
                   exit();
                 }
               }                
           }
          echo"<script>alert('Invalid username or Email')</script>";
      }

 ?>