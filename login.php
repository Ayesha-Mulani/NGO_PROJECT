<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];  // NGO or Donor

    if ($user_type == "ngo") {
        $table = "ngos";
    } else {
        $table = "donors";
    }

    $sql = "SELECT * FROM $table WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful! Welcome, " . $row['name'];
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="user_type">
        <option value="ngo">NGO</option>
        <option value="donor">Donor</option>
    </select><br>
    <button type="submit">Login</button>
</form>
