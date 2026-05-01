<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventori Toko COKWO</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS (Breeze) -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="antialiased bg-white text-gray-900 min-h-screen flex flex-col">
    
    <!-- Navigasi Pojok Kanan Atas -->
    <header class="w-full p-6 flex justify-end items-center">
        <?php if(Route::has('login')): ?>
            <div class="space-x-6">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="text-base font-semibold text-gray-600 hover:text-gray-900 transition">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-base font-semibold text-gray-600 hover:text-gray-900 transition">Log in</a>
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>" class="text-base font-semibold text-gray-600 hover:text-gray-900 transition">Register</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>

    <!-- Bagian Tengah (Hero Section) -->
    <main class="flex-grow flex items-center justify-center text-center px-6 pb-20">
        <div>
            <!-- Logo dengan halaman login) -->
            <div class="mx-auto w-24 h-24 bg-gray-800 rounded-3xl flex items-center justify-center shadow-lg mb-8">
                <span class="text-white text-4xl font-extrabold tracking-wider">CW</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Sistem Inventori Toko COKWO</h1>
            
            <p class="text-lg text-gray-600 mb-10 max-w-xl mx-auto">
                Kelola stok barang, pantau harga produk, dan kelola manajemen data inventori toko dengan lebih mudah, cepat, dan efisien.
            </p>
            
            <!-- Tombol Aksi -->
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/dashboard')); ?>" class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 px-8 rounded-xl transition duration-200">
                    Buka Dashboard
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="inline-block bg-gray-800 border border-gray-700 hover:bg-gray-900 text-white font-bold py-3.5 px-8 rounded-xl transition duration-200 shadow-md">
                    Masuk ke Sistem
                </a>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer Kecil -->
    <footer class="w-full text-center p-4 text-sm text-gray-500">
        &copy; <?php echo e(date('Y')); ?> Toko Mas Wowo & Pak Cokomi. All rights reserved.
    </footer>
    
</body>
</html><?php /**PATH D:\Materi Kuliah\Semester 6\Aplikasi Berbasis Platform\Praktikum\Laprak\Week5\inventori-toko\resources\views/welcome.blade.php ENDPATH**/ ?>