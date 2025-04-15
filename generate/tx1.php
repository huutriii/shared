<?php
// Biến lưu thông báo lỗi
$errors = [];
$thongtin = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maNV = $_POST["maNV"] ?? "";
    $hoTen = $_POST["hoTen"] ?? "";
    $gioiTinh = $_POST["gioiTinh"] ?? "";
    $soNgayLam = (int) ($_POST["soNgayLam"] ?? 0);
    $luongMotNgay = 100;

    // Kiểm tra hợp lệ
    if (empty($maNV)) {
        $errors[] = "Mã nhân viên không được để trống.";
    }
    if (empty($hoTen)) {
        $errors[] = "Họ tên không được để trống.";
    }
    if (empty($gioiTinh)) {
        $errors[] = "Giới tính phải được chọn.";
    }
    if ($soNgayLam < 20 || $soNgayLam > 30) {
        $errors[] = "Số ngày làm phải từ 20 đến 30.";
    }

    // Nếu không có lỗi
    if (empty($errors)) {
        $luongThang = $soNgayLam * $luongMotNgay;
        $thuong = 0;
        if ($soNgayLam > 25) {
            $thuong = (30 - $soNgayLam) * $luongMotNgay * 2;
        }

        $thongtin = [
            "Mã NV" => $maNV,
            "Họ tên" => $hoTen,
            "Giới tính" => $gioiTinh,
            "Số ngày làm" => $soNgayLam,
            "Lương tháng" => $luongThang,
            "Thưởng" => $thuong
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Nhập Lương</title>
</head>
<body>
    <form method="post">
        Mã nhân viên: <input type="text" name="maNV"><br>
        Họ tên: <input type="text" name="hoTen"><br>
        Giới tính:
        <input type="radio" name="gioiTinh" value="Nam">Nam
        <input type="radio" name="gioiTinh" value="Nữ">Nữ<br>
        Số ngày làm: <input type="number" name="soNgayLam"><br>
        Lương 1 ngày: <input type="text" value="100" readonly><br>
        <input type="submit" value="Tính toán">
    </form>

    <?php
    if (!empty($errors)) {
        echo "<h3>Lỗi:</h3><ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul>";
    }

    if (!empty($thongtin)) {
        echo "<h3>Thông tin nhân viên:</h3><ul>";
        foreach ($thongtin as $key => $value) {
            echo "<li>$key: $value</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
