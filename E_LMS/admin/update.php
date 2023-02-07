<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['aid']))
{
 header("location:adminlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LMS</title>
    <link rel="stylesheet"type="text/css"  href="../css/update.css">  
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   <nav>
    <label class="logo">E-Library</label>
    <ul>
            <li><a href="viewbook.php" class='active'>Back</a></li>
    </ul>
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
   <div class="heading"> 
   <h1>Update Details</h1>
   </div>
   <div class="container">
   <?php
   $res = mysqli_query($con, "select * from book where bid='" . $_GET["bid"] . "'");
   $row = mysqli_fetch_array($res);
   ?>
   <form action="<?php  $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
   <label for="btitle">Book Title:</label><br>
        <input type="text" name="btitle" required value="<?php echo $row["btitle"]?>"><br>
        <label for="author">Author:</label><br> 
        <input type="text" name="author" value="<?php echo $row["author"]?>"><br>
        <label for="genres">Genres:</label><br>
        <select name="genres"  required>
            <option value="others">Select Genre</option>
            <option value="novel"<?php if ($row["genre"] == 'novel') {
            echo "selected";
            }?>>Novel</option>
            <option value="art & photography"<?php if ($row["genre"] == 'art & photography') {
            echo "selected";
            }?>>Art & Photography</option>
            <option value="children"<?php if ($row["genre"] == 'children') {
            echo "selected";
            }?>>Children</option>
            <option value="biography"<?php if ($row["genre"] == 'biography') {
            echo "selected";
            }?>>Biography</option>
            <option value="history"<?php if ($row["genre"] == 'history') {
            echo "selected";
            }?>>History</option>
            <option value="science & technology"<?php if ($row["genre"] == 'science & technology') {
            echo "selected";
            }?>>Science & Technology</option>
        </select><br>
        <label for="keyword">Keywords:</label><br>
        <textarea name="keyword"  required><?php echo $row["keywords"]?></textarea><br>
        <label for="efile">Upload Book:</label><br>
        <input type="file" name="efile" id="inputfile" accept=".pdf"><br>
        <label for="efile">Upload Image:</label><br>
        <input type="file" name="image" id="inputfile" accept=".jpeg,.img,.png,.jpg"><br>
        <button type="submit" name="submit">Save</button>
   </form>
   </div>
   </div>
   </div>
   <?php error_reporting(0);
           $btitle = $_POST['btitle'];
           $author = $_POST['author'];
           $genre = $_POST['genres'];
           $keyword = $_POST['keyword'];
           $efile = $_FILES["efile"]["name"];
           $temp_filename = $_FILES["efile"]["tmp_name"];
           $efile_name = "../uploads/" . $efile;
           $img=$_FILES["image"]["name"];
           $temp_imgname = $_FILES["image"]["tmp_name"];
           $img_name = "../uploads/" . $img;

           if(isset($_POST["submit"])){
            $res=mysqli_query($con,"update book set btitle='$btitle',author='$author',genre='$genre',keywords='$keyword' where bid='".$_GET["bid"]."'");
            if(!is_null($efile)){
           move_uploaded_file($temp_filename,"../uploads/" . $efile);
           $res=mysqli_query($con,"update book set file='$efile_name' where bid='".$_GET["bid"]."'");
            }
            if(!is_null($img)){
           move_uploaded_file($temp_imgname, "../uploads/" . $img);
                $res=mysqli_query($con,"update book set img='$img_name' where bid='".$_GET["bid"]."'");
                 }
                 echo '<script>
                 alert("Update Successfully");
                 window.location="viewbook.php";
                 </script>';
           }
   ?>
</body>

</html>