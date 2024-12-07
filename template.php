<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/barangay.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="disc/css/style.css">
</head>
<style>
    body {
  font-family: 'Poppins', sans-serif;
  background-color: #f4f7fb;
}
.fixed-center {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 50;
  width: 90%;
  max-width: 400px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 40;
}

.transition-width {
  transition: width 0.3s;
}
.sidebar-text {
  display: none; /* Hidden by default */
}
.dropdown-content {
  display: none; /* Hidden by default */
}
/* Show text when sidebar is expanded */
.sidebar-expanded .sidebar-text {
  display: block; /* Show text when expanded */
}
/* Show dropdown when expanded */
.dropdown-open {
  display: block; /* Show dropdown content */
}
.rotate-180 {
  transform: rotate(180deg); /* Rotate arrow */
  transition: transform 0.3s; /* Smooth transition */
}
.arrow-hidden {
  display: none; /* Hide arrow */
}

</style>
<body class="flex bg-[#90e0ef] ">

<div id="sidebar" class="bg-[#23385C] text-white w-64 transition-width duration-300 min-h-screen flex flex-col sidebar-expanded sticky top-0">
    <div class="flex justify-center ">
      <div class="flex justify-center p-4 ">
        <img width="100" height="100"  src="img/barangay.png" alt="">
      </div>
      <button id="toggleBtn" class="text-white p-1 focus:outline-none md:hidden">
        <svg id="menuIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div> 
    <a href="user_dashboard.php" data-content="dashboard" class="text-center font-bold space-x-4 p-2 ">
        <span class="sidebar-text">Pet AnimalWelfare Protection System</span>
      </a>
    <hr class="mx-4">
    <!-- Sidebar Links -->
    <nav class="flex-1 flex flex-col space-y-4 mt-4 p-4">
 
      <a href="#" data-content="dashboard" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded">
      
      <i class="fa-solid fa-book"></i>
        <span class="sidebar-text">Dashboard</span>
      </a>
      
      <div class="relative">
        <button onclick="toggleDropdown('RegDropdownContent', 'RegArrowIcon')" class="flex items-center justify-between p-2 w-full text-left hover:bg-blue-700 rounded transition duration-300">
          <div class="flex items-center space-x-4">
          <i class="fa-solid fa-users-gear"></i>
            <span class="sidebar-text">Registration</span>
          </div>
          <svg id="RegArrowIcon" class="sidebar-text h-5 w-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="RegDropdownContent" class="ml-10 text-gray-200 hidden">
       <a href="#" data-content="PetReg" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Pet Registration</a></span>
       <a href="#" data-content="PetRegList" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">My Pets</a></span>

        </div>
      </div>
      
      <div class="relative">
        <button onclick="toggleDropdown('adoptionDropdownContent', 'adoptionArrowIcon')" class="flex items-center justify-between p-2 w-full text-left hover:bg-blue-700 rounded transition duration-300">
          <div class="flex items-center space-x-4">
          <i class="fa-solid fa-user"></i>
            <span class="sidebar-text">Adoption</span>
          </div>
          <svg id="adoptionArrowIcon" class="sidebar-text h-5 w-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="adoptionDropdownContent" class="ml-10 text-gray-200 hidden">

        <a href="#" data-content="adoptionView" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Pet Adoption</a></span>

       <a href="#" data-content="adoptionForm" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Open For Adoption</a></span>
       
       <a href="#" data-content="adoptionForm" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">List Of Adoption</a></span>

        </div>
      </div>
      

      <div class="relative">
        <button onclick="toggleDropdown('reportDropdownContent', 'reportArrowIcon')" class="flex items-center justify-between p-2 w-full text-left hover:bg-blue-700 rounded transition duration-300">
          <div class="flex items-center space-x-4">
          <i class="fa-solid fa-circle-exclamation"></i>
            <span class="sidebar-text">Report</span>
          </div>
          <svg id="reportArrowIcon" class="sidebar-text h-5 w-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="reportDropdownContent" class="ml-10 text-gray-200 hidden">
       <a href="#" data-content="missingreport" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Report Animal Missing</a></span>
       <a href="#" data-content="reportcruelty" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Report Animal Cruelty</a></span>
        </div>
      </div>
    </nav>
  </div>



  <!-- Main Content with Navbar -->
  <div class="w-full flex flex-col ">
    
    <!-- Top Navbar -->
 <!-- Header with Logout Button -->
<header class="header flex bg-[#23385C] shadow-md p-4 m-4 item-center justify-between rounded-lg">
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
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-12 rounded-lg shadow-lg text-center">
        <p class="text-lg font-semibold mb-4">Are you sure you want to logout?</p>
        <div class="flex justify-center">
            <button id="cancelBtn" class="bg-gray-300 hover:bg-gray-400 text-black p-2 rounded-md mr-2">
                Cancel
            </button>
            <button onclick="confirmLogout()" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md">
                Confirm Logout
            </button>
        </div>
    </div>
</div>

</header>

    <!-- Main Content Area -->
    <main id="mainContent" class=" justify-center items-center w-full">
    <div class="justify-center items-center">
     <div class="grid grid-cols-2 p-4 mb-36 ">
      <div class="">
      <img class="rounded-lg " src="img/animal_welfare.jpg" alt="animal_welfare">
      </div>
      <div class="grid grid-cols-1 p-4">
        <h2 class="flex font-bold sm:text-3xl m-4 ">Barangay Animal Welfare</h2>
        <p class="flex m-4 text-gray-90">Barangay Animal Welfare promotes animal well-being by encouraging responsible pet ownership, preventing abuse, addressing stray animal issues, and providing resources for pet care, all to foster a compassionate and safe community for animals and residents.</p>
     </div>
     </div>
    
<!--content animal-->
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-cols-3 gap-6 mb-36 ">
      
     <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/dog1.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Dogs
      </div>
       </div>
       <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/cat.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Cats
      </div>
       </div>
       <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/dog2.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Dogs
      </div>
       </div>
       <div class="m-4 col-span-3 mx-6">
       <a href="#" class="flex p-2 border-2 rounded-3xl justify-center items-center hover:bg-blue-500 hover:text-white">
        <span>View Our Animals</span>
       </a>
       </div>
       </div>
       <!--end-->
      
       <div class="w-full p-4 mb-36 ">
     <div class="flex flex-rows ">
      <div class="grid grid-cols-1 mr-4">
        <h2 class="flex font-bold  sm:text-4xl justify-center">Animal Abuse</h2>
        <p class="">Reporting animal abuse is essential to protect animals from harm. If you witness or suspect abuse or neglect, contact local authorities or animal welfare organizations. Your action can help ensure animals receive the care and protection they deserve, promoting a safer, more compassionate community.</p>
        <a href="#" class="flex justify-center items-center  hover:bg-blue-500 border-2 px-2 rounded-lg hover:text-white">Report Form</a>
      </div>  
      <div class=" min-w-fit">
      <img class="rounded-lg" src="img/animal_welfare.jpg" alt="animal_welfare">
      </div>
     </div>
     </div>

     <div class="w-full p-4 mb-36 ">
      <h2 class="flex items-center justify-center arrow-hidden mb-8 text-4xl font-bold">About</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quaerat? Quae cupiditate quisquam dolores sit, blanditiis quo perspiciatis ratione placeat quibusdam, odio odit animi mollitia, modi dicta veritatis sint aut?Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores sapiente, aut itaque dolor nesciunt perferendis sit libero laboriosam qui esse maxime consequatur, nostrum voluptatibus culpa hic commodi inventore earum excepturi.</p>
     </div>



<footer class=" bg-white text-gray-700 shadow mt-10">
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Contact Information -->
            <div class="mb-6 md:mb-0 md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <p>Email: <a href="mailto:info@yourwebsite.com" class="text-green-600 hover:underline">info@yourwebsite.com</a></p>
                <p>Phone: <a href="tel:+11234567890" class="text-green-600 hover:underline">+1 (123) 456-7890</a></p>
                <p>Address: 123 Main Street, Your City, Your Country</p>
            </div>

            <!-- Social Media Links -->
            <div class="mb-6 md:mb-0 md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Facebook</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Twitter</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Instagram</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">LinkedIn</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">About Us</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Services</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Volunteer</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Contact</a>
                <a href="#" class="block text-gray-600 hover:text-green-600">FAQ</a>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center mt-6">
            <p class="text-sm">&copy; 2024 Your Organization. All rights reserved.</p>
        </div>
    </div>
</footer>
    </main>
  </div>

  <script>
    
//start:sidebar

 //Sidebar functions
 const toggleBtn = document.getElementById('toggleBtn');
 const sidebarToggle = document.getElementById('sidebarToggle');
 const sidebar = document.getElementById('sidebar');

 function toggleSidebar() {
   sidebar.classList.toggle('w-20');
   sidebar.classList.toggle('w-64');
   sidebar.classList.toggle('sidebar-expanded');
 
 }
  // Event Listeners
  toggleBtn.addEventListener('click', toggleSidebar);
  sidebarToggle.addEventListener('click', toggleSidebar);

 

  function toggleDropdown(dropdownContentId, arrowIconId) {
    // Get all dropdown contents and arrow icons
    const allDropdownContents = document.querySelectorAll('.dropdown-content');
    const allArrowIcons = document.querySelectorAll('.sidebar-text svg');
  
    // Loop through all dropdowns and close them
    allDropdownContents.forEach((content) => {
      if (content.id !== dropdownContentId) {
        content.classList.add('hidden'); // Close other dropdowns
      }
    });
  
    allArrowIcons.forEach((icon) => {
      if (icon.id !== arrowIconId) {
        icon.classList.remove('rotate-90'); // Reset other arrow rotations
      }
    });
  
    // Toggle the current dropdown and arrow
    const dropdownContent = document.getElementById(dropdownContentId);
    const arrowIcon = document.getElementById(arrowIconId);
  
    dropdownContent.classList.toggle('hidden'); // Toggle visibility
    arrowIcon.classList.toggle('rotate-90'); // Rotate arrow
  }
  //end:sidebar
  
  // modal
    // Function to show the modal
    function showModal() {
        document.getElementById('logoutModal').style.display = 'flex';
    }

    // Function to hide the modal
    function closeModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }

    // Function to handle the logout logic
    function confirmLogout() {
        window.location.href = '#';
    }

    // Optional: Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('logoutModal');
        if (event.target === modal) {
            closeModal();
        }
    };

    // Attach the closeModal function to the Cancel button
    document.getElementById('cancelBtn').onclick = closeModal;
  
  </script>
</body>
</html>
