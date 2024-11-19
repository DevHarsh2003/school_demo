<?php
include_once("db.php");
?>
<html>
    <head>
        <title>View Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/view.css">
    </head>
    <body>
        <header>
            <center>Student Data</center>
        </header>
        <section>
            <div class="row">
                <div class="col col-md-2"></div>
                <div class="col col-md-8">
                    <?php
                        $id=$_GET['id'];
                        $sql="select s.name,s.email,s.address, s.image, c.name as class_name, s.created_at from student s join classes c on s.class_id=c.class_id where s.id='$id'";
                        $run=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($run);
                    ?>
                    <div class="row"><h2><?php echo $row['name'] ?></h2></div>
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="row"> <p><span>Email: </span><b><?php echo $row['email']; ?></b></p></div>
                            <div class="row"><p><span>Address:</span> <?php echo $row['address']; ?></p></div>
                            <div class="row"><p><span>Class:</span> <?php echo $row['class_name']; ?></div></p>
                            <div class="row"><p><span>Created On:</span> <i><?php  $dt=$row['created_at']; $fdt=date("d-m-y h:i A",strtotime($dt));echo $fdt; ?></i></p></div>
                        </div>
                        <div class="col col-md-4"><img src="upload/<?php echo $row['image']; ?>" alt=""  height=200 width=200></div>
                    </div>
                    <button onclick="window.location.href='index.php'">Back</button>
                </div>
                <div class="col col-md-2"></div>
            </div>
        </section>
    </body>
</html>


