<?php
include('../dbconn/config.php');
include('../dbconn/authentication.php');
checkAccess('admin'); 

//create acc

if (isset($_POST['createAccount'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];

  // Prepare and execute the statement
  $stmt = $conn->prepare("INSERT INTO users (username, email, pwd, role) VALUES (?, ?, ?, ?)");
  if ($stmt->execute([$username, $email, $password, $role])) {
      // Redirect to the index page with a success message
      echo "<script>
      alert('Account created successfully ');
      window.location.href = 'admin_acc.php';
      </script>";
  } else {
      // Handle error here
      echo "Error: " . $stmt->error;
  }
}

//update
if (isset($_POST['updateAccount'])) {
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

  // Execute and check for errors
  if ($stmt->execute()) {
      echo "<script>
              alert('Account updated successfully');
              window.location.href = 'admin_acc.php';
            </script>";
  } else {
      // Display the error
      echo "Error updating account: " . $stmt->error;
  }

  $stmt->close();
}

//delete
// Check if the user ID is set
if (isset($_GET['id'])) {
  $id = intval($_GET['id']); // Sanitize the input

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
  $stmt->bind_param("i", $id); // Bind the user ID parameter

  if ($stmt->execute()) {
      // Redirect back to the account management page with a success message
      echo "<script>
      alert('Account deleted successfully ');
      window.location.href = 'admin_acc.php';
      </script>";
  } else {

      echo "Error: " . $stmt->error;
  }
  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('disc/partials/admin_header.php')?>
</head>
<body class="flex bg-[#90e0ef] font-poppins font-semibold">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="">

      <div class="flex justify-center bg-white shadow-md rounded-lg p-3">
        <div class="w-full">
          <h2 class="text-xl font-semibold mb-4 text-center"><i class="fas fa-user w-5 h-5 mr-2"></i>Account Management</h2>
          <div class="flex justify-between py-4">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 p-2 rounded-lg hover:text-white">Search</button>
            </div>
          
          </div>
          <table class="min-w-full border border-gray-300">
            <thead>
              <tr class="bg-gray-100">
                <th class="py-2 px-4 border text-center">ID</th>
                <th class="py-2 px-4 border text-center">Name</th>
                <th class="py-2 px-4 border text-center">Email</th>
                <th class="py-2 px-4 border text-center">Role</th>
                <th class="py-2 px-4 border text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
// Fetch user data from the database
$sql = "SELECT id, username, email, role FROM users"; // Adjust 'users' to your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $userTypeColors = [
    'admin' => 'bg-yellow-200',
    'user' => 'bg-blue-200',
  ];

  while ($row = $result->fetch_assoc()) {
    $rowClass = isset($userTypeColors[$row['role']]) ? $userTypeColors[$row['role']] : 'bg-gray-200';
    echo "<tr class='$rowClass'>";
    echo "<td class='py-2 px-4  text-center'>" . $row['id'] . "</td>";
    echo "<td class='py-2 px-4  text-center'>" . $row['username'] . "</td>";
    echo "<td class='py-2 px-4  text-center'>" . $row['email'] . "</td>";
    echo "<td class='py-2 px-4  text-center'>" . $row['role'] . "</td>";
    echo "<td class='py-2 px-2 text-center flex justify-center space-x-2'>";
    echo"<a href='#' onclick=\"openUpdateModal('{$row['id']}', '{$row['username']}', '{$row['email']}', '{$row['role']}')\" class='bg-yellow-500 text-white px-2 py-1 rounded-lg hover:bg-yellow-600''>update</a>";
    echo"<a href='#' onclick=\"openDeleteModal('{$row['id']}')\" class='bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600'>Delete</a>";
    echo"</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5' class='py-2 px-4 border text-center'>No users found</td></tr>";
}
?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>


<!-- Update Account Modal -->
<div id="updateAccountModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-1/3 p-6">
    <h2 class="text-xl font-semibold mb-4">Update Account</h2>
    <form action="" method="POST">
      <input type="hidden" id="updateUserId" name="id">
      
      <!-- Username -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateUsername">Username</label>
        <input class="border rounded-lg w-full p-2" type="text" id="updateUsername" name="username" required>
      </div>
      
      <!-- Email -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateEmail">Email</label>
        <input class="border rounded-lg w-full p-2" type="email" id="updateEmail" name="email" required>
      </div>
      
      <!-- Role -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateRole">Role</label>
        <select class="border rounded-lg w-full p-2" id="updateRole" name="role">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <!-- New Password (Optional) -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updatePassword">New Password </label>
        <input class="border rounded-lg w-full p-2" type="password" id="updatePassword" name="password">
      </div>

      <!-- Submit and Cancel -->
      <div class="flex justify-end">
        <button type="submit" name="updateAccount" class="bg-blue-500 text-white p-2 rounded-lg mr-2">Update</button>
        <button type="button" id="closeUpdateModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
      </div>
    </form>
  </div>
</div>


<!-- Delete User Modal -->
<div id="deleteUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
        <p>Are you sure you want to delete this user?</p>
        <div class="flex justify-between mt-4">
            <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        </div>
    </div>
</div>


<script src="disc/js/script.js"></script>
<script src="disc/js/script-admin.js"></script>
<script>
  


  // Open Update Account Modal
  function openUpdateModal(id, username, email, role) {
    document.getElementById('updateUserId').value = id;
    document.getElementById('updateUsername').value = username;
    document.getElementById('updateEmail').value = email;
    document.getElementById('updateRole').value = role;
    document.getElementById('updateAccountModal').classList.remove('hidden');
  }

  // Close Update Account Modal
  document.getElementById('closeUpdateModal').addEventListener('click', function() {
    document.getElementById('updateAccountModal').classList.add('hidden');
  });

  let userIdToDelete = null;

  function openDeleteModal(id) {
      userIdToDelete = id; // Store the user ID to be deleted
      document.getElementById('deleteUserModal').classList.remove('hidden');
  }
  
  function closeDeleteModal() {
      document.getElementById('deleteUserModal').classList.add('hidden');
  }
  
  document.getElementById('confirmDelete').onclick = function() {
      if (userIdToDelete) {
          window.location.href = `admin_acc.php?id=${userIdToDelete}`; // Redirect to delete.php
      }
      closeDeleteModal(); // Close modal after confirming
  };
  


</script>
</body>
</html>
