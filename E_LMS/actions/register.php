<?php
include("../connect.php");

$name=$_POST['name'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$dno=$_POST['dno'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$d=strtoupper($dno);

$sql="select * from `student` where email='$email'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
  echo '<script>
  alert("Email already exist");
  window.location="../";
  </script>';
}
else{
if($pass!=$cpass)
{
  echo '<script>
  alert("password did not match");
  window.location="../";
  </script>';
}
else{
$sql="insert into `student`(name,pass,dno,email,phone) values('$name','$pass','$d','$email','$phone')";

$result=mysqli_query($con,$sql);

if($result){
    echo '<script>
    alert("Registration successful");
    window.location="../";
    </script>';
}
}
}
?>