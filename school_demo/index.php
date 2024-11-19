<?php
include_once("db.php");
?>
<html>
    <head>
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <script src="https://kit.fontawesome.com/de38eb546a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <header>
            <center><h2>Student Data</h2></center>
            
        </header>
        <section>
            <div class="row">
                <div class="col col-md-1"><button onclick="window.location.href='create.php'">Create Student</button></div>
                <div class="col col-md-10" id="stu_table">
                    <table class="table table-striped table-bordered">
                        <thead><tr><th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Creation Date</th>
                                    <th>Class Name</th>
                                    <th colspan=3>Options</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $sql="select s.id,s.image,s.name,s.email,s.created_at,c.name as class_name from student s join classes c on s.class_id=c.class_id";
                                $run= mysqli_query($con,$sql);
                                while($row=mysqli_fetch_assoc($run)){
                                    ?><tr>
                                        <td><img src="upload/<?php echo $row['image'] ?>" alt="" height=50 width=50></td>
                                        <td><?php  echo $row['name'] ?></td>
                                        <td><?php  echo $row['email'] ?></td>
                                        <td><?php  $dt= $row['created_at'];$f_dt=date("d-m-y h:i A", strtotime($dt)); echo $f_dt; ?></td>
                                        <td><?php  echo $row['class_name'] ?></td>
                                        <td><a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
                                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                                        <td><button onclick="show_box(<?php  echo $row['id']; ?>)">Delete</button></td></tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col col-md-1"><button onclick="window.location.href='classes.php'">Classes</button></div>
            </div>
        </section>
        <script>
            function show_box(id){
                const res=confirm("Do you want to delete this student record?");
                if(res){
                    window.location.href=`delete.php?id=${id}`;
                }
            }
        </script>
    </body>
</html>