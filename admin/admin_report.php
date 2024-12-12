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
  <div class="w-full ">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Main Content Area -->
    <div class="bg-white rounded-lg p-4 m-4 ">
 
<h2 class=" flex justify-center font-poppins font-bold">REPORT MANAGEMENT</h2>
<div class="flex justify-between my-4">
<span></span>
<input class="border p-1 rounded-lg" type="text" placeholder="Search...">
</div>
<table class="w-full">
          <thead>
            <tr class="bg-[#90e0ef]">
            <th class="text-sm text-center my-4 px-2 ">ID</th>
                <th class="text-sm text-center my-4 px-2 ">Report Party</th>
                <th class="text-sm text-center my-4 px-2 ">Phone</th>
                <th class="text-sm text-center my-4 px-2 ">Email</th>
                <th class="text-sm text-center my-4 px-2 ">Species</th>
                <th class="text-sm text-center my-4 px-2 ">Breed</th>
                <th class="text-sm text-center my-4 px-2 ">Number of Involved</th>
                <th class="text-sm text-center my-4 px-2 ">Type of Abuse</th>
                <th class="text-sm text-center my-4 px-2 ">Description</th>
                <th class="text-sm text-center my-4 px-2 ">Evidence</th>
                <th class="text-sm text-center my-4 px-2 ">Time and Date</th>
          
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
                    echo "<td class='text-sm text-center my-4 px-2'>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['species']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['breed']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['numabuse']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['typeabuse']) . "</td>";
                    echo "<td class='text-sm text-center my-4 px-2 '>" . htmlspecialchars($row['descript']) . "</td>";
        
                    // Show evidence image as a clickable image
                    echo "<td class='py-2 px-4 text-center'>";
                    echo "<a href='" . htmlspecialchars($row['evidence']) . "' target='_blank'>";
                    echo "<img src='" . htmlspecialchars($row['evidence']) . "' alt='Evidence Image' class='w-16 h-16 object-cover rounded'>";
                    echo "</a>";
                    echo "</td>";
        
                    echo "<td class='text-sm text-center my-4 px-2 text-xs'>" . htmlspecialchars($row['created_at']) . "</td>";
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

  <script src="disc/js/script.js"></script>
  <script src="disc/js/script-admin.js"></script>
</body>
</html>



