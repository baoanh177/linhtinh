<?php
    require_once "connection.php";
    require_once "function.php";

    function xacNhanXoaNV($id) {
?>
        <h2>Xác nhận xóa thông tin nhân viên?</h2>
        <a href="delete.php?confirm=true&id=<?=$id?>">Xóa</a>
        <a href="index.php">Quay lại</a>

<?php
        if(isset($_GET['id']) && isset($_GET['confirm'])) {
            return true;
        }
    }

    if($_GET['id']) {
        $id = $_GET['id'];
        if(xacNhanXoaNV($id)) {
            xoaNV($id);
            header("location: index.php");
            die;
        }
    }
?>
