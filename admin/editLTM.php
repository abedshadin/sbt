<?php
include('db.php');

session_start();

if (!isset($_SESSION['admin_name'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_name']);
    header("location: login.php");
}

if (isset($_GET['i'])) {
    $sl_no = $_GET['i'];

    // Fetch the LTM record to edit
    $query = "SELECT * FROM ltm WHERE sl_no = $sl_no";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Handle the form submission for editing
        if (isset($_POST['update'])) {
            // Retrieve updated data from the form
            $newData = array(
                'name_work' => $_POST['name_work'],
                's_rate' => $_POST['s_rate'],
                'bd' => $_POST['bd'],
                'l_sell_time' => $_POST['l_sell_time'],
                'l_secure_time' => $_POST['l_secure_time'],
                'c_date_t' => $_POST['c_date_t'],
                'liquid' => $_POST['liquid'],
                'est_cost' => $_POST['est_cost'],
            );

            // Build the SQL update query
            $updateQuery = "UPDATE ltm SET ";
            foreach ($newData as $field => $value) {
                $updateQuery .= "$field = '$value', ";
            }
            $updateQuery = rtrim($updateQuery, ', ') . " WHERE sl_no = $sl_no";

            if (mysqli_query($con, $updateQuery)) {
                $_SESSION['success'] = "Data has been updated";
                header("location: index.php");
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        }
    } else {
        echo "Record not found!";
    }
} else {
    echo "Invalid request!";
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
        <h2>Admin Panel</h2>
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
    <br>
<body>
    <h2>Edit LTM Record</h2>
    <form method="post" action="editLTM.php?i=<?php echo $sl_no; ?>">
        <!-- Display the current data for editing -->
        <label>Name of Work:</label>
        <input type="text" name="name_work" value="<?php echo $row['name_work']; ?>"><br>

        <label>Schedule Rate:</label>
        <input type="text" name="s_rate" value="<?php echo $row['s_rate']; ?>"><br>

        <label>BD:</label>
        <input type="text" name="bd" value="<?php echo $row['bd']; ?>"><br>

        <label>Last Sell Time:</label>
        <input type="text" name="l_sell_time" value="<?php echo $row['l_sell_time']; ?>"><br>

        <label>Last Secure Time:</label>
        <input type="text" name="l_secure_time" value="<?php echo $row['l_secure_time']; ?>"><br>

        <label>Closing Date Time:</label>
        <input type="text" name="c_date_t" value="<?php echo $row['c_date_t']; ?>"><br>

        <label>Liquid:</label>
        <input type="text" name="liquid" value="<?php echo $row['liquid']; ?>"><br>

        <label>Estimate Cost:</label>
        <input type="text" name="est_cost" value="<?php echo $row['est_cost']; ?>"><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
