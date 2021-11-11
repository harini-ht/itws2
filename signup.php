<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $to_insert = TRUE;
        if(isset($_REQUEST['mail'])){
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $pswd = $_POST['pswd'];
        $ph = $_POST['mobile'];
        
        $con = new mysqli("localhost","root","","customers");

        if($con->connect_errno)
            echo "<br>Failed connection";

        $sql = "select * from user_info;";
        $result = $con->query($sql);
        
        //if mail already exist in database do not insert. 
        while($row = $result->fetch_assoc())
        {
            if($row['mail'] == $_POST['mail'])
            {
                $to_insert =FALSE;
                echo "<br>Account already exist. Please <a href='login.php'>Login Here.</a>";
                break;
            }
        }


        if($to_insert)
        {
            $sql = "insert into user_info values('$name','$mail','$pswd','$ph');";
            $res = $con->query($sql);
            
            if($res == TRUE)
                echo "<div class='form-block' id = 'loginform' >
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
            else
                echo "<br>Error in Signing up.";
        } 
        }  else{        
    ?>

    <div id="signupform">
        <h1>&nbsp;Sign Up</h1>
        <hr>
        <form method="POST" class="form-block" action = "">        
            <table style="margin:5px" cellspacing = "10px">
                <tr><td><br></td></tr>
                <tr>
                    <td><label><b>Name</b></label></td>
                    <td><input type="text" name = "name" id="name" required></td>
                </tr>
                <tr>
                    <td><label><b>Email Id</b></label></td>
                    <td><input type="email" name = "mail" id="email" required></td>
                </tr>
                <tr>
                    <td><label><b>Password</b></label></td>
                    <td><input type="password" name="pswd" id="pwd" required></td>
                </tr>
                <tr>
                    <td><b>Mobile Number</b></td>
                    <td><input type="tel" name = "mobile" id="ph" required/></td>
                </tr>
            </table>
            <br>
            <input type="submit" id = "signupbtn" name = "signup" value="Sign Up">
        </form>
        <br><center>Already have an account? <a href = "login.php">Login</a><br><br></center>
    </div>
    <?php }  ?>
</body>
</html>