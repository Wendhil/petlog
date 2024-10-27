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
          <h2 class="text-xl font-bold mb-4 text-center"><i class="fas fa-user w-5 h-5 mr-2"></i>Registration Pet Management</h2>
          <div class="flex justify-between py-4">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Search</button>
            </div>
          </div>
          <div class="overflow-x-auto"> <!-- Added wrapper for horizontal scrolling -->
            <table class="min-w-full border border-gray-300 table-auto"> <!-- Changed to table-auto for better responsiveness -->
              <thead>
                <tr class="bg-gray-100">
                  <th class="py-2 px-4 border text-center">ID</th>
                  <th class="py-2 px-4 border text-center">Owner Name</th>
                  <th class="py-2 px-4 border text-center">Pet Name</th>
                  <th class="py-2 px-4 border text-center">Pet Age</th>
                  <th class="py-2 px-4 border text-center">Pet Breed</th>
                  <th class="py-2 px-4 border text-center">Address</th>
                  <th class="py-2 px-4 border text-center">Pet Image</th>
                  <th class="py-2 px-4 border text-center">Vaccine Record</th>
                  <th class="py-2 px-4 border text-center">Additional Information</th>
                  <th class="py-2 px-4 border text-center">Time and Date</th>
                  <th class="py-2 px-4 border text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
    <?php
    // Fetch user data from the database
    $sql = "SELECT * FROM register"; // Adjust 'register' to your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each row and output data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"; // Start a new table row
            echo "<td class='py-2 px-4 border text-center'>" . $row['id'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['owner'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['pet'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['age'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['breed'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['address'] . "</td>";
            // Show pet image as a clickable image
            echo "<td class='py-2 px-4 border text-center'><a href='" . htmlspecialchars($row['pet_image']) . "' target='_blank'><img src='" . htmlspecialchars($row['pet_image']) . "' alt='Pet Image' class='w-16 h-16 object-cover rounded'></a></td>";
            // Show vaccine record as a text link
            echo "<td class='py-2 px-4 border text-center'><a href='" . htmlspecialchars($row['pet_vaccine']) . "' target='_blank'>" . htmlspecialchars($row['pet_vaccine']) . "</a></td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['additional_info'] . "</td>";
            echo "<td class='py-2 px-4 border text-center'>" . $row['created_at'] . "</td>";
            // Add Action Buttons
            echo "<td class='py-2 px-4  text-center flex justify-center space-x-2'>"; // Adjusted for alignment
            echo "<a href='update.php?id=" . $row['id'] . "' class='bg-yellow-500 text-white px-4 py-1 rounded-lg hover:bg-yellow-600'>Update</a>";
            echo "<a href='delete.php?id=" . $row['id'] . "' class='bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>"; // End the table row
        }
    } else {
        echo "<tr><td colspan='11' class='py-2 px-4 border text-center'>No users found</td></tr>";
    }
    ?>
</tbody>

            </table>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="disc/js/script.js"></script>
  <script src="disc/js/script-admin.js"></script>
</body>
</html>
