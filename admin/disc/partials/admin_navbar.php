<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<header class="bg-blue-600 shadow p-4 m-2 flex items-center justify-between rounded-lg">
    <button id="sidebarToggle" class="text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="relative">
        <button id="logoutBtn" class="flex items-center gap-2 text-white hover:bg-blue-700 rounded-lg p-1 focus:outline-none transition duration-200 ease-in-out">
            <i class="fas fa-sign-out-alt"></i> <!-- Logout icon -->
            <span class="hidden md:block">Logout</span> <!-- Show text only on larger screens -->
        </button>
    </div>
</header>

<!-- Modal for Logout Confirmation -->
<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <div class="text-gray-700 font-semibold">Are you sure you want to logout?</div>
        <div class="mt-4 flex justify-end">
            <button id="cancelLogout" class="mr-2 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Cancel</button>
            <a href="../logout.php" id="confirmLogout" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Confirm Logout</a>
        </div>
    </div>
</div>

<script>
    // Show modal on logout button click
    document.getElementById('logoutBtn').addEventListener('click', function() {
        document.getElementById('logoutModal').classList.remove('hidden');
    });

    // Close modal on cancel button click
    document.getElementById('cancelLogout').addEventListener('click', function() {
        document.getElementById('logoutModal').classList.add('hidden');
    });

    // Optional: Close the modal if clicked outside
    window.onclick = function(event) {
        const modal = document.getElementById('logoutModal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    }
</script>
