<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_POST['mail'])){
        $mail = $_POST['mail'];
        $psw = $_POST['pswd'];
        $_SESSION['mail'] = $mail;
        $con = new mysqli("localhost","root","","customers");
        $sql = "select * from user_info where mail = '$mail' and pswd = '$psw';";
        if($con->connect_errno)
            echo "<br>Failed connection";
        #else echo "<br>Connetion successful";
        $result = $con->query($sql);
        if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['name'] = $row['name'];
                $_SESSION['ph'] = $row['ph'];
            }
        else echo "<br><br><div style='display: flex;align-items: center;
                    justify-content: center;'>Incorrect Email Id/Password. 
                    Try agian.</div>";

        if(isset($_SESSION['name'])){
            header("Location:home.php");
        }
    }
    ?>
    <div id="loginform">
        <h1>&nbsp;Login</h1>
        <hr>
        <form action="" method = "post" class = "form-block">
            <table style="margin:5px;">
                <tr><td><br></td></tr>
                <tr>
                    <td><label><b>Email</b></label></td>
                    <td><input type="email" placeholder = "Enter mail" name="mail" id="mail" required></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td><label><b>Password</b></label></td>
                    <td><input type="password" name="pswd" placeholder = "Enter Password" id="pswd" required></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan = "2"><input type="submit" id = "loginbtn" value="Login"></td>
                </tr>
            </table>
        </form>
        <br>
        <br><center>New here? <a href="signup.php"> Sign up</a><br><br></center>
    </div>
</body>
</html>