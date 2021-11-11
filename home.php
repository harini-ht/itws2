<?php
session_start();
echo "<nav>
<div class='nav-left'>
    <h1>Welcome to Shopify <u>".$_SESSION['name'] ."</u>!!</h1>
</div>
<div class='nav-right'>
    <div class='info'>
        <p>&nbsp;  Your mail id :<b>".$_SESSION['mail'] ."</b></p>
        <p>&nbsp;  Your Mobile Number :<b>".$_SESSION['ph']."</b></p>
    </div>
</div>
</nav>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <br><br>  
    <div class="content">
            <div class="c1">
                <h1>All in one place!! <br>Explore the new Arrivals.</h1>
                <p>For more click on the Explore button.</p>
                <a href="#" class="exp">Explore Now &raquo;</a>
            </div>
            <div class="c2">
                <img src="images/quote.jpg">               
            </div>
    </div>
    <br>
    <nav style="font-size:20px;">
        <div class = "nav-left">
            <p><a href="logout.php">Logout</a></p>          
        </div> 
        <div class="nav-right" style ="margin-top:28px;">
            <form action="delete.php" method = "post">
                <input type="submit" id="signupbtn" value="Delete my account" style = "font-weight:100;">
            </form>
        </div>  
    </nav>
    
    
</body>
</html>