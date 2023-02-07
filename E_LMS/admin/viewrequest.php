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
   <h1>New Books</h1>
   <?php
   $res = mysqli_query($con, "select student.name,request.mes,request.logs from student inner join request on student.sid=request.sid where request.req='new book'");
   if (mysqli_num_rows($res) > 0) {
       echo "<table>
   <tr>
   <th>S.no</th>
   <th>Name</th>
   <th>Message</th>
   <th>Logs</th>
   </tr>";
   $i=0;
   while($row=mysqli_fetch_array($res))
   {
    $i++;
    echo"<tr><td>".$i."</td>";
    echo"<td>".$row['name']."</td>";
    echo"<td>".$row['mes']."</td>";
    echo"<td>".$row['logs']."</td></tr>";
   }

  echo " </table>";
   }
   else{
       echo "<p>No Request Records Found..!</p>";
   }
   ?>
   <h1>Unable to open</h1>
   <?php
   $res = mysqli_query($con, "select student.name,request.btitle,request.logs from student inner join request on student.sid=request.sid where request.req='unable'");
   if (mysqli_num_rows($res) > 0) {
       echo "<table>
   <tr>
   <th>S.no</th>
   <th>Name</th>
   <th>Btitle</th>
   <th>Logs</th>
   </tr>";
   $i=0;
   while($row=mysqli_fetch_array($res))
   {
    $i++;
    echo"<tr><td>".$i."</td>";
    echo"<td>".$row['name']."</td>";
    echo"<td>".$row['btitle']."</td>";
    echo"<td>".$row['logs']."</td></tr>";
   }

  echo " </table>";
   }
   else{
       echo "<p>No Request Records Found..!</p>";
   }
   ?>
   </div>
   </div>
</body>

</html>