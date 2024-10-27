<!-- Update Account Modal -->
<div id="updateAccountModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-1/3 p-6">
    <h2 class="text-xl font-semibold mb-4">Update Account</h2>
    <form action="updateAcc.php" method="POST">
      <input type="hidden" id="updateUserId" name="id">
      
      <!-- Username -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateUsername">Username</label>
        <input class="border rounded-lg w-full p-2" type="text" id="updateUsername" name="username" required>
      </div>
      
      <!-- Email -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateEmail">Email</label>
        <input class="border rounded-lg w-full p-2" type="email" id="updateEmail" name="email" required>
      </div>
      
      <!-- Role -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updateRole">Role</label>
        <select class="border rounded-lg w-full p-2" id="updateRole" name="role">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <!-- New Password (Optional) -->
      <div class="mb-4">
        <label class="block text-gray-700" for="updatePassword">New Password (Leave blank if not changing)</label>
        <input class="border rounded-lg w-full p-2" type="password" id="updatePassword" name="password">
      </div>

      <!-- Submit and Cancel -->
      <div class="flex justify-end">
        <button type="submit" name="updateAccount" class="bg-blue-500 text-white p-2 rounded-lg mr-2">Update</button>
        <button type="button" id="closeUpdateModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
      </div>
    </form>
  </div>
</div>
