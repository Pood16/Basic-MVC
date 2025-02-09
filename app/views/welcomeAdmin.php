<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl p-8 m-4 w-full max-w-md">
            
            
            <div class="space-y-4">
                <p class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-700 w-24">Username:</span>
                    <span class="text-gray-600"><?= $_SESSION['user_name'] ?></span>
                </p>
                
                <p class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-700 w-24">Email:</span>
                    <span class="text-gray-600"><?= $_SESSION['user_email'] ?></span>
                </p>
                
                <p class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-700 w-24">Role:</span>
                    <span class="px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                        <?= $_SESSION['user_role'] ?>
                    </span>
                </p>
                
                <p class="flex items-center space-x-2">
                    <span class="font-semibold text-gray-700 w-24">Joined at:</span>
                    <span class="text-gray-600"><?= date('F j, Y', strtotime($_SESSION['joined_date'])) ?></span>
                </p>
            </div>

            <div class="mt-8 text-center">
                <a href="/logout" 
                   class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transition duration-200">
                    Logout
                </a>
            </div>
        </div>
    </div>
</body>
</html>
