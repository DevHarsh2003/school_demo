<?php
    include_once("db.php");
    if(isset($_POST['s_entry'])){
        $s_name=$_POST['s_name'];
        $s_email=$_POST['s_email'];
        $s_address=$_POST['s_address'];
        $s_class=$_POST['s_class'];
        $id=$_GET['id'];
        
        if($_FILES['s_image'] && $_FILES['s_image']['error']==0){
            $f_name=$_FILES['s_image']['name'];
            $f_tmpname=$_FILES['s_image']['tmp_name'];
            $f_size=$_FILES['s_image']['size'];
            $f_error=$_FILES['s_image']['error'];

            $f_ext=strtolower(pathinfo($f_name,PATHINFO_EXTENSION));
            $valid_ext=['jpg', 'png'];

            if(in_array($f_ext,$valid_ext)){
                $f_newname= uniqid('student_').'.'.$f_ext;
                $dir="upload/";

                if(move_uploaded_file($f_tmpname,$dir.$f_newname)){
                    $sql1="select image from student where id='$id'";
                    $run1=mysqli_query($con,$sql1);
                    if($row= mysqli_fetch_assoc($run1)){
                        $path='upload/'.$row['image'];
                        unlink($path);
                    }
                    $sql="update student set name='$s_name', email='$s_email', address='$s_address', class_id='$s_class', image='$f_newname' where id='$id'";
                    $run=mysqli_query($con,$sql);
                    if($run){
                        echo "<script>alert('Data Updated Successfully');window.location.href='index.php';</script>";
                    }
                    else{
                        echo "<script>alert('Updation Failed');window.location.href='index.php';</script>";
                    }
                }
                else{
                    echo "<script>alert('Image Upload Failure');window.location.href='index.php';</script>";
                }
            }
            else{
                echo "<script>alert('Image Extension Should Be In Jpg Or Png');window.location.href='index.php';</script>";
            }
        }
        else{
            $sql="update student set name='$s_name', email='$s_email', address='$s_address', class_id='$s_class' where id='$id'";
            $run=mysqli_query($con,$sql);
            if($run){
                echo "<script>alert('Data Updated Successfully');window.location.href='index.php'</script>";
            }
        }
    }

?>


<html>
    <head>
        <title>Edit Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/edit.css">
    </head>
    <body>
        <header>
            <center>Edit Student Details</center>
        </header>
        <section>
            <div class="row">
            <div class="col col-md-2"></div>
            <?php
                    $id=$_GET['id'];
                    $sql="select s.name,s.email, c.class_id, s.address, s.image, c.name as class_name, s.created_at from student s join classes c on s.class_id=c.class_id where s.id='$id'";
                    $run=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($run);
            ?>
                <div class="col col-md-4">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="s_name" placeholder="Enter Student Name" value="<?php echo $row['name']; ?>"><br>
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter Student Email" name="s_email" id="email" value="<?php echo $row['email']  ?>"><br>
                        <label for="address">Address</label>
                        <textarea  placeholder="Enter Student Address" id="address" name="s_address"><?php echo $row['address']  ?></textarea><br>
                        <label for="class_id">Class</label>
                        <select name="s_class" id="class_id">
                            <?php   
                                $sql="select * from classes";
                                $run=mysqli_query($con,$sql);
                                while($row1=mysqli_fetch_assoc($run)){
                                    $selected=($row1['class_id']==$row['class_id'])?"selected":"";
                                    ?> <option value="<?php echo $row['class_id'];?>" <?php echo $selected;?> ><?php echo $row1['name']; ?></option>  <?php
                                }
                            ?>
                        </select><br>
                </div>
                <div class="col col-md-4"><img src="upload/<?php echo $row['image']; ?>" alt=""  height=75 width=75><br>
                <label for="image">Want To Re-upload?</label>
                    <input type="file" name="s_image" id="image" accept=".jpg,.png"><br>
                    <button type="submit" name="s_entry">Submit</button>
                    <button type="button" onclick="window.location.href='index.php'">Back</button>
                </div>
                </form>
                
                <div class="col col-md-2"></div>
            </div>
        </section>
        <script>
        function validation(){
            var name=document.getElementById('name').value.trim();
            var email=document.getElementById('email').value.trim();
            var address=document.getElementById('address').value.trim();
            if(name==""){
                alert("Name cannot be empty or blank spaces.");
                return false;
            }
            if(email==""){
                alert("Email cannot be empty or blank spaces.");
                return false;
            }
            if(address==""){
                alert("Address cannot be empty or blank spaces.");
                return false;
            }
            return true;

        }
    </script>
    </body>
</html>