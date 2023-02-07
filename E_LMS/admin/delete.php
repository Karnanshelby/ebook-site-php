<?php
include("../connect.php");

$res=mysqli_query($con,"delete from book where bid='".$_GET["bid"]."'");

if($res){
    header("location:viewbook.php");
}
else{
    echo '<script>
    alert("Book Not Deleted");
    window.location="viewbook.php";
    </script>';
}
?>