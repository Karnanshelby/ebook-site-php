<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LMS</title>
    <link rel="stylesheet"type="text/css"  href="../css/adminlogin.css">
</head>
<body>
   <nav>
    <label class="logo">E-Library</label>
    <ul>
        <li ><a href="../index.php" >Home</a></li>
        <li><a href="./admin/adminlogin.php"class=active>librarian</a></li>
    </ul>
   </nav>
   <section>
    <div class="container">
        <h1>Login</h1>
    <form action="../actions/alogin.php" method="post">
        <input name="aname" type="text" placeholder="Username"  required><br>
        <input name="apass" type="password" placeholder="Password" required><br>
        <button type="submit" class="btn" name="submit">Login</button>
    </form>
    </div>
   </section>
</body>
</html>