<?php
include('dbconn/config.php');

if (isset($_POST['updateAccount'])) {

    function generateToken(){
        return bin2hex(random_bytes(32));
    }


    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    // Prepare the SQL statement, include password only if it is provided
    if (!empty($password)) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // SQL to update the user data with password
        $sql = "UPDATE users SET username = ?, email = ?, role = ?, pwd = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $email, $role, $hashed_password, $id);
    } else {
        // SQL to update the user data without changing password
        $sql = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $role, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
                alert('Account updated successfully ');
                window.location.href = 'admin_acc.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
