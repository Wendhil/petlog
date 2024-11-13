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
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
</head>
<style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            font-weight: bold;
        }
</style>
<body class="flex bg-[#90e0ef]">

  <!-- Sidebar -->
<?php
  include('disc/partials/sidebar.php');
 ?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    
    <!-- Top Navbar -->
 <?php
  include('disc/partials/navbar.php');
 ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
     <?php
      include('disc/modal/animal_View.php');
     ?>
    </main>
  </div>

  <script src="disc/js/script.js"></script>
</body>
</html>


