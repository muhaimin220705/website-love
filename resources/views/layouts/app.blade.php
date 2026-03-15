<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Digital</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Desain Navy & Putih Minimalis */
        body {
            background-color: #001f3f; /* Navy */
            color: #ffffff; /* Putih */
            margin: 0;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        .fade-out { 
            animation: fadeOut 3s forwards; 
        }

        @keyframes fadeOut { 
            from { opacity: 1; } 
            to { opacity: 0; visibility: hidden; } 
        }

        /* Container untuk animasi hati di background */
        #heart-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        /* Konten berada di atas animasi */
        .content-wrapper {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    @if(session('sukses'))
        <div class="fade-out fixed top-5 left-1/2 -translate-x-1/2 z-50 bg-white text-navy-900 px-6 py-2 rounded-full shadow-2xl font-semibold">
            {{ session('sukses') }}
        </div>
    @endif

    <div id="heart-background"></div>

    <main class="flex-grow flex items-center justify-center content-wrapper px-4">
        @yield('content')
    </main>

    
    @stack('scripts')

</body>
</html>