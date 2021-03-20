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
    <link rel="stylesheet" href="base.css"><font face="Segoe UI Light">
    <style>
.btn:hover,
  .home:hover {
    background-color: #99ccff;
    color:#0033cc
}
.btn {
    background-color:#99ccff ;
    color: #0033cc;
    border: 2px solid black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition: background-color 0.7s ease;
    cursor: pointer;
    border-radius: 15px;
}  
  input[type=text] {
    padding: 10px 15px;
    margin: 8px 0;
    border: 2px solid black;
    border-radius: 15px;
}  
select {
    padding: 8px 8px;
    border: none;
    border-radius: 4px;
    background-color:#99ccff ;
    color:#0033cc;
}   
</style>

</head>
<body background="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066"background="bg.jpg">
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 12px ;  border-radius: 10px">
<div class="boxdis">
<center>
<table cellpadding="10" cellspacing="10" style="color:#2d2db9">
    <section class="container">
        <form action="single_users.php" method="POST">
            <section>

                <div>
                <table cellpadding="10" cellspacing="10" style="color:#2d2db9">
                  <tr style="background-color:#33ccff">
                            <th>Sno.</th>
                            <th>Name</th>
                            <th>Current Balance</th>
                   </tr>
                        <?php 
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;
                                echo "<tr>
                                <td scope='row'>". $sno . "</td>
                                <td>". $row['Name'] . "</td>
                                <td>". $row['Current_Balance'] . "</td>
                                </tr>";
                            }
                                
                        ?>
                    </table>
                </div>
                </font>
            </section>
            <section class="container drop-down">
            <br><br>
                <label for="Names"><font size="5" color="#000099"><b>Select The User from Whom to Start Transaction : </b></font></label><br><br><br>
                <select name="Name" id="Name">
                    <option value="" disabled selected>Select User</option><br><br><br><br>
                    <?php
                        $query = "SELECT * FROM `customer` ORDER BY `customer`.`Name` ASC";
                        $query_run = mysqli_query($conn, $query);
            
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                        }
                        mysqli_close($conn);
                    ?>
                </select><br><br>
                <div class="container">
                    <button class="btn"><li style="float:right">Submit</button><br><br><br>
                    <a href="home1.php" class="home"> Back To Home</a> 
                </div>
            </section>
        </form>
    </section>
</body>
</html>
