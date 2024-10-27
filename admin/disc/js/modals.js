
  // Open Add Account Modal
  document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('createAccountModal').classList.remove('hidden');
});
// Close Add Account Modal
document.getElementById('closeCreateModal').addEventListener('click', function() {
    document.getElementById('createAccountModal').classList.add('hidden');
});


  // Open Update Account Modal
  function openUpdateModal(id, username, email, role) {
    document.getElementById('updateUserId').value = id;
    document.getElementById('updateUsername').value = username;
    document.getElementById('updateEmail').value = email;
    document.getElementById('updateRole').value = role;
    document.getElementById('updateAccountModal').classList.remove('hidden');
  }

  // Close Update Account Modal
  document.getElementById('closeUpdateModal').addEventListener('click', function() {
    document.getElementById('updateAccountModal').classList.add('hidden');
  });

  // Open Delete Confirmation Modal
  function openDeleteModal(id) {
    document.getElementById('deleteUserId').value = id;
    document.getElementById('deleteConfirmationModal').classList.remove('hidden');
  }

  // Close Delete Confirmation Modal
  document.getElementById('closeDeleteModal').addEventListener('click', function() {
    document.getElementById('deleteConfirmationModal').classList.add('hidden');
  });

