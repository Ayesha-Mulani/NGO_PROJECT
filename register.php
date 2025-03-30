<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Secure password hashing
    $user_type = $_POST['user_type'];  // NGO or Donor

    if ($user_type == "ngo") {
        $table = "ngos";
    } else {
        $table = "donors";
    }

    $sql = "INSERT INTO $table (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="user_type">
        <option value="ngo">NGO</option>
        <option value="donor">Donor</option>
    </select><br>
    <button type="submit">Register</button>
</form>
