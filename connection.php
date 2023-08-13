<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=db_employee;", "baoanh", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
        echo "Error".$e->getMessage();
    }
?>