
<!-- Font and Icon CSS Links -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        z-index: 999; /* Ensures it appears above other content */
        display: none; /* Hide by default */
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 400px;
        width: 90%;
        z-index: 1000; /* Ensure modal content is above the overlay */
        text-align: center;
    }

    /* Header Styles */
    .header {
        background-color: #2563eb;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        margin: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 0.5rem;
    }
</style>

<!-- Header with Logout Button -->
<header class="header ">
    <button id="sidebarToggle" class="text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="relative">
        <button id="logoutBtn" class="flex items-center gap-2 text-white hover:bg-blue-700 rounded-lg p-1 focus:outline-none transition duration-200 ease-in-out" onclick="showModal()">
            <i class="fas fa-sign-out-alt"></i>
            <span class="hidden md:block">Logout</span> <!-- Show text only on larger screens -->
        </button>
    </div>
</header>

<!-- Modal for Logout Confirmation -->
<div class="modal-overlay" id="logoutModal">
    <div class="modal-content">
        <p>Are you sure you want to logout?</p>
        <button id="cancelBtn" class="bg-gray-300 p-2 rounded-md mr-2">Cancel</button>
        <button onclick="confirmLogout()" class="bg-red-500 text-white p-2 rounded-md">Confirm Logout</button>
    </div>
</div>

<script>
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
        window.location.href = '../logout.php';
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
