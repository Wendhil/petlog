<?php
include('../dbconn/config.php');

// Update
if (isset($_POST['updateRecord'])) {
  // Validate inputs
  $adopt_id = $_POST['adopt_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $petName = $_POST['petName'];
  $reason = $_POST['reason'];
  $petType = $_POST['petType'];
  $experience = $_POST['experience'];

  // If no errors, update data in the database
  $sql = "UPDATE `adoption` SET `name`=?, `email`=?, `phone`=?, `address`=?, `pet_name`=?, `pet_type`=?, `reason`=?, `experience`=? WHERE `adopt_id`=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssssi", $name, $email, $phone, $address, $petName, $petType, $reason, $experience, $adopt_id);

  if ($stmt->execute()) {
      echo "<script>
              alert('Adoption application successfully updated');
              window.location.href = 'admin_adoption.php';
            </script>";
      exit();
  } else {
      echo "<script>
              alert('Error: Could not update the application');
              window.location.href = 'admin_adoption.php';
            </script>";
  }

  $stmt->close();
}

// Delete
if (isset($_GET['adopt_id'])) {
  $adopt_id = intval($_GET['adopt_id']); // Sanitize the input

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM adoption WHERE adopt_id = ?");
  $stmt->bind_param("i", $adopt_id); // Bind the user ID parameter

  if ($stmt->execute()) {
      echo "<script>
      alert('Record deleted successfully');
      window.location.href = 'admin_adoption.php';
      </script>";
  } else {
      echo "Error: " . $stmt->error;
  }
  $stmt->close();
}


//delete
// Check if the user ID is set
if (isset($_GET['adopt_id'])) {
  $adopt_id = intval($_GET['adopt_id']); // Sanitize the input

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM adoption WHERE adopt_id = ?");
  $stmt->bind_param("i", $adopt_id); // Bind the user ID parameter

  if ($stmt->execute()) {
      // Redirect back to the account management page with a success message
      echo "<script>
      alert('Record deleted successfully ');
      window.location.href = 'admin_adoption.php';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
      crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="bg-[#90e0ef] font-poppins">

<!--body layout-->
<div class="flex relative w-full">

<div class="">
    <!--Sidebar start-->
<aside id="sidebar" class="bg-[#042752] text-white w-64 transition-width duration-300 min-h-screen flex flex-col sidebar-expanded font-poppins ">
    <div class="flex justify-center ">
      <div class="flex justify-center p-4 ">
        <img width="100" height="100" src="img/barangay.png" alt="">
      </div>
      <button id="toggleBtn" class="text-white p-1 focus:outline-none md:hidden">
        <!-- Optional toggle icon can be added here -->
      </button>
   
    </div> 
    <a href="admin_dashboard.php" data-content="dashboard" class="text-center px-2  space-x-4 p-2 ">
        <span class="sidebar-text font-poppins ">Pet AnimalWelfare Protection System</span>
      </a>
    <hr class="mx-4">
    <!-- Sidebar Links -->
    <div class=" flex flex-col space-y-4 mt-4 p-4">
         
      <a href="admin_dashboard.php" data-content="dashboard" class="flex font-poppins items-center space-x-4 p-2 hover:bg-blue-700 rounded">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span class="sidebar-text">Dashboard</span>
      </a>
      
      <a href="admin_adoption.php" data-content="registration" class="flex font-poppins items-center space-x-4 p-2 hover:bg-blue-700 rounded">
        <i class="fa-solid fa-user"></i>
        <span class="sidebar-text">Adoption Management</span>
      </a>

      <a href="admin_report.php" data-content="registration" class="flex font-poppins items-center space-x-4 p-2 hover:bg-blue-700 rounded">
        <i class="fa-solid fa-book"></i>
        <span class="sidebar-text">Report Management</span>
      </a>
    
      <a href="admin_reg.php" data-content="registration" class="flex font-poppins items-center space-x-4 p-2 hover:bg-blue-700 rounded">
        <i class="fa-solid fa-users-gear"></i>
        <span class="sidebar-text">Registration Management</span>
      </a>

      <a href="admin_acc.php" data-content="registration" class="flex font-poppins items-center space-x-4 p-2 hover:bg-blue-700 rounded">
        <i class="fa-solid fa-user-plus"></i>
        <span class="sidebar-text">Account Management</span>
      </a>
    </div>
</aside>
<!--sidebar end-->  
</div>

<div class="w-full">
<!--navbar start-->
<nav class="flex bg-[#042752] shadow-md p-4  m-4 item-center justify-between rounded-lg">
    <button id="sidebarToggle" class="text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="relative flex">
      <div class="flex items-center p-1 mr-4 gap-2 text-white">
      <i class="fa-solid fa-bell"></i>
      <span class="float-l absolute top-0 left-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">
        99+
      </span>
      </div>
      <div class="flex items-center p-1 mr-4 gap-2 text-white ">
      <i class="fa-regular fa-user"></i>
      </div>
      <div class="">
      <button id="logoutBtn" class="flex items-center gap-2 text-white hover:bg-blue-700 rounded-lg p-1 focus:outline-none transition duration-200 ease-in-out" onclick="showModal()">
            <i class="fas fa-sign-out-alt"></i>
            <span class="hidden md:block"></span> <!-- Show text only on larger screens -->
        </button>
      </div>
    </div>
</nav>
<!--navbar end-->
<div class="bg-white rounded-lg p-4 m-4">

 
  <h2 class=" flex justify-center font-poppins font-bold">ADOPTION MANAGEMENT</h2>
  <div class="flex justify-between my-4">
  <span></span>
  <input class="border p-1 rounded-lg" type="text" placeholder="Search...">
  </div>
  <table class="w-full">
            <thead>
              <tr class="bg-[#90e0ef]">
                <th class="text-sm text-center my-4 px-2">ID</th>
                <th class="text-sm text-center my-4 px-2">Name</th>
                <th class="text-sm text-center my-4 px-2">Email</th>
                <th class="text-sm text-center my-4 px-2">Phone</th>
                <th class="text-sm text-center my-4 px-2">Address</th>
                <th class="text-sm text-center my-4 px-2">Pet Name</th>
                <th class="text-sm text-center my-4 px-2">Pet Type</th>
                <th class="text-sm text-center my-4 px-2">Reason</th>
                <th class="text-sm text-center my-4 px-2">Experience</th>
                <th class="text-sm text-center my-4 px-2">Time and Date</th> 
                <th class="text-sm text-center my-4 px-2">Action</th>
            
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
                      echo "<td class='text-sm text-center px-2'>" . $row['adopt_id'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['name'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['email'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['phone'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['address'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['pet_name'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['pet_type'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['reason'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['experience'] . "</td>";
                      echo "<td class='text-sm text-center px-2'>" . $row['created_at'] . "</td>";
                      // Add Action Buttons
                      echo "<td class='py-2 px-2 text-center px-2 flex justify-center space-x-2'>";
                      echo " <a href='#' onclick=\"openUpdateRecordModal('{$row['adopt_id']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['address']}', '{$row['pet_name']}', '{$row['pet_type']}', '{$row['reason']}', '{$row['experience']}')\" class='bg-yellow-500 text-white px-2 py-1  rounded-lg hover:bg-yellow-600'>Update</a>";

                      echo"<a href='#' onclick=\"openRecordDeleteModal('{$row['adopt_id']}')\" class='bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600'>Delete</a>";
                      echo "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='11' class=' text-center px-2'>No users found</td></tr>";
              }
              ?>
            </tbody>
          </table>
</div>
</div>
</div>






















<script src="disc/js/script.js"></script>
<script src="disc/js/script-admin.js"></script>
<script src="/disc/js/updateAcc.js"></script>
</body>
</html>
