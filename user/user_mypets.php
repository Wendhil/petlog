<?php
include('../dbconn/config.php');
include('../dbconn/authentication.php');
checkAccess('user'); 
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
<body class="flex bg-[#90e0ef] font-poppins">

  <!-- Sidebar -->
  <?php include('disc/partials/sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="w-full">
      <div class="flex justify-center bg-white shadow-md rounded-lg p-2">
        <div class="w-full overflow-x-auto">
          <h2 class="text-xl font-bold mb-6 text-center mt-6">
            <i class="fas fa-user w-5 h-5 mr-2"></i>My Pets List
          </h2>
          <div class="flex justify-between py-2">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Search</button>
            </div>
          </div>
          <table class="min-w-full">
            <thead>
              <tr class="bg-[#90e0ef]">
                <th class="px-4 py-2 text-center">ID</th>
                <th class="px-4 py-2 text-center">Name</th>
                <th class="px-4 py-2 text-center">Email</th>
                <th class="px-4 py-2 text-center">Phone</th>
                <th class="px-4 py-2 text-center">Address</th>
                <th class="px-4 py-2 text-center">Pet Name</th>
                <th class="px-4 py-2 text-center">Pet Type</th>
                <th class="px-4 py-2 text-center">Reason</th>
                <th class="px-4 py-2 text-center">Experience</th>
                <th class="px-4 py-2 text-center">Time and Date</th> 
                <th class="px-4 py-2 text-center">Action</th>
            
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
                      echo "<td class='px-4 py-2 text-center'>" . $row['adopt_id'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['name'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['email'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['phone'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['address'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['pet_name'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['pet_type'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['reason'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['experience'] . "</td>";
                      echo "<td class='px-4 py-2 text-center'>" . $row['created_at'] . "</td>";
                      // Add Action Buttons
                      echo "<td class='py-2 px-2 text-center flex justify-center space-x-2'>";
                      echo " <a href='#' onclick=\"openUpdateRecordModal('{$row['adopt_id']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['address']}', '{$row['pet_name']}', '{$row['pet_type']}', '{$row['reason']}', '{$row['experience']}')\" class='bg-yellow-500 text-white px-2 py-1  rounded-lg hover:bg-yellow-600'>Update</a>";

                      echo"<a href='#' onclick=\"openRecordDeleteModal('{$row['adopt_id']}')\" class='bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600'>Delete</a>";
                      echo "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='11' class='px-4 py-2 text-center'>No users found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
    

<!-- Update Account Modal -->
<div id="updateRecordModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-3/4 p-6">
    <h2 class="text-xl font-semibold mb-4">Update Record</h2>
    <form action="" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full">
    <input type="hidden" id="updateRecordId" name="adopt_id">
        <div class="grid grid-cols-2">
          <div class="">
            <div class="mb-4 mr-4">
              <label for="name" class="block text-gray-700">Full Name:</label>
              <input type="text" id="updateName" name="name" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4 mr-4">
              <label for="email" class="block text-gray-700">Email Address:</label>
              <input type="email" id="updateEmail" name="email" class="w-full p-2 border border-gray-300 rounded mt-1">
             
            </div>

            <div class="mb-4 mr-4">
              <label for="phone" class="block text-gray-700">Phone Number:</label>
              <input type="tel" id="updatePhone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1">
             
            </div>

            <div class="mb-4 mr-4">
              <label for="address" class="block text-gray-700">Home Address:</label>
              <input type="text" id="updateAddress" name="address" class="w-full p-2 border border-gray-300 rounded mt-1">
             
            </div>
          </div>

          <div class="">
            <div class="mb-4 mr-4">
              <label for="petName" class="block text-gray-700">Pet Name:</label>
              <input type="text" id="updatePetName" name="petName" class="w-full p-2 border border-gray-300 rounded mt-1">
            
            </div>

            <div class="mb-4 mr-4">
    <label for="petType" class="block text-gray-700">Type of Pet:</label>
    <select id="updatePetType" name="petType" class="w-full p-2 border border-gray-300 rounded mt-1">
        <option value="">Choose...</option> <!-- Added blank option -->
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
        <option value="Other" >Other</option>
    </select>
   
</div>

            <div class="mb-4 mr-4">
              <label for="reason" class="block text-gray-700">Why do you want to adopt this pet?</label>
              <textarea id="updateReason" name="reason" rows="4" class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
             
            </div>
            <div class="mb-4 mr-4">
    <label for="experience" class="block text-gray-700">Do you have experience with pets?</label>
    <select id="updateExperience" name="experience" class="w-full p-2 border border-gray-300 rounded mt-1">
        <option value="">Choose...</option> <!-- Added blank option -->
        <option value="Yes" >Yes</option>
        <option value="No" >No</option>
    </select>
  
</div>
        </div>
        </div>
        <div class="flex justify-end">
        <button type="submit" name="updateRecord" class="bg-blue-500 text-white p-2 rounded-lg mr-2">Update</button>
        <button type="button" id="closeUpdateRecordModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
      </div>
      </form>
  </div>
</div>






  <!-- Delete User Modal -->
<div id="deleteRecordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
        <p>Are you sure you want to delete this Record?</p>
        <div class="flex justify-between mt-4">
            <button id="confirmRecordDelete" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            <button onclick="closeRecordDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        </div>
    </div>
</div>

<script src="disc/js/script.js"></script>
<script src="disc/js/script-admin.js"></script>
<script>
// Open Update Account Modal
function openUpdateRecordModal(adopt_id, name, email, phone, address, pet_name, pet_type, reason, experience) {
    document.getElementById('updateRecordId').value = adopt_id;
    document.getElementById('updateName').value = name;
    document.getElementById('updateEmail').value = email;
    document.getElementById('updatePhone').value = phone;
    document.getElementById('updateAddress').value = address;
    document.getElementById('updatePetName').value = pet_name;
    document.getElementById('updatePetType').value = pet_type;
    document.getElementById('updateReason').value = reason;
    document.getElementById('updateExperience').value = experience;
    document.getElementById(' updateRecordModal').classList.remove('hidden');
}

// Close Update Account Modal
document.getElementById('closeUpdateRecordModal').addEventListener('click', function() {
    document.getElementById('updateRecordModal').classList.add('hidden');
});

  let RecordIdToDelete = null;

  function openRecordDeleteModal(adopt_id) {
      RecordIdToDelete = adopt_id; // Store the user ID to be deleted
      document.getElementById('deleteRecordModal').classList.remove('hidden');
  }
  
  function closeRecordDeleteModal() {
      document.getElementById('deleteRecordModal').classList.add('hidden');
  }
  
  document.getElementById('confirmRecordDelete').onclick = function() {
      if (RecordIdToDelete) {
          window.location.href = `admin_adoption.php?adopt_id=${RecordIdToDelete}`; // Redirect to delete.php
      }
      closeRecordDeleteModal(); // Close modal after confirming
  };
  


</script>
</body>
</html>
