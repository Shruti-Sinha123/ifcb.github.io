<?php

include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="base.css"><font face="Segoe UI Light">
</head>
<body background ="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066" text="#0000cc"> 
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 16px ;  border-radius: 15px">
    <div class="container final center">
        
        <?php

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $sender = $_POST['SName'];
                $receiver = $_POST['RName'];
                $amount = $_POST['amount'];
            }

            if( $sender != $receiver && $amount>0){
                $sender_query = "SELECT * FROM customer WHERE Name ='$sender'";
                $sConn = mysqli_query($conn,$sender_query);
                $sResult=mysqli_fetch_assoc($sConn);
                $sBalance=$sResult['Current_Balance'];
                
                if($amount<$sBalance){
                    $receiver_query = "SELECT * FROM customer WHERE Name ='$receiver'";
                    $rConn = mysqli_query($conn,$receiver_query);
                    $sResult = mysqli_fetch_array($rConn);
                    $rBalance = $sResult['Current_Balance'];

                    echo "<h1 class='success'> Congratulations!! Your Transaction Process Was A Success!</h1>
                    <p>Rs $amount has been deducted from your account and successfully transfered to $receiver.</p><br>";

                    $sBalance-=$amount;
                    $rBalance+=$amount;
                    
                    $sUpdate = "UPDATE `customer` SET `balance` = '$sBalance' WHERE `customer`.`Name` = '$sender';";
                    $senderLogUpdate=mysqli_query($conn,$sUpdate);

                    $rUpdate = "UPDATE `customer` SET `balance` = '$rBalance' WHERE `customer`.`Name` = '$receiver';";
                    $recevierLogUpdate=mysqli_query($conn,$rUpdate);

                    $history_query = "INSERT INTO `transfer_complete` (`sender`, `receiver`, `amount`, `time`) VALUES ('$sender', '$receiver', '$amount', current_timestamp())";
                    $history = mysqli_query($conn,$history_query);
                    
                }
                else echo "<h1 class='error'>Oops!!! Transaction Failed!</h1>
                <p>Insufficient balance. Please recharge your account to proceed further.</p>";
            }
            else if($sender == $receiver){
                echo "<h1 class='error'>Transaction Failed!</h1>
                <p>Sender and receiver cannot be same. Please select a different user.</p>";
            }
        ?>
        <a href='http://localhost/myweb/transfer.php' class=".btn">Back To Previous Page</a><br><br>
        <a href='./transaction_complete.php' class=".btn">Previous Transaction Details</a>
    </div>
</font>
</body>
</html>