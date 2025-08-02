@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Buku</h1>

    {{-- Filter Section --}}
    <form method="GET" action="{{ route('books.index') }}" class="flex flex-wrap items-center gap-4 mb-6">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari judul atau penulis..."
               class="border px-3 py-2 rounded w-full md:w-1/3">

        <select name="list" onchange="this.form.submit()" class="border px-3 py-2 rounded">
            @for ($i = 10; $i <= 100; $i += 10)
                <option value="{{ $i }}" {{ request('list', 10) == $i ? 'selected' : '' }}>
                    {{ $i }} per halaman
                </option>
            @endfor
        </select>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Filter
        </button>
    </form>

    {{-- Table Section --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border text-left">Name Book</th>
                    <th class="px-4 py-2 border text-left">Category</th>
                    <th class="px-4 py-2 border text-left">Author</th>
                    <th class="px-4 py-2 border text-center">Avg Rating</th>
                    <th class="px-4 py-2 border text-center">Voter</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $index => $book)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">
                            {{ ($books->currentPage() - 1) * $books->perPage() + $index + 1 }}
                        </td>
                        <td class="px-4 py-2 border">{{ $book->title }}</td>
                        <td class="px-4 py-2 border">{{ $book->category->name }}</td>
                        <td class="px-4 py-2 border">{{ $book->author->name }}</td>
                        <td class="px-4 py-2 border text-center">
                            {{ number_format($book->average_rating, 2) }}
                        </td>
                        <td class="px-4 py-2 border text-center">
                            {{ $book->voter_count }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada data buku ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $books->withQueryString()->links() }}
    </div>
</div>
@endsection
