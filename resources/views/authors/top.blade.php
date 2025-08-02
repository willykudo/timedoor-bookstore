@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Top 10 Authors by Voter</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border text-left">No</th>
                    <th class="px-4 py-2 border text-left">Author</th>
                    <th class="px-4 py-2 border text-center">Total Voter</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $index => $author)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $author->name }}</td>
                        <td class="px-4 py-2 border text-center">{{ $author->total_voter ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada data penulis ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
