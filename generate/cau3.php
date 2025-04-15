<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST['n'];

            function check($num) {
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % i == 0)
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
        ?>
        <form method="post">
            <table border="1">
                <tr style="text-align: center">
                    <td colspan="2">STUDENT INFORMATION FORM</td>
                </tr>
                <tr>
                    <td colspan="2"> 
                <lable>Name : </lable> <br>
                <input type="text" name ="n" required></td>
                <tr>
                    <td>
                        <label>Name: </label><br>
                        <input type="text" value="<?php echo isset($sum) ? $sum : ""; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Tính tổng">
                        <input type="reset" value ="hủy">
                    </td>

                </tr>
            </table>
        </form>
    </body>
</html>
