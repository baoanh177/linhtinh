<?php
    require_once "connection.php";

    function layNV_TenPB() {
        global $conn;
        $sql = "SELECT employee_id, employee_name, position, department_name 
        from `employees` INNER JOIN departments WHERE department_id = department;";
        return $conn->query($sql);
    }

    function layPB() {
        global $conn;
        $sql = "SELECT * FROM departments";
        return $conn->query($sql);
    }

    function layNVtheoID($id) {
        global $conn;
        $sql = "SELECT * FROM employees where employee_id = $id";
        return $conn->query($sql);
    }

    function xoaNV($id) {
        global $conn;
        $sql = "DELETE from employees where employee_id = $id";
        return $conn->query($sql);
    }
?>