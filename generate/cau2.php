<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính tổng số nguyên tố</title>
        <style>
            table{
                table-layout: fixed;
                border-collapse: collapse;
                width:600px;
            }
            .error {
                color: red;
                font-size: 14px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <?php
        $sum = 0;
        $error = "";
        $inputValue = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputValue = $_POST['n']; // Lưu giá trị input
            
            if(empty($_POST['n'])) {
                $error = "Vui lòng nhập số n";
            }
            // Kiểm tra xem input có phải là số không
            elseif(!is_numeric($_POST['n'])) {
                $error = "Vui lòng chỉ nhập số";
            }
            // Kiểm tra xem có phải số nguyên không
            elseif(floor($_POST['n']) != $_POST['n']) {
                $error = "Vui lòng nhập số nguyên";
            }
            // Kiểm tra số dương
            elseif($_POST['n'] <= 0) {
                $error = "Vui lòng nhập số lớn hơn 0";
            }
            else {
                $n = (int)$_POST['n'];

                function check($num) {
                    if ($num < 2) return false;
                    for ($i = 2; $i <= sqrt($num); $i++) {
                        if ($num % $i == 0)
                            return false;
                    }
                    return true;
                }

                for ($i = 2; $i <= $n; $i++) {
                    if (check($i)) {
                        $sum += $i;
                    }
                }
            }
        }
        ?>
        <form method="post">
            <table border="1">
                <tr style="text-align: center">
                    <td colspan="2">Tính tổng các số nguyên tố</td>
                </tr>
                <tr>
                    <td>Nhập số n=</td>
                    <td>
                        <input type="number" 
                               name="n" 
                               required 
                               min="1" 
                               step="1" 
                               value="<?php echo htmlspecialchars($inputValue); ?>"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <?php if(!empty($error)) echo "<div class='error'>$error</div>"; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tổng các số nguyên tố =</td>
                    <td><input type="text" value="<?php echo isset($sum) && empty($error) ? $sum : ""; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Tính tổng">
                        <input type="reset" value="Hủy">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
