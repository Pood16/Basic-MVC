
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            <!-- if the user exist -->
            <p class="text-red-500 text-center"><?= $user_exist ?? ''?></p>
          
        
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

                    <?php if (isset($_SESSION['errors']['name'])): ?>
                            <p class="text-red-500"><?= $_SESSION['errors']['name'][0] ?></p>
                            <p class="text-red-500"><?= $_SESSION['errors']['name'][1] ?></p>
                    <?php endif ?>
                    <?php unset($_SESSION['errors']['name'])?>
                   
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
                    <?php if (isset($_SESSION['errors']['email'])): ?>
                            <p class="text-red-500"><?= $_SESSION['errors']['email'][0] ?></p>
                            <p class="text-red-500"><?= $_SESSION['errors']['email'][1] ?></p>
                    <?php endif ?>
                    <?php unset($_SESSION['errors']['email'])?>
                  
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
                    <?php if (isset($_SESSION['errors']['password'])): ?>
                            <p class="text-red-500"><?= $_SESSION['errors']['password'][0] ?></p>
                            <p class="text-red-500"><?= $_SESSION['errors']['password'][1] ?></p>
                    <?php endif ?>
                    <?php unset($_SESSION['errors']['password'])?>
                   
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