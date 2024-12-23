<?php
include('../dbconn/config.php');
include('../dbconn/authentication.php');
checkAccess('admin');

// Handle Update Registration
if (isset($_POST['updateReg'])) {
    $id = intval($_POST['id']); // Get the record ID
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $targetDir = "../stored/pet_image";
    $vaccineDir = "../stored/vaccine_record/";

    // Get input values
    $ownerName = htmlspecialchars($_POST['owner_name']);
    $email = htmlspecialchars($_POST['email']);
    $petName = htmlspecialchars($_POST['pet_name']);
    $petAge = htmlspecialchars($_POST['pet_age']);
    $petBreed = htmlspecialchars($_POST['pet_breed']);
    $address = htmlspecialchars($_POST['address']);
    $additionalInfo = htmlspecialchars($_POST['additional_info']);

    // Fetch existing data to keep the current image if no new image is uploaded
    $sql = "SELECT pet_image, pet_vaccine FROM register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $existingData = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit;
    }

    // Handle file uploads with a helper function
    function handleFileUpload($fileInputName, $allowedTypes, $targetDir, $existingFile = null) {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === 0) {
            $fileType = mime_content_type($_FILES[$fileInputName]['tmp_name']);
            $fileSize = $_FILES[$fileInputName]['size'];
            if (in_array($fileType, $allowedTypes) && $fileSize <= 2 * 1024 * 1024) { // 2MB limit
                $fileName = basename($_FILES[$fileInputName]['name']);
                $sanitizedFile = preg_replace("/[^a-zA-Z0-9,\-_]/", "", $fileName); // Sanitize filename
                $targetFile = $targetDir . DIRECTORY_SEPARATOR . $sanitizedFile;

                if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
                    return $targetFile;
                }
            }
        }
        return $existingFile;
    }

    // Handle the pet image upload
    $petImagePath = handleFileUpload('pet_image', $allowedTypes, $targetDir, $existingData['pet_image']);

    // Handle the vaccine record upload
    $vaccineRecordPath = handleFileUpload('vaccine_record', $allowedTypes, $vaccineDir, $existingData['pet_vaccine']);

    // Update the database
    $sql = "UPDATE register SET owner = ?, email = ?, pet = ?, age = ?, breed = ?, address = ?, pet_image = ?, pet_vaccine = ?, additional_info = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $ownerName, $email, $petName, $petAge, $petBreed, $address, $petImagePath, $vaccineRecordPath, $additionalInfo, $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('Registration updated successfully');
        window.location.href = 'admin_reg.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

// Handle Delete Record
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('Registration deleted successfully');
        window.location.href = 'admin_reg.php';
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
  <body class="flex bg-[#0077b6] font-poppins ">

    <!-- Sidebar -->
    <?php include('disc/partials/admin_sidebar.php'); ?>

    <!-- Main Content with Navbar -->
    <div class="w-full">
    <?php include('disc/partials/admin_navbar.php'); ?>
    
    <div class="bg-white rounded-lg p-4 m-4 ">
  <h2 class=" flex justify-center font-poppins font-bold">ADOPTION MANAGEMENT</h2>
  <div class="flex justify-between my-4">
  <span></span>
  <input class="border p-1 rounded-lg" type="text" placeholder="Search...">
  </div>
  <table class="w-full table-fixed">
    <thead>
      <tr class="bg-gray-100"">
        <th class="text-sm text-center  ">No.</th>
        <th class="text-sm text-center  "> Name</th>
        <th class="text-sm text-center  ">Email</th>
        <th class="text-sm text-center  ">Pet Name</th>
        <th class="text-sm text-center  ">Pet Age</th>
        <th class="text-sm text-center  ">Pet Breed</th>
        <th class="text-sm text-center  ">Address</th>
        <th class="text-sm text-center  ">Pet Image</th>
        <th class="text-sm text-center  ">Vaccine Record</th>
        <th class="text-sm text-center  ">Additional Info</th>
        <th class="text-sm text-center  ">Time and Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM register";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $rowNumber = 0 ;
          
        while ($row = $result->fetch_assoc()) {
          
            if(empty($row['owner']) || empty($row['email']) || empty($row['pet']) || empty($row['age']) || empty($row['breed']) || empty($row['address'])){
                $rowNumber = 0;
            }else{
                $rowNumber++;
            }


              echo "<tr class='bg-blue-200 hover:bg-blue-400'>";
              echo "<td class='text-sm text-center  '>" . $rowNumber . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['owner'] . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['email'] . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['pet'] . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['age'] . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['breed'] . "</td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['address'] . "</td>";
              echo "<td class='text-sm text-center '><a href='" . $row['pet_image'] . "' target='_blank'><img src='" . $row['pet_image'] . "' alt='Pet Image' class='w-16 h-16 object-cover rounded'></a></td>";
              echo "<td class='text-sm text-center  '><a href='" . $row['pet_vaccine'] . "' target='_blank'><img src='" . $row['pet_vaccine'] . "' alt='Pet vaccine' class='w-16 h-16 object-cover rounded'></a></td>";
              echo "<td class='text-sm text-center whitespace-nowrap truncate '>" . $row['additional_info'] . "</td>";
              echo "<td class='text-sm text-center  '>" . $row['created_at'] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='11' class='py-2 border text-center'>No users found</td></tr>";
      }
      ?>
    </tbody>
  </table>


</div>
   
    </div>


    <div id="updateRegModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg w-3/4 p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Update Registration Form</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md w-full">
            <input type="hidden" name="id" id="updateRegId">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="updateOwnerName" class="block mb-2">Owner Name</label>
                    <input type="text" id="updateOwnerName" name="owner_name" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updateEmail" class="block mb-2">Email</label>
                    <input type="text" id="updateEmail" name="Email" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updatePetName" class="block mb-2">Pet Name</label>
                    <input type="text" id="updatePetName" name="pet_name" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updatePetAge" class="block mb-2">Pet Age</label>
                    <input type="number" id="updatePetAge" name="pet_age" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updatePetBreed" class="block mb-2">Pet Breed</label>
                    <input type="text" id="updatePetBreed" name="pet_breed" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updateAddress" class="block mb-2">Address</label>
                    <input type="text" id="updateAddress" name="address" class="border w-full p-2" required>
                </div>

                <div>
                    <label for="updateAdditionalInfo" class="block mb-2">Additional Information</label>
                    <textarea id="updateAdditionalInfo" name="additional_info" class="border w-full p-2" required></textarea>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="updatePetImage" class="block mb-2">Pet Image</label>
                    <input type="file" name="pet_image" class="border w-full">
                </div>

                <div>
                    <label for="updateVaccineRecord" class="block mb-2">Vaccine Record</label>
                    <input type="file" name="vaccine_record" class="border w-full">
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="submit" name="updateReg" class="bg-blue-500 text-white p-2 rounded-lg">Update</button>
                <button type="button" id="closeUpdateRegModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
            </div>
        </form>
    </div>
</div>

</div>




    <!-- Delete User Modal -->
    <div id="deleteRegModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
      <div class="bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
          <p>Are you sure you want to delete this Record?</p>
          <div class="flex justify-between mt-4">
              <button id="confirmRegDelete" class="bg-red-500 text-white py-2 rounded">Delete</button>
              <button onclick="closeRegDeleteModal()" class="bg-gray-500 text-white py-2 rounded">Cancel</button>
          </div>
      </div>
    </div>

    
    <script src="disc/js/script.js"></script>
    <script src="disc/js/script-admin.js"></script>
    <script>

function openUpdateRegModal(id, owner, email, pet, age, breed, address, additional_info, pet_image, pet_vaccine) {
            document.getElementById('updateRegId').value = id;
            document.getElementById('updateOwnerName').value = owner;
            document.getElementById('updateEmail').value = email;
            document.getElementById('updatePetName').value = pet;
            document.getElementById('updatePetAge').value = age;
            document.getElementById('updatePetBreed').value = breed;
            document.getElementById('updateAddress').value = address;
            document.getElementById('updateAdditionalInfo').value = additional_info;

            document.getElementById('updateRegModal').classList.remove('hidden');
        }

        document.getElementById('closeUpdateRegModal').addEventListener('click', function() {
            document.getElementById('updateRegModal').classList.add('hidden');
        });



      let RegIdToDelete = null;

      function openRegDeleteModal(id) {
        RegIdToDelete = id;
        document.getElementById('deleteRegModal').classList.remove('hidden');
      }

      function closeRegDeleteModal() {
        document.getElementById('deleteRegModal').classList.add('hidden');
      }

      document.getElementById('confirmRegDelete').onclick = function() {
        if (RegIdToDelete) {
          window.location.href = `admin_reg.php?id=${RegIdToDelete}`;
        }
        closeRegDeleteModal();
      };
    </script>

  </body>
  </html>
