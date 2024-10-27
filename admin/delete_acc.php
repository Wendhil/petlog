<?php
include('dbconn/config.php');
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to index.php
    header("Location: admin_acc.php");
    exit;
}

$conn->close();
?>

