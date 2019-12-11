<?php
require_once "dbconn.php"
// require_once "auth.php"
?>

<html>
    <head>
        <title> Delete </title>
    </head>

    <body>
        <?php 
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM users WHERE id=:id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id',$id);    //Binds a parameter to specified variable name 
                $stmt->execute();

                echo '<h2> Record has been deleted. </h2>';
            }

            else
            {
                echo '<h2> No record specified to delete.</h2>';
            }
            echo '<a href="index.php"> View Records.</a>';
        ?>
    </body>
</html>