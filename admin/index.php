<?php include('db.php') ?>
<?php
date_default_timezone_set('Asia/Dhaka');
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

<div class="home_header print-hidden">
        <h2>Admin Panel</h2>
    </div>
    <div class="home_content">
        <div class="print-hidden">
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
    <br>
    <center>

    </div>
        <div class="print-visible">
            <!-- OTM Table -->
            <?php
            $s = mysqli_query($con, "select * from otm order by sl_no");
            ?>

<table width="100%" class="table-bordered m-auto text-center" id="data-table">
                <tr class="bg-success">
                    <th colspan="14">OTM</th>
                </tr>
                <tr>
                    <th>Sl. No</th>
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
                    <th class="print-hidden">Edit</th>
                    <th class="print-hidden">Del</th>
                </tr>

                <?php
              while ($r = mysqli_fetch_array($s)) {
                $closingTime = strtotime($r['c_date_t']);
                $currentTime = time();
                $rowClass = ($currentTime >= $closingTime) ? 'closed' : '';
            
                ?>
                    <tr class="<?php echo $rowClass; ?>">
                        <td class="text-center h6">
                            <?php echo $r['sl_no']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['id']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['name_work']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['s_rate']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['bd']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['l_sell_time']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['l_secure_time']; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['c_date_t']; ?>
                        </td>
                        <td class="text-center h6">
    <?php echo $r['s_ex'] . " Crore"; ?>
</td>
                        <td class="text-center h6">
                            <?php echo $r['yto'] . " Crore";; ?>
                        </td>
                        <td class="text-center h6">
                            <?php echo $r['credit_l'] . " Crore";; ?>
                        </td>
                        <td class="text-center h6 ">
                            <?php echo $r['tender_c'] . " Crore";; ?>
                        </td>
                        <td class="print-hidden">
    <a class="btn" href="editOTM.php?i=<?php echo $r['sl_no']; ?>">✏️</a>
</td>
<td class="print-hidden">
    <a class="btn" href="delOTM.php?i=<?php echo $r['sl_no']; ?>">✖</a>
</td>

                    </tr>
                <?php
                }
                ?>
            </table>
    
        
<br>

     

    <?php

include('db.php');
     $s= mysqli_query($con,"select * from ltm order by sl_no  ");
     ?>

<table width="100%" class="table-bordered m-auto text-center" id="data-table">
    <tr class="bg-success"><th colspan="14">LTM</th></tr>
    <tr>
        <th>Sl. No</th>
        <th>ID</th>
        <th>Name of Work</th>
        <th>Schedule Rate</th>
        <th>BD</th>
        <th>Last Sell Time</th>
        <th>Last Secure Time</th>
        <th>Closing Date Time</th>
        <th>Liquid</th>
        <th>Estimate Cost</th>
        <th class="print-hidden">Edit</th>
        <th class="print-hidden">Del</th>
    </tr>

    <?php
                while ($r = mysqli_fetch_array($s)) {
                    $closingTime = strtotime($r['c_date_t']);
                    $currentTime = time();
                    $rowClass = ($currentTime > $closingTime) ? 'closed' : '';
                    ?>
                    <tr class="<?php echo $rowClass; ?>">
             <td class="text-center h6">
                 <?php echo $r['sl_no']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['id']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['name_work']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['s_rate']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['bd']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['l_sell_time']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['l_secure_time']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['c_date_t']; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['liquid'] . " Lakh";; ?>
             </td>
             <td class="text-center h6">
                 <?php echo $r['est_cost']; ?>
             </td>
             <td class="print-hidden">
    <a class="btn" href="editLTM.php?i=<?php echo $r['sl_no']; ?>">✏️</a>
</td>
<td class="print-hidden">
    <a class="btn" href="delLTM.php?i=<?php echo $r['sl_no']; ?>">✖</a>
</td>
             </tr>
               <?php
         }
         ?>
   
</table>
    
        </div>

    </center>
    <center>

  
    <button id="printButton" class="btn btn-primary print-hidden">Print OTM and LTM Tables</button>
      <br>
                <a class="print-hidden" href="index.php?logout='1'" style="color: red;">
                    Logout
                </a>
            </center>
        </div>
        <br>
        <center> <div class="fixed print-only"><p>এখানে E-GP এর যাবতীয় কাজ করা হয়। নেসার্স সিনথি নিউটেক, প্রোঃ রাসেল ইনাম শান্ত, নিউমার্কেট, শেরপুর টাউন, শেরপুর-২১০০। নোবাইলঃ ০১৭২৩-৬০১৯৩৮/০১৬১২-৩৮৭৮৪২ শান্ত</p></div></center>
           
            <script>
document.getElementById("printButton").addEventListener("click", function() {

    // Hide elements you don't want to print
    var elementsToHide = document.querySelectorAll(".print-hidden");
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = "none";
    }

    // Show the tables you want to print
    var tablesToShow = document.querySelectorAll(".print-visible");
    for (var i = 0; i < tablesToShow.length; i++) {
        tablesToShow[i].style.display = "table"; // Show tables
    }

    // Apply landscape mode for printing
    var style = document.createElement("style");
    style.innerHTML = "@page { size: landscape; }";
    document.head.appendChild(style);

    // Trigger the print dialog
    window.print();
 
    // Remove the landscape mode CSS
    document.head.removeChild(style);

    // Restore the original display styles
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = "table-cell"; // Restore original display style
    }
    for (var i = 0; i < tablesToShow.length; i++) {
        tablesToShow[i].style.display = "none"; // Hide tables
    }

    
});
</script>


    </body>
</html>
