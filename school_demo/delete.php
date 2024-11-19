<?php
include_once("db.php");
$id=$_GET['id'];
$sql="select image from student where id='$id'";
$sql1="delete from student where id='$id'";
$run=mysqli_query($con,$sql);
if($row= mysqli_fetch_assoc($run)){
    $path='upload/'.$row['image'];
    unlink($path);
}
$run1=mysqli_query($con,$sql1);
if($run1){
    echo "<script>window.location.href='index.php';</script>";
}
?>