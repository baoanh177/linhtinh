<?php
require_once "connection.php";
require_once "function.php";

$dsPB = layPB();
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $viTri = $_POST['viTri'];
    $phongBan = $_POST['phongBan'];

    if (empty($ten) || empty($viTri) || empty($phongBan)) {
        echo "Nhập đầy đủ thông tin!";
    } else {
        $sql = "UPDATE employees set employee_name = '$ten', position = '$viTri', department = '$phongBan' where employee_id = $id";
        $conn->exec($sql);
        header("location: index.php");
        die;
    }
}

$nv = layNVtheoID($id)->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <h1>Chinh sua thong tin NV</h1>
    <form action="edit.php" method="post">
        <input name="id" type="text" value="<?= $nv['employee_id'] ?>" hidden>
        Tên: <input type="text" name="ten" value="<?= $nv['employee_name'] ?>"><br><br>
        Vị trí: <input type="text" name="viTri" value="<?= $nv['position'] ?>"><br><br>
        Phòng ban:
        <select name="phongBan" id="">
            <?php foreach ($dsPB as $pb) { ?>
                <option value="<?=$pb['department_id']; ?>" <?php echo $pb['department_id'] == $nv["department"] ? "selected" : "" ?>>
                    <?= $pb['department_name'] ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Luu</button>
        <a href="index.php">Huy</a>
    </form>
</body>

</html>