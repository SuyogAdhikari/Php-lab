<?php 
 require_once "dbconn.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
</head>
<body>

    <a href ="index.php"> View Records </a>
    <?php
        $logged = false;    //is logged in??? FLAG

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpassword'];
            $password = md5($pass);

            $query = "SELECT * FROM users WHERE email=:email AND password=:pwd";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':pwd',$password);
            $stmt->execute();
            $user = $stmt->fetch();
            if(!empty($user))
            {
                $logged = true;         
                $_SESSION['logged_user'] = $user;
                echo "<h2>User Logged on successfully</h2>";
            } else
            {

                echo "<h2>Invalid Input</h2>";    
            }
        }

        if(!$logged)
        { 
            ?>
            <form id="myform" name="myform" method="post" action="login.php">
                <h3><center> Login to the system </center></h3>

                <table> 
                    <tr>
                        <td> Email </td>
                        <td><input type="text" id="txtemail" name="txtemail"/></td>
                    </tr>

                    <tr>
                        <td> Password </td>
                        <td><input type="password" id="txtpasssword" name="txtpassword"/></td>
                    </tr>

                    <tr>
                        <td> &nbsp; </td>
                        <td> <input type="submit" value="submit"/></td>
                    </tr>
                </table>
            </form>
    <?php } ?>
</body>
</html>