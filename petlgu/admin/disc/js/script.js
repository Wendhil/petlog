
//card container-start
/*function showPopup(title, description) {
  // Show overlay
  document.getElementById('overlay').classList.remove('hidden');
  
  // Populate popup with information
  document.getElementById('popupTitle').textContent = title;
  document.getElementById('popupDescription').textContent = description;
  
  // Display popup
  const popupContainer = document.getElementById('popupContainer');
  popupContainer.classList.remove('hidden');
}

function closePopup() {
  // Hide overlay and popup
  document.getElementById('overlay').classList.add('hidden');
  document.getElementById('popupContainer').classList.add('hidden');
}

//card container-end
*/

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
  const dropdownContent = document.getElementById(dropdownContentId);
  const arrowIcon = document.getElementById(arrowIconId);

  // Toggle the current dropdown
  dropdownContent.classList.toggle('hidden');
  arrowIcon.classList.toggle('rotate-180');

  // Close other dropdowns if they're open
  const allDropdownContents = document.querySelectorAll('.dropdown-content');
  const allArrowIcons = document.querySelectorAll('.transform');

  allDropdownContents.forEach(content => {
    if (content.id !== dropdownContentId && !content.classList.contains('hidden')) {
      content.classList.add('hidden');
    }
  });

  allArrowIcons.forEach(icon => {
    if (icon.id !== arrowIconId && icon.classList.contains('rotate-180')) {
      icon.classList.remove('rotate-180');
    }
  });
}

//end:sidebar

   // Open the modal
   function openModal() {
    document.getElementById('adoptionModal').classList.remove('hidden');
  }

  // Close the modal
  function closeModal() {
    document.getElementById('adoptionModal').classList.add('hidden');
  }