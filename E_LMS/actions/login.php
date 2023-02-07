<?php
session_start();
include("../connect.php");

$email=$_POST['email'];
$pass=$_POST['pass'];

$sql="select * from `student` where email='$email' and pass='$pass'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result);
    $_SESSION["sid"]=$row["sid"];
    $_SESSION['email'] = $row["email"];
    $_SESSION["name"]=$row["name"];
header("location:../student/shome.php");

}
else{
    echo '<script>
    alert("Invalid credentials ! Try again...");
    window.location="../";
    </script>';
}

?>