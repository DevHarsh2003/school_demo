<?php
$con=mysqli_connect("localhost","root","","school_db");
$id=$_GET['id'];
$sql="delete from classes where class_id='$id'";
$run=mysqli_query($con,$sql);
if($run){
    echo "<script>window.location.href='classes.php';</script>";
}
else{
    echo "<script>alert('Deletion Failed');window.location.href='classes.php';</script>";
}

?>