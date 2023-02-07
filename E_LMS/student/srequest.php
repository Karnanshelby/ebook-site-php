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
    <link rel="stylesheet"type="text/css"  href="../css/srequest.css">  
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
   <div class="heading"> 
    <h1>Request Book</h1>
    </div>
    <div class="container">
    <form action="<?php  $_PHP_SELF ?>" method="post">
    <label for="keyword">Request:</label><br>
    <select name="report" onchange="allbook(this)" required>
        <option value="">Select Repot</option>
        <option value="new book">New Book</option>
        <option value="unable">Unable to open</option>
    </select><br><br>
        <?php
        $res = mysqli_query($con, "SELECT btitle FROM `book` ORDER BY btitle");
        ?>
        <select name="btitle" id="allbooks" class="books" required>
            <option value="">Select Book</option>
        <?php 
        while($row=mysqli_fetch_array($res))
        {
        ?>
            <option value="<?php echo $row["btitle"];?>"><?php echo$row["btitle"]?></option>
        <?php
        }
        ?>
        </select>
        <label for="keyword" id="lmsg">Message:</label>
        <textarea name="msg" id="msg" required></textarea>
        <button type="submit" name="submit">Send</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $msg = $_POST['msg'];
        $req= $_POST['report'];
        $btitle = $_POST['btitle'];
        $result = mysqli_query($con,"insert into request (sid,req,btitle,mes,logs)values({$_SESSION['sid']},'$req','$btitle','$msg',now())");
        echo "<p style='color:green'>Message Sent Successfully</p>";
    }
?>
<script>
    function allbook(answer){
        var x=document.getElementById('allbooks');
        var lm=document.getElementById('lmsg');
        var msg=document.getElementById('msg');
        console.log(answer.value);
        if(answer.value=='unable'){
            x.style.display="block";
            lm.style.display="none";
            msg.style.display="none";
            msg.removeAttribute('required');
        }
        else{
            x.style.display="none";
            lm.style.display="block";
            msg.style.display="block";
            allbooks.removeAttribute('required');
        }
    }
</script>
    </div>
   </div>
   </div>
</body>

</html>
