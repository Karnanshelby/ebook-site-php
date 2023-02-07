<?php
session_start();
include('../connect.php');

$aname=$_POST['aname'];
$apass=$_POST['apass'];

$sql="select * from `admin` where aname='$aname' and apass='$apass'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result);
    $_SESSION["aid"]=$row["aid"];
    $_SESSION["aname"]=$row["aname"];
header("location:../admin/ahome.php");

}
else{
    echo '<script>
    alert("Invalid credentials ! Try again...");
    window.location="../admin/adminlogin.php";
    </script>';
}
?>