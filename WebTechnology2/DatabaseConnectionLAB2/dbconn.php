<?php

    session_start();
    $host ='127.0.0.1'; //localhost
    $db ='php_experiment';
    $user ='root';
    $password ='';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;";

    $pdo = new PDO($dsn, $user, $password);   //PDO : Php Data Object (connects php to different databases)

    if(!isset($_SESSION['logged_user']) || empty($_SESSION['logged_user']))
    {
        echo '
                <div aligh="right">
                    <a href="login.php">
                        Login
                    </a>
                </div>
            ';
    }else{
        echo '
                <div align="right">
                    <a href="logout.php">
                        Logout
                    </a>
                </div>
            ';
    }


?>