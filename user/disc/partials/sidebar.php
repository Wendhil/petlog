<<<<<<< HEAD
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    .font-poppins {
    font-family: 'Poppins', sans-serif;
}
  </style>

=======
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
<div id="sidebar" class="bg-blue-600 text-white w-64 transition-width duration-300 min-h-screen flex flex-col sidebar-expanded">
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
<<<<<<< HEAD
    <a href="user_dashboard.php" data-content="dashboard" class="text-center font-bold space-x-4 p-2 ">
        <span class="sidebar-text">Pet AnimalWelfare Protection System</span>
      </a>
=======
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
    <hr class="mx-4">
    <!-- Sidebar Links -->
    <nav class="flex-1 flex flex-col space-y-4 mt-4 p-4">
 
      <a href="user_dashboard.php" data-content="dashboard" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded">
<<<<<<< HEAD
      
      <i class="fa-solid fa-book"></i>
=======
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6m-6 6v-3a9 9 0 009-9" />
        </svg>
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
        <span class="sidebar-text">Dashboard</span>
      </a>
      
      <div class="relative">
        <button onclick="toggleDropdown('adoptionDropdownContent', 'adoptionArrowIcon')" class="flex items-center justify-between p-2 w-full text-left hover:bg-blue-700 rounded transition duration-300">
          <div class="flex items-center space-x-4">
<<<<<<< HEAD
          <i class="fa-solid fa-user"></i>
=======
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
            <span class="sidebar-text">Adoption</span>
          </div>
          <svg id="adoptionArrowIcon" class="sidebar-text h-5 w-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="adoptionDropdownContent" class="ml-10 text-gray-200 hidden">
<<<<<<< HEAD
       <a href="user_petview.php" data-content="adoptionView" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Our animals</a></span>
       <a href="user_adoption.php" data-content="adoptionForm" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Adoption Form</a></span>
=======
          <a href="user_petview.php" data-content="adoptionView" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Our animals</a>
          <a href="user_adoption.php" data-content="adoptionForm" class="sidebar-text block p-2 hover:bg-blue-700 rounded content-link">Adoption Form</a>
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
          <a href=""></a>
        </div>
      </div>

<<<<<<< HEAD
      <a href="user_register.php" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded content-link">
      <i class="fa-solid fa-users-gear"></i>
        <span class="sidebar-text">Registration Form</span>
      </a>

      <a href="user_report.php" data-content="registration" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded content-link">
      <i class="fa-solid fa-circle-exclamation"></i>
        <span class="sidebar-text">Service Report</span>
      </a>
    
      
=======
 
      <a href="user_report.php" data-content="registration" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded content-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21l-2-2a9 9 0 10-3.965 3.965L20 21z" />
        </svg>
        <span class="sidebar-text">Report</span>
      </a>
    
      <a href="user_register.php" class="flex items-center space-x-4 p-2 hover:bg-blue-700 rounded content-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21l-2-2a9 9 0 10-3.965 3.965L20 21z" />
        </svg>
        <span class="sidebar-text">Registration</span>
      </a>
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
    </nav>
  </div>