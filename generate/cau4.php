<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $hobbies = $_POST['hobbies'] ?? [];
    $semester1 = $_POST['semester1'] ?? '';
    $semester2 = $_POST['semester2'] ?? '';
    $total = $_POST['total'] ?? '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .radio-group,
        .checkbox-group {
            margin-bottom: 10px;
        }
        .radio-group label,
        .checkbox-group label {
            display: inline;
            margin-right: 15px;
        }
        .tuition-section {
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Student Information Form</h2>
    <form method="post">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" name="gender" value="Male" id="male" <?php echo (isset($gender) && $gender == 'Male') ? 'checked' : ''; ?>>
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female" id="female" <?php echo (isset($gender) && $gender == 'Female') ? 'checked' : ''; ?>>
                <label for="female">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label>Country:</label>
            <select name="country">
                <option value="">--Please choose--</option>
                <option value="vietnam" <?php echo (isset($country) && $country == 'vietnam') ? 'selected' : ''; ?>>Vietnam</option>
                <option value="usa" <?php echo (isset($country) && $country == 'usa') ? 'selected' : ''; ?>>USA</option>
                <option value="japan" <?php echo (isset($country) && $country == 'japan') ? 'selected' : ''; ?>>Japan</option>
                <option value="korea" <?php echo (isset($country) && $country == 'korea') ? 'selected' : ''; ?>>Korea</option>
                <option value="china" <?php echo (isset($country) && $country == 'china') ? 'selected' : ''; ?>>China</option>
            </select>
        </div>

        <div class="form-group">
            <label>Hobbies:</label>
            <div class="checkbox-group">
                <input type="checkbox" name="hobbies[]" value="Reading" id="reading" <?php echo (isset($hobbies) && in_array('Reading', $hobbies)) ? 'checked' : ''; ?>>
                <label for="reading">Reading</label>
                <input type="checkbox" name="hobbies[]" value="Traveling" id="traveling" <?php echo (isset($hobbies) && in_array('Traveling', $hobbies)) ? 'checked' : ''; ?>>
                <label for="traveling">Traveling</label>
                <input type="checkbox" name="hobbies[]" value="Music" id="music" <?php echo (isset($hobbies) && in_array('Music', $hobbies)) ? 'checked' : ''; ?>>
                <label for="music">Music</label>
            </div>
        </div>

        <div class="tuition-section">
            <h3>Tuition Fee</h3>
            <div class="form-group">
                <label>Semester 1 tuition:</label>
                <input type="number" name="semester1" id="semester1" value="<?php echo isset($semester1) ? htmlspecialchars($semester1) : ''; ?>" onchange="calculateTotal()">
            </div>

            <div class="form-group">
                <label>Semester 2 tuition:</label>
                <input type="number" name="semester2" id="semester2" value="<?php echo isset($semester2) ? htmlspecialchars($semester2) : ''; ?>" onchange="calculateTotal()">
            </div>

            <div class="form-group">
                <label>Total tuition:</label>
                <input type="number" name="total" id="total" value="<?php echo isset($total) ? htmlspecialchars($total) : ''; ?>" readonly>
            </div>
        </div>

        <input type="submit" value="Submit" class="submit-btn">
    </form>

    <script>
        function calculateTotal() {
            var sem1 = document.getElementById('semester1').value || 0;
            var sem2 = document.getElementById('semester2').value || 0;
            var total = parseFloat(sem1) + parseFloat(sem2);
            document.getElementById('total').value = total;
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Submitted Information:</h3>";
        echo "<ul>";
        echo "<li>Name: " . htmlspecialchars($_POST['name']) . "</li>";
        echo "<li>Gender: " . (isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "") . "</li>";
        echo "<li>Country: " . htmlspecialchars($_POST['country']) . "</li>";
        
        echo "<li>Hobbies: ";
        if (isset($_POST['hobbies']) && is_array($_POST['hobbies'])) {
            echo implode(", ", array_map('htmlspecialchars', $_POST['hobbies']));
        }
        echo "</li>";
        
        echo "<li>Semester 1 Tuition: $" . htmlspecialchars($_POST['semester1']) . "</li>";
        echo "<li>Semester 2 Tuition: $" . htmlspecialchars($_POST['semester2']) . "</li>";
        echo "<li>Total Tuition: $" . htmlspecialchars($_POST['total']) . "</li>";
        echo "</ul>";
    }
    ?>
</body>
</html> 