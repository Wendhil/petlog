<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess('user');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array();
    // Initialize variables to avoid undefined variable notices
    $reportParty = $phone = $email = $species = $breed = $age = $number = $abuse_nature = $incidentDescription = $targetFile = '';

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
        
        // Apply email validation filter
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email format";
        }
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
            $targetDir = "../stored/reportEvidence/";

            // Ensure the target directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            // Sanitize the filename and prepare the target file path
            $targetFile = $targetDir . preg_replace("/[^a-zA-Z0-9.\-_]/", "", $evidenceFile); 

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($_FILES['imgInput']['tmp_name'], $targetFile)) {
                $error['imgInput'] = "Failed to move uploaded file.";
            }
        }
    } else {
        $error['imgInput'] = "Evidence file is required";
    }

    // Check if there are no errors before inserting into the database
    if (empty($error)) {
        $sql = "INSERT INTO reports (name, phone, email, species, breed, age, numabuse, typeabuse, descript, evidence) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $reportParty, $phone, $email, $species, $breed, $age, $number, $abuse_nature, $incidentDescription, $targetFile);

        // Execute and check for success
        if ($stmt->execute()) {
            echo "<script>
            alert('Report successfully submitted');
            window.location.href = 'user_report.php';
            </script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<<<<<<< HEAD

<style>
     body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            font-weight: bold;
        }

</style>

<body class="flex bg-[#90e0ef]">
=======
<body class="flex bg-gray-300">
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4

<!-- Sidebar -->
<?php include('disc/partials/sidebar.php'); ?>

<!-- Main Content with Navbar -->
<div class="flex-1 flex flex-col">

    <!-- Top Navbar -->
    <?php include('disc/partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
        <div class="flex justify-center items-center w-full">
            <form action="" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full" enctype="multipart/form-data">
<<<<<<< HEAD
            <i class="fas fa-paw text-3xl text-blue-500 mb-2"></i><h2 class="text-2xl font-bold mb-6 text-center">Report Form</h2>
=======
                <h2 class="text-2xl font-bold mb-6 text-center">Report Form</h2>
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
                <div class="grid grid-cols-2 gap-4">

                    <!-- Report Party Field -->
                    <div>
                        <label class="block text-gray-700" for="report_party">Report Party</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="report_party" type="text" value="<?php echo isset($_POST['report_party']) ? htmlspecialchars($_POST['report_party']) : ''; ?>" required>
                        <?php if (isset($error['report_party'])) echo "<span class='text-red-500 text-sm'>" . $error['report_party'] . "</span>"; ?>
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label class="block text-gray-700" for="phone">Phone</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" type="tel" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required>
                        <?php if (isset($error['phone'])) echo "<span class='text-red-500 text-sm'>" . $error['phone'] . "</span>"; ?>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label class="block text-gray-700" for="email">Email</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" type="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                        <?php if (isset($error['email'])) echo "<span class='text-red-500 text-sm'>" . $error['email'] . "</span>"; ?>
                    </div>

                    <!-- Species Field -->
                    <div>
                        <label class="block text-gray-700" for="species">Species</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="species" type="text" value="<?php echo isset($_POST['species']) ? htmlspecialchars($_POST['species']) : ''; ?>" required>
                        <?php if (isset($error['species'])) echo "<span class='text-red-500 text-sm'>" . $error['species'] . "</span>"; ?>
                    </div>

                    <!-- Breed Field -->
                    <div>
                        <label class="block text-gray-700" for="breed">Breed</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="breed" type="text" value="<?php echo isset($_POST['breed']) ? htmlspecialchars($_POST['breed']) : ''; ?>" required>
                        <?php if (isset($error['breed'])) echo "<span class='text-red-500 text-sm'>" . $error['breed'] . "</span>"; ?>
                    </div>

                    <!-- Age Field -->
                    <div>
                        <label class="block text-gray-700" for="age">Age</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="age" type="number" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>" required>
                        <?php if (isset($error['age'])) echo "<span class='text-red-500 text-sm'>" . $error['age'] . "</span>"; ?>
                    </div>

                    <!-- Number of Abuse Field -->
                    <div>
                        <label class="block text-gray-700" for="number">Number of Abuses</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="number" type="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>" required>
                        <?php if (isset($error['number'])) echo "<span class='text-red-500 text-sm'>" . $error['number'] . "</span>"; ?>
                    </div>

                    <!-- Nature of Abuse Field -->
                   <div>
            <label class="block text-gray-700" for="abuse_nature">Nature of Abuse</label>
            <select class="w-full p-2 border border-gray-300 rounded mt-1" name="abuse_nature" required>
                <option value="">Select Nature of Abuse</option>
                <option value="Physical Abuse" <?php echo (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == 'Physical Abuse') ? 'selected' : ''; ?>>Physical Abuse</option>
                <option value="Emotional Abuse" <?php echo (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == 'Emotional Abuse') ? 'selected' : ''; ?>>Emotional Abuse</option>
                <option value="Neglect" <?php echo (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == 'Neglect') ? 'selected' : ''; ?>>Neglect</option>
                <option value="Abandonment" <?php echo (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == 'Abandonment') ? 'selected' : ''; ?>>Abandonment</option>
                <option value="Other" <?php echo (isset($_POST['abuse_nature']) && $_POST['abuse_nature'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
            <?php if (isset($error['abuse_nature'])) echo "<span class='text-red-500 text-sm'>" . $error['abuse_nature'] . "</span>"; ?>
        </div>

                    <!-- Incident Description Field -->
                    <div class="col-span-2">
                        <label class="block text-gray-700" for="description">Description</label>
                        <textarea class="w-full p-2 border border-gray-300 rounded mt-1" name="description" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                        <?php if (isset($error['description'])) echo "<span class='text-red-500 text-sm'>" . $error['description'] . "</span>"; ?>
                    </div>

                    <!-- Evidence File Upload -->
                    <div class="col-span-2">
                        <label class="block text-gray-700" for="imgInput">Evidence (JPEG/PNG, max 2MB)</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" name="imgInput" type="file" required>
                        <?php if (isset($error['imgInput'])) echo "<span class='text-red-500 text-sm'>" . $error['imgInput'] . "</span>"; ?>
                    </div>

                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded">Submit Report</button>
                </div>
            </form>
        </div>
    </main>
</div>
<<<<<<< HEAD
<script src="disc/js/script.js"></script>
=======

>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
</body>
</html>