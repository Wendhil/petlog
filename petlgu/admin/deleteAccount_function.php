<?php
include('dbconn/config.php');

if (isset($_POST['deleteAccount'])) {
    $id = $_POST['id'];

    // SQL to delete a user
    $sql = "DELETE FROM users WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Account deleted successfully ');
                window.location.href = 'admin_account_page.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
