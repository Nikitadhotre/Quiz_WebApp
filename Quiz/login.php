<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="C:\Gajanan files\Zere Hunger\bootstrap-4.0.0-dist">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div>
        <p>
        <h1><b>DIEMS Quiz Management System</b></h1>
        </p>
        <img src="Diems.jfif" id="logo"><br>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="login1.php" id="login_form" method="post">

                    <input type="text" class="form-control" name="name" placeholder="Name" required><br><br>
                    <input type="email" class="form-control" name="email"  placeholder="Email" required><br><br>
                    <input type="password" class="form-control" name="password"  placeholder="Password" required><br>
                    <select name="user_type" id="lgn" required>
                        <option value="student">Student</option>
                        <option value="faculty">Faculty</option>
                    </select><br><br>
                    <input type="checkbox" name="" id="remember">
                    <label for="">Remember Me</label>
                    <input type="submit" class="btn btn-primary" value="Login">
                    <br> <br>
                  

                </form>


            </div>
        </div>

    </div>
</body>
</html>
