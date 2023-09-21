<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./otm.css">

</head>
<body>
    <div class="home_header">
        <h2>Login Here!</h2>
    </div>
    <center>
<div class="home_content ">
    <form method="post" class="m-auto text-center" action="login.php">
<div class="error">

After Registar Need Admin Approval For Login
</div>
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Enter Username</label><br>
            <input type="text" name="admin_name" >
        </div>
        <div class="input-group">
            <label>Enter Password</label><br>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-primary"
                        name="login_admin">
                Login
            </button>
        </div>
   



<p>
            New Here?
            <a href="register.php">
                Click here to register!
            </a>
        </p>



    </form>
    </div>
    </center>
  
</body>

</html>
