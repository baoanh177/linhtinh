<?php
    require_once "connection.php";
    require_once "function.php";

    if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])) {
        header("location: login.php");
        die;
    }

    $nv = layNV_TenPB();
    if($nv->rowCount() == 0) {
        $khongNV = true;

    }else {
        $khongNV = false;
        $nv = $nv->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 style="display: inline-block;">Quan li nhan vien</h1>
    <a href="logout.php">Đăng xuất</a>
    <br>
    <a href="create.php">Them nhan vien</a><br>

    <?php if($khongNV) {?>
        <p>Khong co nhan vien</p>
    <?php }else { ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Tên nhân viên</th>
            <th>Vị trí</th>
            <th>Phòng ban</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($nv as $nv) { ?>
            <tr>
                <td><?php echo $nv['employee_id']; ?></td>
                <td><?php echo $nv['employee_name']; ?></td>    
                <td><?php echo $nv['position']; ?></td>
                <td><?php echo $nv['department_name']; ?></td>
                <td>
                    <a href="edit.php?id=<?=$nv['employee_id']?>">Sửa</a>
                    <a href="delete.php?id=<?=$nv['employee_id']?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php } ?>
</body>
</html>