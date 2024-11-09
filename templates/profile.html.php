<header class="text-2xl font-sans font-bold pl-2 py-5 mx-auto w-4/5">Profile</header>

<?php if (!empty($success)): ?>
    <p class="bg-green-100 text-green-700 p-4 rounded-lg"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>
<?php if (!empty($error)): ?>
    <p class="bg-red-100 text-red-700 p-4 rounded-lg"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<div class="flex flex-col space-y-8 w-4/5 mx-auto">
    <div class="bg-white dark:bg-slate-800 p-8 pl-10 rounded-lg shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <?php if (isset($user['image'])): ?>
                    <img src="<?= htmlspecialchars($user['image']) ?>" class="w-24 h-24 rounded-full object-cover">
                <?php else: ?>
                    <span class="p-1">
                        <svg class="h-24 w-24 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A12.062 12.062 0 0112 15.5c2.99 0 5.74 1.1 7.879 2.804m-7.879-6.35a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </span>
                <?php endif; ?>
                <p class="text-2xl font-bold"><?= htmlspecialchars($user['username']) ?></p>
            </div>
            <div class="relative">
                <span id="profileOptionsButton" class="cursor-pointer hover:bg-gray-200 rounded-md py-2 px-3">
                    <i class="fa-solid fa-pen text-gray-700 scale-125 pr-1"></i> Edit Profile
                </span>
                <div id="profileOptionsMenu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg hidden">
                    <button onclick="toggleModal('uploadImage')" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-camera pr-2"></i>Upload Image
                    </button>
                    <button onclick="toggleModal('changeName')" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-user pr-2"></i>Change Name
                    </button>
                    <button onclick="toggleModal('changeEmail')" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-envelope pr-2"></i>Change Email
                    </button>
                    <button onclick="toggleModal('changePassword')" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-key pr-2"></i>Change Password
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Date Joined:</strong> <?= htmlspecialchars($user['date']) ?></p>
        </div>
    </div>

    <!-- Upload Image Modal -->
    <div id="uploadImage" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <form action="php/profile.php" method="POST" enctype="multipart/form-data">
                <h2 class="text-xl font-semibold mb-4">Upload Profile Image</h2>
                <input type="file" name="profile_image" class="mt-2 p-2 bg-gray-100 rounded-md" accept="image/*">
                <button type="submit" name="upload_image" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Upload</button>
            </form>
            <button onclick="toggleModal('uploadImage')" class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-md">Close</button>
        </div>
    </div>

    <!-- Change Name Modal -->
    <div id="changeName" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Change Name</h2>
            <form action="php/profile.php" method="POST">
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" class="mt-1 p-2 bg-gray-100 rounded-md w-full">
                <div class="flex justify-between mt-6">
                    <button onclick="toggleModal('changeName')" class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-md">Close</button>
                    <button type="submit" name="change_name" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Email Modal -->
    <div id="changeEmail" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Change Email</h2>
            <form action="php/profile.php" method="POST">
                <label class="block text-sm font-medium">Email</label>
                <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="mt-1 p-2 bg-gray-100 rounded-md w-full">
                <div class="flex justify-between mt-6">
                    <button onclick="toggleModal('changeEmail')" class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-md">Close</button>
                    <button type="submit" name="change_email" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="changePassword" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Change Password</h2>
            <form action="php/profile.php" method="POST">
                <label class="block text-sm font-medium">New Password</label>
                <input type="password" name="new_password" class="mt-1 p-2 bg-gray-100 rounded-md w-full">
                <label class="block text-sm font-medium mt-4">Confirm New Password</label>
                <input type="password" name="confirm_password" class="mt-1 p-2 bg-gray-100 rounded-md w-full">
                <div class="flex justify-between mt-6">
                    <button onclick="toggleModal('changePassword')" class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-md">Close</button>
                    <button type="submit" name="change_password" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/profile.js"></script>