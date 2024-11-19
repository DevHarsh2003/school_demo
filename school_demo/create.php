<?php
    include_once("db.php");
    if(isset($_POST['s_entry'])){
        $s_name=$_POST['s_name'];
        $s_email=$_POST['s_email'];
        $s_address=$_POST['s_address'];
        $s_class=$_POST['s_class'];
        
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
                    $sql="insert into student (name,email,address,class_id,image) values ('$s_name', '$s_email', '$s_address', '$s_class', '$f_newname')";
                    $run=mysqli_query($con,$sql);
                    if($run){
                        echo "<script>alert('Entry Successful');window.location.href='index.php';</script>";
                    }
                    else{
                        echo "<script>alert('Entry Unsuccessful');window.location.href='create.php';</script>";
                    }
                }
                else{
                    echo "<script>alert('Image Upload Failure');window.location.href='create.php';</script>";
                }
            }
            else{
                echo "<script>alert('Image Extension Should Be In Jpg Or Png');window.location.href='create.php';</script>";
            }
        }
        else{
            echo "<script>alert('No File Uploaded');window.location.href='create.php';</script>";
        }
    }

?>


<html>
    <head>
        <title>Create Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/create.css">
    </head>
    <body>
    <header>
        <center>Student Entry</center>
    </header>
    <section>
        <div class="row">
            <div class="col col-md-2"></div>
            <div class="col col-md-8">
                <form method="post" enctype="multipart/form-data" onsubmit="return validation()">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="s_name" placeholder="Enter Student Name" required><br>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Student Email" name="s_email" id="email"><br>
                    <label for="address" required>Address</label>
                    <textarea  placeholder="Enter Student Address" id="address" name="s_address"></textarea><br>
                    <!--<label for="time">Entry Time</label>
                    <input type="datetime-local" id="time" name="s_time"><br>-->
                    <label for="class_id">Class</label>
                    <select name="s_class" id="class_id" required>
                        <?php  
                            $sql="select * from classes";
                            $run=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($run)){
                                ?> <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>  <?php
                            }
                        ?>
                    </select><br>
                    <label for="image">Image</label>
                    <input type="file" name="s_image" id="image" accept=".jpg,.png" required><br>
                    <button type="submit" name="s_entry">Submit</button>
                </form>
                <button onclick="window.location.href='index.php'">Back</button>
            </div>
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