<?php
    $candidate=$_GET['d'];
  include"connection.php";
  $query1="SELECT firstname, lastname FROM candidates_vote WHERE candidateID = '$candidate'";
  $connectQuery = mysqli_query($conn,$query1);
  $fetchQuery = mysqli_fetch_assoc($connectQuery);


    if(isset($_POST['submit']))
    {
    $fullname = addslashes($_POST['fullname']);
    $email = $_POST['email'];
    $department = $_POST['department'];
    $year_level = $_POST['year_level'];
    $voted_for = $_POST['voted_for'];

    
    //check if the person voted for is in the db
    $q0="SELECT candidateID FROM candidates_vote WHERE candidateID='$voted_for'";
    $result0 = $conn->query($q0);
    $num0 = mysqli_fetch_assoc($result0);
    if ($num0 < 1) {
        die("<script>alert('Busted !!!!')</script>");
        header('location: vote_pusag.php');
    }

     $q="SELECT email FROM treasure_votes WHERE email='$email' ";
    $result = $conn->query($q);
    $num = mysqli_fetch_assoc($result);
    if($num > 0){
       echo"<script>alert('You Have Already Voted.....Thanks')</script>";
    }else{

       $q1 = "INSERT INTO treasure_votes(fullname,email,department,year_level,voted_for) values ('$fullname','$email','$department','$year_level','$voted_for')";
      $functionInsert=mysqli_query($conn,$q1);
        if ($functionInsert === true) {
            $q3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT totalvotes FROM candidates_vote WHERE candidateID='$voted_for'"));
            $totalvotes=$q3['totalvotes'];
            $newVote= $totalvotes + 1;
            $q4=mysqli_query($conn,"UPDATE candidates_vote SET totalvotes='$newVote' WHERE candidateID='$voted_for'");
            if($q4===true){
                echo"<script>alert('Voted Successfully')</script>";
            }
        }
      header('location: position.php');
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../CSS/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url('img/ele.avif');background-position: center; background-size: cover;background-repeat: no-repeat;height: 600px; width:100%;">
<div class="container" style="height: 100%; margin-top:30px;">

                    <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800" style="text-align: center;margin-top: 30px;color: #fff;"><b>Vote <?=$fetchQuery['firstname']?> <?=$fetchQuery['lastname']?> For Treasure</b></h1>
 </div>
 <div class="card shadow mb-4 animate__animated animate__fadeInRight" style="margin-top:30px;">
     <div class="card-body">
         <form action="vote_treasure.php" method="post">
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="fulname">Fullname</label>
                 <input type="text" class="form-control" id="fulname" name="fullname" placeholder="Enter FulName" required>
               </div>
                <div class="form-group col-md-6">
                 <label for="email">email</label>
                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                 <input type="hidden" class="form-control" id="vote_for" name="voted_for" placeholder="Enter Email" required value="<?=$candidate?>">
               </div> 
             </div>
             <div class="form-row">


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
               
                  </div>
                  
                   <div class="row">
                        <div class="col-md-4">
                           <label for="voterid"></label>
                           <input type="text" name="voterid" value="<?='SRC'. uniqid()?>" hidden="">
                       </div> 

                       <div class="col-md-4">
                           <input type="submit" class="btn btn-primary btn-block" id="register" value="vote" name="submit" style="width:80px; margin-left: 80px;">
                       </div>
                       <div class="col-md-4"></div>
                   </div>
                 </form>
           </div>
       </div>

        </div>
</body>
</html>