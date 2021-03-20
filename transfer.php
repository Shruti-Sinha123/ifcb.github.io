<?php
session_start();
$sender=$_SESSION["Name"];

include('connection.php');
//selecting data to show
$sql = "SELECT * FROM `customer`";
$result = mysqli_query($conn, $sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
  .home:hover{
    background-color: #99ccff;
    color:#0033cc;
}
.btn  {
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
<body background="https://png.pngtree.com/thumb_back/fw800/back_our/20190623/ourmid/pngtree-sky-blue-background-download-image_251426.jpg" vlink="#000066">
<div style="background : rgba(204,204,204,0.7); margin-left:7%; width:40% ;padding: 10px 12px ;  border-radius: 10px">
<div class="boxdis">
    <section class="container transfer">
        <form action="transfer_complete.php" method="POST">
            <label for="SName"><b>Sender:</b></label><br><br><br>
            <select name="SName" id="SName">
                <option value="<?php echo $sender;?>" selected><?php echo $sender;?>
                </option>
            </select>
            <br>

            <label for="RName"><b>Select a user to start transaction</b></label><br><br><br>
            <select name="RName" id="RName">
                <option value="" disabled selected>Select reciever</option><br><br><br><br>
                <?php
                    $query = "SELECT * FROM `customer` ORDER BY `customer`.`Name` ASC";
                    $query_run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                    }
                    mysqli_close($conn);
                ?>
            </select><br>
            <label for="amount"><b>Enter the amount to transfer :</b></label><br><br>
            <input type="number" name="amount" id="amount" placeholder="Amount">
            <center>
                <button class="btn" type="submit" id="amount_value">Submit</button><br><br>
                <a href="select_user.php" class="home">Back</a>
            </div>
            </center>
        </form>
    </section>
    </font>
    
</body>
</html>