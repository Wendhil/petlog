<div id="deleteRecordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
        <p>Are you sure you want to delete this Record?</p>
        <div class="flex justify-between mt-4">
            <button id="confirmRecordDelete" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            <button onclick="closeRecordDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        </div>
    </div>
</div>