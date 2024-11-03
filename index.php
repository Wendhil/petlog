<?php
session_start();
include('admin/dbconn/config.php');

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin/admin_dashboard.php");
        exit;
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: user/user_dashboard.php");
        exit;
    }
}

// Function to generate CSRF token
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Generate new token if not already set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateToken();
    $_SESSION['csrf_token_time'] = time(); // Save timestamp for token expiration
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array(); // Initialize error array

    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error['csrf_token'] = "CSRF token mismatch";
    }
    
    // Validate email/username and password fields
    if (empty($_POST['umail'])) {
        $error['umail'] = 'Please enter your email or username';
    } else { 
        $umail = htmlspecialchars(trim($_POST['umail']));
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Please enter your password';
    } else {
        $password = htmlspecialchars(trim($_POST['password']));
    }

    // If no errors, proceed to account check
    if (empty($error)) {
        // Check if the account exists
        $stmt = $conn->prepare('SELECT id, username, pwd, role FROM users WHERE username=? OR email=?');
        $stmt->bind_param('ss', $umail, $umail );
        $stmt->execute();
        $stmt->store_result();

        // If no account is found
        if ($stmt->num_rows === 0) {
            $error['account'] = 'Account not found.';
        } else {
            // If account is found, fetch user details
            $stmt->bind_result($id, $username, $hpassword, $role);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hpassword)) {
                // Set session variables for authentication
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['logged_in'] = true; // Set a flag to indicate the user is logged in
        
                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: admin/admin_dashboard.php");
                    exit;
                } elseif ($role === 'user') {
                    header("Location: user/user_dashboard.php");
                    exit;
                } else {
                    $error['role'] = 'No Account. Please request account to barangay';
                }
            } else {
                $error['password'] = 'Incorrect password. Please try again.';
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Pet Animal Welfare Protection </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="admin/img/barangay.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
        }
        .background-img {
            background-image: url('admin/img/stray.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .overlay {
            background-color: rgba(0, 47, 108, 0.7);
        }
        .login-card {
            background-color: #ffffff;
            border-left: 6px solid #002f6c;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center h-screen background-img relative">
    <div class="absolute inset-0 overlay"></div>
    <div class="login-card p-8 rounded-lg w-full max-w-md relative z-10">
        <div class="flex justify-center mb-4">
            <img src="admin/img/barangay.png" alt="Government Logo" class="h-20 w-auto">
        </div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Login</h2>

        <?php if (!empty($error)) : ?>
            <div class="bg-red-600 text-white text-center py-2 mb-4 rounded">
                <?php 
                foreach ($error as $err) {
                    echo htmlspecialchars($err) . '<br>';
                }
                ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="loginForm">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

            <div class="mb-4">
                <label for="umail" class="block text-sm font-semibold text-gray-700">Email/Username</label>
                <input type="text" name="umail" id="umail" class="mt-1 p-3 border border-gray-300 rounded w-full focus:outline-none focus:border-blue-600" value="<?php echo isset($_POST['umail']) ? htmlspecialchars($_POST['umail']) : ''; ?>" autocomplete="off">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-3 border border-gray-300 rounded w-full focus:outline-none focus:border-blue-600" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" autocomplete="off">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-200 w-full">Login</button>
            </div>
        </form>
        <a class="flex justify-center" href="register.php">Create an account. Sign up</a>
    </div>

    <!-- Copyright Footer -->
    <footer class="text-gray-500 text-sm mt-4 text-center absolute bottom-4">
        &copy; <?php echo date("Y"); ?> Barangay Pet Animal Welfare Protection System. All Rights Reserved.
    </footer>

    <script>
        window.onload = function() {
            document.getElementById('loginForm').reset();
        };
    </script>
</body>
</html>
