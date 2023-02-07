<?php
session_start();
include "../connect.php";
if(!isset($_SESSION['sid']))
{
 header("location:../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LMS</title>
    <link rel="stylesheet"type="text/css"  href="../css/comment.css">  
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   <nav>
    <label class="logo">E-Library</label>
    <ul>
        <li ><a href="shome.php" class="active">Back</a></li>
    </ul>
   </nav>
   <div class="contant">
   <div class="sidebar">
   <aside>
    <ul>
        <li><a href="shome.php"><i class='fas fa-home'></i>Home</a></li>
        <li><a href="srequest.php"><i class="fa fa-share" aria-hidden="true"></i>Request Book</a></li>
        <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
   </aside>
   </div>
   <div class="wrapper">
   <div class="heading"> 
    <h1>Comments</h1>
    <?php
    $bid=$_GET["id"];
    $res=mysqli_query($con,"select * from book where bid=$bid");
    $row = mysqli_fetch_array($res);
    echo "<div class='book_box'>";
    echo "<a href=" . $row['file'] . " target ='_blank'><img src=".$row['img']." alt='book image' width='200px' height='250px'>
    <p>Book:".$row['btitle']."<br>
    </p>
    </a> ";
   echo " </div>";
    ?>
    </div>
    <div class="container">
        <?php
        if(isset($_POST['submit'])){
            $msg = $_POST['msg'];
            $result = mysqli_query($con,"insert into comment (bid,sid,comm,logs)values($bid,{$_SESSION['sid']},'$msg',now())");
        }
        ?>
    <form action="" method="post">
        <input type="text" name="msg" required placeholder="Enter your comments"><br>
        <button type="submit" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </form>
    <div class="comment-box">
    <?php
    $sql="select student.name,comment.comm,comment.logs from comment inner join student on comment.sid=student.sid where comment.bid=$bid order by comment.cid desc";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0)
    {
        while ($row = mysqli_fetch_array($res)) {
            echo"<div class='comments'><p class='name'>{$row['name']}</p>
            <p class='comm'> {$row['comm']}</p>
           <p class='log'>{$row['logs']}</p>
           </div>";
        }

    }
?>    </div>  
    </div>
   </div>
   </div>
</body>

</html>
