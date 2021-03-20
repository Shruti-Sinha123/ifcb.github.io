<?php

include('connection.php');

//selecting data to show
$sql = "SELECT * FROM `customer`";
$result = mysqli_query($conn, $sql);
// mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="base.css" <font face="Segoe UI Light">
</head>
<center>
<body background="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066" text="#0000cc">
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 12px ;  border-radius: 10px">
<div class="boxdis">
        <?php
        session_start();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $sender = $_POST['Name'];
                $_SESSION["Name"] = $sender;
                $query = "SELECT * FROM customer WHERE Name ='$sender'";
			    $result = mysqli_query($conn,$query);
			    $customer = mysqli_fetch_assoc($result);
                echo "<h1><u><i>Sender's Details</h1></u></i><br><br><br>
                <h2> Name: " .$sender. "</h2><br><br>
                <h2> Email: " .$customer['Email']. "</h2><br><br>
                <h2> Current Balance : " .$customer['Current_Balance']. "</h2><br>";
            }
        ?>

        <div class="container center">
		<a href="transfer.php" class=".btn">Transfer to &rarr;</a><br><br>
		<a href="select_user.php" class=".btn">Back To Previous Page</a>
	<div>

    </div>
    </font>
    </center>
</body>
</html>