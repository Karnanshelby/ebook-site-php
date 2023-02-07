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
    <link rel="stylesheet"type="text/css"  href="../css/viewrequest.css">  
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
   <h1>Comments Details</h1>
   <?php
   $res = mysqli_query($con, "select book.btitle,student.name,comment.comm,comment.logs from comment inner join book on book.bid=comment.bid inner join student on student.sid=comment.sid;");
   if (mysqli_num_rows($res) > 0) {
       echo "<table>
   <tr>
   <th>S.no</th>
   <th>Book Title</th>
   <th>Name</th>
   <th>Comment</th>
   <th>Logs</th>
   </tr>";
   $i=0;
   while($row=mysqli_fetch_array($res))
   {
    $i++;
    echo"<tr><td>".$i."</td>";
    echo"<td>".$row['btitle']."</td>";
    echo"<td>".$row['name']."</td>";
    echo"<td>".$row['comm']."</td>";
    echo"<td>".$row['logs']."</td></tr>";
   }

  echo " </table>";
   }
   else{
       echo "<p>No Comment Records Found..!</p>";
   }
   ?>
   </div>
   </div>
</body>

</html>