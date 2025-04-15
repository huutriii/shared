<?php
$n = "";
$errors = "";
$oddNumbers = [];
$sum = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = (int) $_POST["number"] ?? 0;

    if ($n < 1 || $n > 100) {
        $errors = "Vui lòng nhập số tự nhiên từ 1 đến 100.";
    } else {
        for ($i = 1; $i <= $n; $i += 2) {
            $oddNumbers[] = $i;
            $sum += $i;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị số lẻ và tính tổng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 400px;
        }
        td, th {
            border: 1px solid #444;
            padding: 8px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>Nhập số tự nhiên (≤ 100)</h2>
    <form method="post">
        <table>
            <tr>
                <td>Nhập n:</td>
                <td><input type="number" name="number" value="<?= htmlspecialchars($n) ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

    <?php if ($errors): ?>
        <p style="color:red"><?= $errors ?></p>
    <?php elseif (!empty($oddNumbers)): ?>
        <h3>Kết quả:</h3>
        <table>
            <tr>
                <th>Các số lẻ từ 1 đến <?= $n ?></th>
            </tr>
            <tr>
                <td><?= implode(", ", $oddNumbers) ?></td>
            </tr>
            <tr>
                <th>Tổng các số lẻ</th>
            </tr>
            <tr>
                <td><?= $sum ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>
