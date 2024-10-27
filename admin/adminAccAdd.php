<?php
session_start();
include('dbconn/config.php');


if (isset($_POST['createAccount'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL to insert a new user into the database
    $sql = "INSERT INTO users (username, email, role, pwd) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $role, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>
        alert('Account created successfully ');
        window.location.href = 'admin_acc.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>
