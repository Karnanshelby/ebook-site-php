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
    <link rel="stylesheet"type="text/css"  href="../css/sviewbook.css">  
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    if (isset($_POST["submit"])) {
        $search = $_POST["search"];
    }
    ?>
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
                <form action="sviewbook.php" method="post">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="search" name="search" class="input" placeholder="Search book" value="<?php echo $search;?>" required>
                    <button name="submit" onclick="searchbook()">Search</button>
                </form>
    </div>
    <div class="books" >
                <?php
                if (isset($_POST["submit"])) {
                    $search = $_POST["search"];
                    $res = mysqli_query($con, "select * from book where btitle like '%$search%' or keywords like '%$search%'");
                    if (mysqli_num_rows($res) > 0) {

                        $i = 0;
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<div class='book_box'>";
                            $i++;
                ?>
                        <?php echo "<a href=" . $row['file'] . " target ='_blank'><img src=" . $row['img'] . " alt='book image' width='200px' height='250px'>
    <p>Book:" . $row['btitle'] . "<br>
    <a id='comment' href='comment.php?id={$row['bid']}'><i class='fas fa-comment'></i>comment</a>
    </p>
    </a> ";
                            echo " </div>";
                        } ?>
                <?php
                    } else {
                        echo " <h2>No Books Found...!</h2>";
                    }
                }

                ?>
            </div>
   </div>
   </div>
</body>

</html>
