<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookstore</title>
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow p-4 flex justify-center gap-6 mb-6">
        <a href="{{ route('books.index') }}" class="text-black hover:underline font-semibold">Daftar Buku</a>
        <a href="{{ route('authors.top') }}" class="text-black hover:underline font-semibold">Penulis Populer</a>
        <a href="{{ route('ratings.create') }}" class="text-black hover:underline font-semibold">Beri Rating</a>
    </nav>

    {{-- Main Content --}}
    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>
