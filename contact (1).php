<?php
  include'connection.php';


  if(isset($_POST['submit'])){
  $firstname = addslashes($_POST['firstname']);
  $lastname = addslashes($_POST['lastname']);
  $email = $_POST['email'];
  $department = $_POST['department'];
  $year_level = $_POST['year_level'];
  $query = $_POST['query'];


  $q1 = "INSERT INTO contact(firstname,lastname,email,department,year_level,query) values ('$firstname','$lastname','$email','$department','$year_level','$query')";
  $functionInsert=mysqli_query($conn,$q1);
    if ($functionInsert === true) {
         echo"<script>alert('Message sent Successfully')</script>";
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
     <h1 class="h3 mb-0 text-gray-800" style="text-align: center;margin-top: 30px;"><b>CONTACT US</b></h1>
 </div>
 <div class="card shadow mb-4" style="margin-top:30px;">
     <div class="card-body">
         <form action="contact.php" method="post">
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
                    <div class="form-group col-md-6">
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


                     <div class="form-group col-md-6">
                      <label for="designation">Write To Us..!</label>
                      <textarea id="w3review" name="query" rows="4" class="form-control" cols="50"></textarea>
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
                       <div class="col-md-4"></div>
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