<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['aid']))
{
 header("location:adminlogin.php");
}
function countrecord($sql,$con){
    $res = mysqli_query($con, $sql);
    $rowcount = mysqli_num_rows($res);
    return $rowcount;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LMS</title>
    <link rel="stylesheet"type="text/css"  href="../css/ahome.css">  
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   <nav>
    <label class="logo">E-Library</label>
   </nav>
   <div class="contant">
   <div class="sidebar">
   <aside>
    <ul>
        <li><a href="ahome.php"><i class='fas fa-home'></i>Home</a></li>
        <li><a href="viewstudent.php"><i class='fas fa-users'></i>View Students</a></li>
        <li><a href="./uploadbook.php"><i class='fas fa-cloud-upload-alt'></i>Upload Books</a></li>
        <li><a href="./viewbook.php"><i class="fa fa-book"></i>View Books</a></li>
        <li><a href="./viewrequest.php"><i class="fa fa-share"></i>View Request</a></li>
        <li><a href="./viewcomment.php"><i class="fa fa-comment"></i>View Comments</a></li>
        <li><a href="../alogout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
   </aside>
   </div>
   <div class="wrapper">
    <h1>Welcome Librarian</h1>
    <ul>
        <li><i class='fas fa-users'></i>Total Students :<?php echo "\t" .countrecord("select * from student",$con)?></li>
        <li><i class="fa fa-book" aria-hidden="true"></i>Total Books    :<?php echo "\t" .countrecord("select * from book",$con)?></li>
        <li><i class="fa fa-share" aria-hidden="true"></i>Total Requests :<?php echo "\t" .countrecord("select * from request",$con)?></li>
        <li><i class="fa fa-comment" aria-hidden="true"></i>Total Comments :<?php echo "\t" .countrecord("select * from comment",$con)?></li>
    </ul>
   </div>
   </div>
</body>

</html>