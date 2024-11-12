<!-- Create Account Modal -->
<div id="createAccountModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-1/3 p-6">
    <h2 class="text-xl font-semibold mb-4">Create Account</h2>
    <form action="adminAccAdd.php" method="POST">
      
      <!-- Username -->
      <div class="mb-4">
        <label class="block text-gray-700" for="createUsername">Username</label>
        <input class="border rounded-lg w-full p-2" type="text" id="createUsername" name="username" required>
      </div>
      
      <!-- Email -->
      <div class="mb-4">
        <label class="block text-gray-700" for="createEmail">Email</label>
        <input class="border rounded-lg w-full p-2" type="email" id="createEmail" name="email" required>
      </div>
      
      <!-- Role -->
      <div class="mb-4">
        <label class="block text-gray-700" for="createRole">Role</label>
        <select class="border rounded-lg w-full p-2" id="createRole" name="role" required>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label class="block text-gray-700" for="createPassword">Password</label>
        <input class="border rounded-lg w-full p-2" type="password" id="createPassword" name="password" required>
      </div>

      <!-- Submit and Cancel -->
      <div class="flex justify-end">
        <button type="submit" name="createAccount" class="bg-blue-500 text-white p-2 rounded-lg mr-2">Create</button>
        <button type="button" id="closeCreateModal" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
      </div>
    </form>
  </div>
</div>
