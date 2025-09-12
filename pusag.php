<?php
  include"connection.php";
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
  <title></title>
  <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
.container a{
  color: #0056b3;
}
.container a:hover{
  text-decoration: none;
  color: #e0501b;
}
.slideUpBtn {
    padding: 12px 24px;
    background-color: #0056b3;
    border: 2px solid hsl(243, 80%, 62%);
    border-radius: 6px;
    position: relative;
    overflow: hidden;
    color: #fff;
    margin-left: 90px;
    margin-bottom: 20px;
    transition: all 0.5s cubic-bezier(1,.15,.34,.92)
}
.slideUpBtn:hover{
  background-color: transparent;
  border: 2px solid #0056b3;
  color: #000;
  transition: all 0.5s cubic-bezier(1,.15,.34,.92)
}

.slideUpBtn:hover::before {
    transform: translateY(0) scale(3);
    transition-delay: .025s;
}

.slideUpBtn:hover::after {
    opacity: 1;
    color: hsl(222, 100%, 95%);
    transform: translateY(0);
}
</style>
</head>
<body>
  <div class="container"><br><br><br>
    <h2 style="text-align:center;"><b>PUSAG CANDIDATE...</b></h2>
    <div class="row">
      <?php 
        $query1="SELECT firstname, lastname, candImg, candidateID FROM candidates_vote WHERE position = 'Pusag President'";
        $connectQuery = mysqli_query($conn,$query1);
        while ($fetchQuery = mysqli_fetch_assoc($connectQuery)){
      ?>
      <div class="col-md-4">
          <div class="card">
            <div style="background-image:url('img/<?=$fetchQuery['candImg']?>');background-position: center; background-repeat:no-repeat; background-size:cover; width:100%; height: 200px;object-fit: cover;"></div>
            <div class="container"><br>
              <h4 style="text-align:center;color: #e0501b;"><b><?=$fetchQuery['firstname']?> <?=$fetchQuery['lastname']?></b></h4> 
              <p style="text-align:center;color: #e0501b;">Vote As Pusag President</p>
              <a href="vote_pusag.php?d=<?=$fetchQuery['candidateID']?>" ><span ><button style="margin-top: 20px;" class="slideUpBtn">Vote Now</button></span></a><br> 
            </div>
          </div>
      </div>
    <?php } ?>
    </div>
  </div><br><br><br>
</body>
</html>