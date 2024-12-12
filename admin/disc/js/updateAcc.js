function openUpdateRecordModal(adopt_id, name, email, phone, address, pet_name, pet_type, reason, experience) {
    document.getElementById('updateRecordId').value = adopt_id;
    document.getElementById('updateName').value = name;
    document.getElementById('updateEmail').value = email;
    document.getElementById('updatePhone').value = phone;
    document.getElementById('updateAddress').value = address;
    document.getElementById('updatePetName').value = pet_name;
    document.getElementById('updatePetType').value = pet_type;
    document.getElementById('updateReason').value = reason;
    document.getElementById('updateExperience').value = experience;
    document.getElementById(' updateRecordModal').classList.remove('hidden');
}

// Close Update Account Modal
document.getElementById('closeUpdateRecordModal').addEventListener('click', function() {
    document.getElementById('updateRecordModal').classList.add('hidden');
});

  let RecordIdToDelete = null;

  function openRecordDeleteModal(adopt_id) {
      RecordIdToDelete = adopt_id; // Store the user ID to be deleted
      document.getElementById('deleteRecordModal').classList.remove('hidden');
  }
  
  function closeRecordDeleteModal() {
      document.getElementById('deleteRecordModal').classList.add('hidden');
  }
  
  document.getElementById('confirmRecordDelete').onclick = function() {
      if (RecordIdToDelete) {
          window.location.href = `admin_adoption.php?adopt_id=${RecordIdToDelete}`; // Redirect to delete.php
      }
      closeRecordDeleteModal(); // Close modal after confirming
  };
  

