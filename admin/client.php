<?php include('db.php') ?>
<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['admin_name'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_name']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Admin Panel</title>
</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./otm.css">

</head>
<body>

<div class="home_header">
        <h2>Add Client</h2>
    </div>
    <div class="home_content">
    <?php


$s= mysqli_query($con,"select * from modal ORDER BY id DESC limit 1");


 while($r = mysqli_fetch_array($s)){

               echo "<marquee style='color: #3c763d; font-weight:700;'>" . $r["News"]. "</marquee>";
             }


?>
    
    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <p>
                Hello
                <strong>
                    <?php echo$_SESSION['admin_name'];?>
                </strong>, Welcome to our site.
            </p>
            <?php
$search_value=$_SESSION["admin_name"];



?>


<center>
<a class="btn btn-primary" href="index.php">Dashboard <span class="sr-only"></span></a> &nbsp;&nbsp;&nbsp;
<a class="btn btn-primary" href="client.php">Client</a>&nbsp;&nbsp;&nbsp;
<a class="btn btn-primary " href="notice.php">Notice</a>&nbsp;&nbsp;&nbsp;
</center>


<br>

<form action="" method="POST" id="data-form">

<table class="table-bordered m-auto text-center w-100" id="data-table">
    <tr>
        <th>Name</th>
        <th>Firm Name</th>
        <th>Photo</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    
    </tr>
    <tr>
    <td><input type="text" name="name" class="w-100" ></td>
<td><input type="text" name="f_name"  class="w-100"></td>
<td><input type="text" name="photo"  class="w-100"></td>
<td><input type="text" name="email"  class="w-100"></td>
<td><input type="text" name="phone"  class="w-100"></td>
<td><input type="text" name="address"  class="w-100"></td>



    </tr>
</table>
<br>
<CENTER><input style="width:150px; height:40px" type="submit" name="mod" value="Submit" /></p></CENTER>

</form>
<?php
include('db.php');
if (isset($_POST['mod'])) {
    $name = $_POST['name'];
    $f_name = $_POST['f_name'];
    $photo = $_POST['photo'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Separate the values with commas inside the VALUES clause
    $query = "INSERT INTO client (name, f_name, photo, email, phone, address) 
              VALUES ('$name', '$f_name', '$photo', '$email', '$phone', '$address')";
    
    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Data has been added successfully";
        header("location: client.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

    
    <center>
      
      <br>
                <a href="index.php?logout='1'" style="color: red;">
                    Logout
                </a>
            </center>
           
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
    </body>
    </html>