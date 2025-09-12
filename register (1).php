<?php
require "connection.php";

if(isset($_POST['submit']))
{
$firstname = addslashes($_POST['firstname']);
$lastname = addslashes($_POST['lastname']);
$email = $_POST['email'];
$department = $_POST['department'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$votersID = $_POST['votersID'];
$year_level = $_POST['year_level'];


    $q="SELECT email FROM voters WHERE email='$email' ";
    $result = $conn->query($q);
    $num = mysqli_fetch_assoc($result);
    if($num > 0){
	   echo"<script>alert('Email Exist Aready')</script>";
    }else{

     
    	 $q1 = "INSERT INTO voters(firstname,lastname,email,department,gender,password,votersID,year_level,status) values ('$firstname','$lastname','$email','$department','$gender','$password','$votersID','$year_level','Applied')";
    	$functionInsert=mysqli_query($conn,$q1);
        if ($functionInsert === true) {
            echo"<script>alert('User Added Successfully')</script>";
        }
    	header('location: waiting.php');
    }

}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../CSS/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="height: 100%; margin-top:30px;">

                    <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800" style="text-align: center;margin-top: 30px;"><b>Voters Registration</b></h1>
 </div>
 <div class="card shadow mb-4" style="margin-top:30px;">
     <div class="card-body">
         <form action="register.php" method="post">
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="firstname">FirstName</label>
                 <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
               </div>
                <div class="form-group col-md-6">
                 <label for="lastname">LastName</label>
                 <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter LastName" required>
               </div> 
             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
               </div>
               <div class="form-group col-md-6">
                <label for="department">Department</label>
                <select id="inputState" name="department" class="form-control" required>
                  <option selected>Choose...</option>
                   <?php 
                     $query1="SELECT * FROM department";
                     $connectQuery = mysqli_query($conn,$query1);
                     while ($fetchQuery = mysqli_fetch_assoc($connectQuery)){
                   ?>
                   <option value="<?=$fetchQuery['dept_Name']?>"><?=$fetchQuery['dept_Name']?></option>
               <?php } ?>
                 </select>
               </div>
             </div>
             <div class="form-row">
             	<div class="form-group col-md-4">
                      <label for="password">Password</label>
                      <input type="password" id="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least 8 or more characters">
                    <div id="message">
                    <h3 style="font-size:12px;">Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b></p>
                    <p id="capital" class="invalid">A <b>(uppercase)</b></p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">8 characters</b></p>
                    </div>

                    </div>



                    
               <div class="form-group col-md-4">
                 <label for="gender">Gender</label>
                 <select id="inputState" name="gender" class="form-control" required>
                   <option selected>Choose...</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                     </select>
                    </div>
                      
                    <div class="form-group col-md-4">
                      <label for="designation">Year Level</label>
                      <select id="inputState" name="year_level" class="form-control" required>
                        <option selected>Choose...</option>
                         <?php 
                           $query1="SELECT * FROM year_level";
                           $connectQuery = mysqli_query($conn,$query1);
                           while ($fetchQuery = mysqli_fetch_assoc($connectQuery)){
                         ?>
                         <option value="<?=$fetchQuery['year_Name']?>"><?=$fetchQuery['year_Name']?></option>
                     <?php } ?>
                       </select>
                     </div>
                    
                   </div>
                   <div class="row">
                       <div class="col-md-4">
                           <label for="votersID"></label>
                           <input type="text" name="votersID" value="<?='SRCid'. uniqid()?>" hidden="">
                       </div>

                       <div class="col-md-4">
                           <input type="submit" class="btn btn-primary btn-block" id="register" value="Register" name="submit">
                       </div>
                       <div class="col-md-4">
                           
                       </div>
                   </div>
                 </form>
           </div>
       </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
</body>
</html>
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<style type="text/css">
    #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 15px;
  margin-top: 10px;
  width: 60%;
}

#message p {
  padding: 10px 35px;
  font-size: 12px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>