<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Framework for Web Artisans</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end h-20">
                <div class="flex items-center space-x-6">
                    <a href="/login" class="px-6 py-2.5 rounded-lg border-2 border-red-500 text-red-500 hover:bg-red-50 transition-all duration-300 font-semibold">
                        Login
                    </a>
                    <a href="/register" class="px-6 py-2.5 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-all duration-300 font-semibold">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </nav>

    
    <div class="relative overflow-hidden">
    
        <div class="absolute top-20 left-20 transform -rotate-12">
            <svg class="w-12 h-12 text-red-500/20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 3h18v18H3z"/>
            </svg>
        </div>
        <div class="absolute top-40 right-40 transform rotate-12">
            <svg class="w-12 h-12 text-red-500/20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 3h18v18H3z"/>
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-6xl mb-4">
                    Basic MVC structure in PHP
                </h1>
                <h2 class="text-5xl font-bold tracking-tight text-red-500 sm:text-6xl mb-8">
                    for Web Applications
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-2xl mx-auto">
                    A web application framework with expressive, elegant syntax. We've already laid the foundation — freeing you to create without sweating the small things.
                </p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="px-8 py-3 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-all duration-300 font-semibold text-lg">
                        GET STARTED
                    </a>
                    <a href="#" class="px-8 py-3 rounded-lg border-2 border-red-500 text-red-500 hover:bg-red-50 transition-all duration-300 font-semibold text-lg">
                        WATCH TUTORIAL
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>