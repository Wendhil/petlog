<!-- Delete Confirmation Modal -->
<div id="deleteConfirmationModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-1/3 p-6">
    <h2 class="text-xl font-semibold mb-4">Delete Account</h2>
    <p>Are you sure you want to delete this account?</p>
    <form action="deleteAccount_function.php" method="POST">
      <input type="hidden" id="deleteUserId" name="id">
      <div class="flex justify-end">
        <button type="submit" name="deleteAccount" class="bg-red-500 text-white p-2 rounded-lg mr-2">Delete</button>
        <button type="button" id="closeDeleteModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
      </div>
    </form>
  </div>
</div>
