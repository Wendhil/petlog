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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex bg-gray-100 font-poppins">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="w-full">
      <div class="flex justify-center bg-[#dee2e6] shadow-md rounded-lg p-6">
        <div class="w-full overflow-x-auto"> <!-- Added overflow-x-auto for better handling -->
          <h2 class="text-xl font-bold mb-4 text-center">
            <i class="fas fa-user w-5 h-5 mr-2"></i>Adoption Management
          </h2>
          <div class="flex justify-between py-4">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Search</button>
            </div>
          </div>
          <table class="min-w-full border border-gray-300">
            <thead>
              <tr class="bg-[#90e0ef]">
                <th class="px-4 py-2 border text-center">ID</th>
                <th class="px-4 py-2 border text-center">Name</th>
                <th class="px-4 py-2 border text-center">Email</th>
                <th class="px-4 py-2 border text-center">Phone</th>
                <th class="px-4 py-2 border text-center">Address</th>
                <th class="px-4 py-2 border text-center">Pet Name</th>
                <th class="px-4 py-2 border text-center">Pet Type</th>
                <th class="px-4 py-2 border text-center">Reason</th>
                <th class="px-4 py-2 border text-center">Experience</th>
                <th class="px-4 py-2 border text-center">Time and Date</th>
                <th class="px-4 py-2 border text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch user data from the database
              $sql = "SELECT * FROM adoption"; // Adjust 'adoption' to your actual table name
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  // Loop through each row and output data
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['adopt_id']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['name']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['email']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['phone']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['address']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['pet_name']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['pet_type']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['reason']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['experience']) . "</td>";
                      echo "<td class='px-4 py-2 border text-center'>" . htmlspecialchars($row['created_at']) . "</td>";
                      // Add Action Buttons
                      echo "<td class='px-4 py-2 border text-center flex justify-center items-center space-x-2'>"; // Updated for centering
                      echo "<a href='update.php?id=" . htmlspecialchars($row['adopt_id']) . "' class='bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600'>Update</a>";
                      echo "<a href='delete.php?id=" . htmlspecialchars($row['adopt_id']) . "' class='bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                      echo "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='11' class='px-4 py-2 border text-center'>No users found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script src="disc/js/script.js"></script>
  <script src="disc/js/script-admin.js"></script>
</body>
</html>
