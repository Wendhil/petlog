<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
      crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    .font-poppins {
    font-family: 'Poppins';
}

  </style>

<aside id="sidebar" class=" bg-[#042752] text-white w-64 transition-width duration-300 min-h-screen flex flex-col sidebar-expanded font-poppins text-sm">
    <div class="flex justify-center ">
      <div class="flex justify-center p-4 ">
        <img width="100" height="100" src="img/barangay.png" alt="">
      </div>
      <button id="toggleBtn" class="text-white p-1 focus:outline-none md:hidden">
        <!-- Optional toggle icon can be added here -->
      </button>
   
    </div> 
    <a href="admin_dashboard.php" data-content="dashboard" class="text-center  space-x-4 p-2 ">
        <span class="sidebar-text font-poppins ">Pet AnimalWelfare Protection System</span>
      </a>
    <hr class="mx-2">
    <!-- Sidebar Links -->
    <nav class=" flex flex-col space-y-4 mt-4 p-4">
         
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

    </nav>
</aside>

