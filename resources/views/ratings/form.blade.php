@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Input Rating</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf

        <label for="author" class="block mb-1 font-medium">Author</label>
        <select id="author" name="author_id" class="w-full border p-2 mb-4 rounded">
            <option value="">Pilih Author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>

        <label for="book" class="block mb-1 font-medium">Book</label>
        <select id="book" name="book_id" class="w-full border p-2 mb-4 rounded">
            <option value="">Pilih Buku</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" data-author="{{ $book->author_id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
            @endforeach
        </select>

        <label for="rating" class="block mb-1 font-medium">Rating (1-10)</label>
        <input type="number" id="rating" name="rating" min="1" max="10" value="{{ old('rating') }}" class="w-full border p-2 mb-4 rounded" required>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Submit</button>
    </form>
</div>

{{-- jQuery for filtering books by selected author --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#author').on('change', function () {
            var selectedAuthor = $(this).val();

            $('#book option').each(function () {
                var bookAuthor = $(this).data('author');
                if (!selectedAuthor || bookAuthor == selectedAuthor || $(this).val() == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            $('#book').val('');
        });

        // Trigger initial filter on page load
        $('#author').trigger('change');
    });
</script>
@endsection
