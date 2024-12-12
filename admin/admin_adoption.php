<?php
include('../dbconn/config.php');
include('../dbconn/authentication.php');
checkAccess('admin'); 

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
</head>
<body class=" flex bg-[#90e0ef] font-poppins">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full">
  <!-- Top Navbar -->
    <?php include('disc/partials/admin_navbar.php'); ?>
    
    <!-- Main Content Area -->
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
