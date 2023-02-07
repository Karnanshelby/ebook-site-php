<?php
session_start();
unset($_SESSION["aid"]);

header("location:index.php")
?>