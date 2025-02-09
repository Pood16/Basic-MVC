

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            
            

            <form method="POST" action="/register">

                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="name"
                           type="text"
                           name="name"
                           >
                    <?php if (isset($errors['name'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded mb-4">
                                <?= $errors['name'] ?? '' ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="email"
                           type="text"
                           name="email"
                           >
                    <?php if (isset($errors['email'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded mb-4">
                                <?= $errors['email'] ?? '' ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                           id="password"
                           type="password"
                           name="password"
                           >
                    <?php if (isset($errors['password'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded mb-4">
                                <?= $errors['password'] ?? '' ?>
                        </div>
                    <?php endif; ?>
                </div>
                
              
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                        Register
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                       href="/login">
                        Already have an account?
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>