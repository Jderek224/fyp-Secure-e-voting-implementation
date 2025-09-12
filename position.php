<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
    .btn-special-2 {
    padding: 12px 24px;
    background-color: white;
    color: hsl(243, 80%, 62%);
    border-radius: 6px;
    margin-left: 580px;
    border: 2px hsl(243, 80%, 62%) solid;
    transition: transform 250ms ease-in-out;
}

.btn-special-2:hover {
    transform: scale(1.10);
}

.btn-special-2:active {
    transform: scale(.9);
}
#footersection{
    margin-top:70px;
}
.h2_1{
    text-align:center;
    margin-top:30px;
}

    </style>
</head>

<script type="text/javascript">
//     function myFunction() {
//   document.getElementById("myBtn").disabled = true;

// }

    $(document).ready(function(){
  $("button1").click(function(){
    $("#btn1").fadeOut(9000);
  })
  $("button2").click(function(){
    $("#btn2").fadeOut(9000);
  })
  $("button3").click(function(){
    $("#btn3").fadeOut(9000);
  })
  $("button4").click(function(){
    $("#btn4").fadeOut(9000);
  })
  $("button5").click(function(){
    $("#btn5").fadeOut(9000);
  })
});

</script>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="h2_1"><b>Select Position To Vote</b></h2><br><br><br><br>
            <a href="candidate.php"><button1 id="btn1" class="btn-special-2"> President </button></a>
            </div><br><br><br><br>
            <div class="col-md-12">
            <a href="pusag.php"><button2 id="btn2" class="btn-special-2">PUSAG </button></a>
            </div><br><br><br><br>
            <div class="col-md-12">
            <a href="secretary.php"><button3 id="btn3" class="btn-special-2">Secretary</button></a>
            </div><br><br><br><br>
            <div class="col-md-12">
            <a href="treasure.php"><button4 id="btn4" class="btn-special-2">Treasure</button></a>
            </div><br><br><br><br>
            <div class="col-md-12">
            <a href="organizer.php"><button5 id="btn5" class="btn-special-2">Organizer</button></a>
            </div><br>
        </div>
    </div>
</body>
</html>