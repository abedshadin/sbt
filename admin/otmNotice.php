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
        <h2>OTM Notice</h2>
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
<center><button class="btn btn-success" type="button" onclick="addForm()">Add Form</button></center>
<br>

<form action="" method="POST" id="data-form">

<table class="table-bordered m-auto text-center" id="data-table">
    <tr>
        <th>ID</th>
        <th>Name of Work</th>
        <th>Schedule Rate</th>
        <th>BD</th>
        <th>Last Sell Time</th>
        <th>Last Secure Time</th>
        <th>Closing Date Time</th>
        <th>Similar Experience</th>
        <th>YTO</th>
        <th>Credit Line</th>
        <th>Tender Capacity</th>
    </tr>
    <tr>
    <td><input type="text" name="id[]"  ></td>
<td><textarea type="text" name="name_work[]"  ></textarea></td>
<td><input type="text" name="s_rate[]"  ></td>
<td><input type="text" name="bd[]"  ></td>
<td><input type="datetime-local" class="w-100" name="l_sell_time[]"  ></td>
<td><input type="datetime-local" class="w-100" name="l_secure_time[]"  ></td>
<td><input type="datetime-local" class="w-100" name="c_date_t[]"  ></td>
<td><input type="text" name="s_ex[]"  ></td>
<td><input type="text" name="yto[]"  ></td>
<td><input type="text" name="credit_l[]"  ></td>
<td><input type="text" name="tender_c[]"  ></td>
<td><select name="loc[]" >
    <option value="">Select</option>
    <option value="Sherpur">Sherpur</option>
    <option value="Jamalpur">Jamalpur</option>
</select></td>

    </tr>
</table>
<br>
<CENTER><input style="width:150px; height:40px" type="submit" name="mod" value="Submit" /></p></CENTER>

</form>
<?php
include('db.php');
if (isset($_POST['mod'])) {
    // Retrieve form data as arrays
    $id = $_POST["id"];
    $name_work = $_POST["name_work"];
    $s_rate = $_POST["s_rate"];
    $bd = $_POST["bd"];
    $l_sell_time = $_POST["l_sell_time"];
    $l_secure_time = $_POST["l_secure_time"];
    $c_date_t = $_POST["c_date_t"];
    $s_ex = $_POST["s_ex"];
    $yto = $_POST["yto"];
    $credit_l = $_POST["credit_l"];
    $tender_c = $_POST["tender_c"];
    $loc = $_POST["loc"];

    // Loop through the arrays and insert data into the database
    foreach ($id as $key => $value) {
        $formatted_l_sell = date("d-M-Y H:i", strtotime($l_sell_time[$key]));
        $formatted_l_secure_time = date("d-M-Y H:i", strtotime($l_secure_time[$key]));
        $formatted_c_date_t = date("d-M-Y H:i", strtotime($c_date_t[$key]));
        
        $query = "INSERT INTO otm (id, name_work, s_rate, bd, l_sell_time, l_secure_time, c_date_t, s_ex, yto, credit_l, tender_c, loc) 
                  VALUES ('$value', '{$name_work[$key]}', '{$s_rate[$key]}', '{$bd[$key]}', '$formatted_l_sell', '$formatted_l_secure_time', '$formatted_c_date_t', '{$s_ex[$key]}', '{$yto[$key]}', '{$credit_l[$key]}', '{$tender_c[$key]}','{$loc[$key]}')";
        
        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Data has been added successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    
    }
}




    ?>
    
    <center>
      
      <br>
                <a href="index.php?logout='1'" style="color: red;">
                    Logout
                </a>
            </center>
            <script>
            function addForm() {
    // Get the number of existing rows
    var rowCount = document.querySelectorAll('#data-table tr').length;

    // Create a new table row for the form
    var newRow = document.createElement("tr");
    
    // Define the HTML for the form fields with unique names
    var formFields = `
        <td><input type="text" name="id[]"  ></td>
        <td><textarea type="text" name="name_work[]"  ></textarea></td>
        <td><input type="text" name="s_rate[]"  ></td>
        <td><input type="text" name="bd[]"  ></td>
        <td><input type="datetime-local" class="w-100" name="l_sell_time[]"  ></td>
        <td><input type="datetime-local" class="w-100" name="l_secure_time[]"  ></td>
        <td><input type="datetime-local" class="w-100" name="c_date_t[]"  ></td>
        <td><input type="text" name="s_ex[]"  ></td>
        <td><input type="text" name="yto[]"  ></td>
        <td><input type="text" name="credit_l[]"  ></td>
        <td><input type="text" name="tender_c[]"  ></td>
        <td><select name="loc[]" >
    <option value="">Select</option>
    <option value="Sherpur">Sherpur</option>
    <option value="Jamalpur">Jamalpur</option>
</select></td>
    `;
    
    // Set the innerHTML of the new row to the form fields
    newRow.innerHTML = formFields;
    
    // Append the new row to the table
    document.getElementById("data-table").appendChild(newRow);
}


</script>

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
    </body>
    </html>