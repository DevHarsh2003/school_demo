<?php
include_once("db.php");
if(isset($_POST['class_entry'])){
    $c_name=$_POST['c_name'];
    $c_time=$_POST['c_time'];
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"school_db");
    $sql="insert into `classes`(name,created_at) values ('$c_name','$c_time')";
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
        <title>Manage Classes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/classes.css">
    </head>

    <header>
        <center>Class Details</center>
    </header>
    <section>
        <div class="row">
            <div class="col col-md-6" id="cls_table">
                <table >
                    <tr><th>Class Id</th>
                    <th>Class Name</th>
                    <th>Class Created Time</th>
                <th colspan=2>Options</th></tr>
                    <?php 
                        $sql="select * from classes";
                        $run=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($run)){
                            ?><tr><td><?php echo $row['class_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php $dt=$row['created_at']; $fdt=date("d-m-y h:i A",strtotime($dt)); echo $fdt; ?></td>
                                    <td><button onclick="show_edit(<?php echo $row['class_id'];?>)">Edit</button></td>
                                    <td><button onclick="show_delete(<?php echo $row['class_id']; ?>)">Delete</button></td></tr><?php
                            
                        }
                    ?>
                </table>
            </div>
            <div class="col col-md-6">
                <form method="post" onsubmit="return formatdt()">
                    <label for="name">Class Name</label>
                    <input type="text" id="name" placeholder="Enter The Class Name" name="c_name" required>
                    <label for="time">Created At</label>
                    <input type="datetime-local" name="c_time" id="time" required>
                    <button type="submit" name="class_entry">Add</button>
                </form>
                <button onclick="window.location.href='index.php'">Back</button>
            </div>
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
        function show_edit(id){
            window.location.href=`edit_class.php?id=${id}`
        }
        function show_delete(id){
            const res=confirm("Do you want to delete this class record?");
            if(res){
                window.location.href=`delete_class.php?id=${id}`;
            }
        }
    </script>
    
</html>