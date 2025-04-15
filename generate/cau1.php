<html>
    <head>
        <meta charset="UTF-8">
        <title>Cau 1</title>
        <style>
            table{
                table-layout: fixed;
                border-collapse: collapse;
                width:600px;
            }
        </style>
    </head>
    <body>
        <?php
         $sum = 0;
         $result = "";
         $hoTen = "";
         $diemToan = "";
         $diemVan = "";
         $diemNgoaiNgu = "";
         
         if($_SERVER["REQUEST_METHOD"]=="POST"){
             $hoTen = $_POST['hoTen'] ?? '';
             $diemToan = $_POST['t'] ?? '';
             $diemVan = $_POST['v'] ?? '';
             $diemNgoaiNgu = $_POST['a'] ?? '';
             
             $sum = $diemToan + $diemVan + $diemNgoaiNgu;
             $result = ($sum>=15)?"Đỗ":"Trượt";
         }
        ?>
        <form method="post">
            <table border="1">
                <tr style="text-align: center">
                    <td colspan="2">Quản lí điểm</td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><input type="text" name="hoTen" value="<?php echo htmlspecialchars($hoTen); ?>" required></td>
                </tr>
                <tr>
                    <td>Điểm toán</td>
                    <td><input type="text" name="t" value="<?php echo htmlspecialchars($diemToan); ?>" required></td>
                </tr>
                <tr>
                    <td>Điểm văn</td>
                    <td><input type="text" name="v" value="<?php echo htmlspecialchars($diemVan)?$diemVan:"" ?>" required></td>
                </tr>
                <tr>
                    <td>Điểm ngoại ngữ</td>
                    <td><input type="text" name="a" value="<?php echo htmlspecialchars($diemNgoaiNgu); ?>" required></td>
                </tr>
                <tr>
                    <td>Tổng điểm</td>
                    <td><input type="text" value="<?php echo isset($sum)?$sum:""; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td><input type="text" value="<?php echo isset($result)?$result:""; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Tính">
                        <input type="reset" value="Xóa">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
