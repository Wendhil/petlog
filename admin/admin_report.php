<?php
include('../dbconn/config.php');
include('../dbconn/authentication.php');
checkAccess('admin'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include('disc/partials/admin_header.php')?>
</head>
<body class="flex bg-[#90e0ef] font-poppins">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="w-full">
      <div class="flex justify-center bg-white shadow-md rounded-lg p-3">
        <div class="w-full overflow-x-auto"> <!-- Added overflow-x-auto for responsiveness -->
          <h2 class="text-xl font-bold mb-4 text-center">
            <i class="fas fa-user w-5 h-5 mr-2"></i>Report Transaction History
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
                <th class="py-2 px-4 border text-center ">ID</th>
                <th class="py-2 px-4 border text-center ">Report Party</th>
                <th class="py-2 px-4 border text-center ">Phone</th>
                <th class="py-2 px-4 border text-center ">Email</th>
                <th class="py-2 px-4 border text-center ">Species</th>
                <th class="py-2 px-4 border text-center ">Breed</th>
                <th class="py-2 px-4 border text-center ">Number of Involved</th>
                <th class="py-2 px-4 border text-center ">Type of Abuse</th>
                <th class="py-2 px-4 border text-center ">Description</th>
                <th class="py-2 px-4 border text-center ">Evidence</th>
                <th class="py-2 px-4 border text-center ">Time and Date</th>
              </tr>
            </thead>
            <tbody>
            <?php
    // Fetch user data from the database
    $sql = "SELECT * FROM reports"; // Adjust 'reports' to your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each row and output data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['species']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['breed']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['numabuse']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['typeabuse']) . "</td>";
            echo "<td class='py-2 px-2  text-center '>" . htmlspecialchars($row['descript']) . "</td>";

            // Show evidence image as a clickable image
            echo "<td class='py-2 px-4 text-center'>";
            echo "<a href='" . htmlspecialchars($row['evidence']) . "' target='_blank'>";
            echo "<img src='" . htmlspecialchars($row['evidence']) . "' alt='Evidence Image' class='w-16 h-16 object-cover rounded'>";
            echo "</a>";
            echo "</td>";

            echo "<td class='py-2 px-2  text-center text-xs'>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='12' class='py-2 px-2 border text-center'>No reports found</td></tr>";
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



