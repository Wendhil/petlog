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
    <div class="w-full">
  <h1 class="text-2xl font-bold flex justify-center mb-4">Our Animals</h1>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Card Template -->
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/cat.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">sunny</h2>
        <p class="text-center text-gray-600 mb-2">Type: Cat</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/dog.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">winky</h2>
        <p class="text-center text-gray-600 mb-2">Type: Dog</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/cat1.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">Bravo</h2>
        <p class="text-center text-gray-600 mb-2">Type: Cat</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/dog1.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">smiley</h2>
        <p class="text-center text-gray-600 mb-2">Type: Dog</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/cat2.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">Alex</h2>
        <p class="text-center text-gray-600 mb-2">Type: Cat</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/dog2.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">shaggy</h2>
        <p class="text-center text-gray-600 mb-2">Type: Dog</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/cat3.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">Jhonny</h2>
        <p class="text-center text-gray-600 mb-2">Type: Cat</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>    <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
      <img src="../stored/pet_image/dog3.jpg" alt="Animal" class="w-full h-45 object-cover">
      <div class="p-4">
        <h2 class="font-bold text-lg text-center mb-2">miles</h2>
        <p class="text-center text-gray-600 mb-2">Type: Dog</p>
        <p class="text-sm text-gray-700 text-center mb-2"></p>
        <div class="flex justify-center">
          <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
            Adopt Me
          </button>
        </div>
      </div>
    </div>
    <!-- Add more cards as needed -->
  </div>
 
  <!-- Modal -->
  <div id="adoptionModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-96 p-6 shadow-lg">
      <h2 class="text-2xl font-bold mb-4">Adopt Animal Name</h2>
      <p class="text-gray-600 mb-4">Here's some more detailed information about this animal, including its age, breed, and personality traits.</p>
      <p class="text-gray-600 mb-4">Type: Dog</p>
      <p class="text-gray-600 mb-4">Age: 2 years</p>
      <p class="text-gray-600 mb-4">Breed: Labrador</p>
      <div class="flex justify-end">
        <button onclick="closeModal()" class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700 transition duration-300">Close</button>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300"><a href="user_adoption.php">Proceed to Adopt</a></button>
      </div>
    </div>
  </div>
</div>   
    </main>
  </div>

  <script src="disc/js/script.js"></script>
</body>
</html>


