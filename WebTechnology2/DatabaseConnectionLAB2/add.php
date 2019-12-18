<?php 
    require_once "dbconn.php";
    // require_once "auth.php";
?>

<html>
    <head>
        <title> Adding to Database </title>
        <?php if($_SERVER['REQUEST_METHOD'] != 'POST'){ ?>
        
        <?php } ?>
    </head>
    
    <body>
            <a href ="index.php"> View Records</a>

            <?php   
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $name = $_POST['txtname'];
                    $email = $_POST['txtemail'];
                    $pass = $_POST['txtpassword'];
                    $password = md5($pass);
                
                    $query = "INSERT INTO users (fullname,email,password) values(:name, :email, :pwd)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':name',$name);
                    $stmt->bindParam(':email',$email);
                    $stmt->bindParam(':pwd',$password);
                    $stmt->execute();
                    echo '<h2> User Added Successfully </h2>';
                }
                
                else{
            ?>

            <form id="myform" name="myform" method="post" action="add.php">
                    <h3> Add New Records</h3>
                    <table>
                        <tr>
                            <td> Name </td>
                            <td><input type="text" id="txtname" name="txtname"/></td>
                        </tr>    
                
                        <tr>
                            <td> Email </td>
                            <td><input type="text" id="txtemail" name="txtemail"/></td>
                        </tr>    
                
                        <tr>
                            <td> Password </td>
                            <td><input type="password" id="txtpassword" name="txtpassword"/></td>
                        </tr>    
                
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit"/></td>
                        </tr>
                    </table>
            </form>
            <?php } ?>
            </body>


</html>

<!-- Super global variables in php... global contraints in php ASSIGNMENT -->