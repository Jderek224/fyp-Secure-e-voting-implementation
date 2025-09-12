<?php
$conn =  new mysqli("localhost", "root","", "evoting");
if(! $conn )
{
 die('Could not connect: ' . mysqli_error($conn));
}else
echo '';
?>
