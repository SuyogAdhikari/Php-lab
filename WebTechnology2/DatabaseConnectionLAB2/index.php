<?php
    require_once('dbconn.php'); //Database Connection once  
?>

<html>
    <head> 
    <title>This is the index page also </title>
    </head>

    <body>
        <?php
            $query = "SELECT * FROM users";
            $stmt = $pdo->prepare($query); // Method of PDO class made in dbconn.php
            $stmt->execute();             // Method of PDO class made in dbconn.php
            $users = $stmt->fetchAll();  // Fetches all data from the table; 
        ?>

        <!-- <a href="add.php"></a> -->

        <table border='1'>
            <tr>
                <th> Name </th>
                <th> Email </th>
                <th> Action </th>
            </tr>

            <?php foreach($users as $row){?>
                <tr>
                    <td> <?php echo $row['fullname'];?> </td>  
                    <td> <?php echo $row['email'];?> </td>
                    <td> 
                        <a href="delete.php?id=<?php echo $row['id'];?>"> Delete</a> <!-- '?id=' carries parameter to delete.php for further processing -->           
                        <a href="update.php?id=<?php echo $row['id'];?>"> Update</a>            
                    </td>
                </tr>
            <?php } ?>
        </table>
        <h3><a href="add.php"> Add items </a></h3><br>
        <h3><a href="update.php"> Update items </a></h3>
        <h3><a href="login.php"> Login </a></h3>
    </body>
</html>