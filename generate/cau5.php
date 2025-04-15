<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $department = $_POST['department'] ?? '';
    $skills = $_POST['skills'] ?? [];
    $workingDays = $_POST['workingDays'] ?? '';
    $dailyRate = 100; // $100 per day
    $calculatedSalary = $workingDays * $dailyRate;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 400px;
            border: 1px solid #000;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .skills-group {
            margin-bottom: 10px;
        }
        .skills-group label {
            margin-right: 10px;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 200px;
            margin-bottom: 5px;
        }
        .employee-info {
            margin-top: 20px;
        }
        .employee-info ul {
            list-style-type: none;
            padding-left: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Employee Form</h2>
        <form method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" id="male" <?php echo (isset($gender) && $gender == 'Male') ? 'checked' : ''; ?>>
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female" id="female" <?php echo (isset($gender) && $gender == 'Female') ? 'checked' : ''; ?>>
                <label for="female">Female</label>
            </div>

            <div class="form-group">
                <label>Department:</label>
                <select name="department">
                    <option value="HR" <?php echo (isset($department) && $department == 'HR') ? 'selected' : ''; ?>>HR</option>
                </select>
            </div>

            <div class="form-group">
                <label>Skills:</label>
                <div class="skills-group">
                    <input type="checkbox" name="skills[]" value="PHP" id="php" <?php echo (isset($skills) && in_array('PHP', $skills)) ? 'checked' : ''; ?>>
                    <label for="php">PHP</label>
                    <input type="checkbox" name="skills[]" value="JavaScript" id="javascript" <?php echo (isset($skills) && in_array('JavaScript', $skills)) ? 'checked' : ''; ?>>
                    <label for="javascript">JavaScript</label>
                    <input type="checkbox" name="skills[]" value="HTML" id="html" <?php echo (isset($skills) && in_array('HTML', $skills)) ? 'checked' : ''; ?>>
                    <label for="html">HTML</label>
                </div>
            </div>

            <div class="form-group">
                <label>Working Days:</label>
                <input type="text" name="workingDays" value="<?php echo isset($workingDays) ? htmlspecialchars($workingDays) : ''; ?>" required>
            </div>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='employee-info'>";
            echo "<h3>Employee Information:</h3>";
            echo "<ul>";
            echo "<li>Name: " . htmlspecialchars($_POST['name']) . "</li>";
            echo "<li>Email: " . htmlspecialchars($_POST['email']) . "</li>";
            echo "<li>Gender: " . (isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "") . "</li>";
            echo "<li>Department: " . htmlspecialchars($_POST['department']) . "</li>";
            echo "<li>Skills: ";
            if (isset($_POST['skills']) && is_array($_POST['skills'])) {
                echo implode(", ", array_map('htmlspecialchars', $_POST['skills']));
            }
            echo "</li>";
            echo "<li>Working Days: " . htmlspecialchars($_POST['workingDays']) . "</li>";
            echo "<li>Calculated Salary: $" . number_format($calculatedSalary, 2) . "</li>";
            echo "</ul>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

