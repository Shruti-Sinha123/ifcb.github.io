<?php 

include('connection.php');

//selecting data to show
$sql = "SELECT * FROM `customer`";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
   
    <link rel="stylesheet" href="base.css"><font face="Segoe UI Light">
</head>
<body background ="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066" background="bg.jpg">
<section class="container">
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 12px ;  border-radius: 5px">
<div class="boxdis">
<center>
<font size="5" color="#000099"><b>List of The Customers</b></font>
<table cellpadding="10" cellspacing="10" style="color:#000066">
 <tr style="background-color:#33ccff">
                    <th colspan="1"><b>Sno.</th></b>
                    <th colspan="1"><b>Name</th></b>
                    <th colspan="1"><b>Email</th></b>
                    <th colspan="1"><b>Current Balance</th></b>
                </tr>
                <?php 
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        echo "<tr>
                        <td scope='row'>". $sno . "</td>
                        <td>". $row['Name'] . "</td>
                        <td>". $row['Email'] . "</td>
                        <td>". $row['Current_Balance'] . "</td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
        <center>
        <div class="boxdis">
            <a href="./select_user.php" class=".btn"><b>Select The User</b></a><br><br><br>
            <a href="http://localhost/myweb/home.php"class=".btn"><b>Back To Main Page</b></a>

        </div>
	</section>
</center>
</font>
</body>
</html>