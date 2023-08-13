<?php
    require_once "function.php";

    $dsPB = layPB();
    if($dsPB->rowCount() > 0) {
        $dsPB = $dsPB->fetchAll(PDO::FETCH_ASSOC);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST['ten'];
        $viTri = $_POST['viTri'];
        $phongBan = $_POST['phongBan'];

        if(empty($ten) || empty($viTri) || empty($phongBan)) {
            $error = "Nhập đầy đủ thông tin!";
        }else {
            $sql = "INSERT INTO employees(employee_name, position, department)
            VALUES ('$ten', '$viTri', '$phongBan')";
            $conn->exec($sql);
            header("location: index.php");
            die;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Them NV</h1>
    <form action="create.php" method="post">
        Tên: <input type="text" name="ten"><br><br>
        Vị trí: <input type="text" name="viTri"><br><br>
        Phòng ban:
            <select name="phongBan" id="">
                <?php foreach($dsPB as $pb) { ?>
                    <option value="<?=$pb['department_id'];?>">
                        <?=$pb['department_name']?>
                    </option>
                <?php } ?>
            </select>
        <button type="submit" >Them</button>
    </form>
</body>
</html>