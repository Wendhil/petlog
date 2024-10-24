<?php
session_start();
include ('dbconn/config.php');
include 'dbconn/authentication.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex bg-gray-100 ">

  <!-- Sidebar -->
<?php include('disc/partials/admin_sidebar.php');?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="w-full">
    <div class="flex justify-center bg-white shadow-md rounded-lg p-6">
    <div class="w-full">
        <h2 class="text-xl font-semibold mb-4 text-center"><i class="fas fa-user w-5 h-5 mr-2"></i>Report Management</h2>
        <div class="flex justify-between py-4">
            <div class="">
                <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
                <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Search</button>
            </div>
        </div>
        <table class="w-64 border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border text-center">ID</th>
                    <th class="py-2 px-4 border text-center">Name</th>
                    <th class="py-2 px-4 border text-center">Email</th>
                    <th class="py-2 px-4 border text-center">Phone</th>
                    <th class="py-2 px-4 border text-center">Address</th>
                    <th class="py-2 px-4 border text-center">Pet Name</th>
                    <th class="py-2 px-4 border text-center">Pet Type</th>
                    <th class="py-2 px-4 border text-center">Reason</th>
                    <th class="py-2 px-4 border text-center">Experience</th>
                    <th class="py-2 px-4 border text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch user data from the database
                $sql = "SELECT * FROM adoptions"; // Adjust 'registrations' to your actual table name
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop through each row and output data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>"; // Start a new table row
                        echo "<td class='py-2 px-4 border text-center'>" . $row['id'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['name'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['email'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['phone'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['address'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['pet_name'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['pet_type'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['reason'] . "</td>";
                        echo "<td class='py-2 px-4 border text-center'>" . $row['experience'] . "</td>";
                        // Add Action Buttons
                        echo "<td class='py-2 px-4 border text-center'>";
                        echo "<a href='update.php?id=" . $row['id'] . "' class='bg-yellow-500 text-white p-1 rounded-lg hover:bg-yellow-600'>Update</a>";
                        echo "<span></span>";
                        echo "<a href='delete.php?id=" . $row['id'] . "' class='bg-red-500 text-white p-1 rounded-lg hover:bg-red-600' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>"; // End the table row
                    }
                } else {
                    echo "<tr><td colspan='10' class='py-2 px-4 border text-center'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

    </main>
  </div>

  <script src="codejs/script.js"></script>
  <script src="codejs/script-admin.js" ></script>
</body>
</html>
