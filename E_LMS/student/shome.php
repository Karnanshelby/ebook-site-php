<?php
session_start();
include "../connect.php";
if (!isset($_SESSION['sid'])) {
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
    <link rel="stylesheet" type="text/css" href="../css/shome.css">
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
                    <li><a href="shome.php"><i class='fas fa-home'></i>Home</a></li>
                    <li><a href="srequest.php"><i class="fa fa-share" aria-hidden="true"></i>Request Book</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </aside>
        </div>
        <div class="wrapper">
            <div class="search_box">
                <form action="sviewbook.php" method="post">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="search" name="search" class="input" placeholder="Search book" required>
                    <button name="submit" onclick="searchbook()">Search</button>
                </form>
            </div>
            <div class="list" id="genre">
                <a href="novel.php"><img src="../uploads/novel.png" alt="novel" height="250px" width="350px">
                    <h2>Novel</h2>
                </a>
                <a href="art.php"><img src="../uploads/art & photo.jpg" alt="art & photo" height="250px" width="350px">
                    <h2>Art & Photography</h2>
                </a>
                <a href="child.php"><img src="../uploads/child.jpg" alt="child" height="250px" width="350px">
                    <h2>Children</h2>
                </a>
                <a href="bio.php"><img src="../uploads/biography.jpg" alt="biography" height="250px" width="350px">
                    <h2>Biography</h2>
                </a>
                <a href="history.php"><img src="../uploads/history.jpg" alt="history" height="250px" width="350px">
                    <h2>History</h2>
                </a>
                <a href="science.php"><img src="../uploads/science.jpg" alt="science" height="250px" width="350px">
                    <h2>Science & Technology</h2>
                </a>
            </div>

        </div>
    </div>

</body>

</html>