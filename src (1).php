<?php
    
    include'connection.php';

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
        header('location: vote1.php');
    }

    // $q2="SELECT src_candidatevotes.voted_for,candidates_vote.candidateID,candidates_vote.firstname,candidates_vote.lastname, COUNT(src_candidatevotes.voted_for)AS TOTALVOTES FROM src_candidatevotes LEFT JOIN candidates_vote ON src_candidatevotes.voted_for = candidates_vote.candidateID GROUP BY src_candidatevotes.voted_for DESC";

     $q="SELECT email FROM src_candidatevotes WHERE email='$email' ";
    $result = $conn->query($q);
    $num = mysqli_fetch_assoc($result);
    if($num > 0){
       echo"<script>alert('You Have Already Voted.....Thanks')</script>";
    }else{

    	 $q1 = "INSERT INTO src_candidatevotes(fullname,email,department,year_level,voted_for) values ('$fullname','$email','$department','$year_level','$voted_for')";
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