<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LMS</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <nav>
        <label class="logo">E-Library</label>
        <ul>
            <li><a href="index.php" class=active>Home</a></li>
            <li><a href="./admin/adminlogin.php">librarian</a></li>
        </ul>
    </nav>
    <section>
        <div class="hero">
            <div class="form-box">
                <div class="btn-box">
                    <button id="login-btn" type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" id="register-btn" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <form id="login" class="input-group" action="./actions/login.php" method="post">
                    <input type="email" name="email" class="input-fields" placeholder="Email" required><br>
                    <input type="password" name="pass" class="input-fields" placeholder="Password"  required><br>
                    <button class="sbt-btn">Login</button>
                </form>
                <form id="register" class="input-group" action="./actions/register.php" method="post">
                    <input type="email" name="email" class="input-fields" placeholder="Email" pattern="[A-Za-z0-9._]+@[a-z0-9._]+\.[a-z0-9]{2,}$" required><br>
                    <input type="text" name="name" class="input-fields" placeholder="Name"  required><br>
                    <input type="password" name="pass" class="input-fields" placeholder="Password"  required><br>
                    <input type="password" name="cpass" class="input-fields" placeholder="Confrim password"  required><br>
                    <input type="text" name="dno" class="input-fields" id="dno" placeholder="D No"  required><br>
                    <input type="tel" name="phone" class="input-fields" placeholder="Mobile No" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required><br>
                    <button name="submit" class="sbt-btn">Register</button>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var l = document.getElementById("login-btn");
            var r = document.getElementById("register-btn");

            function register() {
                x.style.display = "none";
                y.style.display = "block";
                l.style.background = "none";
                l.style.color = "black";
                r.style.backgroundImage = "linear-gradient(to right,#ff105f,#ffad06)";
                r.style.borderRadius = "30px";
                r.style.color = "white";
            }

            function login() {
                x.style.display = "block";
                y.style.display = "none";
                r.style.background = "none";
                r.style.color = "black";
                l.style.backgroundImage = "linear-gradient(to right,#ff105f,#ffad06)";
                l.style.borderRadius = "30px";
                l.style.color = "white";

            }
        </script>
    </section>
    <footer>

    </footer>
</body>

</html>