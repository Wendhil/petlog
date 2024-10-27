<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess( 'user'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array();
    // Validate each field and store error messages if any
    if (empty($_POST['report_party'])) {
        $error['report_party'] = "Report Party is required";
    } else {
        $reportParty = htmlspecialchars($_POST['report_party']);
    }

    if (empty($_POST['phone'])) {
        $error['phone'] = "Phone is required";
    } else {
        $phone = htmlspecialchars($_POST['phone']);
    }

    if (empty($_POST['email'])) {
        $error['email'] = "Email is required";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['species'])) {
        $error['species'] = "Species is required";
    } else {
        $species = htmlspecialchars($_POST['species']);
    }

    if (empty($_POST['breed'])) {
        $error['breed'] = "Breed is required";
    } else {
        $breed = htmlspecialchars($_POST['breed']);
    }

    if (empty($_POST['age'])) {
        $error['age'] = "Age is required";
    } else {
        $age = htmlspecialchars($_POST['age']);
    }

    if (empty($_POST['number'])) {
        $error['number'] = "Number is required";
    } else {
        $number = htmlspecialchars($_POST['number']);
    }

    if (empty($_POST['abuse_nature'])) {
        $error['abuse_nature'] = "Nature of Abuse is required";
    } else {
        $abuse_nature = htmlspecialchars($_POST['abuse_nature']);
    }

    if (empty($_POST['description'])) {
        $error['description'] = "Description is required";
    } else {
        $incidentDescription = htmlspecialchars($_POST['description']);
    }

    // Handle file upload
    if (isset($_FILES['imgInput']) && $_FILES['imgInput']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($_FILES['imgInput']['tmp_name']);
        $fileSize = $_FILES['imgInput']['size'];

        // Check file type
        if (!in_array($fileType, $allowedTypes)) {
            $error['imgInput'] = "Only JPEG, JPG, and PNG files are allowed";
        }
        // Check file size (limit to 2MB)
        elseif ($fileSize > 2 * 1024 * 1024) {
            $error['imgInput'] = "File size should not exceed 2MB";
        } else {
            $evidenceFile = basename($_FILES['imgInput']['name']);
            $targetDir = "stored/reportEvidence/";
            $targetFile = $targetDir . preg_replace("/[^a-zA-Z0-9.\-_]/", "", $evidenceFile); // Sanitize filename
        }
    } else {
        $error['imgInput'] = "Evidence file is required";
    }

    // Check if there are no errors before inserting into the database
    if (empty($error)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO reports (name, phone, email, species, breed, age, numabuse, typeabuse, descript, evidence) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $reportParty, $phone, $email, $species, $breed, $age, $number, $abuse_nature, $incidentDescription, $targetFile);

        if ($stmt->execute()) {
            if (move_uploaded_file($_FILES['imgInput']['tmp_name'], $targetFile)) {
                echo "<script>
                alert('Report successfully submitted');
                window.location.href = 'user_report.php';
                </script>";
            } else {
                echo "<script>
                alert('Error uploading evidence file.');
                window.location.href = 'user_report.php';
                </script>";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="disc/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="flex bg-gray-300">

  <!-- Sidebar -->
  <?php include ('disc/partials/sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    
    <!-- Top Navbar -->
    <?php include ('disc/partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
      <div class="flex justify-center items-center w-full">
        <form action="" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full" enctype="multipart/form-data">
          <h2 class="text-2xl font-bold mb-6 text-center">Report Form</h2>
          <div class="grid grid-cols-2 gap-4">
            
            <!-- Report Party Field -->
            <div>
              <label class="block text-gray-700" for="report_party">Report Party</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="report_party"  type="text" value="<?php echo isset($_POST['report_party']) ? htmlspecialchars($_POST['report_party']) : ''; ?>">
              <?php if (isset($error['report_party'])) echo "<span class='text-red-500 text-sm'>" . $error['report_party'] . "</span>"; ?>
            </div>

            <!-- Phone Field -->
            <div>
              <label class="block text-gray-700" for="phone">Phone</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" type="tel" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
              <?php if (isset($error['phone'])) echo "<span class='text-red-500 text-sm'>" . $error['phone'] . "</span>"; ?>
            </div>

            <!-- Email Field -->
            <div>
              <label class="block text-gray-700" for="email">Email</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" type="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
              <?php if (isset($error['email'])) echo "<span class='text-red-500 text-sm'>" . $error['email'] . "</span>"; ?>
            </div>

            <!-- Species Field -->
            <div>
              <label class="block text-gray-700" for="species">Species</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="species" type="text" value="<?php echo isset($_POST['species']) ? htmlspecialchars($_POST['species']) : ''; ?>">
              <?php if (isset($error['species'])) echo "<span class='text-red-500 text-sm'>" . $error['species'] . "</span>"; ?>
            </div>

            <!-- Breed Field -->
            <div>
              <label class="block text-gray-700" for="breed">Breed</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="breed"  type="text" value="<?php echo isset($_POST['breed']) ? htmlspecialchars($_POST['breed']) : ''; ?>">
              <?php if (isset($error['breed'])) echo "<span class='text-red-500 text-sm'>" . $error['breed'] . "</span>"; ?>
            </div>

            <!-- Age Field -->
            <div>
              <label class="block text-gray-700" for="age">Age</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="age"  type="text" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>">
              <?php if (isset($error['age'])) echo "<span class='text-red-500 text-sm'>" . $error['age'] . "</span>"; ?>
            </div>

            <!-- Number Field -->
            <div>
              <label class="block text-gray-700" for="number">Number</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="number"  type="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
              <?php if (isset($error['number'])) echo "<span class='text-red-500 text-sm'>" . $error['number'] . "</span>"; ?>
            </div>

            <!-- Nature of Abuse Field -->
            <div>
            <label class="block text-gray-700" for="abuse_nature">Nature of Abuse</label>
            <select class="w-full p-2 border border-gray-300 rounded mt-1" name="abuse_nature" id="abuse_nature">
            <option value="">Choose</option>
            <option value="physical abuse" <?php if (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == "physical abuse") echo "selected"; ?>>Physical Abuse</option>
            <option value="emotional abuse" <?php if (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == "emotional abuse") echo "selected"; ?>>Emotional Abuse</option>
            <option value="sexual abuse" <?php if (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == "sexual abuse") echo "selected"; ?>>Sexual Abuse</option>
            <option value="other" <?php if (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == "other") echo "selected"; ?>>Other</option>
           </select>
          <?php if (isset($error['abuse_nature'])) echo "<span class='text-red-500 text-sm'>" . $error['abuse_nature'] . "</span>"; ?>
          </div>

            <!-- Description Field -->
            <div>
              <label class="block text-gray-700" for="description">Description of Incident</label>
              <textarea class="w-full p-2 border border-gray-300 rounded mt-1" name="description" ><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
              <?php if (isset($error['description'])) echo "<span class='text-red-500 text-sm'>" . $error['description'] . "</span>"; ?>
            </div>

            <!-- Evidence Field -->
            <div>
              <label class="block text-gray-700" for="imgInput">Evidence</label>
              <input class="w-full p-2 border border-gray-300 rounded mt-1" name="imgInput"  type="file">
              <?php if (isset($error['imgInput'])) echo "<span class='text-red-500 text-sm'>" . $error['imgInput'] . "</span>"; ?>
            </div>

          </div>
          <div class="flex justify-center">
            <button type="submit" name="reportBtn" class="bg-blue-600 text-white p-2 rounded mt-4 hover:bg-blue-700">Submit Report</button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script src="disc/js/script.js"></script>
</body>
</html>
