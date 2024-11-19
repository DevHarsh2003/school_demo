<?php
if(isset($_POST['edit'])){
    $c_name=$_POST['c_name'];
    $c_time=$_POST['c_time'];
    $id=$_GET['id'];
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"school_db");
    $sql="update `classes` set name='$c_name', created_at='$c_time' where class_id='$id'";
    $run=mysqli_query($con,$sql);
    if($run){
        echo "<script>window.location.href='classes.php';</script>";
    }
    else{
        echo "<script>alert('Entry Fail');window.location.href='classes.php';<script>";
    }
}

?>

<html>
    <head>
        <title>Class Edit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/edit_class.css">
    </head>
    <body>
        <header>
            <center>Edit Class Details</center>
        </header>
        <section>
            <div class="row">
                <?php
                    $con=mysqli_connect("localhost","root","","school_db");
                    $id=$_GET['id'];
                    $sql="select * from classes where class_id='$id'";
                    $run=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($run);
                ?>
                <div class="col col-md-3"></div>
                <div class="col col-md-6">
                <form action="" method="post" onsubmit="return formatdt()">
                <label for="name" >Class Name</label>
                <input type="text" id="name" name="c_name" value="<?php echo $row['name'] ?>" placeholder="Enter The Class Name" name="c_name" required><br><br>
                <label for="time">Created At</label>
                <input type="datetime-local" name="c_time" value="<?php echo $row['created_at'] ?>" name="c_time" id="time" required><br><br>
                <button type="submit" name="edit">Submit</button>
                </form>
                <button type="button" onclick="window.location.href='classes.php'">Back</button>
                </div>
                <div class="col col-md-3"></div>
            </div>
        </section>
        <script>
            function formatdt(){
            var dt=document.getElementById('time').value;
            if(dt){
                document.getElementById('time').value=dt.replace('T'," ");
            }
            var name=document.getElementById("name").value.trim();
            if(name==""){
                alert("Class name cannot be empty or blank spaces.");
                return false;
            }
            return true;
        }
        </script>
    </body>
    
</html>