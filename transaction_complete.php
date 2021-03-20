<?php
 
 include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="base.css">
</head>
<body background="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066" text="#0000cc">
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 16px ;  border-radius: 15px">
<div style=" left: 42%;background-color:black; color:white ; text-align: center; padding: 14px 16px;">
<section>
        <div>
            <table class="center">
                <tr>
                    <th>Sno.</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
                <?php 
                 $sql = "SELECT * FROM transfer_complete";
                 $result = mysqli_query($conn, $sql);
                 $nums=mysqli_num_rows($result);
                    $sno = 0;
                    while($row=mysqli_fetch_array($result)){

                        $sno = $sno + 1;
                        echo "<tr>
                        <th scope='row'>". $sno . "</th>
                        <td>". $row['Sender'] . "</td>
                        <td>". $row['Receiver'] . "</td>
                        <td>". $row['Amount'] . "</td>
                        <td>". $row['Time'] . "</td>
                        </tr>";
                    }
                ?>


            </table>
        </div>
	</section>
</body>
</html>