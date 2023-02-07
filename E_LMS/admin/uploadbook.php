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
    <link rel="stylesheet"type="text/css"  href="../css/uploadbook.css">  
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
    <div class="heading"> 
    <h1>Upload Books</h1>
    </div>
    <div class="container">
    <form action="<?php  $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
        <label for="btitle">Book Title:</label><br>
        <input type="text" name="btitle"  required><br>
        <label for="author">Author:</label><br> 
        <input type="text" name="author"  required><br>
        <label for="genres">Genres:</label><br>
        <select name="genres"  required>
            <option value="">Select Genre</option>
            <option value="novel">Novel</option>
            <option value="art & photography">Art & Photography</option>
            <option value="children">Children</option>
            <option value="biography">Biography</option>
            <option value="history">History</option>
            <option value="science & technology">Science & Technology</option>
        </select><br>
        <label for="keyword">Keywords:</label><br>
        <textarea name="keyword"  required></textarea><br>
        <label for="efile">Upload Book:</label><br>
        <input type="file" name="efile" id="inputfile" accept=".pdf" required><br>
        <label for="efile">Upload Image:</label><br>
        <input type="file" name="image" id="inputfile" accept=".jpeg,.img,.png,.jpg" required><br>
        <button type="submit" name="submit">Upload book</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
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
        $sql="select * from `book` where btitle='$btitle'";
        $result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    echo '<script>
    alert("Book Title is already exist");
    window.location="uploadbook.php";
    </script>';
} else {
            if (move_uploaded_file($temp_filename, "../uploads/" . $efile)) {
                if (move_uploaded_file($temp_imgname, "../uploads/" . $img)) {
                    $result = mysqli_query($con, "insert into book (btitle,author,genre,keywords,file,img)values('$btitle','$author','$genre','$keyword','$efile_name','$img_name')");
                    echo "<p style='color:green'>Uploaded Successfully</p>";
                }
            } else {
                echo "<p style='color:red'>Uploade error </p>";

            }
        }
}

?>
    </div>
   </div>
</body>
</html>
