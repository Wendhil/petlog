<!-- Header with Logout Button -->
<header class="header flex bg-[#2563eb] shadow-md p-4 m-4 item-center justify-between rounded-lg">
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

<!-- Modal for Logout Confirmation 
<div class="modal-overlay" id="logoutModal">
    <div class="modal-content">
        <p>Are you sure you want to logout?</p>
        <button id="cancelBtn" class="bg-gray-300 p-2 rounded-md mr-2">Cancel</button>
        <button onclick="confirmLogout()" class="bg-red-500 text-white p-2 rounded-md">Confirm Logout</button>
    </div>
</div>
-->
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
