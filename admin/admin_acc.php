<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess('admin'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/barangay.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex bg-gray-100">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="">
      <div class="flex justify-center bg-white shadow-md rounded-lg p-6">
        <div class="w-full">
          <h2 class="text-xl font-semibold mb-4 text-center"><i class="fas fa-user w-5 h-5 mr-2"></i>Account Management</h2>
          <div class="flex justify-between py-4">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 p-2 rounded-lg hover:text-white">Search</button>
            </div>
            <button id="openModal" class="bg-blue-500 p-2 rounded-lg hover:text-white">Add Account</button>
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
    echo "<td class='py-2 px-4 border text-center'>" . $row['id'] . "</td>";
    echo "<td class='py-2 px-4 border text-center'>" . $row['username'] . "</td>";
    echo "<td class='py-2 px-4 border text-center'>" . $row['email'] . "</td>";
    echo "<td class='py-2 px-4 border text-center'>" . $row['role'] . "</td>";
    echo "<td class='py-2 px-4 border text-center'>
            <a href='#' onclick=\"openUpdateModal('{$row['id']}', '{$row['username']}', '{$row['email']}', '{$row['role']}')\" class='text-blue-500 hover:underline'>Edit</a> | 
            <a href='#' onclick=\"openDeleteModal('{$row['id']}')\" class='text-red-500 hover:underline'>Delete</a>
          </td>";
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

  <!-- Modal Form -->
  <?php
  include('disc/modal/add_user.php');
  include('disc/modal/update_user.php');
  include('disc/modal/delete_user.php');
  ?>


  <script src="disc/js/script.js"></script>
  <script src="disc/js/script-admin.js"></script>
  <script src="disc/js/modals.js"></script>
</body>
</html>
