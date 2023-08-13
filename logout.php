<?php
    setcookie('username',"", time() - 30);
    setcookie('password',"", time() - 30);
    header("location: login.php");
    die;
?>