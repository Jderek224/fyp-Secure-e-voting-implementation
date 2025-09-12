<?php
  include"connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fonts CDN-->

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--- Custom Css --->
    <link rel="stylesheet" href="CSS/style12.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    


  <title></title>
</head>
<body>
  <section id="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6 animate__animated animate__bounceInLeft" style="text-align: center;">
        <h1>ONLINE VOTING SYSTEM</h1>
        <p>Online voting systems are software platforms used to securely conduct votes and elections. As a digital platform, they eliminate the need to cast your votes using paper or having to gather in person.</p>
      <a href="position.php"><button class="magnifyBtn">VOTE NOW</button></a>
      </div>
      
      <div class="col-md-6"> 
             <img src="img/2.svg" alt="" srcset="" height="521vh " width="100%" class="animate__animated animate__bounceInRight " style="margin-left: 10px; margin-top: 20px;" >
          </div> 
      </div>  
    </div>
    <div class="container">
      <h1>Current Poll Statistics</h1><br>
      <div class="row">
        <div class="col-md-6">
          <!-- <h1 class="pb-2">SRC Vote Chart</h1> -->
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>

        <div class="col-md-6">
          <!-- <h1 class="pb-2">Pusag Vote Chart</h1> -->
          <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
    </div><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-md-6">
          <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
    </div><br>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
        </div>
        <!-- <div class="col-md-6">
          <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
        </div> -->
      </div>
    </div><br>
</section>
<script src="./canvas.min.js"></script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  //exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Voting Chart For SRC President"
  },
    axisY: {
      title: "Counts"
    },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //showInLegend: true,
    legendMarkerColor: "grey",
    dataPoints: [
      <?php
      $contest=array();
        $query=mysqli_query($conn,"SELECT candidates_vote.firstname,candidates_vote.lastname, COUNT(src_candidatevotes.voted_for)AS TOTALVOTES FROM src_candidatevotes LEFT JOIN candidates_vote ON src_candidatevotes.voted_for = candidates_vote.candidateID GROUP BY src_candidatevotes.voted_for DESC");

        $percentage = 100;
        $totalWidth = 2000;
        $new_width = ($percentage / 100) * $totalWidth;

        while ($contestants=mysqli_fetch_assoc($query)) {
          $contest[] = $contestants;
        }
        foreach ($contest as $contestants) {

      ?>
      { y: <?=$contestants['TOTALVOTES']?>, label: "<?=$contestants['firstname']?>" },
    <?php } ?>
    ]
  }]
});
chart.render();

// Chart for pusag president

var chart = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  //exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Voting Chart For PUSAG President"
  },
    axisY: {
      title: "Counts"
    },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //showInLegend: true,
    legendMarkerColor: "grey",
    dataPoints: [
      <?php
      $contest1=array();
        $query=mysqli_query($conn,"SELECT candidates_vote.firstname,candidates_vote.lastname, COUNT(pusag_votes.voted_for)AS TOTALVOTES FROM pusag_votes LEFT JOIN candidates_vote ON pusag_votes.voted_for = candidates_vote.candidateID GROUP BY pusag_votes.voted_for DESC");

              // $mainP=$fetchQuery['TOTALVOTES']*100;
              //$totalpercent=number_format($mainP,2);
        while ($contestants1=mysqli_fetch_assoc($query)) {
          $contest1[] = $contestants1;
        }
        foreach ($contest1 as $contestants1) {

      ?>
      { y: <?=$contestants1['TOTALVOTES']?>, label: "<?=$contestants1['firstname']?>" },
    <?php } ?>
    ]
  }]
});
chart.render();

// Chart for secretary

var chart = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  //exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Voting Chart For Secretary"
  },
    axisY: {
      title: "Counts"
    },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //showInLegend: true,
    legendMarkerColor: "grey",
    dataPoints: [
      <?php
      $contest1=array();
        $query=mysqli_query($conn,"SELECT candidates_vote.firstname,candidates_vote.lastname, COUNT(secretary_votes.voted_for)AS TOTALVOTES FROM secretary_votes LEFT JOIN candidates_vote ON secretary_votes.voted_for = candidates_vote.candidateID GROUP BY secretary_votes.voted_for DESC");

              // $mainP=$fetchQuery['TOTALVOTES']*100;
              //$totalpercent=number_format($mainP,2);
        while ($contestants1=mysqli_fetch_assoc($query)) {
          $contest1[] = $contestants1;
        }
        foreach ($contest1 as $contestants1) {

      ?>
      { y: <?=$contestants1['TOTALVOTES']?>, label: "<?=$contestants1['firstname']?>" },
    <?php } ?>
    ]
  }]
});
chart.render();

//chart for treasure
var chart = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  //exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Voting Chart For Treasure"
  },
    axisY: {
      title: "Counts"
    },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //showInLegend: true,
    legendMarkerColor: "grey",
    dataPoints: [
      <?php
      $contest1=array();
        $query=mysqli_query($conn,"SELECT candidates_vote.firstname,candidates_vote.lastname, COUNT(treasure_votes.voted_for)AS TOTALVOTES FROM treasure_votes LEFT JOIN candidates_vote ON treasure_votes.voted_for = candidates_vote.candidateID GROUP BY treasure_votes.voted_for DESC");

              // $mainP=$fetchQuery['TOTALVOTES']*100;
              //$totalpercent=number_format($mainP,2);
        while ($contestants1=mysqli_fetch_assoc($query)) {
          $contest1[] = $contestants1;
        }
        foreach ($contest1 as $contestants1) {

      ?>
      { y: <?=$contestants1['TOTALVOTES']?>, label: "<?=$contestants1['firstname']?>" },
    <?php } ?>
    ]
  }]
});
chart.render();


//chart for treasure
var chart = new CanvasJS.Chart("chartContainer4", {
  animationEnabled: true,
  //exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Voting Chart For Organizer"
  },
    axisY: {
      title: "Counts"
    },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //showInLegend: true,
    legendMarkerColor: "grey",
    dataPoints: [
      <?php
      $contest1=array();
        $query=mysqli_query($conn,"SELECT candidates_vote.firstname,candidates_vote.lastname, COUNT(orgnizer_votes.voted_for)AS TOTALVOTES FROM orgnizer_votes LEFT JOIN candidates_vote ON orgnizer_votes.voted_for = candidates_vote.candidateID GROUP BY orgnizer_votes.voted_for DESC");

              // $mainP=$fetchQuery['TOTALVOTES']*100;
              //$totalpercent=number_format($mainP,2);
        while ($contestants1=mysqli_fetch_assoc($query)) {
          $contest1[] = $contestants1;
        }
        foreach ($contest1 as $contestants1) {

      ?>
      { y: <?=$contestants1['TOTALVOTES']?>, label: "<?=$contestants1['firstname']?>" },
    <?php } ?>
    ]
  }]
});
chart.render();

};

</script>
</body>
</html>



